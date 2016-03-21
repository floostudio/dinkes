<?php

Class Export_Bab_5_3_2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_analisa');
        $this->CI->load->model('m_bab5_2');
        $this->CI->load->model('m_umum');
        $this->CI->load->model('m_bab6_2');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        ///////////////////// 
        /*$objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerJumlahOperasi($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataJumlahOperasi($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Jumlah Operasi');*/


        $objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelayananPersalinan($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPelayananPersalinan($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Pelayanan Persalinan');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelayananPerinatologi($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPelayananPerinatologi($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Pelayanan Perinatologi');


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab V Bedah-Perinatologi Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerJumlahOperasi($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] =$header2[5] =$header2[6] =$header2[7] =$header2[8] ='';
        $idx = 9;
        for ($i = 0; $i < 18; $i++) {
            $header2[$idx] = 'Khusus';
            $header2[$idx + 1] = 'Besar';
            $header2[$idx + 2] = 'Sedang';
            $header2[$idx + 3] = 'Kecil';
            $header2[$idx + 4] = 'Total';
            $idx+=5;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Bedah Umum', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Orthopedi', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Saraf', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Urologi', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Plastik', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Anak', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Digesif', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Kardiotoraka', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Onkologi', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Bedah Vascular', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Obstetrik & Ginekologi', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'THT', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Mata', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Kulit Kelamin', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Gigi & Mulut', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Kardiologi', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Paru-Paru', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                'Lain-Lain', '', '', '', '', '', '', '', '', '', '', '', '', '', ''
                 ),
            array('', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                ($tahun_rekap - 2), '', '', '', '', ($tahun_rekap - 1), '', '', '', '', ($tahun_rekap), '', '', '', '',
                'Analisa'),
            $header2
        );
        return $header;
    }

    function dataJumlahOperasi($tahun) {
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


            $rsAktif = $j + 1;

            $data = $this->CI->m_bab5_1_retrieve->retrieveJumlahOperasi($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
            for ($k = 0; $k < 18; $k++) {
                $hasil[$x][++$y] = $row[$track]->OPERASI_KHUSUS_N2;
                $hasil[$x][++$y] = $row[$track]->OPERASI_BESAR_N2;
                $hasil[$x][++$y] = $row[$track]->OPERASI_SEDANG_N2;
                $hasil[$x][++$y] = $row[$track]->OPERASI_KECIL_N2;
                $hasil[$x][++$y] = $row[$track]->OPERASI_TOTAL_N2;
                $hasil[$x][++$y] = $row[$track]->OPERASI_KHUSUS_N1;
                $hasil[$x][++$y] = $row[$track]->OPERASI_BESAR_N1;
                $hasil[$x][++$y] = $row[$track]->OPERASI_SEDANG_N1;
                $hasil[$x][++$y] = $row[$track]->OPERASI_KECIL_N1;
                $hasil[$x][++$y] = $row[$track]->OPERASI_TOTAL_N1;
                $hasil[$x][++$y] = $row[$track]->OPERASI_KHUSUS_N;
                $hasil[$x][++$y] = $row[$track]->OPERASI_BESAR_N;
                $hasil[$x][++$y] = $row[$track]->OPERASI_SEDANG_N;
                $hasil[$x][++$y] = $row[$track]->OPERASI_KECIL_N;
                $hasil[$x][++$y] = $row[$track]->OPERASI_TOTAL_N;
                $track++;
            }
            } 

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerPelayananPersalinan() {
        $header1 = array_fill(0, 700, '');
        $data = $this->CI->m_umum->getList('list_pelayanan_persalinan');
        $header1[0] = 'No';
        $header1[1] = 'Kode Registrasi';
        $header1[2] = 'Kabupaten';
        $header1[3] = 'Region';
        $header1[4] = 'Kelas';
        $header1[5] = 'Jenis';
        $header1[6] = 'Pemilik';
        $header1[7] = 'Status Penyelenggara';
        $header1[8] = 'Nama RS';
        $i = 9;
        foreach ($data->result() as $row) {
            $header1[$i] = $row->PP_NAMA;
            $i+=5;
        }
        
        $header4 = array();

        $header4[0] = $header4[1] = $header4[2] = $header4[3] = $header4[4] = $header4[5] = $header4[6] = $header4[7] = $header4[8] = '';
        $idx = 9;
        for ($i = 0; $i < 35; $i++) {
            $header4[$idx] = 'Rujukan';
            $header4[$idx + 1] = '';
            $header4[$idx + 2] = 'Non Rujukan';
            $header4[$idx + 3] = '';
            $header4[$idx + 4] = 'Dirujuk';
            $idx+=5;
        }

        $header5 = array();

        $header5[0] = $header5[1] = $header5[2] = $header5[3] = $header5[4] = $header5[5] = $header5[6] = $header5[7] = $header5[8] = '';
        $idx = 9;
        for ($i = 0; $i < 35; $i++) {
            $header5[$idx] = 'Jumlah';
            $header5[$idx + 1] = 'Meninggal';
            $header5[$idx + 2] = 'Jumlah';
            $header5[$idx + 3] = 'Meninggal';
            $header5[$idx + 4] = '';
            $idx+=5;
        }

        $header = array(
            $header1, $header4, $header5
        );

        return $header;
    }

    function dataPelayananPersalinan($tahun) {
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


            $rsAktif = $j + 1;

            $data = $this->CI->m_bab5_1_retrieve->retrievePelayananPersalinan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
            for ($k = 0; $k < 35; $k++) {
                $hasil[$x][++$y] = $row[$track]->PERSALINAN_RUJUKAN_TOTAL;
                $hasil[$x][++$y] = $row[$track]->PERSALINAN_RUJUKAN_MENINGGAL;
                $hasil[$x][++$y] = $row[$track]->PERSALINAN_NONRUJUKAN_TOTAL;
                $hasil[$x][++$y] = $row[$track]->PERSALINAN_NONRUJUKAN_MENINGGAL;
                $hasil[$x][++$y] = $row[$track]->PERSALINAN_DIRUJUK;
 
                $track++;
            }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerPelayananPerinatologi($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        

        $header4 = array();

        $header4[0] = $header4[1] = $header4[2] = $header4[3] = $header4[4] = $header4[5] = $header4[6] = $header4[7] = $header4[8] = '';
        $idx = 9;
        for ($i = 0; $i < 19; $i++) {
            $header4[$idx] = 'Rujukan';
            $header4[$idx + 1] = '';
            $header4[$idx + 2] = 'Datang Sendiri';
            $header4[$idx + 3] = '';
            $header4[$idx + 4] = 'Dirujuk';
            $idx+=5;
        }

        $header5 = array();

        $header5[0] = $header5[1] = $header5[2] = $header5[3] = $header5[4] = $header5[5] = $header5[6] = $header5[7] = $header5[8] =  '';
        $idx = 9;
        for ($i = 0; $i < 19; $i++) {
            $header5[$idx] = 'Jumlah';
            $header5[$idx + 1] = 'Meninggal';
            $header5[$idx + 2] = 'Jumlah';
            $header5[$idx + 3] = 'Meninggal';
            $header5[$idx + 4] = '';
            $idx+=5;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kasus Neonatal 0 - 7 hari', '', '', '', '', 
                'Asphyxia', '', '', '', '',  
                'Trauma Kelahiran', '', '', '', '',  
                'BBLR', '', '', '', '',  
                'Tetanus Neonatorum', '', '', '', '',  
                'Kelainan Congenital', '', '', '', '',  
                'ISPA', '', '', '', '',  
                'Diare', '', '', '', '',  
                'Lain-Lain', '', '', '', '', 
                'Kasus Neonatal 8 - 28 hari', '', '', '', '',  
                'Asphyxia', '', '', '', '', 
                'Trauma Kelahiran', '', '', '', '', 
                'BBLR', '', '', '', '', 
                'Tetanus Neonatorum', '', '', '', '',  
                'Kelainan Congenital', '', '', '', '',  
                'ISPA', '', '', '', '',  
                'Diare', '', '', '', '',  
                'Lain-Lain', '', '', '', '',  
                'Kelahiran Mati', '', '', '', ''
            ), 
            $header4, $header5
        );
        return $header;
    }

    function dataPelayananPerinatologi($tahun) {
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


            $rsAktif = $j + 1;

            $data = $this->CI->m_bab5_1_retrieve->retrievePelayananPerinatologi($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
            for ($k = 0; $k < 19; $k++) {
                $hasil[$x][++$y] = $row[$track]->PERINATOLOGI_RUJUKAN_TOTAL;
                $hasil[$x][++$y] = $row[$track]->PERINATOLOGI_RUJUKAN_MENINGGAL;
                $hasil[$x][++$y] = $row[$track]->PERINATOLOGI_NONRUJUKAN_TOTAL;
                $hasil[$x][++$y] = $row[$track]->PERINATOLOGI_NONRUJUKAN_MENINGGAL;
                $hasil[$x][++$y] = $row[$track]->PERINATOLOGI_DIRUJUK;

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
