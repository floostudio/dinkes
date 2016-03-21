<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class petunjuk extends CI_Controller {
    function __construct(){
                parent::__construct();
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper(array('form', 'url'));
                $this->user_id = $this->session->userdata('user_id');
                $this->user_name = $this->session->userdata('user_name');
	}
	
	 public function index() {
        if($this->user_id)
        {
                $this->load->view('petunjuk');
        }
        else {
                redirect("login");
        }           
    }
}