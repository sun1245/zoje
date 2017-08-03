<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('lists_model','mlists');
    $this->load->model('gallery_model','mgallery');
}

    public function index()
    {
        // 简介上
        $content1 = tag_single(7);
        $photo1 = tag_single(7,'photo');
        // 简介下
        $content2 = tag_single(8);
        $photo2 = tag_single(8,'photo');

        // 发展历程
        $flist = $this->mlists->get_all(array('cid'=>5,'audit'=>1),'title,content',array('sort_id'=>'ace'));
        // 企业荣誉
        $qlist = $this->mgallery->get_all(array('cid'=>6,'audit'=>1),'title,photo',array('sort_id'=>'desc'));
        // seo
        $data['header']=header_seoinfo(4,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        
        $data['content1']=$content1;
        $data['photo1']=$photo1;
        $data['content2']=$content2;
        $data['photo2']=$photo2;
        $data['flist']=$flist;
        $data['qlist']=$qlist;
        $this->load->view('about',$data);
    }

}
