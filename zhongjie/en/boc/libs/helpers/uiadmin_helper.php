<?php
// 主要放置后台 UI 生成器

if (!function_exists('ui_btn_switch')) {
	/**
	 * btn swtich 生成器
	 * @param  string field 字段
	 * @param  any default 默认值
	 * @param  array $arr 列表表  [{title:xxx,value:xxx}],分类 会将 value 取 id
	 * @return html
	 */
	function ui_btn_switch($field=false,$default=false,$arr=false){
		if ($field ===false or $arr===false or $default===false) {
			return false;
		}
		$tmp = '<div class="btn-group btn-switch">';
		// 保证array中有  title ,value
		foreach ($arr as $k => $v) {
			// 针对分类
			if (isset($v['id'])) {
				$value = $v['id'];
			}else{
				$value = $v['value'];
			}

			$class= set_switch($field,$value,$default,'btn-primary','');
			$tmp .= '<a href="#" data-value="'.$value.'" class="btn '.$class.'">'.$v['title'].'</a>';
		}
		$tmp .= '</div>';
		$tmp .= '<input type="hidden" id="'.$field.'" name="'.$field.'" value="'.set_value($field,$default).'">';
		return $tmp;
	}
}


/**
 * btn checkedbox 生成器
 * @param  string field 字段
 * @param  any default 默认值
 * @param  array $arr 列表表  [{title:xxx,value:xxx}],分类 会将 value 取 id
 * @return html
 * 例子: 对多选分类 , 在 表单验证规则中使用 `ctype[]` 带有 `[]`的样式进行处理.
 	<div class="control-group">
        <label for="ctype[]" class="control-label">类型:</label>
        <div class="controls">
        <?php
        $ctype=list_coltypes($this->cid,0,'ctype');
        echo ui_btn_checkedbox('ctype[]','',$ctype);
        ?>
        </div>
    </div>
 *
 */
    function ui_btn_checkedbox($field=false,$default=false,$arr=false){
    	if ($field ===false or $arr===false or $default===false) {
    		return false;
    	}
    	$str = '<div class="btn-group ui-checkbox" data-toggle="buttons-checkbox">';

    	$check_list  =   set_value($field,$default);
    	if (!is_array($check_list)) {
    		$check_list = explode(',',$check_list);
    	}
    	foreach ($arr as $k => $v){
    		if (isset($v['id'])) {
    			$value = $v['id'];
    		}else{
    			$value = $v['value'];
    		}
    		if (in_array($value,$check_list) ) {
    			$str .= '<button type="button" class="btn btn-info active" >';
    			$str .= '<input type="checkbox" name="'.$field.'" value="'.$value.'" checked class="hide"> ';
    		}else{
    			$str .= '<button type="button" class="btn btn-info" >';
    			$str .= '<input type="checkbox" name="'.$field.'" value="'.$value.'" class="hide"> ';
    		}
    		$str .= $v['title'].'</button>';
    	}
    	$str.='</div>';;
    	return $str;

    }

    if (!function_exists('ui_btn_select')) {
	/**
	 * btn select 生成器
	 * @param  string field 字段
	 * @param  any default 默认值
	 * @param  array $arr 列表表  [{title:xxx,value:xxx}],分类 会将 value 取 id
	 * @return html
	 */
	function ui_btn_select($field=false,$default=false,$arr=false){
		if ($field ===false or $arr===false or $default===false) {
			return false;
		}

		// $fn = function($v,$o){
		// 	return
		// };

		// $fn = '<option title="{{$v["title"]}}" value="{{$v["value"]}}" '.set_switch($o['field'], $v['value'], $o['default'], ' selected="selected" class="option-select" ','').'>'.$v['op_header'].'&nbsp;'. $v['title'].'</option>'

		$tmp = '<select name="'.$field.'" id="'.$field.'" class="bselect" data-size="auto" data-live-search="true">';
		$tmp .= ui_tree($arr,array('field'=>$field,'default'=>$default));
		$tmp .= '</select>';
		return $tmp;
	}
}


