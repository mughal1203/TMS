<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 1:22 PM
 */
class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('layout/layout_main', $this->data);
    }

    public function modal(){
        $this->load->view('layout/layout_modal');
    }
}