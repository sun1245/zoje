<?php 
// 用于获取list中的单个条目
// 输入 －－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
// $reg 	array 	数字参数
// $id 		int 	
// 输出 －－－－－－－－－－－－－－－－－－－－－－－－－－－－－－－
// $it 		array 	条目
// $header 	array 	it的SEO信息

// 获取ID
$id = isset($reg[0])?$reg[0]: show_404();
// 获取信息
$it = $CI->model->get_one_pn(array('id'=>$id,'audit'=>1));
// 覆写SEO
if ($it) {
	$header['title'] = trim($it['title_seo'])?$it['title_seo']:$it['title'];
	if ($it['tags']) {
		$header['tags'] = $it['tags'];
	}
	if ($it['intro']) {
		$header['intro'] = $it['intro'];
	}
}else{
	dump("404 没有找到ID为".$id."的条目。",'[ac.info]404!','error');
	show_404();
}

