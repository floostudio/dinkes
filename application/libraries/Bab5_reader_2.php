<?php 

class Bab5_reader_2{
    private $CI ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_bab5_2');
            $this->CI->load->model('m_bab');
        }
        
        
        
        // tes
        public function readBab5_6_KB($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 14;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_kegiatan_kb');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputKB($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }

        // tes
        public function readBab5_8_KunjunganRadiologi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 11;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'jumlah_kunjungan_radiologi');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputKunjunganRadiologi($tahun, $noreg, $startID,
                            $sheetData[$i]['C']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_9_LabPatologi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 7;
            $endRow = 8;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_lab_patologi');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputLabPatologi($tahun, $noreg, $startID,
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
        public function readBab5_9_LabToksikologi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 15;
            $endRow = 19;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_lab_toksikologi');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputLabToksikologi($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_9_LabTotal($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 26;
            $endRow = 28;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, 1, $endRow, $startColumn, 'K');
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_lab_total');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                   
                    $this->CI->m_bab5_2->inputLabTotal($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_10_RehabMedik($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 4;
            $endRow = 11;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 5;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'rehabilitasi_medik');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputRehabMedik($tahun, $noreg, $startID,
                            $sheetData[$i]['C']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_11_PelayananFarmasi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 9;
            $startColumn = 'C';
            $endColumn = 'I';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_farmasi');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputPelayananFarmasi($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'],
                            $sheetData[$i]['I']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_12_PelayananDiet($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 10;
            $startColumn = 'C';
            $endColumn = 'J';
            $startID = 1;
            
            $startCol_1 = 'C'; $endCol_1 = 'F';
            $startCol_2 = 'H'; $endCol_2 = 'J';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startCol_1, $endCol_1));
            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startCol_2, $endCol_2));
            
            $excelError = array_merge($excelError_1, $excelError_2);
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_diit');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputPelayananDiet($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['H'], $sheetData[$i]['I'],
                            $sheetData[$i]['J']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_12_KonsultasiGizi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 19;
            $endRow = 20;
            $startColumn = 'D';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range($endColumn, $endColumn));
            
            $excelError = array_merge($excelError_1, $excelError_2);
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'konsultasi_gizi');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputKonsultasiGizi($tahun, $noreg, $startID,
                            $sheetData[$i]['D'], $sheetData[$i]['F']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        // tes
        public function readBab5_13_KegiatanTransfusi($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 10;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'kegiatan_transfusi_darah');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputKegiatanTransfusi($tahun, $noreg, $startID,
                            $sheetData[$i]['C']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_13_PenggunaanDarah($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 16;
            $endRow = 20;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'penggunaan_darah');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputPenggunaanDarah($tahun, $noreg, $startID,
                            $sheetData[$i]['C']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        // tes
        public function readBab5_13_PenerimaanDarah($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 25;
            $endRow = 27;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError)==0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'penerimaan_darah');
                
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_2->inputPenerimaanDarah($tahun, $noreg, $startID,
                            $sheetData[$i]['C']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */