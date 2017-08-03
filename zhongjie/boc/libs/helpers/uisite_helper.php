<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// TODO：舍弃 查看 data_helper one_page
// 获取单页信息
if(!function_exists('tag_single'))
{
	function tag_single($cid,$column='content',$strcut=-1)
	{
		static $a=array();
		$cid=intval($cid);
		if(is_int($column)){
			$strcut=$column;
			$column='content';
		}
		if(!isset($a[$cid])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$cid]=$CI->db->get_where('page',array('cid'=>$cid));
			if($a[$cid]->num_rows()<1){
				$a[$cid]=array();
			}else{
				$a[$cid]=$a[$cid]->row_array();
			}
		}
		if(isset($a[$cid][$column])){
			if($strcut>-1){
				return strcut(strip_tags(nl2br($a[$cid][$column])),$strcut);
			}
			return $a[$cid][$column];
		}
		return '';
	}
}

// TODO：舍弃 查看 data_helper one_page
// 获取单页信息
if(!function_exists('tag_pages'))
{
	function tag_pages($cid,$column='content',$strcut=-1)
	{
		static $a=array();
		$cid=intval($cid);
		if(is_int($column)){
			$strcut=$column;
			$column='content';
		}
		if(!isset($a[$cid])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$cid]=$CI->db->get_where('pageirregular',array('cid'=>$cid));
			if($a[$cid]->num_rows()<1){
				$a[$cid]=array();
			}else{
				$a[$cid]=$a[$cid]->row_array();
			}
		}
		if(isset($a[$cid][$column])){
			if($strcut>-1){
				return strcut(strip_tags(nl2br($a[$cid][$column])),$strcut);
			}
			return $a[$cid][$column];
		}
		return '';
	}
}


// TODO：舍弃 查看 data_helper one_upload/list_upload
// 获取图片
if(!function_exists('tag_photo'))
{
	function tag_photo($id,$column='url')
	{
		static $a=array();
		$id=intval($id);
		if(!isset($a[$id])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$id]=$CI->db->get_where('upload',array('id'=>$id));
			if($a[$id]->num_rows()<1){
				$a[$id]=array();
			}else{
				$a[$id]=$a[$id]->row_array();
			}
		}
		if(isset($a[$id][$column])){
			return $a[$id][$column];
		}
		return '';
	}
}

// TODO：舍弃 查看 data_helper ctype相关
// 获取分类
if(!function_exists('tag_types'))
{
	function tag_types($id,$cid,$column='title')
	{
		static $a=array();
		$id=intval($id);
		if(!isset($a[$id])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$id]=$CI->db->get_where('lists',array('id'=>$id,'cid'=>$cid));
			if($a[$id]->num_rows()<1){
				$a[$id]=array();
			}else{
				$a[$id]=$a[$id]->row_array();
			}
		}
		if(isset($a[$id][$column])){
			return $a[$id][$column];
		}
		return '';
	}
}

// TODO：舍弃 查看 data_helper 栏目相关
// 获取栏目名称
if(!function_exists('tag_columns'))
{
	function tag_columns($id,$column='title')
	{
		static $a=array();
		$id=intval($id);
		if(!isset($a[$id])){
			$CI=&get_instance();
			$CI->load->database();
			$a[$id]=$CI->db->get_where('columns',array('id'=>$id));
			if($a[$id]->num_rows()<1){
				$a[$id]=array();
			}else{
				$a[$id]=$a[$id]->row_array();
			}
		}
		if(isset($a[$id][$column])){
			return $a[$id][$column];
		}
		return '';
	}
}

function htmlchars($string){
	$string = preg_replace("/\s(?=\s)/", '', trim(strip_tags($string)));
	return str_replace("&nbsp;","",$string);
}

