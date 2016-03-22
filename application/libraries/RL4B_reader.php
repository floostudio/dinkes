<?php 

/**
 * 
 * Author Iqbal Permana
 */

class RL4B_reader{
    private $CI ;
    private $CHECKER_1 ;
    private $CHECKER_2 ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_rl4');
            $this->CI->load->helper('array');
            
            
            $this->CHECKER_1 = array (
                "001",
                "058.9",
                "131",
                "298",
            );
            $this->CHECKER_2 = array(
                "299.0",
                "304.9",
                "Sebab luar lainnya"
            );
        }
        
        
        public function cekSheet1($filePath) {
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['8']['B']) != trim($this->CHECKER_1[0])){ return false; }
            else if(trim($sheetData['95']['B']) !=  trim($this->CHECKER_1[1])){ return false; }
            else if(trim($sheetData['228']['B']) !=  trim($this->CHECKER_1[2])){ return false; }
            else if(trim($sheetData['514']['B']) !=  trim($this->CHECKER_1[3])){ return false; }
            else { return true; }
        }
        public function cekSheet2($filePath) {
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['7']['B']) != trim($this->CHECKER_2[0])){ return false; }
            else if(trim($sheetData['21']['B']) !=  trim($this->CHECKER_2[1])){ return false; }
            else if(trim($sheetData['36']['D']) !=  trim($this->CHECKER_2[2])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readRL4B($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 8;
            $endRow = 514;
            $startColumn = 'E';
            $endColumn = 'Z';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            for($i=$startRow; $i<=$endRow; $i++) {
                $this->CI->m_u_rl4->inputRL4B($tahun, $noreg, $startID, $sheetData[$i]);
                
                $startID++;
            }
            return true;
        }
        
        public function readRL4BSebab($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 36;
            $startColumn = 'E';
            $endColumn = 'Z';
            $startID = 508;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            for($i=$startRow; $i<=$endRow; $i++) {
                $this->CI->m_u_rl4->inputRL4B($tahun, $noreg, $startID, $sheetData[$i]);
                
                $startID++;
            }
            return true;
        }
        
        
}