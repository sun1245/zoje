<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends MY_Controller {
    function __construct(){
    parent::__construct();
    $this->load->model('product_model','mproduct');
}

    public function index()
    {
        $data['header']=header_seoinfo(23,0);
        // 企业文化分类
        $data['typelist']=$this->typelist;
        $this->load->view('products',$data);
    }
}
