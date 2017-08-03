<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Page extends CI_Controller
 * @author 单页
 */
class Page extends Modules_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('Upload_model','mupload');
	}

	public function index($cid = false)
	{
		if ($cid ===false) {
			$cid = $this->cid;
		}

		$vdata = array();

		// 栏目路径
		$vdata['cpath']= $this->mcol->get_path_more($this->cid);
		$vdata['cchildren'] = $this->mcol->get_cols($this->cid);
		$title = $this->mcol->get_one($this->cid,"title");
		$vdata['title'] = $title['title'];

		// 获取栏目seo
		$it = $this->model->get_one(array('cid'=>$cid));

		if (!$it) {
			// 没有则创建
			if ($id = $this->model->create(array('cid'=>$cid))) {
				$vdata['it'] = $this->model->get_one($id);
			}else{
				$this->load->view('msg',array("status"=>0,"msg"=>"错误！请联系管理员"));
			}
		}else{
			$vdata['it'] = $it;
		}

		$this->_vdata($vdata);

		$this->load->view('inc_header.php',$vdata);
		$this->load->view('page_edit.php');
		$this->load->view('inc_footer.php');
	}

	// 去除插入
	public function create()
	{
		show_404();
	}

	public function _vdata(&$vdata){
		$vdata['cpath']= $this->mcol->get_path_more($this->cid);
		$title = $this->mcol->get_one($this->cid,"title");
		$vdata['title'] = $title['title'];

		// 对图片字段的操作
		$tmp = $this->mupload->get_in(explode(',', $vdata['it']['photo']));
		$vdata['ps'] = $tmp;

		return $vdata;
	}

	// 删除条目时删除文件
	protected function _rm_file($ids)
	{
		$fids= array();
		if (is_numeric($ids)) {
			$tmp = $this->model->get_one($ids,'photo');
			$fids = explode(',',$tmp['photo']);
		}else if(is_array($ids)){
			// 使用 字符串where时
			$tmp = $this->model->get_all("`id` in (".implode(',', $ids).")",'photo');
			foreach ($tmp as $key => $v) {
				$fids += explode(',', $v['photo']);
			}
		}
		unlink_upload($fids);
	}
}

