<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 检测权限是否存在 url
 * adminer 私有
 * @param  string $url 路径
 * @return boolean
 */
function get_purview($url){

	if (!$url) {
		return false;
	}

	$CI =& get_instance();

	if (!$CI->session->userdata('gid')) {
		return false;
	}

	if ($CI->session->userdata('gid') == 1) {
		return TRUE;
	}

	$pur = md5($url);
	// 过滤disable不保护的权限
	$uris_disable = $CI->mpur->get_disable_list();
	if (in_array($pur,$uris_disable)) {
		return TRUE;
	}

	$group = $CI->mmger->get_group($CI->session->userdata('gid'));
	if (in_array($pur, explode(',', $group['purview']))) {
		return TRUE;
	}
	if ($CI->session->userdata('gid') == 1) {
		return TRUE;
	}
	return false;
}

/*
 * 文件删除
 * 同时删除 boc_upload 中的记录
 * $fids 为 boc_upload 的标识，接受 array()
 */
function unlink_upload($fids=false)
{

	$CI =& get_instance();
	// 注意控制器是否加载了 mupload
	if (!isset($CI->mupload)) {
		$CI->load->model('Upload_model','mupload');
	}

	if (is_array($fids)) {

		$tmp = array();
		foreach ($fids as $v) {
			array_push($tmp, intval($v));
		}
		$fids = $tmp;
		$ps = $CI->mupload->get_in($fids);
		foreach ($ps as $v) {
			$f = urldecode($v['url']);
			$ft = urldecode($v['thumb']);
			if (is_file(UPLOAD_PATH.$f)) {
				unlink(UPLOAD_PATH.$f);
			}
			if (is_file(UPLOAD_PATH.$ft)) {
				unlink(UPLOAD_PATH.$ft);
			}
		}
		$CI->mupload->del($fids,true);
		return TRUE;
	}
	return FALSE;
}

/**
 * 栏目ids
 * @param  [type] $ids [description]
 * @return [type]      [description]
 */
function list_uploads_ids($ids){

}
