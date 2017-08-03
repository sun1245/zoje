<?php 

/**
*   msm
*/
class msm
{

    function __construct()
    {
        # code...
    }

    protected $webservice_code = array(
        '0' => 'ok',
        '1' => '没有需要取得的数据',
        '-2' => '帐号/密码不正确 可能为： 1.序列号未注册 2.密码加密不正确 3.密码已被修改',
        '-4' => '余额不足',
        '-5' => '数据格式错误',
        '-6' => '参数有误',
        '-7' => '权限受限 ',
        '-8' => '流量控制错误',
        '-9' => '扩展码权限错误',
        '-10' => '内容长度长',
        '-11' => '内部数据库错误',
        '-12' => '序列号状态错误',
        '-13' => '没有提交增值内容',
        '-14' => '服务器写文件失败',
        '-15' => '文件内容base64编码错误',
        '-16' => '返回报告库参数错误',
        '-17' => '没有权限',
        '-18' => '上次提交没有等待返回不能继续提交',
        '-19' => '禁止同时使用多个接口地址',
        '-20' => '相同手机号，相同内容重复提交',
        '-22' => 'Ip鉴权失败,提交的IP不是所绑定的IP'
        );

    public function code($value=false)
    {
        if ($value === false) {
            return false;
        }
        if (array_key_exists($value,$this->webservice_code )) {
            return $this->webservice_code[$value];
        }
        else{
            return $value;
        }
    }

    protected function fp($action,$argv){
        $flag = 0; 
        $params = '';
        //构造要post的字符串 
        foreach ($argv as $key=>$value) { 
            if ($flag!=0) {
               $params .= "&"; 
               $flag = 1; 
           } 
           $params.= $key."="; 
           $params.= urlencode($value); 
           $flag = 1; 
        } 

        $length = strlen($params); 
        //创建socket连接 
        $fp = fsockopen("sdk.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
        //构造post请求的头 
        $header = "POST ".$action." HTTP/1.1\r\n"; 
        $header .= "Host:sdk.entinfo.cn\r\n"; 
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
        $header .= "Content-Length: ".$length."\r\n"; 
        $header .= "Connection: Close\r\n\r\n"; 
        //添加post的字符串 
        $header .= $params."\r\n"; 
        //发送post的数据 
        fputs($fp,$header); 
        $inheader = 1; 
        while (!feof($fp)) { 
        //去除请求包的头只显示页面的返回数据 
            $line = fgets($fp,1024); 
            if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                $inheader = 0; 
            } 
            if ($inheader == 0) { 
                // echo $line; 
            } 
        } 
        //<string xmlns="http://tempuri.org/">-5</string>
        $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
        $line=str_replace("</string>","",$line);
        return trim($line);
    }

    public function register(){
        //参考代码：iconv( "UTF-8", "gb2312//IGNORE" ,"你好，测试短信")
        // TODO 必填
        $argv = array( 
            //提供的账号
            'sn'        => MSMR, 
            //此处密码为6位明文，但有的方法需要加密 加密方式为 md5(sn+password) 32位大写，具体的请参考接口说明。
            'pwd'       => MSMP, 
            //需要您填自己的省份
            'province'  => iconv("UTF-8","gb2312//IGNORE",''),
            //需要您填自己的市
            'city'      => iconv("UTF-8","gb2312//IGNORE",''),
            //请填您的行业
            'trade'     => iconv("UTF-8","gb2312//IGNORE",''),
            //您的企业名称
            'entname'   => iconv("UTF-8","gb2312//IGNORE",''),
            //联系人姓名
            'linkman'   => iconv("UTF-8","gb2312//IGNORE",''),
            //联系电话（座机）
            'phone'     => '',
            //手机
            'mobile'    => '',
            //邮箱地址
            'email'     => '',
            //传真
            'fax'       => '',
            //所在地址
            'address'   => iconv("UTF-8","gb2312//IGNORE",''),
            //邮编
            'postcode'  => '200120',
            //企业签名，如果没有可不填
            'sign'      => '',
        ); 

        $line = $this->fp('/webservice.asmx/Register',$argv);

        $result=explode(" ",$line);
        return $result;
        // if  ( $result[0]=="0")
        //     echo "注册成功！";
        // if ($result[0]=="-1")
        //     echo "重复注册";

        //print_r( $result);
        // if(count($result)>1)
        //echo '发送失败返回值为:'.$line;
        //else
        //echo '发送成功 返回值为:'.$line;
    }

    // 注销
    public function unregister()
    {

    }

    public function send($phone,$msg){

        //要post的数据 
        $argv = array( 
            'sn'        => MSMR, 
        //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
            'pwd'       => strtoupper(md5(MSMR.MSMP)), 
        //手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
            'mobile'    => $phone,
        //短信内容
            'content'   => iconv("UTF-8","gb2312//IGNORE",$msg.'【星投资】'),
            'ext'       => '',     
        //定时时间 格式为2011-6-29 11:09:21
            'stime'     => '',
            'rrid'      => 's12'
        );

        $line = $this->fp('/webservice.asmx/mt',$argv);
        // return $line;
        $result=explode(" ",$line);
        return $result;
        // echo $line."-------------";
        // if(count($result)>1)
        // echo '发送失败返回值为:'.$line.'。请查看webservice返回值对照表';
        // else
        // echo '发送成功 返回值为:'.$line;  
    }


}
