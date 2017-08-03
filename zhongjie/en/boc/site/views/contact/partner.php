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
                <a href="<?php echo site_url('contact/contacd')?>"><div class="label1"><div class="label2">Overseas Marketing</div></div></a>
                <a href="<?php echo site_url('contact/service')?>"><div class="label1"><div class="label2">Z+Service</div></div></a>
                <a href="<?php echo site_url('contact/partner')?>" class="on"><div class="label1"><div class="label2">Partners</div></div></a>
    		</div>
    	</div>
    	<div class="list2">
    		<div class="con-wrap">
                <p class="tit">Partners</p>
    			<ul class="f-cb">
                    <?php foreach($list as $v){?>
    				<li><div class="label1"><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div></li>
                    <?php } ?>
    			</ul>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
$(function(){
	$(".list2 li").click(function(){
        // alert($(this).width()+";"+$(this).height())
    });
})
</script>
</body>
</html>