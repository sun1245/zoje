<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
<?php
    echo static_file('web/css/pinfo.css');
    echo static_file('web/js/jquery.mousewheel.js');
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
</head>

<body>
        <!-- <div class="sidemenu">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
            <span>7</span>
            <span>8</span>
            <span>9</span>
            <span>10</span>
            <span>11</span>
            <span>12</span>
            <span>13</span>
            <span>14</span>
            <span>15</span>
            <span>16</span>
        </div> -->
    <div class="sidebtn bdsharebuttonbox">
        <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
        <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
        <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
        <a href="javascript:;" class="backtop"></a>
    </div>
    <div class="pd-wrap swiper-container">
        <div id="fullpage">
            <div class="part part1 swiper-slide section">
                <?php include_once VIEWS.'inc/header.php'; ?>
                <div class="bg"></div>
                <img src="<?php echo static_file('web/img/hei/icon4_02.png'); ?> " alt="" class="sign lt">
                <img src="<?php echo static_file('web/img/hei/icon5_06.png'); ?> " alt="" class="sign rb">
                <div class="main f-cb">
                    <div class="left">
                        <p class="t1 opc">我们正在<span>重新定义</span>缝纫机 </p>
                        <p class="t2 opc">ZJ-AM5-AH-B-K-800</p>
                        <p class="t3 opc">中捷全自动模板机</p>
                        <p class="t4 opc">【智】在颠覆  领跑未来</p>
                    </div>
                    <div class="right f-cb">
                        <img src="<?php echo static_file('web/img/hei/icon3_03.png'); ?> " alt="" class="name">
                        <img src="<?php echo static_file('web/img/hei/icon1_03.png'); ?> " alt="" class="peo">
                        <img src="<?php echo static_file('web/img/hei/icon7_03.png'); ?> " alt="" class="tab">
                    </div>
                </div>
                <div class="scrollbtn">滑动滚轮</div>
            </div>
            <div class="part part2 swiper-slide section">
                <div class="main">
                    <div class="con">
                        <ul class="f-cb">
                            <li class="l1">
                                <div style=""></div>
                                <p>效率高、利润回报快<br>用工少</p>
                            </li>
                            <li class="l2">
                                <div style=""></div>
                                <p>无限大 × 900的<br>缝制范围</p>
                            </li>
                            <li class="l3">
                                <div style=""></div>
                                <p>3200缝速<br>999个模板识别功能</p>
                            </li>
                            <li class="l4">
                                <div></div>
                                <p>同步带传动模板等<br>创新机械机构</p>
                            </li>
                            <li class="l5">
                                <div style=""></div>
                                <p>功能强大的<br>智能闭环电控系统</p>
                            </li>
                            <li class="l6">
                                <div></div>
                                <p>采用锁式线迹技术<br>线迹美观牢固</p>
                            </li>
                            <li class="l7">
                                <div></div>
                                <p>新型缝料切刀机构<br>减少工序</p>
                            </li>
                            <li class="l8">
                                <div></div>
                                <p>防起缝脱线机构</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="part part3 swiper-slide section">
                <div class="font">
                    <p class="t1"><span>智慧缝制</span>尽在掌握</p>
                    <p class="c1">采用数字化图形程序管理，标准化模板作业,可轻松应对任何复杂图案，产品品质一致性高。操作屏的数字化图形程序管理</p>
                </div>
                <div class="img">
                    <img src="<?php echo static_file('web/img/hei/phone1_04.png'); ?>" class="phone1">
                    <img src="<?php echo static_file('web/img/hei/phone2_04.png'); ?>" class="phone2">
                    <img src="<?php echo static_file('web/img/hei/phone3_04.png'); ?>" class="phone3 phone7">
                    <img src="<?php echo static_file('web/img/hei/phone4_04.png'); ?>" class="phone4 phone7">
                    <img src="<?php echo static_file('web/img/hei/phone6_04.png'); ?>" class="phone5 phone7">
                    <img src="<?php echo static_file('web/img/hei/phone7_04.png'); ?>" class="phone6 phone7">
                </div>
            </div>
            <div class="part part4 swiper-slide section">
                <div class="font">
                    <p class="t1"><span>轻松缝纫</span> 自动化程度高</p>
                    <p class="c1">方便、快捷、舒适，无需熟练操作工、交货快,一人多机</p>
                </div>
            </div>
            <div class="part part5 swiper-slide section">
                <div class="font">
                    <p class="t1"><span>领跑未来</span> 速度快</p>
                    <p class="c1">3200RPM 极致运行速度，1000RPM起缝速度，极速空送速度  速度快、效率高、用工少、回报快</p>
                </div>
                <div class="img"></div>
            </div>
            <div class="part part6 swiper-slide section">
                <div class="font">
                    <p class="t1"><span>微油</span>-干式机头</p>
                    <p class="c1">缝制新净界  - 绿色缝纫</p>
                </div>
                <div class="bird pc">
                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="100%" height="100%" align="" >
                        <param name=movie value="http://demo.188388.cn:8080/rx/zhongjie/static/m/video/bird.swf?t=1501036189">
                        <param name=quality value="high">
                        <param name=wmode value="transparent">
                        <embed src="http://demo.188388.cn:8080/rx/zhongjie/static/m/video/bird.swf?t=1501036189" quality=high wmode="transparent" width="200" height="120" name="star" align="" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> </embed>
                    </object>
                </div>
                <div class="leaf">
                    <img src="<?php echo static_file('web/img/hei/leaf5_03.png') ?>" class="leaf1">
                    <img src="<?php echo static_file('web/img/hei/leaf5_07.png') ?>" class="leaf2">
                    <img src="<?php echo static_file('web/img/hei/leaf5_11.png') ?>" class="leaf3">
                    <img src="<?php echo static_file('web/img/hei/leaf5_14.png') ?>" class="leaf4">
                    <img src="<?php echo static_file('web/img/hei/leaf5_19.png') ?>" class="leaf5">
                    <img src="<?php echo static_file('web/img/hei/leaf5_23.png') ?>" class="leaf6">
                    <img src="<?php echo static_file('web/img/hei/leaf5_27.png') ?>" class="leaf7">
                    <img src="<?php echo static_file('web/img/hei/leaf6_10.png') ?>" class="leaf8">
                    <img src="<?php echo static_file('web/img/hei/leaf6_21.png') ?>" class="leaf9">
                    <img src="<?php echo static_file('web/img/hei/leaf6_25.png') ?>" class="leaf10">
                </div>
            </div>
            <div class="part part7 swiper-slide section">
                <div class="left">
                    <div class="pic opac"><img src="<?php echo static_file('web/img/hei/pic7_02.jpg'); ?> " alt="" class="tab"></div>
                    <div class="pic opac"><img src="<?php echo static_file('web/img/hei/pic7_09.jpg'); ?> " alt="" class="tab"></div>
                </div>
                <div class="mid">
                    <div class="font">
                        <p class="t1">模板机应用的<span>广泛性</span></p>
                        <p class="c1">从羽绒服到家居、皮革、鞋业、针织、衬衫、夹克、风衣、户外…… 从绗缝到缝口袋、上拉链、切门襟、贴标、修边……</p>
                    </div>
                    <div class="pic opac"><img src="<?php echo static_file('web/img/hei/pic7_10.jpg'); ?> " alt="" class="tab"></div>
                </div>
                <div class="right">
                    <div class="pic1 opac"><img src="<?php echo static_file('web/img/hei/pic7_04.jpg'); ?> " alt="" class="tab"></div>
                    <div class="pic1 opac"><img src="<?php echo static_file('web/img/hei/pic7_05.jpg'); ?> " alt="" class="tab"></div>
                    <div class="pic4 opac"><img src="<?php echo static_file('web/img/hei/pic7_06.jpg'); ?> " alt="" class="tab"></div>
                    <div class="pic2 opac"><img src="<?php echo static_file('web/img/hei/pic7_07.jpg'); ?> " alt="" class="tab"></div>
                    <div class="pic3 opac"><img src="<?php echo static_file('web/img/hei/pic7_11.jpg'); ?> " alt="" class="tab"></div>
                </div>
            </div>
            <div class="part part8 swiper-slide section">
                <div class="bg"></div>
                <div class="font">
                    <p class="t1"><span>X</span> 向传感器</p>
                    <p class="c1">采用先进传感技术，模板自动精确定位，效率高，起缝位置准确，确保品质</p>
                </div>
            </div> 
            <div class="part part9 swiper-slide section">
                <div class="font">
                    <p class="t1">全新智能中<span>压脚机构</span></p>
                    <p class="c1">能更好的应对不同厚度缝料，适用范围更广。</p>
                </div>
                <div class="pic">
                    <div class="top">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img1">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img2">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img3">
                    </div>
                    <div class="mid">
                        <img src="<?php echo static_file('web/img/hei/icon13_03.png')?>">
                    </div>
                    <div class="bot">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img1">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img2">
                        <img src="<?php echo static_file('web/img/hei/icon11_03.png')?>" class="img3">
                        <img src="<?php echo static_file('web/img/hei/icon13_07.png')?>" class="img4">
                    </div>
                </div>
            </div>
            <div class="part part10 swiper-slide section">
                <div class="font">
                    <p class="t1">智能找模板<span>原点</span></p>
                    <p class="c1">实现快速定位，避免操作工在使用中因模板未放到未导致机针扎模板及浪费缝料等问题。</p>
                </div>
                <div class="pic">
                    <img src="<?php echo static_file('web/img/hei/icon20_03.png')?>" class="img1 img">
                    <img src="<?php echo static_file('web/img/hei/icon15_04.png')?>" class="img2 img">
                    <img src="<?php echo static_file('web/img/hei/icon16_04.png')?>" class="img3 img">
                    <div>
                        <img src="<?php echo static_file('web/img/hei/icon21_03.png')?>">
                    </div>
                </div>
            </div>
            <div class="part part11 swiper-slide section">
                <div class="line"></div>
                <div class="font">
                    <p class="t1">智能找模板<span>原点</span></p>
                    <p class="c1">实现快速定位，避免操作工在使用中因模板未放到未导致机针扎模板及浪费缝料等问题。</p>
                </div>
            </div>
            <div class="part part12 swiper-slide section">
                <div class="video">
                    <video autoplay="autoplay" loop="loop" src="http://demo.188388.cn:8080/rx/zhongjie/static/m/video/part6.mp4?t=1500963896 "></video>
                </div>
                <div class="bg"></div>
                <div class="font">
                    <p class="t1"><span>智能</span>切刀功能</p>
                    <p class="c1">采用先进传感技术，模板自动精确定位，效率高，起缝位置准确，确保品质</p>
                </div>
            </div>
            <div class="part part13 swiper-slide section">
                <div class="font">
                    <p class="t1">强大领先的<span>自动换梭技术</span></p>
                    <p class="c1">全新设计的自动换梭机构可一次性安装7个梭芯，<br>节约人工换梭的时间，提高操作效率，<br>使缝纫机构更智能化。<br><br>实用新型专利号：<br><span>ZL201520709182.X、ZL201520709350.5、<br>ZL201520709629.3、ZL201520709706.5、<br>ZL201520709742.1</span><br><br>发明专利申请号：<br><span>201510582092.3、201510582509.6</span></p>
                </div>
            </div>
            <div class="part part14 swiper-slide section">
                <div class="font">
                    <p class="t1">全新<span> X </span>向传动机构</p>
                    <p class="c1">全新的X向传动机构使送料精度更高，线迹更加美观。</p>
                </div>
            </div>
            <div class="part part15 swiper-slide section">
                <div class="font">
                    <p class="t1">先进的<span>闭环系统</span></p>
                    <p class="c1">精确控制运动轨迹，强大图案编辑功能，线迹更加美观；</p>
                </div>
                <div class="line">
                    <img src="<?php echo static_file('web/img/hei/line1_03.png')?>" class="img1 img">
                    <img src="<?php echo static_file('web/img/hei/line2_03.png')?>" class="img2 img">
                </div>
            </div>
            <!-- <div class="part part16">
                <div class="param">
                    <div class="pc">
                        <p class="t1">主要参数</p>
                        <ul>
                            <li class="tit">
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2"><img src="<?php echo static_file('web/img/hei/pic13_16.jpg')?>"></div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2"><img src="<?php echo static_file('web/img/hei/pic13_07.jpg')?>"></div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2"><img src="<?php echo static_file('web/img/hei/pic13_10.jpg')?>"></div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2"><img src="<?php echo static_file('web/img/hei/pic13_19.jpg')?>"></div>
                                    </div>
                                </div>
                                <div class="tab tab1">
                                    <div class="label1">
                                        <div class="label2"><img src="<?php echo static_file('web/img/hei/pic13_13.jpg')?>"></div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">ZJ-AM5-AH-B-K-800</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">DPX5 7~12# (表面镀钛）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">3200 rpm( 针距3.5mm 以内）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">X向无限大，Y向实现800mm</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">0.1 〜12.7mm(0.05mm/单位）</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">ZJ-AM5-AH-B-K-900</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">DPX5 7~12# (表面镀钛）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">3200 rpm( 针距3.5mm 以内）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">X向无限大，Y向实现900mm</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">0.1 〜12.7mm(0.05mm/单位）</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">ZJ-AM5-AH-B-RK-800 </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">DPX5 7~12# (表面镀钛）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">3200 rpm( 针距3.5mm 以内）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">X向无限大，Y向实现800mm</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">0.1 〜12.7mm(0.05mm/单位）</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">ZJ-AM5-AH-B-LK-800</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">DPX5 7~12# (表面镀钛）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">3200 rpm( 针距3.5mm 以内）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">X向无限大，Y向实现800mm</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">0.1 〜12.7mm(0.05mm/单位）</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">ZJ-AM5-AH-LK-800</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">DPX5 7~12# (表面镀钛）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">3200 rpm( 针距3.5mm 以内）</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">X向无限大，Y向实现800mm</div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">0.1 〜12.7mm(0.05mm/单位）</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="phone">
                        <p class="tit">主要参数</p>
                        <ul>
                            <li class="f-cb">
                                <div class="tit tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <img src="<?php echo static_file('web/img/hei/pic13_16.jpg')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>ZJ-AM5-AH-B-K-800</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>ZJ-AM5-AH-B-K-900</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>ZJ-AM5-AH-B-RK-800</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>ZJ-AM5-AH-B-LK-800</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>ZJ-AM5-AH-LK-800</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="f-cb">
                                <div class="tit tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <img src="<?php echo static_file('web/img/hei/pic13_07.jpg')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>DPX5 7~12# (表面镀钛）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>DPX5 7~12# (表面镀钛）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>DPX5 7~12# (表面镀钛）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>DPX5 7~12# (表面镀钛）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>DPX5 7~12# (表面镀钛）</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="f-cb">
                                <div class="tit tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <img src="<?php echo static_file('web/img/hei/pic13_10.jpg')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>3200 rpm( 针距3.5mm 以内）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>3200 rpm( 针距3.5mm 以内）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>3200 rpm( 针距3.5mm 以内）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>3200 rpm( 针距3.5mm 以内）</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>3200 rpm( 针距3.5mm 以内）</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="f-cb">
                                <div class="tit tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <img src="<?php echo static_file('web/img/hei/pic13_19.jpg')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>X向无限大，Y向实现800mm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>X向无限大，Y向实现900mm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>X向无限大，Y向实现800mm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>X向无限大，Y向实现800mm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>X向无限大，Y向实现800mm</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="f-cb">
                                <div class="tit tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <img src="<?php echo static_file('web/img/hei/pic13_13.jpg')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>0.1 〜 12.7mm (0.05mm /单位)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>0.1 〜 12.7mm (0.05mm /单位)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>0.1 〜 12.7mm (0.05mm /单位)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>0.1 〜 12.7mm (0.05mm /单位)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab">
                                    <div class="label1">
                                        <div class="label2">
                                            <p>0.1 〜 12.7mm (0.05mm /单位）</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="down">
                    <a href=""><p>手机APP</p></a>
                    <a href=""><p style="background-image:url(<?php echo static_file('web/img/hei/icon18_09.png')?>); background-size:22px 22px;">手机订阅号</p></a>
                    <a href=""><p style="background-image:url(<?php echo static_file('web/img/hei/icon18_06.png')?>); background-size:23px 24px;">产品使用手册下载</p></a>
                    <a href=""><p style="background-image:url(<?php echo static_file('web/img/hei/icon18_15.png')?>); background-size:19px 18px;">产品零件手册下载</p></a>
                    <a href=""><p style="background-image:url(<?php echo static_file('web/img/hei/icon18_12.png')?>); background-size:29px 23px;">产品台板手册下载</p></a>
                </div>
            </div> -->
            <div class="part part16 swiper-slide">
                <h2>主要参数</h2>
                <div class="list">
                    <ul class="f-cb">
                        <li>
                            <div class="sign"><img src="<?php echo static_file('web/img/hei/icon19_03.png'); ?> " height="100%" alt=""></div>
                            <p>ZJ-AM5-AH-B-K-800</p>
                            <p>ZJ-AM5-AH-B-K-900</p>
                            <p>ZJ-AM5-AH-B-RK-800</p>
                            <p>ZJ-AM5-AH-B-RK-800</p>
                            <p>ZJ-AM5-AH-LK-800</p>
                        </li>
                        <li>
                            <div class="sign"><img src="<?php echo static_file('web/img/hei/icon19_05.png'); ?> " height="100%" alt=""></div>
                            <p>DPX5 7~12#(表面镀钛)</p>
                            <p>DPX5 7~12#(表面镀钛)</p>
                            <p>DPX5 7~12#(表面镀钛)</p>
                            <p>DPX5 7~12#(表面镀钛)</p>
                            <p>DPX5 7~12#(表面镀钛)</p>
                        </li>
                        <li>
                            <div class="sign"><img src="<?php echo static_file('web/img/hei/icon19_07.png'); ?> " height="100%" alt=""></div>
                            <p>3200 rpm(针距3.5mm 以内)</p>
                            <p>3200 rpm(针距3.5mm 以内)</p>
                            <p>3200 rpm(针距3.5mm 以内)</p>
                            <p>3200 rpm(针距3.5mm 以内)</p>
                            <p>3200 rpm(针距3.5mm 以内)</p>
                        </li>
                        <li>
                            <div class="sign"><img src="<?php echo static_file('web/img/hei/icon19_09.png'); ?> " height="100%" alt=""></div>
                            <p>X向无限大，Y向实现800mm</p>
                            <p>X向无限大，Y向实现900mm</p>
                            <p>X向无限大，Y向实现800mm</p>
                            <p>X向无限大，Y向实现800mm</p>
                            <p>X向无限大，Y向实现800mm</p>
                        </li>
                        <li>
                            <div class="sign"><img src="<?php echo static_file('web/img/hei/icon19_11.png'); ?> " height="100%" alt=""></div>
                            <p>0.1 〜12.7mm(0.05mm/单位)</p>
                            <p>0.1 〜12.7mm(0.05mm/单位)</p>
                            <p>0.1 〜12.7mm(0.05mm/单位)</p>
                            <p>0.1 〜12.7mm(0.05mm/单位)</p>
                            <p>0.1 〜12.7mm(0.05mm/单位)</p>
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
    </div>

<script>
$(function(){
    $(".header .header-main.pc .main-wrap .nav .nav-list").eq(2).addClass("hover").siblings().removeClass('hover')
    $(".part1 .bg").addClass('show')
    setTimeout(function(){
        $(".part1 img.sign").addClass('show')
        $(".part1 .image").addClass('show')
    }, 500)
    $(".footer").addClass(' swiper-slide')

    $('.part1 .opc').each(function(){
        var index = $(this).index('.part1 .opc');
        // $(this).stop(index * 500).addClass('show');
        setTimeout(function(){
            $('.part1 .opc').eq(index).addClass('show')
        },500*index);
    });    
    // 第一屏效果
    setTimeout(function(){$('.part1 .right .name').addClass('show')},500);
    setTimeout(function(){$('.part1 .right .peo').addClass('show')},1000);
    setTimeout(function(){$('.part1 .right .tab').addClass('show')},1500);

    var turn = setInterval("turn()",5000);
    var turn1 = setInterval("turn1()",5000);

    $('#fullpage').fullpage({
        verticalCentered:false,
        resize:false,
        scrollingSpeed:1200,
        afterLoad: function(u,ind){
            // 第一屏效果
            if( ind == 1 ){
                $('.part1 .opc').each(function(){
                    var index = $(this).index('.part1 .opc');
                    setTimeout(function(){
                        $('.part1 .opc').eq(index).addClass('show')
                    },500*index);
                });
            }
            // 第二屏效果
            console.log(ind)
            if( ind == 2 ){
                $(".part2 li").each(function(){
                    var index = $(this).index();
                    if(index < 4){
                        setTimeout(function(){$('.part2 li').eq(index+4).stop().addClass('show');$('.part2 li').eq(index).stop().addClass('show')},200*index);
                    }
                    
                });
            }else {
                $(".part2 li").removeClass("show")
            }
                
            if( ind == 5 ){
                $('.part5 .img').addClass('show')
            }else{
                $('.part5 .img').removeClass("show")
            }
            // 
            if( ind == 11 ){
                $('.part11 .line').addClass('show')
            }else{
                $('.part11 .line').removeClass("show")
            } 
            if( ind == 14 ){
                $('.part14 ').addClass('show')
            }else{
                $('.part14').removeClass("show")
            }          
            if( ind == 15 ){
                $('.part15 .line .img1').addClass('show')
            }else{
                $('.part15 .line .img1').removeClass("show")
            } 
        }
    });

    $(".backtop").click(function(){
        $.fn.fullpage.moveTo(1)
    })
})
function turn(){
    setTimeout(function(){$('.part3 .phone1').addClass('show')},200);
    setTimeout(function(){$('.part3 .phone2').addClass('show')},700);
    setTimeout(function(){$('.part3 .phone7').addClass('show')},1200);
    setTimeout(function(){$('.part3 .phone7,.part3 .phone2,.part3 .phone1').removeClass('show')},5000);
}
function turn1(){
    setTimeout(function(){
        $('.part10 .img:eq(0)').addClass('show')
    },500);
    setTimeout(function(){
        $('.part10 .img:eq(1)').addClass('show')
    },1000);
    setTimeout(function(){
        $('.part10 .img:eq(2)').addClass('show')
    },1500);
    setTimeout(function(){$('.part10 .img').removeClass('show')},5000);
}
</script>
</body>
</html>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src=STATIC_URL + 'js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>

<script>
// var swiper = new Swiper('.swiper-container', {
//     pagination: '.swiper-pagination',
//     direction: 'vertical',
//     slidesPerView: 1,
//     speed:300,
//     paginationClickable: true,
//     spaceBetween: 30,
//     mousewheelControl: true,
//     onTransitionStart: function(swiper){
//       console.log(swiper.activeIndex); 
//       // 第一屏效果
//         if( swiper.activeIndex == 1 ){
//             $('.part1 .opc').each(function(){
//                 var index = $(this).index('.part1 .opc');
//                 setTimeout(function(){
//                     $('.part1 .opc').eq(index).addClass('show')
//                 },500*index);
//             });
//         }

//         // 第三屏效果
//         if( swiper.activeIndex == 2 ){
//             setTimeout(function(){$('.part3 .phone1').addClass('show')},500);
//             setTimeout(function(){$('.part3 .phone2').addClass('show')},1000);
//             setTimeout(function(){$('.part3 .phone7').addClass('show')},1500);
//         }else if(swiper.activeIndex == 1){
//             $(".phone1,.phone2,.phone7").removeClass("show")
//         }
//         // 第五屏
//         if( swiper.activeIndex == 4 ){
//             $('.part5 .img').addClass('show')
//         }else if(swiper.activeIndex == 3){
//             $('.part5 .img').removeClass("show")
//         }
//         $('.part').eq(swiper.activeIndex).addClass('list').siblings().removeClass('list')
//     }
// });
</script>