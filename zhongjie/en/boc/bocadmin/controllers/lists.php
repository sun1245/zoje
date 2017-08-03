<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class List extends Modules_Controller 
 * @author era
 * 清单
 */
class Lists extends Modules_Controller
{
   	protected $rules = array(
		"create" => array(
			array(
				"field" => "content",
				"label" => "内容",
				"rules" => "trim|required"
			),
		)
		,"edit" => array(
			array(
				"field" => "id",
				"label" => "标识",
				"rules" => "trim|required|numeric"
			),
			array(
				"field" => "content",
				"label" => "内容",
				"rules" => "trim|required"
			),
		)	
	); 

	protected function _create_data(){
		$form=$this->input->post();
		$form['timeline'] = time();
		$form['ccid'] = $this->ccid;
		return $form;
	}

	public function _edit_data()
	{
		$form=$this->input->post();
		$form['timeline'] = time();
		$form['ccid'] = $this->ccid;
		return $form;
	}

	protected function _search_where(){
		return false;
	}
}
