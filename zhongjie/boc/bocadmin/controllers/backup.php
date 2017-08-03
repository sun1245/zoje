<?php

/**
* 备份
*/
class Backup extends Base_Controller
{

	private $filename;
	private $tmpsql;

	function __construct()
	{
		parent::__construct();
		$this->filename = $this->db->database.date('YmdHi', time());
		$this->tmpsql = APPPATH.'cache/'.$this->filename.'.sql';
	}

	function index(){
		$vdata['title'] = '备份';
		$vdata['list'] = $this->listzip_ajax();
		$this->_display($vdata);
	}

	/**
	 * 查找出备份文件
	 * @return [type] [description]
	 */
	public function listzip_ajax()
	{
		$this->load->helper('file');
		$dir = get_dir_file_info(APPPATH.'cache/');
		$list = array();
		foreach ($dir as $f) {
			if ((preg_match('/^'.$this->db->database.'[\d]+\.zip$/', $f['name']))) {
				array_unshift($list, $f['name']);
			}
		}

		if ($this->input->is_ajax_request()) {
			$vdata['list'] = $list;
			if ($list) {
				$vdata['status'] = 1;
			}else{
				$vdata['status'] = 0;
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
		}else{
			return $list;
		}
	}

	/**
	 * 删除文件
	 * @param  boolean $name [description]
	 * @return [type]        [description]
	 */
	public function removezip_ajax($name=false)
	{
		$vdata = array("status"=>0,"msg"=>"未选择文件");

		if ($name and preg_match('/^'.$this->db->database.'[\d]+\.zip$/', $name) and file_exists(APPPATH.'cache/'.$name)) {
			unlink(APPPATH.'cache/'.$name);
			$vdata = array("status"=>1,"msg"=>"已经删除文件 ".$name."！");
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	/**
	 *  数据备份
	 * @return [type] [description]
	 */
	public function data()
	{

        $this->load->helper('file');
		// when the cache dir can't write
		if (!new_is_writeable(APPPATH.'cache')){
			$vdata = array('msg'=>"cache文件夹没有写入权限");
			header('HTTP/1.1 500 Internal Server Error');
			$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
			return false;
		}

		if (file_exists($this->tmpsql)) {
			unlink($this->tmpsql);
		}
		$this->db->set_dbprefix('');
		$this->_wfile("-- START TIME: ".date('Y-m-d H:i:s', time()));
		$this->_wfile("-- DATABASE NAME: ".$this->db->database);
		$this->_wfile();
		// $tables_test = $this->db->query('SHOW CREATE DATABASE bocms')->result_array();
		// 表处理
		foreach ($this->db->list_tables() as  $table) {

			$this->_wfile("-- Table structure for $table ");

			$this->_wfile("DROP TABLE IF EXISTS `$table`;");
			$this->_wfile("/*!40101 SET @saved_cs_client     = @@character_set_client */;");
			$this->_wfile("/*!40101 SET character_set_client = utf8 */;");

			$tableCreate = $this->db->query("SHOW CREATE TABLE `$table`")->row_array();
			$this->_wfile($tableCreate['Create Table'].';');
			$this->_wfile("/*!40101 SET character_set_client = @saved_cs_client */;");
			$this->_wfile();

			$this->_wfile("-- Dumping data for table `$table`");
			$this->_wfile("LOCK TABLES `$table` WRITE;");
			$this->_wfile("/*!40000 ALTER TABLE `$table` DISABLE KEYS */;");
			// 数据处理
			$tableList = $this->db->query("SELECT * FROM `$table`")->result_array();
			$countList = count($tableList);
			if ($countList) {
				$this->_wfile("INSERT INTO `$table` (`".implode("`,`",$this->db->list_fields($table))."`) VALUES");
				foreach ($tableList as $k => $v) {
					$tmp_str = "(";
					$v_k_end = end(array_keys($v));
					foreach ($v as $k2 => $u) {
						if (is_null($u)) {
							$tmp_str .= "NULL";
						}else{
							$tmp_str .= "'$u'";
						}
						// 最后一条
						$tmp_str .= $v_k_end == $k2 ? "":",";
					}
					// 结束插入
					$tmp_str .= ($countList-1) == $k ? ");":"),";
					$this->_wfile($tmp_str);
					unset($tmp_str);
				}
			}
			$this->_wfile("/*!40000 ALTER TABLE `$table` ENABLE KEYS */;");
			$this->_wfile("UNLOCK TABLES;");

			$this->_wfile();
		}

		$this->_wfile("-- END TIME: ".date('Y-m-d H:i:s', time()));

		// 压缩下载
		$this->load->library('zip');
		$this->zip->read_file($this->tmpsql);
		$this->zip->archive( APPPATH.'cache/'.$this->filename.'.zip');
		unlink($this->tmpsql);
		$this->zip->download($this->filename.'.zip');
	}
	/**
	 * 数据写入
	 * @param  string $str 具体内容
	 */
	function _wfile($str="\r\n")
	{
		$datafile=fopen($this->tmpsql,"a+");
		fwrite($datafile,$str."\r\n");
		fclose($datafile);
	}
}