if (!function_exists('ui_btn_coltypes')) {
	/**
	 * 类别按钮
	 * @param  string $ids 上传列表值
	 * @return array       数组
	 */
	function ui_btn_coltypes($cid=0,$field=false){
		if (!is_numeric($cid) or !$field) {
			return false;
		}
		$CI =& get_instance();
		$url = site_url('coltypes/index/').'?cid='.$cid.'&field='.$field.'&rc='.$CI->class;
		$tmp = '<a href="'.$url.'" class="btn btn-info" title="'.lang($field).'">管理'.lang($field).'</a>';
		return $tmp;
	}
}

// TODO:废弃
if (!function_exists('ui_btns_coltypes')) {
	/**
	 * 类别列表按钮
	 * @param  integer $cid     cid
	 * @param  boolean $field   类别字段
	 * @param  boolean $baseurl 基本地址
	 * @return string           按钮组
	 */
	function ui_btns_coltypes($cid=0,$field=false,$baseurl=false){

		$tmp = '<div class="btn-group">';
		$active = false;
		if (isset($_GET[$field])) {
			$active = $_GET[$field];
		}
		if (!$active) {
			$tmp .= '<a href="'.$baseurl.'" class="btn btn-primary">所有</a>';
		}else{
			$tmp .= '<a href="'.$baseurl.'" class="btn">所有</a>';
		}
		$CI =& get_instance();
		$arr = list_coltypes($cid,'typea');
		foreach ($arr as $k => $v) {
			$tmp .='<a href="'.$baseurl.'&'.$field.'='.$v['id'].'" class="btn';
			if ($v['id'] == $active) {
				$tmp .= " btn-primary";
			}
			$tmp .='">'.$v['title'].'</a>';
		}
		$tmp .="</div>";
		return $tmp;
	}
}

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

