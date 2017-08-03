<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager_purview_Model extends MY_Model 
{
	protected $table = "manager_purview";

	// 分组输出 非栏目权限
	public function get_perview_lv1()
	{
		$query = $this->db->select('model')
			->from('manager_purview')
			->where('cid is null or cid = "" ')
			->group_by('model')
			->get();

		$arr = array();
		foreach ($query->result_array() as $m) {
			$arr[$m['model']] = $this->db->select('id,title,model,method,uri,status')
			->from('manager_purview')
			->where(array('model'=>$m['model']))
			->order_by('id desc')
			->get()
			->result_array();
		}
		return $arr;
	}

	// 输出 栏目cid下的权限
	public function get_perview_list_cid($cid){
		$query = $this->db->select('id,title,model,method,uri,status')
			->from('manager_purview')
			->where('cid',$cid)
			->order_by('id','desc')
			->get();
		return $query->result_array();
	}

	// 获取 disable uri list
	public function get_disable_list(){
		$rows = $this->db->select('uri')->from('manager_purview')->where(array('status'=>'0'))->get()->result_array();
		$uris = array();
		foreach ($rows as $k => $v) {
			array_push($uris, $v['uri']);
		}
		return $uris;
	}

	// 查找 uri 存在与否
	public function get_uri($uri=false)
	{
		if (!$uri) {
			return false;
		}

		$row = $this->db->select('id')->from('manager_purview')->where(array('uri'=>$uri))->get()->row_array();

		if ($row) {
			return true;
		}else{
			return false;
		}

	}

	public function cg_status($ids,$status){
		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$where));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids); 
		}

		if (is_numeric($status)) {
			$data = array(
				'status'=>$status,
				);
			$this->db->update('manager_purview',$data);
			if ($this->db->affected_rows()) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}

}

/* End of file manager_purview_Model.php */
/* Location: ./application/models/manager_purview_Model.php */