<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = DB_HOST;
$db['default']['username'] = DB_USER;
$db['default']['password'] = DB_PASS;
$db['default']['database'] = DB_NAME;
$db['default']['dbdriver'] = DB_TYPE;
$db['default']['dbprefix'] = DB_PREFIX;
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
// $db['default']['cache_on'] = TRUE;
// $db['default']['cachedir'] = 'E:\wamp\www\bocweb\boc\site\dbcache';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;




/* End of file database.php */
/* Location: ./application/config/database.php */