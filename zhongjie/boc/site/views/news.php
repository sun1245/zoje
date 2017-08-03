<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page3 a0 main news-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/news/icon1_02.png')?>"></div>
    		<div class="font">
    			<div class="news-wrap">
    				<div class="label1">
    					<p>新闻媒体</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="page-nav">
    		<div class="news-wrap">
    			<a href="javascript:void(0)" class="on" data="1" ><div class="label1"><div class="label2">公司新闻</div></div></a>
    			<a href="javascript:void(0)" data="2"><div class="label1"><div class="label2">行业新闻</div></div></a>
    			<a href="javascript:void(0)" data="3"><div class="label1"><div class="label2">新闻视频</div></div></a>
    		</div>
    	</div>
    	<div class="list1" id="news1">
    		<div class="news-wrap">
    			<p class="tit">公司新闻</p>
    			<div class="news-con">
    				<div class="pc f-cb">
    					<div class="left  swiper-container">
                            <ul class="swiper-wrapper">
                                <?php foreach($news as $v){?>
                                <li class="swiper-slide">
                                    <a href="<?php echo site_url('news/info/'.$v['id'])?>">
                                        <div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
                                        <div class="font"><p><?php echo $v['title']?></p></div>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
	    				</div>
    					<div class="right">
    						<ul>
                                <?php foreach($news as $v){?>
    							<li>
    								<a href="<?php echo site_url('news/info/'.$v['id'])?>">
    									<div class="news-list-time">
	    									<div class="label1">
	    										<div class="label2">
	    											<p class="t1"><?php echo date('d',$v['timeline']); ?></p>
	    											<p class="t2"><?php echo date('Y-m',$v['timeline']); ?></p>
	    										</div>
	    									</div>
	    								</div>
	    								<div class="news-list-main">
	    									<div class="label1">
	    										<div class="label2">
	    											<p><?php echo $v['title']?> </p>
	    										</div>
	    									</div> 
	    								</div>
    								</a>
    							</li>
                                <?php } ?>
    						</ul>
    					</div>
    				</div>
    				<div class="phone swiper-container">
    					<ul class="swiper-wrapper">
                            <?php foreach($news as $v){?>
    						<li class="swiper-slide">
    							<a href="<?php echo site_url('news/info/'.$v['id'])?>">
    								<div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
			    					<p class="t1"><?php echo $v['title']?></p>
			    					<p class="c1"><?php echo strcut(strip_tags($v['content']),35); ?></p>
			    					<p class="time"><?php echo date('Y-m-d',$v['timeline']); ?></p>
    							</a>
    						</li>
                            <?php } ?>
    					</ul>
    				</div>
    			</div>
                <?php if($size > 0){?>
    			<div class="more-list">
                    <ul class="f-cb"></ul>
    				<p class="more">查看更多</p>
    			</div>
                <?php } ?>
    		</div>
    	</div>
    	<div class="list2" id="news2">
    		<div class="news-wrap">
    			<p class="tit">行内新闻</p>
    			<div class="d1">
	    			<ul class="f-cb">
                        <?php foreach($news2 as $v){?>
	    				<li>
	    					<a href="<?php echo site_url('news/info/'.$v['id'])?>">
                                <div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
                                <p class="t1"><?php echo $v['title']?></p>
                                <p class="c1"><?php echo strcut(strip_tags($v['content']),35); ?></p>
                                <p class="time"><?php echo date('Y-m-d',$v['timeline']); ?></p>
                            </a>
                        </li>
                        <?php } ?>
	    			</ul>
    			</div>
                <?php if($size1 > 0){?>
    			<div class="more-list">
    				<p class="more">查看更多</p>
    			</div>
                <?php } ?>
    		</div>
    	</div>
    	<div class="list3" id="video">
    		<div class="news-wrap">
    			<p class="tit">新闻视频</p>
    			<div class="d1">
    				<ul class="f-cb">
                        <?php foreach($video as $v){?>
    					<li>
    						<a href="<?php echo UPLOAD_URL.tag_photo($v['files']); ?>">
    							<div class="img"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
    							<div class="font">
    								<div class="label1">
    									<div class="laebl2"><img src="<?php echo static_file('web/img/news/icon5_03.png')?>"></div>
    								</div>
    							</div>
    						</a>
    					</li>
                        <?php } ?>
    				</ul>
    			</div>
                <?php if($size2 > 0){?>
    			<div class="more-list">
    				<p class="more">查看更多</p>
    			</div>
                <?php } ?>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
$(function(){
	var mySwiper1 = new Swiper ('.list1 .phone.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    // 如果需要分页器
	    pagination: '.swiper-pagination',
	    autoplay: 2500,
	  }) 
    var mySwiper1 = new Swiper ('.list1 .pc .swiper-container', {
        direction: 'horizontal',
        loop: true,
        // 如果需要分页器
        // pagination: '.swiper-pagination',
        autoplay: 5000,
      })
    var Page = 0,
    MaxPage = <?php echo $size;?>;
	$(".list1 .more-list .more").click(function(){
		var url = "<?php echo site_url('news/more/2'); ?>";
        Page ++ 
        if(Page == MaxPage){
            $(this).hide()
        }
		$.ajax({
            url: url,
            type: 'get',
            cache: false, 
            dataType: 'html',
            data: {page: Page},
            success:function(html){
            	$(".list1 .more-list ul").append(html)
            }
        })
        return false;
	});

    $(".news-main .page-nav a").click(function(){
        if( !$(this).hasClass("on") ){
            var index = $(this).attr("data");
            var hright = $(".list" + index).offset().top;
            console.log(index + ";" + hright)
            $('body,html').animate({ scrollTop: hright }, 200); 
        }
    });
    var Page1 = 0,
    MaxPage1 = <?php echo $size1;?>;
	$(".list2 .more-list .more").click(function(){
		var url = "<?php echo site_url('news/more/15'); ?>";
        Page1 ++ 
        if(Page1 == MaxPage1){
            $(this).hide()
        }
		$.ajax({
            url: url,
            type: 'get',
            cache: false, 
            dataType: 'html',
            data: {page: Page1},
            success:function(html){
            	$(".list2 .d1 ul").append(html)
            }
        })
        return false;
	});

    var Page2 = 0,
    MaxPage2 = <?php echo $size2;?>;
	$(".list3 .more-list .more").click(function(){
		var url = "<?php echo site_url('news/video'); ?>";
        Page2 ++ 
        if(Page2 == MaxPage2){
            $(this).hide()
        }
		$.ajax({
            url: url,
            type: 'get',
            cache: false, 
            dataType: 'html',
            data: {page: Page2},
            success:function(html){
            	$(".list3 .d1 ul").append(html)
            }
        })
        return false;
	});
})
</script>
</body>
</html>