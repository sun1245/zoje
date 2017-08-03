<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Class CRUD_Controller  extends Base_Controller
 * CRUD基础类
 * @author era
 */
class CRUD_Controller extends Base_Controller
{

	/**
	 * 析构 , 处理默认值
	 */
	public function __construct(){
		parent::__construct();

		if ($this->model === null) {
			// 不存在时装载一个默认的 MY_Model 给 model
			// 该方法存在风险，建议建立默认的空模型
			// include_once CI_PATH.'core/Model.php';
			// include_once APPPATH.'core/MY_Model.php';
			$this->model = new MY_Model();
		}

		// TODO: 面包屑？
		$this->breadcrumb = array(
			array(
				'href'=>site_url('welcome/index'),
				'title'=>'后台管理'
			),
		);

	}

	/**
	 * @brief 默认列表页 分页
	 * @param $page 分页page值
	 */
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

	// 对index提供where条件
	protected function _index_where(){
		return array();
	}

	// 此处返回数组
	protected function _index_orders(){
		return array('id'=>'desc');
	}

	protected function _list_fields(){
		return '*';
	}

	# CRUD
	/**
	 * @brief 默认创建页面
	 */
	public function create(){
		$this->form_validation->set_rules($this->_get_rule('create'));
		if ($this->form_validation->run() == false) {
			if ($this->input->is_ajax_request() AND is_post()) {
				$vdata['status'] = 0;
				$vdata['msg'] = validation_errors();
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			}else{
				$this->_display();
			}
		}else{
			$this->_create();
		}
	}

	/**
	 * @brief 处理创建信息
	 */
	protected function _create(){
		$data = $this->_create_data();
		if($insert_id = $this->model->create($data)){
			$data['id'] = $insert_id;
			$this->_create_after($data);
			$vdata['msg'] = '成功添加了一条内容';
			$vdata['status'] = 1;
			$vdata['id'] = $insert_id;
			$this->mlogs->add('create','添加数据id:'.$insert_id);
		}else{
			$vdata['msg'] = '没有添加成功!';
			$vdata['status'] = 0;
		}
		if ($this->input->is_ajax_request()) {
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			if ($this->input->get('back_url')) {
				$vdata['back_url'] = $this->input->get('back_url');
			}
			$this->load->view('msg',$vdata);
		}
	}

	/**
	 * @brief 为默认创建处理表单信息的默认接口
	 * @return 表单
	 */
	protected function _create_data(){
		$form=$this->input->post();
		return $form;
	}

	/**
	 * @brief 添加结束后的处理
	 */
	protected function _create_after($data){}

	/**
	 * @brief 默认编辑页面
	 */
	protected function edit($key=false){
		if (!$key) {
			$key = $this->input->get_post('id',TRUE);
			if ($this->input->is_ajax_request()){
				if (!$key) {
					$vdata = array('msg'=>'没有提供标识','status'=>0);
					$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
				}
			}else{
				if (!$key) {
					if (isset($this->cid)) {
						$index = '/index/'.$this->cid;
					}else{
						$index = '/index';
					}
					redirect(site_url($this->class.$index));
				}
			}
		}
		$this->form_validation->set_rules($this->_get_rule('edit'));
		if ($this->form_validation->run() == false) {
			$vdata['it'] = $this->model->get_one($key);

			if (!$vdata['it']) {
				$vdata = array('msg'=>'提供的标示是不存在的','status'=>0);
				if ($this->input->is_ajax_request()) {
					$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
				}else{
					$this->load->view('msg',$vdata);
					return false;
				}
			}

			if ($this->input->is_ajax_request()) {
				if (is_post()) {
					$vdata['status'] = 0;
					$vdata['msg'] = validation_errors();
				}
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			}else{
				$this->_display($vdata);
			}
		}else{
			$this->_edit();
		}
	}

