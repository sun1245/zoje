<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('pinyin')) {
    /**
     * @brief 汉字转化拼音 . GBK页面可改为gb2312，其他随意填写为UTF8
     * @param $_String  内容
     * @param $_Code UTF8/gb2312  转换编码当前页面内容
     * @return string
     */
    function pinyin($_String, $_Code='UTF8'){ 
        // 对英文进行转换
        if (preg_match('/^[a-zA-Z0-9_\.\-]{1,}$/',$_String)) {
            return $_String;
        }
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha". 
            "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|". 
            "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er". 
            "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui". 
            "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang". 
            "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang". 
            "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue". 
            "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne". 
            "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen". 
            "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang". 
            "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|". 
            "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|". 
            "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu". 
            "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you". 
            "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|". 
            "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo"; 
        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990". 
            "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725". 
            "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263". 
            "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003". 
            "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697". 
            "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211". 
            "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922". 
            "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468". 
            "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664". 
            "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407". 
            "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959". 
            "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652". 
            "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369". 
            "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128". 
            "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914". 
            "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645". 
            "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149". 
            "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087". 
            "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658". 
            "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340". 
            "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888". 
            "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585". 
            "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847". 
            "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055". 
            "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780". 
            "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274". 
            "|-10270|-10262|-10260|-10256|-10254"; 
        $_TDataKey   = explode('|', $_DataKey); 
        $_TDataValue = explode('|', $_DataValue);
        $_Data = array_combine($_TDataKey, $_TDataValue);
        arsort($_Data); 
        reset($_Data);
        if($_Code!= 'gb2312') $_String = _U2_Utf8_Gb($_String); 
        $_Res = ''; 
        for($i=0; $i<strlen($_String); $i++) { 
            $_P = ord(substr($_String, $i, 1)); 
            if($_P>160) { 
                $_Q = ord(substr($_String, ++$i, 1)); $_P = $_P*256 + $_Q - 65536;
            } 
            $_Res .= _Pinyin($_P, $_Data).'_'; 
        } 
        return preg_replace("/[^a-z0-9_]*_$/", '', $_Res); 
    } 
    function _Pinyin($_Num, $_Data){ 
        if($_Num>0 && $_Num<160 ){
            return chr($_Num);
        }elseif($_Num<-20319 || $_Num>-10247){
            return '';
        }else{ 
            foreach($_Data as $k=>$v){ if($v<=$_Num) break; } 
                return $k; 
        } 
    }
    function _U2_Utf8_Gb($_C){ 
        $_String = '';
        if($_C < 0x80){
            $_String .= $_C;
        }elseif($_C < 0x800) {
            $_String .= chr(0xC0 | $_C>>6);
            $_String .= chr(0x80 | $_C & 0x3F);
        }elseif($_C < 0x10000){
            $_String .= chr(0xE0 | $_C>>12);
            $_String .= chr(0x80 | $_C>>6 & 0x3F); 
            $_String .= chr(0x80 | $_C & 0x3F);
        }elseif($_C < 0x200000) {
            $_String .= chr(0xF0 | $_C>>18);
            $_String .= chr(0x80 | $_C>>12 & 0x3F);
            $_String .= chr(0x80 | $_C>>6 & 0x3F);
            $_String .= chr(0x80 | $_C & 0x3F);
        } 
        return iconv('UTF-8', 'GB2312', $_String); 
    }
}

if (!function_exists('msubstr')) {
    /**
     * 截取字符串 
     * @param  string  $str     输入
     * @param  integer $start   开始位置
     * @param  integer $length  长度
     * @param  string  $charset 编码
     * @param  boolean $suffix  是否使用
     * @return string           输出
     */
    function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
    {
        $suffix_str = '';
        if (mstrlen($str) > $length and $suffix ) {
            $suffix_str = is_string($suffix) ? $suffix : '...';
        }
        if(function_exists("mb_substr")){
            $str = mb_substr($str, $start, $length, $charset);
            return $str.$suffix_str;
        }elseif(function_exists('iconv_substr')) {
            $str = iconv_substr($str,$start,$length,$charset);
            return $str.$suffix_str;
        }
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312']  = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']     = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']    = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
        return $slice.$suffix_str;
    }
}

/**
 * 截取HTML,并自动补全闭合
 * @param $html
 * @param $length
 * @param $end
 */
