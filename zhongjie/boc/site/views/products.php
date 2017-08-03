<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<?php
	echo static_file('web/css/pd.css');
?>
<?php
    echo static_file('web/css/jquery.fullPage.css');
    echo static_file('web/js/jquery.fullpage.js');
?>
<style type="text/css">
    .height-auto{
        height:auto !important;
    }
</style>
<style>
html, body{
	position: relative;
	overflow: hidden;
	height: 100vh;
}
.part1 .header{
    position: absolute;
    left: 0;
    top: 0;
    z-index: 10;
    width: 100%;
}
.pd-wrap .part1 .main {
    padding-top: 15%;
}
</style>
</head>

<body>
    <div class="sidebtn bdsharebuttonbox">
        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
        <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
        <a href="javascript:;" class="backtop"></a>
    </div>
    <div class="pd-wrap" id="fullpage">
    	<!-- <menu>
    		<ul class="f-cb">
    			<li><a href="">主要功能</a></li>
    			<li><a href="" class="lh">微油环保设计</a></li>
    			<li><a href="">出色性能</a></li>
    			<li><a href="">绿动力</a></li>
    			<li><a href="">领先科技</a></li>
    			<li><a href="">高效智能</a></li>
    			<li><a href="">主要参数</a></li>
    		</ul>
    	</menu> -->
    	<div class="part part1 section">
            <?php include_once VIEWS.'inc/header.php'; ?>
    		<div class="bg"></div>
    		<img src="<?php echo static_file('web/img/pd/sign01.png'); ?> " alt="" class="sign lt">
    		<img src="<?php echo static_file('web/img/pd/sign02.png'); ?> " alt="" class="sign rb">
    		<div class="main f-cb">
    			<div class="detail">
    				<img src="<?php echo static_file('web/img/pd/sign03.png'); ?> " alt="">
    				<h2>平缝机<span>微油</span>时代真正到来</h2>
    				<h3><b>ZJ9000DA-D5S</b></h3>
    				<p>高速直驱五自动微油一体平缝机</p>
    				<ul class="f-cb">
    					<li>
    						<p class="fz24">微油</p>
    						<p>绿色环保</p>
    					</li>
    					<li>
    						<p class="fz24">性能</p>
    						<p>厚薄通吃</p>
    					</li>
    					<li>
    						<p class="fz24">直驱</p>
    						<p>节能低碳</p>
    					</li>
    					<li>
    						<p class="fz24">经济</p>
    						<p>高性价比</p>
    					</li>
    				</ul>
    			</div>
    			<div class="image"><img src="<?php echo static_file('web/img/icon1_03.png'); ?> " width="100%" alt=""></div>
    		</div>
    		<div class="scrollbtn">滑动滚轮</div>
    	</div>
    	<div class="part part2 section">
    		<div class="bg"></div>
            <div class="light"></div>
            <div class="bird pc">
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="100%" height="100%" align="" >
                        <param name=movie value="<?php echo static_file('m/video/bird.swf'); ?>">
                        <param name=quality value="high">
                        <param name=wmode value="transparent">
                        <embed src="<?php echo static_file('m/video/bird.swf'); ?>" quality=high wmode="transparent" width="200" height="120" name="star" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> </embed>
                </object>
            </div>
    		<div class="tips">
    			<h3>DRY HEAD</h3>
    			<h2>干式机头<span>（ 清洁环保 ）</span></h2>
    			<p>针杆、挑线杆采用进口优质矿物润滑脂润滑<br>
    			消除挑线杆甩油、针杆滴油现象，彻底解决油污问题，保持缝料清洁，实现高品质无油缝纫效果</p>
    		</div>
    	</div>
    	<div class="part part3 section">
    		<div class="bg"></div>
    		<div class="main f-cb">
    			<div class="detail">
    				<h2>改进的剌料挑线结构</h2>
    				<h3>(轻松适应各类缝线)</h3>
    				<p>调整了挑线杆与针杆的配合关系<br>
    				使挑线行程与针杆行程能够确保常规缝线（棉线）的缝纫效果的同时提高了本产品对丝光线的收线效果<br>
    				用户无需繁琐调试即可实现高品质的丝光线缝纫效果</p>
    			</div>
    			<div class="image">
    				<div class="boxl">
    					<img src="<?php echo static_file('web/img/pd/img02.png'); ?> " width="100%" alt="">
    					<div class="tips">
    						<div class="img">
                                <img src="<?php echo static_file('web/img/pd/sign04.png'); ?> " width="100%" alt="">
                                <!-- <div class="in"><video src="<?php echo static_file('m/video/sgx.mp4'); ?> " height="100%" autoplay="autoplay" loop="loop"></video></div> -->
                                <div class="in"><img src="<?php echo static_file('web/img/20170531/sign2.gif'); ?> " width="100%" alt=""></div>
                            </div>
    						<p>丝光线</p>
    					</div>
    				</div>
    				<div class="boxr">
    					<img src="<?php echo static_file('web/img/pd/img03.png'); ?> " width="100%" alt="">
    					<div class="tips">
    						<div class="img">
                                <img src="<?php echo static_file('web/img/pd/sign05.png'); ?> " width="100%" alt="">
                                <!-- <div class="in"><video src="<?php echo static_file('m/video/mx.mp4'); ?> " height="100%" autoplay="autoplay" loop="loop"></video></div> -->
                                <div class="in"><img src="<?php echo static_file('web/img/20170531/sign1.gif'); ?> " width="100%" alt=""></div>
                            </div>
    						<p>棉线</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="part part4 section">
    		<div class="bg"></div>
			<div class="main">
				<h2><span>7mm</span> 大针距设计</h2>
				<p>本系列产品最大针距可达7mm <br>
				完全满足毛巾、百洁布、围裙、垫布等产品的车缝需求，解决使用厚料机加工造成的设备投入成本高、车缝品质差的弊端，节省设备成本投入，提高生产效率同时增加效益</p>
			</div>
			<div class="image">
				<div class="line"><p><span>5</span> mm 针距</p></div>
				<div class="line"><p><span>7</span> mm 针距</p></div>
				<div class="img"><img src="<?php echo static_file('web/img/pd/img04.png'); ?> " width="100%" alt=""></div>
			</div>
    	</div>
    	<div class="part part5 section">
    		<div class="bg"></div>
            <div class="machine">
                <div class="needle"><img src="<?php echo static_file('web/img/pd/sign10.png'); ?> " width="100%" alt=""></div>
                <img src="<?php echo static_file('web/img/pd/sign09.png'); ?> " width="100%" alt="">
            </div>
    		<div class="tips">
    			<h2>金刚石针杆</h2>
    			<h3>超高硬度、耐磨性超强、永不磨损</h3>
    			<p>针杆表层使用了 DLC 涂层技术， 硬度可达8000HV（普通针杆的10倍）摩擦系数低至0.05~0.2，所经过处理的零件耐磨性能超过普通针杆200多倍<br>
    			另外，DLC 涂层具有优异的热稳定性与耐腐蚀性<br>
    			主要应用于航天设备、工业刀具、高性能汽车发动机等高精、高附加值设备的关键零部件</p>
    		</div>
    	</div>
    	<div class="part part6 section">
            <div class="video"><video src="<?php echo static_file('m/video/part6.mp4'); ?> " autoplay="autoplay" loop="loop"></video></div>
            <div class="bg"></div>
    		<div class="main">
    			<h2>改进的抬牙送料机构</h2>
    			<h3> ( 厚薄通吃 )</h3>
    			<p>根据不同厚度缝料的缝纫特性，调整了抬牙送料与刺布的配合关系<br>
    			优化主轴电机的扭矩输出程序，过厚穿刺力强，轻松应对单层到十六层布料的高速车缝，从单层过渡到多层快速车缝，线迹美观稳定</p>
    		</div>
    	</div>
    	<div class="part part7 section">
    		<div class="bg"></div>
    		<div class="tips">
    			<h2><span>USB</span> 多功能插座</h2>
    			<p>引入USB插座，独立电源设计，保障充电安全<br>
    			能够提供5V/1000mA的稳定电源，满足主流电子产品的快速充电需求，解决工厂车工手机充电难的问题<br>
    			可提供产品升级服务等数据交换功能</p>
    		</div>
    		<div class="image f-cb">
    			<div class="in">
    				<img src="<?php echo static_file('web/img/pd/img05.png'); ?> " width="100%" alt="">
    				<div class="line"></div>
    				<div class="line"></div>
    				<div class="line"></div>
                    <div class="light"></div>
    			</div>
    		</div>
    	</div>
    	<div class="part part8 section">
    		<div class="bg">
                <div class="light"></div>
                <div class="light"></div>
            </div>
			<div class="main">
				<h2><span>全封闭式</span>主轴传动机构</h2>
				<p>全封闭式的主轴传动设计，提高使用寿命，完全与外部隔离的传动与润滑，消除了服装工厂粉尘、布料碎屑进入缝纫机内部造成的磨损问题，<br>
				全密封式的传动系统降低了整机运转噪音。另外，封闭式的润滑完全杜绝了缝纫机自身对缝纫布料带来污染的风险有助于改善缝纫品质与缝纫环境，节省机油的使用量</p>
			</div>
    	</div>
    	<div class="part part9 section">
    		<div class="bg"></div>
    		<div class="tips">
    			<h3>AXIAL FAN</h3>
    			<h2>轴流风扇<span>（专利技术）</span></h2>
    			<p>电控系统采用带风扇功能的手轮,合理的风道设计<br>
    			无论主轴是高速运转还是高负荷运转都能保证电控系统在安全的温度环境下运行</p>
    		</div>
    		<div class="circle"><img src="<?php echo static_file('web/img/pd/img06.png'); ?> " width="100%" alt=""></div>
    		<div class="wind"><img src="<?php echo static_file('web/img/pd/img07.png'); ?> " width="100%" alt=""></div>
    	</div>
    	<div class="part part10 section">
    		<div class="image"></div>
			<div class="tips">
				<h3>AXIAL FAN</h3>
				<h2>自锁式针距旋钮<span>（专利技术）</span></h2>
				<p>全新设计的自锁式针距旋钮，只需轻按旋钮即可设定针距，无需额外对针距旋钮进行加固操作<br>
				通过内置的自锁装置可确保针距旋钮不产生任何偏移现象</p>
				<img src="<?php echo static_file('web/img/pd/sign06.png'); ?> " alt="">
			</div>
    	</div>
    	<div class="part part11 section">
    		<div class="bg"></div>
    		<div class="main f-cb">
    			<div class="detail">
					<h3>Double cutter</h3>
					<h2><span>双切刀</span>剪线机构</h2>
					<p>动刀可在针板孔下方剪线，控制剪线后的线头最短可达3mm，<br>
					提升缝料品质，使缝纫后的剪线头工序简单快速；</p>
    			</div>
    			<div class="image">
                    <img src="<?php echo static_file('web/img/pd/cutter.gif'); ?> " width="100%" alt="">
    				<div class="box">
    					<p>传统机种</p>
    				</div>
    				<div class="box">
    					<p>ZJ9000D-D4S</p>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="part part12 section">
    		<div class="bg"></div>
			<div class="sign">
                <img src="<?php echo static_file('web/img/pd/sign07.png'); ?> " width="100%" alt="">
                <!-- <div class="in"><video src="<?php echo static_file('m/video/dzsxq.mp4'); ?> " height="100%" autoplay="autoplay" loop="loop"></video></div>          -->
                <div class="in"><img src="<?php echo static_file('web/img/20170531/sign3.gif'); ?> " width="100%" alt=""></div>
            </div>
			<div class="tips">
				<h3>electronic thread tension device</h3>
				<h2>电子松线器</h2>
				<h4>（精确控制剪线后线头的长度）</h4>
				<p>取代传统的剪线电磁铁松线，结构更紧凑，彻底消除以往松线钢丝脱落及不t复位的问题并实现松线时机可调，提高不同缝线在剪线后线头长度的稳定性</p>
			</div>
    	</div>
    	<div class="part part13 section">
    		<div class="bg"><div class="button"><img src="<?php echo static_file('web/img/pd/sign11.png'); ?> " width="100%" alt=""></div></div>
    		<div class="tips">
    			<h2>一体式抬压脚系统<span>（专利技术）</span></h2>
    			<p>膝碰机构和抬压脚电磁铁直接安装在机头内，结构紧凑，<br>
    			便于安装操作，膝碰助力功能，大大减轻用户的操作疲劳与劳动强度</p>
    		</div>
    		<div class="sign"></div>
    	</div>
    	<div class="part part14 section">
    		<div class="bg"></div>
    		<div class="tips">
    			<h2>自动预警的全循环旋梭供油系统</h2>
    			<h4>（专利技术）</h4>
    			<p>全新的旋梭供油系统自带低油量预警与自动回收功能<br>
    			自动预警功能可根据油盒剩余油量进行预警或者终止运行，确保旋梭在润滑良好的环境下运转<br>
    			有效防止旋梭干磨引起的断线、劈线、噪音，提高旋梭使用寿命<br>
    			旋梭油量自动回收功能能够自动回收旋梭润滑时的多余油量<br>
    			无需担心旋梭油量没有及时清除造成缝料和环境污染<br>
    			节省用户润滑油的投入根据测试，采用该技术每年可为节省约60%的旋梭用油</p>
    		</div>
    		<div class="image">
    			<img src="<?php echo static_file('web/img/pd/img11.png'); ?> " width="100%" alt="">
                <div class="circle">
                    <img src="<?php echo static_file('web/img/20170531/sign.gif'); ?> " width="100%" alt="">
                </div>
    			<div class="sign">
                    <img src="<?php echo static_file('web/img/pd/sign08.png'); ?> " width="100%" alt="">
                    <!-- <div class="in"><video src="<?php echo static_file('m/video/yhyj.mp4'); ?> " height="100%" autoplay="autoplay" loop="loop"></video></div> -->
                    <div class="in"><img src="<?php echo static_file('web/img/20170531/sign.gif'); ?> " width="100%" alt=""></div>
                </div>
    		</div>
    	</div>
    	<div class="part part15 section">
    		<div class="bg"></div>
    		<h2>9项国家专利</h2>
    		<ul class="f-cb">
    			<li>缝纫机油量报警装置</li>
    			<li>缝纫机针距调节旋钮</li>
    			<li>缝纫机自动抬压脚装置</li>
    			<li>缝纫机联轴器</li>
    			<li>内置式膝碰</li>
    			<li>倒送料装置</li>
    			<li>缝纫机201320031817.6</li>
    			<li>直驱平缝缝纫机 201330028368.5</li>
    			<li>缝纫机激光定位装置</li>
    		</ul>
    	</div>
    	<div class="part part16 section">
            <h2>主要参数</h2>
            <div class="list">
                <ul class="f-cb">
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign13.jpg'); ?> " height="100%" alt=""></div>
                        <p>中厚料</p>
                        <p>小旋梭厚料</p>
                        <p>大旋梭厚料</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign14.jpg'); ?> " height="100%" alt=""></div>
                        <p>中厚料</p>
                        <p>中厚料-厚料</p>
                        <p>中厚料-厚料</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign15.jpg'); ?> " height="100%" alt=""></div>
                        <p>5000针/分</p>
                        <p>3500针/分</p>
                        <p>3500针/分</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign16.jpg'); ?> " height="100%" alt=""></div>
                        <p>5mm/7mm</p>
                        <p>5mm/7mm</p>
                        <p>7mm</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign17.jpg'); ?> " height="100%" alt=""></div>
                        <p>6mm标准13mm最大</p>
                        <p>6mm标准13mm最大</p>
                        <p>6mm标准13mm最大</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign18.jpg'); ?> " height="100%" alt=""></div>
                        <p>db*1#9-#18</p>
                        <p>dp*5#16-#18</p>
                        <p>dp*5#16-#18</p>
                    </li>
                    <li>
                        <div class="sign">润滑油</div>
                        <p>10#白油</p>
                        <p>10#白油</p>
                        <p>10#白油</p>
                    </li>
                    <li>
                        <div class="sign">电机功率</div>
                        <p>220v/550w</p>
                        <p>220v/550w</p>
                        <p>220v/550w</p>
                    </li>
                </ul>
            </div>
            <div class="btns">
                <a href="">手机APP</a>
                <a href="">手机订阅号</a>
                <a href="">产品使用手册下载</a>
                <a href="">产品零件手册下载</a>
                <a href="">产品台板手册下载</a>
            </div>
        </div>
        <div class="section height-auto section">
            <div class="home_content">
            <?php include_once VIEWS.'inc/footer.php'; ?>
            </div>
        </div>
        <!-- <?php include_once VIEWS.'inc/footer.php'; ?> -->
    </div>
