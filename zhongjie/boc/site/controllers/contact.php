<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('dealer_model','mdealer');
    $this->load->model('gallery_model','mgallery');
}

    public function index()
    {
        // 理念
        $content = tag_single(16);
        $photo = tag_single(16,'photo');
        $content1 = tag_single(17);
        $photo1 = tag_single(17,'photo');
        $list = $this->mdealer->get_all(array('cid'=>18,'audit'=>1),'title,lal,telphone,address',array('sort_id'=>'desc'));

        // 发展历程
        // 企业荣誉
        // seo
        $data['header']=header_seoinfo(13,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $data['content']=$content;
        $data['content1']=$content1;
        $data['photo']=$photo;
        $data['photo1']=$photo1;
        $data['list']=$list;
        $this->load->view('contact',$data);
    }

    public function contacd()
    {
        // 理念
        $content = tag_single(19);
        $photo = tag_single(19,'photo');


        $data['content']=$content;
        $data['photo']=$photo;
        // seo
        $data['header']=header_seoinfo(10,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('contact/contacd',$data);
    }

    public function service()
    {
        // 理念
        $content = tag_single(20);
        $data['content']=$content;
        // seo
        $data['header']=header_seoinfo(20,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('contact/service',$data);
    }

    public function partner()
    {
        // 理念
        $list = $this->mgallery->get_all(array('cid'=>21,'audit'=>1),'title,photo',array('sort_id'=>'desc'));
        $data['list']=$list;
        // seo
        $data['header']=header_seoinfo(10,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('contact/partner',$data);
    }
    


}
