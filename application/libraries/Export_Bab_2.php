<?php

Class Export_Bab_2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter'); 
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab2_2');
        $this->CI->load->model('m_umum');
		$this->CI->load->model('m_analisa');
    }

    function downloadExcel($tahun) { 
		
	$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);	 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTTD($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataTTD($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Tempat Tidur');
	
       
        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
	$objPHPExcel->getActiveSheet()->fromArray($this->headerAmbulans($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataAmbulans($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Jumlah Ambulans');
 	
         
	$objPHPExcel->createSheet(2);
	$objPHPExcel->setActiveSheetIndex(2);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerIGD($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataIGD($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('IGD');
		
	$objPHPExcel->createSheet(3);
	$objPHPExcel->setActiveSheetIndex(3);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerIRJ($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataIRJ($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('IRJ');
		
	$objPHPExcel->createSheet(4);
	$objPHPExcel->setActiveSheetIndex(4);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerIRI($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataIRI($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('IRI');
	 	
	$objPHPExcel->createSheet(5);
	$objPHPExcel->setActiveSheetIndex(5);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerEfisiensi($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataEfisiensi($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Tingkat Efisiensi');
	
	$objPHPExcel->createSheet(6);
	$objPHPExcel->setActiveSheetIndex(6);		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPTD($tahun), null, 'A1');		 
	$objPHPExcel->getActiveSheet()->fromArray($this->dataPTD($tahun), null, 'A4');		  
        $objPHPExcel->getActiveSheet()->setTitle('Persebaran Tempat Tidur');

	 
		
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
	echo $data[0][0];
        header('Content-type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment; filename="Rekap Bab II Tahun '.$tahun_rekap.'.xls"'); 
        ob_clean();
        $objWriter->save('php://output'); 
    }
	
	 
    function headerTTD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
  
        $header =  
            array(
                'No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                
                'Perinatologi', 'VVIP', 'VIP', 
		'Kelas I','Kelas II','Kelas III'      
        );
        return $header;
    }

    function dataTTD($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
 
        $hasil = array();
 
        $rowRS = $dataRS->result();

        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0; 
        
        for ($j = 0; $j < $rs_count; $j++) {
 
            $track = 0;
            
            $hasil[$x][$y] = $no; 
            $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
            $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
            $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region; 
            $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;
            
            
            $rsAktif = $j+1;
            
            $data = $this->CI->m_bab2_2->retrieveTTD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
        
            if($row != null){
                for ($k = 0; $k < 6; $k++) { 
                    $hasil[$x][++$y] = $row[$track]->KTT_JUMLAH;  
                    $track++;
                }
            } 
	    $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }
	
	function headerPTD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
  
        $header =  
            array(
                'No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                
                'ICU','PICU','NICU','ICCU','HCU',
		'Ruang Isolasi','Ruang UGD','Ruang Bersalin','Ruang Operasi','Perinatologi'       
        );
        return $header;
    }

    function dataPTD($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
 
        $hasil = array();
 
        $rowRS = $dataRS->result();

        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0; 
        
        for ($j = 0; $j < $rs_count; $j++) {
 
            $track = 0;
            
            $hasil[$x][$y] = $no; 
            $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
            $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
            $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region; 
            $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama; 
            $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;
            
            
            $rsAktif = $j+1;
            
            $data = $this->CI->m_bab2_2->retrievePTD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
        
            if($row != null){
                for ($k = 0; $k < 10; $k++) { 
                    $hasil[$x][++$y] = $row[$track]->KTT_JUMLAH;  
                    $track++;
                }
            } 
	    $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

	
    function headerAmbulans($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
  
        $header = array(  
            array('No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                
                'Ambulans Transportasi', '', '', '',
		'Ambulans Gawat Darurat', '', '', '',
		'Ambulans Jenazah'),  
			array('','','','','','','','','',
				  'Total','Kondisi Baik','Kondisi Rusak Ringan','Kondisi Rusak Berat',
				  'Total','Kondisi Baik','Kondisi Rusak Ringan','Kondisi Rusak Berat',
				  '' 
				)
        );
        return $header;
    }

    function dataAmbulans($tahun) {
        
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
        $rowRS = $dataRS->result();
          
        $hasil = array();
 
        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0;


        for ($j = 0; $j < $rs_count; $j++) {
            
            $track = 0;
            
            $hasil[$x][$y] = $no;
            $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
            $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
            $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region;
            $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama;
            $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;
             
               $rsAktif = $j+1;
               $data = $this->CI->m_bab2_2->retrieveAmbulans($tahun, $rsAktif, null, null, null); 
               $row = $data->result();
             
              // $hasil[$x][++$y] = $rsAktif;
              // $hasil[$x][++$y] = $tahun;
               
               if($row!=null){
                    $hasil[$x][++$y] = $row[$track]->AMB_TRANS_JML;
                    $hasil[$x][++$y] = $row[$track]->AMB_TRANS_BAIK; 
                    $hasil[$x][++$y] = $row[$track]->AMB_TRANS_RUSAK_RINGAN; 
                    $hasil[$x][++$y] = $row[$track]->AMB_TRANS_RUSAK_BERAT; 
                    $hasil[$x][++$y] = $row[$track]->AMB_GD_JML; 
                    $hasil[$x][++$y] = $row[$track]->AMB_GD_BAIK; 
                    $hasil[$x][++$y] = $row[$track]->AMB_GD_RUSAK_RINGAN; 
                    $hasil[$x][++$y] = $row[$track]->AMB_GD_RUSAK_BERAT; 
                    $hasil[$x][++$y] = $row[$track]->AMB_JENAZAH; 
               }
		  
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }
        
    function headerIGD($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array(
				  array( 'No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                                         'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                                        'Jumlah Kunjungan IGD','','','','','','','',''),
				  array('','','','','','','','','',($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'',''),
				  array('','','','','','','','','','L','P','Total','L','P','Total','L','P','Total')
				  ); 
		return $header;
     }
    
	
    function dataIGD($tahun){
            $dataRS = $this->CI->m_umum->getRSAll3();
            $rs_count = $this->CI->m_umum->countRSAll();
            $rowRS = $dataRS->result();
		  
            $hasil = array();
            $track = 0;
            $no = 1;
		 
            $x = 0;
            $y = 0;
		 
            for ($j = 0; $j < $rs_count; $j++) {
				 
		$track = 0;
            
                $hasil[$x][$y] = $no;
                $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
                $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
                $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region;
                $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama;
                $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;

                $rsAktif = $j+1;
                $data = $this->CI->m_bab2_2->retrieveIGD($tahun, $rsAktif, null, null, null); 
                $row = $data->result();
            
                if($row!=null){		 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_L_N2 ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_P_N2 ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_TOTAL_N2; 

                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_L_N1 ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_P_N1 ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_TOTAL_N1; 

                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_L_N ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_P_N ; 
                    $hasil[$x][++$y] = $row[$track]->KIGD_PASIEN_TOTAL_N; 
                }
				
		$y++; 
		$x++;
		$no++;
		}
			
		return $hasil;
	}

    function headerIRJ($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		$header = array(//revisi header
				  array('No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                                        'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                                        'Jumlah Kunjungan IRJ Pasien Baru','','','','','','','','','Jumlah Kunjungan IGD Pasien Lama'), //
				  array('','','','','','','','','',($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'','',($tahun_rekap-2),'','',($tahun_rekap-1),'','',$tahun_rekap,'',''), //
				  array('','','','','','','','','','L','P','Total','L','P','Total','L','P','Total','L','P','Total','L','P','Total','L','P','Total')//
				  ); 
		return $header;
	}
	
    function dataIRJ($tahun){
	$dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
        $rowRS = $dataRS->result();
		  
        $hasil = array();
		 
	$track = 0;
        $no = 1;
		 
	$x = 0;
	$y = 0;
		 
	for ($j = 0; $j < $rs_count; $j++) {
				 
            $track = 0;

            $hasil[$x][$y] = $no;
            $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
            $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
            $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region;
            $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama;
            $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;

            $rsAktif = $j+1;
            $data = $this->CI->m_bab2_2->retrieveIRJ($tahun, $rsAktif, null, null, null); 
            $row = $data->result();

            if($row!=null){

                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n2 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n2 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n2 ; 

                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n1 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n1 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n1 ; 

                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n ; 

                    $track++; 

                    //revisi, nambah kolom
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n2 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n2 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n2 ; 

                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n1 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n1 ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n1 ; 

                    $hasil[$x][++$y] = $row[$track]->irj_pasien_l_n ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_p_n ; 
                    $hasil[$x][++$y] = $row[$track]->irj_pasien_total_n ; 

                    $track++; 
            }

            $y++; 
            $x++;
            $no++;
	}
			
	return $hasil;
        
	}
	
    function headerIRI($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] =$header2[6] =$header2[7] =$header2[8] = '';
		$idx = 9;
		for($i=0;$i<18;$i++){
			$header2[$idx] = ($tahun_rekap-2);
			$header2[$idx+1] = ($tahun_rekap-1);
			$header2[$idx+2] = $tahun_rekap;
			$idx+=3;
		}
		
		$header = array(
				  array('No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                                        'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                                        'Jumlah Total','','',
                                        'Jumlah Pasien Masuk','','','','','','','','',
                                        'Jumlah Pasien Keluar Hidup','','','','','','','','',
                                        'Jumlah Keluar Mati','','','','','','','','',
                                        'Pasien Mati < 48 Jam','','','','','','','','',
                                        'Pasien Mati > 48 Jam','','','','','','','','',
                                        'Jumlah Lama Rawat','','',
                                        'Jumlah Hari Perawatan','','',
														),
				  array('','','','','','','','','','','','','Total','','','a.Laki','','','b.Perempuan','','',
									   'Total','','','a.Laki','','','b.Perempuan','','',
									   'Total','','','a.Laki','','','b.Perempuan','','',
									   'Total','','','a.Laki','','','b.Perempuan','','',
									   'Total','','','a.Laki','','','b.Perempuan','',''),
				  $header2				  ); 
		return $header;
	}
	
    function dataIRI($tahun){
            $dataRS = $this->CI->m_umum->getRSAll3();
            $rs_count = $this->CI->m_umum->countRSAll();
            $rowRS = $dataRS->result();
		 
            $hasil = array(); 
            $track = 0;
            $no = 1;

            $x = 0;
            $y = 0;
		 
            for ($j = 0; $j < $rs_count; $j++) {

                $track = 0;

                $hasil[$x][$y] = $no;
                $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
                $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
                $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region;
                $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama;
                $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama;
                $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;

                $rsAktif = $j+1;
                $data = $this->CI->m_bab2_2->retrieveIRI($tahun, $rsAktif, null, null, null); 
                $row = $data->result();

                if($row!=null){
                    for ($k = 0; $k < 18; $k++){ //revisi jumlah loop, sebelumnya 13
                            $hasil[$x][++$y] = $row[$track]->IRI_JUMLAH_N2 ; 
                            $hasil[$x][++$y] = $row[$track]->IRI_JUMLAH_N1 ; 
                            $hasil[$x][++$y] = $row[$track]->IRI_JUMLAH_N ; 
                            $track++; 
                    }
                    
                }
                $y++; 
                $x++;
                $no++;
            }
        return $hasil;
    }
	
    function headerEfisiensi($tahun){
		$tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
		
		$header2 = array();
		
		$header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] ='';
		$idx = 9;
		for($i=0;$i<10;$i++){
			$header2[$idx] = ($tahun_rekap-2);
			$header2[$idx+1] = ($tahun_rekap-1);
			$header2[$idx+2] = $tahun_rekap;
			$header2[$idx+3] = 'Rerata';
			$idx+=4;
		}
		
		$header = array(
				  array('No','Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                                        'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                                        'BOR RS','','','',
                                        'TOI(hari)','','','',
                                        'BTO(kali)','','','',
                                        'ALOS(hari)','','','',
                                        'GDR(%)','','','','','','','','','','','',
                                        'NDR','','','','','','','','','','',''
                                        ),
				  array('','','','','','','','','', '','','','','','','','','','','','','','','','','','','','','a.Laki-laki','','','','b.Perempuan','','','',
									   '','','','','a.Laki-laki','','','','b.Perempuan','','',''),
				  $header2
				  );
		return $header;
	}
	
    function dataEfisiensi($tahun){
	$dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
        $rowRS = $dataRS->result();

		 
        $hasil = array();

        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0;
		 
		 
        for ($j = 0; $j < $rs_count; $j++) {

            $track = 0;

            $hasil[$x][$y] = $no;
            $hasil[$x][++$y] = $rowRS[$j]->KODE_REGISTRASI;
            $hasil[$x][++$y] = $rowRS[$j]->RS_KAB; 
            $hasil[$x][++$y] = $rowRS[$j]->daftar_list_region;
            $hasil[$x][++$y] = $rowRS[$j]->kelas_rs_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_jenis_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_penyelenggara_nama;
            $hasil[$x][++$y] = $rowRS[$j]->rs_stat_nama;
            $hasil[$x][++$y] = $rowRS[$j]->RS_NAMA;

            $rsAktif = $j+1;
            $data = $this->CI->m_bab2_2->retrieveTingkatEfisiensi($tahun, $rsAktif, null, null, null); 
            $row = $data->result();

            if($row!=null){
                for ($k = 0; $k <10; $k++){ 
                        $hasil[$x][++$y] = $row[$track]->EFF_NILAI_N2 ; 
                        $hasil[$x][++$y] = $row[$track]->EFF_NILAI_N1 ; 
                        $hasil[$x][++$y] = $row[$track]->EFF_NILAI_N ; 
                        $hasil[$x][++$y] = $row[$track]->EFF_RERATA ; 

                        $track++; 
                } 
            } 
            
            $y++; 
            $x++;
            $no++; 
       } 
       return $hasil;
    }

	
	
}

?>
