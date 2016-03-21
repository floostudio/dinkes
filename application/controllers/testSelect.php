<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testSelect extends CI_Controller {
    function __construct(){
                parent::__construct(); 
				$this->load->model('m_bab6_1'); 
				$this->load->model('m_bab6_2'); 
				$this->load->model('m_bab6_3'); 
				$this->load->model('m_bab6_4');
				$this->load->model('m_bab4'); 
				$this->load->model('m_sarpras'); 
				$this->load->model('m_sdm'); 
				
				$this->load->model('m_bab5_2'); 
				$this->load->model('m_bab5_4');
	}
	
	public function index()
	{    
			
			$data['data_spm'] =  $this->m_bab6_1->retrieveSpmRS(1,null);
			$data['num_spm'] = $this->m_bab6_2->countRS("spm_rs",1);
			$data['kat_spm'] = $this->m_bab6_2->countKategori("list_spm_rs");
            
			$data['data_survey'] =  $this->m_bab6_1->retrieveSurveyRS(1,null);
			$data['num_survey'] = $this->m_bab6_2->countRS("survey_pelanggan",1);
			$data['kat_survey'] = $this->m_bab6_2->countKategori("list_unit_survey");
            
			$data['waw'] = $this->m_bab6_2->retrieveKasusTBrj(1,null);
			$data['num_kasus_tb_rj'] = $this->m_bab6_2->countRS("kasus_tb_rj",1);
			$data['kat_kasus_tb_rj'] = $this->m_bab6_2->countKategori("list_golongan_umur");
             
			$data['data_tb_rj_jenis'] = $this->m_bab6_2->retrieveKasusTBrjJenis(1,null);
			$data['num_tb_rj_jenis'] = $this->m_bab6_2->countRS("kasus_tb_rj_jenis",1);
			$data['kat_tb_rj_jenis'] = $this->m_bab6_2->countKategori("list_jenis_tb");
             
			$data['data_tb_ri'] = $this->m_bab6_2->retrieveKasusTBri(1,null);
			$data['num_tb_ri'] = $this->m_bab6_2->countRS("kasus_tb_ri",1);
			$data['kat_tb_ri'] = $this->m_bab6_2->countKategori("list_golongan_umur");
             
			$data['data_tb_ri_jenis'] = $this->m_bab6_2->retrieveKasusTBriJenis(1,null);
			$data['num_tb_ri_jenis'] = $this->m_bab6_2->countRS("kasus_tb_ri_jenis",1);
			$data['kat_tb_ri_jenis'] = $this->m_bab6_2->countKategori("list_jenis_tb");
            
			$data['data_vct_cst'] = $this->m_bab6_3->retrieveKlinikVCT(1,null);
			$data['num_vct_cst'] = $this->m_bab6_2->countRS("vct_cst",1);
			$data['kat_vct_cst'] = $this->m_bab6_2->countKategori("list_golongan_umur");
            
			
			$data['data_hiv'] = $this->m_bab6_3->retrieveHIV(1,null);
			$data['num_hiv'] = $this->m_bab6_2->countRS("hiv",1);
			$data['kat_hiv'] = $this->m_bab6_2->countKategori("list_golongan_umur");
            
			$data['data_dbd'] = $this->m_bab6_3->retrieveDBD(1,null);
			$data['num_dbd'] = $this->m_bab6_2->countRS("dbd",1);
			 
			$data['data_dbd2'] = $this->m_bab6_3->retrieveDBDBaruPulang(1,null);
			$data['num_dbd2'] = $this->m_bab6_2->countRS("dbd_baru_dan_pulang",1);
			 
			 
			$data['data_kematian_maternal'] = $this->m_bab6_3->retrieveKematianIbu(1,null);
			$data['num_kematian_maternal'] = $this->m_bab6_2->countRS("jumlah_kematian_ibu",1);
			 
			$data['data_sebab_kematian_ibu'] = $this->m_bab6_3->retrieveSebabKematianIbu(1,null);
			$data['num_sebab_kematian_ibu'] = $this->m_bab6_2->countRS("jumlah_kematian_ibu_per_faktor",1);
			$data['kat_sebab_kematian_ibu'] = $this->m_bab6_2->countKategori("list_sebab_kematian_ibu");
            
			$data['data_kematian_persalinan'] = $this->m_bab6_3->retrieveSebabKematianIbuPersalinan(1,null);
			$data['num_kematian_persalinan'] = $this->m_bab6_2->countRS("kematian_ibu_karena_persalinan",1);
			
			$data['data_mdgs4_1'] = $this->m_bab6_4->retrieveMDGS41(1,null);
			$data['num_mdgs4_1'] = $this->m_bab6_2->countRS("mdgs4_1",1);
			$data['data_mdgs4_2'] = $this->m_bab6_4->retrieveMDGS42(1,null);
			
			$data['data_mdgs5_1'] = $this->m_bab6_4->retrieveMDGS51(1,null);
			$data['num_mdgs5_1'] = $this->m_bab6_2->countRS("mdgs5_1",1);
			$data['data_mdgs5_2'] = $this->m_bab6_4->retrieveMDGS52(1,null);
			$data['data_mdgs5_3'] = $this->m_bab6_4->retrieveMDGS53(1,null);
			
			$data['data_mdgs6_1'] = $this->m_bab6_4->retrieveMDGS61(1,null);
			$data['num_mdgs6_1'] = $this->m_bab6_2->countRS("mdgs6_1",1);
			$data['data_mdgs6_2'] = $this->m_bab6_4->retrieveMDGS62(1,null);
			
			$data['data_maternal_esensial'] = $this->m_bab6_4->retrieveMaternalEsensial(1,null);
			$data['num_maternal_esensial'] = $this->m_bab6_2->countRS("mdgs5_peralatan_maternal_essensial",1);
			$data['kat_maternal_esensial'] = $this->m_bab6_2->countKategori("list_peralatan_maternal_essensial");
            
			$data['data_neonatal_esensial'] = $this->m_bab6_4->retrieveNeonatalEsensial(1,null);
			$data['num_neonatal_esensial'] = $this->m_bab6_2->countRS("mdgs4_peralatan_neonatal_esensial",1);
			$data['kat_neonatal_esensial'] = $this->m_bab6_2->countKategori("list_peralatan_neonatal_esensial");
            
			
            $this->load->view('testSelect', $data);
         
	}
     
	public function readData()
	{  
         return "oye";
	}
	
	
}


