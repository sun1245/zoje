<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Confedit 
 * @author era
 * 打开配置文件 
 * condition : PHP 5 >= 5.2.0, PECL json >= 1.2.0
 */
class Confedit
{
    private $file;
    private $conf;
    private $CI;
    
    /**
     * @brief 
     * @param $file ROOT./conf/文件
     */
    public function __construct($file)
    {
        $this->CI   =& get_instance();
        $this->file = ROOT.'json/'.$file[0]; 
        $this->CI->load->helper('file');

        if (file_exists($this->file)) {
            $this->conf = json_decode(read_file($this->file),true);
            if ($this->conf) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    /**
     * @brief 文件地址
     * @param $file
     * @return bool
     */
    public function set_file($file)
    {
        $this->file = ROOT.'json/'.$file;
        if (file_exists($this->file)) {
            $this->conf = json_decode(read_file($this->file),true);
            return true;
        }else{
            return false;
        }
    }

    /**
     * @brief 获得配置
     * @param $item false 
     * @return Array/ conf['item']
     */
    public function get_conf($item=false)
    {
        if ($item and key_exists($item,$this->conf)) {
            return $this->conf['item'];
        }else{
            return $this->conf;
        }
    }
    
    /**
     * @brief 写入配置
     * @param $data
     * @return 
     */
    public function set_conf($data){
        if (array_keys($this->conf) == array_keys($data)) {
            //echo symbolic_permissions(fileperms($this->file));
            write_file($this->file, stripslashes(json_encode($data,true)));
            return true;
        }else{
            show_error('conf/ 文件没有写入权限！');
            return false;
        }
    }
    
    
}

