<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class feedback extends MY_Controller {
	protected $rules = array(
		"send" => array(
			array(
				"field" => "title",
				"label" => "标题",
				"rules" => "trim|required"
				)
			,array(
				"field" => "username",
				"label" => "姓名",
				"rules" => "trim|required"
				)
			,array(
				"field" => "email",
				"label" => "邮箱",
				"rules" => "trim|required|strtolower|valid_email"
				)
			,array(
				"field" => "telphone",
				"label" => "手机",
				"rules" => "trim|required|is_mobile"
				)
			,array(
				"field" => "fax",
				"label" => "传真",
				"rules" => "trim|numeric|required"
				)
			,array(
				"field" => "content",
				"label" => "内容",
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
		$this->load->model('feedback_model','mfeedback');
		$this->model = & $this->mfeedback;
	}

	public function index()
	{
    	// seo
		$data['header']=header_seoinfo(0,0);
		$data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-'.'在线留言';
		$this->load->view('feedback',$data);

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
				$data['content'] = str_replace("\n","<br/>",$this->input->post('content',true));
				if ($this->model->create($data)) {
					$vdata['status'] = 1;
					$vdata['msg'] = "已经提交信息，我们会尽快回复您！";
				}
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			show_404();
		}
	}
}
