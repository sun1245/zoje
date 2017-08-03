<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert extends Base_Controller {

	public function index()
	{
		require_once 'global.inc.php';
		if($_POST){
			$Import_TmpFile = $_FILES['file']['tmp_name'];
			require_once 'excel/reader.php';
			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('utf-8');
			$data->read($Import_TmpFile);
			$array =array();
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
					$array[$i][$j] = $data->sheets[0]['cells'][$i][$j];
				}
			}
			sava_data($array);
			echo "<script>alert('导入数据成功！');</script>";
			echo "<script>window.location.href='".site_url('users')."'</script>";
		}
	}



	public function exl() {

		$this->load->model('users_model','musers');
		$where = array('audit'=>1);
		$orders = array('id' => 'desc');

		$data = $this->musers->get_all($where,'id,username,nickname,email,timeline',$orders);
		$header = array('编号','用户名','昵称','邮箱');
		$filename = "会员列表";
		require_once 'PHPExcel/Classes/PHPExcel.php';

		//创建对象
		$excel = new PHPExcel();
		//Excel表格式,这里简略写了8列
		$letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		//表头数组
		$tableheader = $header;

		//填充表头信息
		for ($i = 0; $i < sizeof($tableheader); $i++) {
			$excel->getActiveSheet()->setCellValue("$letter[$i]1", "$tableheader[$i]");
		}

		// 填充表格信息
		for ($i = 2; $i < sizeof($data) + 2; $i++) {
			$j = 0;
			foreach ($data[$i - 2] as $key => $value) {
				if (is_numeric($value) && $key == 'timeline') {
					$excel->getActiveSheet()->setCellValue("$letter[$j]$i", date('Y-m-d', $value));
				} else {
					$excel->getActiveSheet()->setCellValue("$letter[$j]$i", "$value");
				}
				$j++;
			}
		}

		//创建Excel输入对象
		$write = new PHPExcel_Writer_Excel5($excel);
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Content-Type:application/force-download");
		header("Content-Type:application/vnd.ms-execl");
		header("Content-Type:application/octet-stream");
		header("Content-Type:application/download");
		header('Content-Disposition:attachment;filename="' . $filename . '.xls"');
		header("Content-Transfer-Encoding:binary");
		$write->save('php://output');

	}

}