function subHtml($html,$length) {
   $result = '';
   $tagStack = array();
   $len = 0;
   $contents = preg_split("~(<[^>]+?>)~si",$html, -1,PREG_SPLIT_NO_EMPTY| PREG_SPLIT_DELIM_CAPTURE);
   foreach($contents as $tag)
   {
       if (trim($tag)=="") continue;
       if(preg_match("~<([a-z0-9]+)[^/>]*?/>~si",$tag)){
           $result .= $tag;
       }else if(preg_match("~</([a-z0-9]+)[^/>]*?>~si",$tag,$match)){
           if($tagStack[count($tagStack)-1] == $match[1]){
               array_pop($tagStack);
               $result .= $tag;
           }
       }else if(preg_match("~<([a-z0-9]+)[^/>]*?>~si",$tag,$match)){
           array_push($tagStack,$match[1]);
           $result .= $tag;
       }else if(preg_match("~<!--.*?-->~si",$tag)){
           $result .= $tag;
       }else{
           if($len + mstrlen($tag) < $length){
               $result .= $tag;
               $len += mstrlen($tag); 
           }else {
               $str = msubstr($tag,0,$length-$len+1);
               $result .= $str;
               break;
           }
       }
   }
   while(!empty($tagStack)){
       $result .= '</'.array_pop($tagStack).'>';
   }
   return $result;
}

/**
 * 从开始位置截取utf8字符串（保持向上兼容）
 * @param  string  $string 输入
 * @param  integer $length  长度
 * @param  string  $suffix  添加尾缀
 * @return string          输出
 */
function shorten_utf8($string, $length = 80, $suffix = "") {
    if (!preg_match("(^(" . repeat_pattern("[\t\r\n -\x{FFFF}]", $length) . ")($)?)u", $string, $match)) { // ~s causes trash in $match[2] under some PHP versions, (.|\n) is slow
            preg_match("(^(" . repeat_pattern("[\t\r\n -~]", $length) . ")($)?)", $string, $match);
    }
    return h($match[1]) . $suffix . (isset($match[2]) ? "" : "<i>...</i>");
}

//截取文字（保持向上兼容）按照双字节计算，英文按照两个字符一个汉字来计算
function strcut($src,$cutlength,$dot='…'){
    $ret='';
    $i=$n=$ulen=0;
    $strlen=strlen($src);
    while(($n<$cutlength)&&($i<=$strlen)){
        $temp=substr($src,$i,1);
        $ascnum=ord($temp);
        if($ascnum>=224){
            $ret=$ret.substr($src,$i,3);
            $i+=3;$n++;
        }else if($ascnum>=192){
            $ret=$ret.substr($src,$i,2);
            $i+=2;$n++;
        }else if($ascnum>=65&&$ascnum<=90){
            $ret=$ret.substr($src,$i,1);
            $i++;$n++;
        }else{
            $ret=$ret.substr($src,$i,1);
            $i++;$n+=0.5;
        }
    }
    if(strcmp($src,$ret))$ret.=$dot;
    return $ret;
}



if (! function_exists('rstr_trim')) {
    /** 
     * 清除预定义字符从右侧
     * 
     * @param string $str    要处理的字符串 
     * @param string $remove 预定义字符 
     *  
     * @return string 处理后的字符 
     */ 
    function rstr_trim($str, $remove=null) 
    { 
        $str    = (string)$str; 
        $remove = (string)$remove;    

        if(empty($remove)) 
        { 
            return rtrim($str); 
        } 

        $len = strlen($remove); 
        $offset = strlen($str)-$len; 
        while($offset > 0 && $offset == strpos($str, $remove, $offset)) 
        { 
            $str = substr($str, 0, $offset); 
            $offset = strlen($str)-$len; 
        } 

        return rtrim($str); 
    } 
}

// 将字符(包括中文)转换为unicode
/**
 * 将字符串（兼容中文）转换为unicode  ： 测试 －》 &#27979;&#35797;
 * @param  string $string   输入
 * @param  string $encoding 编码
 * @return string           输出
 */
function unicode_encode( $string = '', $encoding = 'UTF-8' ) {
    if ( empty( $string )  ){
        return false;
    }
    $string = iconv( $encoding, 'UCS-2', $string );
    $array = str_split( $string, 2 ); 
    $unicode = ''; 
    foreach ( $array as $value ){
        $unicode .= '&#' . hexdec( bin2hex( $value ) ) . ';';
    }
    return $unicode;
}

