<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manager_purview extends CRUD_Controller {

	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '权限名称',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'model',
				'label'   => '模型',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field'   => 'method',
				'label'   => '方法',
				'rules'   => 'trim|required|strtolower|callback_checkuri'
			),
			array(
				'field' => 'cid',
				'lable' => '栏目',
				'rules' => 'trim|numeric'
			),
			array(
				'field'   => 'status',
				'label'   => '状态',
				'rules'   => 'trim|numeric'
			),
		)
		,"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '权限名称',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'model',
				'label'   => '模型',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field'   => 'method',
				'label'   => '方法',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field' => 'cid',
				'lable' => '栏目',
				'rules' => 'trim|numeric'
			),
			array(
				'field'   => 'status',
				'label'   => '状态',
				'rules'   => 'trim|numeric'
			),
		)
		,"status" => array(
			array(
				'field'   => 'pid',
				'label'   => '权限名称',
				'rules'   => 'trim|required|numeric'
			),
			array(
				'field'   => 'model',
				'label'   => '模型',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field'   => 'method',
				'label'   => '方法',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field' => 'cid',
				'lable' => '栏目',
				'rules' => 'trim|numeric'
			),
			array(
				'field'   => 'status',
				'label'   => '状态',
				'rules'   => 'trim|numeric'
			),
		)
	);

	protected function _hook()
	{
		// 内部验证帐号权限
		if ($this->session->userdata('gid')!=1) {
			$vdata = array('status'=>0,'msg'=>'您并没有权限访问此页面！','url'=>site_url('welcome/index'));
			$str =$this->load->view('msg',$vdata,TRUE);
			echo($str);exit();
		}
	}

	/**
	 * 权限页面
	 */
	public function index()
	{
		$vdata['title'] = "权限管理";
		// 非栏目权限
		$vdata['pur']  = $this->model->get_perview_lv1();

		$vdata['cols'] = $this->_get_cols();
		$this->_display( $vdata,$this->view);
	}

	/**
	 * 递归获得cols级别
	 * @param  integer $fid 0
	 * @return array   $cols
	 */
	protected function _get_cols($fid = 0){
		$cols = $this->mcol->get_cols($fid);
		foreach ($cols as $k => $v) {
			$cols[$k]['purview'] = $this->model->get_perview_list_cid($v['cid']);

			if ($v['more'] > 0) {
				$cols[$k]['more'] = $this->_get_cols($v['cid']);
			}
		}
		return $cols;
	}

	protected function _vdata(&$vdata)
	{
		$vdata['title'] = "权限";
		if ($this->method == "create" OR $this->method == "edit") {
			// 栏目选择
			// $cid=false;
			// if ($this->method == "create") {
			// 	$cid = set_value('cid');
			// }
			// if ($this->method == "edit") {
			// 	$cid = set_value('cid',$vdata['it']['cid']);
			// }
			// if ($cid) {
			// 	$vdata['parent_path'] = $this->mcol->get_path_one($cid) ;
			// }else{
			// 	$vdata['parent_path'] = false;
			// }
			//
			// $vdata['cols'] = $this->mcol->get_cols(0);
			$cols_top = array(array("id"=>"","title"=>"功能权限"));
			$cols_select = $this->mcol->get_cols_select(0);

			$vdata['cols_select'] = array_merge($cols_top, $cols_select);
		}
	}

	// 对创建信息进行数据处理
	protected function _create_data(){
		$form=$this->input->post();
		if (!$this->input->post('cid')) {
			$form['uri'] = md5($form['model'].'/'.$form['method']);
		}else{
			$form['uri'] = md5($form['model'].'/'.$form['method'].'/'.$form['cid']);
		}
		return $form;
	}

	// 对更新信息进行数据处理
	protected function _edit_data(){
		$form=$this->input->post();
		if (!$this->input->post('cid')) {
			$form['uri'] = md5($form['model'].'/'.$form['method']);
		}else{
			$form['uri'] = md5($form['model'].'/'.$form['method'].'/'.$form['cid']);
		}
		return $form;
	}

 	// 获取状态
	public function status_ajax($pid = false)
	{
		// is_ajax()
		if ($this->input->is_ajax_request()) {
			$re = array("status"=>0,'msg'=>"非法请求!");

			$_POST['pid'] = "1";
			$_POST['status'] = "2";

			$this->form_validation->set_rules($this->rules['status']);

			if ($this->form_validation->run() == false) {

				$data = array(
					'status' => 0,
					'msg' => validation_errors()
				);
				echo json_encode($data);

			}else{
				$pid = $this->form_validation->set_value('pid');
				$status = $this->form_validation->set_value('status');
				//  数据处理
				$re = array('status' => 1,"msg" => "成功获得数据".$pid.'-'.$status );
				echo json_encode($re);
			}
		}else{
			show_404();
		}
	}

	// 验证： 检查 uri
	public function checkuri($method){
		$model = $this->input->post('model', TRUE);
		$cid = $this->input->post('cid', TRUE);
		$uri = "";
		if (!$cid) {
			$uri = md5($model.'/'.$method);
		}else{
			$uri = md5($model.'/'.$method.'/'.$cid);
		}

		$row = $this->model->get_one(array('uri'=>$uri), 'id');

		if (!$row) {
			return TRUE;
		}else{
			$this->form_validation->set_message('checkuri', '发现该目录下已经有同名的标识！');
			return FALSE;
		}
	}

	//  状态修改
	public function cg_status_ajax(){
		if ($this->input->is_ajax_request()) {
			$ids = explode(',',$this->input->post('ids'));
			$vdata = array('status'=>0,'msg'=>"未完成修改");
			if ($this->model->cg_status($ids,$this->input->post('status'))) {
				$vdata = array('status'=>1,'msg'=>"已经成功修改");
				$this->mlogs->add('update','修改数据id:'. $this->input->post('ids').'的状态为'.$this->input->post('status'));
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			show_404();
		}
	}

}

/* End of file manager_purview.php */
/* Location: ./application/controllers/manager_purview.php */
