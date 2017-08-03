<?php !isset($reg[0]) and show_404(); ?>
<?php
	$CI->load->model('estate_model','mestate');
	$rs = $CI->mestate->get_one($reg[0]);
	!$rs and show_404();

	$header['title'] = $rs['title'];
	if ($rs['title_seo']) {
		$header['title'] = $rs['title_seo'];
	}

	$header['tags'] = $rs['tags'];
	$header['intro'] = $rs['intro'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<!-- Force latest IE rendering engine or ChromeFrame if installed -->
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<![endif]-->
		<meta http-equiv="content-language" content="zh-CN" />
		<title><?php echo $header['title'].' - '.get_config_site('site','title_suffix')?> </title>
		<meta name="Keywords" content="<?php echo $header['tags']; ?>"/>
		<meta name="Description" content="<?php echo $header['intro']; ?>"/>
		<meta name="copyright" content="2014" />
		<link rel="shortcut icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" mce_href="favicon.ico" type="image/x-icon">
		<link rel="canonical" href="/"/>
		<meta name="author" content="boc" />
		<meta name="robots" content="deny" />
		<script type="text/javascript" charset="utf-8">
		//  初始化路径
		var STATIC_URL  = "<?php echo STATIC_URL; ?>" ;
		var UPLOAD_URL  = "<?php echo UPLOAD_URL; ?>" ;
		var SITE_URL = "<?php echo site_url().'/'; ?>";
		</script>

		<!--[if lt IE 9]>
			<?php echo static_file('jquery-1.10.2.js'); ?>
		<![endif]-->

		<!--[if gte IE 9]>
			<?php echo static_file('jquery-2.0.3.js'); ?>
		<![endif]-->

		<!--[if !IE]><!-->
			<?php echo static_file('jquery-2.0.3.js'); ?>
		<!--<![endif]-->

		<?php
		echo static_file('bootstrap.css');

		// 可做皮肤功能
		echo static_file('site/ui.css');

		echo static_file('bootstrap.js');
		echo static_file('jquery.cookie.js');
		echo static_file('jquery.easing.js');
		echo static_file('template.js');
		echo static_file('tools.js');
		echo static_file('site/init.js');

		//前台文件
		echo static_file('web/style.css');
		echo static_file('web/jquery.lightbox.css');
		echo static_file('web/jquery.situa.js');
		?>

		<!--[if IE 6]>
		<?php echo static_file('web/jquery-1.7.2.js'); ?>
		<?php echo static_file('IE6PNG.js') ?>
		<script type="text/javascript">
			IE6PNG.fix('*');
		</script>
		<![endif]-->
	</head>
<style type="text/css">
body{
	background-color: #CCC;
	margin: 0px;
}
</style>
<body>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="100%" height="100%">
<param name="movie" value="<?php echo static_file('swf/Magazine.swf'); ?>" flashvars="url=<?php echo site_url('ebook/xml/'.$rs['id']); ?>&lang=<?php echo static_file('txt/Lang.txt'); ?>&swf=<?php echo static_file('swf/Pages.swf'); ?>" />
<param name="quality" value="high" />
<param name="bgcolor" value="#cccccc" />
<param name="allowFullScreen" value="true" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="wmode" value="transparent">
<embed src="<?php echo static_file('swf/Magazine.swf'); ?>" flashvars="url=<?php echo site_url('ebook/xml/'.$rs['id']); ?>&lang=<?php echo static_file('txt/Lang.txt'); ?>&swf=<?php echo static_file('swf/Pages.swf'); ?>" width="100%" height="100%" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowFullScreen="true" allowScriptAccess="sameDomain"></embed>
</body>
</html>