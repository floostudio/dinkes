<?php

Class Export_Bab_3 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_sarpras');
        $this->CI->load->model('m_sdm');
        $this->CI->load->model('m_umum');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKetenagaan($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKetenagaan($tahun), null, 'A5');
        $objPHPExcel->getActiveSheet()->setTitle('Ketenagaan');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerKebutuhanTenaga($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataKebutuhanTenaga($tahun), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('Analisa Ketenagaan');

        
        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelatihanSDM($tahun,"tenaga IGD"), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPelatihanSDM($tahun, 1), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Pelatihan SDM - IGD');
        
        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelatihanSDM($tahun, "tenaga ICU"), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPelatihanSDM($tahun, 2), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Pelatihan SDM - ICU');
        
        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerPelatihanSDM($tahun, "tenaga OK"), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataPelatihanSDM($tahun,3), null, 'A4');
        $objPHPExcel->getActiveSheet()->setTitle('Pelatihan SDM - OK');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap Bab III Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerKetenagaan($tahun) {
        $header1 = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
            'A.Tenaga Medik Dasar', '', '', '', '', '',
            'B.Tenaga Medik Spesialis Dasar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            'C.Tenaga Spesialis Penunjang Medik', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            'D.Tenaga Medik Spesialis Lain', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            'E.Tenaga Medik Spesialis Gigi Mulut', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            'F.Tenaga Paramedis dan Tenaga Kesehatan Lain', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '',
            'G.Tenaga Non Medis & Lainnya', '', '', '', '', '', '', '', ''
        );

        $headerX = array();
        $data = $this->CI->m_umum->getList('list_ketenagaan');
        $headerX[0] = $headerX[1] = $headerX[2] = $headerX[3] = $headerX[4] = $headerX[5] = $headerX[6] = $headerX[7] = $headerX[8] = '';
        $i = 9;
        foreach ($data->result() as $row) {
            $headerX[$i] = $row->LK_NAMA;
            $headerX[$i + 1] = $headerX[$i + 2] = '';
            $i+=4;
        }

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 71; $i++) {
            $header2[$idx] = 'Jumlah SDM';
            $header2[$idx + 1] = 'Status Ketenagaan';
            $header2[$idx + 2] = 'Status Ketenagaan';
            $idx+=3;
        }

        $header3 = array();

        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] = $header3[5] = $header3[6] = $header3[7] = $header3[8] = '';
        $idx = 9;
        for ($i = 0; $i < 71; $i++) {
            $header3[$idx] = '';
            $header3[$idx + 1] = 'Tetap/PNS';
            $header3[$idx + 2] = 'Tidak Tetap';
            $idx+=3;
        }


        $header = array(
            $header1,
            $headerX,
            $header2,
            $header3
        );

        return $header;
    }

    function dataKetenagaan($tahun) {
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

            $data = $this->CI->m_sdm->retrieveKetenagaan($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 71; $k++) {

                    $hasil[$x][++$y] = $row[$track]->KETENAGAAN_JUMLAH;
                    $hasil[$x][++$y] = $row[$track]->KETENAGAAN_TETAP;
                    $hasil[$x][++$y] = $row[$track]->KETENAGAAN_KONTRAK;

                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerKebutuhanTenaga($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Tenaga Medis', '',
                'Tenaga Paramedis dan Tenaga Kesehatan lain', '',
                'Tenaga non Medis', ''
            ),
            array('', '', '', '','','','','','', 'Rencana Pemenuhan Tenaga Pada Tahun ' . ($tahun_rekap + 1), 'Upaya Pemenuhan (MOU, Pendidikan Lanjutan)',
                'Rencana Pemenuhan Tenaga Pada Tahun ' . ($tahun_rekap + 1), 'Upaya Pemenuhan (MOU, Pendidikan Lanjutan)',
                'Rencana Pemenuhan Tenaga Pada Tahun ' . ($tahun_rekap + 1), 'Upaya Pemenuhan (MOU, Pendidikan Lanjutan)'
            )
        );
        return $header;
    }

    function dataKebutuhanTenaga($tahun) {
        
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

            $data = $this->CI->m_sdm->retrieveKebutuhanTenaga($tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 3; $k++) {
                    $hasil[$x][++$y] = $row[$track]->KEB_RENCANA;
                    $hasil[$x][++$y] = $row[$track]->KEB_UPAYA;
                    $track++;
                }
            }
            $y++;
            $x++;
            $no++;
        }

        return $hasil;
    }

    function headerPelatihanSDM($tahun, $jenisTenagaMedis) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);

        $header1 = array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
            'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',$jenisTenagaMedis);
        //'No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',  'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
 

        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        $no = 1;
        for ($i = 0; $i < 20; $i++) {
            $header2[$idx] = 'NO ' . $no;
            $header2[$idx + 1] = '';
            $header2[$idx + 2] = ''; 
            $idx+=3;
            $no++; 
        }

        $header3 = array();
        $header3[0] = $header3[1] = $header3[2] = $header3[3] = $header3[4] =$header3[5] =$header3[6] =$header3[7] =$header3[8] ='';
        $idx = 9;
        for ($i = 0; $i < 20; $i++) {
            $header3[$idx] = 'Pelatihan yang Telah Diikuti';
            $header3[$idx + 1] = 'Jumlah'; 
            $header3[$idx + 2] = 'Penyelenggara';
            $idx+=3;
        }

        $header = array(
            $header1, $header2, $header3
        );

        return $header;
    }

    function dataPelatihanSDM($tahun,$idTenaga) {
        $dataRS = $this->CI->m_umum->getRSAll3();
        $rs_count = $this->CI->m_umum->countRSAll();
        $rowRS = $dataRS->result();
        
        $idTenagaMedis = $idTenaga;
          
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

            $data = $this->CI->m_sdm->retrievePelatihanSDMPerUnit($tahun, $rsAktif, null, null, null,$idTenagaMedis); //IGD
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < 20; $k++) { 
                       
                     
                        $hasil[$x][++$y] = $row[$track]->PELATIHAN_URAIAN;
                        $hasil[$x][++$y] = $row[$track]->PELATIHAN_JUMLAH; 
                        $hasil[$x][++$y] = $row[$track]->PELATIHAN_PENYELENGGARA;
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
