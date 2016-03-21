<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class data_rs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->user_id = $this->session->userdata('user_id');
        $this->user_name = $this->session->userdata('user_name');
        $this->load->model('m_rumahsakit');
        $this->load->model('m_user');
    }

    public function index() {
        if ($this->user_id) {
            $data['rumah_sakit'] = $this->m_rumahsakit->retrieveRS();
            $this->load->view('data_rs', $data);
        } else {
            redirect("login");
        }
    }
	 
    
	
	public function getRS(){
		$id = $this->input->post('id');
		$rumah_sakit = $this->m_rumahsakit->retrieveRSbyId($id);
		 
		$row = $rumah_sakit->result(); 
					  // echo count($row);
					   //echo 'id cek'.$idcek;
					   $data = array(
							    'RS_NOREG' => $row[0]->RS_NOREG,
                                'KODE_REGISTRASI' => $row[0]->KODE_REGISTRASI, //new
								'RS_REGION_ID' => $row[0]->RS_REGION_ID,
                                'RS_NAMA' => $row[0]->RS_NAMA,
                                'RS_ALAMAT' => $row[0]->RS_ALAMAT,
                                'RS_KAB' => $row[0]->RS_KAB,
                                'RS_KODEPOS' => $row[0]->RS_KODEPOS,
                                'RS_TELP' => $row[0]->RS_TELP,
                                'RS_FAX' => $row[0]->RS_FAX,
                                'RS_EMAIL' => $row[0]->RS_EMAIL,
                                'RS_TELP_HUMAS' => $row[0]->RS_TELP_HUMAS,
                                'RS_WEBSITE' => $row[0]->RS_WEBSITE,
                                'RS_NAMA_DIREKTUR' => $row[0]->RS_NAMA_DIREKTUR,
                                'RS_PENYELENGGARA' => $row[0]->RS_PENYELENGGARA,
                                'RS_STATUS_PENYELENGGARA' => $row[0]->RS_STATUS_PENYELENGGARA,
                                'RS_KELAS' => $row[0]->RS_KELAS,
                                'RS_JENIS' => $row[0]->RS_JENIS,
                                'RS_LUAS_LAHAN' => $row[0]->RS_LUAS_LAHAN,
                                'RS_LUAS_BANGUNAN' => $row[0]->RS_LUAS_BANGUNAN,
                                'RS_TGL_REG' => $row[0]->RS_TGL_REG,
                                'RS_SIO_NOMOR' => $row[0]->RS_SIO_NOMOR,
                                'RS_SIO_TGL' => $row[0]->RS_SIO_TGL,
                                'RS_SIO_OLEH' => $row[0]->RS_SIO_OLEH,
                                'RS_SIO_SIFAT' => $row[0]->RS_SIO_SIFAT,
                                'RS_SIO_MASABERLAKU' => $row[0]->RS_SIO_MASABERLAKU,
                                'RS_SPK_NOMOR' => $row[0]->RS_SPK_NOMOR,
                                'RS_SPK_TGL' => $row[0]->RS_SPK_TGL,
                                'RS_SPK_OLEH' => $row[0]->RS_SPK_OLEH,
                                'RS_SPK_SIFAT' => $row[0]->RS_SPK_SIFAT,
                                'RS_SPK_MASABERLAKU' => $row[0]->RS_SPK_MASABERLAKU,
                                'RS_AKREDITASI' => $row[0]->RS_AKREDITASI,
                                'RS_AKR_PENTAHAPAN' => $row[0]->RS_AKR_PENTAHAPAN,
                                'RS_AKR_STATUS' => $row[0]->RS_AKR_STATUS,
                                'RS_TGL_AKREDITASI' => $row[0]->RS_TGL_AKREDITASI,
                                'RS_STRENGTH' => $row[0]->RS_STRENGTH,
                                'RS_WEAKNESS' => $row[0]->RS_WEAKNESS
                            );
							
							return '4';
	}

}
