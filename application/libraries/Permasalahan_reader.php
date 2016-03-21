<?php 

class Permasalahan_reader{
    private $CI ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_analisa');
            $this->CI->load->model('m_bab');
        }
        //tahunId, rsNoreg, kategoriId, indikatorId, standar, numerator, denumerator, pencapaian
        
        public function readBab5_Permasalahan($filePath, $sheetIndex, $tahun, $noreg, $_startRow, $_endRow, $_startColumn, $_endColumn, $_kategoriID)
        {
            $startRow = $_startRow; $endRow = $_endRow;
            $startColumn = $_startColumn; $endColumn = $_endColumn;
            $startID = 1;
            $kategoriID = $_kategoriID;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($endColumn, $endColumn));
            
            $excelError = array_merge($excelError_1, $excelError_2);
            
            
            if(count($excelError) == 0)
            {
                $this->CI->m_analisa->deletePermasalahan($tahun, $noreg, $kategoriID);
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if(isset($sheetData[$i][$startColumn]))
                    {
                        $this->CI->m_analisa->inputPermasalahan($tahun, $noreg, $kategoriID,
                            $sheetData[$i][$startColumn], $sheetData[$i][$endColumn]
                            );
                    }
                }
            }
            
            return $excelError;
        }
        
        public function readBab5_PermasalahanAlt($filePath, $sheetIndex, $tahun, $noreg, $_startRow, $_endRow, $_startColumn, $_endColumn, $_altColumn, $_kategoriID)
        {
            $startRow = $_startRow; $endRow = $_endRow;
            $startColumn = $_startColumn; $endColumn = $_endColumn; $altColumn = $_altColumn;
            $startID = 1;
            $kategoriID = $_kategoriID;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $altColumn);
            
            $this->CI->m_analisa->deletePermasalahan($tahun, $noreg, $kategoriID);
            
            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            //$excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($endColumn, $endColumn));
            
            $excelError = array_merge($excelError_1);
            
            
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if(isset($sheetData[$i][$startColumn]))
                    {
                        if(isset($sheetData[$i][$endColumn]))
                        {
                            $this->CI->m_analisa->inputPermasalahan($tahun, $noreg, $kategoriID,
                            $sheetData[$i][$startColumn], $sheetData[$i][$endColumn]
                            );
                        }
                        else if(isset($sheetData[$i][$altColumn])) {
                            $this->CI->m_analisa->inputPermasalahan($tahun, $noreg, $kategoriID,
                            $sheetData[$i][$startColumn], $sheetData[$i][$altColumn]
                            );
                        }

                    }
                } 
            }
            return $excelError;
        }
        
        
}

?>