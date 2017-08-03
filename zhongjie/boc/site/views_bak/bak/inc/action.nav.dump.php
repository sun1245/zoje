<?php


dump($nav_fid       ,'[ac.nav][nav_fid]获取父级别,自动默认子级别:');
dump($nav_list      ,'[ac.nav][nav_list]同级别栏目list:','table');
dump($nav_active	,'[ac.nav][nav_active]当前栏目ID:');
dump($nav_path 		,'[ac.nav][nav_path]当前栏目path array:');
dump($nav_path_str 	,'[ac.nav][nav_path_str]面包屑:');
dump($nav_info		,'[ac.nav][nav_info]当前栏目信息详情:');
dump($CI->model 	,'[ac.nav][CI->model]获取当前栏目的默认数据库模型:');
dump($base_url 		,'[ac.nav][base_url]当前栏目的路由路径:');
dump($nav_title 	,'[ac.nav][nav_title]当前栏目的标题:');
dump($header 		,'[ac.nav][header]SEO信息:');
?>