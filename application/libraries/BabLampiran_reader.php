<?php 

/**
 * Author Iqbal Permana
 * 
 */

class BabLampiran_reader{
    private $CI ;
    private $CHECKER;
    
    function __construct(){
        $this->CI =& get_instance();

        $this->CI->load->library('ExcelReader');
        $this->CI->load->model('m_lampiran');
        $this->CI->load->helper('array');
        $this->CHECKER[1] = array(
                "a.Jumlah Pasien HD Berdasarkan Cara Pembayaran Pasien Hemodialis",
                "b. Kunjungan Pasien Hemodialisis",
                "Lain-lain					",
            );
        $this->CHECKER[2] = array(
            "Peralatan Pelayanan Radiologi",
            "Peralatan Radiologi Lainnya",
            "Mesin Pemanas Masker",
            ); 
    }
    
    public function cekSheet1($filePath){
        $sheetData = $this->readExcel($filePath, 0);
        if(trim($sheetData['2']['A']) != trim($this->CHECKER[1][0])){ return false; }
        else if(trim($sheetData['12']['A']) !=  trim($this->CHECKER[1][1])){ return false; }
        else if(trim($sheetData['52']['B']) !=  trim($this->CHECKER[1][2])){ return false; }
        else { return true; }
    }

    public function cekSheet2($filePath){
        $sheetData = $this->readExcel($filePath, 1);
        if(trim($sheetData['1']['B']) != trim($this->CHECKER[2][0])){ return false; }
        else if(trim($sheetData['54']['B']) !=  trim($this->CHECKER[2][1])){ return false; }
        else if(trim($sheetData['85']['B']) !=  trim($this->CHECKER[2][2])){ return false; }
        else { return true; }
    }

    private function readExcel($filePath, $sheetIndex){
        $this->excel = new ExcelReader();
        $resultData =  $this->excel->validateExcel($filePath, $sheetIndex);
        return $resultData;
    }
        
    public function readPembayaranHemodialisis($filePath, $sheetIndex, $tahun, $noreg){
        $startRow = 7;
        $endRow = 9;
        $startColumn = 'C';
        $endColumn = 'T';
        $startID = 1;

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);

