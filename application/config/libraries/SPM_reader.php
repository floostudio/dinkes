<?php 

/**
 * 
 * Author Iqbal Permana
 * 
 */

class SPM_reader{
    private $CI ;
    private $CHECKER;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_analisa');
            $this->CI->load->helper('array');
            
            $this->CHECKER = array(
                "1. Pencapaian Standar Pelayanan Minimal Instalasi Gawat Darurat",
                "11. Pencapaian Standar Pelayanan Minimal (SPM) Pelayanan Gizi",
                "Kegiatan pencatatan dan pelaporan infeksi nosokomial/HAI (health care associated infections) di rumah sakit (minimum satu parameter)"
            );
        }
        
        public function cekSheet1($filePath){
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER[0])){ return false; }
            else if(trim($sheetData['119']['A']) !=  trim($this->CHECKER[1])){ return false; }
            else if(trim($sheetData['193']['B']) !=  trim($this->CHECKER[2])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readBab5_1_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 4;
            $endRow = 12;
            $startColumn = 'F';
            $endColumn = 'J'; 
            $startID = 1;
            $kategoriID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('H', $endColumn));
            //$excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
            
            //$excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                            $sheetData[$i]['F'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab5_2_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 18;
            $endRow = 25;
            $startColumn = 'F';
            $endColumn = 'J';
            $startID = 18;
            $kategoriID = 2;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('H', $endColumn));
            //$excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
            
            //$excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                            $sheetData[$i]['F'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_3_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 31;
            $endRow = 47;
            $startColumn = 'D';
            $endColumn = 'K';
            $startID = 26;
            $kategoriID = 3;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, 40), range('D', 'D'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, 40), range('F', 'F'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, 40), range('H', 'H'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, 40), range('K', 'K'));
//            
//            $excelError_5 = $this->excel->validate($sheetData, range(42, $endRow), range('D', 'D'));
//            $excelError_6 = $this->excel->validate($sheetData, range(42, $endRow), range('F', 'F'));
//            $excelError_7 = $this->excel->validate($sheetData, range(42, $endRow), range('H', 'H'));
//            $excelError_8 = $this->excel->validate($sheetData, range(42, $endRow), range('K', 'K'));
//            
            //$excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4,
//                                        $excelError_5, $excelError_6, $excelError_7, $excelError_8);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    if($i != 125)
                    {
                        $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['D'], $sheetData[$i]['F'],
                                $sheetData[$i]['H'], $sheetData[$i]['K']
                                );
                        $startID++;
                    }
                }
            }
            return $excelError;
            
        }
        
        //SKIP SEMENTARA
        public function readBab5_4_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 53;
            $endRow = 57;
            $startColumn = 'K';
            $endColumn = 'Q';
            $startID = 42;
            $kategoriID = 4;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('K', 'K'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('L', 'L'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('N', 'N'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('P', 'P'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0){
                for($i=$startRow;$i<=$endRow;$i++){
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['K'], $sheetData[$i]['L'],
                                $sheetData[$i]['N'], $sheetData[$i]['P']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_5_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 65;
            $endRow = 76;
            $startColumn = 'C';
            $endColumn = 'J';
            $startID = 49;
            $kategoriID = 5;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('J', 'J'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['E'],
                                $sheetData[$i]['G'], $sheetData[$i]['J']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_6_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 81;
            $endRow = 82;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 58;
            $kategoriID = 6;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            //$excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
                
        public function readBab5_7_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 88;
            $endRow = 91;
            $startColumn = 'C';
            $endColumn = 'J';
            $startID = 60;
            $kategoriID = 7;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('I', 'I'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['E'],
                                $sheetData[$i]['G'], $sheetData[$i]['I']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
                
        public function readBab5_8_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 96;
            $endRow = 99;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 64;
            $kategoriID = 8;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'F'));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_9_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 104;
            $endRow = 106;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 68;
            $kategoriID = 9;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            //$excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        //SKIP SEMENTARA
        public function readBab5_10_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 34;
            $endRow = 38;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 71;
            $kategoriID = 10;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('H', 'H'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['F'], $sheetData[$i]['H']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_11_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 121;
            $endRow = 123;
            $startColumn = 'D';
            $endColumn = 'H';
            $startID = 76;
            $kategoriID = 11;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'G'));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['D'], $sheetData[$i]['E'],
                                $sheetData[$i]['F'], $sheetData[$i]['G']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_12_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 128;
            $endRow = 129;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 79;
            $kategoriID = 12;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['G']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_13_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 81;
            $endRow = 81;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 81;
            $kategoriID = 13;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('H', 'H'));
//            
            //$excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['F'], $sheetData[$i]['H']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_14_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 139;
            $endRow = 142;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 82;
            $kategoriID = 14;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_15_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 147;
            $endRow = 148;
            $startColumn = 'E';
            $endColumn = 'M';
            $startID = 86;
            $kategoriID = 15;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('J', 'J'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('M', 'M'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['E'], $sheetData[$i]['G'],
                                $sheetData[$i]['J'], $sheetData[$i]['M']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_16_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 153;
            $endRow = 161;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 88;
            $kategoriID = 16;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_17_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 166;
            $endRow = 168;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 97;
            $kategoriID = 17;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_18_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 173;
            $endRow = 173;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 100;
            $kategoriID = 18;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_19_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 178;
            $endRow = 180;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 101;
            $kategoriID = 19;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_20_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 185;
            $endRow = 186;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 104;
            $kategoriID = 20;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_21_SPM($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 191;
            $endRow = 193;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 106;
            $kategoriID = 21;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('C', 'C'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
//            $excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('E', 'E'));
//            $excelError_4 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_u_analisa->inputSPM($tahun, $noreg, $kategoriID, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D'],
                                $sheetData[$i]['E'], $sheetData[$i]['F']
                                );
                        $startID++;
                }
            }
            return $excelError;
        }
        
        
}

?>