<?php
header('Content-Type:text/html; charset=utf-8');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('asia/shanghai');
if (function_exists('date_default_timezone_set') ){
	date_default_timezone_set('PRC');
}
set_time_limit(0);

?>