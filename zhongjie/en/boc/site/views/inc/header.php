<?php $cctype = list_coltypes(23);?>
<div class="header">
	<div class="header-top">
		<div class="main-warp">
			<a href="<?php echo site_url('contact')?>">Domestic marketing</a>
			<a href="<?php echo site_url('contact/contacd')?>">Overseas Marketing</a>
			<a href="<?php echo site_url('contact/service')?>">Z+Service</a>
			<a href="http://121.41.128.239:8144/zhongjie/index.php">Chinese</a>
		</div>
	</div>
	<div class="header-main pc">
		<div class="main-wrap">
			<div class="logo">
				<div class="label1">
					<div class="label2">
						<a href="<?php echo site_url('welcome')?>"><img src="<?php echo static_file('web/img/index/icon1_03.png')?>"></a>
					</div>
				</div>
			</div>
			<div class="nav">
				<li class="nav-list"><a href="<?php echo site_url('welcome')?>">Home</a></li>
				<li class="nav-list"><a href="<?php echo site_url('about')?>">About Us</a></li>
				<li class="nav-list"><a href="<?php echo site_url('product')?>">Production</a></li>
				<li class="nav-list"><a href="<?php echo site_url('news')?>">News</a></li>
				<li class="nav-list"><a href="<?php echo site_url('culture')?>">Culture</a></li>
				<li class="nav-list"><a href="<?php echo site_url('join')?>">Join</a></li>
				<li class="nav-list"><a href="<?php echo site_url('contact')?>">Contact</a></li>
			</div>
		</div>
	</div>
	<div class="header-main phone">
		<div class="main-wrap">
			<div class="logo">
				<div class="label1">
					<div class="label2">
						<a href="<?php echo site_url('welcome')?>"><img src="<?php echo static_file('web/img/index/icon1_03.png')?>"></a>
					</div>
				</div>
			</div>
			<div class="nav-btn"><img src="<?php echo static_file('web/img/index/icon5_06.png')?>"></div>
			<div class="nav">
				<ul>
					<li class="nav-list"><a href="<?php echo site_url('welcome')?>">Home</a></li>
					<li class="nav-list"><a href="<?php echo site_url('about')?>">About Us</a></li>
					<li class="nav-list"><a href="<?php echo site_url('product')?>">Production</a></li>
					<li class="nav-list"><a href="<?php echo site_url('news')?>">News</a></li>
					<li class="nav-list"><a href="<?php echo site_url('culture')?>">Culture</a></li>
					<li class="nav-list"><a href="<?php echo site_url('join')?>">Join</a></li>
					<li class="nav-list"><a href="<?php echo site_url('contact')?>">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".header .phone .nav-btn").click(function(){
		if( $(this).next().css("display") == "none" ){
			$(".header .phone .nav").slideDown(400);
		}else{
			$(".header .phone .nav").slideUp(400);
		}
	});

	$(".header .phone .nav").click(function(e){
        var _target = $(e.target);
        if (_target.closest(".header .phone .nav li").length == 0) {
            $(".header .phone .nav").slideUp(400);
        }
   });
</script>