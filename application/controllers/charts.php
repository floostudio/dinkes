<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class charts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->load->model('m_analisa');
        $this->load->model('m_bab');
        $this->load->model('m_tahun');
        $this->load->model('m_rumahsakit');
        $this->load->model('m_region');
        $this->load->model('m_bab2_2');
        $this->load->model('m_bab4');
        $this->load->model('m_sarpras');
        $this->load->model('m_sdm');
        $this->load->model('m_bab5_4');
        $this->load->model('m_bab5_3');
        $this->load->model('m_bab5_1');
        $this->load->model('m_bab5_1_retrieve');
        $this->load->model('m_bab5_2');
        $this->load->model('m_bab6_1');
        $this->load->model('m_bab6_2');
        $this->load->model('m_bab6_3');
        $this->load->model('m_bab6_4');
        $this->load->model('m_lampiran');
        $this->load->model('m_umum');
    }

    public function index() {
        if ($this->user_id) {
            $data['bab'] = $this->m_bab->getBab();
            $data['bab'] = $this->m_bab->getBab();
            $data['tahun'] = $this->m_tahun->retrieveYear();
            if ($this->input->post('tahun') != null) {
                $data['tahun_tahun'] = $this->m_tahun->retrieveYearId($this->input->post('tahun'));
            }
            $data['rumah_sakit'] = $this->m_rumahsakit->retrieveRS();
            $data['region'] = $this->m_region->retrieveRegion();
            $data['tahun'] = $this->m_tahun->retrieveYear();
            $this->load->view('charts', $data);
        } else {
            redirect("login");
        }
    }

    public function getTableList($bab_id) {
        $bab = $bab_id;
        $query = $this->m_bab->getCollumn($bab);
        $data = "<option value=''>Pilih Kolom..</option>";
        foreach ($query as $q) {
            $data .= "<option value=" . $q['ID_KOLOM'] . ">" . $q['NAMA_KOLOM'] . "</option>";
        }
        echo $data;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */