<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 分类数据获取
class Coltypes_model extends MY_Model {

	protected $table = 'coltypes';

	// 获取ids，分类下所有的子分类的ids,用于查询分类以及子分类下内容
	function find_ids($cid,$fid=0,$name="ctype"){
        $tmp = array($fid);
        $list = $this->get_all(array('cid'=>$cid,'fid'=>$fid,'name'=>$name));
        foreach ($list as $k => $v) {
            if ($more = $this->find_ids($cid,$v['id'],$name)) {
               $tmp = array_merge($tmp,$more);
            }else{
                array_push($tmp, $v['id']);
            }
        }
        return $tmp;
    }

	// 获取分类信息
	public function get_ctypes($cid,$fid,$name="ctype"){
		$query = $this->db
			->select('coltypes.*,coltypes.id as cfid,(select count(`id`) from '.$this->db->dbprefix.'coltypes where `fid` = `cfid` ) as more')
			->from('coltypes')
			->where(array('cid'=>$cid,'fid'=>$fid,'name'=>$name))
			->order_by('sort_id','asc')
			->get();
		return $query->result_array();
	}

	// 获取整体列表
	// 返回多层递归体
	public function get_tree($cid=false,$fid=0,$name='ctype'){
		$ctypes = $this->get_ctypes($cid,$fid,$name);
		foreach ($ctypes as $k => $v) {
			if ($v['more'] > 0) {
				$ctypes[$k]['more'] = $this->get_tree($cid,$v['id'],$name);
			}
		}
		return $ctypes;
	}

	// 递归获取分类列表
	// 返回单层顺序体
	public function get_ctypes_select($cid=false,$fid=0,$name='ctype'){
		$list = array();
		$ctypes = $this->get_ctypes($cid,$fid,$name);
		foreach ($ctypes as $k => $v) {
			// $str = "";
			// if ($v['depth'] > 0) {
			// 	for ($i=0; $i < intval($v['depth']); $i++) {
			// 		$str .= "";
			// 	}
			// }
			// $v['title'] = $str.$v['title'];
			array_push($list, $v);
			if ($v['more'] > 0) {
				$list2 = $this->get_ctypes_select($cid,$v['id'],$name);
				$list = array_merge($list,$list2);
			}
		}
		return $list;
	}


}
