<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( !function_exists('page_config')) {
	/**
	 * 分页配置 for CI
	 * @param per 显示数目
	 * @param row 总数
	 * @param url 地址
	 * @param uri int page所在uri位置
	 **/
	function page_config($per=0,$rows=0,$url="",$uri=3){
		$config['base_url'] = $url;
		$config['total_rows'] = $rows;
		$config['per_page'] = $per;
		if ($uri != 3) {
			$config['uri_segment'] = $uri;
		}
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '末页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['use_point'] = TRUE;
		return $config;
	}

	// 前端使用，不用ul了
	function page_config_site($per=0,$rows=0,$url="",$uri=3){
		// ajax html
		$CI =& get_instance();
		if($CI->config->item('url_suffix')!=""){
			$config['suffix'] = $CI->config->item('url_suffix');
		}
		if(strpos($url,'.html')){
			$url = substr($url,0,strpos($url,'.html'));
		}
		// ajax html

		$config['base_url'] = $url;
		$config['total_rows'] = $rows;
		$config['per_page'] = $per;
		if ($uri != 3) {
			$config['uri_segment'] = $uri;
		}
		$config['use_page_numbers'] = TRUE;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link'] = '首页';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$config['last_link'] = '末页';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '';
		$config['prev_tag_close'] = '';
		$config['next_link'] = '下一页';
		$config['next_tag_open'] = '';
		$config['next_tag_close'] = '';
		$config['num_tag_open'] = '';
		$config['num_tag_close'] = '';
		$config['cur_tag_open'] = '<a class="active" href="#">';
		$config['cur_tag_close'] = '</a>';
		$config['use_point'] = TRUE;
		return $config;
	}

	// 分页 for 前端
	function _pages($url,$per_page=-1,$cont=false,$uri=3){
		$CI =& get_instance();
		if (!$per_page < 0) {
			$per_page = $this->page_limit;
		}
		$CI->pagination->initialize(page_config_site($per_page,$cont,$url,$uri));
		return $CI->pagination->create_links();
	}
}

if ( ! function_exists('tag_span_color')) {
	/**
	 * 分割tags style
	 * @param $tags String
     * @return string
	 **/
	function tag_span_color($tags){
		$t=explode(',',$tags);
		$str = '';
		foreach($t as $v){
			$str .= "<span class='label' style='color:#fafafa;background-color:#".rand(100,999).";'>".$v."</span> ";
		}
		return $str;
	}
}

if (!function_exists('static_file')) {
	// TODO:BUG 当远程分离的时候，可能并不在同一个主机上，修改验证文件方式。
	/**
	 * @brief 加载js/css 判断是否加载 .min. 文件
	 *
	 * @param $file
	 * @param bool $rurl false ,值为true,1返回为地址，非html
	 * 当为css规则 screen,print 是为link修改media值
	 * 非js/css自动返回路径
	 *
	 * @return false or html code
	 */
	function static_file($file,$rurl=false){

		if (!$file) {
			return FALSE;
		}

		$type = false;
		if (strrpos($file,'.js')) {
			$filemin = str_replace('.js','.min.js',$file);
			$type = 'js/';
		}else if(strrpos($file,'.css')){
			$filemin = str_replace('.css','.min.css',$file);
			$type = 'css/';
		}

		$url = false;

		if (is_file(STATIC_PATH.$file)) {
			$url = STATIC_URL.$file;
		}

		if ($type != false) {
			if (file_exists(STATIC_PATH.$type.$file)) {
				$url  = STATIC_URL.$type.$file;
			}
			if (defined('ENVIRONMENT') and ENVIRONMENT != "development" ) {
				if (file_exists(STATIC_PATH.$type.$filemin)) {
					$url = STATIC_URL.$type.$filemin;
				}
				if (!$url and file_exists(STATIC_PATH.$file)) {
					$url = STATIC_URL.$file;
				}
			}
		}

		if (!$url) {
			return '<!-- static file error: '.$file.' findout. --><script>console.error("cont find `'.$file.'`!")</script>';
			// return false;
		}else{
			if ( defined('STATIC_V') and STATIC_V) {
				$url.='?v='.STATIC_V;
			}
			if ( defined('ENVIRONMENT') and ENVIRONMENT == "development" ) {
				//$url.='?t='.time();
			}
		}

		if ($rurl === true or $rurl and  !in_array($rurl,array('screen','print'))) {
			return $url;
		}else{
			if ($type == 'js/') {
				return '<script src="'.$url.'" type="text/javascript" charset="utf-8"></script>';
			}else if($type == 'css/'){
				$media = in_array($rurl,array('screen','print'))? $rurl:'screen';
				return '<link rel="stylesheet" href="'.$url.'" type="text/css" media="'.$media.'" charset="utf-8">';
			}else{
				return $url;
			}
		}

	}
}

