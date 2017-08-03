<div class="recruit-pop">
	<?php if(!empty($rs)) {?>
	<h2><?php echo $rs['title']; ?></h2>
	<div class="recruit-main" id="recruit-main">
		<p><strong>岗位职责</strong></p>
		<p><?php echo $rs['content']; ?></p>
		<p>&nbsp;</p>
		<p><strong>任职职责</strong></p>
		<p><?php echo $rs['requirement']; ?></p>
	</div>
	<a href="<?php echo site_url('applyonline/index/'.$rs['id']);?>" target="_blank" class="btn-demo fr">在线应聘</a>
	<?php } ?>
	<div class="close-demo poa"></div>
	

</div>
<?php echo static_file('web/js/jquery.nicescroll.min.js') ?>
<script>
	$(document).ready(function(){
		$('#recruit-main').niceScroll({
			// 更改光标颜色为hex
			cursorcolor: "#cea563",
			cursoropacitymax: 0.5
		})
		$('.close-demo').on('click',function(){
			$('.body-shadow-demo').fadeOut();
		})
	})
</script>