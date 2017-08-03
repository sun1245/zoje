<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends MY_Model {
    protected $table = 'account'; 

    // 检测帐号是否存在
    public function find_name($uname)
    {
        $query = $this->db
            ->select('id')
            ->from($this->table)
            ->where('uname',$uname)
            ->get();
        if ($this->db->affected_rows()) {
            $id = $query->row_array();  
            return $id['id'];
        }else{
            return false;
        }
    }

    // 检测mail是否存在
    public function find_mail($email)
    {
        $query = $this->db
            ->select('id')
            ->from($this->table)
            ->where('email',$email)
            ->get();
        if ($this->db->affected_rows()) {
            $id = $query->row_array();  
            return $id['id'];
        }else{
            return false;
        }
    }

    public function find_phone($phone)
    {
        $query = $this->db
            ->select('id')
            ->from($this->table)
            ->where('phone',$phone)
            ->get();
        if ($this->db->affected_rows()) {
            $id = $query->row_array();  
            return $id['id'];
        }else{
            return false;
        }
    }

    public function find_chinaid($chinaid)
    {
        $query = $this->db
            ->select('id')
            ->from($this->table)
            ->where('chinaid',$chinaid)
            ->get();
        if ($this->db->affected_rows()) {
            $id = $query->row_array();  
            return $id['id'];
        }else{
            return false;
        }
    }

    // 注册
    public function create($data){
        $data['reg_time'] = time();
        $this->db->insert($this->table, $data); 
        if ($this->db->affected_rows()) {
            return $this->db->insert_id();
        }
        return 0;
    }

    // 登录时提取数据
    public function get_login($id)
    {
        $query = $this->db
            ->select('id,uname,nickname,pwd,login_time,login_ip,phone,email,email_check,phone_check,chinaid_check,qdd')
            ->from($this->table)
            ->where('id',$id)
            ->get();
        return $query->row_array();
    }

    public function get($id,$field="uname,email,nickname"){
        $query = $this->db
            ->select($field)
            ->from($this->table)
            ->where('id',$id)
            ->get();
        return $query->row_array();
    }

    // 设定
    public function set($id,$arr)
    {
        $this->db->set($arr)
            -> where(array('id'=>$id))
            -> update($this->table);
        return $this->db->affected_rows();
    }

    // 登录成功后保存登录信息
    public function set_login($id)
    {
        // 获取上次信息
        $info = $this->get_login($id);
        $this->db->set('login_time_prev',$info['login_time']);
        $this->db->set('login_ip_prev',$info['login_ip']);
        $this->db->set('login_ip',get_ip());
        $this->db->set('login_time',time());
        $this->db->set('pwd_errors',0);
        $this->db->where('id',$id);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    // 设置登录密码
    public function set_pwd($aid,$pwd)
    {
        $this->db->set('pwd',$pwd);
        $this->db->where('id',$aid);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    // 设置支付密码
    public function set_pwd_pay($aid,$pwd)
    {
        $this->db->set('pwd_pay',$pwd);
        $this->db->where('id',$aid);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    // 个人信息
    public function getinfo($aid)
    {
        return $this->db
        ->select('*')
        ->where(array('id'=>$aid))
        ->from($this->table)
        ->get()
        ->row_array();
    }
    
}