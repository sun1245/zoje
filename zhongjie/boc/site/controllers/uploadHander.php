<?php

include LIBS_PATH."libraries/Uploader.php";
/**
 * Class Ueditor extends CI_Controller
 * @author
 */
class uploadHander extends CI_Controller
{
	public function __construct()
	{
		//header('Access-Control-Allow-Origin: http://www.baidu.com'); //设置http://www.baidu.com允许跨域访问
		//header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
		parent::__construct();

		$this->php_url = UPLOAD_URL;
		// 用不定符号来表达编辑器
		$this->php_path = "files";  //str_replace($_SERVER['DOCUMENT_ROOT'], "",UPLOAD_PATH."editor")  ;

		$this->load->Helper('file');
	}

	public function upload()
	{

		date_default_timezone_set("Asia/chongqing");
		error_reporting(E_ERROR);
		header("Content-Type: text/html; charset=utf-8");

		// $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json")), true);

		$CONFIG =  array (
			'imageActionName' => 'uploadimage',
			'imageFieldName' => 'upfile',
			'imageMaxSize' => 2048000,
			'imageAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp'),
			'imageCompressEnable' => true,
			'imageCompressBorder' => 1600,
			'imageInsertAlign' => 'none',
			'imageUrlPrefix' => $this->php_url,
			'imagePathFormat' => $this->php_path.'/image/{yyyy}{mm}{dd}/{time}{rand:6}',

			'scrawlActionName' => 'uploadscrawl',
			'scrawlFieldName' => 'upfile',
			'scrawlPathFormat' => $this->php_path.'/image/{yyyy}{mm}{dd}/{time}{rand:6}',
			'scrawlMaxSize' => 2048000,
			'scrawlUrlPrefix' => $this->php_url,
			'scrawlInsertAlign' => 'none',

			'snapscreenActionName' => 'uploadimage',
			'snapscreenPathFormat' => $this->php_path.'/image/{yyyy}{mm}{dd}/{time}{rand:6}',
			'snapscreenUrlPrefix' => $this->php_url,
			'snapscreenInsertAlign' => 'none',

			'catcherLocalDomain' => array ('127.0.0.1','localhost','img.baidu.com',),
			'catcherActionName' => 'catchimage',
			'catcherFieldName' => 'source',
			'catcherPathFormat' => $this->php_path.'/image/{yyyy}{mm}{dd}/{time}{rand:6}',
			'catcherUrlPrefix' => $this->php_url,
			'catcherMaxSize' => 2048000,
			'catcherAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp',),

			'videoActionName' => 'uploadvideo',
			'videoFieldName' => 'upfile',
			'videoPathFormat' => $this->php_path.'/video/{yyyy}{mm}{dd}/{time}{rand:6}',
			'videoUrlPrefix' => $this->php_url,
			'videoMaxSize' => 102400000,
			'videoAllowFiles' => array ('.flv','.swf','.mkv','.avi','.rm','.rmvb','.mpeg','.mpg','.ogg','.ogv','.mov','.wmv','.mp4','.webm','.mp3','.wav','.mid', ),