/**
 * 转换数字到中文大写
 * @param  integer $num 数字
 * @return string       中文大写
 */
function num2rmb( $num = 0 ) {
    $num  = round( $num, 2 );
    if ( $num <= 0 ){
        return '零元';
    }
    $unit = array( '', '拾', '佰', '仟', '', '万', '亿', '兆' );
    $char = array( '零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖' );
    $arr = explode( '.', $num );
    $num = strrev( $arr[0] );
    $len = strlen( $num );
    for ( $i = 0; $i < $len; $i++ ){
        $int[$i] = $char[$num[$i]];
        if ( !empty( $num[$i] ) ){
            $int[$i] .= $unit[$i%4];
        }
        if ( $i%4 == 0 ){
            $int[$i] .= $unit[4+floor($i/4)];
        }
    }
    $dec = isset($arr[1]) ? '元' . $char[$arr[1][0]] . '角'. $char[$arr[1][1]] . '分'  : '元整';
    return implode( '', array_reverse( $int ) ) . $dec;
}

/**
 * 编码转换 utf8 到 gb2312
 * @param  string $str 输入
 * @return string      输出
 */
function utf8togbk($str){
    return iconv("UTF-8", "GB2312//IGNORE", $str); 
}

/**
 * 编码转换 gb2312 到 utf8
 * @param  string $str 输入
 * @return string      输出
 */
function gbktoutf8($str){
    return iconv("gb2312","utf-8//IGNORE",$str);
}

/**
 * 判定字符串是否为 utf8 编码
 * @param  string  $word 输入
 * @return boolean       true/false
 */
function isUTF8($word)    {    
    if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true){    
        return true;    
    }else{    
        return false;    
    }
}

