<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 建立空文件 为其它的对象进行引用

class Upload_model extends MY_Model
{
	protected $table = 'upload'; 	

	/**
	 * 删除重写
	 * @param  boolean $where 提供给 UploadHandel
	 * @param  boolean $ids   提供给 模型中删除条目 
	 */
	public function del($where=FALSE,$ids=FALSE){
		if (!$ids and $where and is_array($where)) {
			$this->db->where($where); 
		}elseif($ids and $where and is_array($where)){
			$this->db->where_in('id',$where); 
		}else{
			return FALSE;
		}
		$this->db->delete('upload');
		return $this->db->affected_rows(); 
	}

	/**
	 * 获取id组内的数据
	 * @param  string , $where_in ids
	 * @return array 
	 */
	public function get_in($where_in=FALSE)
	{

		if ($where_in == FALSE) {
			return FALSE;
		}

		$this->db->where_in('id',$where_in);
		$query =$this->db ->get('upload');
		return $query->result_array();
	}
}