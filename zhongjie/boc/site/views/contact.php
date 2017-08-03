<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page7 a0 contact-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/pro/icon2_02.png')?>"></div>
    		<div class="font">
    			<div class="con-wrap">
    				<div class="label1">
    					<p>联系我们</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="page-nav">
    		<div class="con-wrap">
    			<a href="<?php echo site_url('contact')?>" class="on" ><div class="label1"><div class="label2">国内营销</div></div></a>
    			<a href="<?php echo site_url('contact/contacd')?>"><div class="label1"><div class="label2">国际营销</div></div></a>
    			<a href="<?php echo site_url('contact/service')?>"><div class="label1"><div class="label2">Z+服务</div></div></a>
                <a href="<?php echo site_url('contact/partner')?>"><div class="label1"><div class="label2">合作伙伴</div></div></a>
    		</div>
    	</div>
    	<div class="list1">
    		<div class="con-wrap">
    			<p class="tit" style="text-align:center;">国内营销</p>
    			<div class="con f-cb">
    				<p class="p1">拓展全球营销网络</p>
                    <?php echo $content;?>
    				<!-- <p class="p2"><br><br>激烈的市场竞争、受限的融资渠道让中捷看到，要实行进一步的技术改造实施难度较大，这对公司的进一步扩大规模和长期发展也产生了一定影响。为打破国外品牌长期垄断高档缝制设备这一历史，中捷依靠科技自主创新，实施品牌战略和国际化战略，适应“国内市场国际化、国际竞争国内化”的新竞争格局，利用资本市场促进产业发展，加强与国内外大型经销商公司合作与联合，促进内销，扩大出口；通过收购、兼并等方式低成本扩张，以扩大企业规模，加快发展速度，增强企业综合实力。<br><br>1996年，中捷成为行业内较早规范提出“区域代理制”的企业。目前，中捷在全球建立了完善的销售网络，推出了统一视觉的4S专卖店，并建立了包括100多家总代理、700多家特约经销商在内的营销体系。“中捷”商标在100多个国家和地区全类别注册，产品远销美洲、中东、非洲、东南亚、欧洲等100多个国家和地区。</p> -->
    				<p class="p3"><img src="<?php echo UPLOAD_URL.tag_photo($photo); ?>"></p>
    			</div>
    		</div>
    	</div>
    	<div class="list3">
			<div class="con-wrap">
    			<div class="con f-cb">
    				<p class="p1">中捷在全球建立具有统一视觉的4S专卖店</p>
                    <p class="p3"><img src="<?php echo UPLOAD_URL.tag_photo($photo1); ?>"></p>
                    <?php echo $content1;?>
    				<!-- <p class="p2"><br><br><br><br>中捷以4S专卖店为主要销售点架构起来的全球营销网络，不仅因为统一的视觉形象，提高了中捷的品牌记忆度和美誉度，还能够有助于中捷快速的将新产品推向市场，赢得销售先机。“中捷”缝纫机也成为雅戈尔、海澜、波司登等国内一流服装企业的首选。中捷已经成为引导中国缝纫机潮流的现代企业，也成为业内高品质的标准。</p> -->
    			</div>
    		</div>    		
    	</div>
    	<div class="list4">
    		<div class="con-wrap">
    			<ul class="f-cb">
                    <?php foreach($list as $v){?>
    				<li>
    					<a href="<?php echo $v['lal'];?>">
							<p class="t1"><?php echo $v['title'];?></p>
	    					<div class="con">
	    						<p>联系地址：<?php echo $v['address'];?><br>联系电话：<?php echo $v['telphone'];?></p>
	    					</div>
	    					<p class="address">点击查看百度地图</p>    						
    					</a>
    				</li>
                    <?php } ?>
    			</ul>
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