// 判定utf8
function is_utf8($val) {
    return (preg_match('~~u', $val) && !preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~', $val));
}

/**
 * @brief 对数组转码
 * @param $in_charset string
 * @param $out_charset string
 * @param $arr array
 * 
 * @return array
 */
function array_iconv($in_charset,$out_charset,$arr){    
    return eval('return '.iconv($in_charset,$out_charset,var_export($arr,true).';'));    
}

/**
 * 去除html tag
 * @param  string $html 
 * @return string       
 */
function html2txt($html)
{
    return preg_replace("~(<[^>]+?>)~si", '', $html);
}

/**
 * 获取字符串长度，包括中英文
 * @param  string $str     输入
 * @param  string $charset 编码
 * @return integer         长度
 */
function mstrlen($str,$charset = 'UTF-8'){
   if (function_exists('mb_substr')) {
       $length=mb_strlen($str,$charset);
   } elseif (function_exists('iconv_substr')) {
       $length=iconv_strlen($str,$charset);
   } else {
    preg_match_all("/[x01-x7f]|[xc2-xdf][x80-xbf]|xe0[xa0-xbf][x80-xbf]|[xe1-xef][x80-xbf][x80-xbf]|xf0[x90-xbf][x80-xbf][x80-xbf]|[xf1-xf7][x80-xbf][x80-xbf][x80-xbf]/", $text, $ar); 
       $length=count($ar[0]);
   }
   return $length;
}


// ------------------------------------------
// TAG 热门关键词相关
// ------------------------------------------

if (!function_exists('get_str_tags()')) {
// 默认获取字符串中的前10个关键词
/**
 * 获取一段文字中的关键词
 * @param  string  $content 字符串
 * @param  string  $tags    关键词，存在的时候会合并
 * @param  integer $top     取出字符串中的热词
 * @return string           关键词字符串
 */
function get_str_tags($content,$tags='',$top = 10){
    $CI =& get_instance();

    if (!isset($CI->pscws4)) {
        // require(APP_ROOT.'/pscws4.class.php');
        // $pscws = new PSCWS4();
        $CI->load->library('pscws4');
    }
    $CI->pscws4->set_dict(LIBS_PATH.'/libraries/dict/dict.utf8.xdb');
    $CI->pscws4->set_rule(LIBS_PATH.'/libraries/dict/rules.utf8.ini');
    $CI->pscws4->set_ignore(true); //去除一些特殊的标点符号之类
    $CI->pscws4->set_duality(true); //去除一些特殊的标点符号之类

    $CI->pscws4->send_text($content);
    $tops = $CI->pscws4->get_tops(20, 'n,v');

    // $arr = array();
    // while ($some = $CI->pscws4->get_result())
    // {
    //    foreach ($some as $word)
    //    {
    //       $arr[] = $word['word'];
    //    }
    // }

    $re = array();
    foreach ($tops as $val) {
        $re[] = $val['word'];
    }
    $CI->pscws4->close();

    return implode(',', $re);

    // if ($tags) {
    //     // 取出和关键词重复的部分,并添加到现有的top中
    //     $re = array_unique(
    //         array_merge(
    //             array_intersect(
    //                 array_keys($this->pa->GetFinallyIndex()),
    //                 explode(',', $tags)
    //                 ),
    //             explode(',', $CI->pa->GetFinallyNouns($top))
    //             )
    //         );
    //     return implode(',', $re);
    // }else{
    //     return $CI->pa->GetFinallyNouns($top);
    // }
}
}

if (!function_exists('rand_preg_replace()')) {
/**
 * 随机替换查找字符串中多个结果中一个
 * @param  pattern $pattern             正则表达式
 * @param  替换字符 $t_g_rand_replace_str 替换字符
 * @param  string $string               输入
 * @return string                       结果
 */
function rand_preg_replace($pattern, $t_g_rand_replace_str, $string)
{
    global $g_rand_replace_num, $g_rand_replace_index, $g_rand_replace_str;
    preg_match_all($pattern, $string, $out);
    $find_count = count($out[0]);
    if ($find_count == 0) {
        return $string;
    }
    $g_rand_replace_num = mt_rand(1, $find_count);  //符合正则搜索条件的集合
    $g_rand_replace_index = 0;  //实际替换过程中的index
    $g_rand_replace_str = $t_g_rand_replace_str;
    // php 5.2 闭包不支持
    // $re = preg_replace_callback( 
    //     $pattern, 
    //     function($matches) use ($g_rand_replace_num, $g_rand_replace_index, $g_rand_replace_str) { 
    //        global $g_rand_replace_num, $g_rand_replace_index, $g_rand_replace_str;
    //        $g_rand_replace_index++;
    //        if($g_rand_replace_num==$g_rand_replace_index){
    //            return $g_rand_replace_str;
    //        }else {
    //            return $matches[0];
    //        } 
    //     }, 
    //     $string 
    // ); 
    $re = preg_replace_callback($pattern, "rand_preg_replace_callback", $string );
    return $re;
}
function rand_preg_replace_callback($matches){ 
   global $g_rand_replace_num, $g_rand_replace_index, $g_rand_replace_str;
   $g_rand_replace_index++;
   if($g_rand_replace_num==$g_rand_replace_index){
       return $g_rand_replace_str;
   }else {
       return $matches[0];
   } 
}       
}

if (!function_exists('link_create()')) {
/**
 * 自动生成关键词链接
 * @param  string $html 
 * @return string      
 */
function link_create($html) {

    // 参看 string_helper get_str_tags 检测文章的热门关键词

    $CI =& get_instance();
    if (!isset($CI->mtags)) {
        $CI->load->model('tags_model', 'mtags');
    }

    // 获取热门链接
    $tags = $CI->mtags->get_kw();

    $contents = preg_split("~(<[^>]+?>)~si",$html, -1,PREG_SPLIT_NO_EMPTY| PREG_SPLIT_DELIM_CAPTURE);
    // 计数
    $count = 0;
    // 概率数
    foreach($contents as $k => $p)
    {
       if (trim($p)=="") continue;
       if (!preg_match('/^</s', $p)) {
            // echo 'ps:' . var_dump($p);
            if (isset($contents[$k+1]) && preg_match('/^<\/(a|img|strong)/s', $contents[$k+1])) {
                continue;
            }else{
                // 判定是否插入链接
                foreach ($tags as $tk => $tag) {
                    $p2 = rand_preg_replace('/'.$tag['tag'].'/', '<a href="'.SITE_URL.$tag['link'].'">'.$tag['tag'].'</a>' ,$p);
                    if ($p2 != $p and $contents[$k] = $p2) {
                        unset($tags[$tk]);
                        break;
                    }
                }
            }
       }
    }
    return implode('',$contents);
}
}