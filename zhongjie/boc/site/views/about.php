<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page1 a0 about-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/about/icon1_02.png')?>"></div>
    		<div class="font">
    			<div class="about-wrap">
    				<div class="label1">
    					<p>关于我们</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="about-intro" id="intro">
    		<div class="about-wrap">
    			<div class="tit">
    				<p class="tit-en">introduction</p>
    				<div class="tit-ch">
    					<div class="label1">
    						<div class="label2">
    							<span></span>
    							<p>公司介绍</p>
    							<span></span>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="intro-main f-cb">
    				<div class="intro-part1"><img src="<?php echo UPLOAD_URL.tag_photo($photo1); ?>"></div>
    				<div class="intro-part2">
                        <?php echo $content1;?>
    				</div>
    				<div class="intro-part4"><img src="<?php echo UPLOAD_URL.tag_photo($photo2); ?>"></div>
    				<div class="intro-part3">
                        <?php echo $content2;?>
    					<!-- <p class="t2">中捷，全球化品牌战略</p>
    					<p class="c1">外向型、集约化、国际化<br>全球服饰行业机电一体化设备解决方案运营商</p>
    					<p class="c1">中捷多渠道打造国际名牌，实施国际化人才战略，构建科研开发网络，装备国际先进的生产线，拓展国际化营销网络，以服务创新赢得用户，强化品牌形象，构建完美供应链打造价值优势，始终坚持“品质成就卓越”的经营理念，遵循“共同的中捷、共同的事业”企业价值观，努力打造中捷成为全球服饰行业机电一体化设备解决方案运营商，为改善人类衣饰文化而努力奋斗。</p> -->
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="about-vision" id="vision">
    		<div class="con">
    			<div class="about-wrap">
	    			<div class="tit">
	    				<p class="tit-en">vision</p>
	    				<div class="tit-ch">
	    					<div class="label1">
	    						<label class="label2">
	    							<span></span>
	    							<p>企业愿景</p>
	    							<span></span>
	    						</label>
	    					</div>
	    				</div>
	    			</div>
	    			<div class="vision-main">
	    				<ul class="f-cb">
	    					<li class="l1">
	    						<div><img src="<?php echo static_file('web/img/about/icon5_09.png')?>"></div>
	    						<p class="p1">经营理念</p>
	    						<p class="p2">始终坚持“品质成就卓越”的经营理念</p>
	    					</li>
	    					<li class="l2">
	    						<div><img src="<?php echo static_file('web/img/about/icon6_06.png')?>"></div>
	    						<p class="p1">企业价值观</p>
	    						<p class="p2">遵循“共同的中捷、共同的事业”企业价值观</p>
	    					</li>
	    					<li class="l3">
	    						<div><img src="<?php echo static_file('web/img/about/icon4_03.png')?>"></div>
	    						<p class="p1">企业愿景</p>
	    						<p class="p2">努力打造中捷成为全球服饰行业机电一体化设备解决方案运营商，为改善人类衣饰文化而努力奋斗。</p>
	    					</li>
	    				</ul>
	    			</div>
	    		</div>
    		</div>
    	</div>

    	<div class="about-history" id="his">
    		<div class="about-wrap">
				<div class="tit">
    				<p class="tit-en">history</p>
    				<div class="tit-ch">
    					<div class="label1">
    						<label class="label2">
    							<span></span>
    							<p>发展历程</p>
    							<span></span>
    						</label>
    					</div>
    				</div>
    			</div>
    			<div class="his-main f-cb">
                    <div class="pc">
                        <div class="prev"></div>
                        <div class="mid">
                            <div class="line"></div>
                            <ul>
                                <?php foreach($flist as $v){?>
                                <li>
                                    <span class="s2"></span>
                                    <div class="his-list">
                                        <p class="t1"><?php echo $v['title']?></p>
                                        <div class="c1">
                                            <p><?php echo $v['content']?></p>
                                        </div>
                                        <span class="s1"></span>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="next"></div>                        
                    </div>
                    <div class="phone">
                        <div class="mid  swiper-container">
                            <div class="line"></div>
                            <ul class="swiper-wrapper">
                                <?php foreach($flist as $v){?>
                                <li class="swiper-slide">
                                    <span class="s2"></span>
                                    <div class="his-list">
                                        <p class="t1"><?php echo $v['title']?></p>
                                        <div class="c1">
                                            <p><?php echo $v['content']?></p>
                                        </div>
                                        <span class="s1"></span>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>                     
                    </div>    				
    			</div>
    		</div>
    	</div>

        <div class="about-honor" id="hon">
            <div class="about-wrap">
                <div class="tit">
                    <p class="tit-en">honor</p>
                    <div class="tit-ch">
                        <div class="label1">
                            <label class="label2">
                                <span></span>
                                <p>企业荣誉</p>
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>                
                <div class="hon-main">
                    <div class="pc f-cb">
                        <div class="mid">
                            <ul>
                                <?php foreach($qlist as $v){?>
                                <li>
                                    <div class="img">
                                        <div class="label1">
                                            <div class="label2"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="font">
                                        <div class="label1">
                                            <div class="label2"><p><?php echo $v['title']?></p></div>
                                        </div>                                        
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="prev"></div>
                        <div class="next"></div>
                    </div>
                    <div class="phone">
                        <div class="mid swiper-container">
                            <ul class="swiper-wrapper">
                                <?php foreach($qlist as $v){?>
                                <li class="swiper-slide">
                                    <div class="img">
                                        <div class="label1">
                                            <div class="label2"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="font">
                                        <div class="label1">
                                            <div class="label2"><p><?php echo $v['title']?></p></div>
                                        </div>                                        
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
var width = $(window).width();
var size1 = $(".his-main .pc li").size(),
    count1 = 0,
    width1 = 300,
    size11 = 4;
var size2 = $(".hon-main .pc li").size(),
    count2 = 0,
    width2 = 420;
if( width > 1310 ){
    width1 = 300
    size11 = 4;
}else{
    width1 = 920/3;
    size11 = 3;
    width2 = 330;
}
$(function(){
    var mySwiper1 = new Swiper ('.about-history .phone .swiper-container', {
        direction: 'horizontal',
        loop: true,
        // 如果需要分页器
        pagination: '.swiper-pagination',
        autoplay: 2500,
      })    
    var mySwiper2 = new Swiper ('.about-honor .phone .swiper-container', {
        direction: 'horizontal',
        loop: true,
        // 如果需要分页器
        pagination: '.swiper-pagination',
        autoplay: 2500,
      })  
    $(".about-history .his-main ul").width( (size1 + 1) * width1 )
    $(".about-honor .hon-main .pc ul").width( (size2 + 1) * width2 )
	$(".about-history .his-main li").each(function(){
        var index = $(this).index();
        if( index % 2 == 0 ){
            $(this).addClass("bot");
        }else{
            $(this).addClass("top");
        }
    });

    $(window).resize(function(){
        width = $(window).width();
        if( width > 1310 ){
            width1 = 300
        }else{
            width1 = 920/3;
            width2 = 330;
        }
        $(".about-history .his-main ul").width( (size1 + 1) * width1 )
    });

    $(".about-history .his-main .prev").click(function(){
        if( count1 > 0 ){
            count1--;
            $(".about-history .his-main ul").css("left",-count1*width1);
        }
    });

    $(".about-history .his-main .next").click(function(){
        if( count1 < (size1 - size11) ){
            count1++;
            $(".about-history .his-main ul").css("left",-count1*width1);
        }
    });

    $(".about-honor .hon-main .prev").click(function(){
        if( count2 > 0 ){
            count2--;
            $(".about-honor .hon-main .pc ul").css("left",-count2*width2);
        }
    });

    $(".about-honor .hon-main .next").click(function(){
        if( count2 < (size2 - 3) ){
            count2++;
            $(".about-honor .hon-main .pc ul").css("left",-count2*width2);
        }
    });
    var top = $(".about-vision").offset().top;
    var height = $(".about-vision").height();
    if( $(document).scrollTop() > ( top -height)){
        $(".about-vision .vision-main").addClass("list");
    }

    $(window).scroll(function(){
        top = $(".about-vision").offset().top;
        height = $(".about-vision").height();
        if( $(document).scrollTop() > ( top -height)){
            $(".about-vision .vision-main").addClass("list");
        }
    });
})
</script>
</body>
</html>