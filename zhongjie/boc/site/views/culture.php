<!DOCTYPE html>
<head>
<?php include_once VIEWS.'inc/head.php'; ?>
</head>

<body>
    <?php include_once VIEWS.'inc/header.php'; ?>
    
    <div class="page4 a0 main culture-main main">
    	<div class="banner">
    		<div class="img"><img src="<?php echo static_file('web/img/culture/icon1_02.png')?>"></div>
    		<div class="font">
    			<div class="cul-wrap">
    				<div class="label1">
    					<p>企业文化</p>
    					<span></span>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="page-nav">
    		<div class="cul-wrap">
                <?php foreach($typelist as $v){?>
    			<a href="<?php echo site_url('culture/index/'.$v['id'])?>" <?php if($v['id'] == $ctypeId){?> class="on" <?php } ?> ><div class="label1"><div class="label2"><?php echo $v['title']?></div></div></a>
                <?php } ?>
    		</div>
    	</div>
    	<div class="list1">
    		<div class="cul-wrap">
    			<ul>
                    <?php foreach($list as $v){?>
    				<li>
                        <a href="<?php echo site_url('culture/info/'.$v['id'])  ?>">
    					<div><img src="<?php echo UPLOAD_URL.tag_photo($v['photo']); ?>"></div>
    					<p><?php echo $v['title'];?></p>
                        </a>
    				</li>
                    <?php } ?>
    			</ul>
    			<div class="page">
    				<div class="label1">
    					<div class="label2">
                            <?php echo $pages;?>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <?php include_once VIEWS.'inc/footer.php'; ?>
<script>
// $(function(){
// 	$(".page-nav a").click(function(){
//             if( !$(this).hasClass("on") ){
//                 var index = $(this).index();
//                 $(this).addClass("on").siblings().removeClass("on");
//                 // console.log(index)
//                 var url = "<?php echo site_url('cul'); ?>";
//                 $.ajax({
//                     url: url,
//                     type: 'get',
//                     cache: false, 
//                     dataType: 'html',
//                     // data: {page: index},
//                     success:function(html){
//                         $(".list1").html(html)
//                     }
//                 })
//                 return false;
//             }
//         });
// })
</script>
</body>
</html>