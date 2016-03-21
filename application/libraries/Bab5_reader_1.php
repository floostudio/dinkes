<?php 

/*
 * 
 * Author Iqbal Permana
 */


class Bab5_reader_1{
    private $CI ;
    private $CHECKER;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_bab5_1');
            $this->CI->load->model('m_bab');
            $this->CI->load->helper('array');
            $this->CHECKER[0] = array(
                "Trend Jumlah Kunjungan IGD",
                "V.1.c Sistem Komunikasi Kegawatdaruratan",
                "10"
            );
            $this->CHECKER[1] = array(
                "V.2.A Kegiatan Rujukan IGD",
                "Rekapitulasi Sepuluh Besar Kasus Rujukan Dari Bawah",
                "Jumlah"
            );
            $this->CHECKER[2] = array(
                "Jumlah Kunjungan Rawat Jalan",
                "Lain-lain",
                "Total Kasus"
            );
            $this->CHECKER[3] = array(
                "V.4.a. Kegiatan Rawat Inap",
                "ICCU",
                "Total"
            );
            $this->CHECKER[4] = array(
                "V.5.a. Jumlah Operasi",
                "Gigi dan Mulut",
                "TOTAL"
            );
            $this->CHECKER[5] = array(
                "V.6.a. Hasil Pelayanan Persalinan",
                "Hasil Persalinan",
                "Kelahiran Mati"
            );   
        }
        
        public function cekSheet1($filePath){
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['2']['B']) != trim($this->CHECKER[0][0])){ return false; }
            else if(trim($sheetData['30']['A']) !=  trim($this->CHECKER[0][1])){ return false; }
            else if(trim($sheetData['51']['A']) !=  trim($this->CHECKER[0][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet2($filePath){
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER[1][0])){ return false; }
            else if(trim($sheetData['35']['B']) !=  trim($this->CHECKER[1][1])){ return false; }
            else if(trim($sheetData['65']['B']) !=  trim($this->CHECKER[1][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet3($filePath){
            $sheetData = $this->readExcel($filePath, 2);
            if(trim($sheetData['3']['B']) != trim($this->CHECKER[2][0])){ return false; }
            else if(trim($sheetData['25']['B']) !=  trim($this->CHECKER[2][1])){ return false; }
            else if(trim($sheetData['42']['A']) !=  trim($this->CHECKER[2][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet4($filePath){
            $sheetData = $this->readExcel($filePath, 3);
            if(trim($sheetData['2']['A']) != trim($this->CHECKER[3][0])){ return false; }
            else if(trim($sheetData['29']['B']) !=  trim($this->CHECKER[3][1])){ return false; }
            else if(trim($sheetData['59']['B']) !=  trim($this->CHECKER[3][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet5($filePath){
            $sheetData = $this->readExcel($filePath, 4);
            if(trim($sheetData['2']['A']) != trim($this->CHECKER[4][0])){ return false; }
            else if(trim($sheetData['19']['B']) !=  trim($this->CHECKER[4][1])){ return false; }
            else if(trim($sheetData['23']['A']) !=  trim($this->CHECKER[4][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet6($filePath){
            $sheetData = $this->readExcel($filePath, 5);
            if(trim($sheetData['2']['A']) != trim($this->CHECKER[5][0])){ return false; }
            else if(trim($sheetData['35']['B']) !=  trim($this->CHECKER[5][1])){ return false; }
            else if(trim($sheetData['66']['B']) !=  trim($this->CHECKER[5][2])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        /* BEGIN SHEET 1 - IGD*/
        public function readBab5_1_TrendKunjunganIGD($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 9;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'kunjungan_igd');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_1->inputTrendKunjunganIGD($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_JmlTenagaIGD($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 18;
            $endRow = 24;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            $keterangan = 0;
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError_1 = $this->excel->validate2Col($sheetData, range($startRow, $endRow), 'F', 'G');
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range('C','C'));
            
            //$excelError = array_merge($excelError_1, $excelError_2);
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'jumlah_tenaga_igd'); //keep
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    (strtolower($sheetData[$i]['F'])=='v')? $keterangan = 1 : $keterangan = 0;
                    $this->CI->m_bab5_1->inputJumlTenagaIGD($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], -1, -1, $keterangan);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_SisKomGD($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 33;
            $endRow = 36;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_1->inputSisKomGD($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_SepuluhBesarPenyIGD($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 42;
            $endRow = 51;
            $startColumn = 'B';
            $endColumn = 'J';
            $startID = 1;
            
            $firstCol = 'B'; $secondCol = 'D';
            $thirdCol = 'H'; $fourthCol = 'J';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $firstCol);
            
            if(count($excelError) == 0){
                for($i=$startRow;$i<=$endRow;$i++) {
                    $this->CI->m_bab5_1->inputSepuluhBesarPenyIGD($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['D'], $sheetData[$i]['H'],
                            $sheetData[$i]['J']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        /* END OF SHEET 1 - IGD */
        
        /* BEGIN SHEET 2 - RUJUKAN */
        
        public function readBab5_1_KegiatanRujukanIGD($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 5;
            $endRow = 9;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $startColumn_1 = 'C'; $endColumn_1 = 'D';
            $startColumn_2 = 'F'; $endColumn_2 = 'K';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn_1, $endColumn_1));
            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn_2, $endColumn_2));
            
            $excelError = array_merge($excelError_1, $excelError_2);
            
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_1->inputKegiatanRujukanIGD($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_KegiatanRujukan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 18;
            $endRow = 31;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_1->inputKegiatanRujukan($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_SepuluhBesarKasusRujukan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 39;
            $endRow = 48;
            $startColumn = 'B';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $startColumn);
            
            if(count($excelError)==0) {
                for($i=$startRow;$i<=$endRow;$i++) {
                    $this->CI->m_bab5_1->inputSepuluhBesarKasusRujukan($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']

                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_1_SepuluhBesarKasusRujukan2($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 55;
            $endRow = 64;
            $startColumn = 'B';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $startColumn);
            
            if(count($excelError)==0) {
                for($i=$startRow;$i<=$endRow;$i++) {
                    $this->CI->m_bab5_1->inputSepuluhBesarKasusRujukanKeAtas($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        /* END OF SHEET 2 - RUJUKAN */
        
        /* BEGIN SHEET 3 - RAWAT JALAN */
        
        public function readBab5_1_KunjunganRawatJalan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 9;
            $endRow = 25;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
                        
            for($i=$startRow;$i<=$endRow;$i++) {
                $this->CI->m_bab5_1->inputKunjunganRawatJalan($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                        $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']
                        );
                $startID++;
            }
           
        }
        
        public function readBab5_1_SepuluhBesarPenyRawatJln($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 32;
            $endRow = 41;
            $startColumn = 'B';
            $endColumn = 'H';
            $startID = 1;
            
            $startColumn_1 = 'B'; $endColumn_1 = 'C'; 
            $startColumn_2 = 'G'; $endColumn_2 = 'H';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $startColumn);
            
            if(count($excelError)==0) {
                for($i=$startRow;$i<=$endRow;$i++) {
                    $this->CI->m_bab5_1->inputSepuluhBesarPenyakitRawatJln($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['G'],
                            $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        /* END OF SHEET 3 - RAWAT JALAN */
        
        /* BEGIN SHEET 4 - RAWAT INAP */
        
        public function readBab5_1_KegiatanRawatInap($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 31;
            $startColumn = 'C';
            $endColumn = 'Q';
            $startID = 1;
            
            $startColumn_1 = 'C'; $endColumn_1 = 'D';
            $startColumn_2 = 'F'; $endColumn_2 = 'Q';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            for($i=$startRow;$i<=$endRow;$i++) {
                $this->CI->m_bab5_1->inputKegiatanRawatInap($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['F'], 
                        $sheetData[$i]['G'], $sheetData[$i]['H'], $sheetData[$i]['I'], 
                        $sheetData[$i]['J'], $sheetData[$i]['K'], $sheetData[$i]['L'], 
                        $sheetData[$i]['M'], $sheetData[$i]['N'], $sheetData[$i]['O'],
                        $sheetData[$i]['P'], $sheetData[$i]['Q']
                        );
                $startID++;
            }
        }
        
        public function readBab5_1_PenyakitTerbanyakRI($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 37;
            $endRow = 46;
            $startColumn = 'B';
            $endColumn = 'J';
            $startID = 1;
            
            $firstColumn = 'B'; $secondColumn = 'C'; 
            $thirdColumn = 'G'; $fourthColumn = 'I';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $startColumn);
            
            if(count($excelError)==0) {
                for($i=$startRow;$i<=$endRow;$i++) {
                    $this->CI->m_bab5_1->inputPenyakitTerbanyakRI($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['G'],
                            $sheetData[$i]['I']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
            
        }
        
        public function readBab5_1_KematianRI($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 49;
            $endRow = 58;
            $startColumn = 'B';
            $endColumn = 'L';
            $startID = 1;
            
            $firstColumn = 'B'; $secondColumn = 'C'; 
            $thirdColumn = 'E'; $fourthColumn = 'I'; $fifthColumn = 'L';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validateICD10($sheetData, range($startRow, $endRow), $startColumn);
            
            if(count($excelError)==0) {
                for($i=$startRow;$i<=$endRow;$i++) {
                    if($i == $startRow) {
                        $this->CI->m_bab5_1->inputKematianRI($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['F'],
                            $sheetData[$i]['I'], $sheetData[$i]['L']
                            );
                    }
                    else {
                        $this->CI->m_bab5_1->inputKematianRI($tahun, $noreg,
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['E'],
                            $sheetData[$i]['I'], $sheetData[$i]['L']
                            );
                    }
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        /* END OF SHEET 4 - RAWAT INAP */
        
        /* BEGIN SHEET 5 - BEDAH*/
        
        
        public function readBab5_1_JumlahOperasi($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 5;
            $endRow = 22;
            $startColumn = 'C';
            $endColumn = 'S';
            $startID = 1;
            
            $startColumn_1 = 'C'; $endColumn_1 = 'G';
            $startColumn_2 = 'I'; $endColumn_2 = 'P';
            $startColumn_3 = 'R'; $endColumn_3 = 'S';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            for($i=$startRow;$i<=$endRow;$i++) {
                $this->CI->m_bab5_1->inputJumlahOperasi($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                        $sheetData[$i]['F'], $sheetData[$i]['G'],
                        $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K'],
                        $sheetData[$i]['L'], $sheetData[$i]['M'], $sheetData[$i]['N'],
                        $sheetData[$i]['O'], $sheetData[$i]['P'],
                        $sheetData[$i]['R'], $sheetData[$i]['S']
                        );
                $startID++;
            }
        }
        
        /* END OF SHEET 5 - BEDAH */
        
        /* BEGIN SHEET 6 - PERSALINAN & PERINATOLOGI*/
        
        public function readBab5_1_PelayananPersalinan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 41;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            for($i=$startRow;$i<=$endRow;$i++) {
                $this->CI->m_bab5_1->inputPelayananPersalinan($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                        $sheetData[$i]['F'], $sheetData[$i]['G']
                        );
                $startID++;
            }
        }
        
        public function readBab5_1_PelayananPerinatologi($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 48;
            $endRow = 66;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            for($i=$startRow;$i<=$endRow;$i++)
            {
                $this->CI->m_bab5_1->inputPelayananPerinatologi($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                        $sheetData[$i]['F'], $sheetData[$i]['G']
                        );
                $startID++;
            }
        }
        
        /* END OF SHEET 6 - PERSALINAN & PERINATOLOGI */
        
        
} 
