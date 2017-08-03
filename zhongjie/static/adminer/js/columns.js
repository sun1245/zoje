'use strict';

$(function(){
	ui.btn_delete(cols.url_del,'#js-cols');
	ui.btn_show(cols.url_show);
	// ui.sortable(cols.url_sort);
	ui.btn_delete(cols.url_ctypes_del,'#js-ctypes');
});

// 栏目获取
cols.get_col = function(cnow){
	console.log("get_col:");
	console.log(cnow);

	$.ajax({
		url: cols.url_cols+cnow.fid,
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		console.log("success");

		// 清空数据
		$('#js-box-nav-col').empty();

		// 父级目录
		var cprev;
		// 检测深度 重组数据
		for (var i = 0; i < cols.c_list.length; i++) {
			if (cols.c_list[i].depth == cnow.depth) {
				console.log(i);
				cols.c_list = cols.c_list.slice(0, i);
				if (i === 0) {
					cprev = cols.c_list[0];
				}else{
					cprev = cols.c_list[i-1];
				}
			}
		}

		// 填充栏目
		cols.c_list.push(cnow);
		cols.c_now = cnow;

		// 移除
		$('#js-box-col ul.list-group').each(function(index, el) {
			if ($(el).attr('data-depth') >= cnow.depth){
				$(el).remove();
			}
			if ($(el).attr('data-depth') < cnow.depth - 1 ) {
				$(el).hide();
			}
			if ($(el).attr('data-depth') == cnow.depth - 1 ) {
				$(el).show();
				$(el).children('li').removeClass('active');
				$(el).children('li[data-id="'+cnow.fid+'"]').addClass('active');
			}
		});

		var html_nav = template.render('tpl-cols-nav', {list:cols.c_list});
		$('#js-box-nav-col').append(html_nav);

		var tdata = cnow;
		tdata.list_cols = data;
		tdata.baseurl = ADMINER_URL;
		var html = template.render('tpl-cols-show', tdata);
		$('#js-box-col').append(html).fadeIn('fast');
		ui.sortable(cols.url_sort,'#js-box-col ul.list-group[data-fid="'+cnow.fid+'"]','asc');
	})
	.fail(function(XMLHttpRequest, textStatus, errorThrown){
		var m = XMLHttpRequest.responseJSON;
		$.pnotify({
			title:"错误提示！",
			text:m.msg,
			type:"error",
			animation: 'fade'
		});
	})
	.always(function() {
		console.log("complete");
	});
};

// 栏目获取
cols.get_ctypes = function(ctnow){
	console.log("get_ctypes:");
	console.log(ctnow);

	$.ajax({
		url: cols.url_types+ctnow.cid+'/'+ctnow.fid,
		type: 'GET',
		dataType: 'json',
	})
	.done(function(data) {
		console.log("success");
		if (data.status == 1) {
			// 清空数据
			$('#js-box-nav-ctypes').empty();

			// 父级目录
			var cprev;
			// 检测深度 重组数据
			for (var i = 0; i < cols.ctypes_list.length; i++) {
				if (cols.ctypes_list[i].depth == ctnow.depth) {
					console.log(i);
					cols.ctypes_list = cols.ctypes_list.slice(0, i);
					if (i === 0) {
						cprev = cols.ctypes_list[0];
					}else{
						cprev = cols.ctypes_list[i-1];
					}
				}
			};

			// 检测错我

			// 填充栏目
			cols.ctypes_list.push(ctnow);
			cols.ctypes_now = ctnow;

			// 移除
			$('#js-box-ctypes ul.list-group').each(function(index, el) {
				if ($(el).attr('data-depth') >= ctnow.depth){
					$(el).remove();
				}
				if ($(el).attr('data-depth') < ctnow.depth - 1 ) {
					$(el).hide();
				};
				if ($(el).attr('data-depth') == ctnow.depth - 1 ) {
					$(el).show();
					$(el).children('li').removeClass('active');
					$(el).children('li[data-id="'+ctnow.fid+'"]').addClass('active');
				};
			});

			var html_nav = template.render('tpl-ctypes-nav', {list:cols.ctypes_list});
			$('#js-box-nav-ctypes').append(html_nav);
			var tdata = ctnow;
			tdata.list = data.list;
			tdata.baseurl = ADMINER_URL;
			var html = template.render('tpl-ctypes-show', tdata);
			$('#js-box-ctypes').append(html).fadeIn('fast');
			ui.sortable(cols.url_ctypes_sort,'#js-box-ctypes ul.list-group[data-cid="'+ctnow.cid+'"]','asc');
		}else{
			console.log('err:types of '+ctnow.cid+' is noting!')
		};
	})
	.fail(function(XMLHttpRequest, textStatus, errorThrown){
		var m = XMLHttpRequest.responseJSON;
		$.pnotify({
			title:"错误提示！"
			,text:m.msg
			,type:"error"
			,animation: 'fade'
		});
	})
	.always(function() {
		console.log("complete");
	});
}

