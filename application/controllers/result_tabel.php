<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class result_tabel extends CI_Controller {

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
        $this->load->model('m_region');
        $this->load->model('m_status_penyelenggara');
        $this->load->model('m_kelas');
        $this->load->model('m_jenis');
        $this->load->model('m_stat_penyelenggara');
        $this->load->model('m_penyelenggara');
    }

    public function index() {
        if ($this->user_id) {
            $data['bab'] = $this->m_bab->getBab();
            $data['tahun'] = $this->m_tahun->retrieveYear();
            $data['region'] = $this->m_region->retrieveRegion();
            $data['status_penyelenggara'] = $this->m_status_penyelenggara->retrievePenyelenggara();
            $data['kelas'] = $this->m_kelas->retrieveKelas();
            $data['jenis'] = $this->m_jenis->retrieveJenis();
            $data['stat_penyelenggara'] = $this->m_stat_penyelenggara->retrieveStatPenyelenggara();
            $data['penyelenggara'] = $this->m_penyelenggara->retrievePenyelenggara();
            
            if ($this->input->post('tahun') != null) {
                $data['tahun_tahun'] = $this->m_tahun->retrieveYearId($this->input->post('tahun'));
            }
            $data['rumah_sakit'] = $this->m_rumahsakit->retrieveRS();
            

            $this->load->view('result_tabel', $data);
        } else {
            redirect("login");
        }
    }

    public function getTableList($bab_id) {
        $bab = $bab_id;
        $query = $this->m_bab->getTable($bab);
        $data1 = "<option value=''>Pilih Tabel..</option>";
        foreach ($query as $q) {
            $data1 .= "<option value=" . $q['bab_list_id'] . ">" . $q['bab_list_table'] . "</option>";
        }
        echo $data1;
    }

    public function getTahunId($id) {
        $id_tahun = $id;
        $query = $this->m_tahun->retrieveYearId($id_tahun);
    }
    
    

}
