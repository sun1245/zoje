<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class Help extends CI_Controller 
 * 帮助文档 
 * @author 
 */
class Help extends Base_Controller
{
	public function index()
	{
		$vdata['title'] = '帮助文档';
		$this->load->view('inc_header.php',$vdata);
		$this->load->view('help.php');
		$this->load->view('inc_footer.php');
	}
}

