<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coltypes extends CRUD_Controller {

	protected $rules = array(
		"rule" => array(
			array(
				'field'   => 'fid',
				'label'   => '父级别ID',
				'rules'   => 'trim|required|numeric'
			),
			array(
				'field'   => 'cid',
				'label'   => '所属栏目',
				'rules'   => 'trim|required|numeric'
			),
			array(
				'field'   => 'name',
				'label'   => '类别',
				'rules'   => 'trim|required|strtolower'
			),
			array(
				'field'   => 'title',
				'label'   => '类别名称',
				'rules'   => 'trim|required|callback_check_title_path'
			),
			array(
				'field'   => 'photo',
				'label'   => '封面',
				'rules'   => 'trim'
			),
		)
	);

	public function __construct()
	{
		parent::__construct();

		if (!$this->input->is_ajax_request()) {
		$this->load->helper('valid');

		$status = 1;

		if (isset($_GET['c']) and is_numeric(trim($cid = $this->input->get('c',true)))) {
			$this->cid = trim($cid);
		}else{
			if (isset($_GET['cid']) and is_numeric(trim($cid = $this->input->get('cid',true)))) {
				$this->cid = trim($cid);
			}else{
				$this->url_col = site_url();
				$status = 0;
			}
		}

		// 分类名
		if ($field = $this->input->get('field',true) and is_name(trim($field),'EN')) {
			$this->name = trim($field);
		}else{
			$status = 0 ;
		}

		// 返回控制器
		if ($rc = $this->input->get('rc',true) and is_name(trim($rc),'EN')) {
			$tmp_url= site_url($rc.'/index');
			if ($this->cid) {
				$tmp_url .='/'.$this->cid;
			}
			$this->url_col = $tmp_url;
			$this->rc = $rc;
		}else{
			$this->url_col = site_url('welcome');
			$status = 0 ;
		}

		$this->status = $status;
		if ($this->status === 0) {
			$_GET['back_url'] = $this->url_col;
			$vdata['status'] = 0;
			$vdata['msg'] = '无效页面!';
			$this->view = "msg.php";
			$this->_display($vdata,"msg.php");
		}

		} // end is ajax

	}

	public function index($page=1){

		$where = $this->_index_where();

		$where['cid'] = $this->cid;
		$where['name'] = $this->name;
		$vdata['cid'] = $this->cid;
		$vdata['name'] = $this->name;

		$vdata['title'] = "分类管理";
		$vdata['list'] = $this->model->get_tree($this->cid,0,$this->name);

		if ($this->input->is_ajax_request()) {
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->_display($vdata);
		}

	}

	protected function _index_orders(){
		return array('sort_id'=>'desc');
	}

	protected function _vdata(&$vdata)
	{
		$vdata['size'] = "";
		if ($this->input->get('size')) {
			$vdata['size'] = $this->input->get('size');
		}
		// $_GET['back_url'] = site_url();
	}

	protected function _create_data(){
		$form=$this->input->post();
		if (!isset($form['depth'])) {
			if (intval($form['fid'])>0) {
				$depth = $this->model->get_one(array('id'=>$form['fid']),'depth');
				//var_dump($depth);
				$form['depth'] = intval($depth['depth']) +1;
			}else{
				$form['depth'] = 0;
			}
		}
		return $form;
	}

	protected function _edit_data(){
		$form=$this->input->post();
		if (!isset($form['depth'])) {
			if (intval($form['fid'])>0) {
				$depth = $this->model->get_one(array('id'=>$form['fid']),'depth');
				$form['depth'] = intval($depth['depth']) +1;
			}else{
				$form['depth'] = 0;
			}
		}
		return $form;
	}
	// TODO: 追加分类的时候自动在对应的模型数据表在添加分类字段 type-name int4
	// create_data

	/**
	 * 获取分类
	 * GET 获取
	 * cid int 栏目ID
	 * fid int 父级别ID
	 * name 预留 字段名称
	 * @return [type]         [description]
	 */
	public function gettypes_ajax($cid=false,$fid=0,$name='ctype')
	{

		$vdata = array(
			'status' => 0
			,'msg' => ""
		);

		if ($cid === false or !is_numeric($cid) or !is_numeric($fid) or $name or is_name($name)) {
			$vdata['status'] = 0;
			$vdata['msg'] = '提交数据格式不正确或非法数据';
		}

		// 获取数据

		// $data = $this->model->get_all(array('cid'=>$cid,'fid'=>$fid,'name'=>$name));
		$data = $this->model->get_ctypes($cid,$fid,$name);

		if ($data) {
			$vdata['status'] = 1;
			$vdata['msg'] = '成功获取数据';
			$vdata['list'] = $data;
		}else{
			$vdata['msg'] = '暂时任何数据！';
		}

		// if ($this->input->is_ajax_request()) {
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		// }

	}

	// 通过ajax　获取全部路径
	public function get_ctypes_path_ajax($cid=false,$fid=0,$name='ctype')
	{
		$data = false;
		if ($cid AND is_numeric($cid)) {
			$data = $this->model->get_tree($cid,$fid,$name);
		}

		if ($data) {
			$vdata['status'] = 1;
			$vdata['msg'] = 'get list';
			$vdata['list'] = $data;
		}else{
			$vdata['status'] = 0;
			$vdata['msg'] = '没有数据';
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));

	}

	// 检测同级别栏目中，是否有相同的标识
	public function check_title_path($title){
		$fid = $this->input->post('fid', TRUE);
		$cid = $this->input->post('cid', TRUE);
		$have = $this->model->get_one(array('fid'=>$fid,'cid'=>$cid,'title'=>$title));

		if ($have and $this->router->method == "edit" AND $have['id'] == $this->input->post('id', TRUE)) {
			$have = false;
		}

		if (!$have) {
			return TRUE;
		}else{
			$this->form_validation->set_message('check_title_path', '发现该类型下已经有同名的标识！');
			return FALSE;
		}
	}


}

// 用于替换 site_urlc 为其添加 ?c=
function site_urlc($uri = '')
{
	$CI =& get_instance();
	$size = "";
	if ($CI->input->get('size')) {
		$size = "&size=".$_GET['size'];
	}
	return $CI->config->site_url($uri."?cid=".$CI->cid.'&field='.$CI->name.'&rc='.$CI->rc);
}

// 用于替换 current_url
function current_urlc()
{
	$CI =& get_instance();
	$size = "";
	if ($CI->input->get('size')) {
		$size = "&size=".$_GET['size'];
	}
	return $CI->config->site_url($CI->uri->uri_string()."?cid=".$CI->cid.'&field='.$CI->name.'&rc='.$CI->rc);
}

// 用户组织化分类列表
function tree_ctype($list=false){
	if (!$list) {
		return "";
	}

	// list fn  fn_o
	return ui_tree_coltypes($list);;
}
