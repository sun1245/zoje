<?php 
	$CI = &get_instance();
    $CI->load->model('links_model','mlinks');
    $lian = $CI->mlinks->get_all(array('audit'=>1,'cid'=>22));
?>
<div class="footer">
	<div class="pc">
		<div class="footer-top f-cb">
			<div class="footer-text f-cb">
				<div class="text1">
					<div class="search f-cb">
						<input type="text" name="" placeholder="在线商城">
						<input type="submit" name="" value="">
					</div>
					<p class="p1">FREE CALL</p>
					<p class="tel">800-8576-715  /  400-807-9881</p>
					<p class="logo"><img src="<?php echo static_file('web/img/index/icon17_07.png')?>"></p>
				</div>
				<div class="text2">
					<div><img src="<?php echo static_file('web/img/index/icon18_03.png')?>"></div>
					<p>Subscribe to more messages</p>
				</div>
			</div>
			<div class="footer-link">
				<ul class="f-cb">
					<li>
						<a href="javascript:void(0)" class="tit">About Us</a>
						<a href="<?php echo site_url('about#intro')?>">Company Introduction</a>
						<a href="<?php echo site_url('about#vision')?>">Company Introduction</a>
						<a href="<?php echo site_url('about#his')?>">Development History</a>
						<!-- <a href="">上市公司</a> -->
						<a href="<?php echo site_url('about#hon')?>">Enterprise Honor</a>
						<!-- <a href="">领导关怀</a>
						<a href="">公司治理</a> -->
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">Production Center</a>
    					<?php foreach($cctype as $v){?>
						<a href="<?php echo site_url('product/index/'.$v['id'])?>"><?php echo $v['title']?></a>
    					<?php } ?>
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">News Media</a>
						<a href="<?php echo site_url('news#news1')?>">News Media</a>
						<a href="<?php echo site_url('news#news2')?>">Trade News</a>
						<a href="<?php echo site_url('news#video')?>">Trade News</a>
						<a href=""></a>
					</li>
					<li>
						<a href="<?php echo site_url('culture')?>" class="tit">Enterprise Culture</a>
						<?php foreach($typelist as $v){?>
						<a href="<?php echo site_url('culture/index/'.$v['id'])?>"><?php echo $v['title']?></a>
						<?php } ?>
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">Contact Us</a>
						<a href="<?php echo site_url('contact')?>">Domestic marketing</a>
						<a href="<?php echo site_url('contact/contacd')?>">Overseas Marketing</a>
						<a href="<?php echo site_url('contact/service')?>">z＋Service</a>
						<a href="<?php echo site_url('contact/partner')?>">Partners</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-bot f-cb">
			<div class="footer-text">
				<div class="label1">
					<div class="label2">
						<p>COPYRIGHT © 2016 ZOJE SEWING MACHINE  CO., LTD ALL RIGHTS RESERVED.  <a href="http://www.bocweb.cn/"> Powered by:BOCWEB</a></p>
					</div>
				</div>
			</div>
			<div class="footer-link">
				<a href="" class="a1">Email</a>
				<a href="" class="a1">OA</a>
				<a href="" class="a1">Dealer</a>
				<a href="" class="a1">Order Management</a>
				<a href="" class="a1">Supplier</a>
				<div>
					<p>Related Link</p>
					<ul>
						<?php foreach($lian as $v){?>
						<li><a href="<?php echo $v['link']?>"><?php echo $v['title']?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="phone">
		<div class="footer-top">
			<div class="footer-link">
				<li class="nav-list">
					<p>About Us</p>
					<ul>
						<li><a href="<?php echo site_url('about#intro')?>">Company Introduction</a></li>
						<li><a href="<?php echo site_url('about#vision')?>">Company Vision</a></li>
						<li><a href="<?php echo site_url('about#his')?>">Development History</a></li>
						<!-- <li><a href="">上市公司</a></li> -->
						<li><a href="<?php echo site_url('about#hon')?>">Enterprise Honor</a></li>
						<!-- <li><a href="">领导关怀</a></li> -->
						<!-- <li><a href="">公司治理</a></li> -->
					</ul>
				</li>
				<li class="nav-list">
					<p>Production Center</p>
					<ul>
    					<?php foreach($cctype as $v){?>
						<li><a href="<?php echo site_url('product/index/'.$v['id'])?>"><?php echo $v['title']?></a></li>
    					<?php } ?>
					</ul>
				</li>
				<li class="nav-list">
					<p>News Media</p>
					<ul>
						<li><a href="<?php echo site_url('news#news1')?>">Company News</a></li>
						<li><a href="<?php echo site_url('news#news2')?>">Trade News</a></li>
						<li><a href="<?php echo site_url('news#video')?>">News Video</a></li>
					</ul>
				</li>
				<li class="nav-list">
					<p>Trade News</p>
					<ul>
						<?php foreach($typelist as $v){?>
						<li><a href="<?php echo site_url('culture/index/'.$v['id'])?>"><?php echo $v['title']?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li class="nav-list">
					<p>Contact Us</p>
					<ul>
						<li><a href="<?php echo site_url('contact')?>">Domestic marketing</a></li>
						<li><a href="<?php echo site_url('contact/contacd')?>">Overseas Marketing</a></li>
						<li><a href="<?php echo site_url('contact/service')?>">Z+Service</a></li>
						<li><a href="<?php echo site_url('contact/partner')?>">Partners</a></li>
					</ul>
				</li>
			</div>
			<div class="footer-text">
				<div class="search f-cb">
					<input type="text" name="" placeholder="在线商城">
					<input type="submit" name="" value="">
				</div>
				<p class="p1">FREE CALL</p>
				<p class="tel">800-8576-715  /  400-807-9881</p>
				<div class="text2">
					<div><img src="<?php echo static_file('web/img/index/icon18_03.png')?>"></div>
					<p>Subscribe to more messages</p>
				</div>
			</div>
		</div>
		<div class="footer-bot">
			<a href="http://www.bocweb.cn/">COPYRIGHT © 2016 ZOJE SEWING MACHINE  CO., LTD ALL RIGHTS RESERVED.   Powered by:BOCWEB </a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$(".footer .pc .footer-bot .footer-link div p").click(function(){
			if( !$(this).hasClass("on") ){
				$(this).next().stop().slideDown(500);
				$(this).addClass("on")
			}else{
				$(this).next().stop().slideUp(500);
				$(this).removeClass("on")
			}
		}); 

		$("body").click(function(e){
	        var _target = $(e.target);
	        if (_target.closest(".footer .pc .footer-bot .footer-link div").length == 0) {
	           $(".footer .pc .footer-bot .footer-link div p").removeClass("on");
	           $(".footer .pc .footer-bot .footer-link div ul").stop().slideUp(500);
	        }
	   });

		$(".footer .pc .footer-top .footer-link li").height( $(".footer .pc .footer-top .footer-link").height() )


		$(".footer .phone .footer-top .footer-link .nav-list").click(function(){
			if( !$(this).hasClass("on") ){
				$(this).find("ul").stop().slideDown(500);
				$(this).siblings().find("ul").stop().slideUp(500);
				$(this).addClass("on")
			}else{
				$(this).find("ul").stop().slideUp(500);
				$(this).removeClass("on");
			}
		});
	})
</script>