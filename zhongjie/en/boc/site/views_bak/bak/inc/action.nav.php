<?php
// 输入 －－－－－－－－－－－－－－－
// $nav_fid 		int 	获取父级别
// 
// 输出 －－－－－－－－－－－－－－－
// $nav_fid         int 	获取父级别,自动默认子级别
// $nav_list        array 	同级别栏目list
// $nav_active		int 	当前栏目ID
// $nav_path 		array 	当前栏目path array
// $nav_path_str 	string 	面包屑
// $nav_info		array 	当前栏目信息详情
// $CI->model 		class 	获取当前栏目的默认数据库模型
// $base_url 		string 	当前栏目的路由路径
// $nav_title 		string 	当前栏目的标题
// $header 			array 	SEO信息

// 临时FID
$tmp_nav_fid = count($breadcrumb)>1? $breadcrumb[count($breadcrumb)-2]['id'] :$breadcrumb[0]['id'] ;
// 获取父级别
$nav_fid = isset($nav_fid) ? $nav_fid : $tmp_nav_fid;

// 同级别
$nav_list = $CI->mcol->get_cols($nav_fid); 
if ($nav_list) {
	// 设定默认
	$nav_active = $c != $nav_fid ? $c : $nav_list[0]['id'];
}else{
	$nav_active = $c;
}
// 栏目路径
$nav_path = $CI->mcol->get_path_one($nav_active);
// 组织面包屑
$nav_path_str = '<a href="'.site_url().'">首页</a>';
foreach ($nav_path  as $k => $v) {
	if ($v['id'] == $nav_active) {
		$nav_path_str .= ' &gt; <span class="color-333">'.$v['title'].'</span>';
	}else{
		$nav_path_str .= '  &gt; <a href="'.site_url($v['path']).'">'.$v['title'].'</a>';
	}
}
// 当前栏目详情获取
$nav_info = $CI->mcol->get_one($nav_active);
// 加载数据模型,基本上ok，理论上来说不同路由不要使用同一模板
$CI->load->model($nav_info['controller'].'_model','model');
// 基本路由地址
$base_url = site_url($nav_info['path']);

// 设定SEO信息
$nav_title = $nav_info['title'];
$header['title'] = trim($nav_info['title_seo'])?$nav_info['title_seo']:$nav_info['title'];
if ($nav_info['tags']) {
	$header['tags'] = $nav_info['tags'];
}
if ($nav_info['intro']) {
	$header['intro'] = $nav_info['intro'];
}