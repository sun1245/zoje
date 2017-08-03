<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CRUD_Controller
{
 protected $rules = array(
      "create" => array(
         array(
            "field" => "username",
            "label" => "用户名",
            "rules" => "trim|required|callback_username_verify"
            ),
         array(
            "field" => "email",
            "label" => "邮箱",
            "rules" => "trim|valid_emails"
            ),
         array(
            "field" => "password",
            "label" => "密码",
            "rules" => "trim"
            ),
         array(
            "field" => "timeline",
            "label" => '时间',
            "rules" => "trim|strtotime"
            )
         ),
      "edit" => array(
         array(
            "field" => "username",
            "label" => "用户名",
            "rules" => "trim|required"
            ),
         array(
            "field" => "email",
            "label" => "邮箱",
            "rules" => "trim|valid_emails"
            ),
         array(
            "field" => "password",
            "label" => "密码",
            "rules" => "trim"
            ),
         array(
            "field" => "timeline",
            "label" => '时间',
            "rules" => "trim|strtotime"
            )
         )
   );

   function _create_data(){
      $form=$this->input->post();
      $form['password']=md5($form['password']);
      return $form;
   }

   function _edit_data(){
      $form=$this->input->post();
      if(!empty($form['password']))
      {
         $form['password']=md5($form['password']);
      }
      elseif (empty($form['password']))
      {
         unset($form['password']);
      }
      return $form;
   }



   function excel(){
      $id=intval($this->uri->segment(3,0));
      $this->load->model('users_model','musers');
      $uinfo=$this->musers->get_one($id);
      $uinfo['timeline']=date('Y-m-d H:i:s',$uinfo['timeline']);
      $filename=$uinfo['username']."xls";
      $filename=iconv('utf-8','gbk',$filename);

      header("Pragma: public");
      header("Expires: 0");
      header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
      header("Content-Type:application/force-download");
      header("Content-Type:application/vnd.ms-execl");
      header("Content-Type:application/octet-stream");
      header("Content-Type:application/download");
      header('Content-Disposition:attachment;filename="' . $filename . '.xls"');
      header("Content-Transfer-Encoding:binary");

      $this->load->view("users_excel",get_defined_vars());
   }


   function word(){
      $id=intval($this->uri->segment(3,0));
      $this->load->model('users_model','musers');
      $uinfo=$this->musers->get_one($id);
      $uinfo['timeline']=date('Y-m-d H:i:s',$uinfo['timeline']);

      $filename=$uinfo['username']."doc";
      $filename=iconv('utf-8','gbk',$filename);

      header("Pragma: public");
      header("Expires: 0");
      header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
      header("Content-Type:application/force-download");
      header("Content-Type:application/vnd.ms-word");
      header("Content-Type:application/octet-stream");
      header("Content-Type:application/download");
      header('Content-Disposition:attachment;filename="' . $filename . '.doc"');
      header("Content-Transfer-Encoding:binary");

      // 第一种
      // $this->load->view("users_word",get_defined_vars());

      // 第二种
      $content="<table border='1'><tr><td>姓名:</td><td>".$uinfo['username']."</td><td>昵称:</td><td>".$uinfo['nickname']."</td><td>邮箱:</td><td>".$uinfo['email']."</td></tr></table>";
      $fileContent = $this->get_word_document($content);
      echo $fileContent;

   }


   public function search($page=1){
      $limit = $this->page_limit;
      $this->input->get('limit') and is_numeric($this->input->get('limit')) AND $limit = $this->input->get('limit');

      $where = array();
      if ($this->session->userdata('gid') != 1) {
         $where = array('mid'=>$this->session->userdata('mid'));
      }

      if($this->input->get('username',TRUE)){
         $where_q = array(
           'like username'=> array('username',$this->input->get('username',TRUE)),
           );
         $where = array_merge($where,$where_q);
      }
      if($this->input->get('email',TRUE)){
         $where_q = array(
           'like email'=> array('email',$this->input->get('email',TRUE)),
           );
         $where = array_merge($where,$where_q);
      }

      $orders = array('id'=>'desc');

      $vdata['pages'] = $this->_pages(site_url($this->class.'/search'),$limit,$where);
      $vdata['list'] = $this->model->get_list($limit,$limit*($page-1),$orders,$where);

      $this->_display($vdata,'users_index.php');

   }


   //邮箱验证
   function username_verify($str='')
   {
      $data=$this->model->get_one(array('username'=>$str));
      if(!empty($data)){
         $this->form_validation->set_message('username_verify', '用户名已注册，请您更换！');
         return false;
      }else{
         return true;
      }
   }



   //转换html内容为mht内容
   function get_word_document($content, $absolutePath="", $isEraseLink=true){
      require_once 'class.mhtfile.php';
      $mht = new MhtFileMaker();
      if ($isEraseLink){
         $content = preg_replace('/<a\s*.*?\s*>(\s*.*?\s*)<\/a>/i' , '$1' , $content);   //去掉链接
      }
      $images = array();
      $files = array();
      $matches = array();
      //这个算法要求src后的属性值必须使用引号括起来
      if(preg_match_all('/<img[.\n]*?src\s*?=\s*?[\"\'](.*?)[\"\'](.*?)\/>/i',$content,$matches)){
         $arrPath = $matches[1];
         for($i=0;$i<count($arrPath);$i++){
            $path = $arrPath[$i];
            $imgPath = trim( $path );
            if($imgPath!=""){
               $files[] = $imgPath;
               if(substr($imgPath,0,7)=='http://'){
               //绝对链接，不加前缀
               }else{
                  $imgPath = $absolutePath.$imgPath;
               }
               $images[] = $imgPath;
            }
         }
      }
      $mht->AddContents("tmp.html",$mht->GetMimeType("tmp.html"),$content);
      for($i=0;$i<count($images);$i++){
         $image = $images[$i];
         if (@fopen($image, 'r')){
            $imgcontent = @file_get_contents($image);
            if ($content){
               $mht->AddContents($files[$i],$mht->GetMimeType($image),$imgcontent);
            }
         }else{
            echo "file:".$image." not exist!<br />";
         }
      }
      return $mht->GetFile();
   }


   // 搜索  有栏目的搜索方法
   public function search2($cid=false,$page=1){
       $vdata['cpath']= $this->mcol->get_path_more($this->cid);
       $vdata['cchildren'] = $this->mcol->get_cols($this->cid);
       $title = $this->mcol->get_one($this->cid,"title");
       $vdata['title'] = $title['title'];
       $limit = $this->page_limit;
       $this->input->get('limit',TRUE) and is_numeric($this->input->get('limit')) AND $limit = $this->input->get('limit');
       $order = $this->input->get('order',TRUE) ? $this->input->get('order',TRUE):FALSE;
       $where = array();
       $where['cid'] = $this->cid;
       if ($ctype = $this->input->get('ctype',TRUE) AND is_numeric($ctype)) {
            $ctypes_ids = $this->mctypes->find_ids($this->cid,$ctype);
            $where['in'] = array('ctype',$ctypes_ids);
      }
      if ($wh = $this->_search_where()) {
            $where = array_merge($where,$wh);
      }

      if($this->input->get('username',TRUE)){
         $where_q = array(
           'like username'=> array('username',$this->input->get('username',TRUE)),
           );
         $where = array_merge($where,$where_q);
      }
      if($this->input->get('email',TRUE)){
         $where_q = array(
           'like email'=> array('email',$this->input->get('email',TRUE)),
           );
         $where = array_merge($where,$where_q);
      }

      $vdata['pages'] = $this->_pages(site_url($this->class.'/search/'.$this->cid.'/'),$limit,$where,4);
      $vdata['list'] = $this->model->get_list($limit,$limit*($page-1),$order,$where);
      $this->_display($vdata,$this->class.'_index.php');
   }



}
