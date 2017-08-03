<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class onlineservice extends CRUD_Controller{

	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'link',
				'label'   => '链接',
				'rules'   => 'trim'
				)
			),
		"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'link',
				'label'   => '链接',
				'rules'   => 'trim'
				)
			),
		"show" => array(
			array(
				'field'   => 'id',
				'label'   => '标识',
				'rules'   => 'trim|required|numeric'
				),
			array(
				'field'   => 'show',
				'label'   => '状态',
				'rules'   => 'trim|required|numeric'
				)
			)
		);

	protected function _create_data(){
		$form=$this->input->post();
		$form['timeline'] = time();
		return $form;
	}

	protected function open_lock(){
		$this->load->model('configs_model','mconf');

		$conf = $this->mconf->get_one(array('key'=>'qq'));
		if($conf['value']==1){
			$this->mconf->update(array('value'=>0),array('key'=>'qq'));
		}else{
			$this->mconf->update(array('value'=>1),array('key'=>'qq'));
		}
		// print_r($conf);
		redirect(site_url('onlineservice/index'));

	}

	protected function change_model(){
		$this->load->model('configs_model','mconf');

		$conf = $this->mconf->get_one(array('key'=>'mqq'));
		$mqq=$_GET['value'];
		$this->mconf->update(array('value'=>$mqq),array('key'=>'mqq'));
		redirect(site_url('onlineservice/index'));

	}


}
