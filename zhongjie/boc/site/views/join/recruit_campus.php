_<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page6 a0 main join-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/culture/icon3_02.png')?>"></div>
    		<div class="font">
    			<div class="join-wrap">
    				<div class="label1">
    					<p>人力资源</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="page-nav">
    		<div class="join-wrap">
    			<a href="<?php echo site_url('join')?>"><div class="label1"><div class="label2">用人理念</div></div></a>
    			<a href="<?php echo site_url('join/recruit_social')?>" ><div class="label1"><div class="label2">社会招聘</div></div></a>
    			<a href="<?php echo site_url('join/recruit_campus')?>" class="on"><div class="label1"><div class="label2">校园招聘</div></div></a>
    		</div>
    	</div>
    	<div class="list3">
    		<div class="join-wrap">
    			<p class="tit">校园招聘</p>
    			<div class="top f-cb">
    				<form action="<?php echo site_url('join/recruit_campus')?>" method="get">
    				<input type="text" value="<?php if(!empty($_GET['key'])){echo $_GET['key'];}?>" name="key" placeholder="职位关键字">
    				<div>
    					<p><?php if(!empty($_GET['ctype']) && $_GET['ctype'] != 0){$b1=one_ctype($_GET['ctype'],'title');echo $b1['title'];}else{echo "职位类别";}?></p>
    					<ul>
    						<?php foreach($ctype as $v){?>
    						<li><?php echo $v['title']?></li>
    						<?php } ?>
    					</ul>
    					<select name="ctype">
    						<option value="0">全部</option>
    						<?php foreach($ctype as $v){?>
    						<option value="<?php echo $v['id']?>"><?php echo $v['title']?></option>
    						<?php } ?>
    					</select>
    				</div>
    				<input type="submit" name="" value="">
    				</form>
    			</div>
    			<div class="rec-main">
    				<div class="rec-top f-cb">
    					<p class="p1">职位名称</p>
    					<p class="p2">职位类别</p>
    					<p class="p3">发布日期</p>
    					<p class="p4">备注</p>
    				</div>
    				<div class="rec-bot">
    					<ul>
    						<?php foreach($list as $v){?>
	    					<li class="f-cb">
	    						<a href="<?php echo site_url('applyonline/index/'.$v['id'])?>">
		    						<div class="p1">
		    							<div class="label1">
		    								<div class="label2">
		    									<p><?php echo $v['title']?></p>
		    								</div>
		    							</div>
		    						</div>
		    						<div class="p2">
		    							<div class="label1">
		    								<div class="label2">
		    									<p><?php $b=one_ctype($v['ctype'],'title');echo $b['title'];?></p>
		    								</div>
		    							</div>
		    						</div>
		    						<div class="p3">
		    							<div class="label1">
		    								<div class="label2">
		    									<p><?php echo date('Y-m-d',$v['timeline']); ?></p>
		    								</div>
		    							</div>
		    						</div>
		    						<div class="p4">
		    							<div class="label1">
		    								<div class="label2">
		    									<?php echo $v['content']?>
		    								</div>
		    							</div>
		    						</div>
	    						</a>
	    					</li>
    						<?php } ?>
	    				</ul>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
$(function(){
	// $(".list3 .rec-main li")
	var width = $(window).width();
	if( width > 1000 ){
		$(".list3 .rec-main li").each(function(){
			var index = $(this).index(),
				h = 0;
			if( $(this).find(".p1").height() > h ){
				h = $(this).find(".p1").height()
			}
			if( $(this).find(".p2").height() > h ){
				h = $(this).find(".p2").height()
			}
			if( $(this).find(".p3").height() > h ){
				h = $(this).find(".p3").height()
			}
			if( $(this).find(".p4").height() > h ){
				h = $(this).find(".p4").height()
			}
			$(this).find(".p1").height(h)
			$(this).find(".p2").height(h)
			$(this).find(".p3").height(h)
			$(this).find(".p4").height(h)
			if(index % 2 == 0){
				$(this).addClass("col")
			}
		});
	}else{
		$(".list3 .rec-main li").each(function(){
			var index = $(this).index(),
				h = 0;
			if( $(this).find(".p1").height() > h ){
				h = $(this).find(".p1").height()
			}
			if( $(this).find(".p2").height() > h ){
				h = $(this).find(".p2").height()
			}
			if( $(this).find(".p3").height() > h ){
				h = $(this).find(".p3").height()
			}

			$(this).find(".p1").height(h)
			$(this).find(".p2").height(h)
			$(this).find(".p3").height(h)
			if(index % 2 == 0){
				$(this).addClass("col")
			}
		});
	}

	$(".list3 .top div p").click(function(){
		if(!$(this).hasClass("on")){
			$(this).next().stop().slideDown(250);
			$(this).addClass("on")
		}else{
			$(this).next().stop().slideUp(250);
			$(this).removeClass("on")
		}
	});	

	$("body").click(function(e){
        var _target = $(e.target);
        if (_target.closest(".list3 .top div").length == 0) {
            $(".list3 .top div ul").fadeOut();
            $(".list3 .top div p").removeClass("on")
        }
   });

	$(".join-main .list3 .top div ul li").click(function(){
		var text = $(this).text(),
			index = $(this).index()+1;
		$(".join-main .list3 .top div select option").eq(index).attr("selected","selected").siblings().removeAttr("selected")
		$(this).parent().prev().text(text);
		$(this).parent().prev().removeClass("on")
		$(this).parent().slideUp(250);
	});

	<?php if (isset($_GET['key'])) { ?>
	var key = "<?php echo $_GET['key'];?>";
	<?php } ?>
	<?php if (isset($_GET['ctype'])) { ?>
	var ctype = "<?php echo $_GET['ctype'];?>";
	<?php } ?>
	<?php if (isset($_GET['ctype']) || isset($_GET['key'])) { ?>
    $('.pagination>a ').each(function(index, el){
        if($(el).attr('href') != "#"){
        	el.href += "?key="+key+"&ctype="+ctype;
        }
    });
	<?php } ?>
})
</script>
</body>
</html>