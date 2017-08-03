<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Province_model extends MY_Model {
	protected $table = 'province';
	// 获取省
	public function get_province_all()
	{
		return $this->db->select('*')->from('province')->get()->result_array();
	}

	// 获得所有市 应对js搜索
	public function get_city_all()
	{
		return $this->db->select('*')->from('province_city')->get()->result_array();
	}

	//  获得对应省的市
	public function get_city($pid)
	{
		$where = array('province_id'=>$pid);
		return $this->db->select('*')->from('province_city')->where($where)->get()->result_array();
	}

}
