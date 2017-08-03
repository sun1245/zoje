<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends MY_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('webmodels_model','mwebmodels');
    $this->load->model('news_model','mnews');
    $this->load->helpers('uisite_helper');
}

public function index()
{
    $mdinfo = $this->mwebmodels->get_one(array('mid'=>1),'type_id');
    $type_id=$mdinfo['type_id'];

    $where = array('cid'=>8,'audit'=>1);

    if ($type_id==1) {
        // 模版1的推荐
        $tuijian = $this->mnews->get_one(array('cid'=>8,'audit'=>1,'flag'=>1),'id,title,photo,content,timeline');
        $data['tuijian']=$tuijian;
    } elseif($type_id==6) {
        // 模版6的推荐
        $tuijianlist = $this->mnews->get_all_limit(array('cid'=>8,'audit'=>1,'flag'=>1),'id,title,photo,content,timeline',3,'sort_id desc');
        $data['tuijianlist']=$tuijianlist;
    }


    $this->load->library('pagination');
    $page = $this->uri->segment(3,1);
    $limit = 5;

    if ($type_id==1) {
        if (!empty($tuijian)) {
            $where2 = array('not_in id' => array('id',$tuijian['id']));
            $where=array_merge($where,$where2);
        }

    } elseif($type_id==6) {
        if (!empty($tuijianlist)) {
           $a_tj=array();
           $where2=array();
           foreach ($tuijianlist as $t) {
               array_push($a_tj, $t['id']);
           }
           if (!empty($a_tj)) {
                $where2 = array('not_in id' => array('id',$a_tj));
            }
           $where=array_merge($where,$where2);
        }
    }

    $count = $this->mnews->get_count_all($where);
    $pages = _pages(site_url('news/index/'),$limit,$count,3);
    $list = $this->mnews->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);
    // seo
    $data['header']=header_seoinfo(8,0);
    $data['list']=$list;
    $data['pages']=$pages;
    $data['type_id']=$type_id;
    $this->load->view('news',$data);

    // $strhtml=$this->output->get_output();
    // $this->load->helpers('file');
    // write_file(ROOT.'news.html',$strhtml);
}


public function index_ctype()
{
    $mdinfo = $this->mwebmodels->get_one(array('mid'=>1),'type_id');
    $type_id=$mdinfo['type_id'];

    $this->load->library('pagination');
    $ctype = $this->uri->segment(3,1);
    $page = $this->uri->segment(4,1);
    $limit = 5;
    $where = array('cid'=>8,'audit'=>1,'ctype'=>$ctype);
    $count = $this->mnews->get_count_all($where);
    $pages = _pages(site_url('news/index_ctype/'.$ctype.'/'),$limit,$count,4);
    $list = $this->mnews->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);

    // seo
    $data['header']=header_seoinfo(8,$ctype);

    $data['list']=$list;
    $data['pages']=$pages;
    $data['type_id']=$type_id;

    $this->load->view('news',$data);

}


public function info()
{
    $id = $this->uri->segment(3,0);

    $htmlfilepath=HTML_PATH.'newsinfo-'.$id.'.html';
    $htmlfileurl=HTML_URL.'newsinfo-'.$id.'.html';;
    if (file_exists($htmlfilepath)) {
        redirect($htmlfileurl,'refresh');
    }

    if ($id) {
        $rs=$this->mnews->get_one_pn($id); 
    } else {
        redirect('news');
    }

    $data['rs']=$rs;
    $this->load->view('news/info',$data);


    $strhtml=$this->output->get_output();
    $this->load->helpers('file');
    write_file('html/newsinfo-'.$id.'.html',$strhtml);


}


public function modelajax()
{
    $page=$this->input->get('page');
    // $ctype=$this->input->get('ctype');
    $s=$page*12;
    $list = $this->mnews->get_list(12,$s,array('sort_id'=>'desc'),array('cid'=>8,'audit'=>1));
    $data['list']=$list;

    $this->load->view('news/modelajax',$data);

}


}
