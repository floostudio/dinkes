<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ExcelReader extends CI_Controller {
    function __construct(){
                parent::__construct();		
                $this->load->library('excel');
                $this->load->helper('excelreaderfilter_helper');
	}
        
        public function tes()
        {
            echo 'es';
        }
        
        public function readExcel($filePath, $sheetIndex, $startRow, $endRow, $startColumn, $endColumn)
        {
            
            echo("tes 3");
            $inputFileType  = PHPExcel_IOFactory::identify($filePath);
            $objReader      = PHPExcel_IOFactory::createReader($inputFileType);

            $filterSubset   = new ExcelReaderFilter_helper($startRow, $endRow, range($startColumn, $endColumn));

            $objReader->setReadFilter($filterSubset);

            $objExcel       = $objReader->load($filePath);

            $objExcel->setActiveSheetIndex($sheetIndex);
            $sheetData = $objExcel->getActiveSheet()->toArray(null,true,true,true);
            return $sheetData;

            /*foreach ($sheetData as $data) {
                    echo $data['A'] . '<br />';
            }*/
        }
        
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */