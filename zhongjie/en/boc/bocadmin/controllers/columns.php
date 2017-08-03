<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Columns extends CRUD_Controller
 * @author era
 */
class Columns extends CRUD_Controller
{
	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
			),
			array(
				'field'	  => 'identify',
				'label'   => "标识",
				"rules"   => "trim|required|alpha_dash|strtolower|callback_check_identify_path"
			),
			array(
				'field'   => 'intro',
				'lable'   => '简介',
				'rules'   => 'trim|xss_clean'
			)
		),
		"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
			),
			array(
				'field'	  => 'identify',
				'label'   => "标识",
				"rules"   => "trim|required|alpha_dash|strtolower"
			),
			array(
				'field'   => 'intro',
				'lable'   => '简介',
				'rules'   => 'trim|xss_clean'
			)
		),
		"seo" => array(
			array(
				'field'   => 'title',
				'label'   => '标题',
				'rules'   => 'trim|required'
			),
			array(
				'field'	  => 'tags',
				'label'   => "标识",
				"rules"   => "trim"
			),
			array(
				'field'   => 'intro',
				'lable'   => '简介',
				'rules'   => 'trim'
			)
		),
	);

	public function index()
	{
		$vdata['title'] = '栏目管理';
		// 使用ajax 不再使用单一数据
		$vdata['list'] = $this->model->get_tree();
		$this->_display($vdata);
	}

	// /**
	//  * 递归获得cols级别
	//  * @param  integer $fid 0
	//  * @return array   $cols
	//  */
	// protected function _get_cols($fid = 0){
	// 	$cols = $this->mcol->get_cols($fid);
	// 	foreach ($cols as $k => $v) {
	// 		if ($v['more'] > 0) {
	// 			$cols[$k]['more'] = $this->_get_cols($v['cid']);
	// 		}
	// 	}
	// 	return $cols;
	// }

	// 处理显示数据
	protected function _vdata(&$vdata)
	{

		$vdata['title'] = lang('cols_title');
		$method = $this->router->method;
		if ($method == "create" OR $method == "edit") {
			// if ($method == "edit") {
			// 	$vdata['parent_path'] = $this->model->get_path_one($vdata['it']['id']) ;
			// }
			// if ($method == "create" and $this->input->get('c')) {
			// 	$vdata['parent_path'] = $this->model->get_path_one($this->input->get('c'));
			// }
			// $vdata['cols'] = $this->model->get_cols(0);
			$top = array(array('id'=>0,'depth'=>0,'fid'=>0,'title'=>"顶级目录"));
			$vdata['cols_select'] = $this->model->get_tree();
			$vdata['cols_select'] = array_merge($top,$this->model->get_cols_select(0));
		}
		// model
		$vdata['modules'] = $this->model->get_modules();
	}

	protected function _create_data()
	{
		$form=$this->input->post();
			// 获得 parent_id 的 depth
		if ($form['parent_id']) {
			$form['depth'] = $this->model->get_depth($form['parent_id']) + 1;
		}else{
			$form['depth'] = 0;
		}

		$path =  $this->model->get_path_one($form['parent_id']);
		$form['path'] = '';
		foreach ($path as $k => $v) {
			$form['path'] .= $v['identify'];
			if ($k != count($path) -1) {
				$form['path']  .= '/';
			}
		}
		$form['path'] .= '/'.$form['identify'];

		return $form;
	}

	/**
	 * @brief 处理创建信息
	 */
	protected function _create(){
		$data = $this->_create_data();


		if($insert_id = $this->model->create($data)){
			$vdata['msg'] = lang('cols_create_true');
			$vdata['status'] = 1;
			$vdata['id'] = $insert_id;

			$this->load->model('modules_model','modules');
			$mdu = $this->modules->get_one($data['mid']);
			$this->load->model('manager_purview_model','purview');
			// 更新权限
			$data1 = array(
				'model'		=> 	$mdu['controller']
				,'method'	=>	'index'
				,'cid'		=>	$insert_id
				,'uri'		=> 	md5($mdu['controller'].'/'.'index'.'/'.$insert_id)
				,'title'	=> 	lang('readview')
				,'status'	=>	0
				);
			$data2 = array(
				'model'		=> 	$mdu['controller']
				,'method'	=>	'create'
				,'cid'		=>	$insert_id
				,'uri'		=> 	md5($mdu['controller'].'/'.'create'.'/'.$insert_id)
				,'title'	=>  lang('create')
				,'status'	=>	1
				);
			$data3 = array(
				'model'		=> 	$mdu['controller']
				,'method'	=>	'edit'
				,'cid'		=>	$insert_id
				,'uri'		=> 	md5($mdu['controller'].'/'.'edit'.'/'.$insert_id)
				,'title'	=> 	lang('edit')
				,'status'	=>	1
				);
			$data4 = array(
				'model'		=> 	$mdu['controller']
				,'method'	=>	'delete'
				,'cid'		=>	$insert_id
				,'uri'		=> 	md5($mdu['controller'].'/'.'delete'.'/'.$insert_id)
				,'title'	=> 	lang('del')
				,'status'	=>	1
				);
			$data5 = array(
				'model'		=> 	$mdu['controller']
				,'method'	=>	'audit'
				,'cid'		=>	$insert_id
				,'uri'		=> 	md5($mdu['controller'].'/'.'audit'.'/'.$insert_id)
				,'title'	=> 	lang('audit')
				,'status'	=>	1
				);
			$this->purview->create($data1);
			$this->purview->create($data2);
			$this->purview->create($data3);
			$this->purview->create($data4);
			$this->purview->create($data5);

			$this->load->view('msg',$vdata);
		}else{
			$vdata['msg'] = lang('cols_create_false');
			$vdata['status'] = 0;
		}

		if ($this->input->is_ajax_request()) {
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}

	}


	protected function _edit_data()
	{
		if ($this->input->post()) {
			//TODO: 更新权限
		}

		$form=$this->input->post();
		if ($form['parent_id']) {
			$form['depth'] = $this->model->get_depth($form['parent_id']) + 1;
		}else{
			$form['depth'] = 0;
		}

		$path =  $this->model->get_path_one($form['parent_id']);
		$form['path'] = '';
		foreach ($path as $k => $v) {
			$form['path'] .= $v['identify'];
			if ($k != count($path) -1) {
				$form['path']  .= '/';
			}
		}
		$form['path'] .= '/'.$form['identify'];

		return $form;
	}

	// TODO : Add Default Delete perview to group

	/**
	 * @brief 异步方式获得栏目
	 * @param $id
	 * @return
	 */
	public function getcols_ajax($fid=FALSE){

		if ($fid === FALSE or !is_numeric($fid)) {
			$vdata['status'] = 0;
			$vdata['msg'] = '提交数据格式不正确或非法数据!';
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$cols = $this->model->get_cols($fid);
			$this->output->set_content_type('application/json')->set_output(json_encode($cols));
		}
	}

	/**
	 * 更新栏目权限
	 */
	public function update_pur(){
		$this->load->model('manager_purview_model','purview');
		// 删除旧的数据

		// 追加
		$tmp = $this->model->get_all(false,'*',false,'modules');
		$modules = array();
		foreach ($tmp as $k => $v) {
			$modules[$v['id']] = $v['controller'];
		}
		$list = $this->model->get_all();

		foreach ($list as $k => $v) {
			$m = $modules[$v['mid']];
			$i = $v['id'];
			$data1 = array(
				'model'		=> 	$m
				,'method'	=>	'index'
				,'cid'		=>	$i
				,'uri'		=> 	md5($m.'/'.'index'.'/'.$i)
				,'title'	=> 	'查看'
				,'status'	=>	0
				);
			$data2 = array(
				'model'		=> 	$m
				,'method'	=>	'create'
				,'cid'		=>	$i
				,'uri'		=> 	md5($m.'/'.'create'.'/'.$i)
				,'title'	=> 	'创建'
				,'status'	=>	1
				);
			$data3 = array(
				'model'		=> 	$m
				,'method'	=>	'edit'
				,'cid'		=>	$i
				,'uri'		=> 	md5($m.'/'.'edit'.'/'.$i)
				,'title'	=> 	'编辑'
				,'status'	=>	1
				);
			$data4 = array(
				'model'		=> 	$m
				,'method'	=>	'delete'
				,'cid'		=>	$i
				,'uri'		=> 	md5($m.'/'.'delete'.'/'.$i)
				,'title'	=> 	'删除'
				,'status'	=>	1
				);
			$data5 = array(
				'model'		=> 	$m
				,'method'	=>	'audit'
				,'cid'		=>	$i
				,'uri'		=> 	md5($m.'/'.'audit'.'/'.$i)
				,'title'	=> 	'审核'
				,'status'	=>	1
				);
			$this->purview->create($data1);
			$this->purview->create($data2);
			$this->purview->create($data3);
			$this->purview->create($data4);
			$this->purview->create($data5);
		}
	}

	/**
	 * 获得路径
	 */
	public function getpath_ajax($id){
		$path = $this->model->get_path_one($id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($path));
	}

	// 检测同级别栏目中，是否有相同的标识
	public function check_identify_path($identify){
		$fid = $this->input->post('parent_id', TRUE);
		$ides = $this->model->get_cols($fid);
		$have = FALSE;
		foreach ($ides as $k => $v) {
			if ($v['cidentify'] == $identify) {
				$have = TRUE;
			}
		}
		if (!$have) {
			return TRUE;
		}else{
			$this->form_validation->set_message('check_identify_path', lang('cols_check_identify_path'));
			return FALSE;
		}
	}

	// ajax 设置SEO
	public function set_seo_ajax($cid = FALSE){
		if ($this->input->is_ajax_request()) {
			$data=$this->input->post();
			if($this->model->update($data,'id = '.$data['id'])){
				$vdata['msg'] = lang('columns_msg_ok');
				$vdata['status'] = 1;
			}else{
				$vdata['msg'] = lang('cols_msg_nochange');
				$vdata['status'] = 0;
			}
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($vdata));
		}
	}

	/**
	 * get list of columns ID
	 * @param  integer $root 路径ID
	 * @return array list
	 */
	public function get_rander($root = 0){

	}

	// 获取栏目分类
	public function get_r_types()
	{
		return array();
	}

	//
	public function get_r_cols(){
		return array();
	}


}

// 树形数组结构输入
// 栏目列表组织
function tree_cols($list=false){
	if (!$list) {
		return "";
	}

	// list fn  fn_o
	return ui_tree_col($list);;
}
