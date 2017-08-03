<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class irregular extends Modules_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->rules = array(
			"rule" => array(
				array(
					"field" => "title",
					"label" => lang('title'),
					"rules" => "trim"
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

	/**
	 * @brief 为默认创建处理表单信息的默认接口
	 * @return 表单
	 */
	protected function _create_data(){
		$form=$this->input->post();
		$form['timeline']=time();
		return $form;
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
