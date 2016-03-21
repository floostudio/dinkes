<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class data_rs_crud extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->load->model('m_rumahsakit');
        $this->load->model('m_user');
		$this->load->model('m_region');
    }

    public function index() {
        if ($this->user_id) {
		    //$idRS =  $this->input->post('rs_id');
            $data['rumah_sakit'] = $this->m_rumahsakit->retrieveRS();
			$data['region'] = $this->m_region->retrieveRegion();
			$data['kelas'] = $this->m_rumahsakit->retrieveKelas();
			$data['jenis'] = $this->m_rumahsakit->retrieveJenis();
            $this->load->view('data_rs_crud', $data);
        } else {
            redirect("login");
        }
    }
	 
    public function add() {
       
	$region =  $this->input->post('newrs_region');
        $rsnoreg =  $this->input->post('newrs_kodereg');
        $nama=  $this->input->post('newrs_nama');
        $alamat = $this->input->post('newrs_alamat');
        $kab = $this->input->post('newrs_kabupaten');
        $kodepos = $this->input->post('newrs_kodepos');;
        $telp = $this->input->post('newrs_telp');
        $fax = $this->input->post('newrs_fax');
        $email = $this->input->post('newrs_email');
        $humas = $this->input->post('newrs_humas');
        $website = $this->input->post('newrs_website');
        $direktur = $this->input->post('newrs_direktur');
        $penyelenggara = $this->input->post('newrs_penyelenggara');
        $statpenyelenggara = $this->input->post('newrs_statpenyelenggara');
        $tglreg = $this->input->post('newrs_tgl_reg');
        $jenis = $this->input->post('newrs_jenis');
        $kelas = $this->input->post('newrs_kelas');
        $lahan = $this->input->post('newrs_lahan');
        $bangunan = $this->input->post('newrs_bangunan');
        $nosio = $this->input->post('newrs_no_sio');
        $tglsio = $this->input->post('newrs_tgl_sio');
        $olehsio = $this->input->post('newrs_oleh_sio');
        $sifatsio = $this->input->post('newrs_sifat_sio');
        $berlakusio = $this->input->post('newrs_berlaku_sio');
        $nospk = $this->input->post('newrs_no_spk');
        $tglspk = $this->input->post('newrs_tgl_spk');
        $olehspk = $this->input->post('newrs_oleh_spk');
        $sifatspk = $this->input->post('newrs_sifat_spk');
        $berlakuspk = $this->input->post('newrs_berlaku_spk');
        $akreditasi = $this->input->post('newrs_akreditasi');
        $pentahapan = $this->input->post('newrs_pentahapan');
        $status = $this->input->post('newrs_status');
        $tglakreditasi = $this->input->post('newrs_tgl_akreditasi');
        $strength = $this->input->post('newrs_strength');
        $weakness= $this->input->post('newrs_weakness');
	$pemilik= $this->input->post('newrs_pemilik');
        
        $status = $this->m_rumahsakit->inputRSAll($rsnoreg, $region, $nama, $alamat, //new
                $kab, $kodepos, $telp, $fax, $email, $humas, $website,
                $direktur, $penyelenggara, $statpenyelenggara, $kelas, $jenis,
                $lahan, $bangunan, $tglreg,
                $nosio, $tglsio, $olehsio, $sifatsio, $berlakusio,
                $nospk, $tglspk, $olehspk, $sifatspk, $berlakuspk,
                $akreditasi, $pentahapan, $status, $tglakreditasi,
                $strength, $weakness,1,$pemilik);

        if ($status) {
            redirect("data_rs");
        } else
            redirect("data_rs_crud");
    }
 
	public function delete() {
        $data = $this->input->post('data');
         
        $status = $this->m_rumahsakit->deleteRSbyId($data);
        if ($status) {
            return true;
        } else
            return false;
    }

}
