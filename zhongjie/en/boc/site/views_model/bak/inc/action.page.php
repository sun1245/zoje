<?php 
// 单页面获取
// 输入 －－－－－－－－－－－
// $nav_active 	int 	当前栏目（由nav自动获取）
// 输出 －－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
// $it 		array 	条目
// $header 	array 	it的SEO信息

$CI->load->model('page_model','mpage');
// 获取详情
$it = $CI->mpage->get_one_cid($nav_active);

// 覆写SEO
if ($it) {
	$header['title'] = trim($it['title_seo'])?$it['title_seo']:$it['title'];
	$header['tags'] = $it['tags'];
	$header['intro'] = $it['intro'];
}else{
	show_404();
}