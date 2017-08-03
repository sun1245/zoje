<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page0 a0 index-main main">

    	<div class="banner">
    		<div class="ban-wrap pc">
    			<div class="img">
	    			<ul>
	    				<?php foreach($list as $ke=>$v){?>
	    				<li <?php if($ke==0){echo 'class="on"';}?> >
	    					<img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" url-1920="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>" url-1440="<?php echo UPLOAD_URL.tag_photo($v['photo1']); ?>" data="<?php echo $v['title3']?>">
	    					<div class="font">
	    						<p class="t1"><?php echo $v['title']?></p>
		    					<p class="t2"><?php echo $v['title1']?></p>
		    					<div class="c1">
		    						<p><?php echo str_replace("|", "<span></span>", $v['title2']) ?></p> 
		    					</div>
		    					<a href="<?php echo $v['link']?>">View detail</a>
	    					</div>
	    				</li>
	    				<?php } ?>
	    			</ul>
	    		</div>
	    		<div class="bot">
	    			<div class="label1">
	    				<label class="label2"><p></p></label>
	    			</div>
	    		</div>
    		</div>
    		<div class="ban-wrap phone">
    			<div class="img swiper-container">
	    			<ul class="swiper-wrapper">
	    				<?php foreach($list as $ke=>$v){?>
	    				<li class="swiper-slide">
	    					<div class="font">
	    						<p class="t1"><?php echo $v['title']?></p>
		    					<p class="t2"><?php echo $v['title1']?></p>
		    					<div class="c1">
		    						<p><?php echo str_replace("|", "<span></span>", $v['title2']) ?></p> 
		    					</div>
	    					</div>
	    					<img src="<?php echo UPLOAD_URL.tag_photo($v['photo2']); ?>">
	    					<a href="<?php echo $v['link']?>">View detail</a>
	    				</li>
	    				<?php } ?>
	    			</ul>
	    			<div class="swiper-pagination"></div>
	    		</div>
    		</div>
    	</div>
		
		<div class="index-about f-cb">
			<div class="left">
				<p class="logo"><img src="<?php echo static_file('web/img/index/icon7_05.png')?>"></p>
				<div class="con">
					<div class="label1">
						<div class="label2">
							<p class="p1">ZJ-AM-5775AH-B-K-750</p>
							<p class="p2">We are <font>redefining the sewing machine</font></p>
							<p class="p3">The new ZOJE auto pattern sewing machine</p>
							<a href="">To open a new era of production intelligently</a>
							<div><img src="<?php echo static_file('web/img/index/icon7_09.png')?>"></div>
						</div>
					</div>
				</div>
				<p class="about-link f-cb">
					<a href="javascript:void(0)">It is a garment equipment revolution</a>
					<span></span>
					<a href="javascript:void(0)">One worker can do multiple work instead of operating one machine</a>
					<span></span>
					<a href="javascript:void(0)">Intelligent sewing </a> 
				</p>
			</div>
			<div class="right"><img src="<?php echo static_file('web/img/index/icon9_03.png')?>" url-1920="<?php echo static_file('web/img/index/icon9_03.png')?>" url-1000="<?php echo static_file('web/img/index/icon9_03.png')?>"></div>
		</div>

		<div class="index-product f-cb">
			<div class="left"><img src="<?php echo static_file('web/img/index/icon11_02.png')?>"></div>
			<div class="right">
				<div class="label1">
					<div class="label2">
						<p class="logo"><img src="<?php echo static_file('web/img/index/icon11_05.png')?>"></p>
						<p class="p1">The global sewing equipment production base</p>
						<p class="p2">ZOJE was founded in 1994 with total assets of 2.6 billion</p>
						<div class="con">
							<p>ZOJE has ZHEJIANG province industrial zone, has advanced assemble ,coating, cast,casing process auto equipment in the world,has ZHEJIANG province technology research and development center ,also has research and development center in Europe. International equipment ,advanced science and technology,outstanding quality,forming unique industrial group.</p>
						</div>
						<p class="p3">
							<span>OJE resource stock code:<b>Shenzhen Stock :002021</b></span>
							<a href="<?php echo site_url('about#vision')?>">VIS</a>
							<a href="<?php echo site_url('about#his')?>" class="his">HIS</a>
							<a href="<?php echo site_url('about#hon')?>" class="hon">HON</a>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="index-news f-cb">
			<div class="news-wrap pc">
				<ul class="f-cb">
					<?php foreach($nlist as $ke=>$v){?>
					<li <?php if($ke == 0){?> class="l1"<?php } ?>>
						<div class="left"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
						<div class="right">
							<div class="label1">
								<div class="label2">
									<p class="t1"><?php echo $v['title']?></p>
									<p class="con"><?php echo strcut(strip_tags($v['content']),70); ?></p>
									<div class="line"></div>
									<div class="bot">
										<p class="time"><?php echo date('Y-m-d',$v['timeline']); ?></p>
										<a href="<?php echo site_url('news/info/'.$v['id'])?>">READ MORE</a>
									</div>
									<span></span>
								</div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<div class="news-wrap phone swiper-container">
				<ul class="f-cb swiper-wrapper">
					<?php foreach($nlist as $ke=>$v){?>
					<li class="swiper-slide">
						<div class="left"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
						<div class="right">
							<div class="label1">
								<div class="label2">
									<p class="t1"><?php echo $v['title']?></p>
									<p class="con"><?php echo strcut(strip_tags($v['content']),70); ?></p>
									<div class="line"></div>
									<div class="bot">
										<p class="time"><?php echo date('Y-m-d',$v['timeline']); ?></p>
										<a href="<?php echo site_url('news/info/'.$v['id'])?>">READ MORE</a>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>

var width = $(window).width(),
	size1 = $(".banner .pc .img li").size(),
	count1 = 0,
	str1 = "",
	turn;

$(function(){

	var mySwiper = new Swiper ('.banner .phone .font.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    // 如果需要分页器
	    pagination: '.swiper-pagination',
	    autoplay: 2500,
	  }) 
	var mySwiper1 = new Swiper ('.banner .phone .img.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    // 如果需要分页器
	    pagination: '.swiper-pagination',
	    autoplay: 2500,
	  }) 
	var mySwiper1 = new Swiper ('.index-news .phone.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    // 如果需要分页器
	    pagination: '.swiper-pagination',
	    autoplay: 2500,
	  }) 

})

