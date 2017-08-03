<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Logs_model extends CI_Model 
 * 日志管理
 * @author 
 */
class Log_model extends MY_Model{

	protected $table = 'log';

	// 添加日志
	public function add($category,$message)
	{
		$this->db->set('url', $_SERVER['REQUEST_URI']);
		$this->db->set('controller', $this->router->class);
		$this->db->set('category',$category);
		$this->db->set('message',$message);
		$this->db->set('message',$message);
		$this->db->set('ip',get_ip());
		if ($this->session->userdata('mid')) {
			$this->db->set('mid',$this->session->userdata('mid'));
		}
		$this->db->set('timeline',time());
		$this->db->insert('log');
	}

	public function get_list($limit=5,$start=0,$order=false,$where=false){
		$this->db
			->select('log.id,controller,url,category,message,mid,m.nickname as name,ip,timeline')
			->from('log')
			->join('manager as m','m.id=log.mid','left')
			->limit($limit,$start);
		if ($order) {
			foreach ($order as $k => $v){
				$this->db->order_by($k,$v);
			}
		}else{
			$this->db->order_by('log.timeline','desc');
		}
		if ($where) {
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	// 最近一个月内每日操作频率
	public function get_count_mouth()
	{
		$this->db
			->select(array("count(`id`) as count","FROM_UNIXTIME(`timeline`,'%Y-%m-%d') as day"))
			->from('log')
			->where('MONTH(FROM_UNIXTIME(`timeline`)) = MONTH(NOW())');

		// 普通用户只能看到自己
		if ($this->session->userdata('gid') != 1) {
			$this->db->where(array('mid'=>$this->session->userdata('mid')));
		}

		$this->db->group_by('TO_DAYS(FROM_UNIXTIME(`timeline`))');

		$query = $this->db->get();
			var_dump($this->db->last_query());
		return $query->result_array();

	}

}
