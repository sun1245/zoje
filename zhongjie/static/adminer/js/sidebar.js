$(function(){
	// 注册 mouseover 
    $('#side-bar').delegate(
        'a.dropdown-toggle','mouseover',function(){
            if(!$(this).next().length > 0){

                // 获得表单,并生成-li-列表
                (function(prefix,id,fun){
                    $.get(
                        ADMINER_URL+"/columns/getcols_ajax/"+id
                        ,function(data){
                            zimenu = $("#"+prefix+id); // 直接使用参数到闭包,防止外部改变
                            menu = '<ul class="dropdown-menu">';
                            li = '';
                            console.log(data);
                            $.each(data,function(i,item){
                                if(item.more > 0){
                                    li += '<li  class="dropdown-submenu"> ';
                                }else{
                                    li += '<li>';
                                }
                                li += '<a href="'+ADMINER_URL+item.controller+"/index/"+item.cid+'" data-target="#"  onclick="'+fun+'(this)"';
                                if(item.more > 0){
                                    li += 'tabindex="-1" class="dropdown-toggle" id="'+prefix+item.cid+'" rel="'+item.cid+'"> ';
                                }else{
                                    li += '>';
                                }
                                li += item.ctitle+'</a> </li>';
                            });
                            menu += li+'</ul>';
                            zimenu.after(menu);
                        }  
                    );
                })('c',$(this).attr('rel'),'selfto');
            }
            $(this).dropdown();
        } 
    );

    // $('#side-bar').affix(); 
});
