<?php 

class Bab2_reader extends CI_Controller {
    function __construct(){
                parent::__construct();		
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('form', 'url'));
                $this->user_id 		= $this->session->userdata('user_id');
                $this->user_name 	= $this->session->userdata('user_name');
                $this->load->library('../controllers/reader/ExcelReader');
        }
        
        public function readBab2_2($filePath, $sheetIndex=0)
        {
         //   $this->excel = new ExcelReader();
       //     $sheetData =  $this->excel->readExcel($filePath, $sheetIndex, 1, 5, 'A', 'A');
           
            echo("tes 2");
        }
        
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/upload.php */