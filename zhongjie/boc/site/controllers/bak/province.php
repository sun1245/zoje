<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 省市控制器
class province extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('province_model','mcity');
	}

	// 获取省份列表
	public function province_ajax($value='')
	{
		if ($this->input->is_ajax_request()) {
			$prov = $this->mcity->get_province_all();
			$this->output->set_content_type('application/json')->set_output(json_encode($prov));
		}else{
			show_404();
		}
	}

	// 城市列表
	public function city_ajax($pid = false)
	{
		if ($this->input->is_ajax_request()) {
			if ($pid === false) {
				$pid = $this->input->get('pid');
			}
			if ($pid) {
				$prov = $this->mcity->get_city($pid);
				$this->output->set_content_type('application/json')->set_output(json_encode($prov));
			}
		}else{
			show_404();
		}
	}

	public function city_all_ajax()
	{
		if ($this->input->is_ajax_request()) {
			$prov = $this->mcity->get_city_all();
			$this->output->set_content_type('application/json')->set_output(json_encode($prov));
		}else{
			show_404();
		}
	}

}
