<?php 

class Bab2_reader_helper {
    private $CI;
    function __construct(){	
                $this->CI =& get_instance();
                $this->load->library('../controllers/reader/ExcelReader');
        }
        
        public function readBab2_2($filePath, $sheetIndex=0)
        {
            $this->excel = new ExcelReader();
            $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, 1, 5, 'A', 'A');
           
            echo("tes 2");
        }
        
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */