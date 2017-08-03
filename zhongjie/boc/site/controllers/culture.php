<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class culture extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('infos_model','minfos');
}

    public function index()
    {
        $this->load->library('pagination');
        $ctype = $this->uri->segment(3,3);
        $page = $this->uri->segment(4,1);
        $limit = 9;
        $where = array('cid'=>9,'audit'=>1,'ctype'=>$ctype);
        $count = $this->minfos->get_count_all($where);
        $pages = _pages(site_url('culture/index/'.$ctype.'/'),$limit,$count,4);
        $list = $this->minfos->get_list($limit,$limit*($page-1),array('sort_id'=>'desc'),$where);
        $data['ctypeId']=$ctype;
        $data['list']=$list;
        $data['pages']=$pages;
        // seo
        $data['header']=header_seoinfo(9,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('culture',$data);
    }
    public function info()
    {
        $id = $this->uri->segment(3,0);

        $htmlfilepath=HTML_PATH.'culture-'.$id.'.html';
        $htmlfileurl=HTML_URL.'culture-'.$id.'.html';;
        if (file_exists($htmlfilepath)) {
            redirect($htmlfileurl,'refresh');
        }
        if ($id) {
            $rs=$this->minfos->get_one_pn($id); 
        } else {
            redirect('news');
        }
         // seo
        $data['header']=header_seoinfo($rs['cid'],0);
        $data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-'.$rs['title'];
        //结果
        $data['rs']=$rs;
        
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('culture/info',$data);
        // 生成静态文件
        $strhtml=$this->output->get_output();
        $this->load->helpers('file');
        write_file('html/culture-'.$id.'.html',$strhtml);
    }

}
