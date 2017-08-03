<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dealer extends Modules_Controller
{
	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'provinceid',
				'label'   => '省份',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'cityid',
				'label'   => '市区',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'title',
				'label'   => '名称',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'timeline',
				'label'   => '发布时间',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'telphone',
				'label'   => '固定电话',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'mobile',
				'label'   => '移动电话',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'address',
				'label'   => '地址',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'lal',
				'label'   => '经纬度',
				'rules'   => 'trim|required'
				)
			),
		"edit" => array(
			array(
				'field'   => 'provinceid',
				'label'   => '省份',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'cityid',
				'label'   => '市区',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'title',
				'label'   => '名称',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'timeline',
				'label'   => '发布时间',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'telphone',
				'label'   => '固定电话',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'mobile',
				'label'   => '移动电话',
				'rules'   => 'trim'
				),
			array(
				'field'   => 'address',
				'label'   => '地址',
				'rules'   => 'trim|required'
				),
			array(
				'field'   => 'lal',
				'label'   => '经纬度',
				'rules'   => 'trim|required'
				)
			)
		);

public function __construct(){
	parent::__construct();
	$this->load->model('Upload_model','mupload');
	$this->load->helper('date_helper');

}
public function index($cid=false,$page=1)
{
		// 栏目路径
	$vdata['cpath']= $this->mcol->get_path_more($this->cid);
	$vdata['cchildren'] = $this->mcol->get_cols($this->cid);
	$title = $this->mcol->get_one($this->cid,"title");
	$vdata['title'] = $title['title'];

	$limit = 300;
	$this->input->get('limit',TRUE) and is_numeric($this->input->get('limit')) AND $limit = $this->input->get('limit');

	$order = $this->_index_orders();
	if ($this->input->get('order',TRUE)) {
			// TODO: order
			// $orders = explode("-",$this->input->get('order',TRUE));
		$order = $this->input->get('order',TRUE);
	}
	$where_in = array("cid"=>$this->cid,"ccid"=>$this->ccid);
		// 条件必须
	$where = array_merge($this->_index_where(),$where_in);
	$vdata['page'] = $page;
	$vdata['pages'] = $this->_pages(site_url($this->class.'/index/'.$this->cid.'/'),$limit,$where,4);
	$vdata['list'] = $this->model->get_list($limit,$limit*($page-1),$order,$where);
	$this->_display($vdata);
}


public function _vdata(&$vdata)
{
	if (!array_key_exists('title', $vdata) or $vdata['title'] == $this->class) {
		$title = $this->mcol->get_one($this->cid,"title");
		$vdata['title'] = $title['title'];
	}
}



protected function _create_data()
{
	$form = $this->input->post();
	$form['timeline'] = strtotime($this->input->post('timeline'));
	return $form;
}

protected function _edit_data()
{
	$form = $this->input->post();
	$form['timeline'] = strtotime($this->input->post('timeline'));
	return $form;
}

protected function _edit(){
	$data = $this->_edit_data();
	$vdata['id'] = $data['id'];
	if($this->model->update($data,'id = '.$data['id'])){
		$this->_edit_after($data);
		$vdata['msg'] = '已经成功修改了信息！';
		$vdata['status'] = 1;
		$this->mlogs->add('update','更新数据id:'. $data['id']);
	}else{
		$vdata['msg'] = '没有做任何的改动';
		$vdata['status'] = 0;
	}

	$vdata['back_url'] = site_url('dealer/index/'.$this->cid.'/'.$this->input->get('p'));

	if ($this->input->is_ajax_request()) {
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}else{
		$this->load->view('msg',$vdata);
	}
}



protected function change_resion()
{
	$id = intval($this->uri->segment(3,1));
	$html = '';
	if(!$id == '0')
	{
		$this->load->database();
		$city_data = get_Simplify('boc_city','id,yid,title',array('parent_id'=>$id),'1');
		foreach($city_data as $row)
		{
			$html .= "<option value='$row->yid'>$row->title</option>";
		}
	} else {
		$html = "<option value='0'>请选择</option>";
	}
	echo $html;
}
}