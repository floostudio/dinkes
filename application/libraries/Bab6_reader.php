<?php 

/*
 * 
 * Author Iqbal Permana
 */

class Bab6_reader{
    private $CI ;
    private $CHECKER;
    
    function __construct(){
            $this->CI =& get_instance();

            $this->CI->load->library('ExcelReader');
            $this->CI->load->model('upload/m_u_bab6');
            $this->CI->load->helper('array');
            
            // Checker Sheet VI.I SPM
            $this->CHECKER[0] = array(
                "Gawat Darurat",
                "Pencegahan dan Pengendalian Infeksi"
            );
            
            // Checker VI.2 Survei Kepuasan Masyarakat
            $this->CHECKER[1] = array(
                "VI.2.3  Survei Kepuasan Masyarakat",
                "Prosedur",
                "JUMLAH"
            );
            
            // Checker Sheet VI.3.a Penemuan Pasien TB
            $this->CHECKER[2] = array(
                "Pasien Baru",
                "Pasien Pengobatan Ulang",
                "Total Keseluruhan (L+P)"
            );
            
            // Checker Sheet VI.3.b Kegiatan Klinik HIV
            $this->CHECKER[3] = array(
                "VI.3.b.1. Hasil Kegiatan Klinik VCT dan CST",
                "VI.3.b.2. Penderita HIV/AIDS rawat inap berdasarkan golongan umur",
                "Jumlah"
            );
            
            //Checker sheet VI.3.c Penurunan AKI KB
            $this->CHECKER[4] = array(
                "VI.3.c.1 Kematian Maternal",
                "VI.3.c.2  Sebab Kematian Ibu", 
                "Jumlah"
            );
        }
        
        public function cekSheet1($filePath){
            $sheetData = $this->readExcel($filePath, 0);
            if(trim($sheetData['8']['B']) != trim($this->CHECKER[0][0])){ return false; }
            else if(trim($sheetData['28']['B']) !=  trim($this->CHECKER[0][1])){ return false; }
            else { return true; }
        }
        
