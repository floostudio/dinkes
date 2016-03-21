<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tabel_rekap extends CI_Controller {

    var $in_tahun = 2013;
    var $in_rsNoreg = 1;

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->load->model('m_bab');
        $this->load->model('m_tahun');
        $this->load->model('m_rumahsakit');
        $this->load->model('m_bab2_2');
        $this->load->model('m_bab4');
        $this->load->model('m_sarpras');
        $this->load->model('m_sdm');
        $this->load->model('m_bab5_4');
        $this->load->model('m_bab5_3');
        $this->load->model('m_bab6_1');
        $this->load->model('m_bab6_2');
        $this->load->model('m_bab6_3');
        $this->load->model('m_bab6_4');
        $this->load->model('m_lampiran');

        //$this->load->library('Bab_Tabel_Cek');
    }

    public function index() {
        if ($this->user_id) {
            $data['bab'] = $this->m_bab->getBab();
            $data['tahun'] = $this->m_tahun->retrieveYear();
            $data['rumah_sakit'] = $this->m_rumahsakit->retrieveRS();

            $this->load->view('tabel_rekap', $data);
        } else {
            redirect("login");
        }
    }

    public function viewTabel() {
        if ($this->user_id) {
            $tahun = $_POST['tahun'];
            $rs_noreg = $_POST['rs'];
        } else {
            redirect("login");
        }
    }

    public function getTableList($bab_id) {
        $bab = $bab_id;
        $query = $this->m_bab->getTable($bab);
        $data = "<option value=''>Pilih Tabel..</option>";
        foreach ($query as $q) {
            $data .= "<option value=" . $q['bab_list_id'] . ">" . $q['bab_list_table'] . "</option>";
        }
        echo $data;
    }

}
