<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
	<?php
		echo static_file('web/css/jquery.fullPage.css');
		echo static_file('web/js/jquery.fullpage.js');
	?>
</head>
<body>
	
	<div class="loadding">
		<img src="<?php echo static_file('web/img/loadings.gif')?>" alt="">
	</div>
	<div class="main">
		<div class="welcome">
			<div id="fullpage">
			  	<div class="section page1">
			    	<?php include_once VIEWS.'inc/header.php'; ?>
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="con">
			    			<div class="tit">
			    				<h3>
			    					<img src="<?php echo static_file('web/img/page1_txt1.png')?>" alt="">
			    				</h3>
			    				<h5>包缝机进入超高速一体机时代</h5>
			    			</div>
			    			
			    		</div>
			    		<div class="img">
			    			<img src="<?php echo static_file('web/img/page1_img2.png')?>" alt="">
			    		</div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page1_img1.png')?>" alt="">
			    		</div>
			    		
			    		
			    		<div class="txt">
		    				<h5>ZJ953 - 13H - ED2</h5>
		    				<h6>超高速二自动直驱四线电脑包缝一体机</h6>
		    				<div class="en">
		    					SUPER HIGH SPEED 2 AUTOMATIC 4 THREAD DIRECT DRIVE COMPUIERIZED OVERLOCK<br/>(BUILTIN ONE HEAD)
		    				</div>
		    			</div>
		    			<div class="scrollbar">
			    			滑动滚轮
			    		</div>
			    	</div>
			    </div>
			    <div class="section page2">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="txt">
			    			<div class="en">high speed  Start fast</div>
			    			<div class="cn">速度快  <span>启动快</span></div>
			    			<div class="text">全新超高速平台，7500转超高速度        采用一体直驱伺服技术，启动更快</div>
			    		</div>
			    		<div class="content">
			    			<div class="con js_countup" >
				    			<div class="icon"></div>
				    			<div class="line"></div>
				    			<div class="rotate_line">
				    				<img src="<?php echo static_file('web/img/page2_img4.png')?>" alt="">
				    			</div>
				    			<div class="t1"><span>速度快</span><span>启动快</span></div>
				    			
				    		</div>
				    		<div class="t2">
				    			<div class="text">
				    				<span id="countup-1">0</span><small>rpm</small>
				    			</div>
				    		</div>
			    		</div>
			    		
			    	</div>
			    </div>
			    <div class="section page3">
			        <div class="home_content">
			        	<div class="bg"></div>
			        	<div class="right">
			        		<div class="tit">
			        			一体包缝机的 <span>独特优势</span> 
			        		</div>
			        		<div class="right_con">
			        			<p>机头和电控无需再安装，配合精确度100%</p>
								<p>直接启动，速度更快，定位更精准</p>
								<p>结构完美，美观大方，从二件到一体式，节省运输、仓储成本</p>
			        		</div>
			        	</div>
			        	<div class="left">
			        		<img src="<?php echo static_file('web/img/page3_img1.png')?>" alt="">
			        	</div>
			        </div>
			    </div>
			    <div class="section page4">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="video">
			    			<video id="video" src="<?php echo static_file('web/video/part6.mp4')?>"  loop ></video>
			    			<div class="img">
			    				<img src="<?php echo static_file('web/img/page4_video_bg.jpg')?>" alt="">
			    			</div>
			    		</div>
			    		<div class="con">
			    			<h5><span>出货快</span>  自动化程度高</h5>
			    			<p>配置先进智能感应、自动抬压脚、 自动剪线等系统、生产效率高</p>
			    		</div>
			    	</div>
			    </div>
			    <div class="section page5">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		
			    		<div class="con">
			    			<div class="tit">
			    				<span>TA</span> 很出色  令我很满意
			    			</div>
			    			<div class="txt_con">
			    				<p>配智能感应自动抬压脚系统、自动剪线系统，超快速度</p>
			    				<p>操控轻松舒适，出货快，工资高</p>
			    			</div>
			    		</div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page5_img1.png')?>" alt="">
			    		</div>
			    		<div class="bg2">
			    			<img src="<?php echo static_file('web/img/page5_img2.png')?>" alt="">
			    		</div>
			    	</div>
			    </div>
			    <div class="section page6">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page6_img2.png')?>" alt="">
			    		</div>
			    		<div class="bg2">
			    			<img src="<?php echo static_file('web/img/page6_img3.png')?>" alt="">
			    		</div>
			    		<div class="img">
			    			<img src="<?php echo static_file('web/img/page5_img1.png')?>" alt="">
			    		</div>
			    		<div class="con">
			    			<h5>稳如磐石</h5>
			    			<div class="txt">
			    				<p>电机与控制器集成一体机头，配套检测，品质更有保障</p>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			    <div class="section page7">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		
			    		<div class="con">
			    			<h5>省</h5>
			    			<div class="txt">
			    				<p>直驱一体化伺服马达</p>
			    				<p>启动更迅速、传动效率高、低噪音、震动更小、更节能</p>
			    			</div>
			    		</div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page7_img2.png')?>" alt="">
			    			<div class="img">
			    				<img src="<?php echo static_file('web/img/page7_img1.png')?>" alt="">
			    			</div>
			    			<div class="img2">
			    				<img src="<?php echo static_file('web/img/page7_img3.png')?>" alt="">
			    			</div>
			    		</div>
			    		<div class="bg2"></div>	
			    	</div>
			    </div>
			    <div class="section page8">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="con">
			    			<h5><span>机针</span>穿刺力更强劲</h5>
			    			<div class="txt">
			    				通过先进的电机控制技术，可以输出更大的扭矩，大幅提高缝厚料时的适应性。
			    			</div>
			    			
			    		</div>
			    		<div class="bot">
		    				<div class="bot_tit">
		    					机针穿刺力比较
		    				</div>
		    				<div class="bot_c">
		    					<div class="b_l">
		    						刺穿A<br/>4纸张数
		    					</div>
		    					<div class="b_c">
		    						<div class="c_top">
		    							<span>ZJ953-13H-ED2</span><em>VS</em><span>其他品牌</span>
		    						</div>
		    						<div class="c_cen">
		    							<div class="c_cen_l">
		    								<ul>
		    									<li>
		    										90
		    									</li>
		    									<li>
		    										80
		    									</li>
		    									<li>
		    										70
		    									</li>
		    									<li>
		    										60
		    									</li>
		    									<li>
		    										50
		    									</li>
		    									<li>
		    										40
		    									</li>
		    									<li>
		    										30
		    									</li>
		    								</ul>
		    							</div>
		    							<div class="c_cen_r">
		    								<ul>
		    									<li></li>
		    									<li></li>
		    									<li></li>
		    									<li></li>
		    									<li></li>
		    									<li></li>
		    								</ul>
		    								<div class="line1">
		    									<span class="s1">80</span>
		    									<span class="s2">70</span>
		    									<div class="img">
		    										<img src="<?php echo static_file('web/img/page8_line1.png')?>" alt="">
		    									</div>
		    								</div>
		    								<div class="line2">
		    									<span class="s1">60</span>
		    									<span class="s2">53</span>
		    									<div class="img">
		    										<img src="<?php echo static_file('web/img/page8_line2.png')?>" alt="">
		    									</div>
		    								</div>
		    							</div>
		    						</div>
		    					</div>
		    					<div class="b_r">
		    						<div class="item1"><em></em><span>单针穿刺力</span></div>
		    						<div class="item2"><em></em><span>双针穿刺力</span></div>
		    					</div>
		    				</div>
		    				<div class="bot_b">
	    						<div class="item1"><em></em><span>单针穿刺力</span></div>
	    						<div class="item2"><em></em><span>双针穿刺力</span></div>
	    					</div>
		    			</div>
			    	</div>
			    </div>
			    <div class="section page9">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="bg1w"></div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page9_img1.png')?>" alt="">
			    		</div>
			    		<div class="bg2">
			    			
			    		</div>
			    		<div class="bg3w"></div>
			    		<div class="bg3">
			    			<img src="<?php echo static_file('web/img/page9_img3.png')?>" alt="">
			    			<!-- <div class="yuandian">
			    				<span class="s1"></span>
			    				<span class="s2"></span>
			    				<span class="s3"></span>
			    				<span class="s4"></span>
			    				<span class="s5"></span>
			    			</div> -->
			    		</div>
			    		<div class="shape"></div>
			    		<div class="con">
			    			<div class="tit">
			    				<span>宽电压</span> 设计
			    			</div>
			    			<div class="txt">
			    				<p>适应全球不同地区电压要求，稳定性强。</p>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			    <div class="section page10">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		<div class="con">
			    			<div class="tit">
			    				包缝机进入<span>超高速一体机</span>时代
			    			</div>
			    			<div class="txt">
			    				产业升级、速度当然要快人一步
			    			</div>
			    		</div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page10_img2.png')?>" alt="">
			    			<div class="img">
			    				<img src="<?php echo static_file('web/img/page10_img1.png')?>" alt="">
			    				<div class="jt">
			    					<span class="s1">
				    					<img src="<?php echo static_file('web/img/page10_jt1.png')?>" alt="">
				    				</span>
				    				<span class="s2">
				    					<img src="<?php echo static_file('web/img/page10_jt2.png')?>" alt="">
				    				</span>
				    				<span class="s3">
				    					<img src="<?php echo static_file('web/img/page10_jt3.png')?>" alt="">
				    				</span>
			    				</div>
			    			</div>
			    		</div>
			    		<div class="bg2w"></div>
			    		<div class="bg2">
			    			<span>
			    				<img src="<?php echo static_file('web/img/page10_img3.png')?>" alt="">
			    			</span>
			    		</div>
			    		

			    	</div>
			    </div>
			    <div class="section page11">
			    	<div class="home_content">
			    		<div class="bg"></div>
			    		
			    		<div class="con">
			    			<div class="tit">
			    				<span>配有红外光电系统</span><br/>数码控制自动剪线、切带配有前后集尘装置
			    			</div>
			    			<div class="txt">
			    				<p>独特风扇锁轮设计,有效改善温升，保持设备稳定，提高寿命；</p>
			    				<p>可调传感器，可根据实际需要调整感应位置；</p>
			    				<p>切布感应器除尘装饰保证传感器清洁及性能稳定；</p>
			    				<p>可选内置拖布轮装置，使送料更平稳顺畅。</p>
			    			</div>
			    		</div>
			    		<div class="bg1">
			    			<img src="<?php echo static_file('web/img/page11_img1.png')?>" alt="">
			    		</div>
			    	</div>
			    </div>
			    <div class="section page12">
			    	<div class="home_content">
			    		<h5>主要参数</h5>
			    		<div class="con">
			    			<ul>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon1.png')?>" alt="">
			    					</div>
			    					<p>ZJ953-17-ED2</p>
			    					<p>ZJ953-17H-ED2</p>
			    					<p>ZJ953-13-ED2</p>
			    					<p>ZJ953-13H-ED2</p>
			    					<p>ZJ933-38-ED2</p>
			    					<p>ZJ933-3870-ED2</p>
			    					<p>ZJ933-86-ED2</p>
			    					<p>ZJ933-355-ED2</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon2.png')?>" alt="">
			    					</div>
			    					<p>DC×27#11</p>
			    					<p>DC×27#18</p>
			    					<p>DC×27#11</p>
			    					<p>DC×27#11</p>
			    					<p>DC×27#14</p>
			    					<p>DC×27#14</p>
			    					<p>DC×27#21</p>
			    					<p>DC×27#11</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon3.png')?>" alt="">
			    					</div>
			    					<p>1</p>
			    					<p>3</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>3</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon4.png')?>" alt="">
			    					</div>
			    					<p>3</p>
			    					<p>3</p>
			    					<p>4</p>
			    					<p>4</p>
			    					<p>5</p>
			    					<p>5</p>
			    					<p>5</p>
			    					<p>6</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon5.png')?>" alt="">
			    					</div>
			    					<p>-</p>
			    					<p>-</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>2</p>
			    					<p>5</p>
			    					<p>5</p>
			    					<p>4+2</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon6.png')?>" alt="">
			    					</div>
			    					<p>4</p>
			    					<p>7</p>
			    					<p>2+4</p>
			    					<p>2+4</p>
			    					<p>4</p>
			    					<p>5</p>
			    					<p>6</p>
			    					<p>2+4</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon7.png')?>" alt="">
			    					</div>
			    					<p>0.5-3.8</p>
			    					<p>0.8-5</p>
			    					<p>0.5-3.8</p>
			    					<p>0.5-3.2</p>
			    					<p>0.5-3.8</p>
			    					<p>0.5-3.8</p>
			    					<p>0.8-5</p>
			    					<p>0.5-3.8</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon8.png')?>" alt="">
			    					</div>
			    					<p>0.7-2</p>
			    					<p>0.8-1.5</p>
			    					<p>0.7-2</p>
			    					<p>0.85-2.8</p>
			    					<p>0.7-2</p>
			    					<p>0.7-2</p>
			    					<p>0.8-1.5</p>
			    					<p>0.7-2</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon9.png')?>" alt="">
			    					</div>
			    					<p>5</p>
			    					<p>5</p>
			    					<p>5</p>
			    					<p>7</p>
			    					<p>5</p>
			    					<p>5.5</p>
			    					<p>7</p>
			    					<p>5</p>
			    				</li>
			    				<li>
			    					<div class="sign">
			    						<img src="<?php echo static_file('web/img/page12_icon10.jpg')?>" alt="">
			    					</div>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
			    					<p>7500</p>
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
			            <div class="btns_phone">
			                <a href=""><em></em><span>手机APP</span></a>
			                <a href=""><em></em><span>手机订阅号</span></a>
			                <a href=""><em></em><span>产品使用手册下载</span></a>
			                <a href=""><em></em><span>产品零件手册下载</span></a>
			                <a href=""><em></em><span>产品台板手册下载</span></a>
			            </div>
			    	</div>
			    </div>

			    <div class="section page13 height-auto">
			    	<div class="home_content">
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
										<p class="logo"><img src="http://121.41.128.239:8144/zhongjie/static/web/img/index/icon17_07.png" class="lazy"></p>
									</div>
									<div class="text2">
										<div><img src="http://121.41.128.239:8144/zhongjie/static/web/img/index/icon18_03.png" class="lazy"></div>
										<p>订阅更多讯息</p>
									</div>
								</div>
								<div class="footer-link">
									<ul class="f-cb">
										<li style="height: 191px;">
											<a href="javascript:;" class="tit">关于我们</a>
											<a href="javascript:;">公司介绍</a>
											<a href="javascript:;">公司愿景</a>
											<a href="javascript:;">发展历程</a>
											<a href="javascript:;">企业荣誉</a>
										</li>
										<li style="height: 191px;">
											<a href="javascript:;" class="tit">产品中心</a>
											<a href="javascript:;">平缝机</a>
											<a href="javascript:;">包缝机</a>
											<a href="javascript:;">绷缝机</a>
											<a href="javascript:;">模板机</a>
											<a href="javascript:;">罗拉车</a>
											<a href="javascript:;">特种机</a>
										</li>
										<li style="height: 191px;">
											<a href="javascript:;" class="tit">新闻媒体</a>
											<a href="javascript:;">公司新闻</a>
											<a href="javascript:;">行业新闻</a>
											<a href="javascript:;">新闻视频</a>
											<a href="javascript:;"></a>
										</li>
										<li style="height: 191px;">
											<a href=javascript:;" class="tit">企业文化</a>
											<a href="javascript:;">爱心中捷</a>
											<a href="javascript:;">员工关怀</a>
											<a href="javascript:;">绿色缝纫</a>
											<a href="javascript:;">穿梭中国行</a>
											<a href="javascript:;">绿色盛典</a>
											<a href="javascript:;">CISMA 2015</a>
										</li>
										<li style="height: 191px;">
											<a href="javascript:;" class="tit">联系我们</a>
											<a href="javascript:;">国内营销</a>
											<a href="javascript:;">国外营销</a>
											<a href="javascript:;">z＋服务</a>
											<a href="javascript:;">合作伙伴</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="footer-bot f-cb">
								<div class="footer-text">
									<div class="label1">
										<div class="label2">
											<p>Copyright © 2016 中捷缝纫机股份有限公司 版权所有  <a target="_blank" title="Powered by" href="http://www.qdbocweb.com/" class="t-c">Powered by</a>:<a target="_blank" title="BOCWEB" href="http://www.qdbocweb.com/" class="t-c">BOCWEB</a></p>
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
											<li><a href="https://www.baidu.com">测试</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="phone">
							<!-- <div class="btns">
				                <a href=""><em></em><span>手机APP</span></a>
				                <a href=""><em></em><span>手机订阅号</span></a>
				                <a href=""><em></em><span>产品使用手册下载</span></a>
				                <a href=""><em></em><span>产品零件手册下载</span></a>
				                <a href=""><em></em><span>产品台板手册下载</span></a>
				            </div> -->
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
											<li><a href="javascript:;">平缝机</a></li>
											<li><a href="javascript:;">包缝机</a></li>
											<li><a href="javascript:;">绷缝机</a></li>
											<li><a href="javascript:;">模板机</a></li>
											<li><a href="javascript:;">罗拉车</a></li>
											<li><a href="javascript:;">特种机</a></li>
										</ul>
									</li>
									<li class="nav-list">
										<p>新闻媒体</p>
										<ul>
											<li><a href="javascript:;">公司新闻</a></li>
											<li><a href="javascript:;">行业新闻</a></li>
											<li><a href="javascript:;">新闻视频</a></li>
										</ul>
									</li>
									<li class="nav-list">
										<p>企业文化</p>
										<ul>
											<li><a href="javascript:;">爱心中捷</a></li>
											<li><a href="javascript:;">员工关怀</a></li>
											<li><a href="javascript:;">绿色缝纫</a></li>
											<li><a href="javascript:;">穿梭中国行</a></li>
											<li><a href="javascript:;">绿色盛典</a></li>
											<li><a href="javascript:;">CISMA 2015</a></li>
										</ul>
									</li>
									<li class="nav-list">
										<p>联系我们</p>
										<ul>
											<li><a href="javascript:;">国内营销</a></li>
											<li><a href="javascript:;">国外营销</a></li>
											<li><a href="javascript:;"> z＋服务</a></li>
										</ul>
									</li>
								</div>
								<div class="footer-text">
									<div class="search f-cb">
										<input type="text" name="" placeholder="在线商城">
										<input type="submit" name="" value="">
									</div>
									<div class="grounp">
										<div class="grounp_l">
											<p class="p1">全国免费咨询电话</p>
											<p class="tel">800-8576-715<br/>400-807-9881</p>
										</div>
										<div class="grounp_r">
											<div class="text2">
												<div><img src="http://121.41.128.239:8144/zhongjie/static/web/img/index/icon18_03.png" class="lazy"></div>
												<p>订阅更多讯息</p>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
							<div class="footer-bot">
								<p>Copyright © 2016 中捷缝纫机股份有限公司 版权所有  <a target="_blank" title="Powered by" href="http://www.qdbocweb.com/" class="t-c">Powered by</a>:<a target="_blank" title="BOCWEB" href="http://www.qdbocweb.com/" class="t-c">BOCWEB</a></p>
							</div>
						</div>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="share bdsharebuttonbox">
		    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
		    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
		    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
		    <a href="javascript:;" class="backtop"></a>
		</div>
	
	</div>
	<script>
		$(function(){
			
			function load(){
				var WinW = $(window).width();
				var WinH = $(window).height();
				
				// 第一屏
				$('.page1 .home_content').height(WinH-120);
				var Page1H = $('.header-main.phone .nav').height();
				if (WinW < 1024) {
					$('.page1 .home_content').height(Page1H);
				}


				// 第二屏
				var options = {
		            useEasing: true,
		            useGrouping: true,
		            separator: '',
		            decimal: '.',
		            prefix: '',
		            suffix: ''
		        };
		        var section_lf500_countup_1 = new CountUp("countup-1", 0, 7500, 0, 1,options);
		       
		        var Video = document.getElementById('video');
				$('#fullpage').fullpage({
					verticalCentered:false,
					resize:false,
					scrollingSpeed:500,
					afterLoad: function(u,index){
						$('#fullpage>div').eq(index-1).addClass('on');
						if (index = 2) {
							setTimeout(function(){
								section_lf500_countup_1.start();
							},1500)
						}
						if (index = 3 && WinW > 1024) {
							Video.play();
						}else{
							Video.load();
						}
					}
				});

				// 第九屏
				var Page9Bg1 = $('.page9 .bg1w').width();
				var Page9Bg2 = $('.page9 .bg2').width();
				var Page9Bg3 = $('.page9 .bg3w').width();
				$('.page9 .bg1').height(Page9Bg1*0.2874);
				$('.page9 .bg1 img').width(Page9Bg1);
				$('.page9 .bg2').height(Page9Bg2*0.86159);
				$('.page9 .bg3').height(Page9Bg3*0.95174);
				$('.page9 .bg3 img').height(Page9Bg3*0.95174);
				$('.page9 .bg3 img').width(Page9Bg3);

				// 第十屏
				var Page10Img = $('.page10 .img').width();
				$('.page10 .img').height(Page10Img*0.7615);

				var Page10Bg2 = $('.page10 .bg2w').width();
				$('.page10 .bg2 span').width(Page10Bg2);
				$('.page10 .bg2').height(Page10Bg2*0.2993);

				// 第十三屏
				$(".page13 .pc .footer-bot .footer-link div p").click(function(){
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
			        if (_target.closest(".page13 .pc .footer-bot .footer-link div").length == 0) {
			           $(".page13 .pc .footer-bot .footer-link div p").removeClass("on");
			           $(".page13 .pc .footer-bot .footer-link div ul").stop().slideUp(500);
			        }
			   });

				$(".page13 .pc .footer-top .footer-link li").height( $(".page13 .pc .footer-top .footer-link").height() )


				$(".page13 .phone .footer-top .footer-link .nav-list").click(function(){
					if( !$(this).hasClass("on") ){
						$(this).find("ul").stop().slideDown(500);
						$(this).siblings().find("ul").stop().slideUp(500);
						$(this).addClass("on");
						$(this).siblings().removeClass("on");
					}else{
						$(this).find("ul").stop().slideUp(500);
						$(this).removeClass("on");
					}
				});

				$(window).resize(function(){
					var WinW = $(window).width();
					var WinH = $(window).height();
					$('.page1 .home_content').height(WinH-120);
					var Page1H = $('.header-main.phone .nav').height();
					if (WinW < 1024) {
						$('.page1 .home_content').height(Page1H);
					}
					// 第九屏
					var Page9Bg1 = $('.page9 .bg1w').width();
					var Page9Bg2 = $('.page9 .bg2').width();
					var Page9Bg3 = $('.page9 .bg3w').width();
					$('.page9 .bg1').height(Page9Bg1*0.2874);
					$('.page9 .bg1 img').width(Page9Bg1);
					$('.page9 .bg2').height(Page9Bg2*0.86159);
					$('.page9 .bg3').height(Page9Bg3*0.95174);
					$('.page9 .bg3 img').height(Page9Bg3*0.95174);
					$('.page9 .bg3 img').width(Page9Bg3);
					// 第十屏
					var Page10Img = $('.page10 .img').width();
					$('.page10 .img').height(Page10Img*0.7615);
				})
			}
			$(window).load(function(){
				load();
				$('.loadding').remove();
				$('.main').addClass('on');
			 	$('.page1').addClass('on');
			})
			
		})
    

	   
	</script>
</body>
</html>