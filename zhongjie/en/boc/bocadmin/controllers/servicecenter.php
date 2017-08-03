<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicecenter extends Base_Controller
{
	public function index()
	{
		$vdata['title'] = '服务中心';
		$this->load->view('inc_header.php',$vdata);
		$this->load->view('servicecenter.php');
		$this->load->view('inc_footer.php');
	}
}

