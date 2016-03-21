<?php

Class Export_Bab_5_5 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab5_4');
		$this->CI->load->model('m_analisa');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) { 
		
	$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0); 
		
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmRekamMedik(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,14,4,37), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Rekam Medik');  
		
	$objPHPExcel->createSheet(1);
	$objPHPExcel->setActiveSheetIndex(1);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,14), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Rekam Medik');
		
	$objPHPExcel->createSheet(2);
	$objPHPExcel->setActiveSheetIndex(2);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSanitasi($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSanitasi($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Sanitasi');
		
	$objPHPExcel->createSheet(3);
	$objPHPExcel->setActiveSheetIndex(3);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmLimbah(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,15,2,38), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Limbah');
		
	$objPHPExcel->createSheet(4);
	$objPHPExcel->setActiveSheetIndex(4);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,15), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Sanitasi');
		
	$objPHPExcel->createSheet(5);
	$objPHPExcel->setActiveSheetIndex(5);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmAdministrasi(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,16,9,39), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Administrasi');
		
	$objPHPExcel->createSheet(6);
	$objPHPExcel->setActiveSheetIndex(6);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,16), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Administrasi');
		
	$objPHPExcel->createSheet(7);
	$objPHPExcel->setActiveSheetIndex(7);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmAmbulans(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,17,3,40), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Ambulans');
		
	$objPHPExcel->createSheet(8);
	$objPHPExcel->setActiveSheetIndex(8);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,17), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Ambulans');
		
	$objPHPExcel->createSheet(9);
	$objPHPExcel->setActiveSheetIndex(9);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPemulasaranJenazah($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPemulasaranJenazah($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Pemulasaran Jenazah');
		
	$objPHPExcel->createSheet(10);
	$objPHPExcel->setActiveSheetIndex(10);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmPemulasaran(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,18,1,41), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Pemulasaran Jenazah');
		
	$objPHPExcel->createSheet(11);
	$objPHPExcel->setActiveSheetIndex(11);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,18), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Pemulasaran');
		
	$objPHPExcel->createSheet(12);
	$objPHPExcel->setActiveSheetIndex(12);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmSarana(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,19,3,42), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Sarana');
		
	$objPHPExcel->createSheet(13);
	$objPHPExcel->setActiveSheetIndex(13);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,19), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Sarana');
		
	$objPHPExcel->createSheet(14);
	$objPHPExcel->setActiveSheetIndex(14);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmLaundry(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,20,2,43), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Laundry');
		
	$objPHPExcel->createSheet(15);
	$objPHPExcel->setActiveSheetIndex(15);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,20), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Laundry');
		
	$objPHPExcel->createSheet(16);
	$objPHPExcel->setActiveSheetIndex(16);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmDalin(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun,21,3,44), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('SPM Dalin');
		
	$objPHPExcel->createSheet(17);
	$objPHPExcel->setActiveSheetIndex(17);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelayananGigi($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPelayananGigi($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Pelayanan Gilut');
		
	$objPHPExcel->createSheet(18);
	$objPHPExcel->setActiveSheetIndex(18);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,21), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Dalin');
		
	$objPHPExcel->createSheet(19);
	$objPHPExcel->setActiveSheetIndex(19);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,22), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Gilut');
		
	$objPHPExcel->createSheet(20);
	$objPHPExcel->setActiveSheetIndex(20);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerImunisasi($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataImunisasi($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Imunisasi');
		
	$objPHPExcel->createSheet(21);
	$objPHPExcel->setActiveSheetIndex(21);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKesehatanJiwa($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataKesehatanJiwa($tahun), null, 'A2');		  
        $objPHPExcel->getActiveSheet()->setTitle('Kesehetan Jiwa');
		
	$objPHPExcel->createSheet(22);
	$objPHPExcel->setActiveSheetIndex(22);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPermasalahan(), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPermasalahan($tahun,23), null, 'A3');		  
        $objPHPExcel->getActiveSheet()->setTitle('Permasalahan Jiwa');
		
		
		
		
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
  
        header('Content-type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment; filename="Rekap Bab V-Rekam Medik -Jiwa Tahun '.$tahun_rekap.'.xls"'); 
        ob_clean();
        $objWriter->save('php://output'); 
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
	
	function headerPermasalahan(){ 
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
 
	////////////////////////////////////////////////
	function headerSpmRekamMedik(){ 
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<4;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Kelengkapan pengisian rekam medis 24 jam setelah selesai pelayanan', '','','',	
						'Kelengkapan Informed Concent setelah mendapatkan informasi yang jelas', '','','',	
						'Waktu penyediaan dokumen rekam medik pelayanan rawat jalan', '','','',	
						'Waktu penyediaan dokumen rekam medik pelayanan rawat inap', '','','',	
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSanitasi(){
		$header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Kualitas fisik dan kimia air bersih','Kualitas mikrobiologi air bersih','Kualitas lingkungan fisik',
						'Kualitas mikrobiologi dan angka kuman udara ruang', 'Kualitas fisik dan kimia air dari instalasi gizi',
						'Hasil pemeriksaan usap alat makan');
		return $header;
	}
	
	function dataSanitasi($tahun){
		$data = $this->CI->m_bab5_4->retrieveSanitasi($tahun,null,null,null,null); 
		$rs_count = $this->CI->m_umum->countRS("kegiatan_sanitasi",$tahun, null, null, null); 
		 
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
					$hasil[$x][++$y] = $row[$track]->SANITASI_KESIMPULAN;
					$track++;
				}
				$y++; 
				$x++;
				$no++;
		}
			
		return $hasil;
	}
	
	function headerSpmLimbah(){ 
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<2;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Baku mutu limbah cair', '','','',	
						'Pengelolaan limbah padat infeksius sesuai dengan aturan', '','','', 	
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSpmAdministrasi(){ 
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<9;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Tindak lanjut penyelesaian hasil pertemuan tingkat direksi', '','','',	
						'Kelengkapan laporan akuntabilitas kinerja', '','','', 	
						'Ketepatan waktu pengusulan kenaikan pangkat', '','','', 	
						'Ketepatan waktu pengusulan gaji berkala', '','','', 	
						'Karyawan yang mendapat pelatihan minimal 20 jam setahun', '','','', 	
						'Cost recovery', '','','', 	
						'Ketepatan waktu penyusunan laporan keuangan', '','','', 	
						'Kecepatan waktu pemberian informasi tentang tagihan pasien rawat inap', '','','', 	
						'Ketepatan waktu pemberian imbalan (insentif) sesuai kesepakatan waktu', '','','', 	
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSpmAmbulans(){
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<3;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Waktu pelayanan ambulance/Kereta Jenazah', '','','',	
						'Kecepatan memberikan pelayanan ambulance/Kereta jenazah di Rumah Sakit', '','','', 
						'Response time pelayanan ambulance oleh masyarakat yang membutuhkan', '','','', 
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerPemulasaranJenazah(){
		$header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Perawatan Jenazah','Konservasi Jenazah','Penyimpanan Jenazah','Penguburan Jenazah', 
						'Autopsi Klinik');
		return $header;
	}
	
	function dataPemulasaranJenazah($tahun){
		$data = $this->CI->m_bab5_4->retrievePemulasaranJenazah($tahun,null,null,null,null); 
		$rs_count = $this->CI->m_umum->countRS("pemulasaraan_jenazah",$tahun, null, null, null); 
		
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
				$hasil[$x][++$y] = $row[$track]->P_JENAZAH_JUMLAH; 
				$track++;
			}
			$y++; 
			$x++;
			$no++;
		}
			
		return $hasil;
	}
	
	function headerSpmPemulasaran(){
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<1;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Waktu tanggap pelayanan pemulasaran jenazah', '','','', 
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSpmSarana(){
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<3;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Kecepatan waktu menanggapi kerusakan alat', '','','', 
						'Ketepatan waktu pemeliharaan alat', '','','', 
						'Peralatan laboratorium dan alat ukur yang digunakan dalam pelayanan terkalibrasi tepat waktu sesuai dengan ketentuan kalibrasi', '','','', 
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSpmLaundry(){
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<2;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Tidak adanya linen yang hilang', '','','', 
						'Ketepatan waktu penyediaan linen untuk ruang rawat inap', '','','',  
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerSpmDalin(){
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<3;$i++){
			$header2[$idx] = 'Standar';
			$header2[$idx+1] = 'Hasil Numerator'; 
			$header2[$idx+2] = 'Hasil Denumenrator'; 
			$header2[$idx+3] = 'Nilai'; 
			$idx+=4;
		}
		
		$header = array(
					array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Ada anggota tim PPI yang terlatih', '','','', 
						'Tersedia APD di setiap instalasi/departement', '','','',  
						'Kegiatan pencatatan dan pelaporan infeksi nosokomial/HAI (health care associated infections) di rumah sakit (minimum satu parameter)', '','','',  
						'Analisa'),
					$header2
					);
		return $header;
	}
	
	function headerPelayananGigi($tahun){
		$header1 = array();
		$data = $this->CI->m_umum->getList('list_tindakan_gilut');
		$header1[0] = 'No';
		$header1[1] = 'Region';
		$header1[2] = 'Kode RS';
		$header1[3] = 'Nama RS';
		$i = 4;
		foreach ($data->result() as $row){
			$header1[$i] = $row->TDK_GILUT_TINDAKAN; 
			$i++;
		}  
		 
		return $header1;
	}
	
	function dataPelayananGigi($tahun){
		$data = $this->CI->m_bab5_4->retrievePelayananGigi($tahun,null,null,null,null); 
		$rs_count = $this->CI->m_umum->countRS("pelayanan_gigi",$tahun, null, null, null); 
		
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
			for ($k = 0; $k < 21; $k++){ 
				$hasil[$x][++$y] = $row[$track]->PEL_GILUT_JUMLAH; 
				$track++;
			}
			$y++; 
			$x++;
			$no++;
		}
			
		return $hasil;
	}
	
	function headerImunisasi($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header1 = array();
		
		$header1[0] = $header1[1] = $header1[2] = $header1[3] = '';
		$idx = 4;
		for($i=0;$i<8;$i++){
			$header1[$idx] = 'Jumlah Kegiatan';
			$header1[$idx+1] = 'IMUNISASI DASAR'; 
			$header1[$idx+2] = $header1[$idx+3] = ''; 
			$header1[$idx+4] = 'BOOSTER'; 
			$header1[$idx+5] = $header1[$idx+6] = $header1[$idx+7] = $header1[$idx+8] =''; 
			$idx+=9;
		}
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = '';
		$idx = 4;
		for($i=0;$i<8;$i++){
			$header2[$idx] = '';
			$header2[$idx+1] = 'Ke-1'; 
			$header2[$idx+2] = 'Ke-2'; 
			$header2[$idx+3] = 'Ke-3'; 
			$header2[$idx+4] = '1 Thn';
			$header2[$idx+5] = '6 Thn';
			$header2[$idx+6] = '12 Thn';
			$header2[$idx+7] = 'Jumlah';
			$header2[$idx+8] = 'Keterangan';
			$idx+=9;
		}
		
		$header = array(
				  array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit',
														'BCG','','','','','','','','',
														'DTP','','','','','','','','',
														'Poliomelitis','','','','','','','','',
														'Tetanus Toxoid','','','','','','','','',
														'D T','','','','','','','','',
														'Campak','','','','','','','','',
														'Hepatitis B','','','','','','','','',
														'Lainnya','','','','','','','',''														 
														),
				  $header1,
				  $header2
				  ); 
				  
		return $header;
	}
	
	function dataImunisasi($tahun){
		$data = $this->CI->m_bab5_4->retrieveImunisasi($tahun,null,null,null,null); 
		$rs_count = $this->CI->m_umum->countRS("imunisasi",$tahun, null, null, null); 
		
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
			for ($k = 0; $k < 8; $k++){ 
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_JML_KEGIATAN;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_DASAR1;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_DASAR2;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_DASAR3;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_BOOSTER1;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_BOOSTER6;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_BOOSTER12;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_BOOSTER_JML;
				$hasil[$x][++$y] = $row[$track]->IMUNISASI_KETERANGAN;
				
				$track++;
			}
			$y++; 
			$x++;
			$no++;
		}
			
		return $hasil;
	}
	
	function headerKesehatanJiwa(){ 
		$header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Psikotest','Konsultasi','Therapi Medikamentosa','Elektromedik', 
						'Psikoterapi','Play Therapi' );
		return $header;
	}
	
	function dataKesehatanJiwa($tahun){
		$data = $this->CI->m_bab5_4->retrieveKegiatanKesehatanJiwa($tahun,null,null,null,null); 
		$rs_count = $this->CI->m_umum->countRS("kegiatan_kesehatan_jiwa",$tahun, null, null, null); 
		
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
				$hasil[$x][++$y] = $row[$track]->JIWA_TOTAL; 
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
