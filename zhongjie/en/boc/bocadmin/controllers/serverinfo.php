<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serverinfo extends Base_Controller {

    public function index()
    {
        $vdata['title'] = lang('nav_serverinfo');

        //检查环境
        $vdata['extension'] = array(
            'gd' => array("title" => lang('ext_gd'),'enable' => 0),
            'mysql' => array("title" => "Mysql",'enable' => 0),
            'mysqli' => array("title" => "Mysqli",'enable' => 0),
            'xml' => array("title" => "XML",'enable' => 0),
            'iconv' => array("title" => "iconv",'enable' => 0),
            'json' => array("title" => "json",'enable' => 0),
            'zip' => array("title" => "Zip",'enable' => 0),
            'curl' => array("title" => "CURL",'enable' => 0),
        );

        foreach ($vdata['extension'] as $e => $v) {
            if (extension_loaded($e)) {
                $vdata['extension'][$e]['enable'] = 1;
            }
        }

        // TODO 检测系统服务 
        $vdata['env'] = array(
            'serverip' => array("title"=>lang('env_serverip'), 'enable'=>$_SERVER['SERVER_ADDR']),
            'serverport' => array("title"=>lang('env_serverport'), 'enable'=>$_SERVER['SERVER_PORT']),
            'app' => array("title"=>lang('env_app'), 'enable'=> " <a href='".GLOBAL_URL."' target='_blank'>". GLOBAL_URL."</a>"),
            'dbtype' => array("title"=>lang('env_dbtype'), 'enable'=>strtoupper(DB_TYPE)),
            'cache' => array("title"=>lang('env_cache'), 'enable'=> 0 ),
            'upload' => array("title"=>lang('env_upload'), 'enable'=> 0 ),
            'memory_limit' => array("title"=>lang('memory_limit'),'enable'=>ini_get('memory_limit')),
            'upload_max_filesize' => array("title"=>lang('upload_max_filesize'),'enable'=>ini_get('upload_max_filesize')),
            // 'max_file_uploads' => array("title"=>lang('max_file_uploads'),'enable'=>ini_get('max_file_uploads')),
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


        // 当前IP
        $vdata['server']['ip'] = get_ip();

        $this->load->view('inc_header.php',$vdata);
        $this->load->view('serverinfo_index.php');
        $this->load->view('inc_footer.php');
    }

}

/* End of file welcome.php */
/* Location: .//home/http/bocms/adminer/controllers/welcome.php */