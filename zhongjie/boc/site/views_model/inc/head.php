<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="content-language" content="zh-CN" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name="Keywords" content="<?php echo $header['tags'];?>"/>
<meta name="Description" content="<?php echo $header['intro'];?>"/>
<meta name="author" content="杭州博采网络科技股份有限公司-高端网站建设-http://www.bocweb.cn" />
<title><?php
	if ($this->router->class == 'welcome' and $this->router->method == "index"){
		echo $header['title'];
	}else{
		echo $CI->config->item('title_suffix');
		echo empty($header['title']) ? '':'-'.$header['title'];
	}
	?>
</title>
<link href="<?php echo GLOBAL_URL ?>favicon.ico" rel="shortcut icon">
<script>
	var STATIC_URL  = "<?php echo STATIC_URL  ?>" ;
	var UPLOAD_URL  = "<?php echo UPLOAD_URL  ?>" ;
	var GLOBAL_URL = "<?php echo GLOBAL_URL?>index.php/";
	var SITE_URL = "<?php echo site_url().'/'; ?>";
	var UPLOADDO_URL = "<?php echo SITE_URL.'upload/'?>";
	var STATIC_VER = "<?php echo STATIC_V ?>";
</script>
<?php

echo static_file('web/css/reset.css');
echo static_file('web/css/style.css');
echo static_file('web/css/page.css');

echo static_file ( 'jQuery.js' );
echo static_file('jquery-1.11.3.js');
echo static_file ( 'jquery.easing.1.3.js' );
echo static_file ( 'jquery.transit.js' );
echo static_file ( 'prefixfree.min.js' );
echo static_file ( 'html5.js' );
echo static_file ( 'bocfe.js' );
echo static_file ( 'plug.preload.js' );

echo static_file('web/js/revolve.js');
echo static_file('web/js/scroll.js');

echo static_file ( 'jquery.validate.js' );
echo static_file ( 'jquery.cookie.js' );
echo static_file ( 'tools.js' );
echo static_file ( 'template.js' );



?>


