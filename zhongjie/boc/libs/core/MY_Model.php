<?php if (!defined('BASEPATH')) exit('No direct access allowed.');
/**
 * Class My_Model extends CI_Model
 * @author
 */
class MY_Model extends CI_Model{

	protected $table = '';         // 默认取控制器的类名,继承时最好定义

	public function __construct(){
		parent::__construct();

		if (!$this->table) {
			$this->table = strtolower( $this->router->class);
		}
		// TODO: 处理数据表字段 ，判定在create , edit 的数据字段为子集
	}

	/**
	 * 修改表名 change_table
	 * @param  string $table 表名
	 */
	public function change_table($table){
		$this->table = strtolower($table);
	}

	/**
	 * @brief 为分页提供 筛选数据的数量
	 * @param $where = false 条件
	 * @param $table = false 非默认表
	 * @return int 符合数量
	 */
	public function get_count_all($where=FALSE,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		$count = 0;
		if ($where === FALSE) {
			$count  = $this->db->count_all_results($table);
		}else{
			$count  = $this->db->where($where)->count_all_results($table);
		}
		return $count;
	}

	// TODO: 为 list 提供精确字段读取
	/**
	 * 为普通index提供分页的list列表
	 * @param  integer $limit 开始位置
	 * @param  integer $start 取行数
	 * @param  boolean $where 条件
	 * @param  boolean $order 排序
	 * @return array         数组
	 */
	public function get_list($limit=5,$start=0,$order=false,$where=false,$fields="*",$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}

		$this->db
		->select($fields)
		->from($table);

		// =0 getall
		if ($limit) {
			$this->db->limit($limit,$start);
		}

