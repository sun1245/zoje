<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Recruit extends CI_Model
 * @author yincast
 */
class Recruit_model extends MY_Model
{
    protected $table = 'recruit';

	public function get_list($limit=15,$start=0,$order=false,$where=false,$fields="*"){
		$this->db
			->select($fields)
			->from($this->table)
			->limit($limit,$start);
		if ($order) {
			if (is_array($order)) {
				foreach ($order as $k => $v){
					$this->db->order_by($k,$v);
				}
			}else if(is_string($order)){
				$this->db->order_by($order);
			}
		}else{
			if ($this->db->field_exists('sort_id',$this->table)) {
				$this->db->order_by('sort_id','desc');
			}elseif ($this->db->field_exists('timeline',$this->table)) {
				$this->db->order_by('timeline','desc');
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

		// 删除图片时，缩略图删除了，路径没有更新，需要下面代码把路径赋值为空
		if ($this->db->field_exists('photo',$table)) {
			if(empty($data['photo'])){$data['thumb']='';}
		}

		// 删除生成的静态文件
		$htmlfilepath=HTML_PATH.'recruitinfo-'.$data['id'].'.html';
		if (file_exists($htmlfilepath)) {
			@unlink($htmlfilepath);
		}
		
		// 获取内容里面图片地址并且下载
		if(isset($data['isremote'])){
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

		// 删除内容中的图片
		if ($this->db->field_exists('content',$table)) {
			$where = array('in' => array('id',$ids));
			$this->db->select('id,content');
			$resultlist=$this->db->get_where($table,$where)->result_array();
			foreach($resultlist as $v){

				// 删除生成的静态文件
				$htmlfilepath=HTML_PATH.'recruitinfo-'.$v['id'].'.html';
				if (file_exists($htmlfilepath)) {
					@unlink($htmlfilepath);
				}

				if(!empty($v['content'])){
					$content=$v['content'];
					$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
					preg_match_all($pattern,$content,$match);
					if(!empty($match[1])){
						foreach($match[1]  as $v){
							@$photo_url=explode('upload', $v);
							@$url=UPLOAD_PATH.$photo_url[1];
							@unlink($url);
						}
					}
				}
			}
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

	
}
