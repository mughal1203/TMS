<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 11:48 PM
 */
class User_M extends My_Model
{
    public $rules = [
        ['field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'trim-|required'],
    ];
    public $createRule = [
        ['field' =>'first_name','label'=>'First Name','rules'=>'required'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean|is_unique[user.email]'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'],
        ['field' => 'primary_no', 'label' => 'Primary No', 'rules' => 'trim|required|numeric'],
        ['field' => 'city', 'label' => 'City', 'rules' => 'trim|required'],
    ];
    public $editRule = [
        ['field' => 'first_name','label'=>'First Name','rules'=>'required'],
        ['field' => 'primary_no', 'label' => 'Primary No', 'rules' => 'trim|required|numeric'],
        ['field' => 'city', 'label' => 'City', 'rules' => 'trim|required'],
    ];
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
        $this->prefix = 'user';
    }

    public function login()
    {
        $user = $this->get_by(array(
            'email'=>$this->input->post('email'),
            ), true);
        if(!empty($user)){
            foreach ($user as $item){
                $password = $this->hash($this->input->post('password'), $item['password_hash']);
                if(($password)) {
                    $data['name'] = $item['first_name'];
                    $data['email'] = $item['email'];
                    $data['id'] = $item['user_id'];
                    $data['loggedin'] = true;
                }
            }
            $this->session->set_userdata($data);
        }
        return true;
    }


    public function logout()
    {
        $this->session->sess_destroy();
    }
    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }
    public function hash($inputData, $pass)
    {
        $password = password_hash($inputData, PASSWORD_BCRYPT);
        if(password_verify($inputData, $pass)){
            return true;
        }
        return false;
    }

    public function userType(){
        $this->table = 'user_type';
        return $this->get();
    }

    public function insertUserAddress($data){
        $this->table = 'user_address';
        return $this->save($data);
    }
    public function insertUserPhone($data){
        $this->table = 'user_phone';
        return $this->save($data);
    }

    public function getUserAddress($id,$single){
        $this->table = 'user_address';
        return $this->db->get_where($this->table,['user_id'=>$id],$single)->row_array();
    }
    public function getUserPhone($id,$single){
        $this->table = 'user_phone';
        return $this->db->get_where($this->table,['user_id'=>$id],$single)->row_array();
    }
}