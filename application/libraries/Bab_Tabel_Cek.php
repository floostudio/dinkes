<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bab_Tabel_Cek {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->model('m_bab');
        $this->CI->load->model('m_tahun');
        $this->CI->load->model('m_rumahsakit');
        $this->CI->load->model('m_bab2_2');
        $this->CI->load->model('m_bab4');
        $this->CI->load->model('m_sarpras');
        $this->CI->load->model('m_sdm');
        $this->CI->load->model('m_bab6_1');
        $this->CI->load->model('m_bab6_2');
        $this->CI->load->model('m_bab6_3');
        $this->CI->load->model('m_bab6_4');
    }

    //check bab and table
    function drawEmptyTable($myTable) {
        include 'B_Empty_Table.php';
    }

    function getBab1($myTable, $tahun, $rs_noreg) {
        if ($myTable == 1) {
            //filter
          
            $pelayanan = $this->CI->m_bab2_2->retrievePelayanan($tahun, $rs_noreg);

            //redirect('tabel_rekap', $data);
        } else if ($myTable == 2) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['peralatan'] = $this->CI->m_bab2_2->retrievePeralatanCanggih($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 3) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['igd'] = $this->CI->m_bab2_2->retrieveIGD($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 4) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['irj'] = $this->CI->m_bab2_2->retrieveIRJ($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 5) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['iri'] = $this->CI->m_bab2_2->retrieveIRI($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 6) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['tingkat_efisiensi'] = $this->CI->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        }
    }

    public function getBab2($myTable, $tahun, $rs_noreg) {
        if ($myTable == 7) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['kondisi_sarpras'] = $this->CI->m_sarpras->retrieveSarpras($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 8) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['peralatan'] = $this->CI->m_sarpras->retrievePeralatan($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 9) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            //analisa

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 10) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            //analisa

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 11) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            //analisa

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 12) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['g_ketenagaan'] = $this->CI->m_sdm->retrieveKetenagaan($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 13) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            //analisa ketenagaan

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 14) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['keb_tenaga'] = $this->CI->m_sdm->retrieveKebutuhanTenaga($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 15) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['pelatihan_tenaga'] = $this->CI->m_sdm->retrievePelatihanSDM($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        }
    }

    public function getBab3($myTable, $tahun, $rs_noreg) {
        if ($myTable == 16) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['sales_growth_rate'] = $this->CI->m_bab4->retrieveSGR($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 17) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['cost_recovery'] = $this->CI->m_bab4->retrieveCostRecovery($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 18) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['rasio_keuangan'] = $this->CI->m_bab4->retrieveRasioKeuangan($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 19) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['analisa_rasio_keuangan'] = $this->CI->m_bab4->retrieveAnalisaRK($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        }
    }

    //20-105
    public function getBab4($myTable, $tahun, $rs_noreg) {
        if ($myTable == 20) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 21) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 22) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 23) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 24) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 25) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 26) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 27) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 28) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 29) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 30) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 31) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 32) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 33) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 34) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 35) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 36) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 37) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 38) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 39) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 40) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 41) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 42) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 43) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 44) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 45) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 46) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 47) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 48) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 49) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 50) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 51) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 52) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 53) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 54) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 55) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 56) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 57) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 58) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 59) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 60) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 61) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 62) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 63) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 64) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 65) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 66) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 67) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 68) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 69) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 70) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 71) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['keg_pel_maskin'] = $this->CI->m_bab5_3->retrievePelayananMaskin($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 72) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['survey_kel_maskin'] = $this->CI->m_bab5_3->retrieveSurveyMaskin($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 73) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['kelengkapan_kelola_maskin'] = $this->CI->m_bab5_3->retrieveKelolaMaskin($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 74) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['keluhan_maskin_petugas'] = $this->CI->m_bab5_3->retrieveKeluhanMaskinPetugas($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 75) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['persentase_keluhan_maskin'] = $this->CI->m_bab5_3->retrievePersentaseKeluhan($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 76) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 77) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 78) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 79) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 80) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 81) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 82) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 83) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 84) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 85) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];


            $data['sanitasi'] = $this->CI->m_bab5_4->retrieveSanitasi($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 86) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 87) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 88) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 89) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 90) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 91) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 92) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['pemulasaran_jnz'] = $this->CI->m_bab5_4->retrievePemulasaranJenazah($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 93) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 94) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 95) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 96) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 97) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 98) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 99) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 100) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 101) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['gigi_mulut'] = $this->CI->m_bab5_4->retrievePelayananGigi($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 102) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            //permasalahan dan pemecahan

            $this->load->view('result_tabel', $data);
        } else if ($myTable == 103) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['imunisasi'] = $this->CI->m_bab5_4->retrieveImunisasi($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 104) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['keg_jiwa'] = $this->CI->m_bab5_4->retrieveKegiatanKesehatanJiwa($tahun, $rs_noreg);

            $this->CI->load->view('result_tabel', $data);
        } else if ($myTable == 105) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        }
    }

    //106-124
    public function getBab5($myTable, $tahun, $rs_noreg) {
        if ($myTable == 106) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 107) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 108) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];

            $data['num_rs'] = $this->m_bab6_2->countRS("kasus_tb_rj");
            $data['num_kategori'] = $this->m_bab6_2->countKategori("list_golongan_umur");
            $data['waw'] = $this->m_bab6_2->retrieveKasusTBrj(1, null);

            $this->load->view('result_tabel', $data);
        } else if ($myTable == 109) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 120) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 121) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 122) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 123) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 124) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        }
    }

    //125-131
    public function getBab6($myTable, $tahun, $rs_noreg) {
        if ($myTable == 125) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 126) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 127) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 128) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 129) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 130) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        } else if ($myTable == 131) {
            //filter
            $data['bab'] = $_POST['bab'];
            $data['tahun'] = $_POST['tahun'];
            $data['rumah_sakit'] = $_POST['rs'];
            $data['tabel'] = $_POST['tabel'];



            $this->load->view('result_tabel', $data);
        }
    }

}
