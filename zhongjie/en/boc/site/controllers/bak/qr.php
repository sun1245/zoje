<?php
/**
* 二维码生成器
*/
class Qr extends CI_Controller
{
    // 输出qr
    // 参数 d  内容生成
    // 参数 l  M 级别 [L','M','Q','H']
    // daxiao 4 可设置 2,4,8
    public function index(){
        $params['data'] =  $this->input->get('d') ? $this->input->get('d') : false;
        if ($params['data']) {
            header("Content-Type: image/png");
            $this->load->library('Ciqrcode');
            // 'otpauth://totp/Blog?secret=JPA6EM4NZSFOD7RL';
            $params['level'] = $this->input->get('l') ? $this->input->get('l') : "M";
            $params['size'] = ($this->input->get('s') and is_numeric($this->input->get('s'))) ? $this->input->get('s') : 4;
            dump($params);
            $params['bg'] = array(255, 255, 255);
            $params['fg'] = array(0, 0, 0);
            // 保存到本地
            // unlink(UPLOAD_PATH.'tes.png');
            // $params['savename'] = UPLOAD_PATH.'tes.png';
            // $params['show'] = 1;
            $this->ciqrcode->generate($params);
    		// echo $params['savename'];
        }else{
            show_404();
        }
    }
}

?>
