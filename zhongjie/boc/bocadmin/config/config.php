<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_url']	= ADMINER_URL;

# 使用PATHINFO 去除 index.php
$config['index_page'] = 'index.php';

/*
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO
*/
$config['uri_protocol']	= 'PATH_INFO';

// .html
$config['url_suffix'] = '';

// for lang
$config['language']	= 'zh_CN';

$config['charset'] = 'UTF-8';

$config['enable_hooks'] = TRUE;

// for libraries or help
$config['subclass_prefix'] = 'MY_';

// Allowed URL Characters
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';


// Enable Query Strings
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

/*
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
|	0 = Disables logging, Error logging TURNED OFF
|	1 = Error Messages (including PHP errors)
|	2 = Debug Messages
|	3 = Informational Messages
|	4 = All Messages
*/
$config['log_threshold'] = 1;

// log file defalut: app/logs
$config['log_path'] = '';

// Date Format for Logs
$config['log_date_format'] = 'Y-m-d H:i:s';

// cache path
$config['cache_path'] = '';

// Encryption Key
$config['encryption_key'] = HMAC;

// 会话 Session Variables
$config['sess_cookie_name']		= DB_PREFIX.'session_adminer';
$config['sess_expiration']		= 7200; # 持续时间
$config['sess_expire_on_close']	= true; # 关闭浏览器时注销
$config['sess_encrypt_cookie']	= false; # 使用加密 cookie
$config['sess_use_database']	= true; # 保存操到数据库
$config['sess_table_name']		= DB_PREFIX.'sessions_adminer'; # 数据表
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;  # s 更新时间

// Cookie Related Variables
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;

// XSS 过滤器
$config['global_xss_filtering'] = TRUE;

// 跨站请求伪造
$config['csrf_expire']      = 7200;
$config['csrf_protection']  = TRUE;
$config['csrf_cookie_name'] = '_cfc';		// cookie名 for ajax
$config['csrf_token_name']  = '_cfs';		// 表单名
// 添加过滤控制器（不对其进行验证csrf,用于对外接口)
$config['csrf_filter'] = array('ueditor');
// security 过滤标签 POST提交xss_clean
$config['security_naughty_html'] =
'alert|applet|audio|basefont|base|behavior|bgsound|blink|body|expression|form|frameset|frame|head|html|ilayer|iframe|input|isindex|layer|link|meta|object|plaintext|style|script|textarea|title|video|xml|xss';


// 压缩输出
$config['compress_output'] = FALSE;

// 时间 local / gmt
$config['time_reference'] = 'local';

// 重写短标签
$config['rewrite_short_tags'] = FALSE;

// 代理IP
$config['proxy_ips'] = '';


/* End of file config.php */
/* Location: ./application/config/config.php */
