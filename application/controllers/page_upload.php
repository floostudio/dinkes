<?php

/*
 * 
 * Author Iqbal Permana 
 * 
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class page_upload extends CI_Controller {
    function __construct() {
                parent::__construct();
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('form', 'url'));
                $this->user_id 		= $this->session->userdata('user_id');
                $this->user_name 	= $this->session->userdata('user_name');
                $this->load->library('Bab2_reader');
                $this->load->library('Bab3_reader');
                $this->load->library('Bab4_reader');
                $this->load->library('Bab5_reader_1');
                $this->load->library('Bab5_reader_2');
                $this->load->library('Bab5_reader_3');
                $this->load->library('Bab5_reader_4');
                $this->load->library('Bab6_reader');
                $this->load->library('SPM_reader');
                $this->load->library('BabLampiran_reader');
                $this->load->library('Permasalahan_reader');
                $this->load->library('Analisa_reader');
                $this->load->library('RL4A_reader');
                $this->load->library('RL4B_reader');
                $this->load->model('m_tahun');
                $this->load->model('m_bab');
                $this->load->model('m_rumahsakit');
		ini_set('memory_limit', "256M");
	}
	
	public function index() {   
            if($this->user_id) {
                    $data['tahun']      = $this->m_tahun->retrieveYear();
                    $data['rumahsakit'] = $this->m_rumahsakit->retrieveRSActive();
                    $this->load->view('page_upload', $data);
                    $this->load->model('m_bab');
            }
            else {
                    redirect("login");
            }
        }
              
        public function submit() {
            $_tahun      = $this->input->post('tahun');
            $_idRs       = $this->input->post('no_reg');
            $_doctype    = $this->input->post('doctype');
            
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload()) {
                    $data = array('error' => $this->upload->display_errors());
                    echo $this->upload->file_type ;
                    $this->session->set_flashdata('msg_excel', 'Insert failed. Please check your file, only .xls file allowed.');       
                    $link = site_url().'/page_upload';
                    echo $this->upload->display_errors();
                   // redirect($link);
            }
            else {
                $uploadData = $this->upload->data();
                if($_doctype == 1) { // BAB 2 READER
                    $this->readBab2($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 2) { // BAB 3 READER
                    $this->readBab3($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 3) { //BAB 4 READER
                    $this->readBab4($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 4) { // BAB 5 READER
                    $this->readBab5($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 5) { // BAB 6 READER
                    $this->readBab6($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 6) { // BAB LAMPIRAN HEMODIALISA
                    $this->readBabLampiran($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 7) { // BAB LAMPIRAN SPM
                    $this->readBabLampiranSPM($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 8) {
                    $this->readRL4A($uploadData, $_tahun, $_idRs);
                } else if($_doctype == 9) {
                    $this->readRL4B($uploadData, $_tahun, $_idRs);
                }
                
            // If uploading succes redirect to upload page
            $link = site_url().'/validasi';
               // redirect($link);
            }
        }
               
        public function showHeaderError() {
            echo '<a href='.site_url().'/page_upload>Kembali ke halaman upload</a>';
            echo '</br>';
            echo '<h1>Gagal Upload</h1>';
            echo '<h3>File yang diupload salah/tidak sesuai Format isian</h3>';
            echo '</br>';
        }
        
        public function showHeaderSuccess() {
            echo '<a href='.site_url().'/page_upload>Kembali ke halaman upload</a>';
            echo '</br>';
            echo '<h1>Berhasil Upload</h1>';
            echo '</br>';
        }
        
        public function showHeaderDetail($title) {
            echo '</br>';
            echo '<h3>'.$title.'</h3>';
            echo '</br>';
        }
    
        public function submitAndShowError($bab, $_noreg, $_tahun, $startSheet, $endSheet, $error) {
            
            for($sheet=$startSheet; $sheet<=$endSheet; $sheet++) {
                if($error[$sheet] != '1' && $error[$sheet] != '0'){
                    echo 'Sheet : '.$sheet.'</br>';
                    echo 'Posisi Cell Error : ';
                    $errorDetail = "";
                    foreach($error[$sheet] as $data)
                    { echo $data." | "; $errorDetail .= $data. " | "; }
                    $this->m_bab->inputHistoryUpload($bab, $_noreg, $_tahun, $sheet, $errorDetail);
                    echo '</br>';
                } else {
                    $this->m_bab->inputHistoryUpload($bab, $_noreg, $_tahun, $sheet, $error[$sheet]);
                }
            }
        }
        
        public function readBab2($uploadData, $_tahun, $_noreg) {
            $this->reader = new Bab2_reader();
            $this->analisa = new Analisa_reader();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            
            if($status[1] && $status[2]) {
                // Sheet 1
                $this->reader->readBab2_dataRS($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab2_JmlTT($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab2_SebaranTT($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab2_Ambulans($uploadData['full_path'], 0, $_tahun, $_noreg);

                // Sheet 2
                $this->reader->readBab2_igd($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab2_irj($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab2_iri($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab2_efisiensi($uploadData['full_path'], 1, $_tahun, $_noreg);

                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            $this->submitAndShowError(1, $_noreg, $_tahun, 1, 2, $status); // Bab 2 ID = 1, sheet 1-2
        } 
       
        public function readBab3($uploadData, $_tahun, $_noreg) {
            $this->reader = new Bab3_reader();
            $this->analisa = new Analisa_reader();
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            
            if($status[1] && $status[2]) {
                $this->reader->readBab3_Ketenagaan($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab3_PelatihanSDM($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(2,  $_noreg, $_tahun, 1, 2, $status); // Bab 3 ID = 2, sheet 1-2
        }
        
        public function readBab4($uploadData, $_tahun, $_noreg) {
            $this->reader = new Bab4_reader();
            $this->analisa = new Analisa_reader();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            $status[3] = $this->reader->cekSheet3($uploadData['full_path']);
            $status[4] = $this->reader->cekSheet4($uploadData['full_path']);
            $status[5] = $this->reader->cekSheet5($uploadData['full_path']);
            
            if($status[1] && $status[2] && $status[3] && $status[4] && $status[5]){
                $this->reader->readBab4_sgr($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab4_costRecovery($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab4_rasioKeuangan($uploadData['full_path'], 2, $_tahun, $_noreg);
                $this->reader->readBab4_analisisRasioKeuangan($uploadData['full_path'], 3, $_tahun, $_noreg);
                $this->reader->readBab4_sbAnggaran($uploadData['full_path'], 4, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(3, $_noreg, $_tahun, 1, 5, $status); // Bab 4 ID = 3, sheet 1-5
        }
        
        public function readBab5($uploadData, $_tahun, $_noreg) {
            $this->reader = new Bab5_reader_1();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            $status[3] = $this->reader->cekSheet3($uploadData['full_path']);
            $status[4] = $this->reader->cekSheet4($uploadData['full_path']);
            $status[5] = $this->reader->cekSheet5($uploadData['full_path']);
            $status[6] = $this->reader->cekSheet5($uploadData['full_path']);
            
            if($status[1] && $status[2] && $status[3] && 
                    $status[4] && $status[5] && $status[6]) {
                $this->reader->readBab5_1_TrendKunjunganIGD($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_1_JmlTenagaIGD($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_1_SisKomGD($uploadData['full_path'], 0, $_tahun, $_noreg);
                $status[1] = $this->reader->readBab5_1_SepuluhBesarPenyIGD($uploadData['full_path'], 0, $_tahun, $_noreg);
                
                $this->reader->readBab5_1_KegiatanRujukanIGD($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab5_1_KegiatanRujukan($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab5_1_SepuluhBesarKasusRujukan($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readBab5_1_SepuluhBesarKasusRujukan2($uploadData['full_path'], 1, $_tahun, $_noreg);
                
                $this->reader->readBab5_1_KunjunganRawatJalan($uploadData['full_path'], 2, $_tahun, $_noreg);
                //$status[3] = $this->reader->readBab5_1_SepuluhBesarPenyRawatJln($uploadData['full_path'], 2, $_tahun, $_noreg);

                $this->reader->readBab5_1_KegiatanRawatInap($uploadData['full_path'], 3, $_tahun, $_noreg); 
                //$error_3 = $this->reader->readBab5_1_PenyakitTerbanyakRI($uploadData['full_path'], 3, $_tahun, $_noreg);
                //$error_4 = $this->reader->readBab5_1_KematianRI($uploadData['full_path'], 3, $_tahun, $_noreg);
                //$status[4] = array_merge($error_3, $error_4);
                
                $this->reader->readBab5_1_JumlahOperasi($uploadData['full_path'], 4, $_tahun, $_noreg);

                $this->reader->readBab5_1_PelayananPersalinan($uploadData['full_path'], 5, $_tahun, $_noreg);
                $this->reader->readBab5_1_PelayananPerinatologi ($uploadData['full_path'], 5, $_tahun, $_noreg);
                
                if(empty($status[1])) $status[1] = '1';
                if(empty($status[2])) $status[2] = '1';
                
                if($status[1] == '1' && $status[2] == '1') {
                    $this->showHeaderSuccess();
                }
                else {
                    $this->showHeaderError();
                }
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(4, $_noreg, $_tahun, 1, 6, $status); // Bab 5 ID = 4, sheet 1-6*/
        }
        
        public function readBab6($uploadData, $_tahun, $_noreg) {
            $this->reader = new Bab6_reader();
            $this->analisa = new Analisa_reader();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            $status[3] = $this->reader->cekSheet3($uploadData['full_path']);
            $status[4] = $this->reader->cekSheet4($uploadData['full_path']);
            $status[5] = $this->reader->cekSheet5($uploadData['full_path']);
            
            if($status[1] && $status[2] && $status[3] && $status[4] && $status[5]) {  
                $this->reader->readBab6_1_SpmRs($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->analisa->readBab_Analisa($uploadData['full_path'], 0, $_tahun, $_noreg, 31, 31, 'B', 'B', 45); // Analisa Bab 6-0, Cell B31, Kategori ID 45

                $this->reader->readBab6_2_SurveyRs($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->analisa->readBab_Analisa($uploadData['full_path'], 1, $_tahun, $_noreg, 82, 82, 'B', 'B', 46); // Analisa Bab 6-1, Cell B82, Kategori ID 46
                
                //$this->reader->readBab6_3_KasusTBrj($uploadData['full_path'], 2, $_tahun, $_noreg);
                //$this->reader->readBab6_3_KasusTBrjJenis($uploadData['full_path'], 2, $_tahun, $_noreg);
                //$this->reader->readBab6_3_KasusTBri($uploadData['full_path'], 2, $_tahun, $_noreg);
                //$this->reader->readBab6_3_KasusTBriJenis($uploadData['full_path'], 2, $_tahun, $_noreg);
                
                $this->reader->readBab6_3_LaptahTB($uploadData['full_path'], 2, $_tahun, $_noreg);

                $this->reader->readBab6_3_KlinikVCT($uploadData['full_path'], 3, $_tahun, $_noreg);
                $this->reader->readBab6_3_HIV($uploadData['full_path'], 3, $_tahun, $_noreg);
                
                $this->reader->readBab6_3_KematianIbu($uploadData['full_path'], 4, $_tahun, $_noreg);
                $this->reader->readBab6_3_SebabKematianIbu($uploadData['full_path'], 4, $_tahun, $_noreg);
                $this->reader->readBab6_3_KematianIbuPersalinan($uploadData['full_path'], 4, $_tahun, $_noreg);
                
                //$this->reader->readBab6_4_MDGS($uploadData['full_path'], 6, $_tahun, $_noreg);
                
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(5, $_noreg, $_tahun, 1, 5, $status); // Bab 6 ID = 5, sheet 1-5
        }
        
        public function readBabLampiranSPM($uploadData, $_tahun, $_noreg) {
            $this->reader = new SPM_reader();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            
            if($status[1]) {
                $this->reader->readBab5_1_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_2_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_3_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_4_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_5_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_6_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_7_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_8_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_9_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_10_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_11_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_12_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_13_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_14_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_15_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_16_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_17_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_18_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_19_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_20_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readBab5_21_SPM($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            $this->submitAndShowError(7, $_noreg, $_tahun, 1, 1, $status); // Bab 5 ID = 4 SPM, sheet 1
        }
        
        public function readBabLampiran($uploadData, $_tahun, $_noreg) {
            $this->reader = new BabLampiran_reader();
            
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            
            if($status[1] && $status[2]) {   
                $this->reader->readPembayaranHemodialisis($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readKunjunganHemodialisis($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readSarprasHemodialisis($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readPeralatanHemodialisis($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readTenagaMedikHemodialisis($uploadData['full_path'], 0, $_tahun, $_noreg);

                $this->reader->readRadiologi($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            $this->submitAndShowError(6, $_noreg, $_tahun, 1, 2, $status); // Bab Lampiran ID = 6, sheet 1-2*/
        }
        
        public function readRL4A($uploadData, $_tahun, $_noreg) {
            $this->reader = new RL4A_reader();
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            
            if($status[1] && $status[2]) {
                $this->reader->readRL4A($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->reader->readRL4ASebab($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(8,  $_noreg, $_tahun, 1, 2, $status); // RL 4A ID = 8, sheet 1-2
        }
        
        public function readRL4B($uploadData, $_tahun, $_noreg) {
            $this->reader = new RL4B_reader();
            //Cek Sheet Template
            $status[1] = $this->reader->cekSheet1($uploadData['full_path']);
            $status[2] = $this->reader->cekSheet2($uploadData['full_path']);
            
            if($status[1] && $status[2]) {
                $this->reader->readRL4B($uploadData['full_path'], 0, $_tahun, $_noreg);
                $this->reader->readRL4BSebab($uploadData['full_path'], 1, $_tahun, $_noreg);
                $this->showHeaderSuccess();
            }
            else {
                $this->showHeaderError();
            }
            
            $this->submitAndShowError(9,  $_noreg, $_tahun, 1, 2, $status); // RL 4A ID = 8, sheet 1-2
        }
        
        public function readBab5_Permasalahan($uploaData, $_tahun, $_noreg) {
            $this->reader = new Permasalahan_reader();
            
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 0, $_tahun, $_noreg, 77, 86, 'B', 'G', 1); // UGD
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 2, $_tahun, $_noreg, 108, 117, 'B', 'G', 2); // Rawat Jalan
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 3, $_tahun, $_noreg, 137, 146, 'B', 'H', 3); // Rawat Inap
            $this->reader->readBab5_PermasalahanAlt($uploaData['full_path'], 4, $_tahun, $_noreg, 43, 52, 'B', 'H', 'I', 4); // Pelayanan Bedah
            //$error[5] = $this->reader->readBab5_Permasalahan($uploaData['full_path'], 4, $_tahun, $_noreg, 43, 52, 'B', 'H', 4); // Pelayanan Bedah
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 5, $_tahun, $_noreg, 95, 104, 'B', 'C', 5); // Persalinan, Perinatologi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 7, $_tahun, $_noreg, 13, 22, 'B', 'C', 6); // Pelayanan Intensif
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 8, $_tahun, $_noreg, 37, 46, 'B', 'D', 7); // Pelayanan Radiologi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 9, $_tahun, $_noreg, 48, 57, 'B', 'F', 8); // Pelayanan Laboratorium
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 10, $_tahun, $_noreg, 28, 37, 'B', 'E', 9); // Pelayanan Rehabilitasi Medik
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 11, $_tahun, $_noreg, 17, 26, 'B', 'E', 10); // Pelayanan Minimal (SPM) Pelayanan Farmasi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 12, $_tahun, $_noreg, 49, 58, 'B', 'F', 11); // Pelayanan Gizi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 13, $_tahun, $_noreg, 44, 53, 'B', 'C', 12); // Pelayanan Transfusi Darah
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 14, $_tahun, $_noreg, 240, 249, 'B', 'D', 13); // Pelayanan Maskin
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 15, $_tahun, $_noreg, 15, 24, 'B', 'E', 14); // Pelayanan Rekam Medik
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 16, $_tahun, $_noreg, 24, 33, 'B', 'H', 15); // Pelayanan Limbah
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 17, $_tahun, $_noreg, 21, 30, 'B', 'C', 16); // Pelayanan Administrasi dan Manajemen
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 18, $_tahun, $_noreg, 14, 23, 'B', 'E', 17); // Ambulans/Kereta Jenazah
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 19, $_tahun, $_noreg, 22, 31, 'B', 'E', 18); // Pelayanan Pemulasaraan Jenazah
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 20, $_tahun, $_noreg, 14, 23, 'B', 'E', 19); // Pelayanan Pemeliharaan Sarana
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 21, $_tahun, $_noreg, 12, 21, 'B', 'E', 20); // Pelayanan Pemeliharaan Laundry
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 22, $_tahun, $_noreg, 13, 22, 'B', 'E', 21); // Pelayanan Pengendalian Infeksi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 23, $_tahun, $_noreg, 31, 40, 'B', 'E', 22); // Pelayanan Kesehatan Gigi
            $this->reader->readBab5_Permasalahan($uploaData['full_path'], 25, $_tahun, $_noreg, 17, 26, 'B', 'E', 23); // Kegiatan Kesehatan Jiwa
            
            $this->showHeaderDetail('Permasalahan');
            $this->submitAndShowError( 4, $_noreg, $_tahun, 1, 26); // Bab 5 ID = 4 Permasalahan, sheet 1-26
            
        }
        
        public function readBab5_Analisa($uploadData, $_tahun, $_noreg) {
            $this->analisa = new Analisa_reader();
            
            $error[1] = $this->analisa->readBab_Analisa($uploadData['full_path'], 0, $_tahun, $_noreg, 12, 12, 'A', 'A', 9); // Analisa Bab 5-0, Cell A12, Kategori ID 9
            $error[3] = $this->analisa->readBab_Analisa($uploadData['full_path'], 2, $_tahun, $_noreg, 98, 98, 'B', 'B', 10); // Analisa Bab 5-2, Cell B98, Kategori ID 10
            $error_1 = $this->analisa->readBab_Analisa($uploadData['full_path'], 3, $_tahun, $_noreg, 81, 81, 'B', 'B', 11); // Analisa Bab 5-3, Cell B81, Kategori ID 11
            $error_2 = $this->analisa->readBab_Analisa($uploadData['full_path'], 3, $_tahun, $_noreg, 95, 95, 'B', 'B', 12); // Analisa Bab 5-3, Cell B95, Kategori ID 12
            $error[4] = array_merge($error_1, $error_2);
            
            $error[5] = $this->analisa->readBab_Analisa($uploadData['full_path'], 4, $_tahun, $_noreg, 27, 27, 'B', 'B', 13); // Analisa Bab 5-4, Cell B27, Kategori ID 13
            $error_3 = $this->analisa->readBab_Analisa($uploadData['full_path'], 5, $_tahun, $_noreg, 90, 90, 'B', 'B', 14); // Analisa Bab 5-5, Cell B90, Kategori ID 14
            $error_4 = $this->analisa->readBab_Analisa($uploadData['full_path'], 5, $_tahun, $_noreg, 107, 107, 'B', 'B', 15); // Analisa Bab 5-5, Cell B107, Kategori ID 15
            $error[6] = array_merge($error_3, $error_4);
            
            $error[7] = $this->analisa->readBab_Analisa($uploadData['full_path'], 6, $_tahun, $_noreg, 20, 20, 'A', 'A', 16); // Analisa Bab 5-6, Cell A20, Kategori ID 16
            $error_5 = $this->analisa->readBab_Analisa($uploadData['full_path'], 7, $_tahun, $_noreg, 9, 9, 'B', 'B', 17); // Analisa Bab 5-7, Cell B9, Kategori ID 17
            $error_6 = $this->analisa->readBab_Analisa($uploadData['full_path'], 7, $_tahun, $_noreg, 27, 27, 'A', 'A', 18); // Analisa Bab 5-7, Cell B27, Kategori ID 18
            $error[8] = array_merge($error_5, $error_6);
            
            $error_7 = $this->analisa->readBab_Analisa($uploadData['full_path'], 8, $_tahun, $_noreg, 15, 15, 'B', 'B', 19); // Analisa Bab 5-8, Cell B15, Kategori ID 19
            $error_8 = $this->analisa->readBab_Analisa($uploadData['full_path'], 8, $_tahun, $_noreg, 27, 27, 'B', 'B', 20); // Analisa Bab 5-8, Cell B27, Kategori ID 20
            $error_9 = $this->analisa->readBab_Analisa($uploadData['full_path'], 8, $_tahun, $_noreg, 50, 50, 'B', 'B', 21); // Analisa Bab 5-8, Cell B50, Kategori ID 21
            $error[9] = array_merge($error_7, $error_8, $error_9);
            
            $error_10 = $this->analisa->readBab_Analisa($uploadData['full_path'], 9, $_tahun, $_noreg, 43, 43, 'B', 'B', 22); // Analisa Bab 5-9, Cell B43, Kategori ID 22
            $error_11 = $this->analisa->readBab_Analisa($uploadData['full_path'], 9, $_tahun, $_noreg, 60, 60, 'A', 'A', 23); // Analisa Bab 5-9, Cell A60, Kategori ID 23
            $error[10] = array_merge($error_10, $error_11);
            
            $error_12 = $this->analisa->readBab_Analisa($uploadData['full_path'], 10, $_tahun, $_noreg, 22, 22, 'A', 'A', 24); // Analisa Bab 5-10, Cell A22, Kategori ID 24
            $error_13 = $this->analisa->readBab_Analisa($uploadData['full_path'], 10, $_tahun, $_noreg, 40, 40, 'A', 'A', 25); // Analisa Bab 5-10, Cell A40, Kategori ID 25
            $error[11] = array_merge($error_12, $error_13);
            
            $error_14 = $this->analisa->readBab_Analisa($uploadData['full_path'], 11, $_tahun, $_noreg, 12, 12, 'B', 'B', 26); // Analisa Bab 5-11, Cell B12, Kategori ID 26
            $error_15 = $this->analisa->readBab_Analisa($uploadData['full_path'], 11, $_tahun, $_noreg, 28, 28, 'B', 'B', 27); // Analisa Bab 5-11, Cell B28, Kategori ID 27
            $error_16 = $this->analisa->readBab_Analisa($uploadData['full_path'], 11, $_tahun, $_noreg, 41, 41, 'B', 'B', 28); // Analisa Bab 5-11, Cell B41, Kategori ID 28
            $error[12] = array_merge($error_14, $error_15, $error_16);
            
            $error_17 = $this->analisa->readBab_Analisa($uploadData['full_path'], 12, $_tahun, $_noreg, 13, 13, 'B', 'B', 29); // Analisa Bab 5-12, Cell B13, Kategori ID 29
            $error_18 = $this->analisa->readBab_Analisa($uploadData['full_path'], 12, $_tahun, $_noreg, 26, 26, 'B', 'B', 30); // Analisa Bab 5-12, Cell B26, Kategori ID 30
            $error_19 = $this->analisa->readBab_Analisa($uploadData['full_path'], 12, $_tahun, $_noreg, 41, 41, 'B', 'B', 31); // Analisa Bab 5-12, Cell B41, Kategori ID 31
            $error_20 = $this->analisa->readBab_Analisa($uploadData['full_path'], 12, $_tahun, $_noreg, 61, 61, 'B', 'B', 32); // Analisa Bab 5-12, Cell B61, Kategori ID 32
            $error[13] = array_merge($error_17, $error_18, $error_19, $error_20);
            
            $error_21 = $this->analisa->readBab_Analisa($uploadData['full_path'], 13, $_tahun, $_noreg, 36, 36, 'B', 'B', 33); // Analisa Bab 5-13, Cell B36, Kategori ID 33
            $error_22 = $this->analisa->readBab_Analisa($uploadData['full_path'], 13, $_tahun, $_noreg, 56, 56, 'B', 'B', 34); // Analisa Bab 5-13, Cell B56, Kategori ID 34
            $error[14] = array_merge($error_21, $error_22);
            
            $error_23 = $this->analisa->readBab_Analisa($uploadData['full_path'], 14, $_tahun, $_noreg, 92, 92, 'A', 'A', 35); // Analisa Bab 5-14, Cell A92, Kategori ID 35
            $error_24 = $this->analisa->readBab_Analisa($uploadData['full_path'], 14, $_tahun, $_noreg, 236, 236, 'B', 'B', 36); // Analisa Bab 5-14, Cell B236, Kategori ID 36
            $error[15] = array_merge($error_23, $error_24);
            
            $error[16] = $this->analisa->readBab_Analisa($uploadData['full_path'], 15, $_tahun, $_noreg, 10, 10, 'B', 'B', 37); // Analisa Bab 5-15, Cell B10, Kategori ID 37
            $error[17] = $this->analisa->readBab_Analisa($uploadData['full_path'], 16, $_tahun, $_noreg, 20, 20, 'B', 'B', 38); // Analisa Bab 5-16, Cell B20, Kategori ID 38
            $error[18] = $this->analisa->readBab_Analisa($uploadData['full_path'], 17, $_tahun, $_noreg, 15, 15, 'B', 'B', 39); // Analisa Bab 5-17, Cell B15, Kategori ID 39
            $error[19] = $this->analisa->readBab_Analisa($uploadData['full_path'], 18, $_tahun, $_noreg, 10, 10, 'B', 'B', 40); // Analisa Bab 5-18, Cell B10, Kategori ID 40
            $error[20] = $this->analisa->readBab_Analisa($uploadData['full_path'], 19, $_tahun, $_noreg, 18, 18, 'B', 'B', 41); // Analisa Bab 5-19, Cell B18, Kategori ID 41
            $error[21] = $this->analisa->readBab_Analisa($uploadData['full_path'], 20, $_tahun, $_noreg, 10, 10, 'B', 'B', 42); // Analisa Bab 5-20, Cell B10, Kategori ID 42
            $error[22] = $this->analisa->readBab_Analisa($uploadData['full_path'], 21, $_tahun, $_noreg, 8, 8, 'A', 'A', 43); // Analisa Bab 5-21, Cell A8, Kategori ID 43
            $error[23] = $this->analisa->readBab_Analisa($uploadData['full_path'], 22, $_tahun, $_noreg, 10, 10, 'B', 'B', 44); // Analisa Bab 5-22, Cell B10, Kategori ID 44
            
            
            $this->showHeaderDetail('Analisa');
            $this->submitAndShowError(4, $_noreg, $_tahun, 1, 23); // Bab 5 ID = 4 Permasalahan, sheet 1-26
        }
        
}

/* End of file page_upload.php */
/* Location: ./application/controllers/page_upload.php */
