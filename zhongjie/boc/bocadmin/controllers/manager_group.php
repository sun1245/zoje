<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Manager_groups extends CRUD_Controller
 * @author 
 */
class Manager_group extends CRUD_Controller
{
	protected $rules = array(
		"rule" => array(
			array(
				'field'   => 'title', 
				'label'   => '用户组名称', 
				'rules'   => 'trim|required'
			),
		)
	);

	protected function _hook()
	{
		if ($this->session->userdata('gid')!=1) {
			$vdata = array('status'=>0,'msg'=>'您并没有权限访问此页面！','url'=>site_url('welcome/index'));
			$str =$this->load->view('msg',$vdata,TRUE);
			echo($str);exit();
		}
	}

	// 模板加载数据
	protected function _vdata(&$vdata)
	{
		$vdata['title']='用户组';
		$method = $this->router->method;
		if ($method == "create" OR $method == "edit") {
			// 输出 cols &cols = id
			$vdata['pur']  = $this->mpur->get_perview_lv1();
			$vdata['cols'] = $this->_get_cols();
		}
	}

	protected function _create_data(){
		$form=$this->input->post();
		$form['purview'] = implode(",", $form['purview']);
		return $form;
	}


	protected function _edit_data(){
		$form=$this->input->post();
		$form['purview'] = implode(",", $form['purview']);
		return $form;
	}

	/**
	 * 递归获得cols级别
	 * @param  integer $fid 0 
	 * @return array   $cols
	 */
	protected function _get_cols($fid = 0){
		$cols = $this->mcol->get_cols($fid);
		foreach ($cols as $k => $v) {
			$cols[$k]['purview'] = $this->mpur->get_perview_list_cid($v['cid']);

			if ($v['more'] > 0) {
				$cols[$k]['more'] = $this->_get_cols($v['cid']);
			}
		}
		return $cols;
	}
	
}

// 提供 purview 递归输出
function list_cols($cols = false,$purs = false){
	if ($cols === false) {
		return "<li>nothing...</li>";
	}

	if ($purs and is_string($purs)) {
		$purs = explode(",",$purs);
	}

	$list = "";
	foreach ($cols as $k => $v) {
		$purview = "";
		if (is_array($v['purview']) and $v['purview'] ) {
			foreach ($v['purview'] as $pk => $pv) {
				$checked = false;
				if ($purs and is_array($purs) and in_array($pv['uri'], $purs)) {
					$checked = true;
				}
				$purview .= '<label class="checkbox">'
				.form_checkbox('purview[]', $pv['uri'],$checked)
				.$pv['title']
				. '</label>';
			}
		}
		$more = "";
		if ($v['more'] and is_array($v['more'])) {
			$more .= list_cols($v['more'],$purs);
		}
		$list .= '<li data-cid="'.$v['cid'].'" > '
			. '<input type="checkbox" class="checkline" /> <span  class="depth'.$v['cdepth'].'">'.$v['ctitle'].'</span>'
			. '<div class="btn-group pull-right form-inline">'.$purview.'</div>'
			.$more.' </li>';
	}

	return $list;
}