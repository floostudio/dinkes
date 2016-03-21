<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class export1 extends CI_Controller {

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
		 
        if ($this->user_id) {
            
            $data['tahun'] = $this->m_tahun->retrieveYear();          
            $this->load->view('export1', $data);
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
	
	public function generateExportBab511($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab511($tahun);
    }
	
	public function generateExportBab512($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab512($tahun);
    }
	
	public function generateExportBab521($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab521($tahun);
    }
	
	public function generateExportBab522($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab522($tahun);
    }
	
	public function generateExportBab5231($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab5231($tahun);
    }
	
	public function generateExportBab5232($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab5232($tahun);
    }
	
	public function generateExportBab531($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab531($tahun);
    }
	
	public function generateExportBab532($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab532($tahun);
    }
	
	public function generateExportBab541($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab541($tahun);
    }
	
	public function generateExportBab542($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab542($tahun);
    }
	
	public function generateExportBab55($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab55($tahun);
    }

    public function generateExportBab61($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab61($tahun);
    }
	
	public function generateExportBab62($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab62($tahun);
    }

    public function generateExportBab6mdgs1($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab6mdgs1($tahun);
    }
	
	 public function generateExportBab6mdgs2($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBab6mdgs2($tahun);
    }

    public function generateExportLampiran($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBabLampiran($tahun);
    }

    public function generateExportSPM($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBabSPM($tahun);
    }
	
	public function generateExportSPM1($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBabSPM1($tahun);
    }
    
    public function generateExportSPM2($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportBabSPM2($tahun);
    }
    
    //new
    public function generateExportRS($tahun) {
        $this->export = new ExportExcel();
        $this->export->exportRS($tahun);
    }
}
