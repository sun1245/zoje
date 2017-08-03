<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class webmodels extends CRUD_Controller{

	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
				)
			),

		"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
				)
			)

		);

	public function __construct(){
		parent::__construct();
		$this->load->model('webmodels_model','mwebmodels');
		$this->load->model('adminmodels_model','madminmodels');
	}

	public function index(){
		$vdata['inforow']=$this->mwebmodels->get_one(array('mid'=>1),'id,mid,type_id');
		$vdata['mid']=isset($_GET['mid'])?$_GET['mid']:0;
		$vdata['list']=$this->madminmodels->get_all(array('mid'=>1));
		$this->_display($vdata);
	}

	protected function post_data(){
		$form=$this->input->post();
		$inforow=$this->mwebmodels->get_one(array('mid'=>$form['mid']));

		if(!empty($inforow)){
			$updateid=$this->mwebmodels->update(array('type_id'=>$form['type_id']),array('mid'=>$form['mid']));
		}else{
			$insertid=$this->mwebmodels->create($form);
		}
		redirect(site_url('webmodels/index?mid='.$form['mid']));
	}

}
