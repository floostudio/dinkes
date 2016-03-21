<?php

Class ExportExcel {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelReader');
        $this->CI->load->library('Export_Bab_2');
        $this->CI->load->library('Export_Bab_3');
        $this->CI->load->library('Export_Bab_4');
        $this->CI->load->library('Export_Bab_5_1_1');
		$this->CI->load->library('Export_Bab_5_1_2');
        $this->CI->load->library('Export_Bab_5_2_1');
		$this->CI->load->library('Export_Bab_5_2_2');
		$this->CI->load->library('Export_Bab_5_2_3_1');
		$this->CI->load->library('Export_Bab_5_2_3_2');
        $this->CI->load->library('Export_Bab_5_3_1');
		$this->CI->load->library('Export_Bab_5_3_2');
        $this->CI->load->library('Export_Bab_5_4_1');
		$this->CI->load->library('Export_Bab_5_4_2');
        $this->CI->load->library('Export_Bab_5_5');
        $this->CI->load->library('Export_Bab_6_1');
		$this->CI->load->library('Export_Bab_6_2');
        $this->CI->load->library('Export_Bab_6_MDGS_1');
		$this->CI->load->library('Export_Bab_6_MDGS_2');
        $this->CI->load->library('Export_Bab_SPM');
		$this->CI->load->library('Export_Bab_SPM_1');
        $this->CI->load->library('Export_Bab_SPM2');
        $this->CI->load->library('Export_Bab_lampiran');
        $this->CI->load->library('Export_RS'); //new 
    }

    function export() {
        $this->data = new Export_Bab_5();
        $this->data->downloadExcel();
    }

    function exportBab2($tahun) {
        $this->data = new Export_Bab_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab3($tahun) {
        $this->data = new Export_Bab_3();
        $this->data->downloadExcel($tahun);
    }

    function exportBab4($tahun) {
        $this->data = new Export_Bab_4();
        $this->data->downloadExcel($tahun);
    }

    function exportBab511($tahun) {
        $this->data = new Export_Bab_5_1_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab512($tahun) {
        $this->data = new Export_Bab_5_1_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab521($tahun) {
        $this->data = new Export_Bab_5_2_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab522($tahun) {
        $this->data = new Export_Bab_5_2_2();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab5231($tahun) {
        $this->data = new Export_Bab_5_2_3_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab5232($tahun) {
        $this->data = new Export_Bab_5_2_3_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab531($tahun) {
        $this->data = new Export_Bab_5_3_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab532($tahun) {
        $this->data = new Export_Bab_5_3_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab541($tahun) {
        $this->data = new Export_Bab_5_4_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab542($tahun) {
        $this->data = new Export_Bab_5_4_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab55($tahun) {
        $this->data = new Export_Bab_5_5();
        $this->data->downloadExcel($tahun);
    }

    function exportBab61($tahun) {
        $this->data = new Export_Bab_6_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab62($tahun) {
        $this->data = new Export_Bab_6_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBab6mdgs1($tahun) {
        $this->data = new Export_Bab_6_MDGS_1();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBab6mdgs2($tahun) {
        $this->data = new Export_Bab_6_MDGS_2();
        $this->data->downloadExcel($tahun);
    }

    function exportBabLampiran($tahun) {
        $this->data = new Export_Bab_lampiran();
        $this->data->downloadExcel($tahun);
    }
    
    function exportBabSPM($tahun) {
        $this->data = new Export_Bab_SPM();
        $this->data->downloadExcel($tahun);
    }
	
	function exportBabSPM1($tahun) {
        $this->data = new Export_Bab_SPM_1();
        $this->data->downloadExcel($tahun);
    }
    
    function exportBabSPM2($tahun) {
        $this->data = new Export_Bab_SPM2();
        $this->data->downloadExcel($tahun);
    }

    //new
    function exportRS($tahun) {
        $this->data = new Export_RS();
        $this->data->downloadExcel($tahun);
    }

}

?>
