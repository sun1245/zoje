<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Downloads 
 * @author 
 */
class Downloads
{

    public function __construct($props = array())
    {
        log_message('debug','Boc_Dowload Class 初始');
    }

    /**
     * @brief 下载文件，默认在 UPLOAD 文件夹下
     *
     * @param string $file
     * @param string $path 设定路径，默认为false
     *
     * @return 
     */
    public function download($file,$path=false)
    {
        if ($file) {
            if ($path) {
                $file = $path.$file;
            }else{
                $file = UPLOAD_PATH.$file;
            }
        }else{
            return false;
        }

        if (!file_exists($file)) {
            return false;
        }

        if (!function_exists('get_mime_by_extension')) {
            $CI =& get_instance(); 
            $CI->load->helper('file');
        }

        if ($type = get_mime_by_extension($file)) {
            $file_info = get_file_info($file);

            // ob_start();
            // ini_set('memory_limit','1200M');
            // set_time_limit(900);
            // // required for IE, otherwise Content-disposition is ignored
            // if(ini_get('zlib.output_compression'))
            //     ini_set('zlib.output_compression', 'Off');

            header("Content-Type:".$type);
            header('Content-Disposition:attachment;filename='.$file_info['name']);
            header('Content-Transfer-Encodeing: binary');
            header('Content-Length:'.$file_info['size']);
            
            // ob_clean();
            // flush();    
            readfile($file);

            exit();
        }else{
            log_message('debug','class download: can\'t find the file type');
            return false;
        }
    }

    /**
     * @brief 下载 excel HTML表格格式
     *
     * @param $table string or row_array or array('title' => array,'data' => array);
     * @param string $name 
     *
     * @return null; 
     */
    public function excel_down($table,$name)
    {
        if (is_array($table) && $table) {
            if (!array_key_exists('title',$table) ) {
                $table = $this->array2table($table);
            }else{
                $table = $this->array2table($table['data'],$table['title']);
            }
        }
        $name = trim($name).'.xls';
        header ( "Content-type:application/vnd.ms-excel;charset=utf-8" );
        header ( "Content-Disposition:filename=".$name );
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');        
        header('Expires:0'); 
        header('Pragma:public');
        echo $this->_table_header($table);
    }


    /**
     * @brief 转化表为table
     *
     * @param array $data  列数据 
     * @param array $title 列表头 默认flase
     *
     * @return 
     */
    public function array2table($data,$title=false)
    {
        $table = '<table border="1"><tr>';
        if (!$title) {
            $title = array_keys($data[0]);
        }
        foreach($title as $v){
            $table.="<th>$v</th>";
        }
        $table .= '</tr>';
        foreach($data as $v){
            $table .= '</tr>';
            foreach($v as $j){
                $table.="<td>$j</td>";
            }
            $table .= '</tr>';
        }
        return $table;
    }

    /**
     * @brief 为 string table 添加 头部和尾部
     *
     * @param string $table
     *
     * @return 
     */
    public function _table_header($table)
    {
        return "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /></head><body>".$table."</body></html>"; 
    }


}


