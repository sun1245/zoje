<?php
# Tag
define('BOCTAG','1.0');

# 数据库
define('DB_TYPE'   , 'mysqli');
define('DB_HOST'   , '121.41.128.239');
define('DB_USER'   , 'root');
define('DB_PASS'   , 'boc2009!@#');
define('DB_NAME'   , 'lcz_zhongjie');
define('DB_PREFIX' , 'boc_en_');

# 全局URL路径
// 主域名 保留最后的 /
define('GLOBAL_URL'  , 'http://'.$_SERVER['HTTP_HOST'].'/zhongjie/en/');
define('GLOBAL_URL_SQL'  , 'http://'.$_SERVER['HTTP_HOST'].'/zhongjie/en/boc/');
// 提供给后台做链接用的
define('STATIC_URL'  , GLOBAL_URL.'static/');
define('UPLOAD_URL'  , GLOBAL_URL.'upload/');
// 对应APP
define('SITE_URL'  ,   GLOBAL_URL.'index.php/');
define('ADMINER_URL' , GLOBAL_URL.'bocadmin/');
define('MOBILE_URL'  , GLOBAL_URL.'mobile/');
define('ADMINER_URL_SQL' , GLOBAL_URL_SQL.'bocadmin/');
define('HTML_URL'  , GLOBAL_URL.'html/');
// define('GLOBAL_URL'  , 'http://localhost:9000/');
// define('STATIC_URL'  , 'http://localhost:9001/');
// define('UPLOAD_URL'  , 'http://localhost:9002/');
// define('ADMINER_URL' , 'http://localhost:9003/');
// define('MOBILE_URL'  , 'http://localhost:9004/');

// // 快捷提供给JS
define('IMG_URL'     , STATIC_URL.'img/');

# 引用绝对路径PATH定义
define('ROOT'        , __DIR__.'/');
define('LIBS_PATH'   , ROOT.'boc/libs/');
define('CI_PATH'     , ROOT.'boc/libs/ci/');
define('STATIC_PATH' , ROOT.'static/');
define('UPLOAD_PATH' , ROOT.'upload/');
define('HTML_PATH'  , ROOT.'html/');
define('SITE_PATH'   , ROOT.'boc/site');
define('ADMIN_PATH'  , ROOT.'boc/bocadmin');

# 可忽略 当css|js改变时替换本地缓存,将false 替换为 'v[1,2...]'
define('STATIC_V',false);

# 密钥设置;设置多个 用于 md5/sha1(hmac.value.time) 外部数据输入输出
# 提供给 app 的config 的 encryption_key
define('HMACPWD','SA1S2D3F4G5H6J7K8L9'); // PASSWD and cookie
define('HMAC','SA1S2D3F4G5H6J7K8L8');    // 提供第三方API验证使用

/*
 * 开发模式
 * 配置项目运行的环境，该配置会影响错误报告的显示和配置文件的读取。
 * development
 * testing
 * production
 * 使用 error_reporting();
 */
define('ENVIRONMENT', 'development');
// 有些服务器不支持调试，需要开启错误调试
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
// ini_set("error_reporting", 1);

// PHP 5 尝试加载未定义的类
// 挂载本地库 其他 core Controller
// 使用第三方报错工具可能会出现未加载的现象出现使
function BocLoader($class)
{
	if(strpos($class, 'CI_') !== 0)
	{
		if (file_exists(APPPATH . 'core/'. $class . EXT)) {
			@include_once( APPPATH . 'core/'. $class . EXT );
		}elseif(file_exists(LIBS_PATH . 'core/'. $class . EXT)) {
			@include_once( LIBS_PATH . 'core/'. $class . EXT );
		}
	}
}
//注册自动加载,解决与其他自动加载第三方插件冲突
spl_autoload_register('BocLoader');