<?php !isset($reg[0]) and show_404(); ?>
<?php
$CI->load->model('news_model','mnews');
$rs = $CI->mnews->get_one($reg[0]);
!$rs and show_404();

$header['title'] = $rs['title'];
if ($rs['title_seo']) {
	$header['title'] = $rs['title_seo'];
}

$cid=$rs['cid'];
$header['tags'] = $rs['tags'];
$header['intro'] = $rs['intro'];
?>
<?php print_r($rs); ?>
