<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
    	$this->load->model('banners_model','mbanners');
    	$this->load->model('article_model','marticle');
	}

	public function index()
	{
		// banner
        $list = $this->mbanners->get_all(array('cid'=>27,'audit'=>1),'*',array('sort_id'=>'desc'));
		$data['list']= $list;
        $nlist = $this->marticle->get_list(3,0,array('sort_id'=>'desc'),array('flag'=>1,'cid'=>2,'audit'=>1),'timeline,photo,id,title,content');
		$data['nlist']= $nlist;
    	// seo
		$data['header']=header_seoinfo(0,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
		$this->load->view('welcome',$data);
	}


}
