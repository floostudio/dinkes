<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class testSelect2 extends CI_Controller {
    function __construct(){
                parent::__construct();  
				
				$this->load->model('m_bab6_2'); 
				
				$this->load->model('m_bab5_1_retrieve');
				$this->load->model('m_bab5_2'); 
				$this->load->model('m_bab5_3');
				$this->load->model('m_bab5_4'); 
				
				$this->load->model('m_analisa');
	}
	
	public function index()
	{     
	
			//radiologi
			$data['data_radiologi'] = $this->m_bab5_2->retrievePelayananRadiologi(1,null,null,null,null); 
			$data['num_radiologi'] = $this->m_bab6_2->countRS("jumlah_kunjungan_radiologi",1, null, null, null);
			 
			//KB
			$data['data_kb'] = $this->m_bab5_2->retrieveKB(1,null,null,null,null); 
			$data['num_kb'] = $this->m_bab6_2->countRS("pelayanan_kegiatan_kb",1, null, null, null); //parameter kedua -> tahun
			
			//Patologi
			$data['data_lab1'] = $this->m_bab5_2->retrieveLabPatologi(1,null,null,null,null); 
			$data['num_lab1'] = $this->m_bab6_2->countRS("pelayanan_lab_patologi",1, null, null, null);
			
			//Toksikologi
			$data['data_lab2'] = $this->m_bab5_2->retrieveLabToksikologi(1,null,null,null,null); 
			$data['num_lab2'] = $this->m_bab6_2->countRS("pelayanan_lab_toksikologi",1, null, null, null);
			
			 
			$data['data_lab3'] = $this->m_bab5_2->retrieveLabTotal(1,null,null,null,null); 
			$data['num_lab3'] = $this->m_bab6_2->countRS("pelayanan_lab_total",1, null, null, null);
			
			 
			$data['data_rm'] = $this->m_bab5_2->retrieveRehabMedik(1,null,null,null,null); 
			$data['num_rm'] = $this->m_bab6_2->countRS("rehabilitasi_medik",1, null, null, null);
			 
			$data['data_farmasi'] = $this->m_bab5_2->retrievePelayananFarmasi(1,null,null,null,null); 
			$data['num_farmasi'] = $this->m_bab6_2->countRS("pelayanan_farmasi",1, null, null, null);
			 
			$data['data_diet'] = $this->m_bab5_2->retrievePelayananDiet(1,null,null,null,null); 
			$data['num_diet'] = $this->m_bab6_2->countRS("pelayanan_diit",1, null, null, null);
			 
			$data['data_gizi'] = $this->m_bab5_2->retrieveKonsultasiGizi(1,null,null,null,null); 
			$data['num_gizi'] = $this->m_bab6_2->countRS("konsultasi_gizi",1, null, null, null);
			 
			$data['data_trans'] = $this->m_bab5_2->retrieveKegiatanTransfusi(1,null,null,null,null); 
			$data['num_trans'] = $this->m_bab6_2->countRS("kegiatan_transfusi_darah",1, null, null, null);
			 
			$data['data_darah1'] = $this->m_bab5_2->retrievePenggunaanDarah(1,null,null,null,null); 
			$data['num_darah1'] = $this->m_bab6_2->countRS("penggunaan_darah",1, null, null, null);
			 
			$data['data_darah2'] = $this->m_bab5_2->retrievePenerimaanDarah(1,null,null,null,null); 
			$data['num_darah2'] = $this->m_bab6_2->countRS("penerimaan_darah",1, null, null, null);
			
			//////////////m_5_4
			$data['data_sanitasi'] = $this->m_bab5_4->retrieveSanitasi(1,null,null,null,null); 
			$data['num_sanitasi'] = $this->m_bab6_2->countRS("kegiatan_sanitasi",1, null, null, null);
			
			$data['data_jenazah'] = $this->m_bab5_4->retrievePemulasaranJenazah(1,null,null,null,null); 
			$data['num_jenazah'] = $this->m_bab6_2->countRS("pemulasaraan_jenazah",1, null, null, null);
			
			$data['data_gigi'] = $this->m_bab5_4->retrievePelayananGigi(1,null,null,null,null); 
			$data['num_gigi'] = $this->m_bab6_2->countRS("pelayanan_gigi",1, null, null, null);
			
			$data['data_imunisasi'] = $this->m_bab5_4->retrieveImunisasi(1,null,null,null,null); 
			$data['num_imunisasi'] = $this->m_bab6_2->countRS("imunisasi",1, null, null, null);
			
			$data['data_jiwa'] = $this->m_bab5_4->retrieveKegiatanKesehatanJiwa(1,null,null,null,null); 
			$data['num_jiwa'] = $this->m_bab6_2->countRS("kegiatan_kesehatan_jiwa",1, null, null, null);
			 
			//////////////m_5_3
			
			$data['data_maskin1'] = $this->m_bab5_3->retrievePelayananMaskin(1,null,null,null,null); 
			$data['num_maskin1'] = $this->m_bab6_2->countRS("pelayanan_maskin",1, null, null, null);
			
			$data['data_maskin2'] = $this->m_bab5_3->retrieveSurveyMaskin(1,null,null,null,null); 
			$data['num_maskin2'] = $this->m_bab6_2->countRS("kelengkapan_survey_maskin",1, null, null, null);
			
			$data['data_maskin3'] = $this->m_bab5_3->retrieveKelolaMaskin(1,null,null,null,null); 
			$data['num_maskin3'] = $this->m_bab6_2->countRS("kelengkapan_kelola_maskin",1, null, null, null);
			
			$data['data_maskin4'] = $this->m_bab5_3->retrieveKeluhanMaskinPetugas(1,null,null,null,null); 
			$data['num_maskin4'] = $this->m_bab6_2->countRS("keluhan_maskin_petugas",1, null, null, null);
			
			$data['data_maskin5'] = $this->m_bab5_3->retrievePersentaseKeluhan(1,null,null,null,null); 
			$data['num_maskin5'] = $this->m_bab6_2->countRS("persentase_keluhan_maskin",1, null, null, null);
			
			$data['data_maskin6'] = $this->m_bab5_3->retrieveMekanismePengaduan(1,null,null,null,null); 
			$data['num_maskin6'] = $this->m_bab6_2->countRS("mekanisme_pengaduan_maskin",1, null, null, null);
			
			$data['data_maskin7'] = $this->m_bab5_3->retrieveSurveyKeluhan(1,null,null,null,null); 
			$data['num_maskin7'] = $this->m_bab6_2->countRS("hasil_survey_maskin",1, null, null, null);
			
			$data['data_maskin8'] = $this->m_bab5_3->retrievePerbaikanMaskin(1,null,null,null,null); 
			$data['num_maskin8'] = $this->m_bab6_2->countRS("keluhan_maskin_petugas",1, null, null, null);
			
			$data['data_maskin9'] = $this->m_bab5_3->retrievePenyakitTerbanyakRJMaskin(1,null,null,null,null); 
			$data['num_maskin9'] = $this->m_bab6_2->countRS("penyakit_terbanyak_maskin_rj",1, null, null, null);
			
			$data['data_maskin10'] = $this->m_bab5_3->retrievePenyakitTerbanyakRIMaskin(1,null,null,null,null); 
			$data['num_maskin10'] = $this->m_bab6_2->countRS("penyakit_terbanyak_maskin_ri",1, null, null, null);
			
			$data['data_maskin11'] = $this->m_bab5_3->retrieveTindakanTerbanyakMaskin(1,null,null,null,null); 
			$data['num_maskin11'] = $this->m_bab6_2->countRS("tindakan_terbanyak_maskin",1, null, null, null);
			
			//////////////m_5_1
			
			$data['data_51_1'] = $this->m_bab5_1_retrieve->retrieveTrendKunjunganIGD(1,null,null,null,null); 
			$data['num_51_1'] = $this->m_bab6_2->countRS("kunjungan_igd",1, null, null, null);
			
			$data['data_51_2'] = $this->m_bab5_1_retrieve->retrieveLiveSaving(1,null,null,null,null); 
			$data['num_51_2'] = $this->m_bab6_2->countRS("live_saving",1, null, null, null);
			
			$data['data_51_3'] = $this->m_bab5_1_retrieve->retrieveJumlTenagaIGD(1,null,null,null,null); 
			$data['num_51_3'] = $this->m_bab6_2->countRS("jumlah_tenaga_igd",1, null, null, null);
			
			$data['data_51_4'] = $this->m_bab5_1_retrieve->retrieveSepuluhBesarPenyIGD(1,null,null,null,null); 
			$data['num_51_4'] = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_igd",1, null, null, null);
			
			$data['data_51_5'] = $this->m_bab5_1_retrieve->retrieveKegiatanRujukanIGD(1,null,null,null,null); 
			$data['num_51_5'] = $this->m_bab6_2->countRS("kegiatan_rujukan_igd",1, null, null, null);
			
			$data['data_51_6'] = $this->m_bab5_1_retrieve->retrieveKegiatanRujukan(1,null,null,null,null); 
			$data['num_51_6'] = $this->m_bab6_2->countRS("kegiatan_rujukan",1, null, null, null);
			
			$data['data_51_7'] = $this->m_bab5_1_retrieve->retrieveSepuluhBesarKasusRujukan(1,null,null,null,null); 
			$data['num_51_7'] = $this->m_bab6_2->countRS("sepuluh_besar_kasus_rujukan",1, null, null, null);
			
			$data['data_51_8'] = $this->m_bab5_1_retrieve->retrieveKunjunganRawatJalan(1,null,null,null,null); 
			$data['num_51_8'] = $this->m_bab6_2->countRS("kunjungan_rawat_jalan",1, null, null, null);
			
			$data['data_51_9'] = $this->m_bab5_1_retrieve->retrievePembayaranRawatJalan(1,null,null,null,null); 
			$data['num_51_9'] = $this->m_bab6_2->countRS("pembayaran_rawat_jalan",1, null, null, null);
			
			$data['data_51_10'] = $this->m_bab5_1_retrieve->retrieveSepuluhBesarPenyakitRawatJln(1,null,null,null,null); 
			$data['num_51_10'] = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_rawat_jalan",1, null, null, null);
			
			$data['data_51_11'] = $this->m_bab5_1_retrieve->retrieveKegiatanRawatInap(1,null,null,null,null); 
			$data['num_51_11'] = $this->m_bab6_2->countRS("kegiatan_rawat_inap",1, null, null, null);
			
			$data['data_51_12'] = $this->m_bab5_1_retrieve->retrievePembayaranRawatInap(1,null,null,null,null); 
			$data['num_51_12'] = $this->m_bab6_2->countRS("pembayaran_rawat_inap",1, null, null, null);
			
			$data['data_51_13'] = $this->m_bab5_1_retrieve->retrieveIndikatorKegiatanRI(1,null,null,null,null); 
			$data['num_51_13'] = $this->m_bab6_2->countRS("indikator_klinik_kegiatan_rawat_inap",1, null, null, null);
			
			$data['data_51_14'] = $this->m_bab5_1_retrieve->retrievePenyakitTerbanyakRI(1,null,null,null,null); 
			$data['num_51_14'] = $this->m_bab6_2->countRS("sepuluh_besar_penyakit_rawat_inap",1, null, null, null);
			
			$data['data_51_15'] = $this->m_bab5_1_retrieve->retrieveKematianRI(1,null,null,null,null); 
			$data['num_51_15'] = $this->m_bab6_2->countRS("diagnosis_kematian_rawat_inap",1, null, null, null);
			
			$data['data_51_16'] = $this->m_bab5_1_retrieve->retrieveJumlahOperasi(1,null,null,null,null); 
			$data['num_51_16'] = $this->m_bab6_2->countRS("jumlah_operasi_bedah",1, null, null, null);
			
			$data['data_51_17'] = $this->m_bab5_1_retrieve->retrievePelayananPersalinan(1,null,null,null,null); 
			$data['num_51_17'] = $this->m_bab6_2->countRS("hasil_pelayanan_persalinan",1, null, null, null);
			
			$data['data_51_18'] = $this->m_bab5_1_retrieve->retrievePelayananPerinatologi(1,null,null,null,null); 
			$data['num_51_18'] = $this->m_bab6_2->countRS("hasil_pelayanan_perinatologi",1, null, null, null);
			
			//SPM
			$data['data_spm'] = $this->m_analisa->retrieveSPM(1,null,null,null,null); 
			$data['num_spm'] = $this->m_bab6_2->countRS("spm",1, null, null, null);
			
            $this->load->view('testSelect2', $data); 
	}
     
	public function readData()
	{  
         return "oye";
	}
	
	
}


