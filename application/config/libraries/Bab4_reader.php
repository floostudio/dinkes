<?php 

/**
 * Author Iqbal Permana
 */

class Bab4_reader{
    private $CI ;
    private $CHECKER_1;
    private $CHECKER_2;
    private $CHECKER_3;
    private $CHECKER_4;
    private $CHECKER_5;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_bab4');
            $this->CI->load->helper('array');
            
            $this->CHECKER_1 = array(
                "KINERJA KEUANGAN RUMAH SAKIT",
                "IV.1 Perkembangan Pertumbuhan Pendapatan (Sales Growth Rate)",
            );
            
            $this->CHECKER_2 = array(
                "IV. 2  Laporan dan Perkembangan Cost Revovery",
                "Pendapatan (Revenue)",
                "Cost Recovery (%)",
            );
            
            $this->CHECKER_3 = array(
                "IV. 3  Rasio Keuangan",
                "Current Ratio",
                "Cash Ratio",
                "Debt To Equity Ratio"
            );
            
            $this->CHECKER_4 = array(
                "IV.4  Analisa Rasio Keuangan",
                "Current Ratio",
                "Return on Invesment",
                "Debt to Equity Ratio"
            );
            
            $this->CHECKER_5 = array(
                "IV.5 Sumber Anggaran, Penggunaan dan Realisasi",
                "APBD 1",
                "APBN",
                "Lainnya"
            );
        }
        
        public function cekSheet1($filePath) {
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['2']['A']) != trim($this->CHECKER_1[0])){ return false; }
            else if(trim($sheetData['4']['A']) !=  trim($this->CHECKER_1[1])){ return false; }
            else { return true; }
        }
        
        public function cekSheet2($filePath) {
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER_2[0])){ return false; }
            else if(trim($sheetData['4']['B']) !=  trim($this->CHECKER_2[1])){ return false; }
            else if(trim($sheetData['6']['B']) !=  trim($this->CHECKER_2[2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet3($filePath) {
            $sheetData = $this->readExcel($filePath, 2);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER_3[0])){ return false; }
            else if(trim($sheetData['5']['B']) !=  trim($this->CHECKER_3[1])){ return false; }
            else if(trim($sheetData['7']['B']) !=  trim($this->CHECKER_3[2])){ return false; }
            else if(trim($sheetData['10']['B']) !=  trim($this->CHECKER_3[3])){ return false; }
            else { return true; }
        }
        
        public function cekSheet4($filePath) {
            $sheetData = $this->readExcel($filePath, 3);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER_4[0])){ return false; }
            else if(trim($sheetData['6']['B']) !=  trim($this->CHECKER_4[1])){ return false; }
            else if(trim($sheetData['9']['B']) !=  trim($this->CHECKER_4[2])){ return false; }
            else if(trim($sheetData['11']['B']) !=  trim($this->CHECKER_4[3])){ return false; }
            else { return true; }
        }
        
        public function cekSheet5($filePath) {
            $sheetData = $this->readExcel($filePath, 4);
            if(trim($sheetData['1']['A']) != trim($this->CHECKER_5[0])){ return false; }
            else if(trim($sheetData['4']['C']) !=  trim($this->CHECKER_5[1])){ return false; }
            else if(trim($sheetData['4']['I']) !=  trim($this->CHECKER_5[2])){ return false; }
            else if(trim($sheetData['4']['R']) !=  trim($this->CHECKER_5[3])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readBab4_sgr($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 7;
            $endRow = 9;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, 'E'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            if(count($excelError) == 0)
            {//tahunId, rsNoreg, sgrTahun, sgrTahunIni, sgrTahunLalu, sgrPerbandingan, sgr
                // n-2
                $this->CI->m_u_bab4->inputSGR($tahun, $noreg, 1,
                        $sheetData[$startRow]['C'], $sheetData[$startRow]['D'], $sheetData[$startRow]['E'], $sheetData[$startRow]['G']
                        );
                //n-1
                $this->CI->m_u_bab4->inputSGR($tahun, $noreg, 2,
                        $sheetData[$startRow+1]['C'], $sheetData[$startRow+1]['D'], $sheetData[$startRow+1]['E'], $sheetData[$startRow+1]['G']
                        );
                // n
                $this->CI->m_u_bab4->inputSGR($tahun, $noreg, 3,
                        $sheetData[$startRow+2]['C'], $sheetData[$startRow+2]['D'], $sheetData[$startRow+2]['E'], $sheetData[$startRow+2]['G']
                        );
            }
            return $excelError;
        }
        
        public function readBab4_costRecovery($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow       = 4;
            $endRow         = 6;
            $startColumn    = 'D';
            $endColumn      = 'G';
            $startID        = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, 'E'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            if(count($excelError) == 0)
            {
                // tahun, no registrasi, cost recovery id, n-2, n-1, n
                // row pendapatan
                $this->CI->m_u_bab4->inputCostRecovery($tahun, $noreg, 1,
                        $sheetData[4]['D'], $sheetData[4]['E'], $sheetData[4]['G']
                        );
                // row belanja
                $this->CI->m_u_bab4->inputCostRecovery($tahun, $noreg, 2,
                        $sheetData[5]['D'], $sheetData[5]['E'], $sheetData[5]['G']
                        );
                // row cost recovery
                $this->CI->m_u_bab4->inputCostRecovery($tahun, $noreg, 3,
                        $sheetData[6]['D'], $sheetData[6]['E'], $sheetData[6]['G']
                        );
            }
            return $excelError;
            
        }
       
        public function readBab4_rasioKeuangan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 10;
            $startColumn = 'D';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, 'E'));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'G'));
//            
//            $excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                    // tahun, no reg, rasio keuangan kategori,  n-2, n-1, n
                    $this->CI->m_u_bab4->inputRasioKeuangan($tahun, $noreg, $startID, 
                                    $sheetData[$i]['D'], $sheetData[$i]['E'], $sheetData[$i]['G']);
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab4_analisisRasioKeuangan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 11;
            $startColumn = 'C';
            $endColumn = 'D';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
//            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($endColumn, $endColumn));
//            
//            $excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                 //   tahunId, rsNoreg, $in_rkId, $in_trend, $in_kesimpulan
                    $this->CI->m_u_bab4->inputAnalisaRasioKeuangan($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D']);
                    $startID++;
                }
            }
            return $excelError;
        }
       
        public function readBab4_sbAnggaran($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 6;
            $startColumn = 'C';
            $endColumn = 'T';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
            $this->CI->m_u_bab4->inputSBAnggaran($tahun, $noreg, 
                    $sheetData[$startRow]['C'], $sheetData[$startRow]['D'], $sheetData[$startRow]['E'],
                    $sheetData[$startRow]['F'], $sheetData[$startRow]['G'], $sheetData[$startRow]['H'],
                    $sheetData[$startRow]['I'], $sheetData[$startRow]['J'], $sheetData[$startRow]['K'],
                    $sheetData[$startRow]['L'], $sheetData[$startRow]['M'], $sheetData[$startRow]['N'],
                    $sheetData[$startRow]['O'], $sheetData[$startRow]['P'], $sheetData[$startRow]['Q'],
                    $sheetData[$startRow]['R'], $sheetData[$startRow]['S'], $sheetData[$startRow]['T']
                    );
            }
            return $excelError;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */