<?php

Class Export_Bab_SPM2 {

    private $CI;

    function __construct() {
        $this->CI = & get_instance();

        $this->CI->load->library('ExcelWriter');
        $this->CI->load->library('Excel');
        $this->CI->load->model('m_bab5_1_retrieve');
        $this->CI->load->model('m_bab5_2');
        $this->CI->load->model('m_bab5_3');
        $this->CI->load->model('m_bab5_4');
        $this->CI->load->model('m_umum');
        $this->CI->load->model('m_analisa');
    }

    function downloadExcel($tahun) {

        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $objPHPExcel = new Excel();

        $objPHPExcel->setActiveSheetIndex(0); 
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmTransfusi($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSpm($tahun, 12, 2, 33), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Transfusi');

        $objPHPExcel->createSheet(1);
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmMaskin($tahun), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSpm($tahun, 13, 1, 36), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Maskin');

        $objPHPExcel->createSheet(2);
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmRekamMedik(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 14, 4, 37), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Rekam Medik');

        $objPHPExcel->createSheet(3);
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmLimbah(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 15, 2, 38), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Limbah');

        $objPHPExcel->createSheet(4);
        $objPHPExcel->setActiveSheetIndex(4);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmAdministrasi(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 16, 9, 39), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Administrasi');

        $objPHPExcel->createSheet(5);
        $objPHPExcel->setActiveSheetIndex(5);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmAmbulans(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 17, 3, 40), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Ambulans');


        $objPHPExcel->createSheet(6);
        $objPHPExcel->setActiveSheetIndex(6);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmPemulasaran(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 18, 1, 41), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Pemulasaran Jenazah');

        $objPHPExcel->createSheet(7);
        $objPHPExcel->setActiveSheetIndex(7);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmSarana(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 19, 3, 42), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Sarana');

        $objPHPExcel->createSheet(8);
        $objPHPExcel->setActiveSheetIndex(8);
        $objPHPExcel->getActiveSheet()->fromArray($this->headerSpmDalin(), null, 'A1');
        $objPHPExcel->getActiveSheet()->fromArray($this->dataSPM($tahun, 21, 3, 44), null, 'A3');
        $objPHPExcel->getActiveSheet()->setTitle('SPM Dalin');


        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        echo $data[0][0];
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Rekap SPM 2 Tahun ' . $tahun_rekap . '.xls"');
        ob_clean();
        $objWriter->save('php://output');
    }

    function headerSpmIGD($tahun) {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 9; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                '1.Kemampuan menangani life saving anak dan dewasa', '', '', '',
                '2.Jam buka pelayanan gawat darurat', '', '', '',
                '3.Pemberi pelayanan kegawatdaruratan yang bersertifikat yang masih berlaku', '', '', '',
                '4.Ketersediaan tim Penanggulangan bencana', '', '', '',
                '5.Waktu tanggap pelayanan Dokter di Gawat Darurat', '', '', '',
                '6.Kepuasan Pelanggan', '', '', '',
                '7.Kematian pasien  <= 24 jam', '', '', '',
                '8.Khusus untuk RS Jiwa Pasien dapat ditenangkan dalam waktu = 48 jam', '', '', '',
                '9.Tidak adanya pasien yang diharuskan membayar uang muka', '', '', ''),
            $header2
        );
        return $header;
    }

    function headerSpmRJ($tahun) {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 8; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Dokter pemberi pelayanan di Poliklinik Spesialis', '', '', '',
                'Ketersediaan Pelayanan', '', '', '',
                'Ketersediaan Pelayanan di RS Jiwa', '', '', '',
                'Jam buka pelayanan', '', '', '',
                'Waktu tunggu di rawat jalan', '', '', '',
                'Kepuasan Pelanggan ', '', '', '',
                'a. Penegakan diagnosis TB melalui pemeriksaan mikroskop TB (untuk RS yang telah melaksanakan TB DOTS)', '', '', '',
                'b. Terlaksananya kegiatan pencatatan dan pelaporan TB di rumah sakit', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmRI($tahun) {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 12; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Pemberi pelayanan di Rawat Inap', '', '', '',
                'Dokter penanggung jawab pasien rawat inap', '', '', '',
                'Ketersediaan Pelayanan Rawat Inap ', '', '', '',
                'Jam Visite Dokter Spesialis', '', '', '',
                'Kejadian infeksi pasca operasi', '', '', '',
                'Kepuasan Pelanggan', '', '', '',
                'a. Penegakan diagnosis TB melalui pemeriksaan mikroskop TB (untuk RS yang telah melaksanakan TB DOTS)', '', '', '',
                'b. Terlaksananya kegiatan pencatatan dan pelaporan TB di rumah sakit', '', '', '',
                'Ketersediaan Pelayanan Rawat Inap di RS yg memberikan pelayanan jiwa', '', '', '',
                'Tidak adanya kejadian kematian pasien gangguan jiwa karena bunuh diri', '', '', '',
                'Kejadian re-admission pasien gangguan jiwa dalam waktu = 1 bulan ', '', '', '',
                'Lama hari perawatan pasien gangguan jiwa', '', '', '', ),
            $header2
        );
        return $header;
    }

    function headerSpmBedah() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 7; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Waktu tunggu operasi elektif', '', '', '',
                'Kejadian kematian di meja operasi', '', '', '',
                'Tidak adanya kejadian operasi salah sisi', '', '', '',
                'Tidak adanya kejadian operasi salah orang', '', '', '',
                'Tidak adanya kejadian salah tindakan pada operasi', '', '', '',
                'Tidak adanya kejadian tertinggalnya benda asing/lain pada tubuh pasien setelah operasi', '', '', '',
                'Komplikasi anestesi karena overdosis,reaksi anestesi, dan salah penempatan endotracheal tube', '', '', '',
            ),
            $header2
        );
        return $header;
    }

    function headerSpmPerinatologi() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 9; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kejadian kematian ibu karena persalinan', '', '', '',
                'Pemberi pelayanan persalinan normal', '', '', '',
                'Pemberi pelayanan persalinan dengan penyulit', '', '', '',
                'Pemberi pelayanan persalinan dengan tindakan operasi', '', '', '',
                'Kemampuan menangani BBLR 1500 gr-2500 gr', '', '', '',
                'Pertolongan persalinan melalui seksio cesaria', '', '', '',
                'a. Presentase KB (Vasektomi &tubektomi yang dilakukan oleh tenaga kompeten dr. SpOG, dr. Sp.B, dr. SP.U, dokter umum terlatih', '', '', '',
                'b. Presentasi peserta KB mantap yang mendapat konseling KB mantap oleh bidan terlatih', '', '', '',
                'Kepuasan pelanggan', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmIntensif() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 2; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Rata-rata Pasien yang kembali ke perawatan intensif dengan kasus yang sama <72', '', '', '',
                'Pemberi pelayanan Unit Intensif', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmLab($tahun) {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 4; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Waktu tunggu hasil pelayanan laboratorium', '', '', '',
                'Pelaksana ekspertisi', '', '', '',
                'Tidak adanya kesalahan pemberian hasil pemeriksaan laboratorium', '', '', '',
                'Kepuasan Pelanggan', '', '', '', ),
            $header2
        );
        return $header;
    }

    function headerSpmRehabMedik($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kejadian Drop Out pasien terhadap pelayanan Rehabilitasi Medik yang direncanakan', '', '', '',
                'Tidak adanya kejadian kesalahan tindakan rehabilitasi medik', '', '', '',
                'Kepuasan Pelanggan', '', '', '' ),
            array('', '', '', '', '', '', '', '', '', 'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai'
            )
        );
        return $header;
    }

    function headerSpmPelayananFarmasi($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Waktu tunggu pelayanana. Obat jadi', '', '', '',
                'Waktu tunggu pelayanana. Obat racikan', '', '', '',
                'Kepuasan Pelanggan', '', '', '',
                'Penulisan resep sesuai formularium', '', '', '' ),
            array('', '', '', '', '', '', '', '', '', 'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai'
            )
        );
        return $header;
    }

    function headerSPMGizi($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Ketepatan waktu pemberian makanan kepada pasien', '', '', '',
                'Sisa makanan yang tidak termakan oleh pasien', '', '', '',
                'Tidak adanya kejadian kesalahan pemberian diet', '', '', '' ),
            array('', '', '', '', '', '', '', '', '', 'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai'
            )
        );
        return $header;
    }

    function headerSpmTransfusi($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kebutuhan darah bagi setiap pelayanan tranfusi', '', '', '',
                'Kejadian Reaksi tranfusi', '', '', '' ),
            array('', '', '', '', '', '', '', '', '', 'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai',
                'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai'
            )
        );
        return $header;
    }

    function headerSpmMaskin($tahun) {
        $tahun_rekap = $this->CI->m_umum->getTahunById($tahun);
        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Pelayanan terhadap pasien GAKIN yang datang ke RS pada setiap unit pelayanan', '', '', '' ),
            array('', '', '', '', '', '', '', '', '', 'Standar', 'Hasil Numerator', 'Hasil Denumenrator', 'Nilai')
        );
        return $header;
    }

    function headerSpmRekamMedik() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 4; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kelengkapan pengisian rekam medis 24 jam setelah selesai pelayanan', '', '', '',
                'Kelengkapan Informed Concent setelah mendapatkan informasi yang jelas', '', '', '',
                'Waktu penyediaan dokumen rekam medik pelayanan rawat jalan', '', '', '',
                'Waktu penyediaan dokumen rekam medik pelayanan rawat inap', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmLimbah() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 2; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Baku mutu limbah cair', '', '', '',
                'Pengelolaan limbah padat infeksius sesuai dengan aturan', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmAmbulans() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 3; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Waktu pelayanan ambulance/Kereta Jenazah', '', '', '',
                'Kecepatan memberikan pelayanan ambulance/Kereta jenazah di Rumah Sakit', '', '', '',
                'Response time pelayanan ambulance oleh masyarakat yang membutuhkan', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function headerSpmPemulasaran() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 1; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Waktu tanggap pelayanan pemulasaran jenazah', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function headerSpmSarana() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 3; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Kecepatan waktu menanggapi kerusakan alat', '', '', '',
                'Ketepatan waktu pemeliharaan alat', '', '', '',
                'Peralatan laboratorium dan alat ukur yang digunakan dalam pelayanan terkalibrasi tepat waktu sesuai dengan ketentuan kalibrasi', '', '', '',
            ),
            $header2
        );
        return $header;
    }

    function headerSpmAdministrasi() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 9; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Tindak lanjut penyelesaian hasil pertemuan tingkat direksi', '', '', '',
                'Kelengkapan laporan akuntabilitas kinerja', '', '', '',
                'Ketepatan waktu pengusulan kenaikan pangkat', '', '', '',
                'Ketepatan waktu pengusulan gaji berkala', '', '', '',
                'Karyawan yang mendapat pelatihan minimal 20 jam setahun', '', '', '',
                'Cost recovery', '', '', '',
                'Ketepatan waktu penyusunan laporan keuangan', '', '', '',
                'Kecepatan waktu pemberian informasi tentang tagihan pasien rawat inap', '', '', '',
                'Ketepatan waktu pemberian imbalan (insentif) sesuai kesepakatan waktu', '', '', '' ),
            $header2
        );
        return $header;
    }

    function headerSpmDalin() {
        $header2 = array();

        $header2[0] = $header2[1] = $header2[2] = $header2[3] = $header2[4] = $header2[5] = $header2[6] = $header2[7] = $header2[8] = '';
        $idx = 9;
        for ($i = 0; $i < 3; $i++) {
            $header2[$idx] = 'Standar';
            $header2[$idx + 1] = 'Hasil Numerator';
            $header2[$idx + 2] = 'Hasil Denumenrator';
            $header2[$idx + 3] = 'Nilai';
            $idx+=4;
        }

        $header = array(
            array('No', 'Kode Registrasi', 'Kabupaten Kota', 'Region', 'Kelas', 'Jenis',
                'Pemilik', 'Status Penyelenggara', 'Nama Rumah Sakit',
                'Ada anggota tim PPI yang terlatih', '', '', '',
                'Tersedia APD di setiap instalasi/departement', '', '', '',
                'Kegiatan pencatatan dan pelaporan infeksi nosokomial/HAI (health care associated infections) di rumah sakit (minimum satu parameter)', '', '', ''
            ),
            $header2
        );
        return $header;
    }

    function dataSpm($tahun, $idSpm, $jumKategori, $analisaId) {
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

            $data = $this->CI->m_analisa->retrieveSPM($idSpm, $tahun, $rsAktif, null, null, null);
            $row = $data->result();
            if ($row != null) {
                for ($k = 0; $k < $jumKategori; $k++) {
                    $hasil[$x][++$y] = $row[$track]->SPM_STANDAR;
                    $hasil[$x][++$y] = $row[$track]->SPM_NUMERATOR;
                    $hasil[$x][++$y] = $row[$track]->SPM_DENUMERATOR;
                    $hasil[$x][++$y] = $row[$track]->SPM_PENCAPAIAN;
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