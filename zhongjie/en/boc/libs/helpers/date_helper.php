<?php
/**
 * Returns the current datetime value in MySQL format
 *
 * @access	public
 * @return	string
 */
function datetime_now($hms = TRUE){
	if ($hms)
	{
		return date("Y/m/d H:i:s");
	}
	else
	{
		return date("Y/m/d");
	}
}

// 返回日期的 unix
function day_unix($time = '', $unix = FALSE)
{
	if (is_string($time)) {
		$r = day_human(strtotime($time), $unix);
	}else{
		$r = day_human($time, $unix);
	}
	return strtotime($r);
}

// 返回日期 string
function day_human($time = '', $unix = FALSE)
{
	$r = date('Y/m/d', $time);
	return $r;
}

// 计算出给出的日期是星期几
function week_day($date) {
    $dateArr = explode("-", $date);
    return date("w", mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]));
}

// 检查日期是否合法日期
function check_date($date) {
	preg_match('/^([0-9]{4})\/([0-9]{1,2})\/([0-9]{1,2})/',$date,$d);
	if ($d) {
		array_shift($d);
		if(checkdate($d[1], $d[2], $d[0])){
			return $d;
		}
	}
	return false;
}

// 检查时间是否合法时间
function check_time($time) {
	$timeArr = explode(":", $time);
    if (is_numeric($timeArr[0]) && is_numeric($timeArr[1]) && is_numeric($timeArr[2])) { //OSPHP.COm.CN
    	if (($timeArr[0] >= 0 && $timeArr[0] <= 23) && ($timeArr[1] >= 0 && $timeArr[1] <= 59) && ($timeArr[2] >= 0 && $timeArr[2] <= 59))
    		return true;
    	else
    		return false;
    }
    return false;
}

/**
 * 给指定日期时间增加时间
 * @param $date string 标准时间
 * @param $add int
 * @param $mode='m' (y-年,m-月,d-日,h-时,i-分,s-秒)
 * @return
 */
function addDateTime( $date, $add = 0, $mode = 'h' ){
    $date = preg_split( '/[-\/ :]/', $date );
    list( $y, $m, $d, $h, $i, $s ) = array_map( 'intval', $date );
    $mode = strtolower( $mode );
    $$mode += abs( $add );
    return date( 'Y-m-d H:i:s', mktime( $h, $i, $s, $m, $d, $y ) );
}

/**
 * 计算时间差：默认返回类型为“分钟”
 * @param $old_time unix time
 * @param $return_type='m' h/m/s
 * @return $dif int
 */
function timelag($old_time,$return_type='m'){
	if($old_time < 1){
		echo '无效的Unix时间戳';
	}else{
		switch($return_type){
			case 'h':
			$type = 3600; break;
			case 'm':
			$type = 60; break;
			case 's':
			$type = 1; break;
			case '':
			$type = 60; break;
		}
		$dif = round( (time()-$old_time)/$type ) ;
		return $dif;
	}
}

// 微妙 用于rand
function nanoSecond($unix=false)
{
	if ($unix) {
		return str_replace(".", "", microtime(true));
	}
	$time = explode(".", microtime(true));
    return $time[1];
}

if ( !function_exists('timediff')) {
	// 计算时间差/两个时间日期相隔的天数,时,分,秒.
	function timediff( $begin_time, $end_time )
	{
	    if ( $begin_time < $end_time ) {
	        $starttime = $begin_time;
	        $endtime = $end_time;
	    } else {
	        $starttime = $end_time;
	        $endtime = $begin_time;
	    }
	    $timediff = $endtime - $starttime;
	    $days = intval( $timediff / 86400 );
	    $remain = $timediff % 86400;
	    $hours = intval( $remain / 3600 );
	    $remain = $remain % 3600;
	    $mins = intval( $remain / 60 );
	    $secs = $remain % 60;
	    $res = array( "day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs );
	    return $res;
	}
}


function timeFmt($time){
	if (preg_match("/^[0-9]{10,11}$/", $time)) {
		return date('Y-m-d H:i:s',$time);
	}else{
		//todo fmt
		//return date('Y-m-d H:i:s',strtotime($time));
		return $time;
	}
}
