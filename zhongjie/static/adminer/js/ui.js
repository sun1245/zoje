define(['jquery','tools','bootstrap','jquery.fancybox','jquery.cookie','jquery.pnotify','jquery.ui','bootstrap-bootbox'],
function($,tools){

	var ui = {

		// Ueditor 编辑器
		editor_create:function(id){
			require(['ueditor'],function(){
				var editor = new UE.ui.Editor();
				editor.addListener('ready',function(){
					this.focus();
				});
				// editor.addListener("afterPaste",function(type,data){
					// editor.fireEvent('pasteTransfer',2);
				// });
				editor.render(id);
			});
		},

		btn_select_all:function(parent_node){
			if (parent_node instanceof String) {
				parent_node += " ";
			}else{
				parent_node = "";
			}
			// 全部选择按钮
			$(parent_node+'#select-all').on('click',function(e){
				e.preventDefault();
				$(parent_node+'.select-list input[type="checkbox"].select-it').each(function(i,item){item.checked = true;$(item).addClass('checked');});
				$(parent_node+'#selectbox-all')[0].checked = true;
				$(parent_node+'#unselect-all').show(300).css('display','inline-block');
			});

			// 全部选择的 selectbox
			$(parent_node+'#selectbox-all').on('change',function(e){
				e.preventDefault();
				if (this.checked) {
					$(parent_node+'.select-list  input[type="checkbox"].select-it').each(function(i,item){item.checked = true;$(item).addClass('checked');});
					$(parent_node+'#unselect-all').show(300).css('display','inline-block');
				}else{
					$(parent_node+'.select-list  input[type="checkbox"].select-it').each(function(i,item){item.checked = false;$(item).removeClass('checked');});
					$(parent_node+'#unselect-all').hide(300);
				}
			});

			// 取消选择
			$(parent_node+'#unselect-all').on('click',function(e){
				e.preventDefault();
				$(parent_node+'.select-list  input[type="checkbox"].select-it.checked').each(function(i,item){item.checked = false;$(item).removeClass('checked');});
				$(parent_node+'#selectbox-all')[0].checked = false;
				$(parent_node+'#unselect-all').hide(300);
			});

			// 选择选项
			$(parent_node+'.select-list').delegate('input[type="checkbox"].select-it', 'change', function(event) {
				event.preventDefault();
				if (this.checked) {
					$(this).addClass('checked');
					$(parent_node+'#unselect-all').show(300).css('display','inline-block');
				}else{
					$(this).removeClass('checked');
					$(parent_node+'#selectbox-all')[0].checked = false;
					if (tools.isEmptyValue($(parent_node+'.select-list .checked'))) {
						$(parent_node+'#unselect-all').hide(300);
					}
				}
			});
		},

		// 切换按钮
		btn_switch:function(){
			// btn-switch
			$('div.btn-switch').delegate('a[data-value]','click',function(e){
				e.preventDefault();
				var btnswich = $(this).parent();
				var v = $(this).data('value');
				btnswich.next('input[type="hidden"]').val(v);
				btnswich.children('a').removeClass('btn-primary');
				$(this).addClass('btn-primary');
			});
		},

		// Model link
		modal_link:function(){
			$('a[data-toggle="modal-link"]').click(function(e) {
				e.preventDefault();
				var url = $(this).attr('href');
				if ( parseInt(url.indexOf('#')) === 0) {
					$(url).modal('open');
				} else {
					$.get(url, function(data) {
						$('<div class="modal hide fade">' + data + '</div>').modal();
					}).success(function() { $('input:text:visible:first').focus(); });
				}
			});
		},

		// 批量提示
		// json{
		// 	title:'',
		// 	text:'',
		// 	type:'info|success|error'
		// }
		notify:function(json){
			$.each(json, function(i, item) {
				$.pnotify({
					title: item.title,
					text: item.text,
					type: item.type,
					animation: 'fade'
				});
			});
		},

		// 输出 alert 模板
		alert:function(txt,type){
			if (!type) {
				type = "error";
			}
			return '<div class="alert alert-'+type+'"> <button type="button" class="close" data-dismiss="alert"> <i class="fa fa-times"></i> </button> '+txt+' </div>';
		},

		// 对 图片进行 fancybox
		fancybox_img:function(){
			$('.fancybox-img').fancybox({
				type:'image',
				openEffect  : 'elastic',
				closeEffect : 'elastic',
				helpers : {
					title : {
						type : 'float'
					}
				}
			});
		},


		// 提供 btn-ajax-x- 简易接口
		btn_ajax_do:function(hint_title,url,btn,data_attr){
			$(".select-list").delegate('.btn-ajax-'+btn, 'click', function(event) {
				event.preventDefault();
				var doit = {
					id:$(this).attr('data-id'),
					status:$(this).attr(data_attr),
					it:$(this)
				};
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						ids:doit.id,
						status:doit.status,
						_cfs:$.cookie('_cfc')
					}
				})
				.done(function(data) {
					console.log("success");
					var msg = {
						title:'',
						text:data.msg,
						type:'',
						delay:3000
					};
					if (data.status == 1 ) {
						msg.title = "OK!";
						if (doit.status == 1) {
							msg.type = 'success';
							doit.it.addClass('btn-primary').attr('data-hint','取消'+hint_title).attr(data_attr,'0');
						}else{
							msg.type = 'notice';
							doit.it.removeClass('btn-primary').attr('data-hint',hint_title).attr(data_attr,'1');
						}
					}else{
						msg.title = "错误！";
						msg.type = 'error';
					}
					$.pnotify(msg);
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
			});
		},


		// 垃圾箱处理  通用设计
		action_trash:function(url,ids,node){

		},


		// ajax 删除处理
		action_del:function(url,ids,note){
			$.ajax({
				url: url,
				type: 'GET',
				dataType: 'json',
				data: {
					ids:ids
				}
			})
			.done(function(data) {
				if (data.status) {
					$.pnotify({
						title:"成功删除",
						text:"删除数据ID为："+ids,
						type:"success",
						animation: 'fade'
					});
					note.remove();
				}else{
					$.pnotify({
						title:"没有删除",
						text: data.msg,
						type:"error",
						animation: 'fade'
					});
				}
				console.log("success");
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
		},

		// 删除UI
		btn_delete:function(url,parent_node){

			if (parent_node instanceof String) {
				parent_node += " ";
			}else{
				parent_node = "";
			}

			// 单个删除
			$(parent_node+'.select-list').delegate('a.btn-del', 'click', function(event) {
				event.preventDefault();
				var id = $(this).attr('data-id');
				var list = $(this).parents('tr');
				if (tools.isEmptyValue(list)) {
					list = $(this).parents('li');
				}
				bootbox.confirm("确认删除? ID 是"+id, function(result) {
					if (result) {
						ui.action_del(url,id,list);
					}
				});
			});

			// 选择删除
			$(parent_node+'a#btn-del').on('click', function(event) {
				event.preventDefault();
				var ids = "";
				// 上两层
				var row = $(parent_node+'.select-list input:checked[type="checkbox"].select-it').parent().parent();
				$(parent_node+'.select-list input:checked[type="checkbox"].select-it').each(function(i,item){
					if (i) {
						ids += ',';
					}
					ids += item.value;
				});

				if (ids) {
					bootbox.confirm("确认删除所选择的部分?", function(result) {
						if (result) {
							ui.action_del(url,ids,row);
							/*setTimeout(function(){ location.reload(); },1000);*/
						}
					});
				}else{
					bootbox.alert('还没有做任何的选择！');
				}
			});
		},

		// 审核处理  地址， 审核结构体
		action_audit:function(url,audit){

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					ids:audit.ids,
					audit:audit.audit,
					_cfs:$.cookie('_cfc')
				}
			})
			.done(function(data) {
				console.log("success");
				var msg = {
					title:'',
					text:data.msg,
					type:'',
					delay:3000
				};
				if (data.status == 1 ) {
					msg.title = "OK!";
					if (audit.audit == 1) {
						msg.type = 'success';
						audit.it.addClass('btn-primary').attr({'data-audit':'0','title':'取消审核'});
						audit.i.addClass('fa-thumbs-up').removeClass('fa-thumbs-down');
					}else{
						msg.type = 'notice';
						audit.it.removeClass('btn-primary').attr({'data-audit':'1','title':'审核'});
						audit.i.removeClass('fa-thumbs-up').addClass('fa-thumbs-down');
					}
				}else{
					msg.title = "错误！";
					msg.type = 'error';
				}
				$.pnotify(msg);
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
		},

		// 批量处理
		action_audits:function(url,audit){

			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: {
					ids:audit.ids,
					audit:audit.audit,
					_cfs:$.cookie('_cfc')
				}
			})
			.done(function(data) {
				console.log("success");
				var msg = {
					title:'',
					text:data.msg,
					type:'',
					delay:3000
				};
				if (data.status == 1 ) {
					msg.title = "OK!";
					if (audit.audit == 1) {
						msg.type = 'success';
						$(audit.its).each(function(i,item){
							$(item).find('.btn-ajax-audit').addClass('btn-primary').attr({'data-audit':'0','title':'取消审核'});
							$(item).find('.fa-thumbs-down').addClass('fa-thumbs-up').removeClass('fa-thumbs-down');
						});
					}else{
						msg.type = 'notice';
						$(audit.its).each(function(i,item){
							$(item).find('.btn-ajax-audit').removeClass('btn-primary').attr({'data-audit':'1','title':'审核'});
							$(item).find('.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-down');
						});
					}
				}else{
					msg.title = "错误！";
					msg.type = 'error';
				}
				$.pnotify(msg);
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
		},

		// 审核 inc_ui_audit.php
		btn_audit:function(url){
			$(".select-list").delegate('.btn-ajax-audit', 'click', function(event) {
				event.preventDefault();
				var audit = {
					ids:$(this).attr('data-id'),
					audit:$(this).attr('data-audit'),
					it:$(this),
					i:$(this).children('i')
				};

				ui.action_audit(url,audit);

			});
			// 选择审核
			$('a#btn-audit').on('click', function(event) {
				event.preventDefault();
				var status =1;
				if ($(this).attr('data-audit') !== undefined) {
					status = $(this).attr('data-audit');
				}
				var ids = "";
				// 上两层
				var row = $('.select-list input:checked[type="checkbox"].select-it').parent().parent();
				$('.select-list input:checked[type="checkbox"].select-it').each(function(i,item){
					if (i) {
						ids += ',';
					}
					ids += item.value;
				});
				var audit = {
					ids:ids,
					audit:status,
					its:row
				};
				if (ids) {
					bootbox.confirm("确认审核所选择的部分?", function(result) {
						if (result) {
							ui.action_audits(url,audit);
						}
					});
				}else{
					bootbox.alert('还没有做任何的选择！');
				}
			});
		},

		// 推荐 inc_ui_flag.php
		btn_flag:function(url){
			$(".select-list").delegate('.btn-ajax-flag', 'click', function(event) {
				event.preventDefault();
				var flag = {
					id:$(this).attr('data-id'),
					flag:$(this).attr('data-flag'),
					it:$(this),
					i:$(this).children('i')
				};
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						ids:flag.id,
						flag:flag.flag,
						_cfs:$.cookie('_cfc')
					}
				})
				.done(function(data) {
					console.log("success");
					var msg = {
						title:'',
						text:data.msg,
						type:'',
						delay:3000
					};
					if (data.status == 1 ) {
						msg.title = "OK!";
						if (flag.flag == 1) {
							msg.type = 'success';
							flag.it.addClass('btn-primary').attr({'data-flag':'0','title':'取消推荐'});
						}else{
							msg.type = 'notice';
							flag.it.removeClass('btn-primary').attr({'data-flag':'1','title':'推荐'});
						}
					}else{
						msg.title = "错误！";
						msg.type = 'error';
					}
					$.pnotify(msg);
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
			});
			// TODO: 批量处理, 服务端已经支持
		},
		// 推荐 inc_ui_copy.php
		btn_copy:function(url){
			$(".select-list").delegate('.btn-ajax-copy', 'click', function(event) {
				event.preventDefault();
				var copy = {
					id:$(this).attr('data-id')
					,it:$(this)
					,i:$(this).children('i')
				};
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						ids:copy.id
						,_cfs:$.cookie('_cfc')
					}
				})
				.done(function(data) {
					console.log("success");
					var msg = {
						title:''
						,text:data.msg
						,type:''
						,delay:3000
					};
					if (data.status == 1 ) {
						msg.title = "OK!";
					}else{
						msg.title = "错误！";
						msg.type = 'error';
					}
					$.pnotify(msg);
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
			});
			// TODO: 批量处理, 服务端已经支持
		},

		// 显示|隐藏 inc_ui_show.php
		btn_show:function(url){
			$(".select-list").delegate('.btn-ajax-show', 'click', function(event) {
				event.preventDefault();
				var showit = {
					id:$(this).attr('data-id'),
					show:$(this).attr('data-show'),
					it:$(this),
					i:$(this).children('i')
				};
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {
						ids:showit.id,
						show:showit.show,
						_cfs:$.cookie('_cfc')
					}
				})
				.done(function(data) {
					console.log("success");
					var msg = {
						title:'',
						text:data.msg,
						type:'',
						delay:3000
					};
					if (data.status == 1 ) {
						msg.title = data.msg;
						if (showit.show == 1) {
							msg.type = 'success';
							showit.it.addClass('btn-primary').attr('data-show','0');
							showit.i.addClass('fa-eye').removeClass('fa-eye-slash');
						}else{
							msg.type = 'notice';
							showit.it.removeClass('btn-primary').attr('data-show','1');
							showit.i.removeClass('fa-eye').addClass('fa-eye-slash');
						}
					}else{
						msg.title = "错误！";
						msg.type = 'error';
					}
					$.pnotify(msg);
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
			});
			// TODO: 批量处理
		},

		// 排序， ajax地址，节点位置
		sortable:function(url,noteSort,sortby){
			if (noteSort instanceof String) {
				noteSort = $(noteSort);
			}else if(noteSort instanceof Array || noteSort instanceof Node){
				noteSort = noteSort;
			}else{
				noteSort = $(".sort-list");
			}

			if (sortby === undefined || !sortby) {
				sortby = "desc";
			}

			// 拖动排序
			noteSort.sortable({
				update: function (event, ui) {
					var orderID= $(this).sortable("toArray",{attribute:"data-id"}).toString();
					var orderSort = $(this).sortable("toArray",{attribute:"data-sort"}).toString();
					$.ajax({
						url: url,
						type: 'GET',
						dataType: 'json',
						data: {
							ids: orderID,
							sort: orderSort,
							sortby:sortby
						}
					})
					.done(function(data) {
						console.log("success");
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
				},
				// 对 tr 宽度处理
				helper:function(e, ui) {
					ui.children().each(function() {
						$(this).width($(this).width());
					});
					return ui;
				}
			}).disableSelection();
		},

		// input 输入后异步修改
		sort_change:function(url){
			$('input.sortid').on('keyup',function(event){
				var id = $(this).attr('data-id');
				var sortid = $(this).val();

				$.ajax({
					url: url,
					type: 'get',
					dataType: 'json',
					data: {
						id: id,
						sortid:sortid
					}
				})
				.done(function(data) {
					var msg = {};
					msg.title = data.msg;
					if (data.status == 1 ) {
						msg.type = 'success';
					}else{
						msg.type = 'notice';
					}
					$.pnotify(msg);
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
			});
		},

		// for theme 图标切换
		iconcg:function(list,color){
			$.each(list, function(index, val) {
				$(val).addClass('icon-white');
			});
		}

	};

	return ui;
});
