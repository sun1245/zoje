$(function(){
	var n = $(".banner li").length
	$(".banner li").each(function(){
		var _this = $(this),
			src = _this.attr("data-img"),
			img = new Image();
		img.src = src;
		//处理ff下会自动读取缓存图片
		if(img.complete || img.width){
			_this.attr("style","background:url("+src+") no-repeat center");
			n -- ;
			if(n == 0){
				banner();
			}
		    return;
		}
		$(img).load(function(){
			_this.attr("style","background:url("+src+") no-repeat center");
			n -- ;
			if(n == 0){
				banner();
			}
		});
	})
})
function banner(){
	//初始化banner样式
	var listN = $(".banner li").length;
	$(".loader").stop().fadeOut(1000);
	$(".banner li").eq(0).fadeIn(1000);
	for (var i = 0; i < listN; i++) {
		$(".banner .btns").append('<span class="span'+i+' fl"></span>');
	};
	$(".banner .btns").css("margin-left",-$(".btns").width()/2);
	$(".banner .btns span").eq(0).addClass("cur");
	

	// 执行效果
	var sw = 1;
	$(".banner .btns span").mouseover(function(){
		sw = $(this).index();
		myShow(sw);
	});
	function myShow(i){
		$(".banner .btns span").eq(i).addClass("cur").siblings("span").removeClass("cur");
		$(".banner li").eq(i).stop(true,true).fadeIn(1000).siblings().stop(true,true).fadeOut(1000);
	}
	// 滑入停止动画，滑出开始动画
	$(".banner").hover(function(){
		if(myTime){
		   clearInterval(myTime);
		}
	},function(){
		clearInterval(myTime);
		myTime = setInterval(function(){
			myShow(sw);
			sw++;
			if(sw == listN){sw = 0;}
		}, 5000);
	});
	// 自动开始, 创建定时器
	var myTime = setInterval(function(){
		myShow(sw);
		sw++;
		if(sw == listN){sw = 0;}
	}, 5000);
}