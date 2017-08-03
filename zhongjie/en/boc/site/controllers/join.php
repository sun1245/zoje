<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class join extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('recruit_model','mrecruit');
}

    public function index()
    {
        // 理念
        $content = tag_single(11);

        // 发展历程
        // 企业荣誉
        // seo
        $data['header']=header_seoinfo(10,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $data['content']=$content;
        $this->load->view('join',$data);
    }

    public function recruit_social()
    {

        $where1 = array('fid'=>0,'cid'=>24);
        $this->db->order_by('sort_id','asc');
        $ctype = $this->mtypes->get_all($where1);
        $data['ctype']=$ctype;
        $this->load->library('pagination');
        $page = $this->uri->segment(3,1);
        $limit = 5;
        $where2 = array();
        $where3 = array();
        $where = array('cid'=>24,'audit'=>1);
        if (!empty($_GET['key'])) {
            $where2 =array();
        }
        if (!empty($_GET['ctype']) && $_GET['ctype'] != 0) {
            $where3 =array('ctype'=>$_GET['ctype']);
        }
        $where = array_merge($where,$where2,$where3);
        $count = $this->mrecruit->get_count_all($where);
        $pages = _pages(site_url('join/recruit_social/'),$limit,$count,3);
        $list = $this->mrecruit->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);
        $data['list']=$list;
        $data['pages']=$pages;
        // seo
        $data['header']=header_seoinfo(10,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('join/recruit_social',$data);
    }

    public function recruit_campus()
    {

        $where1 = array('fid'=>0,'cid'=>25);
        $this->db->order_by('sort_id','asc');
        $ctype = $this->mtypes->get_all($where1);
        $data['ctype']=$ctype;
        $this->load->library('pagination');
        $page = $this->uri->segment(3,1);
        $limit = 5;
        $where2 = array();
        $where3 = array();
        $where = array('cid'=>25,'audit'=>1);
        if (!empty($_GET['key'])) {
            $where2 =array();
        }
        if (!empty($_GET['ctype']) && $_GET['ctype'] != 0) {
            $where3 =array('ctype'=>$_GET['ctype']);
        }
        $where = array_merge($where,$where2,$where3);
        $count = $this->mrecruit->get_count_all($where);
        $pages = _pages(site_url('join/recruit_campus/'),$limit,$count,3);
        $list = $this->mrecruit->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);
        $data['list']=$list;
        $data['pages']=$pages;
        // seo
        $data['header']=header_seoinfo(10,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('join/recruit_campus',$data);
    }
    


}
