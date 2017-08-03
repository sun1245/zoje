<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configs_model extends MY_Model {

	protected $table = 'configs';

	/**
	 * 获取category分类一组数据
	 * @param  string $category 分类
	 * @return array 
	 */
	public function get_cate($category)
	{
		$query = $this->db->select('key,value,intor,label')
			->where('category',$category)
			->from('configs')
			->order_by('sort_id')
			->get();
		return $query->result_array();
	}

	/**
	 * 获取分类下的某个键值的值
	 * @param  string $category 分类
	 * @param  string $key      键值
	 * @return string / false
	 */
	public function get($category,$key)	
	{
		$query = $this->db->select('value')
			-> where(array('category'=>$category,'key'=>$key))
			-> from('configs')
			-> get();
		if ($row = $query->row_array()) {
			return $row['value'];
		}else{
			return FALSE;
		}
	}

	// get的同名函数
	public function get_config($category,$key)	
	{
		if (!$this->db) {
			return false;
		}
		// return "";
		$query = $this->db->select('value')
			-> where(array('category'=>$category,'key'=>$key))
			-> from('configs')
			-> get();
		if ($row = $query->row_array()) {
			return $row['value'];
		}else{
			return FALSE;
		}
	}

	/**
	 * 修改配置
	 * @param string $category 分类
	 * @param string $key      键值
	 * @param string $value    值
	 */
	public function set($category,$key,$value)
	{
		$this->db->set('value',$value)
			-> where(array('category'=>$category,'key'=>$key))
			-> update('configs');
		return $this->db->affected_rows();
	}

	// 对 MY_Model->create 重写
	public function create($category,$key,$value)
	{
		if ($this->db->having(array('category ='=>$category,'key ='=>$key))) {
			return false;
		}else{
			$this->db->set(array('category'=>$category,'key'=>$key,'value'=>$value))
			-> insert('configs');
			return $this->db->affected_rows();
		}
	}

}

/* End of file config_model.php */
/* Location: .//home/http/bocms/adminer/models/config_model.php */