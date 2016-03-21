<?php 

class Bab5_reader_3{
    private $CI ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('m_bab5_3');
            $this->CI->load->model('m_bab');
        }
        
        
        public function showTableError($_sheetIndex, $_excelError)
        {
                echo '<table>';
                echo '<tr>';
                echo '<th>Sheet : '.($_sheetIndex).'</th>';
                echo '</tr>';
                echo '</table>';
                echo '<tr>';
                echo '<td>';
                foreach($_excelError as $data) 
                    { echo $data." | " ; }  
                echo '</td>';
                echo '</tr>';
                echo '</table>';
        }
        
        
        public function readBab5_14_PelayananMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 7;
            $endRow = 22;
            $startColumn = 'C';
            $endColumn = 'O';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'pelayanan_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_3->inputPelayananMaskin($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K'],
                            $sheetData[$i]['L'], $sheetData[$i]['M'], $sheetData[$i]['N'],
                            $sheetData[$i]['O']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab5_14_SurveyMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 25;
            $endRow = 33;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $kondisi = 0;
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'kelengkapan_survey_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    if(strtolower($sheetData[$i]['C']) == 'y')
                    {
                       $kondisi = 1;
                    }
                    else{
                        $kondisi = 0;
                    }
                     $this->CI->m_bab5_3->inputSurveyMaskin($tahun, $noreg, $startID,
                           $kondisi
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab5_14_KelolaMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 38;
            $endRow = 43;
            $startColumn = 'C';
            $endColumn = 'C';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'kelengkapan_kelola_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    if(strtolower($sheetData[$i]['C']) == 'y')
                    {
                       $kondisi = 1;
                    }
                    else{
                        $kondisi = 0;
                    }
                     $this->CI->m_bab5_3->inputKelolaMaskin($tahun, $noreg, $startID,
                           $kondisi
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab5_14_KeluhanMaskinPetugas($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 50;
            $endRow = 56;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'keluhan_maskin_petugas');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_3->inputKeluhanMaskinPetugas($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab5_14_PersentaseKeluhan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 61;
            $endRow = 66;
            $startColumn = 'E';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'persentase_keluhan_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_3->inputPersentaseKeluhan($tahun, $noreg, $startID,
                            $sheetData[$i]['E'], $sheetData[$i]['F'], $sheetData[$i]['G']
                            );
                    $startID++;
                }
            } 
            return $excelError;
            
        }
        
        public function readBab5_14_MekanismePengaduan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 74;
            $endRow = 78;
            $startColumn = 'C';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'mekanisme_pengaduan_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    $this->CI->m_bab5_3->inputMekanismePengaduan($tahun, $noreg, $startID,
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['H']
                            );
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function getKondisiKeluhan($input)
        {
            if(strtolower($input)=='sangat puas')
            {
                $kondisi = 1;
            }
            else if(strtolower($input)=='puas'){
                $kondisi = 2;
            }
            else if(strtolower($input)=='kurang puas'){
                $kondisi = 3;
            }
            else if(strtolower($input)=='tidak puas'){
                $kondisi = 4;
            }
            else {
                $kondisi = 5;
            }
                
                return $kondisi;
        }
        
        public function readBab5_14_SurveyKeluhan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 85;
            $endRow = 90;
            $startColumn = 'C';
            $endColumn = 'L';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError1 = $this->excel->validate($sheetData, range(85, 85), range('D', 'D'));
            $excelError2 = $this->excel->validate($sheetData, range(85, 85), range('K', 'K'));
            $excelError3 = $this->excel->validate($sheetData, range(86, 86), range('C', 'C'));
            $excelError4 = $this->excel->validate($sheetData, range(87, 87), range('D', 'D'));
            $excelError5 = $this->excel->validate($sheetData, range(87, 87), range('K', 'K'));
            $excelError6 = $this->excel->validate($sheetData, range(88, 88), range('C', 'C'));
            $excelError7 = $this->excel->validate($sheetData, range(89, 89), range('D', 'D'));
            $excelError8 = $this->excel->validate($sheetData, range(89, 89), range('K', 'K'));
            $excelError9 = $this->excel->validate($sheetData, range(90, 90), range('C', 'C'));
            
            $kondisi[0] = $this->getKondisiKeluhan($sheetData[85]['E']);
            $kondisi[1] = $this->getKondisiKeluhan($sheetData[87]['E']);
            $kondisi[2] = $this->getKondisiKeluhan($sheetData[89]['E']);
            //$excelError10 = [];
			$excelError10 = array();
            
            for($i=0;$i<=2 ;$i++)
            {
                if($kondisi[$i] == 5)
                {
                    $excelError10[$i] = (85 + ($i*2)).'E'; 
                }
            }
            
            $excelError = array_merge($excelError1, $excelError2, $excelError3,
                                        $excelError4, $excelError5, $excelError6,
                                        $excelError7, $excelError8, $excelError9, $excelError10);
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'hasil_survey_maskin');
                
                $this->CI->m_bab5_3->inputSurveyKeluhan($tahun, $noreg, $startID,
                            $sheetData[85]['D'], $kondisi[0], $sheetData[85]['K'], $sheetData[86]['C'] 
                            );
                    $startID = 6;
                $this->CI->m_bab5_3->inputSurveyKeluhan($tahun, $noreg, $startID,
                            $sheetData[87]['D'], $kondisi[1], $sheetData[87]['K'], $sheetData[88]['C'] 
                            );
                    $startID = 11;
                $this->CI->m_bab5_3->inputSurveyKeluhan($tahun, $noreg, $startID,
                            $sheetData[89]['D'], $kondisi[2], $sheetData[89]['K'], $sheetData[90]['C'] 
                            );
            }
            return $excelError;
            
        }
        
        public function readBab5_14_PerbaikanMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 96;
            $endRow = 105;
            $startColumn = 'B';
            $endColumn = 'H';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $startColumn));
            //$excelError = [];
			$excelError = array();
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'upaya_perbaikan_maskin');
                for($i=$startRow;$i<=$endRow;$i++)
                {
                    if(isset($sheetData[$i]['B']))
                    {
                        $this->CI->m_bab5_3->inputPerbaikanMaskin($tahun, $noreg,
                                $sheetData[$i]['B']
                                );
                    }
                }
            }
            return $excelError;
        }
        
        public function readBab5_14_PenyakitTerbanyakRJMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 111;
            $endRow = 146;
            $startColumn = 'B';
            $endColumn = 'G';
            $startID = 1;
            
            $startRow_1 = 111; $endRow_1 = 120;
            $startRow_2 = 124; $endRow_2 = 133;
            $startRow_3 = 137; $endRow_3 = 146;
            
            $firstColumn = 'B'; $secondColumn = 'D'; $thirdColumn = 'F';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError1 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($firstColumn, $firstColumn));
            $excelError2 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($secondColumn, $secondColumn));
            $excelError3 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($thirdColumn, $thirdColumn));
            
            $excelError4 = $this->excel->validateICD10($sheetData, range($startRow_1, $endRow_1), $firstColumn);
            $excelError5 = $this->excel->validateICD10($sheetData, range($startRow_2, $endRow_2), $firstColumn);
            $excelError6 = $this->excel->validateICD10($sheetData, range($startRow_3, $endRow_3), $firstColumn);
            
            $excelError = array_merge($excelError1, $excelError2, $excelError3,
                                    $excelError4, $excelError5, $excelError6
                    );
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'penyakit_terbanyak_maskin_rj');
                $index = 111;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRJMaskin($tahun, $noreg, 1,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
                $index = 124;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRJMaskin($tahun, $noreg, 2,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
                $index = 137;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRJMaskin($tahun, $noreg, 3,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_14_PenyakitTerbanyakRIMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 151;
            $endRow = 186;
            $startColumn = 'B';
            $endColumn = 'G';
            $startID = 1;
            
            $startRow_1 = 151; $endRow_1 = 160;
            $startRow_2 = 164; $endRow_2 = 173;
            $startRow_3 = 177; $endRow_3 = 186;
            
            $firstColumn = 'B'; $secondColumn = 'D'; $thirdColumn = 'F';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError1 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($firstColumn, $firstColumn));
            $excelError2 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($secondColumn, $secondColumn));
            $excelError3 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($thirdColumn, $thirdColumn));
            $excelError4 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($firstColumn, $firstColumn));
            $excelError5 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($secondColumn, $secondColumn));
            $excelError6 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($thirdColumn, $thirdColumn));
            $excelError7 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($firstColumn, $firstColumn));
            $excelError8 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($secondColumn, $secondColumn));
            $excelError9 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($thirdColumn, $thirdColumn));
            
            $excelError10 = $this->excel->validateICD10($sheetData, range($startRow_1, $endRow_1), $firstColumn);
            $excelError11 = $this->excel->validateICD10($sheetData, range($startRow_2, $endRow_2), $firstColumn);
            $excelError12 = $this->excel->validateICD10($sheetData, range($startRow_3, $endRow_3), $firstColumn);
            
            $excelError = array_merge($excelError1, $excelError2, $excelError3,
                                        $excelError4, $excelError5, $excelError6,
                                        $excelError7, $excelError8, $excelError9,
                                        $excelError10, $excelError11, $excelError12);
           
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'penyakit_terbanyak_maskin_ri');
                $index = 151;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRIMaskin($tahun, $noreg, 1,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
                $index = 164;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRIMaskin($tahun, $noreg, 2,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
                $index = 177;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputPenyakitTerbanyakRIMaskin($tahun, $noreg, 3,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D'], $sheetData[$i+$index]['F']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab5_14_TindakanTerbanyakMaskin($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 193;
            $endRow = 229;
            $startColumn = 'B';
            $endColumn = 'E';
            $startID = 1;
            
            $startRow_1 = 193; $endRow_1 = 202;
            $startRow_2 = 206; $endRow_2 = 215;
            $startRow_3 = 220; $endRow_3 = 229;
            
            $firstColumn = 'B'; $secondColumn = 'D';
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError1 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($firstColumn, $firstColumn));
            $excelError2 = $this->excel->validate($sheetData, range($startRow_1, $endRow_1), range($secondColumn, $secondColumn));
            $excelError3 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($firstColumn, $firstColumn));
            $excelError4 = $this->excel->validate($sheetData, range($startRow_2, $endRow_2), range($secondColumn, $secondColumn));
            $excelError5 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($firstColumn, $firstColumn));
            $excelError6 = $this->excel->validate($sheetData, range($startRow_3, $endRow_3), range($secondColumn, $secondColumn));
             
            $excelError = array_merge($excelError1, $excelError2, $excelError3,
                                       $excelError4, $excelError5, $excelError6 );
            
            if(count($excelError) == 0)
            {
                //$this->CI->m_bab->deleteTable($tahun, $noreg, 'tindakan_terbanyak_maskin');
                $index = 193;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputTindakanTerbanyakMaskin($tahun, $noreg, 1,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D']
                            );
                    $startID++;
                }
                $index = 206;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputTindakanTerbanyakMaskin($tahun, $noreg, 2,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D']
                            );
                    $startID++;
                }
                $index = 220;
                for($i=0;$i<=9;$i++)
                {
                    $this->CI->m_bab5_3->inputTindakanTerbanyakMaskin($tahun, $noreg, 3,
                            $sheetData[$i+$index]['B'], $sheetData[$i+$index]['D']
                            );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */