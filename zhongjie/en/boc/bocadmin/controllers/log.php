<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Log extends CI_Controller 
 * 日志记录
 * @author 
 */
class Log extends CRUD_Controller
{

	public function __construct()
	{
		parent::__construct();

		// var_dump($this->model->get_count_mouth());

		// 对log日志严格控制

		$actions = array('index','search');
		
		if ( !in_array($this->router->method,$actions)) {
			$vdata = array(
				"status"=>0
				,"msg"=>"非法操作，不提供此功能！"
				);
			if ($this->input->is_ajax_request()) {
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			}else{
				$this->load->view('msg',$vdata);
			}
		}
	}

	public function _index_where()
	{
		// 普通用户只能看到自己
		if ($this->session->userdata('gid') != 1) {
			return array('mid'=>$this->session->userdata('mid'));
		}else{
			return false;
		}
	}

	/**
	 * 搜索
	 */
	public function search($page=1){
		$limit = $this->page_limit;
		$this->input->get('limit') and is_numeric($this->input->get('limit')) AND $limit = $this->input->get('limit');

		$where = array();
		if ($this->session->userdata('gid') != 1) {
			$where = array('mid'=>$this->session->userdata('mid'));
		}else{
			if ($co = $this->input->get('co')) {
				$where = array('controller'=>$co);
			}
			if ($mid = $this->input->get('mid')) {
				$where = array_merge($where,array('mid'=>$mid));
			}
		}

		// endtime
		$time_end = now();
		if ($this->input->get('te') and $tmp = strtotime($this->input->get('te'))) {
			$time_end = $tmp;
			unset($tmp);
		}
		$where = array_merge($where,array('timeline <'=>$time_end));

		$time_start = false;
		if ($this->input->get('ts') and $tmp = strtotime($this->input->get('ts'))) {
			$time_start = $tmp;
			unset($tmp);
		}

		if ($time_start) {
			$where = array_merge($where,array('timeline >'=>$time_start));
		}

		$orders = array('id'=>'desc');

		$vdata['pages'] = $this->_pages(site_url($this->class.'/search'),$limit,$where);
		$vdata['list'] = $this->model->get_list($limit,$limit*($page-1),$orders,$where);
		$this->_display($vdata,'log_index.php');
	}


	// 显示单条数据
	public function get_ajax($key = FALSE){

		if (!$this->input->is_ajax_request()) {
			return FALSE;
		}

		if (!$key AND $this->input->get('id')) {
			$key = $this->input->get('id');
		}else{
			$vdata = array('status'=>0,'msg'=>'没有正常ID！');
		}
	
		$vdata['it'] = $this->model->get_one((int)$key);
		$vdata['it']['timeline'] = mdate("%Y/%m/%d %h:%i:%s" ,$vdata['it']['timeline']);

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	// 对扫描数据处理
	
	// 取消删除
	public function delete()
	{
		$vdata = array('status'=>0,'msg'=>'您并没有权限访问此页面！如需权限，请联系管理员！');
		if ($this->CI->input->is_ajax_request()) {
			header('HTTP/1.1 500 Internal Server Error');
			json_echo($vdata);
			exit();
			return false;
		}else{
			$str =$this->CI->load->view('msg',$vdata,TRUE);
			echo($str);exit();
		}
	}

}

