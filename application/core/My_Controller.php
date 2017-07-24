<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 1:24 PM
 */
class My_Controller extends CI_Controller
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->data['error'] = array();
        $this->data['site_name'] = 'Teacher Management';
    }
}