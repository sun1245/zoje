<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * 遍历获取目录下的指定类型的文件
 * @param  	 $path
 * @param  	 array $files
 * @return 	 array
 */
function getfiles( $path , &$files = array() )
{
	if ( !is_dir( $path ) ) return null;
	$handle = opendir( $path );
	while ( false !== ( $file = readdir( $handle ) ) ) {
		if ( $file != '.' && $file != '..' ) {
			$path2 = $path . '/' . $file;
			if ( is_dir( $path2 ) ) {
				getfiles( $path2 , $files );
			} else {
				if ( preg_match( "/\.(gif|jpeg|jpg|png|bmp)$/i" , $file ) ) {
					$files[] = $path2;
				}
			}
		}
	}
	return $files;
}


/**
 * @brief get_filename 获得目录下的文件和文件夹
 * @param $source_dir 目录
 * @param $_recursion
 * @return array('dirs'=> array(dir=>path),'files'=> array(file=>path))
 */
function get_filename($source_dir, $_recursion = FALSE)
{
	static $_filedata = array();

	if ($fp = @opendir($source_dir))
	{
		// reset the array and make sure $source_dir has a trailing slash on the initial call
		if ($_recursion === FALSE)
		{
			$_filedata = array();
			$source_dir = rtrim(realpath($source_dir), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
		}

		while (FALSE !== ($file = readdir($fp)))
		{
			if (@is_dir($source_dir.$file) && strncmp($file, '.', 1) !== 0)
			{
				$_filedata['dirs'][$file] =  $source_dir.$file.DIRECTORY_SEPARATOR ;
			}
			elseif (strncmp($file, '.', 1) !== 0)
			{
				$_filedata['files'][$file] = $source_dir.$file;
			}
		}
		return $_filedata;
	}
	else
	{
		return FALSE;
	}
}

/**
 * 删除整个目录
 * @param $dir
 * @return bool
 */
function delDir( $dir )
{
	//先删除目录下的所有文件：
	$dh = opendir( $dir );
	while ( $file = readdir( $dh ) ) {
		if ( $file != "." && $file != ".." ) {
			$fullpath = $dir . "/" . $file;
			if ( !is_dir( $fullpath ) ) {
				unlink( $fullpath );
			} else {
				delDir( $fullpath );
			}
		}
	}
	closedir( $dh );
	//删除当前文件夹：
	return rmdir( $dir );
}

/**
 * 判断 文件/目录 是否可写（取代系统自带的 is_writeable 函数）
 *
 * @param  string $file 文件/目录
 * @return boolean
 */
function new_is_writeable($file) {
	if (is_dir($file)){
		$dir = $file;
		if ($fp = @fopen("$dir/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$dir/test.txt");
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	} else {
		if ($fp = @fopen($file, 'a+')) {
			@fclose($fp);
			$writeable = 1;
		} else {
			$writeable = 0;
		}
	}

	return $writeable;
}