$(function(){

	cols.get_col(cols.c_now);

	// 头部nav
	$('#js-box-nav-col').delegate('a[data-depth]', 'click', function(event) {
		event.preventDefault();
		var fid = $(this).attr('data-fid');
		var depth = $(this).attr('data-depth');
		var title = $(this).attr('data-title');
		cols.get_col({fid:fid,depth:depth,title:title,identify:title});
	});

	// 打开子目录
	$('#js-box-col').delegate('a.js-more', 'click', function(event) {
		event.preventDefault();
		var fid = $(this).parent().attr('data-id');
		var depth = $(this).parent().attr('data-depth');
		var title = $(this).parent().attr('data-title');
		cols.get_col({fid:fid,depth:depth,title:title,identify:title});
	});

	// hover 显示操作按钮
	$('#js-box-col').delegate('li', 'mouseenter', function(event) {
		// event.preventDefault();
		$(this).children('div.btn-group').fadeIn('fast');
	}).delegate('li', 'mouseleave', function(event) {
		$(this).children('div.btn-group').fadeOut('fast');
	});

	// 添加子菜单操作
	$('#js-box-col').delegate('a.js-create', 'click', function(event) {
		event.preventDefault();
		$('#frm-col-content input[type="submit"]').attr('value','提交');
		var node_li = $(this).parents('li');
		console.log(node_li);
		cols.parent_col = {
			fid:node_li.attr('data-id')
			,depth:node_li.attr('data-depth')
			,title:node_li.attr('data-title')
			,identify:node_li.attr('data-identify')
		};
		document.getElementById('frm-col-content').reset();
		$('#frm-col-modal input[name="parent_id"]').val(cols.parent_col.fid);
		$('#frm-col-modal .frm-parent-title').text(cols.parent_col.title);
		$('#frm-col-modal input[name="id"]').remove();
        $('#frm-col-modal').modal();
	});

	// 提交子栏目
	$('#frm-col-content').on('submit',function(event){
		event.preventDefault();
		var data = $('#frm-col-content').serializeArray();
		var url = cols.url_col_create;
		if (data[data.length-1].name == "id") {
			url = cols.url_col_edit;
			$('#frm-col-content input[type="submit"]').attr('value','修改');
		}else{
			$('#frm-col-content input[type="submit"]').attr('value','提交');
		};
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(data) {
			console.log("success");
			console.log(data);
			if (data.status) {
				$.pnotify({
					title:"OK"
					,text:data.msg
					,type:"success"
					,animation: 'fade'
				});
				cols.get_col(cols.parent_col);
				// 添加修正为修改
				$('#frm-col-content').append('<input type="hidden" name="id" value="'+data.id+'" />');
				var node_more = $('#js-box-col li.list-group-item > div.btn-group[data-id="'+data.id+'"]');
				console.log(node_more);
				// 追加按钮
				if (tools.isEmptyValue(node_more.find('a.js-more'))) {
					node_more.append('<a href="#" class="btn btn-small js-more"> <i class="fa fa-folder-open"></i></a>');
				};
				$('#frm-col-modal').modal('toggle');
			}else{
				$.pnotify({
					title:"表单错误！"
					,text:data.msg
					,type:"error"
					,animation: 'fade'
				});
			};

		})
		.fail(function(XMLHttpRequest, textStatus, errorThrown){
			var m = XMLHttpRequest.responseJSON;
			$.pnotify({
				title:"错误提示！"
				,text:m.msg
				,type:"error"
				,animation: 'fade'
			});
		})
		.always(function() {
			console.log("complete");
		});

		return false;
	});

	//  由栏目中进入添加类型
	$('#js-box-col').delegate('a.js-ctype', 'click', function(event) {
		event.preventDefault();
		$('#js-box-ctypes').empty();
		$('#js-box-nav-ctypes').empty();

		cols.ctypes_now = {fid:0,cid:0,depth:0,title:""};
		cols.ctypes_list = [];
		cols.parent_ctypes = {fid:0,cid:0,depth:0,title:""};

		var p = $(this).parent('div');
		cols.ctypes_now.cid = p.attr('data-id');
		cols.ctypes_now.title = p.attr('data-title');
		cols.ctypes_now.fid = 0;
		cols.ctypes_now.depth = 0;
		$('#js-ctypes .ctypes-title').text(cols.ctypes_now.title);
		$('#js-ctypes').attr('data-cid',cols.ctypes_now.cid).show('fast');
		cols.get_ctypes(cols.ctypes_now);
	});

	// 头部nav
	$('#js-box-nav-ctypes').delegate('a[data-depth]', 'click', function(event) {
		event.preventDefault();
		var node_li = $(this);
		cols.get_ctypes({
			cid:node_li.attr('data-cid')
			,depth:node_li.attr('data-depth')
			,fid:node_li.attr('data-fid')
			,title:node_li.attr('data-title')
		});
	});

	$('#js-box-nav-ctypes-create').on('click', function(event) {
		event.preventDefault();
		console.log(cols.ctypes_now);
		cols.tmp_ctypes = cols.ctypes_now;
		$('#frm-ctypes-modal .frm-parent-title').text('添加分类'+cols.tmp_ctypes.title);
		document.getElementById('frm-ctypes-content').reset();
		$('#frm-ctypes-content input[type="submit"]').attr('value','提交');
		$('#frm-ctypes-modal input[name="fid"]').val(cols.tmp_ctypes.fid);
		$('#frm-ctypes-modal input[name="cid"]').val(cols.tmp_ctypes.cid);
		$('#frm-ctypes-modal input[name="depth"]').val(cols.tmp_ctypes.depth);
		$('#frm-ctypes-modal input[name="id"]').remove();
        $('#frm-ctypes-modal').modal();
	});

	// 打开子目录
	$('#js-box-ctypes').delegate('a.js-more', 'click', function(event) {
		event.preventDefault();
		var node_li = $(this).parents('li[data-id]');
		console.log(node_li.attr('data-title'));
		cols.get_ctypes({
			cid:node_li.attr('data-cid')
			,depth:node_li.attr('data-depth')-0+1
			,fid:node_li.attr('data-id')
			,title:node_li.attr('data-title')
		});
		console.log(cols.ctypes_list);
		console.log(cols.ctypes_now);
	});

	// hover 显示操作按钮
	$('#js-box-ctypes').delegate('li', 'mouseenter', function(event) {
		$(this).children('div.btn-group').fadeIn('fast');
	}).delegate('li', 'mouseleave', function(event) {
		$(this).children('div.btn-group').fadeOut('fast');
	});

	// 添加子菜单操作
	$('#js-box-ctypes').delegate('a.js-create', 'click', function(event) {
		event.preventDefault();
		var node_li = $(this).parents('li');
		console.log(node_li);

		cols.tmp_ctypes ={
			fid:node_li.attr('data-id')
			,cid:node_li.attr('data-cid')
			,depth:node_li.attr('data-depth')-0+1
			,title:node_li.attr('data-title')
		};

		$('#frm-ctypes-modal .frm-parent-title').text('添加子分类'+cols.tmp_ctypes.title);
		document.getElementById('frm-ctypes-content').reset();
		$('#frm-ctypes-content input[type="submit"]').attr('value','提交');
		$('#frm-ctypes-modal input[name="fid"]').val(cols.tmp_ctypes.fid);
		$('#frm-ctypes-modal input[name="cid"]').val(cols.tmp_ctypes.cid);
		$('#frm-ctypes-modal input[name="depth"]').val(cols.tmp_ctypes.depth);

		$('#frm-ctypes-modal input[name="id"]').remove();
        $('#frm-ctypes-modal').modal();
	});

	// 添加子菜单操作
	$('#js-box-ctypes').delegate('a.js-edit', 'click', function(event) {
		event.preventDefault();
		console.log('修改');
		var node_li = $(this).parents('li');
		var node_ul = $(this).parents('ul');

		cols.tmp_ctypes ={
			fid:node_ul.attr('data-fid')
			,cid:node_ul.attr('data-cid')
			,depth:node_ul.attr('data-depth')
			,title:node_ul.attr('data-title')
		};

		console.log(cols.tmp_ctypes);
		$('#frm-ctypes-modal .frm-parent-title').text('修改分类'+cols.tmp_ctypes.title);
		document.getElementById('frm-ctypes-content').reset();
		$('#frm-ctypes-content input[type="submit"]').attr('value','修改');
		$('#frm-ctypes-content input[name="title"]').val(node_li.attr('data-title'));
		$('#frm-ctypes-content input[name="fid"]').val(node_ul.attr('data-fid'));
		$('#frm-ctypes-content input[name="cid"]').val(node_li.attr('data-cid'));
		$('#frm-ctypes-content input[name="depth"]').val(node_li.attr('data-depth'));
		$('#frm-ctypes-content input[name="id"]').remove();
		$('#frm-ctypes-content input[name="name"]').after('<input name="id" type="hidden" value="'+node_li.attr('data-id')+'" >');
        $('#frm-ctypes-modal').modal();
	});

	// 提交子栏目
	$('#frm-ctypes-content').on('submit',function(event){
		event.preventDefault();
		var data = $('#frm-ctypes-content').serializeArray();
		var url = cols.url_ctypes_create;

		if (data[data.length-1].name == "id") {
			url = cols.url_ctypes_edit;
			$('#frm-ctypes-content input[type="submit"]').attr('value','修改');
		}else{
			$('#frm-ctypes-content input[type="submit"]').attr('value','提交');
		};
		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		})
		.done(function(data) {
			console.log("success");
			console.log(data);
			if (data.status) {
				$.pnotify({
					title:"OK"
					,text:data.msg
					,type:"success"
					,animation: 'fade'
				});
				cols.get_ctypes(cols.tmp_ctypes);
				// 添加修正为修改
				$('#frm-ctypes-content input[name="name"]').after('<input name="id" type="hidden" value="'+data.id+'" >');
				$('#frm-ctypes-content input[type="submit"]').attr('value','修改');
				var node_more = $('#js-box-ctypes li.list-group-item > div.btn-group[data-id="'+cols.tmp_ctypes.fid+'"]');
				// 追加按钮
				if (tools.isEmptyValue(node_more.find('a.js-more'))) {
					node_more.append('<a href="#" class="btn btn-small js-more"> <i class="fa fa-folder-open"></i></a>');
				};
				$('#frm-ctypes-modal').modal('toggle');
			}else{
				$.pnotify({
					title:"表单错误！"
					,text:data.msg
					,type:"error"
					,animation: 'fade'
				});
			};

		})
		.fail(function(XMLHttpRequest, textStatus, errorThrown){
			var m = XMLHttpRequest.responseJSON;
			$.pnotify({
				title:"错误提示！"
				,text:m.msg
				,type:"error"
				,animation: 'fade'
			});
		})
		.always(function() {
			console.log("complete");
		});

		return false;
	});


});
