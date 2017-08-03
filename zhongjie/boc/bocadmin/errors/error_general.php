<?php include_once 'err_header.php'; ?>
<div class="alert alert-error">
	<h1><?php echo $heading; ?></h1>
	<?php
	// 产品模式直接返回（页面过期）
	if (ENVIRONMENT == 'production') {
		header("Location: ".ADMINER_URL, TRUE, 302);
	}else{
		echo $message; 
	}
	?>
</div>
<?php include_once 'err_footer.php'; ?>
