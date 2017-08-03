<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl {

	private $CI;
	private $purviews;   // 登录用户的额权限组
	private $url_model;  // 当前模型
	private $url_method; // 当前方法

	public function __construct()
	{
		$this->CI =&get_instance();
		$this->url_model = $this->CI->router->class;
		$this->url_method = $this->CI->router->method;
	}

	// hook
	public function auth(){
		$url_param = urlencode(current_url().'?'.$_SERVER['QUERY_STRING']);
		// 没有 session 时
		if (!$this->CI->session->userdata('gid')) {
			//检测cookie
			if ($this->CI->input->cookie('_rember') and $this->CI->input->cookie('_m') ) {
				if (!$this->_cookie_login()) {
					if ($this->url_model != 'login') {
						if ($this->CI->input->is_ajax_request()) {
							$vdata = array('status'=>0,'msg'=>'您的登陆已经失效，请重新登陆');
							header('HTTP/1.1 500 Internal Server Error');
							json_echo($vdata);
							exit();
							return false;
						}else{
							redirect(site_url('login')."?url=".$url_param);
						}
					}
				}else{
					if ($this->url_model == 'login') {
						$url = $this->CI->input->get('url') ? urldecode($this->CI->input->get('url')):site_url("welcome");
						redirect($url);
					}
				}
			}else{
				
				if ($this->url_model != 'login') {
					// redirect(site_url('login')."?url=".$_SERVER['REQUEST_URI']);
					if ($this->CI->input->is_ajax_request()) {
						$vdata = array('status'=>0,'msg'=>'err:02 您的登陆已经失效，请重新登陆');
						header('HTTP/1.1 500 Internal Server Error');
						json_echo($vdata);
						exit();
						return false;
					}else{
						redirect(site_url('login')."?url=".$url_param);
					}
				}
			}
		}else{ // 已登录

			if ($this->url_model == 'login' and $this->url_method !="logout") {
				$url = $this->CI->input->get('url') ? $this->CI->input->get('url'):"welcome";
				redirect(site_url($url));
			}else if ($this->url_model != 'login' and $this->CI->session->userdata('err_oldpwd') and $this->url_model != 'manager' and $this->url_method !="passwd" ) { 
				// 没有修改密码跳转修改
				redirect(site_url('manager/passwd'));
			}

			// 检测是否有权限，提示添加,未添加到组的权限
			if (!$this->_purview()) {
				$vdata = array('status'=>0,'msg'=>'您并没有权限访问此页面！如需权限，请联系管理员！');
				if ($this->CI->input->is_ajax_request()) {
					// 此处不用 output 因为不会去执行控制器方法
					header('HTTP/1.1 500 Internal Server Error');
					// 使用 ajax error接收
					json_echo($vdata);
					exit();
					return false;
				}else{
					$str =$this->CI->load->view('msg',$vdata,TRUE);
					echo($str);exit();
				}
			}
		}
	}

	// 返回 bool 是否拥有权限
	public function _purview(){

		// 过滤器，过滤控制器
		$nopurview = $this->CI->mcfg->get('adminer','nopurview');

		if (in_array($this->url_model , explode(',', $nopurview))) {
			return TRUE;
		}

		if (!$this->CI->input->get('c')) {
			$pur = md5($this->url_model.'/'.$this->url_method);
		}else{
			$pur = md5($this->url_model.'/'.$this->url_method.'/'.$this->CI->input->get('c'));
		}

		// 过滤没有添加权限的uri
		if (!$this->CI->mpur->get_uri($pur)){
			return TRUE;
		}

		// 过滤disable 不保护的权限
		$uris_disable = $this->CI->mpur->get_disable_list();
		if (in_array($pur,$uris_disable)) {
			return TRUE;
		}

		$group = $this->CI->mmger->get_group($this->CI->session->userdata('gid'));
		if (in_array($pur, explode(',', $group['purview']))) {
			return TRUE;
		}

		if ($this->CI->session->userdata('gid') == 1) {
			return TRUE;
		}
		
		return false;
	}

	// 对 cookie 记住登录的验证
	public function _cookie_login()
	{

		if (is_numeric($this->CI->input->cookie('_m'))) {
			$mid = $this->CI->input->cookie('_m');
		}else{
			return false;
		}

		$info = $this->CI->mmger->get_login($mid);

		if (!$info) {
			return false;
		}

		if ( md5(HMACPWD.$info['uname'].get_ip()) == $this->CI->input->cookie('_rember') ) {

			$session = array(
				"mid" => $mid,
				"uname" => $info['uname'],
				"nickname" => $info['nickname'],
				"login_ip" => get_ip(),
				"gid" => $info['gid']					
				);

			$this->CI->session->set_userdata($session);
			$this->CI->mmger->set_login($mid);

			return true;
		}else{
			false;
		}
	}
}

/* End of file acl.php */
/* Location: .//home/http/bocms/adminer/hooks/acl.php */