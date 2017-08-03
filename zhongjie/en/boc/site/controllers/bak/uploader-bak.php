<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader extends CI_Controller {
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


  public function index(){

  /**
   * upload.php
   *
   * Copyright 2013, Moxiecode Systems AB
   * Released under GPL License.
   *
   * License: http://www.plupload.com/license
   * Contributing: http://www.plupload.com/contributing
   */

  #!! 注意
  #!! 此文件只是个示例，不要用于真正的产品之中。
  #!! 不保证代码安全性。

  #!! IMPORTANT:
  #!! this file is just an example, it doesn't incorporate any security checks and
  #!! is not recommended to be used in production environment as it is. Be sure to
  #!! revise it and customize to your needs.


  // Make sure file is not cached (as it happens for example on iOS devices)
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");


  // Support CORS
  // header("Access-Control-Allow-Origin: *");
  // other CORS headers if any...
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      exit; // finish preflight CORS requests here
  }


  if ( !empty($_REQUEST[ 'debug' ]) ) {
      $random = rand(0, intval($_REQUEST[ 'debug' ]) );
      if ( $random === 0 ) {
          header("HTTP/1.0 500 Internal Server Error");
          exit;
      }
  }

  // header("HTTP/1.0 500 Internal Server Error");
  // exit;


  // 5 minutes execution time
  @set_time_limit(5 * 60);

  // Uncomment this one to fake upload time
  // usleep(5000);

  // Settings
  // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
  $targetDir = UPLOAD_PATH.'site_tmp';
  $uploadDir = UPLOAD_PATH.'site/';

  $cleanupTargetDir = true; // Remove old files
  $maxFileAge = 5 * 3600; // Temp file age in seconds


  // Create target dir
  if (!file_exists($targetDir)) {
      @mkdir($targetDir);
  }

  // Create target dir
  if (!file_exists($uploadDir)) {
      @mkdir($uploadDir);
  }

  // Get a file name
  if (isset($_REQUEST["name"])) {
      $fileName = $_REQUEST["name"];
  } elseif (!empty($_FILES)) {
      $fileName = $_FILES["file"]["name"];
  } else {
      $fileName = uniqid("file_");
  }

  $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
  $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

  // Chunking might be enabled
  $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
  $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


  // Remove old temp files
  if ($cleanupTargetDir) {
      if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
      }

      while (($file = readdir($dir)) !== false) {
          $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

          // If temp file is current file proceed to the next
          if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
              continue;
          }

          // Remove temp file if it is older than the max age and is not the current file
          if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
              @unlink($tmpfilePath);
          }
      }
      closedir($dir);
  }


  // Open temp file
  if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
      die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
  }

  if (!empty($_FILES)) {
      if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
      }

      // Read binary input stream and append it to temp file
      if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
      }
  } else {
      if (!$in = @fopen("php://input", "rb")) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
      }
  }

  while ($buff = fread($in, 4096)) {
      fwrite($out, $buff);
  }

  @fclose($out);
  @fclose($in);

  rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

  $index = 0;
  $done = true;
  for( $index = 0; $index < $chunks; $index++ ) {
      if ( !file_exists("{$filePath}_{$index}.part") ) {
          $done = false;
          break;
      }
  }
  if ( $done ) {
      if (!$out = @fopen($uploadPath, "wb")) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
      }

      if ( flock($out, LOCK_EX) ) {
          for( $index = 0; $index < $chunks; $index++ ) {
              if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                  break;
              }

              while ($buff = fread($in, 4096)) {
                  fwrite($out, $buff);
              }

              @fclose($in);
              @unlink("{$filePath}_{$index}.part");
          }

          flock($out, LOCK_UN);
      }
      @fclose($out);
  }

  // Return Success JSON-RPC response
  die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');


  }

	// 上传组件
	// Handler 虽然提供的del功能，在title查询数据库效率问题建议使用下面的fid处理
	public function index_bak(){

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
			'accept_file_types' => '/\.('.$this->mcfg->get('upload','inline_file_types').')$/i',
		);

		$config['image_versions'] = array();

		// 处理压缩
		if ($this->input->get('size', TRUE)) {
			if (strpos($this->input->get('size', TRUE),',')) {
				$tmp_size = explode(',',$this->input->get('size', TRUE));
				foreach ($tmp_size as $k => $v) {
					$p = array('jpeg_quality' => 95);
					$tmp = explode('x',$v);
					if (is_int(intval($tmp[0])) && is_int(intval($tmp[1])) ) {
						$p['max_width'] = $tmp[0];
						$p['max_height'] = $tmp[1];
						if ($k == 0) {
							array_push($config['image_versions'],$p);
						}else{
							$config['image_versions'][$v] = $p;
						}
					}
					unset($tmp);
				}
			} else {
				$tmp_size = explode('x',$this->input->get('size', TRUE));
				$p =array('jpeg_quality' => 95);
				if (is_int(intval($tmp_size[0])) && is_int(intval($tmp_size[1])) ) {
					$p['max_width'] = $tmp_size[0];
					$p['max_height'] = $tmp_size[1];
					array_unshift($config['image_versions'],$p);
				}
			}
		}

		$config['image_versions']['thumbnail'] = array(
			'crop' => true,
			'max_width' => 100,
			'max_height' => 80
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
				$vdata['msg'] = "已经更新了图片的SEO信息！";
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
