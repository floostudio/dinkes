<?php

Class Export_Bab_lampiran {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_umum');
        $this->CI->load->model('m_lampiran');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPembayaranHemodialisis($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPembayaranHemodialisis($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Pembayaran Pasien Hemodialisis');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKunjunganHemodialisis($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKunjunganHemodialisis($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Kunjungan Hemodialisis');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSarprasHemodialisis(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSarprasHemodialisis($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Sarpras Hemodialisis');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPeralatanHemodialisis(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPeralatanHemodialisis($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Peralatan Hemodialisis');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTenagaMedikHemodialisis(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataTenagaMedikHemodialisis($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Tenaga Medik Hemodialisis ');

        $objPHPExcel->createSheet(5);
        $objPHPExcel->setActiveSheetIndex(5);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPeralatanRadiologi($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPeralatanRadiologi($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Peralatan Radiologi');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Lampiran Hemodialisa dan Radiologi Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerPembayaranHemodialisis($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 27; $i++) {
            $header2[$idx] = 'Rujukan';
            $header2[$idx + 1] = 'Non Rujukan';
            $idx+=2;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                ($tahun_rekap - 2), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                ($tahun_rekap - 1), '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
                $tahun_rekap, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
            array('', '', '', '', '', '', '', '', '', 'Umum', '', 'ASKES', '', 'Asuransi lainnya', '', 'Jamkesmas', '', 'Jamkesmasda', '', 'Jamsostek', '', 'SPM', '', 'Lain-lain', '', 'Total', '',
                'Umum', '', 'ASKES', '', 'Asuransi lainnya', '', 'Jamkesmas', '', 'Jamkesmasda', '', 'Jamsostek', '', 'SPM', '', 'Lain-lain', '', 'Total', '',
                'Umum', '', 'ASKES', '', 'Asuransi lainnya', '', 'Jamkesmas', '', 'Jamkesmasda', '', 'Jamsostek', '', 'SPM', '', 'Lain-lain', '', 'Total', ''),
            $header2
        );

        return $header;
    }

    function dataPembayaranHemodialisis($tahun) {
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

            $data = $this->CI->m_lampiran->retrievePembayaranHemodialisis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_UMUM_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_UMUM_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_ASKES_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_ASKES_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_LAIN_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_LAIN_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMKESMAS_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMKESMAS_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_SPM_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_SPM_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_LAINLAIN_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_LAINLAIN_NONRUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_TOTAL_RUJUK;
                    $hasil[$x][++$y] = $row[$track]->HEMODIALIS_BYR_TOTAL_NONRUJUK;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKunjunganHemodialisis($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 6; $i++) {
            $header2[$idx] = 'L';
            $header2[$idx + 1] = 'P';
            $header2[$idx + 2] = 'Total';
            $idx+=3;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                ($tahun_rekap - 2), '', '', '', '', '',
                ($tahun_rekap - 1), '', '', '', '', '',
                $tahun_rekap, '', '', '', '', '', ''),
            array('', '', '', '', '', '', '', '', '', 'Kunjungan Lama', '', '', 'Kunjungan Baru', '', '',
                'Kunjungan Lama', '', '', 'Kunjungan Baru', '', '',
                'Kunjungan Lama', '', '', 'Kunjungan Baru', '', ''),
            $header2
        );

        return $header;
    }

    function dataKunjunganHemodialisis($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;
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

            $data = $this->CI->m_lampiran->retrieveKunjunganHemodialisis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $row[$track]->PH_LAMA_L;
                    $hasil[$x][++$y] = $row[$track]->PH_LAMA_P;
                    $hasil[$x][++$y] = $row[$track]->PH_LAMA_TOTAL;
                    $hasil[$x][++$y] = $row[$track]->PH_BARU_L;
                    $hasil[$x][++$y] = $row[$track]->PH_BARU_P;
                    $hasil[$x][++$y] = $row[$track]->PH_BARU_TOTAL;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerSarprasHemodialisis() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            '1.Ruang Peralatan dan mesin HD untuk Kapasitas 4 Mesin HD',
            '2.Ruang Pemeriksaan Dokter Konsultasi',
            '3.Ruang Tindakan', '4.Ruang Perawatan', '5.Ruang Sterilisasi',
            '6.Ruang penyimpanan Obat', '7.Ruang Penunjang Medik', '8.Ruang Administrasi dan Ruang tunggu Pasien');
        return $header;
    }

    function dataSarprasHemodialisis($tahun) {
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

            $data = $this->CI->m_lampiran->retrieveSarprasHemodialisis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 8; $k++) {
                    if ($row[$track]->HEMO_SARPRAS_KONDISI == 0) {
                        $hasil[$x][++$y] = 'X';
                    } else
                        $hasil[$x][++$y] = 'V';

                    $track++;
                }
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerPeralatanHemodialisis() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            '1.Mesin Hemodialis', '2.Tempat Tidur Pasien HD', '3.Peralatan Medik Dasar',
            '4.Reuse Dialiser', '5.Peralatan Pengolahan Air Sesuai Standar',
            '6.Peralatan Sterilisasi Alat Medis', '7.Generator Listrik');
        return $header;
    }

    function dataPeralatanHemodialisis($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;

        $track = 0;
        $track1 = 0;
        $no = 1;

        $x = 0;
        $y = 0;


        for ($j = 0; $j < $rs_count; $j++) {

             $track = 0;
            $track1 = 0;

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

            $data = $this->CI->m_lampiran->retrievePeralatanHemodialisis($tahun, $rsAktif, null, null, null);
            $row = $data->result();

            $data2 = $this->CI->m_lampiran->retrievePeralatanHemodialisis2($tahun, $rsAktif, null, null, null);
            $row2 = $data2->result();

            if ($row != null) {

                for ($k = 0; $k < 2; $k ++) {
                    $hasil[$x][++$y] = $row[$track]->PHEMO_JUMLAH;
                    $track++;
                }
            }
            if ($row2 != null) {
                for ($k = 0; $k < 5; $k ++) {
                    if ($row2[$track1]->PHEMO2_KONDISI == 0) {
                        $hasil[$x][++$y] = 'X ';
                    } else if ($row2[$track1]->PHEMO2_KONDISI == 1) {
                        $hasil[$x][++$y] = 'V ';
                    }
                    $track1++;
                }
            }
            $y++;
            $x++;
            $no++;
        }


        return $hasil;
    }

    function headerTenagaMedikHemodialisis() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            '1.Konsultasi Ginjal Hipertensi', '2.Dokter SP PD KGH yang Memiliki SIP',
            '3.Dr Sp Peny Dalam yg Bersertifikat HD oleh Organisasi Profesi',
            '4.Dokter Bersertifikat HD', '5.Perawat Mahir HD', '6.Teknik Elektromedik dg Pelatihan Khusus Mesin Dialisis', '7.Lain-Lain');
        return $header;
    }

    function dataTenagaMedikHemodialisis($tahun) {
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

            $data = $this->CI->m_lampiran->retrieveTenagaMedikHemodialisis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {

                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->HEMO_TENAGA_MEDIK_JUMLAH;
                    $track++;
                }
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerPeralatanRadiologi($tahun) {
        $header1 = array_fill(0, 700, '');
        $header1[0] = 'No';
        $header1[1] = 'Region';
        $header1[2] = 'Kode RS';
        $header1[3] = 'Nama RS';
        $header1[4] = 'Kelas RS';
        $header1[1] = 'Region';
        $header1[2] = 'Kode RS';
        $header1[3] = 'Nama RS';
        $header1[4] = 'Kelas RS';


        $header1[9] = '1.Rumah Sakit Kelas A';
        $header1[28] = '2.Rumah Sakit Kelas B';
        $header1[44] = '3.Rumah Sakit Kelas C';
        $header1[54] = '4.Rumah Sakit Kelas D';
        $header1[62] = '5.Peralatan radiologi Lainnya';

        $header2 = array();

        $data = $this->CI->m_umum->getList('list_peralatan_radiologi');
        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $i = 9;
        foreach ($data->result() as $row) {
            $header2[$i] = $row->PERALATAN_RAD_NAMA;
            $i++;
        }

        $header = array(
            $header1,
            $header2
        );

        return $header;
    }

    function dataPeralatanRadiologi($tahun) {
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

            $data = $this->CI->m_lampiran->retrievePeralatanRadiologi($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 95; $k++) {
                    $hasil[$x][++$y] = $row[$track]->PERALATAN_RADIOLOGI_RS_JUMLAH;
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
