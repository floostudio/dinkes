<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 
 * Author Iqbal Permana
 * 
 */


class ExcelReader {
    function __construct(){
            $this->CI =& get_instance();
            $this->CI->load->library('excel');
            $this->CI->load->helper('excelreaderfilter_helper');
            $this->CI->load->model('m_validasi');
	}
        
        public function validate($sheetData, $rows, $columns){
            $index = 0;
            //$array = [];
            $array = array();
			
            foreach($rows as $i) {
                foreach($columns as $j) {
                    if(!isset($sheetData[$i][$j])) {
                        $array[$index] = $i.$j;
                        $index++;
                    }
                }
            }
            return $array;
        }
        
        public function validate2Col($sheetData, $rows, $firstColumn, $secondColumn) { 
            $index = 0;
	    //$array = [];
            $array = array();
			
            foreach($rows as $i) {
                if(!isset($sheetData[$i][$firstColumn]) && !isset($sheetData[$i][$secondColumn])) {
                    $array[$index] = $i.$firstColumn;
                    $array[$index+1] = $i.$secondColumn;
                    $index = $index + 2;
                }
            }
            return $array;
        }
        
        public function validate3Col($sheetData, $rows, $firstColumn, $secondColumn, $thirdColumn) { 
            $index = 0; 
	    $array = array();

            foreach($rows as $i) {
                if(!isset($sheetData[$i][$firstColumn]) && !isset($sheetData[$i][$secondColumn]) 
                        && !isset($sheetData[$i][$thirdColumn])) {
                    $array[$index] = $i.$firstColumn;
                    $array[$index+1] = $i.$secondColumn;
                    $array[$index+2] = $i.$thirdColumn;
                    $index = $index + 3;
                }
            }
            return $array;
        }
        
        public function validateICD10($sheetData, $rows, $firstColumn) {
            $index = 0; 
	    $array = array();
            $limit = 1; $offset = 0;
            foreach($rows  as $i) {
                if(isset($sheetData[$i][$firstColumn])) {
                    $query = $this->CI->m_validasi->cekICD10($sheetData[$i][$firstColumn]);
                    if($query->num_rows() == 0) {
                        $array[$index] = $i.$firstColumn;
                        $index = $index + 1;
                    }
                }
            }
            return $array;
        }
        
        public function validateUnitID($sheetData, $rows, $firstColumn) {
            $index = 0; 
	    $array = array(); 
			
            $limit = 1; $offset = 0;
            
            foreach($rows  as $i) {
                if(!empty($sheetData[$i][$firstColumn])) {
                    $query = $this->CI->m_validasi->cekUnitID($sheetData[$i][$firstColumn]);
                    if($query->num_rows() == 0) {
                        $array[$index] = $i.$firstColumn;
                        $index = $index + 1;
                    }
                }
            }
            return $array;
        }
        
        public function readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn) {
            $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
            $cacheSettings = array( ' memoryCacheSize ' => '20MB');
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

            $inputFileType  = PHPExcel_IOFactory::identify($filePath);
            $objReader      = PHPExcel_IOFactory::createReader($inputFileType);

            $filterSubset   = new ExcelReaderFilter_helper($startRow, $endRow, range($startColumn, $endColumn));
            $objReader->setReadDataOnly(true);
            $objReader->setReadFilter($filterSubset);
            $objExcel       = $objReader->load($filePath);

            $objExcel->setActiveSheetIndex($sheetIndex);
            $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
            return $sheetData;

        }
        
        public function validateExcel($filePath, $sheetIndex) {
            $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
            $cacheSettings = array( ' memoryCacheSize ' => '20MB');
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

            $inputFileType  = PHPExcel_IOFactory::identify($filePath);
            $objReader      = PHPExcel_IOFactory::createReader($inputFileType);

            $filterSubset   = new ExcelReaderFilter_helper('1', '600', range('A', 'Z'));
            $objReader->setReadDataOnly(true);
            $objReader->setReadFilter($filterSubset);
            $objExcel       = $objReader->load($filePath);

            $objExcel->setActiveSheetIndex($sheetIndex);
            $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
            return $sheetData;
        }
        
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */