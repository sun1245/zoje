<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ga extends Base_Controller
{

	private $secret = false;
	private $qr_name;

	protected $rules = array(

		"rule" => array(
			array(
				'field'   => 'code',
				'label'   => '验证码',
				'rules'   => 'trim|required|numeric|callback_vcode'
			),
			array(
				'field'   => 'ga',
				'label'   => '状态',
				'rules'   => 'trim|required|numeric'
			),
		),
	);

	public function __construct(){
		parent::__construct();
		$this->load->library('GoogleAuthenticator', false, 'ga');
		$this->qr_name = $this->session->userdata('uname').'@boc';

		if (!$this->secret and $this->session->userdata('secret')){
			$this->secret = $this->session->userdata('secret');
		}
		dump($this->secret,'init');
	}

	public function index($v = false)
	{
		$vdata['title'] = "Google 两步验证";
		$vdata['it'] = $this->mmger->get_one(array('id'=>$this->session->userdata('mid')),"ga");

		if ($vdata['it']['ga']) {
			$this->secret = $vdata['it']['ga'];
		}
		if (!$this->secret) {
			$this->secret = $this->ga->createSecret();
			$this->session->set_userdata('secret',$this->secret);
		}

		// $vdata['qr']=$this->ga->getQR($this->qr_name, $this->secret,true);

		$this->load->view('inc_header.php',$vdata);
		$this->load->view('ga_index.php');
		$this->load->view('inc_footer.php');
	}

	public function vcode($str='')
	{
		if ($str and $this->ga->getCode($this->secret) == $str) {
			return TRUE;
		}else{
			$this->form_validation->set_message('vcode', '请填写正确的验证码');
			return FALSE;
		}
	}

	public function open()
	{
		$vdata = array('status'=>0,'msg'=>'请提供验证码。');
		$this->form_validation->set_rules($this->rules['rule']);
		if ($this->form_validation->run() == FALSE) {
			dump(validation_errors());
			$vdata = array( 'status' => 0, 'msg' => validation_errors());
		}else{
			$code = $this->form_validation->set_value('code');
			$ga  = $this->form_validation->set_value('ga');
				// TODO 开启验证状态
				$vdata = array('status'=>1,'msg'=>'通过验证');

				$v =$this->mmger->update(
					array('ga'=>$this->secret),
					array('id'=>$this->session->userdata('mid'))
				);
				if ($v) {
					if ($ga) {
						$ga = 1;
						$vdata['msg'] = "已开启两步验证";
					}else{
						$ga = 0;
						$vdata['msg'] = "已关闭两步验证";
					}
				}

		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	// 验证 code
	public function verify($code)
	{
		$vdata = array('status'=>0,'msg'=>'请提供验证码。');
		if ($code) {
			$result = $this->ga->verifyCode($this->secret,$code,2);    // 2 = 2*30sec clock tolerance
			if ($result) {
				$vdata = array('status'=>1,'msg'=>'通过验证');
			}else{
				$vdata = array('status'=>0,'msg'=>'请填写正确的验证码!');
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	public function qr(){
		$this->ga->getQR($this->qr_name, $this->secret);
	}

}
