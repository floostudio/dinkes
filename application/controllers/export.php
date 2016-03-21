<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class export extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');

        $this->load->model('m_bab');
        $this->load->model('m_tahun');
        $this->load->model('m_rumahsakit');
        $this->load->model('m_region');

        $this->load->library('ExportExcel');
    }

    public function index() {
		redirect("login");
        if ($this->user_id) {
            
            $data['tahun'] = $this->m_tahun->retrieveYear();          
            $this->load->view('export', $data);
        } else {
            redirect("login");
        }
    }
     
    public function generateExportBab2($tahun) { 
        $this->export = new ExportExcel();
        $this->export->exportBab2($tahun);
    }
	
	public function generateExportBab3($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab3($tahun);
    }

    public function generateExportBab4($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab4($tahun);
    }
	
	public function generateExportBab51($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab51($tahun);
    }
	
	public function generateExportBab52($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab52($tahun);
    }
	
	public function generateExportBab53($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab53($tahun);
    }
	
	public function generateExportBab54($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab54($tahun);
    }
	
	public function generateExportBab55($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab55($tahun);
    }

    public function generateExportBab6($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab6($tahun);
    }

    public function generateExportBab6mdgs($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab6mdgs($tahun);
    }

    public function generateExportLampiran($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBabLampiran($tahun);
    }
}
