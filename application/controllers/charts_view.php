<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class charts_view extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
    }

    public function index() {
        if ($this->user_id) {
            $data['bab'] = $this->m_bab->getBab();
            $data['tahun'] = $this->m_tahun->retrieveYear();
            $this->load->view('charts_view');
        } else {
            redirect("login");
        }
    }

    public function load_charts_view() {
        $data = $this->session->flashdata('tipe_grafik');
        $this->load->view('charts_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */