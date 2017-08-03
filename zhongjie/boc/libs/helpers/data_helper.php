<?php
// 主要放置数据操作的简化函数

if (!function_exists('list_upload')) {
	/**
	 * 获取上传列表
	 * @param  string $ids 上传列表值 '1,2,3[...]'
	 * @return array|false 数组或逻辑false
	 */
	function list_upload($ids){

		if ($ids === false or !is_string($ids) or $ids=="") {
			return false;
		}

		$CI =& get_instance();
		$keys = explode(',', $ids);
		// 检测model
		if (!isset($CI->mupload)) {
			$CI->load->model('Upload_model','mupload');
		}
		$tmp = $CI->mupload->get_in($keys);
		$list = $keys;
		foreach ($tmp as $v) {
			foreach ($keys as $k => $kid) {
				if ($kid == $v['id']) {
					$list[$k] = $v;
				}
			}
		}
		foreach ($list as $key => $value) {
			if (!is_array($value)) {
				unset($list[$key]);
			}
		}
		return array_values($list);
	}
}

if (!function_exists('one_upload')) {
	/**
	 * 获单个上传文件
	 * @param  string $id  上传ID
	 * @return array|false 数组或逻辑false
	 */
	function one_upload($id){
		if ($id === false or !is_numeric($id)) {
			return false;
		}
		$CI =& get_instance();
		// 检测model
		if (!isset($CI->mupload)) {
			$CI->load->model('Upload_model','mupload');
		}
		return $CI->mupload->get_one($id);
	}
}

// TAG: UPDATE
if (!function_exists('list_coltypes')) {
	/**
	 * 获取列表分类
	 * @param  integer $cid  栏目ID
	 * @param  integer $fid  分类查询顶级ID，默认为0
	 * @param  string  $name 字段名称，默认为ctype
	 * @return array         多级别分类数组，历遍到底层
	 */
	function list_coltypes($cid,$fid=0,$name='ctype'){
		if (!is_numeric($cid) or $name === false) {
			return false;
		}
		$CI =& get_instance();
		// 检测model
		if (!isset($CI->mctypes)) {
			$CI->load->model('coltypes_model','mctypes');
		}
		return $CI->mctypes->get_tree($cid,$fid,$name);
		// return $CI->mctypes->get_ctypes_path($cid,$fid,$name);
	}
}

/**
 * 仅仅获取分类ID下的子分类，不向下寻找
 * @param  integer $cid  栏目ID
 * @param  integer $fid  分类查询顶级ID，默认为0
 * @param  string  $name 字段名称，默认为ctype
 * @return array         当前父级别ID下的分类
 */
function list_coltypes_fid($cid,$fid=0,$name='ctype')
{

	if (!is_numeric($cid) or $name === false) {
		return false;
	}
	$CI =& get_instance();
	// 检测model
	if (!isset($CI->mctypes)) {
		$CI->load->model('coltypes_model','mctypes');
	}
	return $CI->mctypes->get_ctypes($cid,$fid,$name);
}

/**
 * 获取fid下所有的子id ，为where提供in参数搜索
 * @param  integer $cid  栏目ID
 * @param  integer $fid  分类查询顶级ID，默认为0
 * @param  string  $name 字段名称，默认为ctype
 * @return array         当前父级别ID下的分类
 */
function coltypes_ids($cid,$fid=0,$name='ctype')
{

	if (!is_numeric($cid) or $name === false) {
		return false;
	}
	$CI =& get_instance();
	// 检测model
	if (!isset($CI->mctypes)) {
		$CI->load->model('coltypes_model','mctypes');
	}
	return $CI->mctypes->find_ids($cid,$fid,$name);
}

/**
 * 获取单个分类的信息
 * @param  boolean $id     分类ID
 * @param  string  $fields 获取字段默认所有
 * @return array           栏目信息
 */
function one_ctype($id,$fields="*")
{
	if (!is_numeric($id)) {
		return false;
	}
	$CI =& get_instance();
	// 检测model
	if (!isset($CI->mctypes)) {
		$CI->load->model('coltypes_model','mctypes');
	}
	return $CI->mctypes->get_one($id,$fields);
}

if (!function_exists('one_col')) {
	/**
	 * 获取单个栏目基本信息
	 * @param  integer $cid    栏目ID
 	 * @param  string  $fields 获取字段默认所有
	 * @return array           栏目信息
	 */
	function one_col($cid,$fields="*"){
		if ($cid === false or !is_numeric($cid)) {
			return false;
		}
		$CI =& get_instance();
		if (!isset($CI->mcol)) {
			$this->load->model('Columns_Model','mcol');
		}
		return $CI->mcol->get_one($cid,$fields);
	}
}

if (!function_exists('get_list_cid')) {

	/**
	 * 获取栏目下的列表（列表类型栏目）
	 * @param  integer $cid    栏目ID
	 * @param  integer $limit  获取条目
	 * @param  array   $where  条件
	 * @param  string  $fields 字段
	 * @return array[]         列表数组
	 */
	function get_list_cid($cid,$limit=10,$where=false,$fields='*'){
		if (!$cid) {
			return false;
		}
		$where = $where ? $where : array('cid'=>$cid,'audit'=>1);
		$CI =& get_instance();
		if (!isset($CI->mcol)) {
			$this->load->model('Columns_Model','mcol');
		}
		$info = $CI->mcol->get_one($cid);
		$re_list = $CI->mcol->get_list($limit,0,false,$where,$fields,$info['controller']);
		foreach ($re_list as $k => $v) {
			$re_list[$k]['path'] = $info['path'];
		}
		return $re_list;
	}
}

/**
 * 获取单页信息
 * @param  boolean $cid 单页栏目ID
 * @return array        单页信息
 */
function one_page($cid){
	if (!$cid) {
		return false;
	}
	$CI =& get_instance();
	if (!isset($CI->mpage)) {
		$CI->load->model('page_model','mpage');
	}
	$it = $CI->mpage->get_one_cid($cid);
	return $it;
}

/**
 * 获取站点配置的分类下的某个键值的值
 * @param  string $category 分类
 * @param  string $key      键值
 * @return string / false
 */
function get_config_site($category,$key){
	$CI =& get_instance();
	if (!isset($CI->mcfg)) {
		$CI->load->model('configs_model','mcfg');
	}
	return $CI->mcfg->get_config($category,$key);
}
