<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page_irregular_model extends MY_Model {
	protected $table = 'page_irregular';


	// 为前端提供
	public function get_one_cid($where,$fields = "*"){
		if (!$where) {
			return FALSE;
		}

		$this->db->select($fields)->from($this->table);
		if (!is_numeric($where)) {
			$this->db->where($where);
		}else{
			$this->db->where('cid',$where);
		}
		$query = $this->db->get();
		$page = $query->row_array();

		if ($page and is_numeric($where)) {
			$c = $this->get_one($where,'*','columns');
			if ($c) {
				$page['title'] = $c['title'];
				$page['title_seo'] = $c['title_seo'];
				$page['tags'] = $c['tags'];
				$page['intro'] = $c['intro'];
			}
		}

		return $page;
	}
}
