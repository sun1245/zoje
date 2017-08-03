<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Columns_model extends MY_Model
 * @author
 */
class Columns_Model extends MY_Model{
	protected $table = 'columns';

	// 获得栏目, todo 修改多级
	public function get_cols($fid = 0)
	{
		// (select count(`cid`) from boc_columns where `parent_id` = `cid` ) as cls
		$query = $this->db
			->select('columns.*,columns.id as cid,columns.title as ctitle,modules.title as mtitle,columns.depth as cdepth,columns.identify as cidentify,columns.show as cshow,controller,columns.sort_id as csort_id,(select count(`cid`) from '.$this->db->dbprefix.'columns where `parent_id` = `cid` ) as more')
			->from('columns')
			->join('modules','modules.id = columns.mid','left')
			->where('columns.parent_id',$fid)
			->order_by('columns.sort_id','asc')
			->get();
		return $query->result_array();
	}

	// 获得 cide 深度
	public function get_depth($id)
	{
		$query = $this->db->select('id,depth')->from('columns')->where('id',$id)->get();
		$row  = $query->row_array();
		if ($row) {
			return $row['depth'];
		}
		return 0;
	}

	// 获得模型
	public function get_modules(){
		$query = $this->db->select('id,title,controller')->from('modules')->order_by('sort_id','desc')->get();
		return $query->result_array();
	}

	// 根据给出的目录Id找其向上的目录结构
	public function get_path_one($id){
		$depth = $this->get_depth($id)+1;
		$path = array();
		for ($i=0; $i < $depth; $i++) {
			$data = $this->db->select('id,parent_id,title,identify,path')->from('columns')->where('id',$id)->get()->row_array();
			if ($data) {
				$id = $data['parent_id'];
				array_push($path, $data);
			}
		}
		return array_reverse($path);
	}

	// 获得更多消息
	public function get_path_more($id){
		$depth = $this->get_depth($id)+1;
		$path = array();
		for ($i=0; $i < $depth; $i++) {
			$data = $this->db->select('columns.id,parent_id,columns.title,controller')
			->from('columns')
			->join('modules','modules.id=columns.mid','left')
			->where('columns.id',$id)
			->get()->row_array();
			$id = $data['parent_id'];
			array_push($path, $data);
		}
		return array_reverse($path);
	}

	/**
	 * 重写删除，状态删除
	 * @param  string/array  $ids or num 条件
	 * @param  boolean $where 额外条件
	 * @return int           影响数
	 */
	public function del($ids,$where=FALSE){
		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$where));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids);
		}

		if ($where) {
			$this->db->where($where);
		}

		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	// 检测 深度下是否存在 identify
	public function get_col_identify($identify,$pid=false)
	{
		if (!$identify or $pid === false) {
			return false;
		}
		$where = array('parent_id'=>$pid,'identify'=>$identify);
		$data = $this->db->select('id,title,identify')->from('columns')->where($where)->get()->row_array();
		return $data;
	}

	public function get_one($where=FALSE,$fields = "*",$table=FALSE){
		if ($where === FALSE) {
			return FALSE;
		}

		$table = "columns";

		$this->db
			->select('columns.*,modules.controller')
			->from('columns')
			->join('modules','modules.id = columns.mid','left');

		if (!is_numeric($where) and is_array($where)) {
            $w = array();
            foreach ($where as $k => $v) {
                $w['columns.'.$k] = $v;
            }
            $this->db->where($w);
        }else{
            $this->db->where(array('columns.id'=>$where));
        }

        $query = $this->db->get();

		return $query->row_array();
	}

	// 获取整体列表
	// 返回多层递归体
	public function get_tree($fid=0){
		$cols = $this->get_cols($fid);
		foreach ($cols as $k => $v) {
			if ($v['more'] > 0) {
				$cols[$k]['more'] = $this->get_tree($v['id']);
			}
		}
		return $cols;
	}

	// 为 select 提供数据
	// 返回单层顺序体
	public function get_cols_select($fid=0){
		$list = array();
		$cols = $this->get_cols($fid);
		foreach ($cols as $k => $v) {
			$item['id'] = $v['cid'];
			$item['title'] = $v['ctitle'];
			$item['mtitle'] = $v['mtitle'];
			$item['depth'] = $v['cdepth'];
			$item['identify'] = $v['cidentify'];
			$item['show'] = $v['cshow'];
			$item['controller'] = $v['controller'];
			$item['csort_id'] = $v['csort_id'];
			$item['more'] = $v['more'];
			$item['path'] = $v['path'];
			array_push($list, $item);
			if ($v['more'] > 0) {
				$list_more = $this->get_cols_select($v['cid']);
				$list = array_merge($list,$list_more);
			}
		}
		return $list;
	}

}