<?php
	echo static_file('web/js/main.js');
	// echo static_file('web/js/jquery.mousewheel.js');
?>
<script>
$(function(){
    $(".header .header-main.pc .main-wrap .nav .nav-list").eq(2).addClass("hover").siblings().removeClass('hover')
	// PART1
	$(".part1 .bg").addClass('show')
	setTimeout(function(){
		$(".part1 img.sign").addClass('show')
		Enter($(".part1 .detail img"), 'top', 0, 4, 600, 400, function(){
			Enter($(".part1 .detail li").eq(0), 'left', 0, 4, 600, 400)
		})
		$(".part1 .image").addClass('show')
	}, 500)
    var footerHeight = $(".footer").outerHeight()

	var Mouse = true
    // $('body').on('mousewheel', function(event) {
    // 	event.preventDefault();
    //     if(event.deltaY > 0){
    //         if(!Mouse){
    //             return
    //         }
    //     	Mouse = false;
    //         if(Page == $(".part").length){
    //             $(".pd-wrap").attr('style', '')
    //             setTimeout(function(){
    //                 Mouse = true
    //             }, 1000)
    //             Page --
    //             return
    //         }else{
    //             $(".pd-wrap").removeClass('trfty' + Page)
    //             setTimeout(function(){
    //                 Mouse = true
    //             }, 1000)
    //             Page --
    //             if(Page < 0){
    //                 Page = 0
    //                 return
    //             }
    //         }

    //     }else{ // 向下
    //         if(!Mouse){
    //             return
    //         }
    //         Mouse = false;
    //         Page ++
    //         if(Page >= $(".part").length){
    //             $(".pd-wrap").css({y: - $(".pd-wrap").height() + $(window).height()})
    //         	Page = $(".part").length
    //             Mouse = true
    //         	return
    //         }
    //     }
    // })

    $('#fullpage').fullpage({
        verticalCentered:false,
        resize:false,
        scrollingSpeed:1200,
        afterLoad: function(u,Page){

            $(".pd-wrap").addClass('trfty' + Page)
            // PART2
            if(Page == 1){
                $(".part2 .bg").removeClass('show').addClass('show')
                $(".part2 .tips").children().attr('style', '')
                Enter($(".part2 .tips h3"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART3
            if(Page == 2){
                $(".part3 .bg").removeClass('show').addClass('show')
                $(".part3 .detail").children().attr('style', '')
                Enter($(".part3 .detail h2"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
                $(".part3 .image").children().addClass('show').find("video").each(function(){
                    $(this).css('margin-left', -$(this).width() / 2)
                })
            }
            // PART4
            if(Page == 3){
                $(".part4 .bg").removeClass('show').addClass('show')
                $(".part4 .main").children().attr('style', '')
                $(".part4 .image").children().removeClass('show')
                Enter($(".part4 .main h2"), 'top', 0, 2, 600, 400, function(){
                    $(".part4 .image").children().addClass('show')
                    Mouse = true
                })
            }
            // PART5
            if(Page == 4){
                $(".part5 .bg").removeClass('show').addClass('show')
                $(".part5 .tips").children().attr('style', '')
                Enter($(".part5 .tips h2"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART6
            if(Page == 5){
                $(".part6 .bg").removeClass('show').addClass('show')
                $(".part6 .main").children().attr('style', '')
                Enter($(".part6 .main h2"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART7
            if(Page == 6){
                $(".part7 .bg").removeClass('show').addClass('show')
                $(".part7 .tips").children().attr('style', '')
                Enter($(".part7 .tips h2"), 'top', 0, 2, 600, 400, function(){
                    Mouse = true
                })
                $(".part7 .image .in").addClass('show').find(".line").addClass('show')
            }
            // PART8
            if(Page == 7){
                $(".part8 .bg").removeClass('show').addClass('show')
                $(".part8 .main").children().attr('style', '')
                Enter($(".part8 .main h2"), 'top', 0, 2, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART9
            if(Page == 8){
                $(".part9 .bg").removeClass('show').addClass('show')
                $(".part9 .tips").children().attr('style', '')
                Enter($(".part9 .tips h3"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
                $(".part9 .circle, .part9 .wind").removeClass('show').addClass('show')
            }
            // PART10
            if(Page == 9){
                $(".part10 .tips").children().attr('style', '')
                Enter($(".part10 .tips h3"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART11
            if(Page == 10){
                $(".part11 .bg").removeClass('show').addClass('show')
                $(".part11 .detail").children().attr('style', '')
                Enter($(".part11 .detail h3"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
                $(".part11 .image").removeClass('show').addClass('show')
            }
            // PART12
            if(Page == 11){
                $(".part12 .bg").removeClass('show').addClass('show')
                $(".part12 .sign").removeClass('show').addClass('show')
                $(".part12 .tips").children().attr('style', '')
                Enter($(".part12 .tips h3"), 'top', 0, 4, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART13
            if(Page == 12){
                $(".part13 .bg").removeClass('show').addClass('show')
                $(".part13 .tips").children().attr('style', '')
                Enter($(".part13 .tips h2"), 'top', 0, 2, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART14
            if(Page == 13){
                $(".part14 .bg").removeClass('show').addClass('show')
                $(".part14 .tips").children().attr('style', '')
                Enter($(".part14 .tips h2"), 'top', 0, 3, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART15
            if(Page == 14){
                $(".part15 .bg").removeClass('show').addClass('show')
                $(".part15 li").attr('style', '')
                Enter($(".part15 li").eq(0), 'left', 0, 9, 600, 400, function(){
                    Mouse = true
                })
            }
            // PART16
            if(Page == 15){
                setTimeout(function(){
                    Mouse = true
                }, 1000)
            }
        }
    });

    $(".backtop").click(function(){
        $.fn.fullpage.moveTo(1)
    })

    $(".backtop").click(function(){
        $(".pd-wrap").attr('class', '').addClass('pd-wrap')
        Page  = 0
    })
})
</script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src=STATIC_URL + 'js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>