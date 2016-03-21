<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 
 * Author iqbal Permana 
 * 
 */


class validasi extends CI_Controller {
    function __construct(){
                parent::__construct();
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('form', 'url'));
                    $this->user_id 	= $this->session->userdata('user_id');
                    $this->user_name 	= $this->session->userdata('user_name');
                    $this->load->model('m_tahun');
                    $this->load->model('m_validasi');
                    $this->load->model('m_bab');
                    $this->load->model('m_rumahsakit');
                    $this->load->library('word');
	}
	
	public function index() {   
            $tahun = $this->input->post('tahun');
            if($this->user_id) {
                $data = $this->validasiPage($tahun);
                $data['link'] = '';
                $this->load->view('validasi_admin', $data);
            }
            else {
                    redirect("login");
            }             
	}
        
        public function rumahsakit() {
            $tahun = "5";  /* Tahun 2014 */ 
            $data = $this->validasiPage($tahun);
            $data['link'] = 'rumahsakit';
            
            $this->load->view('validasi_user', $data);
        }
        
        public function validasiPage($tahun){
            if($tahun) {
                $tahunNow = $this->m_tahun->retrieveYearName($tahun);
                $data['tahunSelected'] = $tahunNow->first_row()->TAHUN_TAHUN;
            }
            else {
                $data['tahunSelected'] = "";
            }
            $data['tahunNow'] = $tahun;
            $data['rumahsakit'] = $this->m_rumahsakit->retrieveRS();
            $data['history']    = $this->m_validasi->getHistoryUpload($tahun);
            $data['tahun']      = $this->m_tahun->retrieveYear();
            $data['validasi']   = $this->m_validasi->retrieveData($tahun);
            $data['uploadDetail'] = $this->m_bab->cekHistoryUpload(1, 2, $tahun);
            return $data;
        }
        
        public function getReport($rsNoreg, $tahun) {
            $report = $this->m_validasi->getReport($rsNoreg, $tahun);
            $section = $this->word->createSection();
            $rsName = $report->first_row()->rs_nama;
            $year = $report->first_row()->tahun_tahun;
            // Add title styles
            $this->word->addTitleStyle(1, array('size'=>20, 'color'=>'333333', 'bold'=>true));
            $this->word->addTitleStyle(2, array('size'=>16, 'color'=>'666666'));
            $this->word->addTitleStyle(2, array('size'=>14, 'color'=>'333333'));

            $section->addTitle('Rumah Sakit : '.$rsName, 1);  
            $section->addTitle('Tahun ' . $year , 2);
            $section->addTextBreak(1);
            $section->addTitle('Daftar Error Excel : ', 2);
            foreach($report->result() as $p) {
                if($p->error_detail != 1) {
                    $section->addText($p->bab_name.' - Sheet '.$p->sheet_no);
                    if($p->error_detail != 0){
                        $section->addText($p->error_detail, array('name'=>'Verdana', 'color'=>'006699'));
                    }
                }
            }
            $filename = $rsName.'_'.$year.'.docx' ; //save our document as this file name
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            
            $objWriter = PHPWord_IOFactory::createWriter($this->word, 'Word2007');
            $objWriter->save('php://output');
        }       
}

/* End of file validasi.php */
/* Location: ./application/controller/validasi.php */
