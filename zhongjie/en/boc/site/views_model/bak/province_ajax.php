<?php 
$CI->load->model('province_model','mcity');
if ($CI->input->is_ajax_request()) {
	$prov = $CI->mcity->get_province_all();
	$CI->output->set_content_type('application/json')->set_output(json_encode($prov));
}else{
	show_404();
}