// 树形数组结构输入
// 栏目列表组织
// list 结构数据
// padding 默认追加的内容
// fn 函数 function($v,$o); $v 为 list 单个信息， $fn_o 为额外内容
function ui_tree($list=false,$fn_o=false,$padding = array()){
	//$option=array('field'=>'','default'=>0)) {

	if (!$list) {
		return "";
	}

	$tree = "";

	foreach ($list as $k => $v) {

		// 追加头部
		$op_header = "";
		// 针对分类-
		if (!isset($v['value'])) {
			$v['value'] = $v['id'];
		}

		$op_header.=implode('', $padding);

		// 如果当序列是最后一个
		if (isset($v['depth']) and $v['depth']) {
			// 如果有下一个
			if (isset($list[$k+1]) and $list[$k+1]['depth'] == $v['depth']) {
				$op_header .= '├';
			} else {
				// 结尾
				$op_header .= '└';
			}
			$op_header .= '';
		}

		if (isset($v['more']) and $v['more']) {
			$op_header .='&nbsp;<span class="fa">&#xf13a;</span>';
		}else{
			$op_header .='&nbsp;<span class="fa">&#xf10c;</span>';
		}

		$v['op_header'] = $op_header;

		// if ($fn !== false) {
			// $tree .= $fn($v,$fn_o);
		$tree.=	'<option title="'.$v['title'].'" value="'.$v['value'].'" '.set_switch($fn_o['field'], $v['value'], $fn_o['default'], ' selected="selected" class="option-select" ','').'>'.$v['op_header'].'&nbsp;'. $v['title'].'</option>';
		// }

		if (isset($v['more']) and is_array($v['more']) ) {
			$p = $padding;
			if (isset($list[$k+1]) and $v['depth']) {
				array_push($p, '│');
			}else{
				if ($v['depth']) {
					array_push($p, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				}
			}
			$tree .= ui_tree($v['more'],$fn_o,$p);
		}
	}

	return $tree;

}

function ui_tree_col($list=false,$padding = array()){
	//$option=array('field'=>'','default'=>0)) {

	if (!$list) {
		return "";
	}

	$tree = "";

	foreach ($list as $k => $v) {

		// 追加头部
		$op_header = "";
		// 针对分类-
		if (!isset($v['value'])) {
			$v['value'] = $v['id'];
		}

		$op_header.=implode('', $padding);

		// 如果当序列是最后一个
		if (isset($v['depth']) and $v['depth']) {
			// 如果有下一个
			if (isset($list[$k+1]) and $list[$k+1]['depth'] == $v['depth']) {
				$op_header .= '├';
			} else {
				// 结尾
				$op_header .= '└';
			}
			$op_header .= '';
		}

		if (isset($v['more']) and $v['more']) {
			$op_header .='&nbsp;<span class="fa">&#xf13a;</span>';
		}else{
			$op_header .='&nbsp;<span class="fa">&#xf10c;</span>';
		}

		$v['op_header'] = $op_header;


// center
		$tree.= '<li data-id="'.$v['cid'].'" data-sort="'.$v['csort_id'].'">';
		$tree.= '<span> <input class="select-it" type="checkbox" value="'.$v['cid'].'" > </span>';
		// $tree.= '<span class="label"> '.$v['cid'].'</span>';

		$tree .= $v['op_header'];

		$tree.= ' <a href="'.GLOBAL_URL.'index.php/'.$v['path'].'" target="_blank"> <span> '.$v['ctitle'] .' </span></a> - <span class="label label-success">'.$v['cid'].'</span><span class="label" title="'.$v['path'].'" >'.$v['cidentify'].'</span>';
		if ( ENVIRONMENT == "development") {
			$tree.= '<span class="label label-info">'.$v['temp_index'].'</span><span class="label">'.$v['temp_show'].'</span>' ;;
		}
		$tree.= '<div class="btn-group pull-right">';
		if ($v['cshow']){
			$tree .= '<a href="#" class="btn btn-primary btn-small btn-ajax-show" data-id="'.$v['cid'].'" data-show="0">  <i class="fa fa-eye"></i></a>';
		}else{
			$tree .='<a href="#" class="btn btn-small btn-ajax-show" data-id="'.$v['cid'].'" data-show="1"> <i class="fa fa-eye-slash"></i></a>';
		}
		$tree.= '<a class="btn btn-small" href="'.site_url('columns/edit/'.$v['cid']).' " title="'.lang('edit').'"> <i class="fa fa-pencil"></i> </a>';
		$tree.= '<a class="btn btn-small" href="'.site_url('coltypes/index/').'?c='.$v['cid'].'&field=ctype&rc='.$v['controller'].' " title="分类管理"> <i class="fa fa-magnet "></i> </a>';
		$tree.= '<a class="btn btn-danger btn-small btn-del" href="#" title="'.lang('del').'" data-id="'.$v['cid'].'"> <i class="fa fa-times"></i> </a>';
		$tree.= '</div>';
		$tree.= '</li>';
// end center;

		if (isset($v['more']) and is_array($v['more']) ) {
			$p = $padding;
			if (isset($list[$k+1]) and $v['depth']) {
				array_push($p, '│');
			}else{
				if ($v['depth']) {
					array_push($p, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				}
			}
			$tree .= ui_tree_col($v['more'],$p);
		}
	}

	return $tree;

}

// 类型列表
function ui_tree_coltypes($list=false,$padding = array()){
	//$option=array('field'=>'','default'=>0)) {

	if (!$list) {
		return "";
	}

	$tree = "";

	foreach ($list as $k => $v) {

		// 追加头部
		$op_header = "";
		// 针对分类-
		if (!isset($v['value'])) {
			$v['value'] = $v['id'];
		}

		$op_header.=implode('', $padding);

		// 如果当序列是最后一个
		if (isset($v['depth']) and $v['depth']) {
			// 如果有下一个
			if (isset($list[$k+1]) and $list[$k+1]['depth'] == $v['depth']) {
				$op_header .= '├';
			} else {
				// 结尾
				$op_header .= '└';
			}
			$op_header .= '';
		}

		if (isset($v['more']) and $v['more']) {
			$op_header .='&nbsp;<span class="fa">&#xf13a;</span>';
		}else{
			$op_header .='&nbsp;<span class="fa">&#xf10c;</span>';
		}

		$v['op_header'] = $op_header;

		// center
		$tree.= '<li data-id="'.$v['id'].'" data-sort="'.$v['sort_id'].'">';
		$tree.= '<span> <input class="select-it" type="checkbox" value="'.$v['id'].'" > </span>';

		$tree .= $v['op_header'];

		$tree.= '<span> '.$v['title'] .' </span>';
		if ( ENVIRONMENT == "development") {
			$tree.= '<span class="label label-info"> '.$v['id'].'</span>';
		}
		$tree.= '<div class="btn-group pull-right">';
		$tree.= '<a class="btn btn-small" href="'.site_urlc('coltypes/edit/'.$v['id']).' " title="'.lang('edit').'"> <i class="fa fa-pencil"></i> </a>';
		$tree.= '<a class="btn btn-danger btn-small btn-del" href="#" title="'.lang('del').'" data-id="'.$v['id'].'"> <i class="fa fa-times"></i> </a>';
		$tree.= '</div>';
		$tree.= '</li>';
		// end center;

		if (isset($v['more']) and is_array($v['more']) ) {
			$p = $padding;
			if (isset($list[$k+1]) and $v['depth']) {
				array_push($p, '│');
			}else{
				if ($v['depth']) {
					array_push($p, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
				}
			}
			$tree .= ui_tree_coltypes($v['more'],$p);
		}
	}

	return $tree;

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
		$sql = "select d.id,d.title,d.dealeraddress,d.lal,d.cityid,d.dealerid from boc_city as c left join boc_dealer as d on c.yid = d.cityid" . $where;
		return  $CI->db->query($sql)->result();
	}

	function get_Provinces($table,$where='',$cityid='0')
	{
		$CI =& get_instance();
		$CI->load->database();
		$html="<option value=''>请选择</option>";
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
			return "<option value=''>请选择</option>";
		}
	}

	function get_yid($id){
		$CI=&get_instance();
		$CI->load->database();
		$yid = get_Simplify('city','yid',array('yid'=>$id));
		if($yid){
			return $yid->yid;
		}else{
			return '0';
		}
	}

	//根据ID获取省名称---经销商lj
	function get_region_title($id,$table='city')
	{
		$result = get_Simplify($table,'title',array('yid'=>$id));
		if(!empty($result))
		{
			return $result->title;
		} else {
			return '';
		}
	}

	//根据ID获取市名称---经销商lj
	function get_city_title($id,$table='city')
	{
		$result = get_Simplify($table,'title',array('yid'=>$id));
		if(!empty($result))
		{
			return $result->title;
		} else {
			return '';
		}
	}
//地图


/*
*功能：php完美实现下载远程图片保存到本地
*参数：文件url,保存文件目录,保存文件名称，使用的下载方式
*当保存文件名称为空时则使用远程文件原来的名称
*/
function getImage($url,$save_dir='',$filename='',$type=0){
	if(trim($url)==''){
		return array('file_name'=>'','save_path'=>'','error'=>1);
	}
	if(trim($save_dir)==''){
		$save_dir='./';
	}
	if(trim($filename)==''){
    	//保存文件名
		$ext=strrchr($url,'.');
		if($ext!='.gif'&&$ext!='.jpg'&&$ext!='.png'){
			return array('file_name'=>'','save_path'=>'','error'=>3);
		}
		$filename=time().rand().$ext;
	}

	if(0!==strrpos($save_dir,'/')){
		$save_dir.='/';
	}
    //创建保存目录
	if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
		return array('file_name'=>'','save_path'=>'','error'=>5);
	}
    //获取远程文件所采用的方法
	if($type){
		$ch=curl_init();
		$timeout=5;
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
		$img=curl_exec($ch);
		curl_close($ch);
	}else{
		ob_start();
		readfile($url);
		$img=ob_get_contents();
		ob_end_clean();
	}
    //$size=strlen($img);
    //文件大小
	$fp2=@fopen($save_dir.$filename,'a');
	fwrite($fp2,$img);
	fclose($fp2);
	unset($img,$url);
	return array('file_name'=>$filename,'save_path'=>$save_dir.$filename,'error'=>0);

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








