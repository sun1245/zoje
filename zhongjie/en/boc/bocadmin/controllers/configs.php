<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configs extends Base_Controller {

	protected $rules = array(
		"set" => array(
			array(
				'field'   => 'category', 
				'label'   => '类别', 
				'rules'   => 'trim|required|alpha_dash|strtolower'
			),
			array(
				'field'   => 'key', 
				'label'   => '键值', 
				'rules'   => 'trim|required|alpha_dash|strtolower'
			),
			array(
				'field'   => 'value', 
				'label'   => '内容', 
				'rules'   => 'trim'
			),
		)
	);

	public function index()
	{
		$vdata['site'] = $this->model->get_cate('site');
		$vdata['adminer'] = $this->model->get_cate('adminer');
		$vdata['email'] = $this->model->get_cate('email');
		$vdata['upload'] = $this->model->get_cate('upload');
		$vdata['html'] = $this->model->get_cate('html');
		$vdata['title'] = lang('adminer_configs');
		$vdata['theme'] = isset($_COOKIE['theme']) ? strtolower($_COOKIE['theme']) : 'default';

		$this->load->view('inc_header.php', $vdata, FALSE);
		$this->load->view('configs_index');
		$this->load->view('inc_footer.php');
	}

	public function set(){
		$data = array();
		$this->form_validation->set_rules($this->rules['set']);
		if ($this->form_validation->run() == FALSE) {
			$data = array('status' => 0, "msg" => "修改错误!");
		}else{
			$category = $this->form_validation->set_value('category');
			$key = $this->form_validation->set_value('key');
			$value = $this->form_validation->set_value('value');
			if ($this->model->set($category,$key,$value)) {
				$this->mlogs->add('edit','修改配置'.$category.'.'.$key.':'.$value);
				$data = array('status' => 1, "msg" => "完成修改!");
			}else{
				$data = array('status' => 0, "msg" => "没有变动!");
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	// 对 edit del create 禁用
	public function del(){
		$vdata['msg'] = lang('have_no_page');
		$vdata['status'] = 0;
		if ($this->input->is_ajax_request()) {
			header('HTTP/1.1 500 Internal Server Error');
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			show_404();
		}
	}

	public function edit(){show_404();}
	public function create(){show_404();}

}
