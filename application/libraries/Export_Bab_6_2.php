<?php

Class Export_Bab_6_2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab6_1');
        $this->CI->load->model('m_bab6_2');
        $this->CI->load->model('m_bab6_3');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        /*$objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmRS(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSpmRS($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM RS');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSurveyRS(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSurveyRS($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Survey Pelanggan');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKasusTB($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKasusTBrj($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kasus TB Rawat Jalan ');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTBJenis($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataTBrjJenis($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kasus TB RJ Jenis');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKasusTB($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKasusTBri($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kasus TB Rawat Inap');*/

        $objPHPExcel->createSheet(0);
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerTBJenis($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataTBriJenis($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kasus TB RI Jenis');

        ////////
        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        //$objPHPExcel->getActiveSheet()->fromArray($this->headerLaptah($tahun), null, 'A1');
        //$objPHPExcel->getActiveSheet()->fromArray($this->dataLaptah($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Laptah TB');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKlinikVCT(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKlinikVCT($tahun), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('VCT CST');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerHIV($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataHIV($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('HIV');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKematianIbu(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKematianIbu($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kematian Maternal');

        $objPHPExcel->createSheet(5);
        $objPHPExcel->setActiveSheetIndex(5);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSebabKematianIbu(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSebabKematianIbu($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('Sebab Kematian Ibu');

       
 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab VI Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerSpmRS() {

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 21; $i++) {
            $header2[$idx] = 'Indikator yang memenuhi SPM';
            $header2[$idx + 1] = '% pencapaian ';
            $idx+=2;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'IGD', '', 'IRJA', '', 'IRNA', '', 'Bedah', '', 'Persalinan & Perinatologi', '',
                'Pelayanan Intensif ', '', 'Radiologi', '', 'Laboratorium', '', 'Rehab Medik ', '', 'Farmasi', '',
                'Gizi', '', 'Transfusi Darah', '', 'Gakin', '', 'Rekam Medik', '', 'Limbah', '', 'Admin', '',
                'Ambulan', '', 'Pemulasaran Jenazah ', '', 'Sarana', '', 'Laundry', '', 'Pengendalian Infeksi', ''),
            $header2
        );

        return $header;
    }

    function dataSpmRS($tahun) {
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

            $data = $this->CI->m_bab6_1->retrieveSpmRS($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 21; $k++) { 
                    $hasil[$x][++$y] = $row[$track]->SPM_RS_INDIKATOR;
                    $hasil[$x][++$y] = $row[$track]->SPM_RS_PENCAPAIAN;
                    $track++;
                }
            }

             

            $y++;
            $x++;
            $no++;
        }
        return $hasil;
    }

    function headerSurveyRS() {
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Parkir', '', '', '', '',
                'Loket Pendaftaran', '', '', '',
                'Satpam', '', '', '',
                'Pelayanan Administrasi Pasien', '', '', '', '', '', '',
                'Ruang/Poli', '', '', '', '',
                'pelayanan laboratorium ', '', '', '', '', '', '',
                'Pelayanan Gizi  ', '', '', '', '', '',
                'Pelayanan Gigi dan Mulut', '', '', '', '', '', '',
                'Pelayanan Dokter', '', '', '', '', '', '', '',
                'Pelayanan Perawat', '', '', '', '', '', '',
                'Pelayanan Farmasi', '', '', '', '', '', '',
                'Pelayanan Radiologi', '', '', '', '', '', '',
                'Pelayanan Fisioterapi', '', '', '', '', '',
                'Pelayanan Darah', '', '', '', '', '', '',
                'Biaya', '', ''),
            array('', '', '', '', '', '', '', '', '', 'Sikap petugas', 'keamanan', 'ketrampilan', 'Parkir', 'Rata-rata',
                'Keramahan', 'Kecepatan', 'ketrampilan', 'Rata-rata',
                'Sikap petugas', 'Kejelasan Informasi', 'Kepedulian', 'Rata-rata',
                'Sikap petugas', 'Kejelasan Informasi', 'Kecepatan', 'Prosedur Pelayanan', 'Persyaratan Pelayanan', 'Keadilan', 'Rata-rata',
                'Fasilitas', 'Kebersihan/Kenyamanan', 'Kejelasan Petugas', 'Jadwal Pelayanan', 'Rata-rata',
                'Sikap Petugas', 'Kecepatan Pelayanan', 'Ketrampilan Petugas', 'Fasilitas', 'Kenyamanan', 'Keadilan Pelayanan', 'Rata-rata',
                'Sikap petugas ', 'Citarasa', 'Keterampilan petugas', 'Fasilitas parkir', 'Kebersihan', 'Rata-rata',
                'Sikap petugas', 'Fasilitas', 'Kecepatan', 'Ketrampilan', 'Kenyamanan', 'Keadilan Pelayanan', 'Rata-rata',
                'Sikap', 'Kejelasan Informasi', 'Kecepatan', 'Ketelatenan', 'Kedisiplinan', 'Tanggung jawab', 'Keadilan pelayanan', 'Rata-rata',
                'Sikap petugas', 'Kedisiplinan', 'Kecepatan', 'Ketrampilan', 'Tanggung jawab', 'Kejelasan', 'Rata-rata',
                'Sikap petugas', 'Kejelasan', 'Kecepatan', 'Prosedur Pelayanan', 'Persyaratan Pelayanan', 'Keadilan Pelayanan', 'Rata-rata',
                'Sikap petugas', 'Fasilitas', 'Kecepatan', 'Ketrampilan', 'Kenyamanan', 'Keadilan Pelayanan', 'Rata-rata',
                'Sikap petugas', 'Ketrampilan', 'Kecepatan', 'Fasilitas', 'Kenyamanan', 'Rata-rata',
                'Sikap petugas', 'Kejelasan', 'Kecepatan', 'Prosedur Pelayanan', 'Ketrampilan', 'Kenyamanan', 'Rata-rata',
                'Kewajaran', 'Kepastian', 'Rata-rata')
        );
        return $header;
    }

    function dataSurveyRS($tahun) {
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

            $data = $this->CI->m_bab6_1->retrieveSurveyRS($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 90; $k++) {
                    if ($k == 4) {

                        $hasil[$x][++$y] = ($row[$track - 4]->SURVEY_PELANGGAN_NILAI + $row[$track - 1]->SURVEY_PELANGGAN_NILAI + $row[$track - 2]->SURVEY_PELANGGAN_NILAI + $row[$track - 3]->SURVEY_PELANGGAN_NILAI) / 4;

                        $track--;
                    } else if ($k == 8) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 12) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 19) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 24) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 31) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 37) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 44) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 52) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 59) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 66) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 73) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 79) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 86) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else if ($k == 89) {

                        $hasil[$x][++$y] = ($row[$track - 5]->SURVEY_PELANGGAN_NILAI + $row[$track - 6]->SURVEY_PELANGGAN_NILAI + $row[$track - 7]->SURVEY_PELANGGAN_NILAI) / 3;

                        $track--;
                    } else
                        $hasil[$x][++$y] = $row[$track]->SURVEY_PELANGGAN_NILAI;

                    $track++;
                }
            }

            //analisa


            $y++;
            $x++;
            $no++;
        }
        return $hasil;
    }

    //TB
    function headerKasusTB($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header2[$idx] = ($tahun_rekap - 2);
            $header2[$idx + 1] = ($tahun_rekap - 1);
            $header2[$idx + 2] = $tahun_rekap;
            $idx+=3;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                '<1', '', '',
                '1-4 tahun ', '', '',
                '5-14 tahun', '', '',
                '15-24 tahun', '', '',
                '25-44 tahun', '', '',
                '45-64 tahun', '', '',
                '65+ tahun', '', ''
            ),
            $header2
        );
        return $header;
    }

    function headerTBJenis($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 10; $i++) {
            $header2[$idx] = ($tahun_rekap - 2);
            $header2[$idx + 1] = ($tahun_rekap - 1);
            $header2[$idx + 2] = $tahun_rekap;
            $idx+=3;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'TB Paru BTA (+) dgn/tanpa biakan kuman TB', '', '',
                'TB Paru Lainnya ', '', '',
                'TB Ekstra Paru', '', '',
                'TB alat napas lainnya', '', '',
                'Meningitis TB', '', '',
                'TB Susunan saraf pusat lainnya', '', '',
                'TB Tulang dan sendi', '', '',
                'Limfadenitis TB', '', '',
                'TB Miller', '', '',
                'TB Lainnya', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataKasusTBrj($tahun) {
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

            $data = $this->CI->m_bab6_2->retrieveKasusTBrj($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_N2;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_N1;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function dataTBrjJenis($tahun) {
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


            $rsAktif = $rowRS[$j]->KODE_REGISTRASI;

            $data = $this->CI->m_bab6_2->retrieveKasusTBrjJenis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_JENIS_N2;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_JENIS_N1;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RJ_JENIS_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function dataKasusTBri($tahun) {
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

            $data = $this->CI->m_bab6_2->retrieveKasusTBri($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_N2;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_N1;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function dataTBriJenis($tahun) {
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

            $data = $this->CI->m_bab6_2->retrieveKasusTBriJenis($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_JENIS_N2;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_JENIS_N1;
                    $hasil[$x][++$y] = $row[$track]->KASUS_TB_RI_JENIS_N;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerLaptah($tahun) {
        $header1 = array_fill(0, 700, '');
        $header1[0] = 'No';
        $header1[1] = 'Kode Reg';
        $header1[2] = 'Kabupaten';
        $header1[3] = 'Region';
        $header1[4] = 'Kelas';
        $header1[5] = 'Jenis RS';
        $header1[6] = 'Pemilik RS';
        $header1[7] = 'Status Penyelenggara';
        $header1[8] = 'Nama RS';

        $header1[9] = 'Pasien Baru';
        $header1[90] = 'Pasien Pengobatan Ulang';

        $header2 = array_fill(0, 700, '');
        $header2[0] = $header2[1] = $header2[2] = $header2[3] = '';

        $header2[9] = 'BTA Positif';
        $header2[36] = 'BTA Negatif/ Ro Pos';
        $header2[63] = 'Extra Paru';
        $header2[90] = 'Kambuh';
        $header2[117] = 'Defaulter';
        $header2[144] = 'Gagal';
        $header2[171] = 'Kronik';
        $header2[198] = 'Lain-lain';

        $header3 = array();
        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 72; $i++) {
            $header3[$idx] = 'L';
            $header3[$idx + 1] = 'P';
            $header3[$idx + 2] = 'Total';
            $idx+=3;
        }

        $header = array(
            $header1,
            $header2,
            array('', '', '', '', '', '', '', '', '', 'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', '',
                'Anak (0-4)', '', '', 'Anak (5-14)', '', '',
                'Dewasa(15-24)', '', '', 'Dewasa(23-34)', '', '', 'Dewasa(34-44)', '', '', 'Dewasa(45-54)', '', '', 'Dewasa(55-65)', '', '', 'Dewasa(>65)', '', '',
                'Total', '', ''
            ),
            $header3
        );

        return $header;
    }

    function dataLaptah($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;
        $no = 1;

        $totalJumlX1 = $totalJumlX2 = 0;

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

            $rsAktif = $rowRS[$j]->KODE_REGISTRASI;

            $data = $this->CI->m_bab6_2->retrieveLaptahTB($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 8; $k++) {
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_ANAK_0_4_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_ANAK_0_4_P;
                    $totalTB04 = $row[$track]->LAPTAH_TB_ANAK_0_4_L + $row[$track]->LAPTAH_TB_ANAK_0_4_P;
                    $hasil[$x][++$y] = $totalTB04;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_ANAK_5_14_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_ANAK_5_14_P;
                    $totalTB514 = $row[$track]->LAPTAH_TB_ANAK_5_14_L + $row[$track]->LAPTAH_TB_ANAK_5_14_P;
                    $hasil[$x][++$y] = $totalTB514;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_15_24_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_15_24_P;
                    $totalTB1524 = $row[$track]->LAPTAH_TB_DEWASA_15_24_L + $row[$track]->LAPTAH_TB_DEWASA_15_24_P;
                    $hasil[$x][++$y] = $totalTB1524;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_23_34_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_23_34_P;
                    $totalTB2334 = $row[$track]->LAPTAH_TB_DEWASA_23_34_L + $row[$track]->LAPTAH_TB_DEWASA_23_34_P;
                    $hasil[$x][++$y] = $totalTB2334;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_35_44_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_35_44_P;
                    $totalTB3544 = $row[$track]->LAPTAH_TB_DEWASA_35_44_L + $row[$track]->LAPTAH_TB_DEWASA_35_44_P;
                    $hasil[$x][++$y] = $totalTB3544;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_45_54_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_45_54_P;
                    $totalTB4554 = $row[$track]->LAPTAH_TB_DEWASA_45_54_L + $row[$track]->LAPTAH_TB_DEWASA_45_54_P;
                    $hasil[$x][++$y] = $totalTB4554;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_55_65_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_55_65_P;
                    $totalTB5565 = $row[$track]->LAPTAH_TB_DEWASA_55_65_L + $row[$track]->LAPTAH_TB_DEWASA_55_65_P;
                    $hasil[$x][++$y] = $totalTB5565;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_65_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_DEWASA_65_P;
                    $totalTB65 = $row[$track]->LAPTAH_TB_DEWASA_65_L + $row[$track]->LAPTAH_TB_DEWASA_65_P;
                    $hasil[$x][++$y] = $totalTB65;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_TOTAL_L;
                    $hasil[$x][++$y] = $row[$track]->LAPTAH_TB_TOTAL_P;

                    $totalJumlX = $row[$track]->LAPTAH_TB_ANAK_0_4_L + $row[$track]->LAPTAH_TB_ANAK_0_4_P +
                            $row[$track]->LAPTAH_TB_ANAK_5_14_L + $row[$track]->LAPTAH_TB_ANAK_5_14_P +
                            $row[$track]->LAPTAH_TB_DEWASA_15_24_L + $row[$track]->LAPTAH_TB_DEWASA_15_24_P +
                            $row[$track]->LAPTAH_TB_DEWASA_23_34_L + $row[$track]->LAPTAH_TB_DEWASA_23_34_P +
                            $row[$track]->LAPTAH_TB_DEWASA_35_44_L + $row[$track]->LAPTAH_TB_DEWASA_35_44_P +
                            $row[$track]->LAPTAH_TB_DEWASA_45_54_L + $row[$track]->LAPTAH_TB_DEWASA_45_54_P +
                            $row[$track]->LAPTAH_TB_DEWASA_55_65_L + $row[$track]->LAPTAH_TB_DEWASA_55_65_P +
                            $row[$track]->LAPTAH_TB_DEWASA_65_L + $row[$track]->LAPTAH_TB_DEWASA_65_P;

                    $hasil[$x][++$y] = $totalJumlX;

                    $track++;
                }
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKlinikVCT() {

        $header2 = array();
        $header3 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header2[$idx] = 'Klinik VCT';
            $header2[$idx + 1] = $header2[$idx + 2] = '';
            $header2[$idx + 3] = 'Klinik CST';
            $header2[$idx + 4] = '';
            $idx+=5;
        }

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header3[$idx] = 'Jumlah Pasien';
            $header3[$idx + 1] = 'HIV (-)';
            $header3[$idx + 2] = 'HIV (+)';
            $header3[$idx + 3] = 'Jumlah Pasien';
            $header3[$idx + 4] = 'Pengobatan ARV';
            $idx+=5;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                '<1', '', '', '', '',
                '1-4 tahun ', '', '', '', '',
                '5-14 tahun', '', '', '', '',
                '15-24 tahun', '', '', '', '',
                '25-44 tahun', '', '', '', '',
                '45-64 tahun', '', '', '', '',
                '65+ tahun', '', '', '', ''
            ),
            $header2, $header3
        );
        return $header;
    }

    function dataKlinikVCT($tahun) {
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

            $data = $this->CI->m_bab6_3->retrieveKlinikVCT($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->VCT_JUMLAHTOTAL;
                    $hasil[$x][++$y] = $row[$track]->VCT_NEGATIF;
                    $hasil[$x][++$y] = $row[$track]->VCT_POSITIF;
                    $hasil[$x][++$y] = $row[$track]->CST_JUMLAHTOTAL;
                    $hasil[$x][++$y] = $row[$track]->CST_ARV;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerHIV($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header2[$idx] = ($tahun_rekap - 2);
            $header2[$idx + 1] = ($tahun_rekap - 1);
            $header2[$idx + 2] = $tahun_rekap;
            $idx+=3;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                '<1', '', '',
                '1-4 tahun ', '', '',
                '5-14 tahun', '', '',
                '15-24 tahun', '', '',
                '25-44 tahun', '', '',
                '45-64 tahun', '', '',
                '65+ tahun', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataHIV($tahun) {
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

            $data = $this->CI->m_bab6_3->retrieveHIV($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 7; $k++) {
                    $hasil[$x][++$y] = $row[$track]->HIV_JUMLAH;
                    $hasil[$x][++$y] = $row[$track]->HIV_JUMLAH1;
                    $hasil[$x][++$y] = $row[$track]->HIV_JUMLAH2;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKematianIbu() {
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit', 'Ibu Hamil', '', 'Ibu Bersalin', '', 'Ibu Nifas', '', 'total'),
            array('', '', '', '', '', '', '', '', '', 'rujukan', 'datang sendiri', 'rujukan', 'datang sendiri', 'rujukan', 'datang sendiri')
        );
        return $header;
    }

    function dataKematianIbu($tahun) {
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

            $data = $this->CI->m_bab6_3->retrieveKematianIbu($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                $hasil[$x][++$y] = $row[$track]->JKI_IBUHAMIL_RUJUKAN;
                $hasil[$x][++$y] = $row[$track]->JKI_IBUHAMIL_DTGSENDIRI;
                $hasil[$x][++$y] = $row[$track]->JKI_IBUBERSALIN_RUJUKAN;
                $hasil[$x][++$y] = $row[$track]->JKI_IBUBERHASIL_DTGSENDIRI;
                $hasil[$x][++$y] = $row[$track]->JKI_IBUNIFAS_RSLAIN;
                $hasil[$x][++$y] = $row[$track]->JKI_IBUNIFAS_RS;
                $hasil[$x][++$y] = $row[$track]->JKI_TOTAL;

                $track++;
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerSebabKematianIbu() {
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Perdarahan', 'Infeksi', 'Sepsis', 'Pre Eklamsia/Eklampsia',
                'Jantung', 'TB Paru', 'Asma', 'Hipertensi', 'Lainnya', '')
        );
        return $header;
    }

    function dataSebabKematianIbu($tahun) {
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

            $data = $this->CI->m_bab6_3->retrieveSebabKematianIbu($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 9; $k++) {
                    $hasil[$x][++$y] = $row[$track]->JKIF_FAKTOR;
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
