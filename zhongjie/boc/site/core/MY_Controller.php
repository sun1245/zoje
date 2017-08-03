<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* MY Controller
*/
class MY_Controller extends CI_Controller{

	function __construct(){
		parent::__construct();

		// 默认加载同名数据模型
		// 在前端作用不大，主要还是自己手动加载modle
		if (file_exists(APPPATH.'models/'.$this->router->class.'_model.php') or file_exists(ROOT.'models/'.$this->router->class.'_model.php')) {
			$this->load->model($this->router->class.'_model','model');
		}
		$this->load->model('columns_model','mcol');
		$this->load->model('configs_model','mcfg');
		$this->load->model('coltypes_model','mtypes');

		// 企业文化分类
		$where = array('fid'=>0,'cid'=>9);
		$this->db->order_by('sort_id','asc');
		$typelist = $this->mtypes->get_all($where);
		$this->typelist=$typelist;
	}

	// 对默认控制器无方法时的模板查询 for index
	public function _remap($method, $params= array()){
		if (method_exists($this, $method)){
			return call_user_func_array(array($this, $method), $params);
		}else{
			return call_user_func_array(array($this, "router"), $params);
		}
	}

	// 默认处理入口
	protected function router(){
		$this->load->library('pagination');

		$vdata = array();
		$vdata['CI'] =& $this;
		$vdata['orders'] = array();
		$vdata['where'] = array();
		// $vdata['site'] = $this->mcfg->get_cate('site');
		// $vdata['cols'] = $this->mcol->get_cols(0);

		// 标题后缀
		$this->config->set_item('title_suffix', get_config_site('site','title_suffix'));

		// 获取所有参数
		$uri = array_values($this->uri->segment_array());
		$uri_count = $this->uri->total_segments();

		// 检测栏目存在与否
		// 存在则检测栏目设定的模板
		// 不存在则单纯加载存在模板否则404

		// 数字之后皆为参数，所以数字不可以作为栏目名称
		// 参数容器
		$reg = array();
		// 数字的位置
		$num_index = 0;
		foreach ($uri as $i=> $v) {
			if (is_numeric($v)) {
				$num_index = $i;
				break;
			}
		}
		// 缝隙参数和真实地址
		if ($num_index >0) {
			$reg = array_slice($uri,$num_index,$uri_count);
			$uri = array_slice($uri,0,$num_index);
		}

		if ($uri_count) {
			// 假定文件
			$view_file = implode('/',$uri).EXT;
		}else{
			// 针对首页
			$view_file = "welcome.php";
			$uri[0] = '';
		}

		$vdata['uri'] = $uri;
		$vdata['reg'] = $reg;
		$vdata['url_base'] = implode('/',$uri);

		$breadcrumb = array();

		// 对最后个参数进行 栏目_动作 分析
		if (strpos(end($uri),'_')) {
			$tmp = explode('_', end($uri));
			// 为ajax和json去除缓存
			if (end($tmp) == "ajax" or end($tmp) == "json") {
				$this->cache=false;
				// array_pop($uri);
				// array_push($uri,$tmp[0]);
			}
			unset($tmp);
		}

		// info 页面开关
		$info = false;

		foreach ($uri as $i => $u) {
			if ($i == 0) {
				$pid = 0;
			}else{
				if (isset($c)) {
					$pid = $c['id'];
				}else{
					break;
				}
			}
			$c = $this->mcol->get_col_identify($u,$pid);
			if (!$c) {
				$info = true;
				// $breadcrumb = false;
				break;
			}
			array_push($breadcrumb, $c);
		}

		$vdata['header'] =array(
			'title'=> get_config_site('site','title_seo')
			// ,'title_seo'=> get_config_site('site','title_seo')
			,'tags'=> get_config_site('site','tags')
			,'intro' => get_config_site('site','intro')
			,'copyright' => get_config_site('site','copyright')
			,'email' => get_config_site('site','email')
			,'icp' => get_config_site('site','icp')
			);

		// 关于面包削,存在是即栏目存在，自动读取栏目的seo标题
		if ($breadcrumb) {
			dump($breadcrumb,'[route][breadcrumb]路由模式');
			$vdata['breadcrumb'] = $breadcrumb;
			$last = end($breadcrumb);

			$last = $this->mcol->get_one(array('id'=>$last['id']));

			$vdata['header']['title'] = $last['title_seo'] ? $last['title_seo']: $last['title'];
			if ($last['tags']) {
				$vdata['header']['tags'] = $last['tags'];
			}
			if ($last['intro']) {
				$vdata['header']['intro'] = $last['intro'];
			}
			dump($vdata['header'],'[route][header]SEO信息:');
			// 设定模板存在时
			if ($info) {
				if (!file_exists(VIEWS.$view_file) and $last['temp_show'] != '' and file_exists(VIEWS.$last['temp_show'])){
					$view_file =  $last['temp_show'];
					dump($view_file,'[route][temp_show]模版');
				}
			}else{
				if ($last['temp_index'] != '' and file_exists(VIEWS.$last['temp_index'])) {
					$view_file =  $last['temp_index'];
					dump($view_file,'[route][temp_index]模版');
				}
			}

			// 输出 $c; $where
			$vdata['c'] = $last['id'];
			dump($vdata['c'] 			,'[route][c]寻找的CID:');
			// $vdata['where'] = array_merge($vdata['where'],array('cid' => $last['id'],'audit'=>1));
		}else{
			dump($view_file,'[route]模版模式模版');
		}

		// 路由获取
		dump($vdata['uri'] 			,'[route][uri]默认路由:');
		dump($vdata['reg'] 			,'[route][reg]参数：');
		dump($vdata['url_base'] 	,'[route][url_base]基本路径:');

		if (file_exists(VIEWS.$view_file)) {
			// CI, reg , header, base_url
			$this->load->view($view_file,$vdata);
		}else{
			dump($view_file,'[route][view_file]没有找到模版','error');
			show_404();
		}

	}

	// 验证码
	public function captcha_verify($str='')
	{
		$this->load->library('captcha');
		if($this->captchas_verify = $this->captcha->verify($str)){
			return true;
		}else{
			$this->form_validation->set_message('captcha_verify', '验证码 输入错误.');
			return false;
		}
	}

	// 验证码
	public function hashf_verify($str='')
	{
		if (!$this->session->flashdata('f_hashf')) {
			$this->form_validation->set_message('hashf_verify', '表单已经失效');
			return false;
		}

		if($str == $this->session->flashdata('f_hashf')){
			return true;
		}else{
			$this->form_validation->set_message('hashf_verify', '表单已经失效');
			return false;
		}
	}

}
