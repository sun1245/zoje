<!DOCTYPE html>
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
    			<a href="<?php echo site_url('join')?>" class="on" ><div class="label1"><div class="label2">用人理念</div></div></a>
    			<a href="<?php echo site_url('join/recruit_social')?>"><div class="label1"><div class="label2">社会招聘</div></div></a>
                <a href="<?php echo site_url('join/recruit_campus')?>"><div class="label1"><div class="label2">校园招聘</div></div></a>
    		</div>
    	</div>
        <div class="list1">
            <div class="join-wrap">
                <p class="tit">用人理念</p>
                <div class="con">
                <?php echo $content;?>
                   <!--  <p><b>人力资源服务理念</b><br>良好的品质服务意识，科学的态度，有效的沟通协调，秉承第一次做对，追求零缺陷理念，并积极付诸行动的学习型团队。<br><b>人才方针</b><br>不断壮大人才队伍努力优化人才结构持续完善用人机制。<br><b>用人理念</b><br>是工厂更是学堂，是平台更是擂台。<br><b>就业指导理念</b><br>把职业当事业经营，和企业共同成长，享受成功的乐趣。</p> -->
                </div>
            </div>
        </div>
        <div class="list2">
            <div class="join-wrap">
                <ul class="f-cb">
                    <li>
                        <a href="<?php echo site_url('join/recruit_social')?>">
                            <div class="img"><img src="<?php echo static_file('web/img/culture/icon7_03.png')?>"></div>
                            <div class="font">
                                <div class="label1">
                                    <div class="label2">
                                        <p>社会招聘</p>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('join/recruit_campus')?>">
                            <div class="img"><img src="<?php echo static_file('web/img/culture/icon7_05.png')?>"></div>
                            <div class="font">
                                <div class="label1">
                                    <div class="label2">
                                        <p>校园招聘</p>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
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