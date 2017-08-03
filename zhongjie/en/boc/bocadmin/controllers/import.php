<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends Base_Controller {

	public function index()
	{
		$vdata['title'] = lang('wel_title');
		$this->load->view('inc_header.php',$vdata);
		$this->load->view('import.php');
		$this->load->view('inc_footer.php');
	}


}