		if ($order) {
			if (is_array($order)) {
				foreach ($order as $k => $v){
					$this->db->order_by($k,$v);
				}
			}else if(is_string($order)){
				$this->db->order_by($order);
			}
		}else{
			if ($this->db->field_exists('sort_id',$table)) {
				$this->db->order_by('sort_id','desc');
			}else{
				$this->db->order_by('id','desc');
			}
		}
		if ($where) {
			if (is_string($where)) {
				$where = ' '.$where.' ';
			}elseif (is_array($where)) {
				$this->db->where($where);
			}
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * @brief 返回第一个值
	 * @param $where 数字或者为字符串 数组形式的条件
	 * @param $fields string 取字段
	 * @return
	 */
	public function get_one($where,$fields = "*",$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		if (!$where) {
			return FALSE;
		}
		$this->db->select($fields)->from($table);
		if (!is_numeric($where)) {
			$this->db->where($where);
		}else{
			$this->db->where('id',$where);
		}
		if ($this->db->field_exists('sort_id',$table)) {
			$this->db->order_by('sort_id','desc');
		}else{
			$this->db->order_by('id','desc');
		}
		$query = $this->db->get();
		$row = $query->row_array();
		return $row;
	}

	/**
	 * @brief 返回第一个值和取上下值
	 * @param $where 数字或者为字符串 数组形式的条件
	 * @param $fields string 取字段
	 * @return
	 */
	public function get_one_pn($where,$fields = "*",$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		if (!$where) {
			return FALSE;
		}
		$this->db->select($fields)->from($table);
		if (!is_numeric($where)) {
			$this->db->where($where);
		}else{
			$this->db->where('id',$where);
		}
		$query = $this->db->get();
		$row = $query->row_array();

		if($row)
		{
			$perv = $this->db->select('id,title')
			->from($this->table)
			->where(array('cid'=>$row['cid'],'audit'=>1,'sort_id >'=>$row['sort_id']))
			->order_by('sort_id','asc')
			->limit(1)->get()->row_array();

			if($perv)
			{
				$row['prev_id'] = $perv['id'];
				$row['prev_title'] = $perv['title'];
			}

			$next = $this->db->select('id,title')
			->from($this->table)
			->where(array('cid'=>$row['cid'],'audit'=>1,'sort_id <'=>$row['sort_id']))
			->order_by('sort_id','desc')
			->limit(1)->get()->row_array();
			if($next)
			{
				$row['next_id'] = $next['id'];
				$row['next_title'] = $next['title'];
			}
		}

		return $row;
	}

	/**
	 * find_one 查询字段的值是否唯一
	 * @param  any  $value 值
	 * @param  string  $field 字段名称
	 * @param  string $table 表名称
	 * @return boolean/int         返回id或false
	 */
	public function find_one($value,$field="id",$table=false){
		if (!$table) {
			$table = $this->table;
		}

		$query = $this->db
		->select('id')
		->from($table)
		->where($field,$value)
		->get();

		if ($this->db->affected_rows()) {
			$id = $query->row_array();
			return $id['id'];
		}else{
			return false;
		}
	}

	/**
	 * select all 默认获得全部的数据
	 * @param  string $select 选择字段
	 * @param  string/array $where  条件语句
	 * @param  string $orders 排序规则，之后可以跟上 limit一类的也是可以的
	 * @return array         result array
	 */
	public function get_all($where=false,$fields='*',$order=false,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		$this->db->select($fields)->from($table);
		if ($where) {
			$this->db->where($where);
		}
		if ($order) {
			if (is_array($order)) {
				foreach ($order as $k => $v){
					$this->db->order_by($k,$v);
				}
			}else if(is_string($order)){
				$this->db->order_by($order);
			}
		}else{
			if ($this->db->field_exists('sort_id',$table)) {
				$this->db->order_by('sort_id','desc');
			}else{
				$this->db->order_by('id','desc');
			}
		}
		$query =$this->db->get();
		return $query->result_array();
	}

	/**
	 * select all 获取指定条数数据
	 * @param  string $select 选择字段
	 * @param  string/array $where  条件语句
	 * @param  string $limit 条数
	 * @param  string $orders 排序规则，之后可以跟上 limit一类的也是可以的
	 * @return array         result array
	 */
	public function get_all_limit($where=false,$fields='*',$limit=5,$order=false,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		$this->db->select($fields)->from($table);
		if ($where) {
			$this->db->where($where);
		}
		if ($order) {
			if (is_array($order)) {
				foreach ($order as $k => $v){
					$this->db->order_by($k,$v);
				}
			}else if(is_string($order)){
				$this->db->order_by($order);
			}
		}else{
			if ($this->db->field_exists('sort_id',$table)) {
				$this->db->order_by('sort_id','desc');
			}else{
				$this->db->order_by('id','desc');
			}
		}
		$this->db->limit($limit);
		$query =$this->db->get();
		return $query->result_array();
	}


	/**
	 * 创建数据，根据orm创建
	 * @param  array  $data  数据组合
	 * @param  boolean $batch batch
	 * @return int     insertid or 影响数
	 */
	public function create($data,$batch=false,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}
		if ($batch == false) {
			if (!isset($data['sort_id']) AND $this->db->field_exists('sort_id',$table)) {
				$sort_id= $this->db->select_max('sort_id')->get($table)->row_array();
				$data['sort_id'] = intval($sort_id['sort_id']) + 1;
			}
			if (!isset($data['timeline']) AND $this->db->field_exists('timeline',$table)) {
				$data['timeline'] = time();
			}

			if(isset($data['isremote'])){
				//获取内容里面图片地址并且下载
				if($data['isremote']==1){
					if(isset($data['content'])){
						$content=$data['content'];
						$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
						preg_match_all($pattern,$content,$match);
						// print_r($match[0]);
						// print_r($match[1]);
					}
					if(!empty($match[1])){
						foreach($match[1]  as $v){
							$result_arr=getImage($v,UPLOAD_PATH,'',1);
							$newimgurl=UPLOAD_URL.$result_arr['file_name'];
							$content=str_replace($v,$newimgurl,$content);
						}
					}
					$data['content']=$content;
				}
				unset($data['isremote']);
				//获取内容里面图片地址并且下载
			}



			$this->db->insert($table, $data);
			if ($this->db->affected_rows()) {
				return $this->db->insert_id();
			}
			return 0;
		}else{
			$this->db->insert_batch($table, $data);
			// $id = $this->db->insert_id();
			// $this->db->where(array('id'=>$id))->update($table,array('sort_id'=>$id));
			return $this->db->affected_rows();
		}
	}

