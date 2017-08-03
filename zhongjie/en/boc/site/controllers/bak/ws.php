<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 用来处理服务内容
class Ws extends CI_Controller{

  function __construct()
  {
    parent::__construct();

    define("WSMAC",'JI234ILIjiw90');
  }

  public function _remap($method, $params= array()){
    if (method_exists($this, $method)){
      return call_user_func_array(array($this, $method), $params);
    }else{
      return call_user_func_array(array($this, "nothing"), $params);
    }
  }

  function nothing(){
      $data['error'] = "1";
      $data['s'] = "我没有找到任何数据";
      echo base64_encode(json_encode($data));
  }

  // 账号验证
  // 获取token
  function getToken(){

  }

  // get 获取消息
  // 定义结构和返回结构
  function tGet(){
    $get_all = $this->input->get();
    if (!$get_all) {
      $get_all = array();
      $get_all['err'] = 1;
      $get_all['msg'] = 'nothing...';
    }
    $str = "";
    foreach ($_SERVER as $key => $value) {
      $str .= $key . ' => ' . $value . '<br/>';
    }
    $get_all['server'] = $str;

    echo base64_encode(json_encode($get_all));
    // $this->output->set_content_type('application/json')->set_output(json_encode($get_all));
  }

  // 获取消息
  // 定义结构和返回结构
  function tPost(){
    $get_all = $this->input->post();
    if (!$get_all) {
      $get_all = array();
      $get_all['err'] = 1;
      $get_all['msg'] = 'nothing...';
    }
    $str = "";
    foreach ($_SERVER as $key => $value) {
      $str .= $key . ' => ' . $value . '<br/>';
    }
    $get_all['server'] = $str;
    echo base64_encode(json_encode($get_all));
  }

  // 推送消息
  // 使用get方式推送消息
  function tSend(){
    $this->load->library('curl');

    $timeline = now();

    $params = array(
      'token' => hash("md5",WSMAC.$timeline), // md5
      'tl' => $timeline,
      "to"=>"1",
      "ch"=>"sss",
      "msg"=>"send by api post:". urldecode(htmlentities($_GET['msg']))
    );
    dump($params);
    // $this->curl->simple_get('http://localhost:9093',$params);
    // $reque = $this->curl->http_header("test","abc");
    $re = $this->curl->simple_post('http://localhost:9093', $params);

    dump('result');
    dump($re);
    // echo base64_encode($re);
    $this->output->set_content_type('application/json')->set_output(($re));


    // Debug data ------------------------------------------------

    // Errors

    // var_dump('err code');
    // var_dump($this->curl->error_code); // int
    // var_dump('err string');
    // var_dump($this->curl->error_string);
    //
    // // Information
    // var_dump('err info');
    // var_dump($this->curl->info); // array

  }

  function t(){
    echo md5('abc');

  }


  function test3(){

      // $db['oledb']['hostname'] = "oci8:218.29.103.130:1521";
      // $db['oledb']['username'] = "OA_USER";
      // $db['oledb']['password'] = "GM123";
      // $db['oledb']['database'] = "TESTSVR";
      // $db['oledb']['dbdriver'] = "pdo";
      // $db['oledb']['dbprefix'] = "";
      // $db['oledb']['pconnect'] = FALSE;
      // $db['oledb']['db_debug'] = TRUE;
      // $db['oledb']['cache_on'] = FALSE;
      // $db['oledb']['cachedir'] = '';
      // // $db['oledb']['char_set'] = 'utf8';
      // // $db['oledb']['dbcollat'] = 'utf8_general_ci';

      // $this->db2 = $this->load->database($db['oledb'],TRUE);

      $this->db3 = new PDO('oci:dbname=218.29.103.130:1521/TESTSVR;charset=CL8MSWIN1251', 'OA_USER', 'GM123');

      var_dump($this->db3);

  }


}
