<?php

////////////////////////////////////
//
//export untuk bab V Rawat Jalan & Rawat Inap
//
////////////////////////////////////

Class Export_Bab_5_2_3_2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab5_1_retrieve');
        $this->CI->load->model('m_bab5_2');
        $this->CI->load->model('m_umum');
        $this->CI->load->model('m_analisa');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        /*$objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKunjunganRawatJalan($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKunjunganRawatJalan($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Kunjungan Rawat Jalan');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSepuluhBesarPeny($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSepuluhBesarPenyakitRawatJln($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('10 Besar Penyakit Rawat Jalan');*/

        $objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKegiatanRawatInap($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKegiatanRawatInap($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Rawat Inap');
		
		/*$objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKegiatanRawatInap($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKegiatanRawatInap($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Rawat Inap');*/

        /*$objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSepuluhBesarPeny($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPenyakitTerbanyakRI($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('10 besar kegiatan RI');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKematianRI($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKematianRI($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Diagnosis Kematian RI');*/


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab V-IRJ-IRI Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerKunjunganRawatJalan($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header1 = array_fill(0, 700, '');
        $data = $this->CI->m_umum->getList('list_poli_rawat_jalan');
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
            $header1[$i] = $row->POLI_NAMA;
            $i+=6;
        }

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 17; $i++) {
            $header2[$idx] = 'Kunjungan Lama';
            $header2[$idx + 1] = '';
            $header2[$idx + 2] = '';
            $header2[$idx + 3] = 'Kunjungan Baru';
            $header2[$idx + 4] = '';
            $header2[$idx + 5] = '';

            $idx+=6;
        }

        $header3 = array();

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 17; $i++) {
            $header3[$idx] = 'L';
            $header3[$idx + 1] = 'P';
            $header3[$idx + 2] = 'Total';
            $header3[$idx + 3] = 'L';
            $header3[$idx + 4] = 'P';
            $header3[$idx + 5] = 'Total';
            $idx+=6;
        }


        $header = array(
            $header1,
            $header2,
            $header3
        );

        return $header;
    }

    function dataKunjunganRawatJalan($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveKunjunganRawatJalan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 17; $k++) { //17
                    $hasil[$x][++$y] = $row[$track]->KRJ_LAMA_L;
                    $hasil[$x][++$y] = $row[$track]->KRJ_LAMA_P;
                    $hasil[$x][++$y] = $row[$track]->KRJ_LAMA_TOTAL;
                    $hasil[$x][++$y] = $row[$track]->KRJ_BARU_L;
                    $hasil[$x][++$y] = $row[$track]->KRJ_BARU_P;
                    $hasil[$x][++$y] = $row[$track]->KRJ_BARU_TOTAL;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerSepuluhBesarPeny($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 10; $i++) {
            $header2[$idx] = 'Kode ICD10';
            $header2[$idx + 1] = 'Nama';
            $header2[$idx + 2] = 'Jumlah';
            $header2[$idx + 3] = 'Persentase';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'No 1', '', '', '', 'No 2', '', '', '', 'No 3', '', '', '', 'No 4', '', '', '', 'No 5', '', '', '',
                'No 6', '', '', '', 'No 7', '', '', '', 'No 8', '', '', '', 'No 9', '', '', '', 'No 10', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataSepuluhBesarPenyakitRawatJln($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveSepuluhBesarPenyakitRawatJln($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->ICD10_CODE;
                        $hasil[$x][++$y] = $row[$track]->PENY_RJ_NAMA;
                        $hasil[$x][++$y] = $row[$track]->PENY_RJ_JMLH;
                        $hasil[$x][++$y] = $row[$track]->PENY_RJ_PERSENTASE;

                        $track++;
                     
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKegiatanRawatInap($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header1 = array_fill(0, 700, '');
        $data = $this->CI->m_umum->getList('list_pelayanan_rawat_inap');
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
            $header1[$i] = $row->PEL_RI_NAMA;
            $i+=14;
        }

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 25; $i++) {
            $header2[$idx] = 'Jml Px';
            $header2[$idx + 1] = 'Pasien Keluar Hidup';
            $header2[$idx + 2] = '';
            $header2[$idx + 3] = 'Pasien Keluar Mati';
            $header2[$idx + 4] = '';
            $header2[$idx + 5] = '';
            $header2[$idx + 6] = '';
            $header2[$idx + 7] = 'Jumlah Lama Dirawat';
            $header2[$idx + 8] = 'Jumlah Hari Dirawat';
            $header2[$idx + 9] = 'Perincian Total Hari Rawat';
            $header2[$idx + 10] = '';
            $header2[$idx + 11] = '';
            $header2[$idx + 12] = '';
            $header2[$idx + 13] = '';
            $idx+=14;
        }

        $header3 = array();

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 25; $i++) {
            $header3[$idx] = '';
            $header3[$idx + 1] = 'L';
            $header3[$idx + 2] = 'P';
            $header3[$idx + 3] = '<48Jam';
            $header3[$idx + 4] = '';
            $header3[$idx + 5] = '>48Jam';
            $header3[$idx + 6] = '';
            $header3[$idx + 7] = '';
            $header3[$idx + 8] = '';
            $header3[$idx + 9] = 'VVIP';
            $header3[$idx + 10] = ' VIP';
            $header3[$idx + 11] = 'Kelas 1';
            $header3[$idx + 12] = 'Kelas 2';
            $header3[$idx + 13] = 'Kelas 3';
            $idx+=14;
        }

        $header4 = array();

        $header4[0] = $header4[1] = $header4[2] = $header4[3] = $header4[4] = $header4[5] = $header4[6] = $header4[7] = $header4[8] = '';
        $idx = 9;
        for ($i = 0; $i < 25; $i++) {
            $header4[$idx] = '';
            $header4[$idx + 1] = '';
            $header4[$idx + 2] = '';
            $header4[$idx + 3] = 'L';
            $header4[$idx + 4] = 'P';
            $header4[$idx + 5] = 'L';
            $header4[$idx + 6] = 'P';
            $header4[$idx + 7] = '';
            $header4[$idx + 8] = '';
            $header4[$idx + 9] = '';
            $header4[$idx + 10] = '';
            $header4[$idx + 11] = '';
            $header4[$idx + 12] = '';
            $header4[$idx + 13] = '';
            $idx+=14;
        }

        $header = array(
            $header1,
            $header2,
            $header3,
            $header4
        );

        return $header;
    }

    function dataKegiatanRawatInap($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;
        $no = 1;

        $x = 0;
        $y = 0;
		echo $rs_count;
		$n_rs = $rs_count/2;
        for ($j = $n_rs; $j < $rs_count; $j++) {

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

            $data = $this->CI->m_bab5_1_retrieve->retrieveKegiatanRawatInap($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 25; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KRI_TOTAL;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENHIDUP_L;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENHIDUP_P;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENMATI_K48_L;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENMATI_K48_P;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENMATI_L48_L;
                    $hasil[$x][++$y] = $row[$track]->KRI_PASIENMATI_L48_P;
                    $hasil[$x][++$y] = $row[$track]->KRI_LAMARAWAT;
                    $hasil[$x][++$y] = $row[$track]->KRI_HARIRAWAT;
                    $hasil[$x][++$y] = $row[$track]->KRI_VVIP;
                    $hasil[$x][++$y] = $row[$track]->KRI_VIP;
                    $hasil[$x][++$y] = $row[$track]->KRI_KLSI;
                    $hasil[$x][++$y] = $row[$track]->KRI_KLSII;
                    $hasil[$x][++$y] = $row[$track]->KRI_KLSIII;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function dataPenyakitTerbanyakRI($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrievePenyakitTerbanyakRI($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->ICD10_CODE;
                        $hasil[$x][++$y] = $row[$track]->PENY_RI_NAMA;
                        $hasil[$x][++$y] = $row[$track]->PENY_RI_JMLH;
                        $hasil[$x][++$y] = $row[$track]->PENY_RI_PERSENTASE;

                        $track++;
                    
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKematianRI($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 10; $i++) {
            $header2[$idx] = 'Kode ICD10';
            $header2[$idx + 1] = 'Jenis Penyakit';
            $header2[$idx + 2] = 'Jumlah Kasus';
            $header2[$idx + 3] = 'Jumlah Kematian';
            $header2[$idx + 4] = 'Persentase';
            $idx+=5;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'No 1', '', '', '', '', 'No 2', '', '', '', '', 'No 3', '', '', '', '', 'No 4', '', '', '', '', 'No 5', '', '', '', '',
                'No 6', '', '', '', '', 'No 7', '', '', '', '', 'No 8', '', '', '', '', 'No 9', '', '', '', '', 'No 10', '', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataKematianRI($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveKematianRI($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {

                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->ICD10_CODE;
                        $hasil[$x][++$y] = $row[$track]->DK_JENIS_PENYAKIT;
                        $hasil[$x][++$y] = $row[$track]->DK_JML_KASUS;
                        $hasil[$x][++$y] = $row[$track]->DK_JML_KEMATIAN;
                        $hasil[$x][++$y] = $row[$track]->DK_PERSEN;

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
