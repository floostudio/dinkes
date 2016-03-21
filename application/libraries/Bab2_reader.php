<?php 
/*
 * 
 * Author Iqbal Permana
 * 
 */

class Bab2_reader{
    private $CI ;
    private $CHECKER;
    private $CHECKER_2;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_bab2_2');
            $this->CI->load->helper('array');
            $this->CHECKER = array(
                "Tabel 4 Jenis Rumah Sakit",
                "Tabel 5 Kelas Rumah Sakit",
                "Tabel 8 Status Penyelenggara  (Sesuai dengan Undang-Undang No 44 Tahun 2009 pasal 20-23",
                "Ruang Intensif berdasarkan PMK 56 Th 2014 adalah 5% dari Total TT RS"
            );
            $this->CHECKER_2 = array(
                "20  Tingkat Efektivitas Pengelolaan Rumah Sakit",
                "Instalasi Gawat Darurat",
                "Instalasi Rawat Jalan",
                "Instalasi Rawat Inap",
                "Tingkat Efesiensi dan Mutu Pengelolaan Rumah Sakit"
                ); 
            //$this->CHECKER = {};
        }
        
        public function cekSheet1($filePath){
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['2']['F']) != trim($this->CHECKER[0])){ return false; }
            else if(trim($sheetData['25']['F']) !=  trim($this->CHECKER[1])){ return false; }
            else if(trim($sheetData['30']['F']) !=  trim($this->CHECKER[2])){ return false; }
            else if(trim($sheetData['72']['B']) !=  trim($this->CHECKER[3])){ return false; }
            else { return true; }
        }
        
        public function cekSheet2($filePath){
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER_2[0])){ return false; }
            else if(trim($sheetData['3']['B']) !=  trim($this->CHECKER_2[1])){ return false; }
            else if(trim($sheetData['10']['B']) !=  trim($this->CHECKER_2[2])){ return false; }
            else if(trim($sheetData['18']['B']) !=  trim($this->CHECKER_2[3])){ return false; }
            else if(trim($sheetData['41']['B']) !=  trim($this->CHECKER_2[4])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readBab2_dataRS($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 3;
            $endRow = 70;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= 27; $i++) {
                     $this->CI->m_u_bab2_2->inputDataRS($tahun, $noreg, $startID, $sheetData[$i][$startColumn]);
                    $startID++;
                }
            }
            $this->CI->m_u_bab2_2->inputDataRS($tahun, $noreg, 26, $sheetData[34]['C']); // Akreditasi RS
            $this->CI->m_u_bab2_2->inputDataRS($tahun, $noreg, 27, $sheetData[68]['C']); // Bank Darah
            $this->CI->m_u_bab2_2->inputDataRS($tahun, $noreg, 28, $sheetData[69]['C']); // Layanan Unggulan
            $this->CI->m_u_bab2_2->inputDataRS($tahun, $noreg, 29, $sheetData[70]['C']); // Peralatan Canggih
            return $excelError;
        }
        
        public function readBab2_JmlTT($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 38;
            $endRow = 43;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) {
                     $this->CI->m_u_bab2_2->inputTempatTidur($tahun, $noreg, $startID, $sheetData[$i][$startColumn]);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab2_SebaranTT($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 45;
            $endRow = 54;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) {
                     $this->CI->m_u_bab2_2->inputSebaranTempatTidur($tahun, $noreg, $startID, $sheetData[$i][$startColumn]);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab2_Ambulans($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 57;
            $endRow = 65;
            $startColumn = 'C';
            $endColumn = 'C';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                $this->CI->m_u_bab2_2->inputAmbulans($tahun, $noreg, 
                        $sheetData[57][$startColumn], $sheetData[58][$startColumn], $sheetData[59][$startColumn],
                        $sheetData[60][$startColumn], $sheetData[61][$startColumn], $sheetData[62][$startColumn],
                        $sheetData[63][$startColumn], $sheetData[64][$startColumn], $sheetData[65][$startColumn]
                        );
            }
            return $excelError;
        }
       
        
        
        public function readBab2_igd($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 8;
            $endRow = 8;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                $this->CI->m_u_bab2_2->inputIGD($tahun, $noreg, 
                    $sheetData[$startRow]['C'], $sheetData[$startRow]['D'], $sheetData[$startRow]['E'],
                    $sheetData[$startRow]['F'], $sheetData[$startRow]['G'], $sheetData[$startRow]['H'],
                    $sheetData[$startRow]['I'], $sheetData[$startRow]['J'], $sheetData[$startRow]['K']
                    );
            }
            return $excelError;
        }
        
        public function readBab2_irj($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 15;
            $endRow = 16;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                // input pasien baru - Pasien Baru ID = 1
                $this->CI->m_u_bab2_2->inputIRJ($tahun, $noreg, 1,
                        $sheetData[$startRow]['C'], $sheetData[$startRow]['D'], $sheetData[$startRow]['E'],
                        $sheetData[$startRow]['F'], $sheetData[$startRow]['G'], $sheetData[$startRow]['H'],
                        $sheetData[$startRow]['I'], $sheetData[$startRow]['J'], $sheetData[$startRow]['K']
                        );

                //input pasien lama - Pasien Lama ID = 2
                $this->CI->m_u_bab2_2->inputIRJ($tahun, $noreg, 2,
                        $sheetData[$endRow]['C'], $sheetData[$endRow]['D'], $sheetData[$endRow]['E'],
                        $sheetData[$endRow]['F'], $sheetData[$endRow]['G'], $sheetData[$endRow]['H'],
                        $sheetData[$endRow]['I'], $sheetData[$endRow]['J'], $sheetData[$endRow]['K']
                        );
            }
            return $excelError;
        }
       
        public function readBab2_iri($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 21;
            $endRow = 38;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) {
                    $this->CI->m_u_bab2_2->inputIRI($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab2_efisiensi($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 44;
            $endRow = 53;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) {
                    //echo  $sheetData[$i]['C']. $sheetData[$i]['D'].  $sheetData[$i]['E']. $sheetData[$i]['F']. $sheetData[$i]['G'];
                    $this->CI->m_u_bab2_2->inputTingkatEfisiensi($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], -1);

                    $startID++;
                   // echo "<br />";
                }
            }
            return $excelError;
        }
 
        /* Not Used Function */
        
        public function readBab2_pelayanan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 5;
            $endRow = 87;
            $startColumn = 'A';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate2Col($sheetData, range(6, 8), 'D', 'E');
            $excelError_2 = $this->excel->validate2Col($sheetData, range(10, 10), 'D', 'E');
            $excelError_3 = $this->excel->validate2Col($sheetData, range(12, 15), 'D', 'E');
            $excelError_4 = $this->excel->validate2Col($sheetData, range(17, 21), 'D', 'E');
            $excelError_5 = $this->excel->validate2Col($sheetData, range(23, 34), 'D', 'E');
            $excelError_6 = $this->excel->validate2Col($sheetData, range(36, 42), 'D', 'E');
            $excelError_7 = $this->excel->validate2Col($sheetData, range(44, 56), 'D', 'E');
            $excelError_8 = $this->excel->validate2Col($sheetData, range(58, 59), 'D', 'E');
            $excelError_9 = $this->excel->validate2Col($sheetData, range(61, 66), 'D', 'E');
            $excelError_10 = $this->excel->validate2Col($sheetData, range(68, 78), 'D', 'E');
            $excelError_11 = $this->excel->validate($sheetData, range(6, 8), range('F', 'F'));
            $excelError_12 = $this->excel->validate($sheetData, range(10, 10), range('F', 'F'));
            $excelError_13 = $this->excel->validate($sheetData, range(12, 15), range('F', 'F'));
            $excelError_14 = $this->excel->validate($sheetData, range(17, 21), range('F', 'F'));
            $excelError_15 = $this->excel->validate($sheetData, range(23, 34), range('F', 'F'));
            $excelError_16 = $this->excel->validate($sheetData, range(36, 42), range('F', 'F'));
            $excelError_17 = $this->excel->validate($sheetData, range(44, 56), range('F', 'F'));
            $excelError_18 = $this->excel->validate($sheetData, range(58, 59), range('F', 'F'));
            $excelError_19 = $this->excel->validate($sheetData, range(61, 66), range('F', 'F'));
            $excelError_20 = $this->excel->validate($sheetData, range(68, 78), range('F', 'F'));
            
            
            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4, $excelError_5, 
                                    $excelError_6, $excelError_7, $excelError_8, $excelError_9, $excelError_10,
                                    $excelError_11, $excelError_12, $excelError_13, $excelError_14, $excelError_15, 
                                    $excelError_16, $excelError_17, $excelError_18, $excelError_19, $excelError_20);
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) {  
                    if(strtolower($sheetData[$i]['D']) == 'v') { // avoid null cell
                        $this->CI->m_bab2_2->inputPelayanan($tahun, $noreg, $startID, 1, $sheetData[$i]['F']);
                    }
                    else if(strtolower($sheetData[$i]['E']) == 'v'){
                        $this->CI->m_bab2_2->inputPelayanan($tahun, $noreg, $startID, 0, $sheetData[$i]['F']);
                    }
                    if($startID < 79) // Kategori Lainnya
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab2_peralatanCanggih($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 91;
            $endRow = 102;
            $startColumn = 'D';
            $endColumn = 'D';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0) {
                for($i = $startRow ; $i <= $endRow; $i++) { 
                     $this->CI->m_bab2_2->inputPeralatanCanggih($tahun, $noreg, $startID, $sheetData[$i]['D']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
}

/* End of file Bab2_reader.php */
/* Location: ./application/libraries/Bab2_reader.php */
