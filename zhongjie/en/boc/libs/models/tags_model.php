<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tags_model extends MY_Model
{
	protected $table = 'tags';

	/**
	 * 保存关键词
	 * @param string|array $tags 关键词(组)
	 * @param int $cid  栏目ID
	 * @param int $id   文章ID
	 * @param int $type 类型 0：关键词，1：标题，2：简介，3：内容 
	 * @return int  插入ID | 0
	 */
	public function add($tags,$cid=0,$aid=0,$type=0)
	{
		// ？ 使用缓存来增加速度？

		$this->load->helper('string');

		$array_err = array();
		$table = $this->table;

		if (is_string($tags)) {
			$tags = explode(',',$tags);
		}

		switch ($type) {
			case 0:
			case "keyword":
				$type = "keyword";
				$typeid = 0;
				break;
			case "title":
			case 1:
				$type = "title";
				$typeid = 1;
				break;
			case "intro":
			case 2:
				$type = "intro";
				$typeid = 2;
				break;
			case "content":
			case 3:
				$type = "content";
				$typeid = 3;
				break;
			default:
				$type = "keyword";
				$typeid = 0;
				break;
		}

		// 数据容器
		$data = array();

		// 去除旧list
		$this->db->where(array('cid'=>$cid,'aid'=>$aid,'type'=>$typeid))->delete('tags_list');

		foreach ($tags as $tag) {
			$tag = array(
				"tag"      => $tag,
				"en"       => pinyin($tag),
				"len"      => mstrlen($tag),
				"type"     => $typeid
				);
			// $tag[$type] = "{".$cid.",".$id."}";

			$it = $this->db->select('*')
				->where(array('len'=>$tag['len'],'tag'=>$tag['tag'],'type'=>$typeid))
				->from($table)
				->get()
				->row_array();

			$tid = 0;             // tag id
			$data_list = array(); // tags_list

			if ($it) {
				$tid = $it['id']; 
				// 累加
				$where = array('id'=>$it['id']);
				// if ($it[$type]) {
				// 	$tag[$type] =str_replace(",,",",",str_replace($tag[$type], '', $it[$type]).','. $tag[$type]);
				// }else{
				// 	$tag[$type] =$tag[$type];
				// }
				$tag['type'] = $typeid;
				$this->db->set('count', 'count+1', FALSE);
				$this->db->update($table,$tag,$where);
				if (!$this->db->affected_rows()) {
					array_push($array_err,$tag);
				}
				
				$data_list = array('tid'=>$tid,'cid'=>$cid,'aid'=>$aid,'type'=>$typeid);
				// $this->db->where(array('cid'=>$cid,'aid'=>$aid,'type'=>$typeid))->delete('tags_list');
			}else{
				// 追加
				$this->db->insert($table,$tag);
				$tid = $this->db->insert_id();
				if (!$this->db->affected_rows()) {
					array_push($array_err,$tag);
				}
				$data_list = array('tid'=>$tid,'cid'=>$cid,'aid'=>$aid,'type'=>$typeid);
			}

			// 追加list
			$data_list['timeline'] = time();
			$this->db->insert('tags_list',$data_list);
		}

		// 存在时候进行追加文章和count
		// $this->db->insert_batch($this->table, $data);
		// return $this->db->affected_rows();
	}

	/**
	 * 通过关键词查找文章
	 * @param  string $tags 关键词
	 * @param int $type 查询类型 
	 * @return array        文章信息结构
	 */
	public function find_list($tags='',$limit=10,$start=0,$order=false)
	{
		if (is_string($tags)) {
			$tags = explode(',',str_replace(array('，',' ','　','|'), ',', $tags));
		}

		$table = $this->table;

		$tags_id = array();
		// 类似的，拼音相同的，后缀不同的
		$like = array();

		foreach ($tags as $tag) {
			$it = $this->db->select('id')
				// 精准查询
				->where(array('len'=>mstrlen($tag),'tag'=>$tag))
				->from($table)
				->get()
				->row_array();
			if ($it) {
				array_push($tags_id, $it['id']);
			}
		}

		//如果没有结果则模糊查询
		if (!$tags_id) {
			foreach ($tags as $tag) {
				$list = $this->db->select('id')
					->like('tag',$tag)
					->from($table)
					->get()
					->result_array();
				if ($list) {
					foreach ($list as $it) {
						array_push($tags_id, $it['id']);
					}
				}
			}
		}

		// 返回结果
		$re = false;
		// 查询文章链接
		if ($tags_id) {
			$this->db->select('tid')->where_in('tid',$tags_id)->group_by('aid,cid')->get('tags_list')->row_array();
			if ($re['count'] = $this->db->affected_rows()) {
				$re['list'] = $this->db->select('tags_list.*,count('.$this->db->dbprefix.'tags_list.cid) as c,columns.path')
					->join('columns','tags_list.cid = columns.id','left')
					->where_in('tid',$tags_id)
					->group_by('aid,cid')
					->order_by('tags_list.type','asc')
					->order_by('tags_list.timeline','desc')
					->limit($limit,$start)
					->get('tags_list')
					->result_array();
			}
		}
		return $re;
	}


	// 获取tag关键词 10  个
	public function get_kw()
	{
		$this->db->cache_on();
		$count = $this->get_count_all(array('type'=>0));
		$this->db->cache_off();

		$start = 0;
		if ($count > 10) {
			$start = rand(10,$count)-10; 
		}

// 随机
// 		SELECT *
// FROM `table` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(id) FROM `table`)-(SELECT MIN(id) FROM `table`))+(SELECT MIN(id) FROM `table`)) AS id) AS t2
// WHERE t1.id >= t2.id
// ORDER BY t1.id LIMIT 1;

		$list = $this->db->select('id,tag')
		->where('type',0)
		->order_by('count','desc')
		->limit(10,$start)
		->get($this->table)
		->result_array();

		foreach ($list as $k=> $v) {
			$list[$k]['link'] = $this->find_link($v['id']);
		}

		return $list;
	}

	// 为精准关键词，链接生成提供
	// 获取标准标签的随机链接
	public function find_link($tid=false)
	{
		if (!$tid) {
			return false;
		}
		$this->db->cache_on();

		// 获取最新的
		// $list = $this->db->select('*')
		// 	->where('tid',$tid)
		// 	->group_by('timeline')
		// 	->get('tags_list')
		// 	->result_array();

		$list = $this->db->select('tags_list.*,count('.$this->db->dbprefix.'tags_list.cid) as c,columns.path')
				->join('columns','tags_list.cid = columns.id','left')
				->where(array('tid'=>$tid,'type'=>0))
				->group_by('aid,cid')
				->order_by('tags_list.timeline','desc')
				->limit(10,0)
				->get('tags_list')
				// 获取最近的
				// -> row_array();
				// 获取多个
				->result_array();

		$this->db->cache_off();

		// 取最近
		// $it = $list;

		// // 默认第一个
		$it = $list[0];

		if ($rows = $this->db->affected_rows()) {
			$rand = rand(0,$rows);
			if (isset($list[$rand])) {
				$it = $list[$rand];
			}
		}

		if ($it) {
			return $it['path'].'/info/'.$it['aid']; 
		}

		return false;
	}

	// 获取拼音相似 推荐
	public function find_tags($tag='',$limit=10)
	{
		if (!$tag) {
			return false;
		}

		$it = $this->db->select('*')
				->like('en',pinyin($tag),'after')
				->from($this->table)
				->limit($limit)
				->get()
				->result_array();
		return $it;
	}

	/**
	 * 为 find_list 结果获取数据
	 * @param  [type] $list [description]
	 * @return [type]       [description]
	 */
	public function get_artiles($list)
	{

	}

}