function myEscape($str){
	preg_match_all("/[\xc2-\xdf][\x80-\xbf]+|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}|[\x01-\x7f]+/e",$str,$r);
	$str=$r[0];
	$l=count($str);
	for($i=0;$i<$l;$i++){
		$value=ord($str[$i][0]);
		if($value<223){
			$str[$i]=rawurlencode(utf8_decode($str[$i]));
			//先将utf8编码转换为ISO-8859-1编码的单字节字符，urlencode单字节字符.
			//utf8_decode()的作用相当于iconv("UTF-8","CP1252",$v)。
		//}else{
		//	$str[$i]="%u".strtoupper(bin2hex(iconv("UTF-8","UCS-2",$str[$i])));
		//}

		}else if(DIRECTORY_SEPARATOR!='/'){
        	//red hat和一些linux服务器要注释掉下面一行，否则js getcookiex乱码
			$str[$i] = "%u".strtoupper(bin2hex(iconv("UTF-8","UCS-2",$str[$i])));
		}
	}
	return join("",$str);
}

function myUnescape($str){
	$ret='';
	$len=strlen($str);
	for($i=0;$i<$len;$i++){
		if($str[$i]=='%'&&$str[$i+1]=='u'){
			$val=hexdec(substr($str,$i+2,4));
			if($val<0x7f)$ret.=chr($val);
			elseif($val<0x800)$ret.=chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
			else $ret.=chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));
			$i+=5;
		}elseif($str[$i]=='%'){
			$ret.=urldecode(substr($str,$i,3));
			$i+=2;
		}else $ret.=$str[$i];
	}
	return $ret;
}

//符合 uri segment 标准的64编码
//在 javascript 端请用 $.base64.decodex() 解码
function myBase64Encode($s,$in_charset='UTF-8'){
	if(strtoupper($in_charset)!='UTF-8')
		$s=iconv($in_charset,'UTF-8',$s);
	return str_replace('/','|',base64_encode($s));
}

//符合 uri segment 标准的64解码
//在 javascript 端请用 $.base64.encodex() 编码
function myBase64Decode($s, $out_charset='UTF-8'){
	$s=base64_decode(str_replace('|','/',$s));
	if(strtoupper($out_charset)!='UTF-8')
		$s=iconv('UTF-8',$out_charset,$s);
	return $s;
}

//文件下载
function download_files($file_addr,$file_name){
	if (file_exists($file_addr)){
		$filesize = filesize($file_addr);
		header("Expires: Thu, 12 Apr 2012 14:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: ");
		header("Cache-control: private");
		header("Content-Length: " . $filesize);

		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
			header("Content-Disposition: attachment;filename=".urlencode($file_name));
		}else{
			header("Content-Disposition: attachment;filename=".$file_name);
		}

		if (preg_match('#Opera(/| )([0-9].[0-9]{1,2})#', getenv('HTTP_USER_AGENT')) or preg_match('#MSIE ([0-9].[0-9]{1,2})#', getenv('HTTP_USER_AGENT'))) {
			header("Content-Type: application/octetstream; charset=utf-8");
		} else {
			header("Content-Type: application/octet-stream; charset=utf-8");
		}
		readfile($file_addr);
	}else{
		return 'err';
	}
}

//下载大文件
function download_bigfiles($file_addr,$file_name){
	if (file_exists($file_addr)){
		ob_start();
		ini_set('memory_limit','1200M');
		set_time_limit(0);
		$filesize = filesize($file_addr);
		header("Expires: Thu, 12 Apr 2012 14:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header('Content-Description: File Transfer');
		header("Cache-control: private");
		header("Content-Length: " . $filesize);

		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
			header("Content-Disposition: attachment;filename=".urlencode($file_name));
		}else{
			header("Content-Disposition: attachment;filename=".$file_name);
		}

		if (preg_match('#Opera(/| )([0-9].[0-9]{1,2})#', getenv('HTTP_USER_AGENT')) or preg_match('#MSIE ([0-9].[0-9]{1,2})#', getenv('HTTP_USER_AGENT'))) {
			header("Content-Type: application/octetstream; charset=utf-8");
		} else {
			header("Content-Type: application/octet-stream; charset=utf-8");
		}
		ob_clean();
		flush();
		readfile($file_addr);
		exit;
	}else{
		return 'err';
	}
}

