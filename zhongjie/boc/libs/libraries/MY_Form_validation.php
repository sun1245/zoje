<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    // 返回 errors name
    public function get_errors()
    {
        return $this->_error_array;
    }

    /**
     * 验证用户名
     * @param string $str
     * @param int $length
     * @return boolean
     */
    public function is_name($str){
        $minLen=2;
        $maxLen=30;
        $charset='ALL';
        switch($charset){
            case 'EN': $match = '/^[_\w\d]{'.$minLen.','.$maxLen.'}$/iu';
            break;
            case 'CN':$match = '/^[_\x{4e00}-\x{9fa5}\d]{'.$minLen.','.$maxLen.'}$/iu';
            break;
            default:$match = '/^[_\w\d\x{4e00}-\x{9fa5}]{'.$minLen.','.$maxLen.'}$/iu';
        }
        $this->set_message('is_name',"%s 用户名格式错误.");
        return (bool) (!preg_match( $match , $str)) ? FALSE : TRUE;
    }


    /**
     * 验证电话号码
     * @param string $str
     * @return boolean
     */
    public function is_phone($str){
        $this->set_message('is_phone',"%s 电话号码格式有误.");
        return (bool) (!preg_match('/^0[0-9]{2,3}[-]?\d{7,8}$/', $str)) ? FALSE : TRUE;
    }

    /**
     * 验证手机
     * @param string $str
     * @param string $match
     * @return boolean
     */
    public function is_mobile($str){
        $this->set_message('is_mobile',"%s 格式有误.");
        // return (bool) (!preg_match('/^[(86)|0]?(13\d{9})|(15\d{9})|(18\d{9})$/', $str)) ? FALSE : TRUE;
        // return (bool) (!preg_match('/^[(86)|0]?(1\d{1}\d{9})$/', $str)) ? FALSE : TRUE;
        return (bool) (!preg_match("/^13[0-9]{1}[0-9]{8}$|15[012389]{1}[0-9]{8}$|189[0-9]{8}$|1[47]{1}[0-9]{9}$/",$str)) ? FALSE : TRUE;
    }

    /**
     * 验证邮政编码
     * @param string $str
     * @param string $match
     * @return boolean
     */
    public function is_zipcode($str){
        $this->set_message('is_zipcode',"%s 邮编格式有误.");
        return (bool) (!preg_match('/\d{6}/', $str)) ? FALSE : TRUE;
    }

    /**
     * 验证IP
     * @param string $str
     * @param string $match
     * @return boolean
     */
    public function is_ip($str){
        $this->set_message('is_ip',"%s IP 格式错误.");
        return (bool) (!preg_match('/^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/' , $str)) ? FALSE : TRUE;
    }

    /**
     * 验证身份证号码
     * @param string $str
     * @param string $match
     * @return boolean
     */
    public function is_idcard($str){
        $this->set_message('is_idcard',"%s 身份证号码格式错误.");
        return (bool) (!preg_match("/^\d{6}((1[89])|(2\d))\d{2}((0\d)|(1[0-2]))((3[01])|([0-2]\d))\d{3}(\d|X)$/i", $str)) ? FALSE : TRUE;
    }

    /**
     * *
     * 验证URL preg_url
     * @param string $str
     * @param string $match
     * @return boolean
     */
    public function is_url($str){
        $this->set_message('is_url',"%s URL路径格式错误.");
        // return (bool) (!preg_match('/^(http:\/\/)?(https:\/\/)?([\w\d-]+\.)+[\w-]+(\/[\d\w-.\/?%&=]*)?$/' , $str)) ? FALSE : TRUE;
        return (bool) (!preg_match('/^(\w+):\/\/([^/:]+)(:\d*)?([^# ]*)$/' , $str)) ? FALSE : TRUE;


    }

    public function link_create($str='')
    {
        if ($str) {
            return link_create($str);
        }
        return false;
    }
}