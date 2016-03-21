<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
         
    }

    public function index() {
        if ($this->user_id) { 
            $this->load->view('test');
        } else {
            redirect("login");
        }
    }
 
}
