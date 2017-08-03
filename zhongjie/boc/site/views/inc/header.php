<?php $cctype = list_coltypes(23);?>
<div class="header">
	<div class="header-top">
		<div class="main-warp">
			<a href="<?php echo site_url('contact')?>">国内</a>
			<a href="<?php echo site_url('contact/contacd')?>">国外</a>
			<a href="<?php echo site_url('contact/service')?>">Z+服务</a>
			<a href="http://121.41.128.239:8144/zhongjie/en/index.php">EN</a>
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
				<li class="nav-list"><a href="<?php echo site_url('welcome')?>">首页</a></li>
				<li class="nav-list"><a href="<?php echo site_url('about')?>">关于我们</a></li>
				<li class="nav-list"><a href="<?php echo site_url('product')?>">产品中心</a></li>
				<li class="nav-list"><a href="<?php echo site_url('news')?>">新闻媒体</a></li>
				<li class="nav-list"><a href="<?php echo site_url('culture')?>">企业文化</a></li>
				<li class="nav-list"><a href="">投资者关系</a></li>
				<li class="nav-list"><a href="<?php echo site_url('join')?>">人力资源</a></li>
				<li class="nav-list"><a href="<?php echo site_url('contact')?>">联系我们</a></li>
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
					<li class="nav-list"><a href="<?php echo site_url('welcome')?>">首页</a></li>
					<li class="nav-list"><a href="<?php echo site_url('about')?>">关于我们</a></li>
					<li class="nav-list"><a href="<?php echo site_url('product')?>">产品中心</a></li>
					<li class="nav-list"><a href="<?php echo site_url('news')?>">新闻媒体</a></li>
					<li class="nav-list"><a href="<?php echo site_url('culture')?>">企业文化</a></li>
					<li class="nav-list"><a href="">投资者关系</a></li>
					<li class="nav-list"><a href="<?php echo site_url('join')?>">人力资源</a></li>
					<li class="nav-list"><a href="<?php echo site_url('contact')?>">联系我们</a></li>
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