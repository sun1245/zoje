<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class news extends MY_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('article_model','mnarticle');
    $this->load->model('videos_model','mvideos');
}

public function index()
{

    // 公司新闻
    $news = $this->mnarticle->get_list(3,0,array('sort_id'=>'desc'),array('cid'=>2,'audit'=>1));
    $tnews = $this->mnarticle->get_list(3,0,array('sort_id'=>'desc'),array('cid'=>2,'flag'=>1,'audit'=>1));
    $count = $this->mnarticle->get_count_all(array('cid'=>2,'audit'=>1))-3;
    $size = (ceil($count/4)?ceil($count/4):1);
    //行内新闻
    $news2 = $this->mnarticle->get_list(8,0,array('sort_id'=>'desc'),array('cid'=>15,'audit'=>1));
    $count1 = $this->mnarticle->get_count_all(array('cid'=>15,'audit'=>1));
    $size1 = (ceil($count1/4)?ceil($count1/4):1)-2;
    // 新闻视频
    $video = $this->mvideos->get_list(3,0,array('sort_id'=>'desc'),array('cid'=>3,'audit'=>1));
    $count2 = $this->mvideos->get_count_all(array('cid'=>3,'audit'=>1));
    $size2 = (ceil($count2/3)?ceil($count2/3):1)-1;
    // seo
    $data['header']=header_seoinfo(1,0);
    // 企业文化分类
    $data['typelist']=$this->typelist;
    $data['news2']=$news2;
    $data['news']=$news;
    $data['tnews']=$tnews;
    $data['video']=$video;
    // 多少个 加载跟多
    $data['size']=$size;
    $data['size1']=$size1;
    $data['size2']=$size2;
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
        $rs=$this->mnarticle->get_one_pn($id); 
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
    $this->load->view('news/info',$data);
    // 生成静态文件
    $strhtml=$this->output->get_output();
    $this->load->helpers('file');
    write_file('html/newsinfo-'.$id.'.html',$strhtml);
}


public function more()
{
    $fid = $this->uri->segment(3,0);
    $page=$this->input->get('page');
    if($fid == 2){
        $bigin = ($page-1)*4+3;
    }elseif ($fid == 15) {
        $bigin = 4*($page-1)+8;
    }
    $list = $this->mnarticle->get_list(4,$bigin,array('sort_id'=>'desc'),array('cid'=>$fid,'audit'=>1));
    $data['list']=$list;
    $this->load->view('news/more',$data);

}
public function video()
{
    $page=$this->input->get('page');
    $s=$page*3;
    $video = $this->mvideos->get_list(3,$s,array('sort_id'=>'desc'),array('cid'=>3,'audit'=>1));

    $data['video']=$video;
    $this->load->view('news/video',$data);

}

}
