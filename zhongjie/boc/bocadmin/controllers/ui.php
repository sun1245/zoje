<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ui extends Base_Controller {

	public function _remap($method, $params= array()){

		if (file_exists(APPPATH.'views/ui_'.$method.'.php')) {
			$this->load->view('ui_'.$method);
		}else{
			$this->load->view('ui.php');
			// echo "没有该模板页面";
		}
	}

}

/* End of file ui.php */
/* Location: ./application/controllers/ui.php */