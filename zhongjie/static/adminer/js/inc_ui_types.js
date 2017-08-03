
"use strict";
// cid 和 表单字段
ui.coltypes = function(cid,field){
	var coltypes= {
		cid : cid 
		,field: field
		,list :[]
	};

	$.ajax({
		url: ADMINER_URL+'coltypes/index/',
		type: 'GET',
		dataType: 'json',
		data: {
			cid: coltypes.cid
			,field:coltypes.field
		},
	})
	.done(function(data) {
		console.log("success");
		if (data.status ==1) {
			coltypes.list = data.list; 
			var html = template.render('tpl-coltypes', coltypes)
		    $('#js-coltypes-'+field+'-body').html(html);
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
	$('.btn-coltypes').on('click',function(event){
        event.preventDefault(); 
        var cid = $(this).data('cid');
        var field = $(this).data('field');
        var title = $(this).attr('title');

		ui.coltypes(cid,field);
        // 处理
        $('#js-coltypes-'+field).children('.modal').modal();
    });

	// 添加
	$('.js-modal-conltypes').delegate('.js-coltypes-add', 'click', function(event) {
        event.preventDefault(); 

        var cid =  $(this).data('cid');
        var field =  $(this).data('field');
        var title = $('#'+field+"-title").val();
        var value = $('#'+field+"-value").val();

        $.ajax({
        	url: ADMINER_URL+'coltypes/create',
        	type: 'POST',
        	dataType: 'JSON',
        	data: {
        		cid:cid
        		,name:field
        		,title:title
        		,value:value
        		,_cfs:$.cookie('_cfc')
        	},
        })
        .done(function(data) {

			var msg = {
				title:''
				,text:data.msg
				,type:''
				,delay:3000
			};
			if (data.status == 1 ) {
				msg.title = "OK!";
				msg.type = 'success';
				ui.coltypes(cid,field);
			}else{
				msg.title = "错误！";
				msg.type = 'error';
			}
			$.pnotify(msg);

        	console.log("success");
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

	// 编辑
	$('.js-modal-conltypes').delegate('js-coltypes-edit', 'click', function(event) {
        event.preventDefault(); 
        var cid =  $(this).data('cid');
        var field =  $(this).data('field');

	});

	// 删除
	$('.js-modal-conltypes').delegate('js-coltypes-del', 'click', function(event) {
        event.preventDefault(); 
        var cid =  $(this).data('cid');
        var field =  $(this).data('field');

	});

});