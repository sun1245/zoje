require(['jquery'],function($){
	$('.checkall').on('click',function(){
		var _this = $(this)[0];
		var list = $(_this).parent('h3').next('ul.boxed-list').find('input:checkbox');
		if (_this.checked) {
			$(list).each(function(i,item){
				this.checked = true;
			});
		}else{
			$(list).each(function(i,item){
				this.checked = false;
			});
		}
	});

	$('.checkline').on('click',function(){
		var _this = $(this)[0];
		var list = $(_this).parent('li').find('.btn-group input:checkbox');
		if (_this.checked) {
			$(list).each(function(i,item){
				this.checked = true;
			});
		}else{
			$(list).each(function(i,item){
				this.checked = false;
			});
		}
	});
});
