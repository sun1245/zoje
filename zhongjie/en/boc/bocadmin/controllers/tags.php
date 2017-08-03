<?php

/**
 * 	tags
 */
class Tags extends CRUD_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->library('phpanalysis', array('utf-8', 'utf-8', false), 'pa');
	}

	// 查询关键词的相关链接
	public function find($page=1)
	{
		$limit = 10;

		$vdata = array(
			'status' => 0
			,'msg' => '未输入关键词！'
			);

		if ($str = $this->input->get('w')) {
			// 元个数大于5
			if (mstrlen($str) > 5 ) {
				$str = get_str_tags(html2txt($str));
			}
			if ($data = $this->model->find_list($str,$limit,$limit*($page-1))) {
				$vdata = $data;
				$vdata['status'] = 1;
				$vdata['msg'] = "获取数据共".$vdata['count']."条";
				//分页
				$this->load->library('pagination');
				$this->pagination->initialize(page_config($limit,$vdata['count'],site_url('tags/find/')));
				$vdata['pages'] = $this->pagination->create_links();
			}
		};

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	function test_link($tid)
	{
		var_dump($this->model->find_link($tid));
	}

	// 查询相关的关键词
	// 拼音贴近
	public function find_tags($tag='')
	{
		$vdata = array(
			'status' => 0
			,'msg' => '未输入关键词！'
			);
		if ($tag = $this->input->get('w')) {
			$data = $this->model->find_tags($tag);
			if ($vdata) {
				$vdata['status'] = 1;
				$vdata['list'] = $data;
				$msg['msg'] = 'ok';
			}else{
				$msg['msg'] = "没有找到相关！";
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	// 字典生成
	function dict_create(){

	}

	function dict_export(){

	}
}

