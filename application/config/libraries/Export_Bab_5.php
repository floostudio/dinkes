<?php

Class Export_Bab_5 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab5_2');
        $this->CI->load->model('m_bab6_2');
    }

    function downloadExcel() { 
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);
		 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerRehabMedik(), null, 'A1');
		 
		$objPHPExcel->getActiveSheet()->fromArray($this->dataRehabMedik(1), null, 'A2');
		  
        $objPHPExcel->getActiveSheet()->setTitle('Example');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
		echo $data[0][0];
        header('Content-type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment; filename="file.xls"'); 
        ob_clean();
        $objWriter->save('php://output'); 
    }
	
	function headerRehabMedik(){
		$header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
						'Medis','Fisioterapi','Okupasi Terapi','Terapi Wicara',
						'Psikologi','Sosial Medis','Ortotik Prostetik','Kunjungan Rumah');
		return $header;
	}
	
	function dataRehabMedik($tahun){
		 $data = $this->CI->m_bab5_2->retrieveRehabMedik($tahun,null,null,null,null); 
		 $rs_count = $this->CI->m_bab6_2->countRS("rehabilitasi_medik",$tahun, null, null, null); 
		 
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
					$hasil[$x][++$y] = $row[$track]->RM_JUMLAH ; 
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
