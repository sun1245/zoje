<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page7 a2 contact-main main">
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
                <a href="<?php echo site_url('contact/service')?>" class="on"><div class="label1"><div class="label2">Z+Service</div></div></a>
                <a href="<?php echo site_url('contact/partner')?>"><div class="label1"><div class="label2">Partners</div></div></a>
    		</div>
    	</div>
    	<div class="list1">
    		<div class="con-wrap">
    			<p class="tit">Z+Service</p>
    			<div class="con">
                    <?php echo $content;?>
    				<!-- <p><br><br>服务理念：比您的期望多一点<br>“您”对中捷服务总是存在各种期望的，因此中捷服务就是要清晰的洞悉客户需求，提供满足“您”期望的服务。<br>“您”与全人类的内心一样，一方面期望总是无止境的，另一方面又总是从现实出发而有一个无形的心里期望值；因此我们中捷服务就是要努力去达成“您”的心里标准，同时还要努力做到“比您的期望多一点”、超越“您”的满意，让中捷服务为中捷品牌增光添色。<br><br><br><img src="<?php echo static_file('web/img/pro/icon3_05.png')?>"><br><br><br>服务口号：Z+服务，再加一分<br>Z+，谐音ZJ，蕴含“中捷”、“最佳”、“增加”、“再加”之意，Z右上角的“+”，表示“加”（加分）、“正”（正点）、“佳”（上佳）之意，寓意中捷服务是最佳的服务、正点的服务、周到的服务，而且还在常规的服务基础上“再加一分”、“再加一分”、“再进一步”。如此，便表达了中捷的服务理念是尽量为客户着想不断给自己加分，努力做到超越“最佳”。</p> -->
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