$(function(){
	if(width < 1440 ){
		$(".banner .pc .img li").each(function(){
			var url = $(this).find("img").attr("url-1440");
			$(this).find("img").attr("src",url);
		});
	}else{
		$(".banner .pc .img li").each(function(){
			var url = $(this).find("img").attr("url-1920");
			$(this).find("img").attr("src",url);
		});
	}

	if( width < 1000 ){
		$(".index-main .index-about .right img").attr("src",$(".index-main .index-about .right img").attr("url-1000"))
	}

	for( var i = 0; i < size1;i++ ){
		if(i == 0){
			str1 += "<span class='on'></span>"
		}else{
			str1 += "<span></span>"
		}
	}



	$(".banner .pc .bot .label2").append(str1);
	$(".banner .pc .bot .label2 p").text( $(".banner .pc .img li:eq(0) img").attr("data") )


	turn = setInterval("banner()",4000);

	$(".banner .pc .bot span").hover(function(){
		clearInterval(turn);
		
	},function(){
		turn = setInterval("banner()",4000);
	});

	$(".banner .pc .bot span").click(function(){
		count1 = $(this).index() - 1;
		console.log(count1)
		$(".banner .pc .bot span").eq(count1).addClass("on").siblings().removeClass("on");
		$(".banner .pc .img li").eq(count1).addClass("hover");
		$(".banner .pc .bot .label2 p").text( $(".banner .pc .img li").eq(count1).find("img").attr("data") )
		setTimeout(function () { 
	        $(".banner .pc .img li").eq(count1).siblings().delay(5000).removeClass("on")
	        $(".banner .pc .img li").eq(count1).addClass("on");
	        $(".banner .pc .img li").eq(count1).removeClass("hover");
	    }, 500);
	});
})

function banner(){
	count1++;
	if( count1 == ( size1 ) ){
		count1 = 0;
	}

	$(".banner .pc .bot span").eq(count1).addClass("on").siblings().removeClass("on");
	$(".banner .pc .img li").eq(count1).addClass("hover");
	$(".banner .pc .bot .label2 p").text( $(".banner .pc .img li").eq(count1).find("img").attr("data") )
	setTimeout(function () { 
        $(".banner .pc .img li").eq(count1).siblings().delay(5000).removeClass("on")
	        $(".banner .pc .img li").eq(count1).addClass("on");
	        $(".banner .pc .img li").eq(count1).removeClass("hover");
    }, 500);
}
</script>
</body>
</html>