<?php 

class Bab5_reader_4{
    private $CI ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_bab5_3');
            $this->CI->load->model('m_bab5_4');
            $this->CI->load->model('m_bab');
        }
                
        // tes
        public function readBab5_16_Sanitasi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 10;
            $startColumn = 'H';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
              //  $this->CI->m_bab->deleteTable($tahun, $noreg, 'kegiatan_sanitasi');
                
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_bab5_4->inputSanitasi($tahun, $noreg, $startID,
                        $sheetData[$i]['H']
                        );
                    $startID++;
                    
                }
            }
            return $excelError;
        }
         
        // tes
        public function readBab5_19_PemulasaranJenazah($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 9;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
            //    $this->CI->m_bab->deleteTable($tahun, $noreg, 'pemulasaraan_jenazah');
                
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_bab5_4->inputPemulasaranJenazah($tahun, $noreg, $startID,
                        $sheetData[$i]['C']
                        );
                    $startID++;
                }
            }
            return $excelError;
        }
         
        // tes
        public function readBab5_23_PelayananGigi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 4;
            $endRow = 24;
            $startColumn = 'F';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
            //    $this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_gigi');
            
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_bab5_4->inputPelayananGigi($tahun, $noreg, $startID,
                        $sheetData[$i]['F']
                        );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        // tes
        public function readBab5_24_Imunisasi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 12;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
             //   $this->CI->m_bab->deleteTable($tahun, $noreg, 'imunisasi');
                
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_bab5_4->inputImunisasi($tahun, $noreg, $startID,
                        $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                        $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'], 
                        $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K'] 
                        );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        // tes
        public function readBab5_25_KegiatanKesehatanJiwa($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 10;
            $startColumn = 'E';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
             //   $this->CI->m_bab->deleteTable($tahun, $noreg, 'kegiatan_kesehatan_jiwa');
            
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_bab5_4->inputKegiatanKesehatanJiwa($tahun, $noreg, $startID,
                        $sheetData[$i]['E']
                        );
                    $startID++;
                }
            }
            return $excelError;
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */