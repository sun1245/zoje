<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page2 a0 pro-main main">
    	<div class="pro-list1">
    		<div class="pro-wrap">
    			<div class="pc">
					<ul class="f-cb">
		    			<li class="d1 f-cb">
		    				<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[0]['photo']); ?>"></div>
		    				<div class="right">
		    					<p class="t1"><?php echo $nlist[0]['title']?></p>
		    					<div class="c1">
		    					<?php echo $nlist[0]['content']?>
		    					</div>
		    					<a href="<?php echo $nlist[0]['link']?>">了解产品</a>
		    				</div>
		    			</li>
		    			<li class="d2 f-cb">
		    				<div class="right">
		    					<p class="t1"><?php echo $nlist[1]['title']?></p>
		    					
		    					<div class="c1"><?php echo $nlist[1]['content']?></div>
		    					<a href="<?php echo $nlist[1]['link']?>">了解产品</a>
		    				</div>
		    				<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[1]['photo']); ?>"></div>
		    			</li>
		    			<li class="d3 f-cb">
		    				<div class="right">
		    					<p class="t1"><?php echo $nlist[2]['title']?></p>
		    					<div class="c1">
		    					<?php echo $nlist[2]['content']?>
		    					</div>
		    					<a href="<?php echo $nlist[2]['link']?>">了解产品</a>
		    				</div>
		    				<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[2]['photo']); ?>"></div>
		    			</li>
		    		</ul>
    			</div>
				<div class="phone swiper-container">
					<ul class="swiper-wrapper">
		    			<li class="d1 f-cb swiper-slide" >
		    				<a href="<?php echo $nlist[0]['link']?>">
								<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[0]['photo']); ?>"></div>
			    				<div class="right">
			    					<p class="t1"><?php echo $nlist[0]['title']?></p>
			    					<div class="c1">
		    							<?php echo $nlist[0]['content']?>
			    					</div>
			    				</div>		    					
		    				</a>
		    				
		    			</li>
		    			<li class="d2 f-cb swiper-slide">
		    				<a href="<?php echo $nlist[1]['link']?>">
		    					<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[1]['photo']); ?>"></div>
			    				<div class="right">
			    					<p class="t1"><?php echo $nlist[1]['title']?></p>
			    					<div class="c1">
		    							<?php echo $nlist[1]['content']?>
			    					</div>
			    				</div>
		    				</a>
		    				
		    			</li>
		    			<li class="d3 f-cb swiper-slide">
		    				<a href="<?php echo $nlist[2]['link']?>">
								<div class="left"><img src="<?php  echo UPLOAD_URL.tag_photo($nlist[2]['photo']); ?>"></div>
			    				<div class="right">
			    					<p class="t1"><?php echo $nlist[2]['title']?></p>
			    					<div class="c1">
		    							<?php echo $nlist[2]['content']?>
			    					</div>
			    				</div>
		    				</a>
		    				
		    			</li>
		    		</ul>
    			</div>				 			
    		</div>
    	</div>
    	<div class="pro-list2">
    		<div class="pro-wrap">
    			<div class="tit">
    				<div class="label1">
    					<div class="label2">
    						<span></span>
    						<p>产品系列</p>
    						<span></span>
    					</div>
    				</div>
    			</div>
    			<div class="page-nav">
    				<div class="label1">
    					<div class="label2">
    						<p <?php if($ctype == 0){echo 'class="on"';} ?>>全部</p>
    						<?php foreach($cctype as $v){?>
    						<span></span>
    						<p data="<?php echo $v['id']?>"  <?php if($ctype == $v['id']){echo 'class="on"';} ?>><?php echo $v['title']?></p>
    						<?php } ?>
    					</div>
    				</div>
    			</div>
    			<select>
    				<option value="0" <?php if($ctype == 0){echo 'selected="selected"';} ?>>全部</option>
    				<?php foreach($cctype as $v){?>
    				<option value="<?php echo $v['id']?>" <?php if($ctype == $v['id']){echo 'selected="selected"';} ?>><?php echo $v['title']?></option>
    				<?php } ?>
    			</select>
    			<div class="wrap">
    			</div>
    		</div>
    	</div>
    </div>
<?php
	echo static_file('web/js/main.js');
    echo static_file('js/tools.js');
?>
    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
$(function(){
	var mySwiper1 = new Swiper ('.pro-list1 .phone.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    // 如果需要分页器
	    // pagination: '.swiper-pagination',
	    autoplay: 2500,
	  }) 
	var bb = '<?php echo $ctype;?>';
	var url = SITE_URL + "/product/pro/" + bb;
    tools.load_page(url,".wrap");
	$(".page-nav p").click(function(){
		if( !$(this).hasClass("on") ){
			var index = $(this).attr('data');
			$(this).addClass("on").siblings().removeClass("on");
			var url = SITE_URL + "/product/pro/" + index;
    		tools.load_page(url,".wrap");
		}
	});

	$(".pro-wrap select").change(function(){
		var index= $(this).val();
		$(this).addClass("on").siblings().removeClass("on");
		var url = SITE_URL + "/product/pro/" + index;
    	tools.load_page(url,".wrap");
		
	});

})
</script>
</body>
</html>