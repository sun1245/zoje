<?php
$CI->load->model('advert_model','mad');
$footad = $CI->mad->get_one(array('audit'=>1),'title,photo,link');
?>

<?php if(!empty($footad)) {?>
<div id="ad" style="position:absolute;z-index:999" style="width:306px;height:207px">
	<div class="box-cx" style="position: relative;width:306px;height:207px">
		<a href="<?php if(!empty($footad['link'])) {echo $footad['link'];}else{echo "javascript:;";} ?>" target="_blank" class="openbox-w">
			<img width="310"  src='<?php echo UPLOAD_URL.tag_photo($footad['photo']); ?>' alt="<?php echo $footad['title']; ?>">
		</a>
		<a href="javaScript:;" class="close-x" style="position:absolute; right:10px;top:10px;">
			<img width="16" height="16" src="<?php echo static_file('web/img/img4.png'); ?>">
		</a>
	</div>
</div>
<script type="text/javascript">
	function wHeight(){
		var height = null;
		window.innerHeight ? height = window.innerHeight : height = document.documentElement.clientHeight;
		return height;
	}
	var bodyheight = wHeight();
	var x = 50,y = 60
	var xin = true, yin = true
	var step = 1
	var delay = 15
	var obj=document.getElementById("ad")
	function floatAD() {
		var L=T=0
		var R= document.body.clientWidth-obj.offsetWidth;
		var B = bodyheight-obj.offsetHeight;
		obj.style.left = x+"px";
		obj.style.top = y+"px";
		x = x + step*(xin?1:-1);
		if (x < L) { xin = true; x = L}
		if (x > R){ xin = false; x = R}
		y = y + step*(yin?1:-1)
		if (y < T) { yin = true; y = T }
		if (y > B) { yin = false; y = B }
	}
	var itl= setInterval("floatAD()", delay)
	obj.onmouseover=function(){clearInterval(itl)}
	obj.onmouseout=function(){itl=setInterval("floatAD()", delay)}
	$(".close-x").on('click',function(){
		$(this).parents("#ad").hide();
	})
</script>
<?php } ?>
