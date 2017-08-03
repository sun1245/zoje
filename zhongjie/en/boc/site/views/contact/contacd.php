<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page7 a1 contact-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/pro/icon2_02.png')?>"></div>
    		<div class="font">
    			<div class="con-wrap">
    				<div class="label1">
    					<p>Contact us</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="page-nav">
    		<div class="con-wrap">
                <a href="<?php echo site_url('contact')?>" ><div class="label1"><div class="label2">Domestic marketing</div></div></a>
                <a href="<?php echo site_url('contact/contacd')?>" class="on"><div class="label1"><div class="label2">Overseas Marketing</div></div></a>
                <a href="<?php echo site_url('contact/service')?>"><div class="label1"><div class="label2">Z+Service</div></div></a>
                <a href="<?php echo site_url('contact/partner')?>"><div class="label1"><div class="label2">Partners</div></div></a>
    		</div>
    	</div>
    	<div class="list1">
    		<div class="con-wrap">
    			<p class="tit">Overseas Marketing</p>
    			<div class="con">
                    <?php echo $content;?>
    				<!-- <p class="p1">中捷国际化之路</p>
    				<p><br><br>中捷实施全球化品牌战略，走国际化品牌发展之路，打造成为全球缝制设备运营商。<br>随着中捷在国内和全球缝制设备产业中的地位迅速上升，加强与国际服装品牌的合作，不断以尖端技术切入国际市场，努力开发机电一体化的高附加值、高品质、高科技、具有核心技术的创新产品服务“世界服装工厂”。<br><br><br></p> -->
                    <p><img src="<?php echo UPLOAD_URL.tag_photo($photo); ?>"></p>
    			</div>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
$(function(){
	
})
</script>
</body>
</html>