<div class="news-wrap">
	<!-- 瀑布流 -->
	<div class="newswarp2">
		<div class="main" id="newsmain"></div>
		<div class="loadbg load-bot">
			<div class="loader"></div>
		</div>
	</div>

</div>
<script>
	$(function(){
		$('.header a').eq(1).addClass('on');
		if ($(".newswarp2 .box").length == 0) {
			$(".load-top,.load-bot").hide();
		}else if ($(".newswarp2 .box").length < 12) {
			$(".load-bot").hide();
		};

		$(window).load(function(){
			var u='<?php echo site_url('news/modelajax'); ?>';
			$('.newswarp2 .main').load(u);
		})

		var p = 0;
		$(window).scroll(function(){
			if($(document).height()-$(this).scrollTop()-$(this).height()<50){
				p += 1;
        //加载一页
        $.ajax({
        	url: '<?php echo site_url('news/modelajax'); ?>',
        	type: 'get',
        	cache: false,
        	dataType: 'html',
        	data: {page:p},
        	beforeSend:function(){
        		$('.loadbg').show();
        	},
        	success:function(html){
        		$('.loadbg').hide();
        		$('.newswarp2 .main').append(html);
        		waterFall("main");
        	}
        })
        return false;
    }
})

	})
	function waterFall(element,space,children) {
		if(!element) return ;
		space = space || 10 ;
children = children || "div" ;        //前三行默认设置，分别为外框元素id，上下留白，子元素标签名(子元素标签名使用太多或出错)
var wrap = document.getElementById(element) ;
var water = wrap.getElementsByTagName(children) ;
var spaceWidth = water[0].offsetWidth ;        //获取子元素宽度(offsetWidth会获取块级元素的padding和border)
var wrapWidth = wrap.offsetWidth ;        //获取外框元素宽度
var colNum = Math.floor(wrapWidth/spaceWidth) ;        //计算获取外框元素所能承受列数
var padding = Math.floor((wrapWidth - colNum*spaceWidth)/(colNum+1)) ;        //计算外框元素剩余宽度并计算左右留白
var column = new Array() ;
var length = water.length ;
var maxHeight = 0 ;
for(var i=0;i<colNum;i++) {        //初始化数组来计算各列初始top值和left值
	column[i] = new Array() ;
	column[i].top = space ;
        column[i].left = (spaceWidth * i)+padding*(i+1) ;        //计算各列距离左侧距离
    }
for(var i=0;i<length;i++) {        //遍历所有子元素及瀑布流布局
        var index = i+1 ;        //计算该子元素属于第几列
        if(index%colNum==0) {
        	sub = colNum ;
        } else {
        	sub = index%colNum ;
        }
        _this = water ;
        _this[i].style.position = "absolute" ;
        _this[i].style.top = column[sub-1].top + "px" ;
        _this[i].style.left = column[sub-1].left + "px" ;
        column[sub-1].top += _this[i].offsetHeight + space ;        //计算各列最新高度以便赋值
    }
for(var i=0;i<colNum;i++) {        //获取瀑布流整体布局高度
	if(column[i].top > maxHeight) maxHeight = column[i].top ;
}
wrap.style.height = maxHeight+"px" ;        //给外框元素赋值以防止出现子元素溢出外框元素
}
</script>