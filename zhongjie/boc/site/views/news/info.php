<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page3 a0 main news-main">
    	<div class="content f-cb">

    		<div class="list4">
    			<div class="top">
    				<p class="t1"><?php echo $rs['title']; ?></p>
    				<div>
    					<span>
    						<p style="border-right:1px solid #cccccc; padding-right:20px;">日期：<?php echo date('Y-m-d',$rs['timeline']); ?></p>
    						<!-- <p>来源：绿城管理</p> -->
    					</span>
    					<span style="float:right;">
    						<p>分享</p>
    						<a href="javascript:void((function(s,d,e){try{}catch(e){}var f='http://v.t.sina.com.cn/share/share.php?',u=d.location.href,p=['url=',e(u),'&title=',e(d.title),'&appkey=2924220432'].join('');function a(){
if(!window.open([f,p].join(''),'mb',['toolbar=0,status=0,resizable=1,width=620,height=450,left=',(s.width-620)/2,',top=',(s.height-450)/2].join(''))) u.href=[f,p].join('');};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})
    (screen,document,encodeURIComponent));"><img src="<?php echo static_file('web/img/news/icon7_03.png');?>"></a>
    						<a href="javascript:void(0)" class="jiathis_button_weixin"><img src="<?php echo static_file('web/img/news/icon7_05.png');?>"></a>
    					</span>
    				</div>
    			</div>
    			<div class="con">
                    <?php echo $rs['content']; ?>
    			</div>
    			<div class="bot f-cb">
    				<div class="left">
                        <?php if(isset($rs['prev_id'])){ ?>
                        <a href="<?php echo site_url('news/info/'.$rs['prev_id']); ?>">上一篇：<?php echo $rs['prev_title']; ?></a>
                        <?php } ?>
                        <?php if(isset($rs['next_id'])){ ?>
                        <a href="<?php echo site_url('news/info/'.$rs['next_id']); ?> ">下一篇：<?php echo $rs['next_title']; ?></a>
                        <?php } ?>
    				</div>
    				<div class="right">
    					<label class="label1">
    						<label class="label2">
    							<a href="javascript:history.back(-1)">返回</a>
    						</label>
    					</label>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>
<script>
$(function(){
	var mySwiper = new Swiper ('.swiper-container', {
	    direction: 'horizontal',
	    loop: true,
	    
	    // 如果需要前进后退按钮
	    nextButton: '.swiper-button-next',
	    prevButton: '.swiper-button-prev',
	    
	  }) 

    var width = $(window).width();
    if( width < 1024 ){
        $(".top span").css("float","left")
    }
})
</script>
</body>
</html>