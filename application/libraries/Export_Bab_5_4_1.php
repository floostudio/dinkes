<?php

Class Export_Bab_5_4_1 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab6_2');
		$this->CI->load->model('m_bab5_3');
		$this->CI->load->model('m_analisa');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) { 
		
	$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);	 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelayananMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataPelayananMaskin($tahun), null, 'A5');		  
        $objPHPExcel->getActiveSheet()->setTitle('Pelayanan Maskin');  
		
		$objPHPExcel->createSheet(1);
		$objPHPExcel->setActiveSheetIndex(1);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSurveyMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataSurveyMaskin($tahun), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Survey Maskin');
		
		$objPHPExcel->createSheet(2);
		$objPHPExcel->setActiveSheetIndex(2);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKelolaMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataKelolaMaskin($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Kelola Maskin');
		
		$objPHPExcel->createSheet(3);
		$objPHPExcel->setActiveSheetIndex(3);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKeluhanMaskinPetugas($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataKeluhanMaskinPetugas($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Keluhan Maskin Petugas');
		
		$objPHPExcel->createSheet(4);
		$objPHPExcel->setActiveSheetIndex(4);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPersentaseKeluhan($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataPersentaseKeluhan($tahun), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Persentase Keluhan');
		
		$objPHPExcel->createSheet(5);
		$objPHPExcel->setActiveSheetIndex(5);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerMekanismePengaduan($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataMekanismePengaduan($tahun,10), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Mekanisme Pengaduan');
		
        /*$objPHPExcel->createSheet(6);
		$objPHPExcel->setActiveSheetIndex(6);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSurveyKeluhan($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataSurveyKeluhan($tahun), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Survey Keluhan');
		
        $objPHPExcel->createSheet(7);
		$objPHPExcel->setActiveSheetIndex(7);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPerbaikanMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataPerbaikanMaskin($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Upaya Perbaikan Maskin');
		
        /*$objPHPExcel->createSheet(8);
	$objPHPExcel->setActiveSheetIndex(8);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPenyakitTerbanyak($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPenyakitTerbanyakRJMaskin($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Penyakit Terbanyak RJ Maskin');*/
		 
		
        /*$objPHPExcel->createSheet(8);
	$objPHPExcel->setActiveSheetIndex(8);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPenyakitTerbanyak($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPenyakitTerbanyakRIMaskin($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Penyakit Terbanyak RI Maskin');*/
		
        /*$objPHPExcel->createSheet(8);
		$objPHPExcel->setActiveSheetIndex(8);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTindakanTerbanyakMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataTindakanTerbanyakMaskin($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Tindakan Terbanyak Maskin');
		
        $objPHPExcel->createSheet(9);
		$objPHPExcel->setActiveSheetIndex(9);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmMaskin($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataSpm($tahun,13,1,36), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Maskin');
		
        $objPHPExcel->createSheet(10);
		$objPHPExcel->setActiveSheetIndex(10);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan($tahun), null, 'A1');		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,13), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Maskin');*/
		
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
	echo $data[0][0];
        header('Content-type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment; filename="Rekap Bab V-Maskin Tahun '.$tahun_rekap.'.xls"'); 
        ob_clean();
        $objWriter->save('php://output'); 
    }
	
	function headerPelayananMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array_fill(0,200,'');
		
		$header2[0] = 'No';
		$header2[1] = 'Region';
		$header2[2] = 'Kode RS';
		$header2[3] = 'Nama RS';
		$header2[4] = 'Rawat Jalan';
		$header2[69] = 'Rawat Darurat';
		$header2[134] = 'Rawat Inap';
		
		$header = array(
				  $header2,		
				  array('','','','',	'Rawat Jalan','','','','','','','','','','','','',
										'Jumlah Pasien RJ','','','','','','','','','','','','',
										'Jumlah Kunjungan RJ','','','','','','','','','','','','',
										'Jumlah Keluhan RJ','','','','','','','','','','','','',
										'Keluhan Yang ditangani RJ','','','','','','','','','','','','',
										
										'Rawat Darurat','','','','','','','','','','','','',
										'Jumlah Pasien RJ','','','','','','','','','','','','',
										'Jumlah Kunjungan RJ','','','','','','','','','','','','',
										'Jumlah Keluhan RJ','','','','','','','','','','','','',
										'Keluhan Yang ditangani RJ','','','','','','','','','','','','',
										
										'Rawat Inap','','','','','','','','','','','','',
										'Jumlah Pasien RJ','','','','','','','','','','','','',
										'Jumlah Kunjungan RJ','','','','','','','','','','','','',
										'Jumlah Keluhan RJ','','','','','','','','','','','','',
										'Keluhan Yang ditangani RJ','','','','','','','','','','','',''
										),
				  array('','','','',	($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata','',
										($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','','Jumlah','','Rerata',''
										),				  
				  array('','','','',	'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P',
										'L','P','Total','L','P','Total','L','P','Total','L','P','L','P'
										) 
				  ); 
		 
		return $header;
	}
	
	function dataPelayananMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrievePelayananMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("pelayanan_maskin",$tahun, null, null, null); 
		 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 15; $k++) {
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_L_N2;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_P_N2;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_TOTAL_N2;

					$hasil[$x][++$y] = $row[$track]->P_MASKIN_L_N1;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_P_N1;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_TOTAL_N1;

					$hasil[$x][++$y] = $row[$track]->P_MASKIN_L_N;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_P_N;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_TOTAL_N;

					$hasil[$x][++$y] = $row[$track]->P_MASKIN_JUMLAH_L;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_JUMLAH_P;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_RERATA_L;
					$hasil[$x][++$y] = $row[$track]->P_MASKIN_RERATA_P;
					$track++; 
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}

	function headerSurveyMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array (
				 array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Prosedur Pelaksanaan (SOP)',
						'Tim Pelaksana Survey','', '',
						'Media','','','',
						'Pelaporan'), //ganti header
				  array('','','','','',
									'','Internal RS','Eksternal RS',
									''.'Kuestioner','Kotak Saran',
									'Media Massa')				 );
		return $header;
	}
	
	function dataSurveyMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrieveSurveyMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("kelengkapan_survey_maskin",$tahun, null, null, null); 
		  
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 9; $k++) {
					if ($row[$track]->KONDISI == 0)
						$hasil[$x][++$y] = 'X';
					else if ($row[$track]->KONDISI == 1)
						$hasil[$x][++$y] = 'V';
					$track++;
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}

	function headerKelolaMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit',
									  'Prosedur Pengelolaan ','Pelaksanaan Pengelolaan',
									  'Tempat Pengaduan dan penyelesaian Pengaduan/Keluhan',
									  'Catatan proses pengaduan','Catatan/Dokumen tindak lanjut',
									  'Pelaporan'); 
		return $header;
	}
	
	function dataKelolaMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrieveKelolaMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("kelengkapan_kelola_maskin",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA; 
				
				for ($k = 0; $k < 6; $k++) {
					if ($row[$track]->KELOLA_MASKIN_KONDISI == 0)
						$hasil[$x][++$y] = 'X';
					else if ($row[$track]->KELOLA_MASKIN_KONDISI == 1)
						$hasil[$x][++$y] = 'V';
					$track++;
				}				
				 
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}

	function headerKeluhanMaskinPetugas($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<21;$i++){
			$header2[$idx] = 'Kasus';
			$header2[$idx+1] = '%'; 
			$idx+=2;
		}
		
		$header = array(
				  array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit',
														'Tenaga Spesialis','','','','','',
														'Dokter Umum','','','','','',
														'Perawat','','','','','',
														'Bidan','','','','','',
														'Tenaga Paramedis Lain','','','','','',
														'Petugas Administrasi','','','','','',
														'Petugas lain','','','','',''
														),
				  array('','','','','UGD','','IRJA','','IRNA','', 'UGD','','IRJA','','IRNA','', 'UGD','','IRJA','','IRNA','', 
									'UGD','','IRJA','','IRNA','', 'UGD','','IRJA','','IRNA','', 'UGD','','IRJA','','IRNA','', 
									'UGD','','IRJA','','IRNA',''),
				   $header2
				  ); 
				  
		return $header;
	}
	
	function dataKeluhanMaskinPetugas($tahun){
		 $data = $this->CI->m_bab5_3->retrieveKeluhanMaskinPetugas($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("keluhan_maskin_petugas",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA; 
				
				 for ($k = 0; $k < 7; $k++) {
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_UGD;
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_UGD_P;
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_IRJA;
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_IRJA_P;
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_IRNA;
					$hasil[$x][++$y] =$row[$track]->SV_MASKIN_IRNA_P;
					$track++;
				}				
				 
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerPersentaseKeluhan($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header =array(
				 array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Keluhan terhadap layanan dari Petugas','','',
						'Keluhan terhadap Komunikasi Petugas','','',
						'Keluhan terhadap sikap/tingkah laku petugas','','',
						'Sarana prasarana/alat medis','','',
						'Sarana prasarana non medis (parkir/gedung)','','',
						'Lainnya','',''),
				  array('','','','','Jumlah Keluhan yang Ditangani','Jumlah keluhan','%',
									'Jumlah Keluhan yang Ditangani','Jumlah keluhan','%',
									'Jumlah Keluhan yang Ditangani','Jumlah keluhan','%',
									'Jumlah Keluhan yang Ditangani','Jumlah keluhan','%',
									'Jumlah Keluhan yang Ditangani','Jumlah keluhan','%',
									'Jumlah Keluhan yang Ditangani','Jumlah keluhan','%' 
									)
				 );
		return $header;		
	}
	
	function dataPersentaseKeluhan($tahun){
		 $data = $this->CI->m_bab5_3->retrievePersentaseKeluhan($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("persentase_keluhan_maskin",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 6; $k++){ 
					$hasil[$x][++$y] = $row[$track]->KELUHAN_MASKIN_DITANGANI ; 
					$hasil[$x][++$y] = $row[$track]->KELUHAN_MASKIN_JUMLAH ; 
					$hasil[$x][++$y] = $row[$track]->KELUHAN_MASKIN_PERSENTASE ; 
					$track++; 
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerMekanismePengaduan($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<5;$i++){
			$header2[$idx] = ($tahun_rekap-2);
			$header2[$idx+1] = ($tahun_rekap-1);
			$header2[$idx+2] = $tahun_rekap; 
			$header2[$idx+3] = $header2[$idx+4] =  $header2[$idx+5] =''; 
			$idx+=6;
		}
		
		$header = array(
				  array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit',
														'Media Masa','','','','','',
														'Media Elektronik (TV, Radio, Internet dll)','','','','','',
														'Kotak Saran','','','','','',
														'Telepon/SMS/Hotlines ','','','','','',
														'Tim Pengendali Pelayanan ','','','','','' 
														),
				  array('','','','', 'Tahun','','','Jumlah','Rerata','Tren',
									'Tahun','','','Jumlah','Rerata','Tren',
									'Tahun','','','Jumlah','Rerata','Tren',
									'Tahun','','','Jumlah','Rerata','Tren',
									'Tahun','','','Jumlah','Rerata','Tren'
									),
				  $header2
				  );
		return $header;
	}
	
	function dataMekanismePengaduan($tahun){
		 $data = $this->CI->m_bab5_3->retrieveMekanismePengaduan($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("mekanisme_pengaduan_maskin",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 5; $k++){ 
					$hasil[$x][++$y] = $row[$track]->MEKANISME_PENGADUAN_N2 ; 
					$hasil[$x][++$y] = $row[$track]->MEKANISME_PENGADUAN_N1 ; 
					$hasil[$x][++$y] = $row[$track]->MEKANISME_PENGADUAN_N ; 
					$hasil[$x][++$y] = $row[$track]->MEKANISME_PENGADUAN_JML ; 
					$hasil[$x][++$y] = ($row[$track]->MEKANISME_PENGADUAN_N2 + $row[$track]->MEKANISME_PENGADUAN_N1 + $row[$track]->MEKANISME_PENGADUAN_N) / 3;
					$hasil[$x][++$y] = $row[$track]->MEKANISME_PENGADUAN_TREN ; 
					$track++; 
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerSurveyKeluhan($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array(
				  array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Rawat Jalan','','','',
						'IGD','','','',
						'Rawat Inap','','','','Analisa'
						),
				  array('','','','','Skor','Jumlah Responden','Tingkat Kepuasan','Pelayanan yang dirasakan tidak memuaskan', //revisi
									'Skor','Jumlah Responden','Tingkat Kepuasan','Pelayanan yang dirasakan tidak memuaskan',
									'Skor','Jumlah Responden','Tingkat Kepuasan','Pelayanan yang dirasakan tidak memuaskan'
									)				 );
		return $header;		
	}
	

	public function getKondisiKeluhan($input)
        {
            if($input==1)
            {
                $kondisi = 'sangat puas';
            }
            else if($input== 2){
                $kondisi = 'puas';
            }
           else if($input== 3){
                $kondisi = 'kurang puas';
            }
            else if($input== 4){
                $kondisi = 'tidak puas';
            }
            else {
                $kondisi = '-';
            }
                
                return $kondisi;
        }

	function dataSurveyKeluhan($tahun){
		 $data = $this->CI->m_bab5_3->retrieveSurveyKeluhan($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("hasil_survey_maskin",$tahun, null, null, null); 
		 
		 $analisa = $this->CI->m_analisa->retrieveAnalisa($tahun,null,35); 
		 $analisaRest = $analisa->result();
		 $trackAnalisa = 0; 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 3; $k++){ 
					$hasil[$x][++$y] = $row[$track]->HASIL_SURVEY_SKOR ; 
					$hasil[$x][++$y] = $row[$track]->HASIL_SURVEY_RESPONDEN ; 
					$hasil[$x][++$y] = $this->getKondisiKeluhan($row[$track]->HASIL_SURVEY_KONDISI);
					$hasil[$x][++$y] = $row[$track]->HASIL_SURVEY_KETERANGAN ;  
	 
					$track++; 
				}
				
				//analisa
				$analisaData = null;
				if (count($analisaRest)!= null){ 
					for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
						if($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track-1]->RS_NOREG  )
						{ 
								$analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
								break; 
						}  
					} 
				}
				
				if($analisaData != null)
					$hasil[$x][++$y] =  $analisaData;
				else
					$hasil[$x][++$y] = '-';
				//////////////////
				
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerPerbaikanMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		 
		$header = array('No','Region','Kode RS','Nama RS',
								'Upaya 1','Upaya 2','Upaya 3',
								'Upaya 4','Upaya 5','Upaya 6',
								'Upaya 7','Upaya 8','Upaya 9',
								'Upaya 10');
				  
		return $header;
	}
	
	function dataPerbaikanMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrievePerbaikanMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("upaya_perbaikan_maskin",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 $curr_rs ="";
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				//cek untuk data lebih dari 10
				while(1){
				if($curr_rs != $row[$track]->KODE_REGISTRASI){
					   $curr_rs = $row[$track]->KODE_REGISTRASI;
					   break;
				   }
				else 
				  $track++;
				}
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < 10; $k++){ 
				    if(isset($row[$track]->KODE_REGISTRASI)){
				    if($curr_rs == $row[$track]->KODE_REGISTRASI){
					  $hasil[$x][++$y] = $row[$track]->PERBAIKANMASKIN_URAIAN ; 
					  $track++;  
					}
					}
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerPenyakitTerbanyak($tahun){
		
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header1 = array_fill(0,100,'');
		
		$header1[0] = 'No';
		$header1[1] = 'Region';
		$header1[2] = 'Kode RS';
		$header1[3] = 'Nama RS';
		$header1[4] = ($tahun_rekap-2);
		$header1[34] = ($tahun_rekap-1);
		$header1[64] = $tahun_rekap;
		 
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<30;$i++){
			$header2[$idx] = 'Kode ICD10';
			$header2[$idx+1] = 'Nama'; 
			$header2[$idx+2] = 'Jumlah'; 
			$idx+=3;
		}
		
		$header = array(
				  $header1,
				  array('','','','',
														'No 1','','','No 2','','','No 3','','','No 4','','','No 5','','',
														'No 6','','','No 7','','','No 8','','','No 9','','','No 10','','',
														'No 1','','','No 2','','','No 3','','','No 4','','','No 5','','',
														'No 6','','','No 7','','','No 8','','','No 9','','','No 10','','',
														'No 1','','','No 2','','','No 3','','','No 4','','','No 5','','',
														'No 6','','','No 7','','','No 8','','','No 9','','','No 10','',''
														), 
				  $header2
				  );
		return $header;
	}
	
	function dataPenyakitTerbanyakRJMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrievePenyakitTerbanyakRJMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("penyakit_terbanyak_maskin_rj",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$curr_rs = $row[$track]->LIST_TAHUN_ID;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				 
				for ($i = 0; $i < 3; $i++){
					for ($k = 0; $k < 10; $k++){ 
						if($curr_rs ==  $row[$track]->LIST_TAHUN_ID){
						$hasil[$x][++$y] = $row[$track]->ICD10_CODE ; 
						$hasil[$x][++$y] = $row[$track]->PENYAKIT_MASKIN_RJ_NAMA ; 
						$hasil[$x][++$y] = $row[$track]->PENYAKIT_MASKIN_RJ_JML ; 
						$track++; 
						}
						else{
						$hasil[$x][++$y] = '-'; 
						$hasil[$x][++$y] = '-'; 
						$hasil[$x][++$y] = '-'; 
						} 
					}
					$curr_rs = $row[$track]->LIST_TAHUN_ID;
				}
					
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	  
	function dataPenyakitTerbanyakRIMaskin($tahun){
		 $data = $this->CI->m_bab5_3->retrievePenyakitTerbanyakRIMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("penyakit_terbanyak_maskin_ri",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$curr_rs = $row[$track]->LIST_TAHUN_ID;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($a = 0; $a < 3; $a++) {
					for ($k = 0; $k < 10; $k++){ 
						if($curr_rs ==  $row[$track]->LIST_TAHUN_ID){
						$hasil[$x][++$y] = $row[$track]->ICD10_CODE ; 
						$hasil[$x][++$y] = $row[$track]->PENYAKIT_MASKIN_RI_NAMA ; 
						$hasil[$x][++$y] = $row[$track]->PENYAKIT_MASKIN_RI_JML ; 
						$track++; 
					}
					else{
						$hasil[$x][++$y] = '-'; 
						$hasil[$x][++$y] = '-'; 
						$hasil[$x][++$y] = '-'; 
						}  
					}
					$curr_rs = $row[$track]->LIST_TAHUN_ID;
				}

				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerTindakanTerbanyakMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header1 = array_fill(0,100,'');
		
		$header1[0] = 'No';
		$header1[1] = 'Region';
		$header1[2] = 'Kode RS';
		$header1[3] = 'Nama RS';
		$header1[4] = ($tahun_rekap-2);
		$header1[24] = ($tahun_rekap-1);
		$header1[44] = $tahun_rekap;
		 
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<30;$i++){
			$header2[$idx] = 'Jenis Tindakan';
			$header2[$idx+1] = 'Jumlah';   
			$idx+=2;
		}
		
		$header = array(
				  $header1,
				  array('','','','',
														'No 1','','No 2','','No 3','','No 4','','No 5','', 
														'No 6','','No 7','','No 8','','No 9','','No 10','', 
														'No 1','','No 2','','No 3','','No 4','','No 5','', 
														'No 6','','No 7','','No 8','','No 9','','No 10','', 
														'No 1','','No 2','','No 3','','No 4','','No 5','', 
														'No 6','','No 7','','No 8','','No 9','','No 10','' 
														), 
				  $header2
				  );
		return $header;
	}
	
	function dataTindakanTerbanyakMaskin($tahun){
		$data = $this->CI->m_bab5_3->retrieveTindakanTerbanyakMaskin($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRS("tindakan_terbanyak_maskin",$tahun, null, null, null); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$curr_rs = $row[$track]->LIST_TAHUN_ID;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($a = 0; $a < 3; $a++) {
					for ($k = 0; $k < 10; $k++){ 
						if($curr_rs ==  $row[$track]->LIST_TAHUN_ID){
						$hasil[$x][++$y] = $row[$track]->TM_JENIS_TINDAKAN ; 
						$hasil[$x][++$y] = $row[$track]->TM_JUMLAH ;  
						$track++; 
						}
					else{
						$hasil[$x][++$y] = '-'; 
						$hasil[$x][++$y] = '-';  
						} 
					}
					$curr_rs = $row[$track]->LIST_TAHUN_ID;
					
				}

				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerSpmMaskin($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Pelayanan terhadap pasien GAKIN yang datang ke RS pada setiap unit pelayanan', '','','',						 
						'Analisa'),
					array('','','','','Standar','Hasil Numerator','Hasil Denumenrator','Nilai')
					);
		return $header;
	}
	
	function dataSpm($tahun,$idSpm,$jumKategori,$analisaId){
		 $data = $this->CI->m_analisa->retrieveSPM($idSpm,$tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_umum->countRSspm("spm",$tahun, null, null, null, $idSpm); 
		 
		 if($analisaId != null){
			 $analisa = $this->CI->m_analisa->retrieveAnalisa($tahun,null,$analisaId); 
			 $analisaRest = $analisa->result();
			 $trackAnalisa = 0; 
		 }
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				for ($k = 0; $k < $jumKategori; $k++) {
					$hasil[$x][++$y] = $row[$track]->SPM_STANDAR;
					$hasil[$x][++$y] = $row[$track]->SPM_NUMERATOR;
					$hasil[$x][++$y] = $row[$track]->SPM_DENUMERATOR;
					$hasil[$x][++$y] = $row[$track]->SPM_PENCAPAIAN;
					$track++;
				}
				
				if($analisaId != null){
				//analisa
				$analisaData = null;
				if (count($analisaRest)!= null){ 
					for( $trackAnalisa = 0; $trackAnalisa  < count($analisaRest) ; $trackAnalisa++){
						if($analisaRest[$trackAnalisa]->RS_NOREG == $row[$track-1]->RS_NOREG  )
						{ 
								$analisaData = $analisaRest[$trackAnalisa]->ANALISA_URAIAN;
								break; 
						}  
					} 
				}
				
				if($analisaData != null)
					$hasil[$x][++$y] =  $analisaData;
				else
					$hasil[$x][++$y] = '-';
				//////////////////
				}
				
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerPermasalahan($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<10;$i++){
			$header2[$idx] = 'Masalah';
			$header2[$idx+1] = 'Pemecahan'; 
			$idx+=2;
		}
		
		$header = array(
				  array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit','Permasalahan 1','','Permasalahan 2','','Permasalahan 3','','Permasalahan 4','','Permasalahan 5','',
																			'Permasalahan 6','','Permasalahan 7','','Permasalahan 8','','Permasalahan 9','','Permasalahan 10',''),
				  $header2 
				  ); 
		return $header;
	}
	
	function dataPermasalahan($tahun,$idPermasalahan){
		 $data = $this->CI->m_analisa->retrievePermasalahan($idPermasalahan, $tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_bab6_2->countRSPermasalahan("permasalahan",$tahun, null, null, null, $idPermasalahan); 
		 
		 $hasil = array();
		 
		 $row = $data->result();
		 $track = 0;
		 $no = 1;
		 
		 $x = 0;
		 $y = 0;
		 
		 for ($j = 0; $j < $rs_count; $j++) {
				 
				$hasil[$x][$y] = $no ;
				$hasil[$x][++$y] = $row[$track]->daftar_list_region;
				$hasil[$x][++$y] = $row[$track]->KODE_REGISTRASI;
				$hasil[$x][++$y] = $row[$track]->RS_NAMA;
				 for ($k = 0; $k < 10; $k++) {
					$hasil[$x][++$y] = $row[$track]->PRBLM_NAMA;
					$hasil[$x][++$y] = $row[$track]->PRBLM_PEMECAHAN;

					$track++;
				}
				
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
 
}

?>
