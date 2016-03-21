<?php 

class Analisa_reader{
    private $CI ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_analisa');
            $this->CI->load->model('m_bab');
        }
        //tahunId, rsNoreg, kategoriId, indikatorId, standar, numerator, denumerator, pencapaian
        
        public function readBab_Analisa($filePath, $sheetIndex, $tahun, $noreg, $_startRow, $_endRow, $_startColumn, $_endColumn, $_kategoriID)
        {
            $startRow = $_startRow; $endRow = $_endRow;
            $startColumn = $_startColumn; $endColumn = $_endColumn;
            $kategoriID = $_kategoriID;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            
            //$this->CI->m_analisa->deleteAnalisa($tahun, $noreg, $kategoriID);
            
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if(isset($sheetData[$i][$startColumn]))
                    {
                        $this->CI->m_analisa->inputAnalisa($tahun, $noreg, $kategoriID,
                            $sheetData[$i][$startColumn]
                            );
                    }
                }
            }
            
            return $excelError;
        }
        
        public function readBab_Perbaikan($filePath, $sheetIndex, $tahun, $noreg, $_startRow, $_endRow, $_startColumn, $_endColumn, $_kategoriID)
        {
            $startRow = $_startRow; $endRow = $_endRow;
            $startColumn = $_startColumn; $endColumn = $_endColumn;
            $kategoriID = $_kategoriID;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            
            //$this->CI->m_analisa->deleteAnalisa($tahun, $noreg, $kategoriID);
            
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if(isset($sheetData[$i][$startColumn]))
                    {
                        $this->CI->m_analisa->inputAnalisa($tahun, $noreg, $kategoriID,
                            $sheetData[$i][$startColumn]
                            );
                    }
                }
            }
            
            return $excelError;
        }
        
        
        
}

?>