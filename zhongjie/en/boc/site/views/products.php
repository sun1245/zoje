<!DOCTYPE html>
<html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<?php
	echo static_file('web/css/pd.css');
?>
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
    <div class="pd-wrap">
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
    	<div class="part part1">
            <?php include_once VIEWS.'inc/header.php'; ?>
    		<div class="bg"></div>
    		<img src="<?php echo static_file('web/img/pd/sign01.png'); ?> " alt="" class="sign lt">
    		<img src="<?php echo static_file('web/img/pd/sign02.png'); ?> " alt="" class="sign rb">
    		<div class="main f-cb">
    			<div class="detail">
    				<img src="<?php echo static_file('web/img/pd/sign03.png'); ?> " alt="">
    				<h2>THE TIME OF <span>MINI OIL</span> SINGLE NEEDLE IS COMING</h2>
    				<h3><b>ZJ9000D-D4S</b></h3>
    				<p>HIGH SPEED COMPUTERIZED MINI OIL LOCKSTITCH SEWING MACHINE (ALL IN ONE)</p>
    				<ul class="f-cb">
    					<li>
    						<p class="fz24">MINI <br> OIL</p>
    						<!-- <p>green environmental protection</p> -->
    					</li>
    					<li>
    						<p class="fz24">PERFORMANCE</p>
    						<!-- <p>suit for light and heavy duty (general material)</p> -->
    					</li>
    					<li>
    						<p class="fz24">DIRECT <br> DRIVE</p>
    						<!-- <p>power saving</p> -->
    					</li>
    					<li>
    						<p class="fz24">ECONOMIC</p>
    						<!-- <p>highly performance price ratio</p> -->
    					</li>
    				</ul>
    			</div>
    			<div class="image"><img src="<?php echo static_file('web/img/pd/img01.png'); ?> " width="100%" alt=""></div>
    		</div>
    		<div class="scrollbtn">Slide the wheel</div>
    	</div>
    	<div class="part part2">
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
    			<h3>DRY <span>HEAD</span></h3>
    			<p>Needle bar, thread take up adopts the grease ,without the oil leak. Make sure clean, achieve high performance sewing without oil.</p>
    		</div>
    	</div>
    	<div class="part part3">
    		<div class="bg"></div>
    		<div class="main f-cb">
    			<div class="detail">
    				<h2>IMPROVED THREAD TAKE UP MECHANISM</h2>
    				<h3>(EASILY SUIT FOR DIFFERENT THREAD)</h3>
    				<p>Adjusted the cooperative relationship of thread take up lever and needle bar, not only ensured the effectiveness of the conventional thread sewing, but also improve the mercerized thread finishing effect, realize high quality</p>
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
    						<p>Silk light</p>
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
    						<p>Cotton thread</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="part part4">
    		<div class="bg"></div>
			<div class="main">
				<h2><span>7MM</span> BIG NEEDLE GAUGE</h2>
				<p>The maximum needle gauge of this series is 7mm, can satisfy the sewing of various products like towers, scouring pads,aprons,layered cloth. Avoid the high investment of heavy duty equipment, and also the poor sewing effect. Save the cost of equipment, improve productivity and increase efficiency in the mean time.</p>
			</div>
			<div class="image">
				<div class="line"><p><span>5</span> mm Needle pitch</p></div>
				<div class="line"><p><span>7</span> mm Needle pitch</p></div>
				<div class="img"><img src="<?php echo static_file('web/img/pd/img04.png'); ?> " width="100%" alt=""></div>
			</div>
    	</div>
    	<div class="part part5">
    		<div class="bg"></div>
            <div class="machine">
                <div class="needle"><img src="<?php echo static_file('web/img/pd/sign10.png'); ?> " width="100%" alt=""></div>
                <img src="<?php echo static_file('web/img/pd/sign09.png'); ?> " width="100%" alt="">
            </div>
    		<div class="tips">
    			<h2>ADAMAS NEEDLE BAR</h2>
    			<h3>SUPERH ARDNESS , AND SMOOTH FINISH IMPROVE WEAR - RESISTING PERFORMANCE</h3>
    			<p>Needle bar surface adopts the DLC paintcoat technology the hardness can be 8000HV(10 TIMES MORE THAN NORMAL NEEDLE BAR), wear-resisting can be lower till 0.05~0.2, performance is 200 times higher than normal needle bar. DLC <br>
                works excellent for the stable and the corrosion resisting, usually be used in the Aerospace equipment.</p>
    		</div>
    	</div>
    	<div class="part part6">
            <div class="video"><video src="<?php echo static_file('m/video/part6.mp4'); ?> " autoplay="autoplay" loop="loop"></video></div>
            <div class="bg"></div>
    		<div class="main">
    			<h2>IMPROVED LIFTING FEED MECHANISM</h2>
    			<h3>(SUIT FOR GENERAL MATERIAL INCLUDE LIGHT,MEDIUM,HEAVY DUTY)</h3>
    			<p>According to the different material,adjust the conjunctive mode of lifting feed mechanism, optimized the output program of main shaft motor's torsion.</p>
    		</div>
    	</div>
    	<div class="part part7">
    		<div class="bg"></div>
    		<div class="tips">
    			<h2><span>USB</span> MULTI-FUNCTIONAL PLUG BASE</h2>
    			<p>USB Multi-functional plug base, individual electrical source design , guarantee the safety of battery charging, provide 5V/1000MA stable power, meet the needs of mainstream electronic products' charging, solve the annoying problem of worker's phone which is inconvenient to charge at work , follow- up can provide.</p>
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
    	<div class="part part8">
    		<div class="bg">
                <div class="light"></div>
                <div class="light"></div>
            </div>
			<div class="main">
				<h2><span>FULLY ENCLOSED MAIN SHAFT</span> <br>TRANSMISSION MECHANISM</h2>
				<p>Fully enclosed main shaft driving design, prolong using Life. Span both transmission and lubrication are absolutely isolation with outside, avoid the problem of dust and fabric scraps into the machine's inside abrasive the parts, lower the operation noise. Otherwise, fully closed lubrication, avoid the pollution from the machine to the fabric. which not only can help to improve the sewing quality and environment, but also</p>
			</div>
    	</div>
    	<div class="part part9">
    		<div class="bg"></div>
    		<div class="tips">
    			<h3></h3>
    			<h2>AXIAL FAN<span>(PATENT TECHNOLOGY)</span></h2>
    			<p>Control box system adopt the hand wheel with fan, join the reasonable air duct design to guarantee the principal axis can operation in a security environment whatever high-speed or high load operation.</p>
    		</div>
    		<div class="circle"><img src="<?php echo static_file('web/img/pd/img06.png'); ?> " width="100%" alt=""></div>
    		<div class="wind"><img src="<?php echo static_file('web/img/pd/img07.png'); ?> " width="100%" alt=""></div>
    	</div>
    	<div class="part part10">
    		<div class="image"></div>
			<div class="tips">
				<h3></h3>
				<h2>AUTO-LOCK STITCH LENGTH KNOB<span> <br>(PATENT TECHNOLOGY)</span></h2>
				<p>Newly designed auto-lock stitch length knob, just need to softly press and then rotate the knob to set up stitch length, no need to do more to fix it, the inserted auto-lock device make sure the knob will not shift a bit.</p>
				<img src="<?php echo static_file('web/img/pd/sign06.png'); ?> " alt="">
			</div>
    	</div>
    	<div class="part part11">
    		<div class="bg"></div>
    		<div class="main f-cb">
    			<div class="detail">
					<h3></h3>
					<h2><span>LASER ASSISTED POSITION DEVICE</span> <br>(PATENT TECHNOLOGY)</h2>
					<p>introduced laser assisted positioning in lock stitch, position-set-free cross cursor can provide real-time positioning reference according to operator's needs. Even the inexperience worker can achieve high precision sewing position. Promoted the standardization of</p>
    			</div>
    			<div class="image">
                    <img src="<?php echo static_file('web/img/pd/cutter.gif'); ?> " width="100%" alt="">
    				<div class="box">
    					<p>Traditional</p>
    				</div>
    				<div class="box">
    					<p>ZJ9000D-D4S</p>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="part part12">
    		<div class="bg"></div>
			<div class="sign">
                <img src="<?php echo static_file('web/img/pd/sign07.png'); ?> " width="100%" alt="">
                <!-- <div class="in"><video src="<?php echo static_file('m/video/dzsxq.mp4'); ?> " height="100%" autoplay="autoplay" loop="loop"></video></div>          -->
                <div class="in"><img src="<?php echo static_file('web/img/20170531/sign3.gif'); ?> " width="100%" alt=""></div>
            </div>
			<div class="tips">
				<h3></h3>
				<h2>ELECTRONIC THREAD</h2>
				<h4>TENSION DEVICE</h4>
				<p>Instead of traditional magnetic thread tension, more compact structure, Complete elimination previous wire shedding and thread feeder reset overtime. New thread tension realize thread feeding opportunity adjustable, to</p>
			</div>
    	</div>
    	<div class="part part13">
    		<div class="bg"><div class="button"><img src="<?php echo static_file('web/img/pd/sign11.png'); ?> " width="100%" alt=""></div></div>
    		<div class="tips">
    			<h2>Integrated foot lifter system<span> <br>(Patent technology)</span></h2>
    			<p>Both of knee foot lifter device and magnetic of automatic foot lifer fix in the machine head, more compact structure, more convenient for install and use. It will be</p>
    		</div>
    		<div class="sign"></div>
    	</div>
    	<div class="part part14">
    		<div class="bg"></div>
    		<div class="tips">
    			<h2>Automatic early warning fully cycle oiling system</h2>
    			<h4>(Patent technology)</h4>
    			<p>Brand new oiling system with low oil early warning and automatic recycle oil function. Automatic recycle oil function according the rest of oil box to early warning or stop running, to ensure hook running at good lubrication environment, to avoid dry hook cause thread break, thread cut, noise, to improve hook serve life. Hook fully cycle oil feeding system can recycle the extra oil after lubricate. You need not worry about the material and environment pollution that you did not clear hook oil in time. In another side it saves the cost of oil. According</p>
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
    	<div class="part part15">
    		<div class="bg"></div>
    		<h2>9 sets patents</h2>
    		<ul class="f-cb">
    			<li>Alarm system of machine oil</li>
    			<li>Adjust knob of stitch length</li>
    			<li>Reverse feed device</li>
    			<li>Sewing machine coupler</li>
    			<li>inserted knee lifter</li>
    			<li>Reverse feed device</li>
    			<li class="lh15">Sewing machine patent 201320031817.6</li>
    			<li class="lh15">Direct drive single needle Sewing machine 201330028368.5</li>
    			<li class="lh15">Sewing machine laser Position device</li>
    		</ul>
    	</div>
    	<div class="part part16">
            <h2>The main parameters</h2>
            <div class="list">
                <ul class="f-cb">
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign13.jpg'); ?> " height="100%" alt=""></div>
                        <p>medium and heavy duty</p>
                        <p>small hook heavy duty</p>
                        <p>large hook heavy duty</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign14.jpg'); ?> " height="100%" alt=""></div>
                        <p>medium and heavy duty</p>
                        <p>medium- heavy duty</p>
                        <p>medium- heavy duty</p>
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
                        <p>tandard 6mm, maxim13mm</p>
                        <p>tandard 6mm, maxim13mm</p>
                        <p>tandard 6mm, maxim13mm</p>
                    </li>
                    <li>
                        <div class="sign"><img src="<?php echo static_file('web/img/pd/sign18.jpg'); ?> " height="100%" alt=""></div>
                        <p>db*1#9-#18</p>
                        <p>dp*5#16-#18</p>
                        <p>dp*5#16-#18</p>
                    </li>
                    <li>
                        <div class="sign">lubricating oil</div>
                        <p>10# white oil</p>
                        <p>10# white oil</p>
                        <p>10# white oil</p>
                    </li>
                    <li>
                        <div class="sign">Motor Power</div>
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
        <?php include_once VIEWS.'inc/footer.php'; ?>
    </div>
<?php
	echo static_file('web/js/main.js');
	echo static_file('web/js/jquery.mousewheel.js');
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

	var Page  = 0,
        Mouse = true
    $('body').on('mousewheel', function(event) {
    	event.preventDefault();
        if(event.deltaY > 0){
            if(!Mouse){
                return
            }
        	Mouse = false;
            if(Page == $(".part").length){
                $(".pd-wrap").attr('style', '')
                setTimeout(function(){
                    Mouse = true
                }, 1000)
                Page --
                return
            }else{
                $(".pd-wrap").removeClass('trfty' + Page)
                setTimeout(function(){
                    Mouse = true
                }, 1000)
                Page --
                if(Page < 0){
                    Page = 0
                    return
                }
            }

        }else{ // 向下
            if(!Mouse){
                return
            }
            Mouse = false;
            Page ++
            if(Page >= $(".part").length){
                $(".pd-wrap").css({y: - $(".pd-wrap").height() + $(window).height()})
            	Page = $(".part").length
                Mouse = true
            	return
            }
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