<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Base Controller
*/
class Base_Controller extends CI_Controller
{

	public $view       = false;
	public $page_limit = 15;      // 首页默认分页数
	protected $rules   = array(); // 表单验证规则
	public $class      = "";      // 类名
	public $method     = "";      // 正在访问的方法名 
	public $model 		= null;
	protected $breadcrumb = array(); // 面包削

	public function __construct()
	{
		parent::__construct();

		// 默认转换 uri 到 $_GET
		uri2get(true);

	 	// class/method 默认类库和函数名取值
		if ($this->class === "") {
			$this->class = strtolower($this->router->class);
		}
		if ($this->method === ""){
			$this->method = strtolower($this->router->method);
		}

		// 默认加载同名数据模型
		if (file_exists(APPPATH.'models/'.$this->class.'_model.php') or file_exists(LIBS_PATH.'models/'.$this->class.'_model.php')) {
			$this->load->model( $this->class.'_model','model');
		}

		// 默认的模板
		if (!$this->view) { 
			$view = $this->class.'_'.$this->method; // 使用下划线连接
			if ( file_exists(APPPATH.'views/'.$view.'.php')) {
				$this->view = $view;
			}
		}
		// 加载语言包
		if (file_exists(APPPATH.'language/'.$this->config->item('language').'/'.$this->class.'_lang.php')) {
			$this->load->language($this->class);
		}

		// 加载全局数据模型
		$this->load->model('log_model','mlogs');
		$this->load->model('configs_model','mcfg');
		$this->load->model('Columns_Model','mcol');
		$this->load->model('manager_model','mmger');
		$this->load->model('manager_purview_model','mpur');
		// $this->load->model('msgs_model','mmsgs');

		// 标题后缀
		$this->config->set_item('title_suffix', $this->mcfg->get('adminer','title_suffix'));
		// $this->config->set_item('msgs_num', $this->mmsgs->get_num($this->session->userdata('mid')));
			
		// 获取全部栏目
		$this->cols_menu = $this->_get_cols();
	}

	/**
	 * @brief 默认在没有对应方法的时候访问模板
	 * @param $method 方法名
	 * @param $params url中对应的参数
	 * @return show or false
	 */
	public function _remap($method, $params= array()){
		$this->_hook();
		if (method_exists($this, $method)){
			return call_user_func_array(array($this, $method), $params);
		}else if($this->view){
			// 默认输出存在的模板
			$this->_display(); 
		}else{
			show_404();
			return null;
		}
	}

	// 在 method 执行之前处理特殊
	protected function _hook(){}

	/**
	 * @brief 显示 方法名对应的模板
	 * @param $data 数据
	 * @return 输出或false
	 */
	protected function _display($vdata = array(),$view=false){
		$view = $view ? $view : $this->view;

		if (!$view) {
			return false;
		}

		$this->_vdata($vdata);

		if (!array_key_exists("title", $vdata)) {
			$vdata['title'] = $this->class;
		}

		// ajax时 不使用外部HTML框架
		if ($this->input->is_ajax_request()) {
			echo $this->load->view('ajax_drag.php','',TRUE);
			echo $this->load->view($view,$vdata,TRUE);
		}else{
			$vdata['breadcrumb'] = $this->breadcrumb;
			$this->load->view('inc_header.php',$vdata);
			$this->load->view($view);
			$this->load->view('inc_footer.php');
		}
	}


	/**
	 * @brief 为 _display 额外的处理输出数据
	 * @param &$vdata 注意为传址数据
	 */
	protected function _vdata(&$vdata)
	{
		// 判定 method 条件
	}
	
	/**
	 * @brief 分页
	 * @param $url string 输出地址
	 * @param $per_page int 每页个数
	 * @param $where array/string 查询条件
	 * @param $uri int page 所在参数位置
	 * @return 
	 */
	protected function _pages($url,$per_page=-1,$where=false,$uri=3){
		if (!$per_page < 0) {
			$per_page = $this->page_limit;
		}
		$this->load->library('pagination');
		$this->pagination->initialize(page_config($per_page,$this->model->get_count_all($where),$url,$uri));
		return $this->pagination->create_links();
	}

	protected function _get_cols($fid = 0){
		$cols = $this->mcol->get_cols($fid);
		foreach ($cols as $k => $v) {
			if ($v['more'] > 0) {
				$cols[$k]['more'] = $this->_get_cols($v['cid']);
			}
		}
		return $cols;
	}

}
