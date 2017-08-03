<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banners extends Modules_Controller
{
    protected $rules = array(
      "rule" => array(
         array(
            "field" => "title",
            "label" => "标题",
            "rules" => "trim|required"
            ),
         array(
            "field" => "photo",
            "label" => "图片",
            "rules" => "trim|required"
            ),
         array(
            "field" => "timeline",
            "label" => '时间',
            "rules" => "trim|strtotime"
            )
         )
      );

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

}
