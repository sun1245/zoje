<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 媒体中心 
 */
class Media extends CRUD_Controller
{
	public function __construct(){
		parent::__construct();
		$this->model->change_table('upload');	
	}

}