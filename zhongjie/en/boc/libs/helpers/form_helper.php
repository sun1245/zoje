<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * 匹配切换
 * @param string  $field   字段name
 * @param boolean $value   值
 * @param boolean $default 默认值
 * @param boolean $str     正确输出
 * @param string  $str2    错误输出
 */
function set_switch($field = '', $value = false , $default = false, $str = false, $str2=''){
	if ($value === false) {
		return $str2;
	}
	if ($default !== false) {
		return set_value($field,$default) == $value ? $str : $str2;
	}
	return set_value($field) == $value ? $str: $str2;
}

function set_selected($field = '', $value = false , $default = false, $str = false,$str2 = ''){
	if ($str === false) {
		$str = ' selected="selected" ';
	}
	return set_switch($field,$value,$default,$str,$str2);
}

function set_checked($field = '', $value = false , $default = false, $str = false,$str2 = ''){
	if ($str === false) {
		$str = ' checked="checked" ';
	}
	return set_switch($field,$value,$default,$str,$str2);
}

// 提供表单错误
function form_errors(){
	if (FALSE === ($OBJ =& _get_validation_object()))
	{
		return '';
	}
	return $OBJ->get_errors();
}

