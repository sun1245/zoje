// 图片预加载
$(function(){
	$("img").addClass("lazy");
	var imgSize = $("img").size();
	var array = {};
	for( var i = 0; i < imgSize; i++ ){
		array[i] = $("img").eq(i).attr("src");
	}
	// console.log(array)
	_PreLoadImg(array,function(){})
})

// 内页头部及导航
$(function(){
	var width = $(window).width(),
		clas = $(".main").attr("class"),
		page1 = clas.substr(4,1),
		page2 = clas.substr(7,1);
	

	$(".header .header-main.pc .main-wrap .nav .nav-list").eq(page1).addClass("hover")
})
