<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Modules_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->rules = array(
			"rule" => array(
				array(
					"field" => "title",
					"label" => lang('title'),
					"rules" => "trim|required|min_length[1]"
					)
				,array(
					"field" => "timeline",
					"label" => lang('time'),
					"rules" => "trim|strtotime"
					)
				,array(
					"field" => "content",
					"label" => '内容',
					"rules" => "trim"
					// link_create tag 生成
					)
				,array(
					"field" => "photo",
					"label" => lang('photo'),
					"rules" => "trim"
					)
				)
			);

	}
	public function copypro()
	{
		$ids = $this->input->post('ids');

		$rs=$this->model->get_one($ids);

		unset($rs['id']);
		unset($rs['sort_id']);
		unset($rs['timeline']);

		$id = $this->model->create($rs);
		if ($id) {
			$vdata['msg'] = '复制成功，请刷新查看';
			$vdata['status'] = 1;
		}else{
			$vdata['msg'] = '复制失败，请刷新后重试';
			$vdata['status'] = 0;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}





    // 删除条目时删除文件
	protected function _rm_file($ids)
	{
		$fids = array() ;
		if (is_numeric($ids)) {
			$tmp = $this->model->get_one($ids,'photo');
			$fids = explode(',',$tmp['photo']);
		}else if(is_array($ids)){
            // 使用 字符串where时
			$tmp = $this->model->get_all("`id` in (".implode(',', $ids).")",'photo');
			foreach ($tmp as $key => $v) {
				$fids = array_merge($fids, explode(',',$v['photo']));
			}
		}
        // adminer funs helpers
		unlink_upload($fids);
	}


}
