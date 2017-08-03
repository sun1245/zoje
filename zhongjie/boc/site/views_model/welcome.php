<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include_once VIEWS.'inc/head.php'; ?>
</head>
<body>
	<h1 align="center">杭州博采网络科技股份有限公司CMS系统</h1>
	<?php
	$getad=get_config_site('site','ad');
	?>
	<?php if($getad==1) {?>
	<?php include_once VIEWS.'inc/ad.php'; ?>
	<?php } ?>

	<?php
	$getqq=get_config_site('site','qq');
	?>
	<?php if($getqq==1) {?>
	<?php include_once VIEWS.'inc/qq.php'; ?>
	<?php } ?>

</body>
<?php include_once VIEWS.'inc/footer.php'; ?>
</html>
