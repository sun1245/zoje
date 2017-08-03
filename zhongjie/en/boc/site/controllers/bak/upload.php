<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MY_Controller {
	protected $rules = array(
		"crop" => array(
			array(
				'field'   => 'x',
				'label'   => '坐标x',
				'rules'   => 'trim|required|numeric'
				),
			array(
				'field'   => 'y',
				'label'   => '坐标y',
				'rules'   => 'trim|required|numeric'
				),
			array(
				'field'   => 'w',
				'label'   => '宽度',
				'rules'   => 'trim|required|numeric'
				),
			array(
				'field'   => 'h',
				'label'   => '高度',
				'rules'   => 'trim|required|numeric'
				),
			)
		);


	function __construct(){
		parent::__construct();
		$this->load->model('upload_model','model');
	}

	// 上传组件
	// Handler 虽然提供的del功能，在title查询数据库效率问题建议使用下面的fid处理
	public function index(){
		//if (!$this->input->is_ajax_request()) {
		//	show_404();
		//}

		// 消除 notice
		// error_reporting(E_ALL | E_STRICT);
		error_reporting(0);

		// 获得日期中的上传,否则为当天
		// 全部的则要另外写了
		$this->load->helper('date');
		$date = $this->input->get('dt', TRUE);
		if ($d = check_date($date)) {
			$dir = day_human($d);
		}else{
			$dir = TRUE;
		}

		$config = array(
			'script_url' => current_url(),
			'upload_url' => '',// javascript : UPLOAD_URL
			'upload_dir' => UPLOAD_PATH,
			'param_name' => 'files',
			'user_dirs' => $dir,
			'random_file_name' => TRUE,
			'inline_file_types' => '/\.('.$this->mcfg->get('upload','inline_file_types').')$/i',
			'accept_file_types' => '/\.('.$this->mcfg->get('upload','inline_file_types').')$/i'
			);
		header('Content-type: text/json');
		$this->load->library('UploadHandler', $config);
		$this->UploadHandler;
	}

	/**
	 * @brief 删除
	 * @param $fids 键值 默认id
	 * @return
	 */
	public function delete(){

		$this->load->model('upload_model', 'model');
		$this->load->model('log_model','mlogs');

		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		if ($this->input->post('ids')) {
			$fids = explode(',',$this->input->post('ids'));
			$tmp = array();
			foreach ($fids as $v) {
				array_push($tmp, intval($v));
			}
			$fids = $tmp;
			unset($tmp);
		}else{
			$vdata = array('status'=>0,'msg'=>"ID不存在");
		}



		if (!isset($vdata['status'])) {
			$ps = $this->model->get_in($fids);
			foreach ($ps as $v) {
				$f = urldecode($v['url']);
				$ft = urldecode($v['thumb']);
				if (is_file(UPLOAD_PATH.$f)) {
					unlink(UPLOAD_PATH.$f);
				}
				if (is_file(UPLOAD_PATH.$ft)) {
					unlink(UPLOAD_PATH.$ft);
				}
			}

			if ($this->model->del($fids,TRUE)) {
				$tmp_ids = implode(',', $fids);
				$vdata = array('status'=>1,'msg'=>"成功的删除文件！FID:".$tmp_ids);
				$this->mlogs->add('delete','删除文件ID:'.$tmp_ids);
				unset($tmp_ids);
			}else{
				$vdata = array('status'=>0,'msg'=>"文件不存在！或已经删除了！");
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	//获取当天上传
	public function get_day_ajax()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$this->load->helper('date');
		$vdata = array('status'=>0,'msg'=>'没有任何数据');
		if ($date = $this->input->get('dt', TRUE) and check_date($date)) {
			$day_start = day_unix(strtotime($date));
		}else{
			// 当天
			$day_start = day_unix(time());
		}
		$day_end= $day_start + 60*60*24;
		$where = 'timeline between '.$day_start.' and '.$day_end;
		if ($list = $this->model->get_all($where,"*")) {
			$vdata['status'] = 1;
			$vdata['msg'] = "已经返回数据!";
			$vdata['list'] = $list;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	/**
	 * 通过file id为异步方式提供文件地址
	 * 支持get fids 子段来获取一组数据
	 * @param  boolean $fid 单个文件
	 * @return json
	 */
	public function get_ajax($fid=false){
		if ($fid and is_numeric($fid)) {
			$f = $this->model->get_one($fid);
			$this->output->set_content_type('application/json')->set_output(json_encode($f));
			// if(file_exists(UPLOAD_PATH.urldecode($f['url']))){
			// 	header("Content-Type:".$f['type']);
			// 	readfile(UPLOAD_PATH.$f['url']);
			// 	exit;
			// }
		}else if($fids = $this->input->get('fids',TRUE)){
			$where = array();
			foreach (explode(',', $fids) as $value) {
				if (is_numeric($value)) {
					array_push($where, $value);
				}
			}
			// 这里的 get_in 是自定义的非继承
			$f = $this->model->get_in($where);
			$this->output->set_content_type('application/json')->set_output(json_encode($f));
		}
	}

	// 设定seo
	public function seo_ajax($fid=0)
	{
		$vdata['status'] = 1;
		!$fid and $fid = $this->input->post('fid',TRUE);
		if (!$fid and !is_numeric($fid)) {
			$vdata['status'] = 0;
			$vdata['msg'] = "没有找到任何数据！";
		}
		if ($vdata and $this->input->is_ajax_request()) {
			$data['title'] = $this->input->post('title', TRUE);
			$data['alt'] = $this->input->post('alt', TRUE);
			$data['text'] = $this->input->post('text', TRUE);
			if($this->model->update($data,array('id'=>$fid))){
				$vdata['status'] = 1;
				$vdata['msg'] = "已经更新了标题信息！";
			}else{
				$vdata['status'] = 0;
				$vdata['msg'] = "更新失败,没有找到任何数据！";
			}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	/**
	 * 裁剪图片 ajax
	 * 通过fid修改已经注册的图片。
	 * @return json
	 */
	public function gd_ajax($fid=false)
	{
		$vdata = array('status'=>0,'msg'=>"提供正确的file ID。");
		if (!$fid) {
			if ($this->input->get('fid',TRUE) and is_numeric($this->input->get('fid',TRUE))) {
				$fid = $this->input->get('fid',TRUE);
			}else{
				$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
				return;
			}
		}

		if ($this->input->get('h',TRUE)) {
			$config['x_axis'] = $this->input->get('x');
			$config['y_axis'] = $this->input->get('y');
			$config['width'] = $this->input->get('w');
			$config['height'] = $this->input->get('h');
		}

		if ($file = $this->model->get_one($fid)) {
			$config['source_image'] = UPLOAD_PATH.$file['url'];
			$config['image_library'] = 'gd2';
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = TRUE;
			$this->load->library('image_lib', $config);

			//切片
			if (!$this->image_lib->crop()) {
				$vdata['status'] = 0;
				$vdata['msg'] = $this->image_lib->display_errors();
			}else{
				$vdata['status'] = 1;
				$vdata['msg'] = '已经裁剪图片！';
			}
		}else{
			$vdata['msg'] = "非法ID,文件不存在！";
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

}