        public function cekSheet2($filePath){
            $sheetData = $this->readExcel($filePath, 1);
            if(trim($sheetData['1']['B']) != trim($this->CHECKER[1][0])){ return false; }
            else if(trim($sheetData['5']['C']) !=  trim($this->CHECKER[1][1])){ return false; }
            else if(trim($sheetData['13']['C']) !=  trim($this->CHECKER[1][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet3($filePath){
            $sheetData = $this->readExcel($filePath, 2);
            if(trim($sheetData['7']['A']) != trim($this->CHECKER[2][0])){ return false; }
            else if(trim($sheetData['13']['A']) !=  trim($this->CHECKER[2][1])){ return false; }
            else if(trim($sheetData['22']['A']) !=  trim($this->CHECKER[2][2])){ return false; }
            else { return true; }
        }
        
        public function cekSheet4($filePath){
            $sheetData = $this->readExcel($filePath, 3);
            if(trim($sheetData['3']['A']) != trim($this->CHECKER[3][0])){ return false; }
            else if(trim($sheetData['16']['A']) !=  trim($this->CHECKER[3][1])){ return false; }
            else if(trim($sheetData['25']['B']) !=  trim($this->CHECKER[3][2])){ return false; }
            else { return true; }
        }
         
        public function cekSheet5($filePath){
            $sheetData = $this->readExcel($filePath, 4);
            if(trim($sheetData['3']['A']) != trim($this->CHECKER[4][0])){ return false; }
            else if(trim($sheetData['11']['A']) !=  trim($this->CHECKER[4][1])){ return false; }
            else if(trim($sheetData['31']['B']) !=  trim($this->CHECKER[4][2])){ return false; }
            else { return true; }
        }
        
        private function readExcel($filePath, $sheetIndex){
            $this->excel = new ExcelReader();
            $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
            return $resultData;
        }
        
        public function readBab6_1_SpmRs($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 8;
            $endRow = 28;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                   // spmId, tahunId, rsNoreg, memenuhi, indikator, pencapaian
                    $this->CI->m_u_bab6->inputSpmRs($startID, $tahun, $noreg,  
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_2_SurveyRs($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 4;
            $endRow = 12;
            $startColumn = 'D';
            $endColumn = 'F';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                  // unitId, tahunId, rsNoreg, nilai
                    $this->CI->m_u_bab6->inputSurveyRs($startID, $tahun, $noreg,  
                                    $sheetData[$i]['D'], $sheetData[$i]['E'], $sheetData[$i]['F']);
                    $startID++;
                }
            }
            return $excelError;
            
        }
        
        public function readBab6_3_LaptahTB($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 7;
            $endRow = 18;
            $startColumn = 'B';
            $endColumn = 'T';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError_1 = $this->excel->validate($sheetData, range($startRow, 10), range($startColumn, $endColumn));
            //$excelError_2 = $this->excel->validate($sheetData, range(14, $endRow), range($startColumn, $endColumn));
            
            //$excelError = array_merge($excelError_1, $excelError_2);
            $excelError = null;
            
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= 10; $i++)
                {
                  // in_tahunId, in_rsNoreg, in_tipe, 
                //in_anak04L, in_anak04P, in_anak514L, in_anak514P,
                //in_dewasa1524L, in_dewasa1524P, in_dewasa2334L, in_dewasa2334P, 
                //in_dewasa3544L, in_dewasa3544P, in_dewasa4554L, in_dewasa4554P, 
                //in_dewasa5565L, in_dewasa5565P, in_dewasa65L, in_dewasa65P, 
                //in_totalL, in_totalP, in_total
                           $this->CI->m_u_bab6->inputLaptahTB($tahun, $noreg, $startID, 
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'], $sheetData[$i]['I'], 
                            $sheetData[$i]['J'], $sheetData[$i]['K'], $sheetData[$i]['L'], $sheetData[$i]['M'],
                            $sheetData[$i]['N'], $sheetData[$i]['O'], $sheetData[$i]['P'], $sheetData[$i]['Q'], 
                            $sheetData[$i]['R'], $sheetData[$i]['S'], $sheetData[$i]['T']
                    );
                    $startID++;
                }


                for($i = 13 ; $i <= $endRow; $i++)
                {
                  // in_tahunId, in_rsNoreg, in_tipe, 
                //in_anak04L, in_anak04P, in_anak514L, in_anak514P,
                //in_dewasa1524L, in_dewasa1524P, in_dewasa2334L, in_dewasa2334P, 
                //in_dewasa3544L, in_dewasa3544P, in_dewasa4554L, in_dewasa4554P, 
                //in_dewasa5565L, in_dewasa5565P, in_dewasa65L, in_dewasa65P, 
                //in_totalL, in_totalP, in_total
                           $this->CI->m_u_bab6->inputLaptahTB($tahun, $noreg, $startID, 
                            $sheetData[$i]['B'], $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'], $sheetData[$i]['I'], 
                            $sheetData[$i]['J'], $sheetData[$i]['K'], $sheetData[$i]['L'], $sheetData[$i]['M'],
                            $sheetData[$i]['N'], $sheetData[$i]['O'], $sheetData[$i]['P'], $sheetData[$i]['Q'], 
                            $sheetData[$i]['R'], $sheetData[$i]['S'], $sheetData[$i]['T']
                    );
                    $startID++;
                }        
            }
            return $excelError;
        }       
        
        public function readBab6_3_KlinikVCT($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 6;
            $endRow   = 12;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                    // tahunId, rsNoreg, umur, vctJumlah, vctNegatif, vctPositif, cstJumlah, cstArv
                        $this->CI->m_u_bab6->inputKlinikVCT($tahun, $noreg, $startID, 
                                $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                                $sheetData[$i]['F'], $sheetData[$i]['G']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_HIV($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 18;
            $endRow = 24;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                    //$in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n
                    $this->CI->m_u_bab6->inputHIV($tahun, $noreg, $startID, 
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_KematianIbu($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 8;
            $endRow = 8;
            $startColumn = 'A';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                   // in_tahunId, in_rsNoreg, in_hamilRujukan, 
                   // in_hamilDtgSendiri, in_bersalinRujukan, in_bersalinDtgSendiri, 
                   // in_nifasRSlain, in_nifasRS, in_total
                           $this->CI->m_u_bab6->inputKematianIbu($tahun, $noreg, $startID, 
                            $sheetData[$i]['A'], $sheetData[$i]['B'], $sheetData[$i]['C'], 
                            $sheetData[$i]['D'], $sheetData[$i]['E'], $sheetData[$i]['F'],
                            $sheetData[$i]['G']
                    );
                    $startID++;
                }
            
            return $excelError;
        }
        
        public function readBab6_3_SebabKematianIbu($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 13;
            $endRow = 21;
            $startColumn = 'E';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                   //in_tahunId, in_rsNoreg, in_skId, in_jumlah
                           $this->CI->m_u_bab6->inputSebabKematianIbu($tahun, $noreg, $startID, 
                            $sheetData[$i][$startColumn]
                    );
                    $startID++;
                }
            return $excelError;
        }
        
        public function readBab6_3_KematianIbuPersalinan($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 27;
            $endRow = 30;
            $startColumn = 'D';
            $endColumn = 'H';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range('D', 'D'));
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range('F', $endColumn));
            
            $excelError = null;
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                   //in_tahunId, in_rsNoreg, in_tribulan, 
                   //in_total, in_pendarahan, in_eklampsia, in_sepsis
                           $this->CI->m_u_bab6->inputKematianIbuPersalinan($tahun, $noreg, $startID, 
                            $sheetData[$i]['D'], $sheetData[$i]['F'],
                            $sheetData[$i]['G'], $sheetData[$i]['H']
                    );
                    $startID++;
                }
            return $excelError;
        }
        
/*
* -----------------------------------------------------------------------------------------------------------------------------------------------
* -----------------------------------------------------------------------------------------------------------------------------------------------
* -----------------------------------------------------------------------------------------------------------------------------------------------
*/
        
        // Unused Function
        public function readBab6_3_DBD($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 8;
            $startColumn = 'C';
            $endColumn = 'G';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                    //tahunId, rsNoreg, diagnosisId, dewasaL, dewasaP, anakL, anakP, total
                    $this->CI->m_bab6_3->inputDBD($tahun, $noreg, $startID, 
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_DBDBaruPulang($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 17;
            $endRow = 19;
            $startColumn = 'C';
            $endColumn = 'K';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
           
            $excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                    // Parameter
                 //   in_tahunId, in_rsNoreg, in_diagnosis, in_mrsDewasa, 
                //      in_mrsAnak, in_dewasaMDB24, in_dewasaMDA24, 
                //      in_dewasaSembuh, in_anakMDB24, in_anakMDA24, 
                //      in_anakSembuh, in_total
                    $this->CI->m_bab6_3->inputDBDBaruPulang($tahun, $noreg, $startID, 
                            $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E'], 
                            $sheetData[$i]['F'], $sheetData[$i]['G'], $sheetData[$i]['H'],
                            $sheetData[$i]['I'], $sheetData[$i]['J'], $sheetData[$i]['K']
                    );
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_KasusTBrj($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 6;
            $endRow = 12;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                  //tahunId, rsNoreg, umur, n2, n1, n
                    $this->CI->m_u_bab6->inputKasusTBrj($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_KasusTBrjJenis($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 18;
            $endRow = 27;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                  //tahunId, rsNoreg, umur, n2, n1, n
                    $this->CI->m_u_bab6->inputKasusTBrjJenis($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_KasusTBri($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 32;
            $endRow = 38;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                  //tahunId, rsNoreg, umur, n2, n1, n
                    $this->CI->m_u_bab6->inputKasusTBri($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_3_KasusTBriJenis($filePath, $sheetIndex, $tahun, $noreg)
        {
            $startRow = 49;
            $endRow = 58;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
            //$excelError = $this->excel->validate($sheetData, range($startRow, $endRow), range($startColumn, $endColumn));
            $excelError = null;
            if(count($excelError) == 0)
            {
                for($i = $startRow ; $i <= $endRow; $i++)
                {
                  //tahunId, rsNoreg, umur, n2, n1, n
                    $this->CI->m_u_bab6->inputKasusTBriJenis($tahun, $noreg, $startID, 
                                    $sheetData[$i]['C'], $sheetData[$i]['D'], $sheetData[$i]['E']);
                    $startID++;
                }
            }
            return $excelError;
        }
        
        public function readBab6_4_MDGS($filePath, $sheetIndex, $tahun, $noreg) {
            $startRow = 8;
            $endRow = 100;
            $startColumn = 'C';
            $endColumn = 'E';
            $startID = 1;
            
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
//            $excelError_1 = $this->excel->validate2Col($sheetData, range(8, 12), 'C', 'D'); //4.1
//            $excelError_2 = $this->excel->validate($sheetData, range(16, 16), range('C', 'C')); //4.2
//            $excelError_3 = $this->excel->validate3Col($sheetData, range(23, 24), 'C', 'D', 'E'); //5.1
//            $excelError_4 = $this->excel->validate($sheetData, range(28, 30), range('C', 'C')); //5.2
//            $excelError_5 = $this->excel->validate2Col($sheetData, range(62, 62), 'C', 'D'); //5.3
//            $excelError_6 = $this->excel->validate2Col($sheetData, range(70, 91), 'C', 'D'); //6.1
//            $excelError_7 = $this->excel->validate($sheetData, range(95, 100), range('C', 'C')); //6.2
//            $excelError_8 = $this->excel->validate($sheetData, range(48, 57), range('C', 'C')); //Neonatal
//            $excelError_9 = $this->excel->validate($sheetData, range(35, 44), range('C', 'C')); //Maternal
//            
//            $excelError = array_merge($excelError_1, $excelError_2, $excelError_3,
//                                        $excelError_4, $excelError_5, $excelError_6, 
//                                        $excelError_7, $excelError_8, $excelError_9);
//            
            $excelError = null;
            if(count($excelError) == 0)
            {
                // insert MDGS 4.1
                for($i = $startRow ; $i <= 12; $i++)
                {
                           if(strtolower($sheetData[$i]['C']) == 'v')
                           {
                                $this->CI->m_u_bab6->inputMDGS41($tahun, $noreg, $startID, 1);
                           }
                           else if(strtolower($sheetData[$i]['D'] == 'v')){
                                $this->CI->m_u_bab6->inputMDGS41($tahun, $noreg, $startID, 0);
                           }
                           else {
                               $this->CI->m_u_bab6->inputMDGS41($tahun, $noreg, $startID, null);
                           }
                    $startID++;
                }
            
                // insert MDGS 4.2
                $this->CI->m_u_bab6->inputMDGS42($tahun, $noreg, $startID, $sheetData[16]['C']);
                $startID++;
            
                // insert MDGS 5.1
                if(strtolower($sheetData[23]['C']=='v')){
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 0);
                } elseif(strtolower($sheetData[23]['D']=='v')){
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 1);
                } elseif(strtolower($sheetData[23]['E']=='v')) {
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 2);
                } else {
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, null);
                }
                
                $startID++; 
                
                // insert MDGS 5.1
                if(strtolower($sheetData[24]['C']=='v')){
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 0);
                } elseif(strtolower($sheetData[24]['D']=='v')){
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 1);
                } elseif(strtolower($sheetData[24]['E']=='v')) {
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, 2);
                } else {
                    $this->CI->m_u_bab6->inputMDGS51($tahun, $noreg, $startID, null);
                }
                $startID++; 
            
                // insert MDGS 5.2
                $this->CI->m_u_bab6->inputMDGS52($tahun, $noreg, $startID, $sheetData[28]['C']);$startID++; 
                $this->CI->m_u_bab6->inputMDGS52($tahun, $noreg, $startID, $sheetData[29]['C']);$startID++; 
                $this->CI->m_u_bab6->inputMDGS52($tahun, $noreg, $startID, $sheetData[30]['C']);$startID++; 

                // insert MDGS 5.3
                if(strtolower($sheetData[62]['C'])=='v'){
                    $this->CI->m_u_bab6->inputMDGS53($tahun, $noreg, $startID, 1);$startID++; 
                } else if(strtolower($sheetData[62]['D'])=='v') {
                    $this->CI->m_u_bab6->inputMDGS53($tahun, $noreg, $startID, 0);$startID++; 
                } else {
                    $this->CI->m_u_bab6->inputMDGS53($tahun, $noreg, $startID, null);$startID++;
                }
            
                //insert MDGS 6.1
                for($i = 70 ; $i <= 91; $i++) {
                    if(strtolower($sheetData[$i]['C']) == 'v'){
                        $this->CI->m_u_bab6->inputMDGS61($tahun, $noreg, $startID, 1);
                    } else if(strtolower($sheetData[$i]['D'])=='v') {
                        $this->CI->m_u_bab6->inputMDGS61($tahun, $noreg, $startID, 0);
                    } else {
                        $this->CI->m_u_bab6->inputMDGS61($tahun, $noreg, $startID, null);
                    }
                    $startID++;
                }

                //insert MDGS 6.2
                for($i = 95 ; $i <= 100; $i++)
                {
                    $this->CI->m_u_bab6->inputMDGS62($tahun, $noreg, $startID, $sheetData[$i]['C']);$startID++;
                }

                //insert Nenonatal Esensial
                $startID = 1;
                for($i = 48 ; $i <= 57; $i++)
                {
                    $this->CI->m_u_bab6->inputNeonatalEsensial($tahun, $noreg, $startID, $sheetData[$i]['C']);$startID++;
                }
            
                //insert Maternal Esensial
                $startID = 1;
                for($i = 35 ; $i <= 44; $i++)
                {
                    $this->CI->m_u_bab6->inputMaternalEsensial($tahun, $noreg, $startID, $sheetData[$i]['C']);$startID++;
                }
            }
            return $excelError;
        }
        
}
