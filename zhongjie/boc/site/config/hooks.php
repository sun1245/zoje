<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// cache 的使用 
$hook['post_controller'][] = array(
	'class'    => 'Cache_Hook',
	'function' => 'cache',
	'filename' => 'Cache_Hook.php',
	'filepath' => 'hooks',
	'params'   => array()
);
