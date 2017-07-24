<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 5:05 PM
 */
class User extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['users'] = $this->user_m->get();
        $this->data['subview'] = 'user/index';
        $this->load->view('layout/layout_main', $this->data);
    }
    public function create(){
        $this->data['user_type'] = $this->roles();
        $this->data['cities'] = $this->getCity();
        $this->data['subview'] = 'user/create';
        $rules = $this->user_m->createRule;
        if($this->input->post()){
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run() == false){
                $this->load->view('layout/layout_main',$this->data);
            }else{
                $userData = [
                    'email'         =>  $this->input->post('email'),
                    'username'      =>  $this->input->post('email'),
                    'first_name'    =>  $this->input->post('first_name'),
                    'last_name'     =>  $this->input->post('last_name'),
                    'password_hash' =>  $this->hash($this->input->post('password')),
                    'user_type_id'  =>  $this->input->post('Role'),
                    'status_id'     =>  true
                ];
                $id = $this->user_m->save($userData);
                $userAddress = [
                    'user_id'   => $id,
                    'city'  => $this->input->post('city'),
                    'address'   => $this->input->post('address')
                ];
                $userPhone = [
                    'user_id'       => $id,
                    'primary_no'    => $this->input->post('primary_no'),
                    'secondary_no'  => $this->input->post('secondary_no')
                ];
                $this->user_m->insertUserAddress($userAddress);
                $this->user_m->insertUserPhone($userPhone);
                redirect('user');
            }
        }else{
            $this->load->view('layout/layout_main', $this->data);
        }
    }
    public function edit($id){
        $this->data['user'] = $this->user_m->get($id,true);
        $this->data['user_type'] = $this->roles();
        $this->data['cities'] = $this->getCity();
        $this->data['user_address'] = $this->user_m->getUserAddress($id,true);
        $this->data['user_phones'] = $this->user_m->getUserPhone($id,true);
        $this->data['user_type'] = $this->roles();
        $this->data['subview'] = 'user/edit';
        $this->load->library('MyFormValidation');
        $this->form_validation->set_rules(['field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email|xss_clean|edit_unique[user.email.'.$id.']']);
        $rules = $this->user_m->editRule;
        $this->form_validation->set_rules($rules);
        if($this->input->post()){
            if($this->form_validation->run() == false){
                $this->load->view('layout/layout_main',$this->data);
            }else{
                $userData = [
                    'email'         =>  $this->input->post('email'),
                    'username'      =>  $this->input->post('email'),
                    'first_name'    =>  $this->input->post('first_name'),
                    'last_name'     =>  $this->input->post('last_name'),
                    'password_hash' =>  $this->hash($this->input->post('password')),
                    'user_type_id'  =>  $this->input->post('Role'),
                    'status_id'     =>  true
                ];
                $id = $this->user_m->save($userData);
                $userAddress = [
                    'user_id'   => $id,
                    'city'  => $this->input->post('city'),
                    'address'   => $this->input->post('address')
                ];
                $userPhone = [
                    'user_id'       => $id,
                    'primary_no'    => $this->input->post('primary_no'),
                    'secondary_no'  => $this->input->post('secondary_no')
                ];
                $this->user_m->insertUserAddress($userAddress);
                $this->user_m->insertUserPhone($userPhone);
                redirect('user');
            }
        }else{
            $this->load->view('layout/layout_main', $this->data);
        }
        $this->load->view('layout/layout_main', $this->data);
    }
    public function delete(){}

    public function save(){}

    public function login()
    {
        $dashboard = 'user';
        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);

        if($this->user_m->loggedin() == true){
            redirect($dashboard);
        }
        if($this->form_validation->run() == true){
            if($this->user_m->login() == true){
                redirect($dashboard);
            }else{
                $this->session->set_flashdata('error', 'The email or password not correct');
                redirect('login','refresh');
            }
        }
        $this->data['subview']='user/login';
        $this->load->view('layout/layout_modal',$this->data);
    }

    public function logout(){
        $this->user_m->logout();
        redirect('login');
    }

    public function roles(){
        $result = $this->user_m->userType();
        $this->user_m->__construct();
        $this->load->helper('myarray');
        return map($result,'user_type_id','name');
    }
    public function getCity(){
        $this->load->helper('city');
        $result = city_list();
        return $result;
    }

    private function hash($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public function _uniqueEmail($email){

        $user = $this->user_m->get_by(['email',$email]);
        if(count($user)){
//            $this->session->set_flashdata('error','Email should be unique');
            $this->form_validation->set_message('_uniqueEmail','%s should be unique');
            return false;
        }
        return true;
    }
}