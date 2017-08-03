<?php !isset($reg[0]) and show_404(); ?>
<?php
$CI->load->model('recruit_model','mrecruit');
$rs = $CI->mrecruit->get_one($reg[0]);
!$rs and show_404();

$header['title'] = $rs['title'];
if ($rs['title_seo']) {
	$header['title'] = $rs['title_seo'];
}
$cid=$rs['cid'];
$header['tags'] = $rs['tags'];
$header['intro'] = $rs['intro'];

?>
<div class="recruit-pop">
	<h2><?php echo $rs['title']; ?></h2>
	<div class="recruit-main" id="recruit-main">
		<p><strong>岗位职责</strong></p>
		<p><?php echo $rs['content']; ?></p>
		<p>&nbsp;</p>
		<p><strong>任职职责</strong></p>
		<p><?php echo $rs['requirement']; ?></p>

	</div>
	<a href="<?php echo site_url('applyonline/'.$rs['id']);?>" target="_blank" class="btn-demo fr">在线应聘</a>
	<div class="close-demo poa"></div>
</div>
<?php echo static_file('web/js/jquery.nicescroll.min.js') ?>
<script>
	$(document).ready(function(){
		$('#recruit-main').niceScroll({
			cursorcolor: "#cea563",//更改光标颜色为hex
			cursoropacitymax: 0.5
		})
		$('.close-demo').on('click',function(){
			$('.body-shadow-demo').fadeOut();
		})
	})
</script>