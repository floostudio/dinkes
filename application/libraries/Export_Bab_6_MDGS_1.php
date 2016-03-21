<?php

Class Export_Bab_6_MDGS_1 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab6_4');
        
        $this->CI->load->model('m_bab6_1');
        $this->CI->load->model('m_bab6_2');
        $this->CI->load->model('m_bab6_3');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);

        $objPHPExcel->getActiveSheet()->fromArray($this->headerMDGS4(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataMDGS4($tahun), null, 'A2');
        $objPHPExcel->getActiveSheet()->setTitle('MDGS 4');
        
          $objPHPExcel->createSheet(1);
          $objPHPExcel->setActiveSheetIndex(1);
          $objPHPExcel->getActiveSheet()->fromArray($this->headerMDGS5(), null, 'A1');
          $objPHPExcel->getActiveSheet()->fromArray($this->dataMDGS5($tahun), null, 'A2');
          $objPHPExcel->getActiveSheet()->setTitle('MDGS 5');

          $objPHPExcel->createSheet(2);
          $objPHPExcel->setActiveSheetIndex(2);
          $objPHPExcel->getActiveSheet()->fromArray($this->headerMDGS6(), null, 'A1');
          $objPHPExcel->getActiveSheet()->fromArray($this->dataMDGS6($tahun), null, 'A2');
          $objPHPExcel->getActiveSheet()->setTitle('MDGS 6');

          /*$objPHPExcel->createSheet(3);
          $objPHPExcel->setActiveSheetIndex(3);
          $objPHPExcel->getActiveSheet()->fromArray($this->headerMaternalEsensial(), null, 'A1');
          $objPHPExcel->getActiveSheet()->fromArray($this->dataMaternalEsensial($tahun), null, 'A2');
          $objPHPExcel->getActiveSheet()->setTitle('MDGS Maternal Esensial');

          $objPHPExcel->createSheet(4);
          $objPHPExcel->setActiveSheetIndex(4);
          $objPHPExcel->getActiveSheet()->fromArray($this->headerNeonatalEsensial(), null, 'A1');
          $objPHPExcel->getActiveSheet()->fromArray($this->dataNeonatalEsensial($tahun), null, 'A2');
          $objPHPExcel->getActiveSheet()->setTitle('MDGS Neonatal Esensial'); 
          
           $objPHPExcel->createSheet(5);
        $objPHPExcel->setActiveSheetIndex(5);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSebabKematianIbuPersalinan(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSebabKematianIbuPersalinan($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Kematian Ibu Persalinan');*/

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab VI MDGS Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerMDGS4() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Rumah sakit melaksanakan Audit Maternal Perinatal',
            'Rumah sakit menerapkan "Buku Saku Pelayanan Kesehatan Anak di RS',
            'Rumah Sakit memenuhi kecukupan obat dan alat sesuai Buku Saku Pelayanan Kesehatan Anak di RS',
            'Rumah Sakit memiliki dokter spesialis anak minimal 1 orang',
            'Rumah Sakit melaksanakan sistim rujukan (protap/pedoman/SOP dan instrumen) sesuai dengan standar',
            'Jumlah perinatologi set yang dimiliki Rumah Sakit');
        return $header;
    }

    function dataMDGS4($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;
        $track2 = 0;
        $no = 1;

        $x = 0;
        $y = 0;

        for ($j = 0; $j < $rs_count; $j++) {

            $track = 0;
            $track2 = 0;

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

            $data = $this->CI->m_bab6_4->retrieveMDGS41($tahun, $rsAktif, null, null, null);
            $data2 = $this->CI->m_bab6_4->retrieveMDGS42($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            $row2 = $data2->result();
            if ($row != null) {
                for ($k = 0; $k < 5; $k++) {
                    if ($row[$track]->MDGS41_KONDISI == 1)
                        $hasil[$x][++$y] = 'V';
                    else
                        $hasil[$x][++$y] = 'X';

                    $track++;
                }
            }
            if ($row2 != null) {
                $hasil[$x][++$y] = $row2[$track2]->MDGS42_JUMLAH;
                $track2++;
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerMDGS5() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Pelaksanaan Pelayanan Obstetrik Neonatal Emergensi Komprehensif (PONEK) Rumah Sakit',
            'Kondisi sarana dan peralatan rumah sakit PONEK',
            'Jumlah Kunjungan pembinaan Tim PONEK  RS ke puskesmas PONED dalam 1 tahun sebanyak',
            'Jumlah Kunjungan pembinaan Tim PONEK  RS ke klinik/RS sekitarnya dalam 1 tahun sebanyak',
            'Jumlah Audit Maternal Perinatal (AMP) termasuk surveilans kematian ibu yang dilaksanakan sebanyak',
            'Rumah Sakit sudah memiliki SK Tim PONEK RS');
        return $header;
    }

    function dataMDGS5($tahun) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();
        $track = 0;
        $track2 = 0;
        $track3 = 0;
        $no = 1;

        $x = 0;
        $y = 0;
        for ($j = 0; $j < $rs_count; $j++) {
            $track = 0;
            $track2 = 0;
            $track3 = 0;

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

            $data = $this->CI->m_bab6_4->retrieveMDGS51($tahun, $rsAktif, null, null, null);
            $data2 = $this->CI->m_bab6_4->retrieveMDGS52($tahun, $rsAktif, null, null, null);
            $data3 = $this->CI->m_bab6_4->retrieveMDGS53($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            $row2 = $data2->result();
            $row3 = $data3->result();
            if ($row != null) {
                for ($k = 0; $k < 2; $k++) {

                    if ($row[$track]->MDGS51_KONDISI == 2)
                        $hasil[$x][++$y] = 'Sesuai Standar';
                    else if ($row[$track]->MDGS51_KONDISI == 1)
                        $hasil[$x][++$y] = 'Tidak Sesuai Standar';
                    else
                        $hasil[$x][++$y] = 'Tidak Ada';
                    $track++;
                }
            }
            if ($row2 != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $row2[$track2]->MDGS52_JUMLAH;
                    $track2++;
                }
            }
            if ($row3 != null) {

                if ($row3[$track3]->MDGS53_KONDISI == 1)
                    $hasil[$x][++$y] = 'V';
                else
                    $hasil[$x][++$y] = 'X';
                $track3++;
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerMDGS6() {
        $data = $this->CI->m_umum->getMDGSList('MDGS6');
        $list = array();
        $i = 0;
        foreach ($data->result() as $row) {
            $list[$i] = $row->MDGS_PERTANYAAN;
            $i++;
        }
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',);
        $header2 = array_merge($header, $list);
        return $header2;
    }

    function dataMDGS6($tahun) {

        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();

        $hasil = array();

        $rowRS = $dataRS->result();

        $track = 0;
        $track2 = 0;
        $no = 1;

        $x = 0;
        $y = 0;

        for ($j = 0; $j < $rs_count; $j++) {

            $track = 0;
            $track2 = 0;
            $track3 = 0;

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

            $data = $this->CI->m_bab6_4->retrieveMDGS61($tahun, $rsAktif, null, null, null);
            $data2 = $this->CI->m_bab6_4->retrieveMDGS62($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            $row2 = $data2->result();
            if ($row != null) {
                for ($k = 0; $k < 22; $k++) {
                    if ($row[$track]->MDGS61_KONDISI == 1)
                        $hasil[$x][++$y] = 'V';
                    else
                        $hasil[$x][++$y] = 'X';
                    $track++;
                }
            }
            if ($row2 != null) {
                for ($k = 0; $k < 6; $k++) {
                    $hasil[$x][++$y] = $row2[$track2]->MDGS62_JUMLAH;
                    $track2++;
                }
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerMaternalEsensial() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Kotak Resusitasi', 'Inkubator', 'Penghangat (Radiant Warmer)',
            'Ekstraktor Vakum', 'Forceps naegele', 'AVM', 'Pompa Vakum Listrik',
            'Monitor denyut jantung/pernapasan', 'Foetal Doppler', 'Set Sectio Saesaria');
        return $header;
    }

    function dataMaternalEsensial($tahun) {
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

            $data = $this->CI->m_bab6_4->retrieveMaternalEsensial($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) {
                    $hasil[$x][++$y] = $row[$track]->PM_JUMLAH;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerNeonatalEsensial() {
        $header = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'Inkubator', 'Infant Warmer', 'Pulse Oxymeter Neonatus ',
            'Therapy Sinar', 'Syringe Pump', 'Tabung Oksigen', 'Lampu Tindakan',
            'Alat-Alat Resusitasi Neonatus', 'CPAP (Continous Positive Airways Preassure', 'Inkubator Transport');
        return $header;
    }

    function dataNeonatalEsensial($tahun) {
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

            $data = $this->CI->m_bab6_4->retrieveNeonatalEsensial($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 10; $k++) {
                    $hasil[$x][++$y] = $row[$track]->PN_JUMLAH;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

     function headerSebabKematianIbuPersalinan() {
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Total Kematian Ibu', '', '', '',
                'Perdarahan = 1%', '', '', '',
                'Eklampsia =30% ', '', '', '',
                'Sepsis = 0.2 %', '', '', ''),
            array('', '', '', '', '', '', '', '', '', 'Tribulan I', 'Tribulan II', 'Tribulan III', 'Tribulan IV',
                'Tribulan I', 'Tribulan II', 'Tribulan III', 'Tribulan IV',
                'Tribulan I', 'Tribulan II', 'Tribulan III', 'Tribulan IV',
                'Tribulan I', 'Tribulan II', 'Tribulan III', 'Tribulan IV')
        );
        return $header;
    }

    function dataSebabKematianIbuPersalinan($tahun) {
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

            $data = $this->CI->m_bab6_3->retrieveSebabKematianIbuPersalinan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                $hasil[$x][++$y] = $row[$track]->KIP_TOTAL;
                $hasil[$x][++$y] = $row[$track + 1]->KIP_TOTAL;
                $hasil[$x][++$y] = $row[$track + 2]->KIP_TOTAL;
                $hasil[$x][++$y] = $row[$track + 3]->KIP_TOTAL;

                $hasil[$x][++$y] = $row[$track]->KIP_PENDARAHAN;
                $hasil[$x][++$y] = $row[$track + 1]->KIP_PENDARAHAN;
                $hasil[$x][++$y] = $row[$track + 2]->KIP_PENDARAHAN;
                $hasil[$x][++$y] = $row[$track + 3]->KIP_PENDARAHAN;

                $hasil[$x][++$y] = $row[$track]->KIP_EKLAMPSIA;
                $hasil[$x][++$y] = $row[$track + 1]->KIP_EKLAMPSIA;
                $hasil[$x][++$y] = $row[$track + 2]->KIP_EKLAMPSIA;
                $hasil[$x][++$y] = $row[$track + 3]->KIP_EKLAMPSIA;

                $hasil[$x][++$y] = $row[$track]->KIP_SEPSIS;
                $hasil[$x][++$y] = $row[$track + 1]->KIP_SEPSIS;
                $hasil[$x][++$y] = $row[$track + 2]->KIP_SEPSIS;
                $hasil[$x][++$y] = $row[$track + 3]->KIP_SEPSIS;

                $track+=4;
            }

            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

}

?>
