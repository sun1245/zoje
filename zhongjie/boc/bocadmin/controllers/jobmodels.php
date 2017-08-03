<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jobmodels extends CRUD_Controller{

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
		$this->load->model('jobmodels_model','mjobmodels');
		$this->load->model('adminmodels_model','madminmodels');
	}

	public function index(){
		$vdata['inforow']=$this->mjobmodels->get_one(array('mid'=>2),'id,mid,type_id');
		$vdata['mid']=isset($_GET['mid'])?$_GET['mid']:0;
		$vdata['list']=$this->madminmodels->get_all(array('mid'=>2));
		$this->_display($vdata);
	}

	protected function post_data(){
		$form=$this->input->post();
		$inforow=$this->mjobmodels->get_one(array('mid'=>$form['mid']));

		if(!empty($inforow)){
			$updateid=$this->mjobmodels->update(array('type_id'=>$form['type_id']),array('mid'=>$form['mid']));
		}else{
			$insertid=$this->mjobmodels->create($form);
		}
		redirect(site_url('jobmodels/index?mid='.$form['mid']));
	}

}