	/**
	 * 更新数据
	 * @param  array  $data  orm数据包
	 * @param  string/array  $where 条件
	 * @param  boolean $batch batch
	 * @return int           影响数
	 */
	public function update($data,$where,$batch=false,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}

		if(isset($data['isremote'])){
			//获取内容里面图片地址并且下载
			if($data['isremote']==1){
				if(isset($data['content'])){
					$content=$data['content'];
					$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
					preg_match_all($pattern,$content,$match);
					// print_r($match[0]);
					// print_r($match[1]);
				}
				if(!empty($match[1])){
					foreach($match[1]  as $v){
						$result_arr=getImage($v,UPLOAD_PATH,'',1);
						$newimgurl=UPLOAD_URL.$result_arr['file_name'];
						$content=str_replace($v,$newimgurl,$content);
					}
				}
				$data['content']=$content;
			}
			unset($data['isremote']);
			//获取内容里面图片地址并且下载
		}

		if ($batch == false) {
			$query = $this->db->update($table, $data,$where);
		}else{
			$query = $this->db->update_batch($table, $data, $where);
		}
		return $this->db->affected_rows();
	}

	/**
	 * 删除
	 * @param  string/array  $ids or num 条件
	 * @param  boolean $where 额外条件
	 * @return int           影响数
	 */
	public function del($ids,$where=FALSE,$table=FALSE){
		if (!$table) {
			$table = $this->table;
		}

		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$ids));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids);
		}

		if ($where) {
			$this->db->where($where);
		}

		$this->db->delete($table);

		return $this->db->affected_rows();
	}

	// 组合简单处理 ，建议不要继承了单独做个吧
	public function _where($where,$table=FALSE)
	{
		if (!$table) {
			$table = $this->table;
		}
		if ($where and is_array($where)) {
			$w = array();
			foreach ($where as $k => $v) {
				$w[$table.'.'.$k] = $v;
			}
			return $w;
		}else{
			return '';
		}
	}

	// 开关

	/**
	 * 审核数据
	 * @param  integer $audit 审核 0/1
	 * @param  array/integer  $ids   ID 标识
	 * @param  array/string   $where 条件
	 * @return int            影响数据行
	 */
	public function audit($audit=1,$ids,$where=FALSE,$table=FALSE)
	{
		if (!$table) {
			$table = $this->table;
		}
		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$ids));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids);
		}

		if ($where) {
			$this->db->where($where);
		}

		$data = array('audit'=>$audit);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}

	// 推荐
	public function flag($flag=1,$ids,$where=FALSE,$table=FALSE)
	{
		if (!$table) {
			$table = $this->table;
		}
		if (!$this->db->field_exists('flag',$table)) {
			return false;
		}

		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$ids));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids);
		}

		if ($where) {
			$this->db->where($where);
		}

		$data = array('flag'=>$flag);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}

	// 显示
	public function status_show($show=0,$ids,$where=false,$table=FALSE)
	{
		if (!$table) {
			$table = $this->table;
		}
		if (!$this->db->field_exists('show',$table)) {
			return false;
		}

		if (is_numeric($ids)) {
			$this->db->where(array('id'=>$ids));
		}

		if (is_array($ids)) {
			$this->db->where_in('id',$ids);
		}

		if ($where) {
			$this->db->where($where);
		}

		$data = array('show'=>$show);
		$this->db->update($table,$data);
		return $this->db->affected_rows();
	}


	// public function _where($where=FALSE){
	// 	$this->db->where(array('id >'=> '40'));
	// }

}
