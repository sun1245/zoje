<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('product_model','mproduct');
}

    public function index()
    {
        // 理念
        $ctype = $this->uri->segment(3,0);

        $data['ctype']=$ctype;
        $nlist = $this->mproduct->get_list(3,0,array('sort_id'=>'desc'),array('flag'=>1,'cid'=>23,'audit'=>1),'link,photo,id,title,content');
        $data['nlist']=$nlist;
        // seo

        $data['header']=header_seoinfo(23,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('product',$data);
    }

    public function pro()
    {
        // 理念
        $this->load->library('pagination');
        $ctype = $this->uri->segment(3,0);
        $page = $this->uri->segment(4,1);
        $limit = 8;
        if($ctype == 0){
            $where = array('cid'=>23,'audit'=>1);
        }else{
            $where = array('cid'=>23,'audit'=>1,'ctype'=>$ctype);
        }
        $count = $this->mproduct->get_count_all($where);
        $pages = _pages(site_url('product/pro/'.$ctype.'/'),$limit,$count,4);
        $list = $this->mproduct->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);
        $data['list']=$list;
        $data['pages']=$pages;
        // seo
        $data['header']=header_seoinfo(23,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('pro',$data);
    }
    


}
