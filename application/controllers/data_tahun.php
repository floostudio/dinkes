<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class data_tahun extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->load->model('m_tahun');
        $this->load->model('m_user');
    }

    public function index() {
        if ($this->user_id) {
            $data['tahun'] = $this->m_tahun->retrieveTahun();
            $this->load->view('data_tahun', $data);
        } else {
            redirect("login");
        }
    }
	
	public function addTahun() {
        $data = $this->input->post('data');
        $array = json_decode($data, true); 
        $this->tahunN = $array["tahun"];

        $this->status = $this->m_tahun->inputTahun($this->tahunN);

        if ($this->status) {
            return true;
        } else
            return false;
    }
	
	public function updateTahun() {
        $data = $this->input->post('data');
        $array = json_decode($data, true); 
		$this->tahunN = $array["tahun"];
        $this->id = $array["id"];

        $this->status = $this->m_tahun->updateTahun($this->id,$this->tahunN);

        if ($this->status) {
            return true;
        } else
            return false;
    }
    
    
}