        // n-2
        $this->CI->m_lampiran->inputPembayaranHemodialisis($tahun, $noreg, 1,
                $sheetData[$startRow]['C'], $sheetData[$startRow]['D'], $sheetData[$startRow]['E'], 
                $sheetData[$startRow]['F'], $sheetData[$startRow]['G'], $sheetData[$startRow]['H'], 
                $sheetData[$startRow]['I'], $sheetData[$startRow]['J'], $sheetData[$startRow]['K'], 
                $sheetData[$startRow]['L'], $sheetData[$startRow]['M'], $sheetData[$startRow]['N'],
                $sheetData[$startRow]['O'], $sheetData[$startRow]['P'], $sheetData[$startRow]['Q'], 
                $sheetData[$startRow]['R'], $sheetData[$startRow]['S'], $sheetData[$startRow]['T']
                    );
        //n-1
        $this->CI->m_lampiran->inputPembayaranHemodialisis($tahun, $noreg, 2,
                $sheetData[$startRow+1]['C'], $sheetData[$startRow+1]['D'], $sheetData[$startRow+1]['E'], 
                $sheetData[$startRow+1]['F'], $sheetData[$startRow+1]['G'], $sheetData[$startRow+1]['H'], 
                $sheetData[$startRow+1]['I'], $sheetData[$startRow+1]['J'], $sheetData[$startRow+1]['K'], 
                $sheetData[$startRow+1]['L'], $sheetData[$startRow+1]['M'], $sheetData[$startRow+1]['N'],
                $sheetData[$startRow+1]['O'], $sheetData[$startRow+1]['P'], $sheetData[$startRow+1]['Q'], 
                $sheetData[$startRow+1]['R'], $sheetData[$startRow+1]['S'], $sheetData[$startRow+1]['T']
                );
        // n
        $this->CI->m_lampiran->inputPembayaranHemodialisis($tahun, $noreg, 3,
                $sheetData[$startRow+2]['C'], $sheetData[$startRow+2]['D'], $sheetData[$startRow+2]['E'], 
                $sheetData[$startRow+2]['F'], $sheetData[$startRow]['G'],   $sheetData[$startRow+2]['H'], 
                $sheetData[$startRow+2]['I'], $sheetData[$startRow+2]['J'], $sheetData[$startRow]['K'], 
                $sheetData[$startRow+2]['L'], $sheetData[$startRow+2]['M'], $sheetData[$startRow+2]['N'],
                $sheetData[$startRow]['O'],   $sheetData[$startRow+2]['P'], $sheetData[$startRow+2]['Q'], 
                $sheetData[$startRow+2]['R'], $sheetData[$startRow]['S'],   $sheetData[$startRow+2]['T']
                );
    }
        
    public function readKunjunganHemodialisis($filePath, $sheetIndex, $tahun, $noreg){
        $startRow = 16;
        $endRow = 18;
        $startColumn = 'B';
        $endColumn = 'G';
        $startID = 1;

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
        
        // n-2
        $this->CI->m_lampiran->inputKunjunganHemodialisis($tahun, $noreg, 1,
                $sheetData[$startRow]['B'], $sheetData[$startRow]['C'], $sheetData[$startRow]['D'],
                $sheetData[$startRow]['E'], $sheetData[$startRow]['F'], $sheetData[$startRow]['G']
                );
        //n-1
        $this->CI->m_lampiran->inputKunjunganHemodialisis($tahun, $noreg, 2,
                $sheetData[$startRow+1]['B'], $sheetData[$startRow+1]['C'], $sheetData[$startRow+1]['D'],
                $sheetData[$startRow+1]['E'], $sheetData[$startRow+2]['F'], $sheetData[$startRow+1]['G']
                );
        // n
        $this->CI->m_lampiran->inputKunjunganHemodialisis($tahun, $noreg, 3,
                $sheetData[$startRow+2]['B'], $sheetData[$startRow+2]['C'], $sheetData[$startRow+2]['D'],
                $sheetData[$startRow+2]['E'], $sheetData[$startRow+2]['F'], $sheetData[$startRow+2]['G']
                );
        
    }
        
    public function readSarprasHemodialisis($filePath, $sheetIndex, $tahun, $noreg){
        $startRow = 23;
        $endRow = 31;
        $startColumn = 'G';
        $endColumn = 'G';
        $startID = 1;

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
      
        for($i=$startRow; $i<=$endRow;$i++){
            if($i!=24){
                if(strtolower($sheetData[$i]['G'])=='y'){
                    $kondisi = 1;
                } else {
                    $kondisi = 0;
                }
                $this->CI->m_lampiran->inputSarprasHemodialisis($tahun, $noreg, $startID, $kondisi
                    );
                $startID++;
            }
        }
        
    }
        
    public function readPeralatanHemodialisis($filePath, $sheetIndex, $tahun, $noreg) {
        $startRow = 35;
        $endRow = 41;
        $startColumn = 'G';
        $endColumn = 'G';

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
        
        // n-2
        $this->CI->m_lampiran->inputPeralatanHemodialisis($tahun, $noreg, 1,
                $sheetData[$startRow]['G']
                );
        //n-1
        $this->CI->m_lampiran->inputPeralatanHemodialisis($tahun, $noreg, 2,
                $sheetData[$startRow+1]['G']
                );

        $startID = 3;
        for($i=$startRow+2;$i<=$endRow;$i++) {
            if(strtolower($sheetData[$i]['G'])=='y') {
                $kondisi = 1;
            }
            else {
                $kondisi = 0;
            }
            $this->CI->m_lampiran->inputPeralatanHemodialisis2($tahun, $noreg, $startID,
                $kondisi
                );
            $startID++;
        }
        
    }

    public function readTenagaMedikHemodialisis($filePath, $sheetIndex, $tahun, $noreg) {
        $startRow = 46;
        $endRow = 52;
        $startColumn = 'H';
        $endColumn = 'H';
        $startID = 1;

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);
        
        for($i=$startRow; $i<=$endRow; $i++) {
            $this->CI->m_lampiran->inputTenagaMedikHemodialisis($tahun, $noreg, $startID,
                $sheetData[$i]['H']
                );
            $startID++;
        }
        return $excelError;
    }

    public function readRadiologi($filePath, $sheetIndex, $tahun, $noreg) {
        $startRow = 6;
        $endRow = 85;
        $startColumn = 'C';
        $endColumn = 'G';
        $startID = 1;

        $this->excel = new ExcelReader();
        $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn);

        // Rumah Sakit kelas A dan sekitarnya
        for($i=6; $i<=24;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['C']);
            $startID++;
        }

        // Rumah Sakit kelas B dan sekitarnya
        for($i=6; $i<=21;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['G']);
            $startID++;
        }

        // Rumah Sakit kelas C dan sekitarnya
        for($i=31; $i<=40;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['C']);
            $startID++;
        }

        // Rumah Sakit kelas C dan sekitarnya
        for($i=31; $i<=38;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['G']);
            $startID++;
        }

        // Peralatan radiologi dan lainnya - part 1
        for($i=57; $i<=85;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['C']);
            $startID++;
        }

        // Peralatan radiologi dan lainnya - part 2
        for($i=57; $i<=69;$i++) {
            $this->CI->m_lampiran->inputPeralatanRadiologi($tahun, $noreg, $startID, $sheetData[$i]['G']);
            $startID++;
        }
    }
}

/* End of file BabLampiran_reader.php */
/* Location: ./application/libraries/BabLampiran_reader.php */