<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 1:29 PM
 */
class Admin_Controller extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('user_m');
        $this->load->library('session');
        $this->load->helper('security');

        $exception_uris = array(
            'login','logout'
        );

        if(in_array(uri_string(), $exception_uris) == false){
            if($this->user_m->loggedin() == false){
                redirect('login');
            }
        }
    }
}