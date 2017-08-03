<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captchas extends MY_Controller{
    function __construct(){
        parent::__construct();
        // 不使用cache
        $this->cache_use=false;
        // cookie imgcde
        $this->load->library('captcha');
    }

    // 输出
    public function index(){
        $this->captcha->create_image();
        $this->captcha->stroke();
        exit;
    }

    // 验证
    public function verify()
    {
        if (trim($_GET['code'])) {
            $vdata['status'] = $this->captcha->verify(trim($_GET['code']))?1:0;
        }else{
            $vdata['status'] = 0;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($vdata));
    }
}