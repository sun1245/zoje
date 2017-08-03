<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CRUD_Controller {

	protected $rules = array(
		"rule" => array(
			array(
				'field'   => 'title', 
				'label'   => '标题', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'controller', 
				'label'   => '控制器', 
				'rules'   => 'trim|required|alpha_numeric|strtolower|callback_checkfile'
			)
		),
	);
	
	// 为模板提供默认标题
	protected function _vdata(&$vdata)
	{
		$vdata['title']='模型';
	}

	protected function _index_orders(){
		return array('sort_id'=>'desc');
	}

	// 检测问模型文件存在与否
	function checkfile($filename = false)
	{
		if ($filename AND file_exists(APPPATH.'controllers/'.$filename.'.php')) {
			return TRUE;
		}else{
			$this->form_validation->set_message('checkfile', '没有发现模型文件,请检查！'.APPPATH.'controllers/'.$filename.'.php');
			return FALSE;
		}
	}

}
