<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="content-language" content="zh-CN" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="Keywords" content="<?php echo $header['tags'];?>"/>
<meta name="Description" content="<?php echo $header['intro'];?>"/>
<meta name="author" content="杭州博采网络科技股份有限公司-高端网站建设-http://www.bocweb.cn" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<title><?php echo $header['title'];?></title>
<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
<script>
	var STATIC_URL = "<?php echo STATIC_URL ?>";
	var GLOBAL_URL = "<?php echo GLOBAL_URL ?>";
	var UPLOAD_URL = "<?php echo UPLOAD_URL ?>";
	var SITE_URL   = "<?php echo site_url() ?>";
	var STATIC_VER = "<?php echo STATIC_V ?>";
</script>
<!-- PC站 -->
<?php
	echo static_file('web/css/reset.css');
	echo static_file('web/css/style.css');

	echo static_file('web/js/jquery-2.2.0.min.js');
	echo static_file('web/js/jquery-1.8.3.min.js');
	echo static_file('web/js/main.js');

	echo static_file('m/css/swiper-3.4.0.min.css');
	echo static_file('m/js/swiper-3.4.0.jquery.min.js');
	echo static_file('js/bocfe.js');
	
	echo static_file('jquery.transit.js');
	echo static_file('html5.js');
	echo static_file ( 'tools.js' );
	echo static_file ( 'm/js/touch.js' );
	
?>