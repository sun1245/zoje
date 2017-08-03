<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class recruitment extends MY_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('webmodels_model','mwebmodels');
    $this->load->model('recruit_model','mrecruit');
    $this->load->helpers('uisite_helper');
}

public function index()
{
    $mdinfo = $this->mwebmodels->get_one(array('mid'=>2),'type_id');
    $type_id=$mdinfo['type_id'];

    $where = array('cid'=>10,'audit'=>1);
    $this->load->library('pagination');
    $page = $this->uri->segment(3,1);
    $limit = 8;

    $count = $this->mrecruit->get_count_all($where);
    $pages = _pages(site_url('recruitment/index/'),$limit,$count,3);
    $list = $this->mrecruit->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);

    // seo
    $data['header']=header_seoinfo(10,0);
    $data['list']=$list;
    $data['pages']=$pages;
    $data['type_id']=$type_id;
    $this->load->view('recruitment',$data);

}


public function info()
{
    $id = $this->uri->segment(3,0);

    $htmlfilepath=HTML_PATH.'recruitinfo-'.$id.'.html';
    $htmlfileurl=HTML_URL.'recruitinfo-'.$id.'.html';;
    if (file_exists($htmlfilepath)) {
        redirect($htmlfileurl,'refresh');
    }

    if ($id) {
        $rs=$this->mrecruit->get_one_pn($id); 
    } else {
        redirect('recruitment');
    }
    $data['header']=header_seoinfo(10,0);
    $data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-'.$rs['title'];
    $data['rs']=$rs;
    $this->load->view('jobinfo',$data);

    $strhtml=$this->output->get_output();
    $this->load->helpers('file');
    write_file('html/recruitinfo-'.$id.'.html',$strhtml);

}


public function ajaxinfo()
{
    $id = $this->uri->segment(3,0);
    if ($id) {
        $rs=$this->mrecruit->get_one_pn($id); 
    } else {
        redirect('recruitment');
    }
    $data['rs']=$rs;
    $this->load->view('recruitment/ajaxinfo',$data);
}


}
