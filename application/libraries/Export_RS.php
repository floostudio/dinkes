<?php

Class Export_RS {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_rumahsakit'); 
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->fromArray($this->headerRS($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataRS(), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Data RS'); 

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Data RS Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerRS($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
 
		 $header0 = array('', '', '', '', '', '', '', '', '', '', '',
		                'Alamat/Lokasi RS','','','','','','','',
						'Luas','',
						'SIO','','','','',
						'SPK','','','','',
						'Akreditasi','','','',
						'Jumlah Tempat Tidur','','','','','','','','','','','','','','',
						'Ambulans Transportasi','','','','','','','','Ambulans Jenazah',
						'SIM RS','Bank Darah','Layanan Unggulan' 
		);
        $header1 = array('No', 'Region', 'Kepemilikan', 'Kode Rumah Sakit', 'Tanggal Registrasi', 'Nama Rumah Sakit', 'Jenis Rumah Sakit', 'Kelas Rumah Sakit', 'Nama Direktur RS', 'Nama Penyelenggara RS', 'Status Penyelenggara Swasta',
		                '','Kab/Kota','Kode Pos','Telepon','Fax','Email','Nomor Telp Bag. Umum/Humas RS','Website',
						'Luas Tanah','Luas Bangunan',
						'SIO-Nomor','SIO-Tanggal','SIO-Oleh','SIO-Sifat','SIO-Masa Berlaku',
						'SPK-Nomor','SPK-Tanggal','SPK-Oleh','SPK-Sifat','SPK-Masa Berlaku',
						'Akreditasi','Pentahapan','Status','Tanggal Akreditasi',
						'Perinatalogi','Kelas VVIP','Kelas VIP','Kelas I','Kelas II','Kelas III','ICU','PICU','NICU','ICCU','HCU','Ruang Isolasi','Ruang UGD','Ruang Bersalin','Ruang Operasi',
						'','Kondisi Baik','Kondisi Rusak Ringan','Kondisi Rusak Berat','','Kondisi Baik','Kondisi Rusak Ringan','Kondisi Rusak Berat','',
						'','','' 
		);
		
		$header = array($header0,$header1);
		
        return $header;
    }

    function dataRS() {
        $rumah_sakit = $this->CI->m_rumahsakit->retrieveRSRekap();
         
        $hasil = array();
 
        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0;
        $curr_rs = "";

        foreach ($rumah_sakit->result() as $row) {
			$hasil[$x][++$y] = $no; 
            $hasil[$x][++$y] = $row->nm_list_regoion;
			
			if($row->RS_PEMILIK == 1)
				$hasil[$x][++$y] = "Pemerintah";
			else if($row->RS_PEMILIK == 2)
			    $hasil[$x][++$y] = "Swasta";
			else
				$hasil[$x][++$y] = "-";
				
			$hasil[$x][++$y] = $row->KODE_REGISTRASI;
            $hasil[$x][++$y] = $row->RS_TGL_REG; 
            $hasil[$x][++$y] = $row->RS_NAMA;
			
			$hasil[$x][++$y] = $row->jenis_rs_nama;
            $hasil[$x][++$y] = $row->kelas_rs;
			
			$hasil[$x][++$y] = $row->RS_NAMA_DIREKTUR;
            $hasil[$x][++$y] = $row->RS_PENYELENGGARA;
			$hasil[$x][++$y] = $row->RS_STATUS_PENYELENGGARA;
			
            $hasil[$x][++$y] = $row->RS_ALAMAT;
			$hasil[$x][++$y] = $row->RS_KAB;
            $hasil[$x][++$y] = $row->RS_KODEPOS;
			$hasil[$x][++$y] = $row->RS_TELP;
            $hasil[$x][++$y] = $row->RS_FAX;
			$hasil[$x][++$y] = $row->RS_EMAIL;
			$hasil[$x][++$y] = $row->RS_TELP_HUMAS;
			$hasil[$x][++$y] = $row->RS_WEBSITE;
            
            $hasil[$x][++$y] = $row->RS_LUAS_LAHAN;
			$hasil[$x][++$y] = $row->RS_LUAS_BANGUNAN;
			
			$hasil[$x][++$y] = $row->RS_SIO_NOMOR;
            $hasil[$x][++$y] = $row->RS_SIO_TGL;
			$hasil[$x][++$y] = $row->RS_SIO_OLEH;
			$hasil[$x][++$y] = $row->RS_SIO_SIFAT;
			$hasil[$x][++$y] = $row->RS_SIO_MASABERLAKU;
			
			$hasil[$x][++$y] = $row->RS_SPK_NOMOR;
            $hasil[$x][++$y] = $row->RS_SPK_TGL;
			$hasil[$x][++$y] = $row->RS_SPK_OLEH;
			$hasil[$x][++$y] = $row->RS_SPK_SIFAT;
			$hasil[$x][++$y] = $row->RS_SPK_MASABERLAKU;
			
			$hasil[$x][++$y] = $row->RS_AKREDITASI;
            $hasil[$x][++$y] = $row->RS_AKR_PENTAHAPAN;
			$hasil[$x][++$y] = $row->RS_AKR_STATUS;
			$hasil[$x][++$y] = $row->RS_TGL_AKREDITASI; 
			
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-"; 
			$hasil[$x][++$y] = "-";   
			
			$track++;
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }
 
}

?>
