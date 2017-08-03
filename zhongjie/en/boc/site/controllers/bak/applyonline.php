<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class applyonline extends MY_Controller {

    protected $rules = array(
        "submit" => array(
            array(
                'field' => 'name',
                'label' => '姓名',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'gender',
                'label' => '性别',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'marriage',
                'label' => '婚姻状况',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|strtolower|valid_email'
                )
            ,array(
                'field' => 'nation',
                'label' => '民族',
                'rules' => 'trim|xss_clean'
                )
            ,array(
                'field' => 'age',
                'label' => '年龄',
                'rules' => 'intval|required|numeric'
                )
            ,array(
                'field' => 'politic',
                'label' => '政治面貌',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'birthplace',
                'label' => '籍贯',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'edu',
                'label' => '文化程度',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'school',
                'label' => '毕业学校',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'major',
                'label' => '专业',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'graduation',
                'label' => '毕业时间',
                'rules' => 'trim|required|xss_clean'
                )
            ,array(
                'field' => 'language',
                'label' => '外语水平',
                'rules' => 'trim|xss_clean'
                )
            ,array(
                'field' => 'position',
                'label' => '应聘职位',
                'rules' => 'trim|xss_clean'
                )
            ,array(
                'field' => 'recruit_id',
                'rules' => 'intval|numeric'
                )
            ,array(
                'field' => 'tel',
                'label' => '联系电话',
                'rules'   => 'trim|required|numeric|is_mobile'
                )
            ,array(
                'field' => 'files',
                'label' => '简历',
                'rules' => 'trim|required'
                )
            ,array(
                'field' => 'content',
                'label' => '个人简历',
                'rules' => 'trim|required|max_length[1000]|xss_clean'
                )
            ,array(
                'field' => 'captcha',
                'label' => '验证码',
                'rules' => 'trim|required|strtolower|max_lenx[4]|callback_captcha_verify'
                )
            )
        );

    function __construct(){
        parent::__construct();
        $this->load->model('apply_model','model');
        $this->load->model('recruit_model','mrecruit');
    }


    public function index()
    {

        $id = $this->uri->segment(3,0);

        if ($id) {
            $rs=$this->mrecruit->get_one_pn($id); 
        } else {
            redirect('recruitment');
        }

        $data['header']=header_seoinfo(10,0);
        $data['header']['title']=$this->mcfg->get_config('site','title_suffix').'-在线应聘';
        $data['rs']=$rs;
        $this->load->view('applyonline',$data);


    }


    // 数据提交
    public function sendpost()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules($this->rules['submit']);
            $vdata = array( 'status' => 0, 'msg' => '未知错误！');

            if ($this->form_validation->run() == FALSE) {
                // $vdata['msg'] = validation_errors();
                $errs = form_errors ();
                $vdata ['msg'] = $errs;
            }else{
                unset($_POST['captcha']);
                $data = $this->input->post();

                if ($this->model->create($data)) {
                    $vdata['status'] = 1;
                    $vdata['msg'] = "提交成功，我们会尽快回复您！";
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($vdata));
        }else{
            show_404();
        }
    }


    // 验证码
    public function captcha_verify($str='')
    {
        $this->load->library('captcha');
        if($this->captchas_verify = $this->captcha->verify($str)){
            return true;
        }else{
            $this->form_validation->set_message('captcha_verify', '验证码 输入错误.');
            return false;
        }
    }

    
}
