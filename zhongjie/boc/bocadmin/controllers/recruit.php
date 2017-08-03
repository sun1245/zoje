<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Recruit extends CI_Controller
 * @author
 * 人才招聘类
 */
class Recruit extends Modules_Controller
{
	protected $rules = array(
		"create" => array(
			array(
				'field'   => 'title',
				'label'   => '招聘岗位',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'amount',
				'label'   => '招聘人数',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'timeline',
				'label'   => '发布日期',
				'rules'   => 'trim|required'
			),array(
				'field'   => 'expiretime',
				'label'   => '截止日期',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'department',
				'label'   => '招聘部门',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'require',
				'label'   => '职称要求',
				'rules'   => 'trim'
			),array(
				'field'   => 'major',
				'label'   => '专业要求',
				'rules'   => 'trim'
			),array(
				'field'   => 'gender',
				'label'   => '性别要求',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'age',
				'label'   => '年龄要求',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'age_max',
				'label'   => '年龄要求',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'edu',
				'label'   => '学历要求',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'experience',
				'label'   => '工作经验',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'place',
				'label'   => '工作地区',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'content',
				'label'   => '详细说明',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'requirement',
				'label'   => '能力要求',
				'rules'   => 'trim'
			)
		),
		"edit" => array(
			array(
				'field'   => 'title',
				'label'   => '招聘岗位',
				'rules'   => 'trim|required'
			),
			array(
				'field'   => 'amount',
				'label'   => '招聘人数',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'timeline',
				'label'   => '发布日期',
				'rules'   => 'trim|required'
			),array(
				'field'   => 'expiretime',
				'label'   => '截止日期',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'department',
				'label'   => '招聘部门',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'require',
				'label'   => '职称要求',
				'rules'   => 'trim'
			),array(
				'field'   => 'major',
				'label'   => '专业要求',
				'rules'   => 'trim'
			),array(
				'field'   => 'gender',
				'label'   => '性别要求',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'age',
				'label'   => '年龄要求',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'age_max',
				'label'   => '年龄要求',
				'rules'   => 'trim|numeric'
			),
			array(
				'field'   => 'edu',
				'label'   => '学历要求',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'experience',
				'label'   => '工作经验',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'place',
				'label'   => '工作地区',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'content',
				'label'   => '详细说明',
				'rules'   => 'trim'
			),
			array(
				'field'   => 'requirement',
				'label'   => '能力要求',
				'rules'   => 'trim'
			)
		),

		"show" => array(
			array(
				'field'   => 'id',
				'label'   => '标识',
				'rules'   => 'trim|required|numeric'
			),
			array(
				'field'   => 'show',
				'label'   => '状态',
				'rules'   => 'trim|required|numeric'
			)
		)
	);

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Upload_model','mupload');
	}

	protected function _index_orders()
	{
		return array('sort_id'=>'desc','id'=>'desc');
	}

	public function _vdata(&$vdata)
	{
		$vdata['title'] = '人才招聘';
		// 对图片文件进行处理
		// if ($this->method == 'edit')
		// {
		// 	// 单个
		// 	$vdata['ps'] = $this->mupload->get_one($vdata['it']['photo']);
		// 	$vdata['title'] = $vdata['title'].' - '.$vdata['it']['title'];
		// }
	}

	public function copypro()
	{
		$ids = $this->input->post('ids');

		$rs=$this->model->get_one($ids);

		unset($rs['id']);
		unset($rs['sort_id']);
		unset($rs['timeline']);

		$id = $this->model->create($rs);
		if ($id) {
			$vdata['msg'] = '复制成功，请刷新查看';
			$vdata['status'] = 1;
		}else{
			$vdata['msg'] = '复制失败，请刷新后重试';
			$vdata['status'] = 0;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($vdata));
	}

	protected function _create_data(){
		$form = $this->input->post();
		$form['timeline'] = strtotime($this->input->post('timeline'));
		$form['expiretime'] = strtotime($this->input->post('expiretime'));
		return $form;
	}

	protected function _edit_data()
	{
		$form = $this->input->post();
		$form['timeline'] = strtotime($this->input->post('timeline'));
		$form['expiretime'] = strtotime($this->input->post('expiretime'));
		return $form;
	}
}