function goto_message($message,$uri=-1,$toSiteUrl=true){
	$message=addslashes($message);
	if(is_int($uri))$uri='history.go('.$uri.');';
	else if($toSiteUrl)$uri='location.href="'.site_url($uri).'";';
	header("Content-type:text/html;Charset=utf-8");
	exit('<script>alert("'.$message.'");'.$uri.'</script>');
}


	//地图
	/**简化get_where
	 * $result 为空是 使用row()查询，否则为result()查询
	 */
	function get_Simplify($table,$select='',$where='',$result='')
	{
		$CI =& get_instance();
		$CI->load->database();
		if($where == '')
		{
			if($select == '')
			{
				return  $CI->db->get($table)->result();
			} else {
				return  $CI->db->select($select)->get($table)->result();
			}
		} else {
			if ($result=='')
			{
				if ($select == '')
				{
					return  $CI->db->get_where($table,$where)->row();
				} else {
					return  $CI->db->select($select)->get_where($table,$where)->row();
				}
			} else {
				if ($select == '')
				{
					return  $CI->db->get_where($table,$where)->result();
				} else {
					return  $CI->db->select($select)->get_where($table,$where)->result();
				}
			}
		}
	}
	//获取省份
	function get_region($table,$select='',$where='')
	{
		$CI =& get_instance();
		$CI->load->database();
		if ($where == '')
		{
			$where = array('parent_id'=>'0');
		}
		if ($select == '')
		{
			return  $CI->db->get_where($table,$where)->result();
		} else {
			return  $CI->db->select($select)->get_where($table,$where)->result();
		}
	}
	//获取省ID
	function get_regionid($str)
	{
		$where = array('title'=>$str,'parent_id'=>0);
		$data = get_Simplify('city','id',$where);
		if(!empty($data))
		{
			return $data->id;
		} else {
			return '';
		}
	}

	//获取市区yID
	function get_cityid($str)
	{
		$CI =& get_instance();
		$CI->load->database();
		$where = array('title'=>$str,'parent_id >'=>0);
		$data = $CI->db->select('yid')->get_where('city',$where,1)->row();
		if(!empty($data))
		{
			return $data->yid;
		} else {
			return '';
		}
	}

	//获取市区ID
	function get_cityid_servicestition($str)
	{
		$CI =& get_instance();
		$CI->load->database();
		$where = array('title'=>$str,'parent_id >'=>0);
		$data = $CI->db->select('id')->get_where('city',$where,1)->row();
		if(!empty($data))
		{
			return $data->id;
		} else {
			return '';
		}
	}

	//获取市区ID,城市为市
	function get_cityid_servicestition_shi($str)
	{
		if(mb_strpos($str,'市') || mb_strpos($str,'州'))
		{
			$str = mb_substr($str,0,-1);
		}
		$CI =& get_instance();
		$CI->load->database();
		$where = array('title'=>$str,'parent_id >'=>0);
		$data = $CI->db->select('id')->get_where('city',$where,1)->row();
		if(!empty($data))
		{
			return $data->id;
		} else {
			return '';
		}
	}

	//获取经销商
	function get_dealer($where)
	{
		$CI =& get_instance();
		$CI->load->database();
		$where = " where " . $where;
		$where .= " AND d.audit = '1' AND d.show = '1'";
		$sql = "select d.id,d.provinceid,d.cityid,d.title,d.address,d.lal from boc_city as c left join boc_dealer as d on c.yid = d.cityid" . $where;
		return  $CI->db->query($sql)->result();
	}

	function get_Provinces($table,$where='',$cityid='0')
	{
		$CI =& get_instance();
		$CI->load->database();
		$html="<option value='0'>请选择</option>";
		if ($where == '')
		{
			$where = array('parent_id'=>'0');
		}
		if (!$cityid == '0')
		{
			$parent_id = get_Simplify($table,'parent_id',array('yid'=>$cityid));
			$province_id = get_Simplify($table,'id,yid',array('yid'=>$parent_id->parent_id));

			$region_data = get_region($table,'id,yid,title');
			foreach ($region_data as $row)
			{
				if($row->yid == $province_id->yid)
				{
					$html.="<option value='$row->yid' selected>$row->title</option>";
				} else {
					$html.="<option value='$row->yid' >$row->title</option>";
				}
			}
		} else {
			$region_data = get_region($table,'id,yid,title');
			foreach ($region_data as $row)
			{
				$html.="<option value='$row->yid' >$row->title</option>";
			}
		}
		return $html;
	}
	function get_Citys($table,$where='',$cityid='0')
	{
		$CI=&get_instance();
		$CI->load->database();
		if ($where == '')
		{
			$where = array('parent_id'=>'0');
		}
		if (!$cityid == '0')
		{
			$parent_id = get_Simplify($table,'parent_id',array('yid'=>$cityid));
			$province_id = get_Simplify($table,'id,yid',array('yid'=>$parent_id->parent_id));
			$citys = get_Simplify($table,'id,yid,title',array('parent_id'=>$province_id->yid),1);
			$html = "";
			foreach($citys as $key=>$list)
			{
				if($cityid == $list->yid)
					$html .= "<option  value='$list->yid' selected>$list->title</option>";
				else
					$html .= "<option  value='$list->yid' >$list->title</option>";
			}
			return $html;

		} else {
			return "<option value='0'>请选择</option>";
		}
	}

	//地图


	if ( ! function_exists('site_url_ajax'))
	{
		function site_url_ajax($uri = '')
		{
			$CI =& get_instance();
			return $CI->config->site_url_ajax($uri);
		}
	}


	/**
	 * 头部的SEO信息
	 * @param $cid int 栏目id
	 * @param $ctype int 分类id
	 * @return
	 */
	if ( ! function_exists('header_seoinfo'))
	{
		function header_seoinfo($cid,$ctype)
		{
			$CI =& get_instance();

			$columnsinfo=$CI->db->where(array('id'=>$cid))->select('id,title,title_seo,tags,intro')->get('columns')->row_array();
			$title='';
			$tags='';
			$intro='';

			if($CI->router->class == 'welcome' and $CI->router->method == "index"){
				$title=$CI->mcfg->get_config('site','title_seo');
			}else{
				if($ctype){
					$ctypeinfo=$CI->db->where(array('id'=>$ctype))->select('id,title')->get('coltypes')->row_array();
					if(!empty($ctypeinfo)){
						$title=$CI->mcfg->get_config('site','title_suffix').'-'.$ctypeinfo['title'];
					}else{
						$title=$CI->mcfg->get_config('site','title_suffix').'-'.$CI->mcfg->get_config('site','title_seo');
					}
				}else{
					if(!empty($columnsinfo['title_seo'])){
						$title=$CI->mcfg->get_config('site','title_suffix').'-'.$columnsinfo['title_seo'];
					}else{
						$title=$CI->mcfg->get_config('site','title_suffix').'-'.$CI->mcfg->get_config('site','title_seo');
					}
				}
			}

			if(!empty($columnsinfo['tags'])){
				$tags=$columnsinfo['tags'];
			}else{
				$tags=$CI->mcfg->get_config('site','tags');
			}

			if(!empty($columnsinfo['intro'])){
				$intro=$columnsinfo['intro'];
			}else{
				$intro=$CI->mcfg->get_config('site','intro');
			}
			return $data['header'] =array('title'=> $title,'tags'=> $tags,'intro' => $intro);

		}
	}


// 漂浮广告
if(!function_exists('footad'))
{
	function footad()
	{
		$CI=&get_instance();
		$CI->load->database();
		$CI->load->model('advert_model','mad');
		$list = $CI->mad->get_one(array('audit'=>1),'title,photo,link');
		return $list;
	}
}

// 在线客服
if(!function_exists('footqq'))
{
	function footqq()
	{
		$CI=&get_instance();
		$CI->load->database();
		$CI->load->model('onlineservice_model','mqq');
		$list = $CI->mqq->get_all(array('audit'=>1),'title,number,link');
		return $list;
	}
}










