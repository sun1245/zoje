<?php

/*
* Cache_Hook
* 该缓存是用CI display缓存
* 开启 config/config.php : cache_path ,cache_use,cache_time
* 当开启 cache_use时，在fun 中使用 $this->cache_use=false;可禁用当前display cache
* 默认以 _json 或 _ajax 结尾的数据输出不使用缓存
*/

class Cache_Hook{
  function cache(){
    $this->CI  = &get_instance();
    $cache_use = isset($this->CI->cache_use) ? $this->CI->cache_use :true;
    $not_ajax = true;
    if (preg_match("/(.*)_ajax$/i",$this->CI->router->method) or preg_match("/(.*)_json$/i",$this->CI->router->method)) {
      $not_ajax = false;
    }
    if ( $this->CI->config->item('cache_use') && $cache_use && $not_ajax) {
      $time = $this->CI->config->item('cache_time')? $this->CI->config->item('cache_time'):5;
      $this->CI->output->cache($time);
    }
  }
}
?>
