<?php

////////////////////////////////////
//
//export untuk bab V IGD & Rujukan
//
////////////////////////////////////

Class Export_Bab_5_1_2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab5_1_retrieve');
        $this->CI->load->model('m_bab6_2');
        $this->CI->load->model('m_umum');
        $this->CI->load->model('m_analisa');
    }

    function downloadExcel($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        /*$objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTrendKunjunganIGD($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataTrendKunjunganIGD($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Trend Kunjungan IGD');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerJumlTenagaIGD($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataJumlTenagaIGD($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Juml Tenaga IGD');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSistemKomGD($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSistemKomGD($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Sistem komuikasi GD');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSepuluhBesarPeny($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSepuluhBesarPenyIGD($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('10 besar Penyakit GD');*/

        $objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKegiatanRujukanIGD($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKegiatanRujukanIGD($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Rujukan IGD');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKegiatanRujukan($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKegiatanRujukan($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Kegiatan Rujukan');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSepuluhBesarKasusRujukanDrBawah($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSepuluhBesarKasusRujukanDrBawah($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('10 besar rujukan bawah');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSepuluhBesarKasusRujukanKeAtas($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSepuluhBesarKasusRujukanKeAtas($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('10 besar rujukan atas');

        $objPHPExcel->setActiveSheetIndex(0);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab V-IGD-Rujukan Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerTrendKunjunganIGD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 5; $i++) {
            $header2[$idx] = ($tahun_rekap - 2);
            $header2[$idx + 1] = ($tahun_rekap - 1);
            $header2[$idx + 2] = $tahun_rekap;
            $idx+=3;
        }


        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Umum', '', '', 'BPJS', '', '',
                'Jamkesmasda', '', '', 'SPM', '', '',
                'Asuransi Lainnya', '', '', 'Total', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataTrendKunjunganIGD($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveTrendKunjunganIGD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                $hasil[$x][++$y] = $row[$track]->TJK_UMUM;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_UMUM;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_UMUM;

                $hasil[$x][++$y] = $row[$track]->TJK_BPJS;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_BPJS;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_BPJS;

                $hasil[$x][++$y] = $row[$track]->TJK_JAMKESMASDA;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_JAMKESMASDA;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_JAMKESMASDA;

                $hasil[$x][++$y] = $row[$track]->TJK_SPM;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_SPM;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_SPM;

                $hasil[$x][++$y] = $row[$track]->TJK_LAIN;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_LAIN;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_LAIN;

                $hasil[$x][++$y] = $row[$track]->TJK_TOTAL;
                $hasil[$x][++$y] = $row[$track + 1]->TJK_TOTAL;
                $hasil[$x][++$y] = $row[$track + 2]->TJK_TOTAL;

                $track+=3;
            }


            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerJumlTenagaIGD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header2[$idx] = 'Jumlah';
            $header2[$idx + 1] = 'Yang Sudah Dilatih';
            $header2[$idx + 2] = 'Tahun Masa berlaku';
            $header2[$idx + 3] = 'On Site';
            $header2[$idx + 4] = 'On Call';
            $idx+=5;
        }


        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Dr. Subspesialis', '', '', '', '',
                'Dr. Spesialis', '', '', '', '',
                'Dr. PPDS', '', '', '', '',
                'Dr. Umum ', '', '', '', '',
                'Perawat Kepala', '', '', '', '',
                'Perawat', '', '', '', '',
                'Non Medis', '', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataJumlTenagaIGD($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveJumlTenagaIGD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->IGD_JUMLAH;
                    $hasil[$x][++$y] = $row[$track]->IGD_JUMLAH_TERLATIH;

                    if ($row[$track]->IGD_KETERANGAN == 1)
                        $hasil[$x][++$y] = 'On Site';
                    else
                        $hasil[$x][++$y] = 'On Call';
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerSistemKomGD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 4; $i++) {
            $header2[$idx] = "Jumlah";
            $header2[$idx + 1] = "No./Frek";
            $header2[$idx + 2] = "Jumlah Call Emergency";
            $idx+=3;
        }


        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Radiomedik', '', '',
                'a. RIG', '', '',
                'b. Ambulance', '', '',
                'Telepom', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataSistemKomGD($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveSistemKomGD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 4; $k++) {
                    $hasil[$x][++$y] = $row[$track]->SKIGD_JUMLAH;
                    $hasil[$x][++$y] = $row[$track]->SKIGD_NO;
                    $hasil[$x][++$y] = $row[$track]->SKIGD_JUMLAHCALLEMR;
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
 
    function dataSepuluhBesarPenyIGD($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveSepuluhBesarPenyIGD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->ICD10_CODE;
                        $hasil[$x][++$y] = $row[$track]->PENY_IGD_NAMA;
                        $hasil[$x][++$y] = $row[$track]->PENY_IGD_JMLH;
                        $hasil[$x][++$y] = $row[$track]->PENY_IGD_PERSEN;
 
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKegiatanRujukanIGD($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 5; $i++) {
            $header2[$idx] = 'Total Pasien';
            $header2[$idx + 1] = '';
            $header2[$idx + 2] = 'Tindak Lanjut Pelayanan';
            $header2[$idx + 3] = '';
            $header2[$idx + 4] = '';
            $header2[$idx + 5] = 'Kematian di IGD';
            $header2[$idx + 6] = '';
            $header2[$idx + 7] = '';
            $idx+=8;
        }

        $header3 = array();

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 5; $i++) {
            $header3[$idx] = 'Rujukan';
            $header3[$idx + 1] = 'Non Rujukan';
            $header3[$idx + 2] = 'Dirawat';
            $header3[$idx + 3] = 'Dirujuk';
            $header3[$idx + 4] = 'Pulang';
            $header3[$idx + 5] = 'Total Kematian';
            $header3[$idx + 6] = 'Sebelum Ditangani';
            $header3[$idx + 7] = 'Setelah Ditangani';
            $idx+=8;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Bedah', '', '', '', '', '', '', '',
                'Non Bedah', '', '', '', '', '', '', '',
                'Kebidanan', '', '', '', '', '', '', '',
                'Psikiatri', '', '', '', '', '', '', '',
                'Anak', '', '', '', '', '', '', ''
            ),
            $header2,
            $header3
        );
        return $header;
    }

    function dataKegiatanRujukanIGD($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveKegiatanRujukanIGD($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 5; $k++) {
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_JML_RUJUKAN;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_JML_NON_RUJUKAN;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_DIRAWAT;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_DIRUJUK;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_PULANG;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_TOTAL_KEMATIAN;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_SEBELUM;
                    $hasil[$x][++$y] = $row[$track]->RUJUKAN_IGD_SETELAH;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKegiatanRujukan($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header1 = array_fill(0, 700, '');
        $data = $this->CI->m_umum->getList('list_spesialisasi_rujukan');
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
            $header1[$i] = $row->SR_NAMA;
            $i+=14;
        }

        $header2 = array();
        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 14; $i++) {
            $header2[$idx] = 'Rujukan dari bawah';
            $header2[$idx + 1] = '';
            $header2[$idx + 2] = '';
            $header2[$idx + 3] = '';
            $header2[$idx + 4] = '';
            $header2[$idx + 5] = '';
            $header2[$idx + 6] = 'Dirujuk Ke atas';
            $header2[$idx + 7] = '';
            $header2[$idx + 8] = '';
            $idx+=9;
        }

        $header3 = array();

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 14; $i++) {
            $header3[$idx] = 'Diterima dr Puskesmas';
            $header3[$idx + 1] = 'Diterima dr Fas Lain';
            $header3[$idx + 2] = 'Diterima dr RS lain';
            $header3[$idx + 3] = 'Dikembalikan ke Puskesmas';
            $header3[$idx + 4] = 'Dikembalikan ke Fas Lain';
            $header3[$idx + 5] = 'Dikembalikan ke RS Asal';
            $header3[$idx + 6] = 'Pasien Rujukan';
            $header3[$idx + 7] = 'Pasien Datang Sendiri';
            $header3[$idx + 8] = 'Diterima Kembali';
            $idx+=9;
        }

        $header = array(
            $header1,
            $header2,
            $header3,
        );

        return $header;
    }

    function dataKegiatanRujukan($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();


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

            $data = $this->CI->m_bab5_1_retrieve->retrieveKegiatanRujukan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 14; $k++) {
                    $hasil[$x][++$y] = $row[$track]->RJK_DARI_PUSKESMAS;
                    $hasil[$x][++$y] = $row[$track]->RJK_DARI_FASILITAS_LAIN;
                    $hasil[$x][++$y] = $row[$track]->RJK_DARI_RSLAIN;
                    $hasil[$x][++$y] = $row[$track]->RJK_KEMBALI_PUSKESMAS;
                    $hasil[$x][++$y] = $row[$track]->RJK_KEMBALI_FASILITAS_LAIN;
                    $hasil[$x][++$y] = $row[$track]->RJK_KEMBALI_RS_ASAL;
                    $hasil[$x][++$y] = $row[$track]->RJK_PASIEN_RUJUKAN;
                    $hasil[$x][++$y] = $row[$track]->RJK_PASIEN_DTG_SENDIRI;
                    $hasil[$x][++$y] = $row[$track]->RJK_DITERIMA_KEMBALI;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    //skip
    function headerSepuluhBesarKasusRujukanDrBawah($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 10; $i++) {
            $header2[$idx] = 'Kasus Rujukan';
            $header2[$idx + 1] = 'Diterima dr puskesmas';
            $header2[$idx + 2] = 'Diterima dari faskes lain';
            $header2[$idx + 3] = 'Diterima dari RS lain'; 
            $header2[$idx + 4] = 'Dikembalikan ke puskesmas';
            $header2[$idx + 5] = 'Dikembalikan ke faskes lain';
            $header2[$idx + 6] = 'Dikembalikan ke RS Asal'; 
            $idx+=7;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'No 1', '', '', '','', '', '', 'No 2', '', '', '', '', '','', 'No 3', '','', '', '', '', '', 'No 4', '', '', '','', '', '', 'No 5', '','', '', '', '', '',
                'No 6', '', '', '','', '', '', 'No 7', '', '', '', '', '','', 'No 8', '', '', '', '','', '', 'No 9', '', '', '','', '', '', 'No 10', '', '', '', '','', ''
            ),
            $header2
        );
        return $header;
    }

    //skip
    function dataSepuluhBesarKasusRujukanDrBawah($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveSepuluhBesarRujukanBawah($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->SRJKN_KASUS;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_PUSKESMAS;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_FASIL_LAIN;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_RS_LAIN;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_KEMBALI_PUSK;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_KEMBALI_FASLAIN;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_KEMBALI_RS;
 
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    //skip
    function headerSepuluhBesarKasusRujukanKeAtas($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 10; $i++) {
            $header2[$idx] = 'Kasus Rujukan';
            $header2[$idx + 1] = 'Pasien Rujukan';
            $header2[$idx + 2] = 'Pasien Datang Sendiri';
            $header2[$idx + 3] = 'Diterima Kembali';
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

    //skip
    function dataSepuluhBesarKasusRujukanKeAtas($tahun) {
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

            $data = $this->CI->m_bab5_1_retrieve->retrieveSepuluhBesarRujukanAtas($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) { 
                        $hasil[$x][++$y] = $row[$track]->SRJKN_KASUS;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_RUJUKAN;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_DATANGSENDIRI;
                        $hasil[$x][++$y] = $row[$track]->SRJKN_DITERIMA_KEMBALI;  
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
