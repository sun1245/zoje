<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<!-- Force latest IE rendering engine or ChromeFrame if installed -->
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<![endif]-->
		<meta http-equiv="content-language" content="zh-CN" />
		<title>
		<?php
		if ($this->router->class == 'welcome' and $this->router->method == "index"){
			echo $header['title'];
		}else{
		echo $CI->config->item('title_suffix');
		echo empty($header['title']) ? '':'-'.$header['title'];
		}
		?>
		</title>
		<meta name="Keywords" content="<?php echo $header['tags'];?>"/>
		<meta name="Description" content="<?php echo $header['intro'];?>"/>
		<meta name="copyright" content="2012" />
		<link rel="shortcut icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" mce_href="favicon.ico" type="image/x-icon">
		<link rel="canonical" href="/"/>
		<meta name="author" content="boc" />
		<meta name="robots" content="deny" />
		<script type="text/javascript" charset="utf-8">
		//  初始化路径
		var SITE_URL = "<?php echo SITE_URL ?>" ;
		var STATIC_URL  = "<?php echo STATIC_URL  ?>" ;
		var UPLOAD_URL  = "<?php echo UPLOAD_URL  ?>" ;
		var STATIC_VER = "<?php echo STATIC_V ?>";
		</script>

<!-- 使用AMD -->
		<?php
		echo static_file('require.js');
		echo static_file('require.config.js');
		?>

		<script type="text/javascript">
		require(['site/js/init']);
		</script>
<!-- END 使用AMD -->

		<?php
		// 不使用adm
		// echo static_file('jquery-1.10.2.min.js');
		// echo static_file('tools.js');
		// echo static_file('site/js/init.js');
		?>

		<!-- 提供HTML5支持 Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<?php
			echo static_file('html5.js');
			echo static_file('respond.js');
			echo static_file('modernizr.js');
		?>
		<![endif]-->
	</body>
	</head>
	<body>