			'fileActionName' => 'uploadfile',
			'fileFieldName' => 'upfile',
			'filePathFormat' => $this->php_path.'/file/{yyyy}{mm}{dd}/{time}{rand:6}',
			'fileUrlPrefix' => $this->php_url,
			'fileMaxSize' => 51200000,
			'fileAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp','.flv','.swf','.mkv','.avi','.rm','.rmvb','.mpeg','.mpg','.ogg','.ogv','.mov','.wmv','.mp4','.webm','.mp3','.wav','.mid','.rar','.zip','.tar','.gz','.7z','.bz2','.cab','.iso','.doc','.docx','.xls','.xlsx','.ppt','.pptx','.pdf','.txt','.md','.xml', ),

			'imageManagerActionName' => 'listimage',
			'imageManagerListPath' => $this->php_path.'/image/',
			'imageManagerListSize' => 20,
			'imageManagerUrlPrefix' => $this->php_url,
			'imageManagerInsertAlign' => 'none',
			'imageManagerAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp', ),

			'fileManagerActionName' => 'listfile',
			'fileManagerListPath' => $this->php_path.'/file/',
			'fileManagerUrlPrefix' => $this->php_url,
			'fileManagerListSize' => 20,
			'fileManagerAllowFiles' => array ('.png','.jpg','.jpeg','.gif','.bmp','.flv','.swf','.mkv','.avi','.rm','.rmvb','.mpeg','.mpg','.ogg','.ogv','.mov','.wmv','.mp4','.webm','.mp3','.wav','.mid','.rar','.zip','.tar','.gz','.7z','.bz2','.cab','.iso','.doc','.docx','.xls','.xlsx','.ppt','.pptx','.pdf','.txt','.md','.xml', ),
		);

		$action = $_GET['action'];

		switch ($action) {
			case 'config':
			$result =  json_encode($CONFIG);
			break;

			/* 上传图片 */
			case 'uploadimage':
			/* 上传涂鸦 */
			case 'uploadscrawl':
			/* 上传视频 */
			case 'uploadvideo':
			/* 上传文件 */
			case 'uploadfile':
			// $result = include("action_upload.php");
				$result = $this->_upload($CONFIG);
			break;

			/* 列出图片 */
			case 'listimage':
				$result = $this->_list($CONFIG);
			// $result = include("action_list.php");
			break;
			/* 列出文件 */
			case 'listfile':
				$result = $this->_list($CONFIG);
			// $result = include("action_list.php");
			break;

			/* 抓取远程文件 */
			case 'catchimage':
				$result = $this->_crawler($CONFIG);
			// $result = include("action_crawler.php");
			break;

			default:
			$result = json_encode(array(
				'state'=> '请求地址出错'
				));
			break;
		}

		/* 输出结果 */
		if (isset($_GET["callback"])) {
			if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
				echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
			} else {
				echo json_encode(array(
					'state'=> 'callback参数不合法'
					));
			}
		} else {
			echo $result;
		}
	}

	public function _upload($CONFIG)
	{
		/**
		 * 上传附件和上传视频
		 * User: Jinqn
		 * Date: 14-04-09
		 * Time: 上午10:17
		 */
		// include "Uploader.class.php";

		/* 上传配置 */
		$base64 = "upload";
		switch (htmlspecialchars($_GET['action'])) {
			case 'uploadimage':
			$config = array(
				"pathFormat" => $CONFIG['imagePathFormat'],
				"maxSize" => $CONFIG['imageMaxSize'],
				"allowFiles" => $CONFIG['imageAllowFiles']
				);
			$fieldName = $CONFIG['imageFieldName'];
			break;
			case 'uploadscrawl':
			$config = array(
				"pathFormat" => $CONFIG['scrawlPathFormat'],
				"maxSize" => $CONFIG['scrawlMaxSize'],
				"allowFiles" => $CONFIG['scrawlAllowFiles'],
				"oriName" => "scrawl.png"
				);
			$fieldName = $CONFIG['scrawlFieldName'];
			$base64 = "base64";
			break;
			case 'uploadvideo':
			$config = array(
				"pathFormat" => $CONFIG['videoPathFormat'],
				"maxSize" => $CONFIG['videoMaxSize'],
				"allowFiles" => $CONFIG['videoAllowFiles']
				);
			$fieldName = $CONFIG['videoFieldName'];
			break;
			case 'uploadfile':
			default:
			$config = array(
				"pathFormat" => $CONFIG['filePathFormat'],
				"maxSize" => $CONFIG['fileMaxSize'],
				"allowFiles" => $CONFIG['fileAllowFiles']
				);
			$fieldName = $CONFIG['fileFieldName'];
			break;
		}

		/* 生成上传实例对象并完成上传 */
		$up = new Uploader($fieldName, $config, $base64);

		/**
		 * 得到上传文件所对应的各个参数,数组结构
		 * array(
		 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
		 *     "url" => "",            //返回的地址
		 *     "title" => "",          //新文件名
		 *     "original" => "",       //原始文件名
		 *     "type" => ""            //文件类型
		 *     "size" => "",           //文件大小
		 * )
		 */
		$data = $up->getFileInfo();
		if ( htmlspecialchars($_GET['action']) == 'uploadimage') {
			// 水印
			$this->_watermark($data['url']);
			// 压缩
			$this->_scale($data['url']);
		}

		/* 返回数据 */
		return json_encode($data);

	}

	public function _list($CONFIG)
	{

		/**
		 * 获取已上传的文件列表
		 * User: Jinqn
		 * Date: 14-04-09
		 * Time: 上午10:17
		 */
		// include "Uploader.class.php";

		/* 判断类型 */
		switch ($_GET['action']) {
		    /* 列出文件 */
		    case 'listfile':
		        $allowFiles = $CONFIG['fileManagerAllowFiles'];
		        $listSize = $CONFIG['fileManagerListSize'];
		        $path = $CONFIG['fileManagerListPath'];
		        break;
		    /* 列出图片 */
		    case 'listimage':
		    default:
		        $allowFiles = $CONFIG['imageManagerAllowFiles'];
		        $listSize = $CONFIG['imageManagerListSize'];
		        $path = $CONFIG['imageManagerListPath'];
		}
		$allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);

		/* 获取参数 */
		$size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
		$start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
		$end = $start + $size;

		/* 获取文件列表 */
		// $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
		$path = UPLOAD_PATH . (substr($path, 0, 1) == "/" ? "":"/") . $path;
		$files = ue_getfiles($path, $allowFiles);
		if (!count($files)) {
		    return json_encode(array(
		        "state" => "no match file",
		        "list" => array(),
		        "start" => $start,
		        "total" => count($files)
		    ));
		}

		/* 获取指定范围的列表 */
		$len = count($files);
		for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
		    $list[] = $files[$i];
		}
		//倒序
		//for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
		//    $list[] = $files[$i];
		//}

		/* 返回数据 */
		$result = json_encode(array(
		    "state" => "SUCCESS",
		    "list" => $list,
		    "start" => $start,
		    "total" => count($files)
		));

		return $result;

	}

	public function _crawler($CONFIG)
	{
		/**
		 * 抓取远程图片
		 * User: Jinqn
		 * Date: 14-04-14
		 * Time: 下午19:18
		 */
		set_time_limit(0);
		// include("Uploader.class.php");

		/* 上传配置 */
		$config = array(
		    "pathFormat" => $CONFIG['catcherPathFormat'],
		    "maxSize" => $CONFIG['catcherMaxSize'],
		    "allowFiles" => $CONFIG['catcherAllowFiles'],
		    "oriName" => "remote.png"
		);
		$fieldName = $CONFIG['catcherFieldName'];

		/* 抓取远程图片 */
		$list = array();
		if (isset($_POST[$fieldName])) {
		    $source = $_POST[$fieldName];
		} else {
		    $source = $_GET[$fieldName];
		}
		foreach ($source as $imgUrl) {
		    $item = new Uploader($imgUrl, $config, "remote");
		    $info = $item->getFileInfo();
		    array_push($list, array(
		        "state" => $info["state"],
		        "url" => $info["url"],
		        "size" => $info["size"],
		        "title" => htmlspecialchars($info["title"]),
		        "original" => htmlspecialchars($info["original"]),
		        "source" => htmlspecialchars($imgUrl)
		    ));
		}

		/* 返回抓取数据 */
		return json_encode(array(
		    'state'=> count($list) ? 'SUCCESS':'ERROR',
		    'list'=> $list
		));
	}

	    // 水印
    protected function _watermark($url){
        $w = $this->mcfg->get('upload','watermark');
        if ($w) {
            $this->load->library('image_lib');

            if ( is_numeric($w) and $f = one_upload($w) and file_exists(UPLOAD_PATH.$f['url'])) {
                $config['wm_type'] = 'overlay';
                $config['wm_overlay_path'] = UPLOAD_PATH.$f['url'];
                $config['wm_opacity'] = '50';
                $config['wm_x_transp'] = '4';
                $config['wm_y_transp'] = '4';
            }else{
                $config['wm_type'] = 'text';
                $config['wm_text'] = GLOBAL_URL;
                $config['wm_font_size'] = '30';
                $config['wm_font_color'] = 'ffffff';
                $config['wm_shadow_color'] = '333333';
                $config['wm_shadow_distance'] = '3';
            }

            $config['image_library'] = 'gd';
            $config['dynamic_output'] = FALSE;
            $config['quality'] = '80%';
            $config['wm_padding'] = '5';
            $config['wm_vrt_alignment'] = 'bottom';
            $config['wm_hor_alignment'] = 'right';
            $config['wm_vrt_offset'] = '-20';
            $config['wm_hor_offset'] = '-20';

            if (preg_match('/(gif|png|jpg|jpeg)$/i', $url)) {
            	$config['source_image'] =  UPLOAD_PATH.$url;
            	$this->image_lib->initialize($config);
            	$this->image_lib->watermark();
            }
        }
    }

		// 编辑器图片，内容宽度压缩
		protected function _scale($url){
			$_w = intval($this->mcfg->get('upload','scale_width'));
			$_h = intval($this->mcfg->get('upload','scale_height'));

			if ($_w > 0 and $_h > 0) {
				$this->load->library('image_lib');
				// $config['create_thumb'] = TRUE;
				// $config['thumb_marker'] = '_mb';
				$config['quality'] = '100';
				$config['width'] = $_w;
				$config['height'] = $_h;
				$config['master_dim'] = 'width';
				if (preg_match('/(gif|png|jpg|jpeg)$/i', $url) ) {
					$config['source_image'] =  UPLOAD_PATH.$url;
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}
			}
		}

}

/**
 * 遍历获取目录下的指定类型的文件
 * @param $path
 * @param array $files
 * @return array
 */
function ue_getfiles($path, $allowFiles, &$files = array())
{
    if (!is_dir($path)) return null;
    if(substr($path, strlen($path) - 1) != '/') $path .= '/';
    $handle = opendir($path);
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $path2 = $path . $file;
            if (is_dir($path2)) {
                ue_getfiles($path2, $allowFiles, $files);
            } else {
                if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
                    $files[] = array(
                        // 'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                        'url'=> substr($path2, strlen(UPLOAD_PATH)),
                        'mtime'=> filemtime($path2)
                    );
                }
            }
        }
    }
    return $files;
}
