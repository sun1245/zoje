<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Msg_model extends CI_Model 
 * 消息提醒
 * @author era
 */
class Msgs_model extends MY_Model
{
	protected $table = 'msgs';

	public function get_list($limit=5,$start=0,$order=false,$where=false){
		$this->db
			->select('msgs.id,msgs.title,msgs.level,msgs.timeline,msgs.markread,manager.nickname as byname')
			->from('msgs')
			->join('manager', 'manager.id = msgs.byer', 'left')
			->limit($limit,$start)
			->where($where)
			->order_by('msgs.timeline','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// 标记 阅读等状态
	public function mark($where)
	{
		$this->db->update('msgs',array('markread'=>1,'notify'=>1),$where);
		return $this->db->affected_rows();	
	}

	// 未读数据的数量
	public function get_num($mid){
		$num = $this->db->select('count(id) as num')->from('msgs')->where( array('markread'=>0,'toer'=>$mid))->get()->row_array();
		return $num['num'];
	}

	// notify 
	public function get_notify($mid)
	{
		$query = $this->db
			->select('msgs.id,msgs.title,msgs.level,msgs.timeline,msgs.markread,manager.nickname as byname')
			->from('msgs')
			->join('manager', 'manager.id = msgs.byer', 'left')
			->limit(1,0)
			->where(array('notify'=>0,'markread'=>0))
			->order_by('msg.timeline','desc')
			->get();
		$list = $query->result_array();
		$ids = array();
		foreach ($list as $k => $v) {
			array_push($ids, $v['id']);
		}
		$this->db->update('msgs',array('notify'=>1))->where_in('id',$ids);
		return $list;
	}
}