	/**
	 * @brief 处理编辑信息
	 */
	protected function _edit(){
		$data = $this->_edit_data();
		$vdata['id'] = $data['id'];
		if($this->model->update($data,'id = '.$data['id'])){
			$this->_edit_after($data);
			$vdata['msg'] = '已经成功修改了信息！';
			$vdata['status'] = 1;
			$this->mlogs->add('update','更新数据id:'. $data['id']);
		}else{
			$vdata['msg'] = '没有做任何的改动';
			$vdata['status'] = 0;
		}
		if ($this->input->is_ajax_request()) {
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}
	}

	/**
	 * @brief 为默认编辑处理表单信息的默认接口
	 * @return 表单数据
	 */
	protected function _edit_data(){
		$form=$this->input->post();
		// $form=$this->input->post(NULL,TRUE); // 获得全部并 xss_clean
		return $form;
	}


	/**
	 * @brief 编辑结束后的处理
	 */
	protected function _edit_after($data){
	}



	/**
	 * @brief 删除
	 * @param $key 键值 默认id
	 * @return
	 */
	public function delete($key = FALSE){

		if (!$key AND $this->input->get('ids') ) {
			$key = explode(',',$this->input->get('ids'));
		}else{
			$vdata = array('status'=>0,'msg'=>"ID不存在");
		}

		if (!isset($vdata['status'])) {
			$this->_rm_file($key);
			if ($this->model->del($key)) {
				$vdata = array('status'=>1,'msg'=>"成功的删除数据！");
				if (is_array($key)) {
					$this->mlogs->add('delete','删除数据id:'.$this->input->get('ids'));
				}else{
					$this->mlogs->add('delete','删除数据id:'.$key);
				}
			}else{
				$vdata = array('status'=>0,'msg'=>"出错了，检查下选择的是否正确");
			}
		}

		if(is_ajax()){
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}
	}

	// 删除文件 ,留给需要处理删除的模型
	protected function _rm_file($ids)
	{
		// 此处留空
		// is_numeric is_array ??? 判定
	}

	/**
	 * @brief 获得已经拥有的 rules
	 * @param $rule 规则键值
	 * @return  对应的规则 或空
	 */
	protected function _get_rule($rule)
	{
		$keys = array_keys($this->rules);
		if (!$keys) {
			return array();
		}
		if (in_array($rule,$keys)) {
			$rule = $this->rules[$rule];
		}else if(in_array('rule',$keys)){
			$rule = $this->rules['rule'];
		}else{
			$rule = array();
		}
		return $rule;
	}