if (!function_exists('upload_file')) {
	/**
	 * 对upload文件url封装
	 */
	function upload_file($url){
		return UPLOAD_URL.$url;
	}
}

if (!function_exists('uri2get')) {

	/**
	 * @brief 将ci中的 uri参数提交为类GET的以键值p开头的变量组
	 * @param bool $merge 设定是否添加到 $_GET中
	 * @return array
	 */
	function uri2get($merge=false){
		$CI =& get_instance();
		$uri = $CI->uri->rsegment_array();
		array_shift($uri);
		array_shift($uri);
		$arr = false;
		if ($uri) {
			foreach($uri as $k=>$u){
				// p 意为 params
				$arr['p'.$k] = $u;
			}
			if ($merge) {
				$_GET = array_merge($_GET,$arr);
			}
		}
		return $arr;
	}
}

if (! function_exists('get_ip')) {
	/**
	 * Get IP 获得IP地址
	 *
	 * @access	protected
	 * @return	string
	 */
	function get_ip()
	{
		$cip = (isset($_SERVER['HTTP_CLIENT_IP']) AND $_SERVER['HTTP_CLIENT_IP'] != "") ? $_SERVER['HTTP_CLIENT_IP'] : FALSE;
		$rip = (isset($_SERVER['REMOTE_ADDR']) AND $_SERVER['REMOTE_ADDR'] != "") ? $_SERVER['REMOTE_ADDR'] : FALSE;
		$fip = (isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND $_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : FALSE;

		if ($cip && $rip)	$IP = $cip;
		elseif ($rip)		$IP = $rip;
		elseif ($cip)		$IP = $cip;
		elseif ($fip)		$IP = $fip;

		if (strpos($IP, ',') !== FALSE)
		{
			$x = explode(',', $IP);
			$IP = end($x);
		}

		if ( ! preg_match( "/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $IP))
		{
			$IP = '0.0.0.0';
		}

		unset($cip);
		unset($rip);
		unset($fip);

		return $IP;
	}
}

if (!function_exists('get_adress')) {
	/**
	 * 从百度获得物理地址
	 * @param  string $ip ip地址
	 * @return array     百度原始数据
	 */
	function get_adress($ip='')
	{
		if (!$ip or ! preg_match( "/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/", $ip)) {
			return false;
		}

		# 百度获得
		# http://developer.baidu.com/map/ip-location-api.htm
		# 申请 `ak` 并替换下面的`ak`
		$url = 'http://api.map.baidu.com/location/ip?ak=F454f8a5efe5e577997931cc01de3974&ip='.$ip.'&coor=bd09ll';
		return json_decode(file_get_contents($url),TRUE);
	}

	/**
	 * @brief 获取IP地理位置
	 * 淘宝
	 * @param $ip IP地址
	 * @return array
	 */
	function get_adress_tb($ip)
	{
		$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
		$ip=json_decode(file_get_contents($url),TRUE);
		if((string)$ip['code']=='1'){
			return false;
		}
		$data = (array)$ip['data'];
		return $data;
	}

	// 新浪
	function get_adress_sina($ip){
		$url='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip;
		$data = json_decode(file_get_contents($url),TRUE);
		if(!empty($data)){
			return $data;
		}else{
			return $ip;
		}
	}
}

if (!function_exists('get_weather')) {
	function get_weather($code='101010100'){
        // $this->load->library('Curl') ;
        // $weather = $this->curl->simple_get('http://www.weather.com.cn/data/cityinfo/101010100.html');
		return file_get_contents('http://www.weather.com.cn/data/cityinfo/'.$code.'.html');
        // $weather = json_decode(file_get_contents('http://www.weather.com.cn/data/cityinfo/101010100.html'),TRUE);
        // return $weather;
	}
}

if (!function_exists('object2array')) {
	/**
	* @brief Object TO array
	* 用户 json_decode 转换的object
	* PHP 5.3 json_decode($json,true)
	*
	* @param $object
	*
	* @return $array
	*/
	function object2array($array)
	{
		if(is_object($array))
		{
			$array = (array)$array;
		}
		if(is_array($array))
		{
			foreach($array as $key=>$value)
			{
				$array[$key] = object2array($value);
			}
		}
		return $array;
	}
}

if (!function_exists('get_QR')) {
    /**
     * google api 二维码生成
     * QRcode可以存储最多4296个字母数字类型的任意文本，具体可以查看二维码数据格式
     * @param string $chl 二维码包含的信息
     * 可以是数字、字符、二进制信息、汉字。不能混合数据类型，数据必须经过UTF-8 URL-encoded.如果需要传递的信息超过2K个字节，请使用POST方式
     * @param int $widhtHeight 生成二维码的尺寸设置
     * @param string $EC_level 可选纠错级别，QR码支持四个等级纠错，用来恢复丢失的、读错的、模糊的、数据。
     * 						   L-默认：可以识别已损失的7%的数据
     * 						   M-可以识别已损失15%的数据
     * 						   Q-可以识别已损失25%的数据
     * 						   H-可以识别已损失30%的数据
     * @param int $margin 生成的二维码离图片边框的距离
     */
    function get_QR($chl,$widhtHeight ='150',$EC_level='L',$margin='0')
    {
    	$chl = urlencode($chl);
    	echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" alt="QR code" widhtHeight="'.$widhtHeight.'" widhtHeight="'.$widhtHeight.'" class="box-shadow"/> ';
    }
}

if (!function_exists('is_ajax()')) {
    /**
     * 判定请求是否为ajax ,判定输入头
     * @return	boolean
     */
    function is_ajax(){
    	return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
    }
}

if (!function_exists('is_post()')) {
	// 判定请求是否为post
	function is_post(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

if (!function_exists('is_get()')) {
	// 判定请求时否为get
	function is_get(){
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

/**
 * @brief json数据输出
 * @param $data array
 * @return echo
 */
/**
 * 格式化数据为json结构体
 * @param  array|object $data
 * @return string/json
 */
function json_echo($data)
{
	header('Vary: Accept');
	if (isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
		header('Content-type: application/json');
	} else {
		header('Content-type: text/plain');
	}
	// header('Content-type: application/json');
	if (is_array($data)) {
		echo json_encode($data);
	}else{
		echo $data;
	}
}


/**
 * @brief 加密密码 连接 HMAC 字符串后 md5 加密
 * @param $pwd string 明文密码
 * @return 单向加密字符串
 */
function passwd($pwd)
{
	return md5($pwd.HMACPWD);
}

/**
 * 输出以 timeline 为基准的 加密字段
 */
function token($timeline)
{
	return md5($timeline.HMAC);
}

// for debug
function logfile($str,$log='debug')
{
	$log.=date("Ymd");
	$logfile=fopen(ROOT.'logs/'.$log.'.log',"a+");
	if (is_array($str)) {
		$str = print_r($str,TRUE);
	}
	fwrite($logfile,"\r\n [".date("Y-m-d H:i:s",time())."] ".$str);
	fclose($logfile);
	// echo $str."<br/>";
}

/**
 * 邮件发送（修正乱码问题）
 * @param  [type] $mail [description]
 * @return [type]       [description]
 */
function smtp_sendmail($mail){

	$subject = $mail['subject'];
	$message = $mail['message'];
	$to = $mail['to'];  // array or ,

	$CI =& get_instance();
	$CI->load->library('email');
	$config['protocol'] = 'smtp';
	// $config['mailpath'] = '/usr/sbin/sendmail';
	$config['smtp_host']  = $CI->mcfg->get('email','stmp');
	$config['smtp_user']  = $CI->mcfg->get('email','account');
	$config['smtp_name']  = $CI->mcfg->get('email','name');
	$config['smtp_pass']  = $CI->mcfg->get('email','pwd');
	$config['smtp_port']  = $CI->mcfg->get('email','port');
	$config['charset'] = 'utf-8';//'iso-8859-1';
	$config["validate"] = true;
	$config["priority"] = 1;
	$config['crlf'] = "\r\n";
	$config['newline'] = "\r\n";
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);
	$CI->email->from($config['smtp_user'], $config['smtp_name']);
	$CI->email->to($to);
	$CI->email->subject($subject);
	$CI->email->message($message);
	$CI->email->send();
	// var_dump($CI->email->print_debugger());
}

// 随机
function rand_str($length = 4, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890')
{
	$chars_length = (strlen($chars) - 1);
	$string = $chars{rand(0, $chars_length)};
	for ($i = 1; $i < $length; $i = strlen($string))
	{
		$r = $chars{rand(0, $chars_length)};
		if ($r != $string{$i - 1}) $string .=  $r;
	}
	return $string;
}

// 浏览器判定
function userBrowser(){
	$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($user_OSagent,"Maxthon") && strpos($user_OSagent,"MSIE")) {
		$visitor_browser ="Maxthon(Microsoft IE)";
	}elseif(strpos($user_OSagent,"Maxthon 2.0")) {
		$visitor_browser ="Maxthon 2.0";
	}elseif(strpos($user_OSagent,"Maxthon")) {
		$visitor_browser ="Maxthon";
	}elseif(strpos($user_OSagent,"MSIE 11.0")) {
		$visitor_browser ="MSIE 11.0";
	}elseif(strpos($user_OSagent,"MSIE 10.0")) {
		$visitor_browser ="MSIE 10.0";
	}elseif(strpos($user_OSagent,"MSIE 9.0")) {
		$visitor_browser ="MSIE 9.0";
	}elseif(strpos($user_OSagent,"MSIE 8.0")) {
		$visitor_browser ="MSIE 8.0";
	}elseif(strpos($user_OSagent,"MSIE 7.0")) {
		$visitor_browser ="MSIE 7.0";
	}elseif(strpos($user_OSagent,"MSIE 6.0")) {
		$visitor_browser ="MSIE 6.0";
	}elseif(strpos($user_OSagent,"MSIE 5.5")) {
		$visitor_browser ="MSIE 5.5";
	}elseif(strpos($user_OSagent,"MSIE 5.0")) {
		$visitor_browser ="MSIE 5.0";
	}elseif(strpos($user_OSagent,"MSIE 4.01")) {
		$visitor_browser ="MSIE 4.01";
	}elseif(strpos($user_OSagent,"MSIE")) {
		$visitor_browser ="MSIE top";
	}elseif(strpos($user_OSagent,"NetCaptor")) {
		$visitor_browser ="NetCaptor";
	}elseif(strpos($user_OSagent,"Netscape")) {
		$visitor_browser ="Netscape";
	}elseif(strpos($user_OSagent,"Chrome")) {
		$visitor_browser ="Chrome";
	}elseif(strpos($user_OSagent,"Lynx")) {
		$visitor_browser ="Lynx";
	}elseif(strpos($user_OSagent,"Opera")) {
		$visitor_browser ="Opera";
	}elseif(strpos($user_OSagent,"Konqueror")) {
		$visitor_browser ="Konqueror";
	}elseif(strpos($user_OSagent,"Mozilla/5.0")) {
		$visitor_browser ="Mozilla";
	}elseif(strpos($user_OSagent,"Firefox")) {
		$visitor_browser ="Firefox";
	}elseif(strpos($user_OSagent,"U")) {
		$visitor_browser ="Firefox";
	}else {
		$visitor_browser ="other";
	}
	return $visitor_browser;
}

// 小于 IE 9
function ielt9()
{
	$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
	if (strpos($user_OSagent,"MSIE 8.0") OR strpos($user_OSagent,"MSIE 7.0") OR strpos($user_OSagent,"MSIE 6.0") ) {
		return TRUE;
	}else{
		return FALSE;
	}
}

if (!function_exists('dump')) {
	// 调试输出
	//
	/**
	 * 利用FirePHP调试
	 * http://pan.baidu.com/s/1jGkRmcQ
	 * @param  alltype $val     输出内容
	 * @param  string $label   标题标志 (注：为ajax时候表示异步时候调试打开)
	 * @param  string $do      Fire PHP的方法 默认log,info,warn,table,error
	 * @param  array  $options 其他参数
	 * @return noting
	 */
	function dump($val,$label=null,$do='info',$options = array()){
		if (ENVIRONMENT == 'development' OR ENVIRONMENT == 'testing') {
			if (is_ajax() AND $label == "ajax") {
				print_r($val);
				return TRUE;
			}

			$CI =& get_instance();
			if (!isset($CI->firephp)) {
				$CI->load->library('FirePHP');
				$CI->firephp->setOptions(array(
					'includeLineNumbers' => false
					));
			}
			switch ($do) {
				case 'log':
				$CI->firephp->log($val,$label,$options);
				break;
				case 'info':
				$CI->firephp->info($val,$label,$options);
				break;
				case 'warn':
				$CI->firephp->warn($val,$label,$options);
				break;
				case 'error':
				$CI->firephp->error($val,$label,$options);
				break;
				case 'table':
				$CI->firephp->table($label,$val,$options);
				break;
				case 'trace':
				$CI->firephp->trace($label);
				break;
				default:
				$CI->firephp->log($val,$label,$options);
				break;
			}
			// 关闭
			// $this->firephp->setEnabled(FALSE);
		}
		return TRUE;
	}
}

if (!function_exists('page_profiler')) {
// 查看性能信息
	function page_profiler(){
		if (!isset($CI)) {
			$CI =& get_instance();
		}
		if (!isset($CI->firephp)) {
			$CI->load->library('profiler');
		}
		return $CI->profiler->run();
	}
}

if (!function_exists('page_profiler')) {
/**
 * 查询数组对象中某个字段的值存在
 * @param  [type] $key   查询键
 * @param  [type] $value 查询值
 * @param  [type] $array 数组
 * @return [type]        符合对象的第一个
 */
function find_in_map($key,$value,$array) {
	foreach ($array as $k => $v) {
		if ($v[$key] == $value) {
			return $v;
		}
	}
	return false;
}
}


if(!function_exists('tag_dealer'))
{
	function tag_dealer($id,$column='title')
	{
		static $a=array();
		$id=intval($id);
		if(!isset($a[$id])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$id]=$CI->db->get_where('dealer',array('id'=>$id));
			if($a[$id]->num_rows()<1){
				$a[$id]=array();
			}else{
				$a[$id]=$a[$id]->row_array();
			}
		}
		if(isset($a[$id][$column])){
			return $a[$id][$column];
		}
		return '';
	}
}

if(!function_exists('sava_data'))
{
	function sava_data($array){
		$CI=&get_instance();
		$count =0;
		$total =0;
		$regtime=time();
		foreach($array as $tmp){
			$Isql = "select id from boc_users where username ='".$tmp[1]."'";
			$info  = $CI->db->query($Isql)->row_array();

			if($info){
				$arr_add=array(
					'username'=>$tmp[1],
					'nickname'=>$tmp[2],
					'password'=>md5($tmp[3]),
					'email'=>$tmp[4],
					'timeline'=>$regtime,
					'audit'=>1,
					);
				$CI->db->update('boc_users',$arr_add,array('id'=>$info['id']));
				$count++;
			}else{
				$Isql = "select * from boc_users order by sort_id desc limit 1";
				$sort_id  = $CI->db->query($Isql)->row_array();
				$sort_ids = intval($sort_id['sort_id']) + 1;
				$arr_add=array(
					'username'=>$tmp[1],
					'nickname'=>$tmp[2],
					'password'=>md5($tmp[3]),
					'email'=>$tmp[4],
					'audit'=>1,
					'sort_id'=>$sort_ids,
					'timeline'=>$regtime,
					);
				$CI->db->insert('users', $arr_add);
				$count++;
			}
			$total++;
		}
		return ;

	}
}

