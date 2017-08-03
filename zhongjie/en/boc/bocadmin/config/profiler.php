<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 调试
// $this->output->enable_profiler(TRUE);

// 在各个计时点花费的时间以及总时间	
$config['benchmarks'] = TRUE;
// CodeIgniter 配置变量
$config['config'] = TRUE;
// 被调用的method及其所属的控制器类
$config['controller_info'] = TRUE;
// 在request中传递的所有GET参数
$config['get'] = TRUE ;
// 本次请求的 HTTP 头
$config['http_headers'] = TRUE;
// 本次请求消耗的内存（byte为单位）
$config['memory_usage'] = TRUE;
// 在request中传递的所有POST参数
$config['post'] = TRUE;
// 列出执行的数据库操作语句及其消耗的时间	
$config['queries'] = TRUE;
// 本次请求的URI
$config['uri_string'] =  TRUE;
// 指定显示多少个数据库查询语句，剩下的则默认折叠起来。
$config['query_toggle_count'] = 25;

/* End of file profiler.php */
/* Location: ./application/config/profiler.php */
