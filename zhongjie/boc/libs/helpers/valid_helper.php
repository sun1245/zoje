<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Validate email address 验证邮箱（向上兼容）
 *
 * @access  public
 * @return  bool
 */
if ( ! function_exists('valid_email'))
{
    function valid_email($address)
    {
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $address)) ? FALSE : TRUE;
    }
}

/**
 * 验证邮箱
 * @param  string  $email 邮箱地址
 * @return boolean
 */
function is_mail($email) {
    // filter_var ($email, FILTER_VALIDATE_EMAIL ) ?  FALSE : TRUE;
    return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

/**
 * 是否是手机号码
 * @param string $phone 手机号码
 * @return boolean
 */
function is_mobile($phone) {
    if (strlen($phone) !== 11) {
        return FALSE;
    }
    return (bool) (!preg_match('/^[(86)|0]?(13\d{9})|(15\d{9})|(18\d{9})$/', $str)) ? FALSE : TRUE;
}

/**
 * 是否为一个合法的url
 * @param string $url
 * @return boolean
 */
function is_url($url){
    return filter_var($url, FILTER_VALIDATE_URL ) ? FALSE : TRUE;
}

/**
 * 是否为一个合法的ip地址
 * @param string $ip
 * @return boolean
 */
function is_ip($ip){
    return (bool) (!preg_match('/^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/' , $str)) ? FALSE : TRUE;
}

/**
 * 是否为整数
 * @param int $number
 * @return boolean
 */
function is_number($number){
    return (bool)(preg_match('/^[-\+]?\d+$/',$number)) ? TRUE: FALSE ;
}

/**
 * 是否为正整数
 * @param int $number
 * @return boolean
 */
function is_positive_number($number){
    if(ctype_digit ($number)){
        return true;
    }else{
        return false;
    }
}

/**
 * 是否为小数
 * @param float $number
 * @return boolean
 */
function is_decimal($number){
    if(preg_match('/^[-\+]?\d+(\.\d+)?$/',$number)){
        return true;
    }else{
        return false;
    }
}

/**
 * 是否为正小数
 * @param float $number
 * @return boolean
 */
function is_positive_decimal($number){
    if(preg_match('/^\d+(\.\d+)?$/',$number)){
        return true;
    }else{
        return false;
    }
}

/**
 * 是否为英文
 * @param string $str
 * @return boolean
 */
function is_english($str){
    if(ctype_alpha($str))
        return true;
    else
        return false;
}

/**
 * 是否为中文
 * @param string $str
 * @return boolean
 */
function is_chinese($str){
    if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$str))
        return true;
    else
        return false;
}

/**
 * 判断是否为图片
 * @param string $file  图片文件路径
 * @return boolean
 */
function is_image($file){
    if(file_exists($file) && getimagesize($file===false)){
        return false;
    }else{
        return true;
    }
}

/**
 * 是否为合法的身份证(支持15位和18位)
 * @param string $card
 * @return boolean
 */
function is_idcard($card){
    if(preg_match('/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/',$card)||preg_match('/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$/',$card))
        return true;
    else
        return false;
}

/**
 * 验证日期格式是否正确
 * @param string $date
 * @param string $format
 * @return boolean
 */
function is_date($date,$format='Y-m-d'){
    $t=date_parse_from_format($format,$date);
    if(empty($t['errors'])){
        return true;
    }else{
        return false;
    }
}

/**
 * 标准长度，查看字符串长度是否足够
 * @param  string $str  输入
 * @param  integer $val 验证长度
 * @return boolean      true/false
 */
function exact_length($str, $val)
{
    if (preg_match("/[^0-9]/", $val))
    {
        return FALSE;
    }

    if (function_exists('mb_strlen'))
    {
        return (mb_strlen($str) != $val) ? FALSE : TRUE;
    }

    return (strlen($str) != $val) ? FALSE : TRUE;
}

if ( ! function_exists('is_name')) {
    /**
     * 验证字符串是否为数字,字母,中文和下划线构成
     * @param string $str
     * @param string 级别 EN,CN，默认 ALL
     * @return boolean
     */
    function is_name($str,$charset="ALL"){
        $minLen=2;
        $maxLen=30;
        switch($charset){
            case 'EN': $match = '/^[_\w\d]{'.$minLen.','.$maxLen.'}$/iu';
                break;
            case 'CN':$match = '/^[_\x{4e00}-\x{9fa5}\d]{'.$minLen.','.$maxLen.'}$/iu';
                break;
            default:$match = '/^[_\w\d\x{4e00}-\x{9fa5}]{'.$minLen.','.$maxLen.'}$/iu';
            // preg_match('/^[\x{4e00}-\x{9fa5}\w_]+$/u',$str)
        }
        return (bool) (!preg_match( $match , $str)) ? FALSE : TRUE;
    }
}
