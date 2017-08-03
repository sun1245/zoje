<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminmodels extends CRUD_Controller{

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
		$this->load->model('adminmodels_model','madminmodels');
	}

	public function index($page=1){
		// TODO: 排序 config
		$limit = $this->page_limit;
		$this->input->get('limit') and is_numeric($this->input->get('limit')) AND $limit = $this->input->get('limit');

		// TODO 处理条件 order for search
		$where = $this->_index_where();
		if ($this->input->get('where')) {
		}
		$orders = $this->_index_orders();
		if ($this->input->get('order')) {
		}

		$fields = $this->_list_fields();
		$vdata['pages'] = $this->_pages(site_url($this->class.'/index'),$limit,$where);
		$vdata['list'] = $this->model->get_list($limit,$limit*($page-1),$orders,$where,$fields);
		$this->_display($vdata);
	}

	/**
	 * @brief 编辑结束后的处理
	 */
	protected function _edit_after($data){
		$mid=$data['mid'];
		if($mid==1){
			redirect(site_url('webmodels/index?mid='.$mid));
		}
	}

	/**
	 * @brief 添加结束后的处理
	 */
	protected function _create_after($data){
		$mid=$data['mid'];
		if($mid==1){
			redirect(site_url('webmodels/index?mid='.$mid));
		}
	}

}
