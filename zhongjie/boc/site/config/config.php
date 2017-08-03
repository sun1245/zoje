<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['base_url'] = GLOBAL_URL;

# 使用PATHINFO 去除 index.php
$config['index_page'] = 'index.php';

/*
| 'AUTO'			Default - auto detects
| 'PATH_INFO'		Uses the PATH_INFO
| 'QUERY_STRING'	Uses the QUERY_STRING
| 'REQUEST_URI'		Uses the REQUEST_URI
| 'ORIG_PATH_INFO'	Uses the ORIG_PATH_INFO   路径设置 注意服务器的 PATH_INFO 是否配置 Apache httpd 可能为 ORGI_PATH_INFO
*/
$config['uri_protocol']	= 'AUTO';

/* 伪静态后缀 */
$config['url_suffix'] = '.html';

/*默认语言*/
$config['language']	= 'zh_CN';

/*默认*/
$config['charset'] = 'UTF-8';

/* 开启 Hooks 钩子，扩展核心 */
$config['enable_hooks'] = TRUE;

/* Class Extension Prefix */
$config['subclass_prefix'] = 'MY_';

/* Allowed URL Characters */
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';

/* Enable Query Strings */
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use

/* 日志记录 */
/*
	0 = Disables logging, Error logging TURNED OFF
	1 = Error Messages (including PHP errors)
	2 = Debug Messages
	3 = Informational Messages
	4 = All Messages
*/
$config['log_threshold']   = 1;
// app/logs
$config['log_path']        = '';
$config['log_date_format'] = 'Y-m-d H:i:s';

/*
| Cache display 页面缓存
| 页面缓存
| 使用 Cache_Hook
| cache_path  默认保存文件夹 cache/
| cache_use   是否使用 cache,在 controller / fun 中可取消使用缓存
| acahe_time  设定默认时间 分钟
*/
$config['cache_path'] = '';
$config['cache_use']  = FALSE;
$config['cache_time'] = 1;

// Encryption Key
$config['encryption_key'] = HMAC;

/* 会话Session Variables */
$config['sess_cookie_name']		= DB_PREFIX.'session_site';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= DB_PREFIX.'sessions_site';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;

/* Cookie Related Variables */
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;

// XSS 过滤器
$config['global_xss_filtering'] = TRUE;

// 跨站请求伪造
$config['csrf_expire']      = 7200;
$config['csrf_protection']  = TRUE;
$config['csrf_cookie_name'] = '_scfc';		// cookie名 for ajax site
$config['csrf_token_name']  = '_scfs';		// 表单名
// 添加过滤控制器（不对其进行验证csrf,用于对外接口)
$config['csrf_filter'] = array('validate','uploader','upload');

// 压缩输出
$config['compress_output'] = FALSE;

// 时间 local / gmt
$config['time_reference'] = 'local';

// 重写短标签
$config['rewrite_short_tags'] = FALSE;

// 代理IP
$config['proxy_ips'] = '';
