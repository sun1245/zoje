<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Base_Controller {

	public function index()
	{
		$vdata['title'] = lang('wel_title');

		$vdata['extension']['gd'] = 0;

		$this->load->model('manager_model','mmger');
		$ginfo = $this->mmger->get_group($this->session->userdata('gid'));

		$vdata['user_group'] = $ginfo['title'];

		$this->load->language('serverinfo');

        $vdata['env'] = array(
            'serverip' => array("title"=>lang('env_serverip'), 'enable'=>$_SERVER['SERVER_NAME']),
            'serverport' => array("title"=>lang('env_serverport'), 'enable'=>$_SERVER['SERVER_PORT']),
            'cache' => array("title"=>lang('env_cache'), 'enable'=> 0 ),
            'upload' => array("title"=>lang('env_upload'), 'enable'=> 0 ),
            'upload_max_filesize' => array("title"=>lang('upload_max_filesize'),'enable'=>ini_get('upload_max_filesize'))
            );

        // 加载公用文件帮助函数
        $this->load->helper('file');

        if (new_is_writeable(UPLOAD_PATH)) {
            $vdata['env']['upload']['enable'] = "OK";
        }

        // 检测缓存文件夹可写
        if (new_is_writeable(APPPATH.'cache')) {
            $vdata['env']['cache']['enable'] = "OK";
        }

		// 获取boc news php 4/5
        $boc_file_path = APPPATH.'cache/boc_feed.json';

        if (file_exists($boc_file_path) and new_is_writeable(APPPATH.'cache')) {
            if ((filemtime($boc_file_path) +60*60*24*30 -time() )> 0) {
                $boc = file_get_contents($boc_file_path);
            }else{
               $boc = file_get_contents("http://www.bocweb.cn/news.php?boc_notice/bocweb2013");
               file_put_contents($boc_file_path,$boc);
           }
       }else{
           $boc = file_get_contents("http://www.bocweb.cn/news.php?boc_notice/bocweb2013");
           if (new_is_writeable(APPPATH.'cache')) {
            $fp=fopen("$boc_file_path", "w+");
            fclose($fp);
            file_put_contents($boc_file_path,$boc);
        }
    }
    $vdata['boc'] = json_decode($boc,true);

		// 当前IP
    $vdata['server']['ip'] = get_ip();


    $this->load->view('inc_header.php',$vdata);
    $this->load->view('welcome.php');
    $this->load->view('inc_footer.php');
}

}

/* End of file welcome.php */
/* Location: .//home/http/bocms/adminer/controllers/welcome.php */