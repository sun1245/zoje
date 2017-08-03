<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class advert extends CRUD_Controller
{
  protected $rules = array(
   "rule" => array(
      array(
         "field" => "title",
         "label" => "标题",
         "rules" => "trim|required"
         ),
      array(
         "field" => "photo",
         "label" => "图片",
         "rules" => "trim|required"
         ),
      array(
         "field" => "timeline",
         "label" => '时间',
         "rules" => "trim|strtotime"
         )
      )
   );

  protected function open_lock(){
   $this->load->model('configs_model','mconf');

   $conf = $this->mconf->get_one(array('key'=>'ad'));
   if($conf['value']==1){
      $this->mconf->update(array('value'=>0),array('key'=>'ad'));
   }else{
      $this->mconf->update(array('value'=>1),array('key'=>'ad'));
   }
      // print_r($conf);
   redirect(site_url('advert/index'));

}

}
