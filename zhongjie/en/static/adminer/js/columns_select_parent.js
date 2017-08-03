

/*
// 存储 parent col 栏目
var path_file = '';

$(function () {
	$('.btn-group').delegate('#parent-change','click',function(event){
		event.preventDefault();
		$(this).parent().hide();
		$("#parent-id-cg").css('display', 'inline-block');
	});

	$('#parent-id-cg').delegate(
        'a.dropdown-toggle','mouseover',function(){
            if(!$(this).next().length > 0){
            	(function(prefix,id,fun){
            		var now_id = 0;
            		if (!tools.isEmptyValue($('#id').toArray())) {
            			now_id = $('#id').val();
            		};
            		$.get(
            			ADMINER_URL+"/columns/getcols_ajax/"+id
            			,function(data){
				            var zimenu = $("#"+prefix+id); // 直接使用参数到闭包,防止外部改变即变量污染
				            var menu = '<ul class="dropdown-menu">';
				            li = '';
				            $.each(data,function(i,item){
				            	if (now_id != item.cid) {
				            		if(item.more > 0){
				            			li += '<li  class="dropdown-submenu"> ';
				            		}else{
				            			li += '<li>';
				            		}
				            		li += '<a href="#" data-target="#"';
				            		li += 'tabindex="-1"id="'+prefix+item.cid+'" rel="'+item.cid+'" onclick="'+fun+'(this)" ';
				            		if(item.more > 0){
				            			li += ' class="dropdown-toggle" >';
				            		}else{
				            			li += '>';
				            		}
				            		li += item.ctitle+'</a> </li>';
				            	}
				            });
				            menu += li+'</ul>';
				            zimenu.after(menu);
				        }
			        );
            	})('d',$(this).attr('rel'),'select_change');
            }
            $(this).dropdown();
        }
    );

	// getpath($('#parent_id').val());

	$('#identify').on('keyup',function(){
		// change_temp();
	});

	$('#temp_index').on('keyup',function(){
		var ti_v = false;
	});

	$('#temp_show').on('keyup',function(){
		var ti_v = false;
	});
}); //end jquery


function select_change(it){
	// $(it).preventDefault();
	var pid = $(it).attr('rel');
	$('#parent_id').val(pid);
	$('#parent-id-cg').children('a.btn').children('span.txt').text($(it).text());

	$(it).parents('.btn-group').hide();
	var bg = $(it).parents('.btn-group').prev('.btn-group');
	getpath(pid,bg);
	bg.show();
	// change_temp();
}

function getpath(id,bg) {
	var path_file = '';
	$.get(
		ADMINER_URL+"/columns/getpath_ajax/"+id
		,function(data){
			var str = '';
			$.each(data,function(i,item) {
				path_file += item.identify +'/';
				str +='<a href="#" class="btn btn-primary disabled">';
				str += item.title;
				str +='</a>';
			});
			str += '<a href="#" class="btn" id="parent-change"> 修改所属 </a>';
			bg.html(str);
		}
	);
	return path_file;
}

function change_temp(){
	var i = $('#identify');
	var ti = $('#temp_index');
	var ts = $('#temp_show');

	if (ti_v) {
		ti.val(path_file + i.val() + '.php');
		ts.val(path_file + i.val() + '.php');
	};
}
*/

// 验证表单
