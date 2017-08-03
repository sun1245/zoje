<?php
//
// 输入 －－－－－－－－－－－－－－－－
// $limit 		引用个数
// $page 		所在页码
// $page_pos 	页码在URL位置
// $order 		排序
// $where 		条件
// $fields 		选取字段
// $base_url
//
// 输出 －－－－－－－－－－－－－－－－－
// $list 		列表
// $page_p 		分页字符串

// 引用前可以复写
// 每页个数
$limit = isset($limit) ? $limit : 20;
// 取第一个数字为页码
if (!isset($page)) {
	$page = isset($reg[0]) ? $reg[0] :1;
}
// 排序
$order = isset($order) ? $order : false;
// 条件
$where = (isset($where) and $where) ? $where : array('cid'=>$nav_active,'audit'=>1);
// 选取
$fields = isset($fields) ? $fields : 'id,title,timeline';
// 列表
$list = $CI->model->get_list($limit,($page-1)*$limit,$order,$where,$fields);
// 页码 页码参数放在最后的位置
$count = $CI->model->get_count_all($where);
$page_pos = isset($page_pos) ? $page_pos: count(explode('/',$nav_info['path']))+1;

// $base_url = site_url($base_url); // [bug] 前面已经提供了路由URL
$page_p = _pages($base_url,$limit,$count,$page_pos) ;
