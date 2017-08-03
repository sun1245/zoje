<?php
// 数据约定定义


// Array 格式
$data_ajax = array(
	'status' => '0'
	,'msg'   => '消息内容'
	,"data"  => '自定义结构，数组以及其他'
);

// String 格式
$data_ajax = '{
	"status":"0/1"
	,"msg":"消息"
	,"data":"自定义结构"
}';

json_echo($data_ajax);