	/**
	 * 排序
	 * @return json
	 */
	public function sortid()
	{
		$ids = explode(',', $this->input->get('ids'));
		$sortids = explode(',', $this->input->get('sort'));

		$vdata = array('status'=>0,'msg'=>'数据非法');

		foreach ($ids as $i => $id) {
			if (!is_numeric($id)) {
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			}else{
				$ids[$i] = intval($id);
			}
		}

		foreach ($sortids as $i => $sortid) {
			if (!is_numeric($sortid)) {
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			}else{
				$sortids[$i] = intval($sortid);
			}
		}

		//desc
		if ($sortby = $this->input->get('sortby') AND $sortby == "asc") {
			sort($sortids);
		}else{
			logfile('sort id');
			rsort($sortids);
		}

		$data = array();
		foreach ($sortids as $i => $sortid) {
			array_push($data, array('id'=>$ids[$i],'sort_id'=>$sortid));
			// $this->model->update(array('sort_id'=>$sortids[$i]) ,array('id'=>$id));
		}

		if ($this->model->update($data,'id',TRUE) ) {
			$this->mlogs->add('sort','对数据排序:ID: ['.implode(',', $ids).']顺序改为['.implode(',', $sortids).']');
			$vdata = array('status'=>1,'msg'=>'已经完成排序');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	public function sort_change()
	{
		$id = $this->input->get('id');
		$sortid = $this->input->get('sortid');

		$vdata = array(
			'status'=>0,
			'msg'=>"非法数据"
			);

		if ($id and $sortid and is_numeric($id) and is_numeric($sortid)) {
			if($this->model->update(array('sort_id'=>$sortid),'id = '.$id)){
				$vdata['status'] = 1;
				$vdata['msg'] = "成功修改！";
			}else{
				$vdata['msg'] = '没有变动！';
			}
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	/**
	 * 显示隐藏
	 * @return json
	 */
	public function show_ajax($key = FALSE){
		if (!$key AND $this->input->post('ids') ) {
			$key = explode(',',$this->input->post('ids'));
		}else{
			$vdata = array('status'=>0,'msg'=>lang('modules_no_id'));
		}

		$where = FALSE;

		$show = $this->input->post('show');

		if ($show) {
			$show=1;
		}else{
			$show=0;
		}

		$msg = array(lang('modules_show_false'),lang('modules_show_true'));

		if (!isset($vdata['status'])) {
			if ($where) {
				$res = $this->model->status_show($show,$key,$where);
			}else{
				$res = $this->model->status_show($show,$key);
			}

			if ($res) {
				$vdata = array('status'=>1,'msg'=>$msg[$show]);
				if (is_array($key)) {
					$this->mlogs->add('show',lang('modules_show_id').$this->input->post('ids').lang('modules_show_for').$show);
				}else{
					$this->mlogs->add('show',lang('modules_show_id').$key.lang('modules_show_for').$show);
				}
			}else{
				$vdata = array('status'=>0,'msg'=>lang('modules_show_err_select'));
			}
		}

		if($this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}
	}


	// 审核 POST (对于开关类型字段，拷贝审核修改相应的audit字段即可使用)
	public function audit($key = FALSE){
		if (!$key AND $this->input->post('ids') ) {
			$key = explode(',',$this->input->post('ids'));
		}else{
			$vdata = array('status'=>0,'msg'=>lang('modules_no_id'));
		}

		$where = FALSE;

		$audit = $this->input->post('audit');

		if ($audit) {
			$audit=1;
		}else{
			$audit=0;
		}
		$msg = array(lang('modules_audit_false'),lang('modules_audit_true'));

		if (!isset($vdata['status'])) {
			if ($where) {
				$res = $this->model->audit($audit,$key,$where);
			}else{
				$res = $this->model->audit($audit,$key);
			}

			if ($res) {
				$vdata = array('status'=>1,'msg'=>$msg[$audit]);
				if (is_array($key)) {
					$this->mlogs->add('audit',lang('modules_audit_id').$this->input->post('ids').lang('modules_audit_for').$audit);
				}else{
					$this->mlogs->add('audit',lang('modules_audit_id').$key.lang('modules_audit_for').$audit);
				}
			}else{
				$vdata = array('status'=>0,'msg'=>lang('modules_audit_err_select'));
			}
		}

		if($this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}
	}

	// TODO:功能
	// 推荐 flag
	public function flag($key = FALSE){
		if (!$key AND $this->input->post('ids') ) {
			$key = explode(',',$this->input->post('ids'));
		}else{
			$vdata = array('status'=>0,'msg'=>lang('modules_no_id'));
		}

		$where = FALSE;

		$flag = $this->input->post('flag');

		if ($flag) {
			$flag=1;
		}else{
			$flag=0;
		}

		$msg = array(lang('modules_flag_false'),lang('modules_flag_true'));

		if (!isset($vdata['status'])) {
			if ($where) {
				$res = $this->model->flag($flag,$key,$where);
			}else{
				$res = $this->model->flag($flag,$key);
			}

			if ($res) {
				$vdata = array('status'=>1,'msg'=>$msg[$flag]);
				if (is_array($key)) {
					$this->mlogs->add('flag',lang('modules_flag_id').$this->input->post('ids').lang('modules_flag_for').$flag);
				}else{
					$this->mlogs->add('flag',lang('modules_flag_id').$key.lang('modules_flag_for').$flag);
				}
			}else{
				$vdata = array('status'=>0,'msg'=>lang('modules_flag_err_select'));
			}
		}

		if($this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			$this->load->view('msg',$vdata);
		}
	}

}

