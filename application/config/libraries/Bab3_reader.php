<?php 

/**
 * 
 * Author Iqbal Permana
 */

class Bab3_reader{
    private $CI ;
    private $CHECKER_1 ;
    private $CHECKER_2 ;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_bab3');
            $this->CI->load->helper('array');
            
            $this->CHECKER_1 = array(
                "Tenaga Medik Dasar",
                "Tenaga Medik Spesialis Dasar",
                "Tenaga Medik Spesialis Lain",
                "Tenaga Non Medis &Lainnya",
                "Total Keseluruhan"
            );
            
            $this->CHECKER_2 = array (
                "III.2.a Pelatihan Tenaga IGD",
                "Dokter Spesialis",
                "Dokter Spesialis Anak",
                "Total Jumlah Petugas (terlatih+tidak) OK",
            );
        }
        
        public function cekSheet1($filePath) {
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['6']['B']) != trim($this->CHECKER_1[0])){ return false; }
            else if(trim($sheetData['9']['B']) !=  trim($this->CHECKER_1[1])){ return false; }
            else if(trim($sheetData['44']['B']) !=  trim($this->CHECKER_1[2])){ return false; }
            else if(trim($sheetData['87']['B']) !=  trim($this->CHECKER_1[3])){ return false; }
            else if(trim($sheetData['91']['B']) !=  trim($this->CHECKER_1[4])){ return false; }
            else { return true; }
        }
        
        public function cekSheet2($filePath) {
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['4']['B']) != trim($this->CHECKER_2[0])){ return false; }
            else if(trim($sheetData['7']['I']) !=  trim($this->CHECKER_2[1])){ return false; }
            else if(trim($sheetData['46']['I']) !=  trim($this->CHECKER_2[2])){ return false; }
            else if(trim($sheetData['60']['D']) !=  trim($this->CHECKER_2[3])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readBab3_Ketenagaan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 90;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            $skipRow = array(9, 13, 14, 15, 16, 26, 32, 37, 38, 44, 57, 58, 66, 86, 87);
            $newRow = array(13, 14, 15, 16, 26, 32, 37, 57, 86);
            $idRow = array(73, 74, 75, 76, 77, 78, 79, 80, 81);
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            
            for($i=$startRow; $i<=$endRow; $i++)
            {
                if($startID==33) { $startID = 35; } // Skip Sub Spesialis Intervensi Dan Sub Spesialis Rehab
                if(!in_array($i, $skipRow)) {
                    
                    $this->CI->m_u_bab3->inputKetenagaan($tahun, $noreg, $startID, 
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'] );
                    $startID++;
                }
            }
            
            for($j=0;$j<count($newRow);$j++) {
                $this->CI->m_u_bab3->inputKetenagaan($tahun, $noreg, $idRow[$j], 
                            $sheetData[$newRow[$j]]['C'], $sheetData[$newRow[$j]]['D'], $sheetData[$newRow[$j]]['E'] );
            }
              
        }
        
        public function readBab3_PelatihanSDM($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 60;
            $startColumn = 'E';
            $endColumn = 'K';
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError_1 = $this->excel->validate($sheetData, range($startRow, $endRow), range('B', 'E'));
           // $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('G', 'J'));
            //$excelError_3 = $this->excel->validate($sheetData, range($startRow, $endRow), range('L', 'O'));
            //$excelError_4 = $this->excel->validateUnitID($sheetData, range($startRow, $endRow), 'D');
            //$excelError_5 = $this->excel->validateUnitID($sheetData, range($startRow, $endRow), 'I');
            $excelError = array();
            
            $this->readIGD($sheetData, $tahun, $noreg);
            $this->readICU($sheetData, $tahun, $noreg);
            $this->readOK($sheetData, $tahun, $noreg);
            $this->readVK($sheetData, $tahun, $noreg);
            $this->readNICU($sheetData, $tahun, $noreg);
            
            return $excelError;
            
        }
        
        /*
         * LIST PELATIHAN JENIS TENAGA ID   | LIST PELATIHAN URAIAN ID
         * 
         *   1	Dokter Spesialis            | 1. PPGD
         *   2	Dokter Umum                 | 2. ACLS
         *   3	Dokter Spesialis Anastesi   | 3. ATLS
         *   4	Dokter Spesialis Obgyn      | 4. GELS
         *   5	Dokter Spesialis Anak       | 5. Lain-lain
         *   6	Perawat dan Bidan           | 6. Jumlah Petugas terlatih
         *   7	Perawat                     | 7. Total Jumlah Petugas (terlatih+tidak)
         *   8	Perawat Anastesi            | 8. PONEK
         *   9	Bidan                       | 9. Neonatal Life Support
         * 
         */
        private function readIGD($sheetData, $tahun, $noreg) {
            // Read IGD
            $IGD = 2;
            $uraian1 = 1;
            for($i=14; $i<=20; $i++) { // Read Dokter Umum
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $IGD, 2, $uraian1 , $sheetData[$i]['E']);
                    $uraian1++;
                }
            }
            $uraian2 = 1;
            for($i=21; $i<=27; $i++) { // Read Perawat dan Bidan
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $IGD, 6, $uraian2 , $sheetData[$i]['E']);
                    $uraian2++;
                }
            }
        }
        
        private function readICU($sheetData, $tahun, $noreg) {
            // READ ICU
            $ICU = 1;
            $uraian = 1;
            for($i=7; $i<=13; $i++) { // Read Dokter Spesialis
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $ICU, 1, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
            $uraian = 1;
            for($i=14; $i<=20; $i++) { // Read Dokter Umum
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $ICU, 2, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
            $uraian = 1;
            for($i=21; $i<=27; $i++) { // Read Perawat
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $ICU, 7, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
        }
        
        private function readOK($sheetData, $tahun, $noreg) {
            // READ OK
            $OK = 3;
            $uraian = 1;
            for($i=33; $i<=39; $i++) { // Read Dokter Spesialis
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $OK, 1, $uraian , $sheetData[$i]['E']);
                    $uraian++;
                }
            }
            for($i=40; $i<=46; $i++) { // Read Dokter Spesialis Anastesi
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $OK, 3, $uraian , $sheetData[$i]['E']);
                    $uraian++;
                }
            }
            for($i=47; $i<=53; $i++) { // Read Perawat
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $OK, 7, $uraian , $sheetData[$i]['E']);
                    $uraian++;
                }
            }
            for($i=54; $i<=60; $i++) { // Read Perawat Anastesi
                if(isset($sheetData[$i]['E'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $OK, 8, $uraian , $sheetData[$i]['E']);
                    $uraian++;
                }
            }
            
        }
        
        private function readVK($sheetData, $tahun, $noreg) {
            // READ VK
            $VK = 4;
            $uraian = 5;
            $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $VK, 4, 8, $sheetData[33]['K']); // 8 -> PONEK
            for($i=34; $i<=36; $i++) { // Read Dokter Spesialis Obgyn
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $VK, 4, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
            
            $uraian = 5;
            $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $VK, 9, 8, $sheetData[37]['K']); // 8 -> PONEK
            for($i=38; $i<=40; $i++) { // Read Bidan
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $VK, 9, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
            
            
        }
        
        private function readNICU($sheetData, $tahun, $noreg) {
            // READ NICU
            $NICU = 5;
            $uraian = 5;
            $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $NICU, 5, 8, $sheetData[46]['K']); // 8 -> PONEK
            for($i=47; $i<=49; $i++) { // Read Dokter Spesialis Obgyn
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $NICU, 5, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
            $uraian = 5;
            $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $NICU, 6, 9, $sheetData[50]['K']); // 9 -> NEONATAL LIFE SUPPORT
            for($i=51; $i<=53; $i++) { // Read Dokter Spesialis Obgyn
                if(isset($sheetData[$i]['K'])) {
                    $this->CI->m_u_bab3->inputPelatihanSDM($tahun, $noreg, $NICU, 6, $uraian , $sheetData[$i]['K']);
                    $uraian++;
                }
            }
        }
        
        
        
        
        
        /* Not Used Function*/
        
        public function readBab3_KebutuhanTenaga($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 6;
            $endRow = 8;
            $startColumn = 'C';
            $endColumn = 'D';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    $this->CI->m_u_bab3->inputKebutuhanTenaga($tahun, $noreg, $startID,
                                $sheetData[$i]['C'], $sheetData[$i]['D']
                        );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        
        public function readBab3_AnalisaKetenagaan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 3;
            $endRow = 4;
            $startColumn = 'B';
            $endColumn = 'B';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                $this->CI->m_sdm->inputAnalisaKetenagaan($tahun, $noreg,
                            $sheetData[3]['B'], $sheetData[4]['B']
                    );
            }
            return $excelError;
        }
        
        public function readBab3_Sarana($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 9;
            $endRow = 47;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate3Col($sheetData, range($startRow, $endRow), 'C', 'D', 'E');
            $excelError_2 = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', 'F'));
            
            $excelError = array_merge($excelError_1, $excelError_2);
            
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if(strtolower($sheetData[$i]['C'])=='v')
                    {
                        $this->CI->m_sarpras->inputSarpras($tahun, $noreg, $startID, 0, $sheetData[$i]['F']);
                    } elseif(strtolower($sheetData[$i]['D'])=='v')
                    {
                        $this->CI->m_sarpras->inputSarpras($tahun, $noreg, $startID, 1, $sheetData[$i]['F']);
                    } else {
                        $this->CI->m_sarpras->inputSarpras($tahun, $noreg, $startID, 2, $sheetData[$i]['F']);
                    }
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab3_Peralatan($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 5;
            $endRow = 74;
            $startColumn = 'C';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate3Col($sheetData, range($startRow, 10), 'C', 'D', 'E');
            $excelError_2 = $this->excel->validate3Col($sheetData, range(12, 14), 'C', 'D', 'E');
            $excelError_3 = $this->excel->validate3Col($sheetData, range(16, 18), 'C', 'D', 'E');
            $excelError_4 = $this->excel->validate3Col($sheetData, range(20, 22), 'C', 'D', 'E');
            $excelError_5 = $this->excel->validate3Col($sheetData, range(29, 32), 'C', 'D', 'E');
            $excelError_6 = $this->excel->validate3Col($sheetData, range(34, 37), 'C', 'D', 'E');
            $excelError_7 = $this->excel->validate3Col($sheetData, range(39, 41), 'C', 'D', 'E');
            $excelError_8 = $this->excel->validate3Col($sheetData, range(43, 44), 'C', 'D', 'E');
            $excelError_9 = $this->excel->validate3Col($sheetData, range(46, 48), 'C', 'D', 'E');
            $excelError_10 = $this->excel->validate3Col($sheetData, range(50, 52), 'C', 'D', 'E');
            $excelError_11 = $this->excel->validate3Col($sheetData, range(54, $endRow), 'C', 'D', 'E');
            
            $excelError_12 = $this->excel->validate($sheetData, range($startRow, 10), range('F', 'F'));
            $excelError_13 = $this->excel->validate($sheetData, range(12, 14), range('F', 'F'));
            $excelError_14 = $this->excel->validate($sheetData, range(16, 18), range('F', 'F'));
            $excelError_15 = $this->excel->validate($sheetData, range(20, 22), range('F', 'F'));
            $excelError_16 = $this->excel->validate($sheetData, range(29, 32), range('F', 'F'));
            $excelError_17 = $this->excel->validate($sheetData, range(34, 37), range('F', 'F'));
            $excelError_18 = $this->excel->validate($sheetData, range(39, 41), range('F', 'F'));
            $excelError_19 = $this->excel->validate($sheetData, range(43, 44), range('F', 'F'));
            $excelError_20 = $this->excel->validate($sheetData, range(46, 48), range('F', 'F'));
            $excelError_21 = $this->excel->validate($sheetData, range(50, 52), range('F', 'F'));
            $excelError_22 = $this->excel->validate($sheetData, range(54, $endRow), range('F', 'F'));
            
            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4, $excelError_5
                                    , $excelError_6, $excelError_7, $excelError_8, $excelError_9, $excelError_10
                                    , $excelError_11, $excelError_12, $excelError_13, $excelError_14, $excelError_15
                                    , $excelError_16, $excelError_17, $excelError_18, $excelError_19, $excelError_20
                                    , $excelError_21, $excelError_22);
            
            if(count($excelError) == 0)
            {
                for($i=$startRow; $i<=$endRow; $i++)
                {
                    if($i!=11 && $i!= 15 && $i!=19 
                            && $i!=23 && $i!=28 && $i!=33
                            && $i!=38 && $i!=42 && $i!=45
                            && $i!=49 && $i!=53)
                    {
                        if(strtolower($sheetData[$i]['C'])=='v')
                        {
                            $kondisiStandar = 1;
                        }
                        else { $kondisiStandar = 0; }
                        
                        if(strtolower($sheetData[$i]['D'])=='v')
                        {
                            $kondisiTakStandar = 1;
                        }
                        else { $kondisiTakStandar = 0; }
                        
                        if(strtolower($sheetData[$i]['E'])=='v')
                        {
                            $kondisiTakAda = 1;
                        }
                        else { $kondisiTakAda = 0; }
                        
                        $this->CI->m_sarpras->inputPeralatan($tahun, $noreg, $startID, $kondisiStandar, $kondisiTakStandar, $kondisiTakAda, $sheetData[$i]['F']);
                        
                        $startID++;
                    }
                }
            }
            return $excelError;
        }
        
        public function readBab3_AnalisaSarpras($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 4;
            $endRow = 30;
            $startColumn = 'B';
            $endColumn = 'D';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError_1 = $this->excel->validate($sheetData, range(4, 5), range('B', 'B'));
            $excelError_2 = $this->excel->validate($sheetData, range(15, 16), range('B', 'B'));
            $excelError_3 = $this->excel->validate($sheetData, range(18, 19), range('B', 'B'));
            $excelError_4 = $this->excel->validate($sheetData, range(29, 30), range('B', 'B'));
            
            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3, $excelError_4);
            
            if(count($excelError) == 0)
            {
                $this->CI->m_sarpras->inputKelengkapanPeralatan($tahun, $noreg,
                        $sheetData[4]['B'], $sheetData[5]['B'],
                        $sheetData[15]['B'], $sheetData[16]['B'],
                        $sheetData[18]['B'], $sheetData[19]['B'],
                        $sheetData[29]['B'], $sheetData[30]['B']

                );
            }
            return $excelError;
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */