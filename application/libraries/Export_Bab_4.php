<?php

Class Export_Bab_4 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab4');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
        $objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
        $objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
        $objPHPExcel->getActiveSheet()->mergeCells('D1:D2');
        $objPHPExcel->getActiveSheet()->mergeCells('E1:G1');
        $objPHPExcel->getActiveSheet()->mergeCells('H1:J1');
        $objPHPExcel->getActiveSheet()->mergeCells('K1:M1');
        $objPHPExcel->getActiveSheet()->mergeCells('N1:N2');
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSGR($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSGR($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Sales Growth Rate');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerCR($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataCR($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Cost Recovery');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerRK($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataRK($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Rasio Keuangan');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerAnalisaRK($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataAnalisaRK($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Analisa Rasio Keuangan');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSBAnggaran($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSBAnggaran($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Sumber Anggaran');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab IV Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerSGR($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                ($tahun_rekap - 2), '', '', ($tahun_rekap - 1), '', '', $tahun_rekap, '', ''),
            array('', '', '', '','','','','', '', 'Pendapatan tahun ini', 'Pendapatan tahun sebelumnya', 'SGR (%)', 'Pendapatan tahun ini', 'Pendapatan tahun sebelumnya', 'SGR (%)', 'Pendapatan tahun ini', 'Pendapatan tahun sebelumnya', 'SGR (%)')
        );

        /* $header = array('No','Region','Kode Rumah Sakit','Nama Rumah Sakit', 
          'n-2: Pendapatan tahun ini','n-2: Pendapatan tahun sebelumnya','n-2: SGR (%)',
          'n-1: Pendapatan tahun ini','n-1: Pendapatan tahun sebelumnya','n-1: SGR (%)',
          'n: Pendapatan tahun ini','n: Pendapatan tahun sebelumnya','n: SGR (%)',
          'Analisa'); */
        return $header;
    }

    function dataSGR($tahun) {
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

            $data = $this->CI->m_bab4->retrieveSGR($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $rsAktif;
                    $hasil[$x][++$y] = $tahun;
                    $hasil[$x][++$y] = $row[$track]->SGR_PENDAPATAN_TAHUN_INI;
                    $hasil[$x][++$y] = $row[$track]->SGR_PENDAPATAN_TAHUN_LALU;
                    $hasil[$x][++$y] = $row[$track]->SGR_SGR;
                    $track++;
                }
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerCR($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Pendapatan tahun ' . ($tahun_rekap - 2), 'Pendapatan tahun ' . ($tahun_rekap - 1), 'Pendapatan tahun ' . $tahun_rekap,
            'Belanja tahun ' . ($tahun_rekap - 2), 'Belanja tahun ' . ($tahun_rekap - 1), 'Belanja tahun ' . $tahun_rekap,
            'Cost Recovery ' . ($tahun_rekap - 2) . ' (%)', 'Cost Recovery ' . ($tahun_rekap - 1) . ' (%)', 'Cost Recovery ' . $tahun_rekap . ' (%)',
            'Analisa');
        return $header;
    }

    function dataCR($tahun) {
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

            $data = $this->CI->m_bab4->retrieveCostRecovery($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $row[$track]->CR_JUMLAH_N2;
                    $hasil[$x][++$y] = $row[$track]->CR_JUMLAH_N1;
                    $hasil[$x][++$y] = $row[$track]->CR_JUMLAH_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerRK($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Current Ratio ' . ($tahun_rekap - 2), 'Current Ratio ' . ($tahun_rekap - 1), 'Current Ratio ' . $tahun_rekap,
            'Quick Ratio ' . ($tahun_rekap - 2), 'Quick Ratio ' . ($tahun_rekap - 1), 'Quick Ratio ' . $tahun_rekap,
            'Cash Ratio ' . ($tahun_rekap - 2), 'Cash Ratio ' . ($tahun_rekap - 1), 'Cash Ratio ' . $tahun_rekap,
            'Return of Investment ' . ($tahun_rekap - 2), 'Return of Investment ' . ($tahun_rekap - 1), 'Return of Investment ' . $tahun_rekap,
            'Debt of Total Asset Ratio ' . ($tahun_rekap - 2), 'Debt of Total Asset Ratio ' . ($tahun_rekap - 1), 'Debt of Total Asset Ratio ' . $tahun_rekap,
            'Debt To Equity Ratio ' . ($tahun_rekap - 2), 'Debt To Equity Ratio ' . ($tahun_rekap - 1), 'Debt To Equity Ratio ' . $tahun_rekap);
        return $header;
    }

    function dataRK($tahun) {
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

            $data = $this->CI->m_bab4->retrieveRasioKeuangan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 6; $k++) {
                    $hasil[$x][++$y] = $row[$track]->RK_N2;
                    $hasil[$x][++$y] = $row[$track]->RK_N1;
                    $hasil[$x][++$y] = $row[$track]->RK_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerAnalisaRK($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Trend Current Ratio ', 'Kesimpulan Current Ratio ',
            'Trend Quick Ratio ', 'Kesimpulan Quick Ratio ',
            'Trend Cash Ratio ', 'Kesimpulan Cash Ratio ',
            'Trend Return of Investment ', 'Kesimpulan Return of Investment ',
            'Trend Debt of Total Asset Ratio ', 'Kesimpulan Debt of Total Asset Ratio ',
            'Trend Debt To Equity Ratio ', 'Kesimpulan Debt To Equity Ratio '
            , 'Analisa');
        return $header;
    }

    function dataAnalisaRK($tahun) {
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

            $data = $this->CI->m_bab4->retrieveAnalisaRK($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 6; $k++) {
                    $hasil[$x][++$y] = $row[$track]->ARK_TREND;
                    $hasil[$x][++$y] = $row[$track]->ARK_KESIMPULAN;

                    $track++;
                }
            }


            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }
    
    function headerSBAnggaran($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit','Sumber Anggaran'),
            array('', '', '', '','','','','', '', 'APBD 1', '', '', 'APBD 2', '', '', 'APBN', '', '', 'DAK', '', '', 'DBHCHT', '', '', 'Lainnya', '', '',),
            array('', '', '', '','','','','', '', 'Alokasi', 'Penggunaan', 'Realisasi','Alokasi', 'Penggunaan', 'Realisasi','Alokasi', 'Penggunaan', 'Realisasi',
                                                  'Alokasi', 'Penggunaan', 'Realisasi','Alokasi', 'Penggunaan', 'Realisasi','Alokasi', 'Penggunaan', 'Realisasi')
        );
 
        return $header;
    }
    
    function dataSBAnggaran($tahun) {
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

            $data = $this->CI->m_bab4->retrieveSBAnggaran($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 6; $k++) {
                    $hasil[$x][++$y] = $row[$track]->SB_APBD1_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_APBD1_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_APBD1_REALISASI;
                    
                    $hasil[$x][++$y] = $row[$track]->SB_APBD2_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_APBD2_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_APBD2_REALISASI;
                    
                    $hasil[$x][++$y] = $row[$track]->SB_APBN_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_APBN_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_APBN_REALISASI;
                    
                    $hasil[$x][++$y] = $row[$track]->SB_DAK_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_DAK_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_DAK_REALISASI;
                    
                    $hasil[$x][++$y] = $row[$track]->SB_DBHCHT_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_DBHCHT_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_DBHCHT_REALISASI;
                    
                    $hasil[$x][++$y] = $row[$track]->SB_LAIN_ALOKASI;
                    $hasil[$x][++$y] = $row[$track]->SB_LAIN_PENGGUNAAN;
                    $hasil[$x][++$y] = $row[$track]->SB_LAIN_REALISASI;
                     
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
