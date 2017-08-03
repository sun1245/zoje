<?php 
	$CI = &get_instance();
    $CI->load->model('links_model','mlinks');
	$CI->load->model('coltypes_model','mtypes');
    $lian = $CI->mlinks->get_all(array('audit'=>1,'cid'=>22));
    $typelist = $CI->mtypes->get_all(array('fid'=>0,'cid'=>9),'*',array('sort_id'=>'ace'));
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
					<p class="p1">全国免费咨询电话</p>
					<p class="tel">800-8576-715  /  400-807-9881</p>
					<p class="logo"><img src="<?php echo static_file('web/img/index/icon17_07.png')?>"></p>
				</div>
				<div class="text2">
					<div><img src="<?php echo static_file('web/img/index/icon18_03.png')?>"></div>
					<p>订阅更多讯息</p>
				</div>
			</div>
			<div class="footer-link">
				<ul class="f-cb">
					<li>
						<a href="javascript:void(0)" class="tit">关于我们</a>
						<a href="<?php echo site_url('about#intro')?>">公司介绍</a>
						<a href="<?php echo site_url('about#vision')?>">公司愿景</a>
						<a href="<?php echo site_url('about#his')?>">发展历程</a>
						<!-- <a href="">上市公司</a> -->
						<a href="<?php echo site_url('about#hon')?>">企业荣誉</a>
						<!-- <a href="">领导关怀</a>
						<a href="">公司治理</a> -->
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">产品中心</a>
    					<?php foreach($cctype as $v){?>
						<a href="<?php echo site_url('product/index/'.$v['id'])?>"><?php echo $v['title']?></a>
    					<?php } ?>
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">新闻媒体</a>
						<a href="<?php echo site_url('news#news1')?>">公司新闻</a>
						<a href="<?php echo site_url('news#news2')?>">行业新闻</a>
						<a href="<?php echo site_url('news#video')?>">新闻视频</a>
						<a href=""></a>
					</li>
					<li>
						<a href="<?php echo site_url('culture')?>" class="tit">企业文化</a>
						<?php foreach($typelist as $v){?>
						<a href="<?php echo site_url('culture/index/'.$v['id'])?>"><?php echo $v['title']?></a>
						<?php } ?>
					</li>
					<li>
						<a href="javascript:void(0)" class="tit">联系我们</a>
						<a href="<?php echo site_url('contact')?>">国内营销</a>
						<a href="<?php echo site_url('contact/contacd')?>">国外营销</a>
						<a href="<?php echo site_url('contact/service')?>">z＋服务</a>
						<a href="<?php echo site_url('contact/partner')?>">合作伙伴</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-bot f-cb">
			<div class="footer-text">
				<div class="label1">
					<div class="label2">
						<p>Copyright © 2016 中捷缝纫机股份有限公司 版权所有  <a href=""> Powered by:BOCWEB</a></p>
					</div>
				</div>
			</div>
			<div class="footer-link">
				<a href="" class="a1">邮箱登录</a>
				<a href="" class="a1">OA登录</a>
				<a href="" class="a1">经销商登录</a>
				<a href="" class="a1">订单管理登入</a>
				<a href="" class="a1">供应商登录</a>
				<div>
					<p>相关链接</p>
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
					<p>关于我们</p>
					<ul>
						<li><a href="">公司介绍</a></li>
						<li><a href="">公司愿景</a></li>
						<li><a href="">发展历程</a></li>
						<li><a href="">上市公司</a></li>
						<li><a href="">企业荣誉</a></li>
						<li><a href="">领导关怀</a></li>
						<li><a href="">公司治理</a></li>
					</ul>
				</li>
				<li class="nav-list">
					<p>产品中心</p>
					<ul>
    					<?php foreach($cctype as $v){?>
						<li><a href="<?php echo site_url('product/index/'.$v['id'])?>"><?php echo $v['title']?></a></li>
    					<?php } ?>
					</ul>
				</li>
				<li class="nav-list">
					<p>新闻媒体</p>
					<ul>
						<li><a href="">公司新闻</a></li>
						<li><a href="">行业新闻</a></li>
						<li><a href="">新闻视频</a></li>
					</ul>
				</li>
				<li class="nav-list">
					<p>企业文化</p>
					<ul>
						<?php foreach($typelist as $v){?>
						<li><a href="<?php echo site_url('culture/index/'.$v['id'])?>"><?php echo $v['title']?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li class="nav-list">
					<p>联系我们</p>
					<ul>
						<li><a href="">国内营销</a></li>
						<li><a href="">国外营销</a></li>
						<li><a href=""> z＋服务</a></li>
					</ul>
				</li>
			</div>
			<div class="footer-text">
				<div class="search f-cb">
					<input type="text" name="" placeholder="在线商城">
					<input type="submit" name="" value="">
				</div>
				<p class="p1">全国免费咨询电话</p>
				<p class="tel">800-8576-715  /  400-807-9881</p>
				<div class="text2">
					<div><img src="<?php echo static_file('web/img/index/icon18_03.png')?>"></div>
					<p>订阅更多讯息</p>
				</div>
			</div>
		</div>
		<div class="footer-bot">
			<a>Copyright © 2016 中捷缝纫机股份有限公司 版权所有  Powered by:BOCWEB </a>
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