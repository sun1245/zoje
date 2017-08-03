<?php 
// 分类输出处理
// 输入 －－－－－－－－－－－－－－－－－－
// $nav_active 		int 	当前栏目
// $ctypes_now		int   	当前分类ID
// 
// 输出 －－－－－－－－－－－－－－－－－－
// $ctypes 			array 	全部分类平级数组
// $ctypes_now  	int 	默认分类第一个的末节点（如果指定id自动转换为数组对象）
// $ctypes_path 	array	分类路径

// 获取当前栏目分类
$ctypes = list_coltypes($nav_active,0,'ctype');

if ($ctypes) {
	if (isset($ctypes_now) and is_numeric($ctypes_now)) {
		$ctypes_now = intval($ctypes_now);
	}else{
		$ctypes_now = false;
	}
	$ctypes_path = array();
	// 查询当前
	foreach ($ctypes as $k => $v) {
		// 没有指定
		if ($ctypes_now === false and $v['depth']>0 and $v['depth'] <= $ctypes[$k-1]['depth']) {
			$ctypes_now = $ctypes[$k-1];
			
		}

		// 指定
		if ($ctypes_now and is_numeric($ctypes_now) and $v['id'] == $ctypes_now) {
			$ctypes_now = $v;

		}
	}
 	
 	// 路径组合
	array_push($ctypes_path,$ctypes_now);
	foreach (array_reverse($ctypes) as $k => $v) {
		if ($ctypes_path[0]['depth'] and $ctypes_path[0]['fid'] == $v['id']) {
			array_unshift($ctypes_path, $v);
		}
	}

}
