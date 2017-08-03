<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 帐号
class login extends MY_Controller {
  protected $rules = array(
  );

  function __construct(){
    parent::__construct();
    $this->load->model('account_model','model');
  }

  public function index($provider = '')
  {
    // TODO 判定登录

    $this->config->load('oauth2');
    $allowed_providers = $this->config->item('oauth2');

    if ( ! $provider OR ! isset($allowed_providers[$provider]))
    {
      $this->session->set_flashdata('info', '暂不支持'.$provider.'方式登录.');
      // redirect();
      return;
    }

    $this->load->library('oauth2');
    $provider = $this->oauth2->provider($provider, $allowed_providers[$provider]);
    $args = $this->input->get();
    if ($args AND !isset($args['code']))
    {
      $this->session->set_flashdata('info', '授权失败了,可能由于应用设置问题或者用户拒绝授权.<br />具体原因:<br />'.json_encode($args));
      // redirect();
      // var_dump($args);
      return;
    }

    $code = $this->input->get('code', TRUE);
    if ( ! $code)
    {
      $provider->authorize();
      return;
    }else{
      // token
      try
      {
        $token = $provider->access($code);
        $sns_user = $provider->get_user_info($token);

        // dump($sns_user);
        // 开始获取数据进行数据处理，具体形式具体处理
        // 查找用户存在与否，否则注册，引导用户

        if (is_array($sns_user))
        {
          $info=$this->model->get_one(array('oid'=>$sns_user['uid'],'email !='=>''),'*');
          if(!empty($info)){
            $session = array(
              "aid" => $info['id'],
              "uname" => $info['uname'],
              "email" => $info['email'],
              "email_check" => $info['email_check'],
              "phone" => $info['phone'],
              "phone_check" => $info['phone_check'],
              "chinaid_check" => $info['chinaid_check'],
              "login_ip" => get_ip(),
              "login_time" => time()
            );
            $this->session->set_userdata($session);
            $this->model->set_login($info['id']);
            redirect(site_url('member'),'refresh');
          }else{
            $info=$this->model->get_one(array('oid'=>$sns_user['uid']),'*');
            if(empty($info)){
              //注册临时帐号
              $data['reg_time'] = time();
              $data['uname'] = $sns_user['screen_name'].'_'.rand_str();
              $data['oid'] = $sns_user['uid'];
              if($insert_id = $this->model->create($data)){
                $info = $this->model->get_login($insert_id);
                $session = array(
                  "aid" => $info['id'],
                  "uname" => $info['uname'],
                  "email" => $info['email'],
                  "email_check" => $info['email_check'],
                  "phone" => $info['phone'],
                  "phone_check" => $info['phone_check'],
                  "chinaid_check" => $info['chinaid_check'],
                  "login_ip" => get_ip(),
                  "login_time" => time()
                );
                $this->session->set_userdata($session);
              }else{
                show_404();
              }
            }else{
              //登录临时帐号
              $session = array(
                "aid" => $info['id'],
                "uname" => $info['uname'],
                "email" => $info['email'],
                "email_check" => $info['email_check'],
                "phone" => $info['phone'],
                "phone_check" => $info['phone_check'],
                "chinaid_check" => $info['chinaid_check'],
                "login_ip" => get_ip(),
                "login_time" => time()
              );
              $this->session->set_userdata($session);
              $this->model->set_login($info['id']);
            }
            $this->session->set_userdata('user', $sns_user);
            redirect(site_url('login/register1'),'refresh');
          }

        }
        else
        {
          $this->session->set_flashdata('info', '获取用户信息失败');
        }
      }
      catch (OAuth2_Exception $e)
      {
        $this->session->set_flashdata('info', '操作失败<pre>'.$e.'</pre>');
        show_404();
      }
    }

  }

}
