function Revolve(obj, Num){
	var $Scroll    = obj.find(".scroll"),
		$List      = $Scroll.find("ul"),
		$Box       = $Scroll.find("li"),
		InitWidth  = 484,
		InitHeight = 368,
		$Prev      = obj.find(".prev"),
		$Next      = obj.find(".next"),
		$Title     = obj.find(".tips"),
		BL         = true

	// 定义数组：Width(InitWidth * scale) / Left / Top(InitHeight * (1 - scale) / 2 ) / Z-index
	numbers = [
		[InitWidth * 0.51, 0, InitHeight * 0.245, 1],
		[InitWidth * 0.73, 106, InitHeight * 0.135, 2],
		[InitWidth, 275, 0, 3],
		[InitWidth * 0.73, 574, InitHeight * 0.135, 2],
		[InitWidth * 0.51, 788, InitHeight * 0.245, 1]
	]

	// $Box默认样式 scale : 0; opacity: 0;
	$Box.stop().transition({
		scale : 1,
		opacity : 1
	}, 400, "linear", function(){
		$Box.css("opacity", 0)
		if(Num == 1){
			$Box.eq(0).css("opacity", "1")
			$Scroll.height($Box.find("img").height())
			$Title.html($Box.eq(0).data("title"))
		}
		if(Num == 3){
			$Box.eq(1).css("opacity", "1")
			for (var i = 0; i < 3; i++) {
				$Box.eq(i).css("z-index", numbers[i + 1][3]).stop().animate({
					width : numbers[i + 1][0],
					left  : numbers[i + 1][1],
					top   : numbers[i + 1][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html($Box.eq(1).data("title"))
		}
		if(Num == 5){
			$Box.eq(2).css("opacity", "1")
			for (var i = 0; i < 5; i++) {
				$Box.eq(i).css("z-index", numbers[i][3]).stop().animate({
					width : numbers[i][0],
					left  : numbers[i][1],
					top   : numbers[i][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html($Box.eq(2).data("title"))
		}
	})
	
	$Next.on('click', Next)
	function Next(){
		if(Num == 1){
			$List.find("li:first").stop().animate({
				left : 100 + '%',
				opacity : 0
			}, 400, "linear")
			$List.find("li:last").prependTo($List).css("left", - 100 + '%').stop().animate({
				left : 0,
				opacity : 1
			}, 400, "linear")
			$Title.html(obj.find("li").eq(0).data("title"))
			return
		}
		if(Num == 3){
			$List.find("li:last").prependTo($List).css("z-index", numbers[0][3]).stop().animate({
				width : numbers[1][0],
				left  : numbers[1][1],
				top   : numbers[1][2],
				opacity : 1
			}, 400, "linear")
			for (var i = 0; i < 3; i++) {
				obj.find("li").eq(i).css("z-index", numbers[i + 1][3]).stop().animate({
					width : numbers[i + 1][0],
					left  : numbers[i + 1][1],
					top   : numbers[i + 1][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html(obj.find("li").eq(1).data("title"))
		}
		if(Num == 5){
			$List.find("li:last").prependTo($List).css("z-index", numbers[0][3]).stop().animate({
				width : numbers[0][0],
				left  : numbers[0][1],
				top   : numbers[0][2],
				opacity : 1
			}, 400, "linear")
			for (var i = 0; i < 5; i++) {
				obj.find("li").eq(i).css("z-index", numbers[i][3]).stop().animate({
					width : numbers[i][0],
					left  : numbers[i][1],
					top   : numbers[i][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html(obj.find("li").eq(2).data("title"))
		}
		obj.find("li").eq(Num).css({
			opacity : 0,
			left : numbers[2][1],
			top  : 0,
			width : InitWidth
		})
	}
	$Prev.on('click', Prev)
	function Prev(){
		if(Num == 1){
			$List.find("li:first").stop().animate({
				left : - 100 + '%',
				opacity : 0
			}, 400, "linear").appendTo($List)
			$List.find("li:first").css("left", 100 + '%').stop().animate({
				left : 0,
				opacity : 1
			}, 400, "linear")
			$Title.html(obj.find("li").eq(0).data("title"))
			return
		}
		obj.find("li").eq(0).css({
			opacity : 0,
			left : numbers[2][1],
			top  : 0,
			width : InitWidth
		}).appendTo($List)
		if(Num == 3){
			for (var i = 0; i < 3; i++) {
				obj.find("li").eq(i).css("z-index", numbers[i + 1][3]).stop().animate({
					width : numbers[i + 1][0],
					left  : numbers[i + 1][1],
					top   : numbers[i + 1][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html(obj.find("li").eq(1).data("title"))
		}
		if(Num == 5){
			for (var i = 0; i < 5; i++) {
				obj.find("li").eq(i).css("z-index", numbers[i][3]).stop().animate({
					width : numbers[i][0],
					left  : numbers[i][1],
					top   : numbers[i][2],
					opacity : 1
				}, 400, "linear")
			};
			$Title.html(obj.find("li").eq(2).data("title"))
		}
	}

	touch.on(obj, "swipeleft", function(){
		Prev()
	})
	touch.on(obj, "swiperight", function(){
		Next()
	})

	// 响应部分
	// window.onresize = function(){
	// 	$Next.off('click', Next)
	// 	$Prev.off('click', Prev)
	// 	$(".revolve li").attr("style", "")
	// 	if($(window).width() > 1220){
	// 		Revolve($(".leadership .revolve"), 5)
	// 	}else if($(window).width() > 1044 && $(window).width() < 1220){
	// 		Revolve($(".leadership .revolve"), 3)
	// 	}else{
	// 		Revolve($(".leadership .revolve"), 1)
	// 	}
	// };
}