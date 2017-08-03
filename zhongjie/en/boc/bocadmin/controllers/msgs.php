<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msgs extends CRUD_Controller {

	protected $rules = array(
		"rule" => array(
			array(
				'field'   => 'title', 
				'label'   => '标题', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'msg', 
				'label'   => '消息内容', 
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'type', 
				'label'   => '级别', 
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'toer', 
				'label'   => '收件人', 
				'rules'   => 'trim|required|numeric'
			),
		)
	);

	protected function _vdata(&$vdata){
		if ( $this->method =='create') {
			$this->load->model('manager_model','mmger');
			$vdata['users'] = $this->mmger->get_users();
		}
	}

	// TODO: index 收件发件

	protected function _index_where(){
		return array(
			'toer' => $this->session->userdata('mid'),
			// 'byer' => $this->session->userdata('mid'),
		);
	}

	protected function _create_data(){
		$form=$this->input->post();
		$form['byer'] = $this->session->userdata('mid');
		$form['timeline'] = time();
		return $form;
	}
	
}

/* End of file msgs.php */
/* Location: .//home/http/bocms/adminer/controllers/msgs.php */