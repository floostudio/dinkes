<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    var $status;
    var $id_tahunN;
    var $tahunN;

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_tahun');
    }

    public function addTahun() {
        $data = $this->input->post('data');
        $array = json_decode($data, true);
        $this->status = $array["status"];
        $this->id_tahunN = $array["id_tahun"];
        $this->tahunN = $array["tahun"];

        $this->status = $this->m_tahun->inputTahun($this->status, $this->id_tahunN, $this->id_tahunN);

        if ($this->status) {
            return true;
        } else
            return false;
    }

    public function updateTahun() {
        $data = $this->input->post('data');
        $array = json_decode($data, true);

        $this->status = $array["status"];
        $this->id_tahunN = $array["id_tahun"];
        $this->tahunN = $array["tahun"];

        $this->status = $this->m_tahun->updateTahun($this->status, $this->id_tahunN, $this->id_tahunN);

        if ($this->status) {
            return true;
        } else
            return false;
    }

    public function deleteTahun() {
        $this->id_tahunN = $this->input->post('data');

        $this->status = $this->m_tahun->deleteTahun($this->id_tahunN);

        if ($this->status) {
            return true;
        } else
            return false;
    }

}
