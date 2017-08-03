<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// cookie helper
// http://codeigniter.org.cn/user_guide/general/hooks.html

// pre_system
// pre_controller
// post_controller_constructor
// post_controller
// display_override
// cache_override
// post_system

// AUTH 用户登录 权限控制
// 在你的控制器实例化之后,任何方法调用之前调用
$hook['post_controller_constructor'] = array(  
	'class'    => 'Acl',  
	'function' => 'auth',
	'filename' => 'acl.php',  
	'filepath' => 'hooks'  
);

