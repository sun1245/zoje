<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class register extends MY_Controller {
	protected $rules = array(
		"send" => array(
			array(
				"field" => "username",
				"label" => "姓名",
				"rules" => "trim|required|callback_username_verify"
				)
			,array(
				"field" => "email",
				"label" => "邮箱",
				"rules" => "trim|required|strtolower|valid_email"
				)
			,array(
				"field" => "password",
				"label" => "密码",
				"rules" => "trim|required"
				)
			,array(
				"field" => "captcha",
				"label" => "验证码",
				"rules" => "trim|callback_captcha_verify"
				)

			)
		);

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','musers');
		$this->model = & $this->musers;
	}

	public function index()
	{
    	// seo
		$data['header']=header_seoinfo(0,0);
		$data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-'.'注册';
		$this->load->view('register',$data);

	}


	// 数据提交
	public function sendpost()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules($this->rules['send']);
			$vdata = array( 'status' => 0, 'msg' => '未知错误！');

			if ($this->form_validation->run() == FALSE) {
				// $vdata['msg'] = validation_errors();
				$errs = form_errors ();
				$vdata ['msg'] = $errs;
			}else{

				unset($_POST['captcha']);
				$data = $this->input->post();

				if ($this->model->create($data)) {
					$vdata['status'] = 1;
					$vdata['msg'] = "注册成功！";
				}
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			show_404();
		}
	}

	// 手机号码验证
	public function username_verify($str = '') {
		$data = $this->musers->get_one ( array ('username' => $str) );
		if (! empty ( $data )) {
			$this->form_validation->set_message ( 'username_verify', '用户已注册，请您更换！' );
			return false;
		} else {
			return true;
		}
	}



}
