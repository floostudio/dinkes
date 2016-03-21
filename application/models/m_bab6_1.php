<?php

//TABEL BAB VI SHEET 1 DAN 2

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_bab6
 *
 * @author asus
 */
class m_bab6_1 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 
    public function inputSpmRs($in_spmId, $in_tahunId, $in_rsNoreg, $in_memenuhi, $in_indikator, $in_pencapaian) {
 
        $status = false;

        $spmId = $in_spmId;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $memenuhi = $in_memenuhi;
        $indikator = $in_indikator;
        $pencapaian = $in_pencapaian;

        $data = array(
            'LSPMRS_ID' => $spmId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SPM_RS_PEMENUHAN' => $memenuhi,
            'SPM_RS_INDIKATOR' => $indikator,
            'SPM_RS_PENCAPAIAN' => $pencapaian
        );
        
        $where = array (
            'LSPMRS_ID' => $spmId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('spm_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('spm_rs', $data);
        }
        else {
            $status = $this->db->insert('spm_rs', $data);
        }
        return $status;
    }

    public function inputSurveyRs($in_unitId, $in_tahunId, $in_rsNoreg, $in_nilai) {

        $status = false;

        $unitId = $in_unitId;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $nilai = $in_nilai;

        $data = array(
            'UNIT_SURVEY_ID' => $unitId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SURVEY_PELANGGAN_NILAI' => $nilai
        );
        
        $where = array (
            'UNIT_SURVEY_ID' => $unitId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('survey_pelanggan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('survey_pelanggan', $data);
        }
        else {
            $status = $this->db->insert('survey_pelanggan', $data);
        }
        return $status;
    }
	
	//Retrieve
	public function retrieveSpmRS($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('spm_rs'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = spm_rs.RS_NOREG');
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID'); 
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
		
		$this->db->join('tahun', 'tahun.TAHUN_ID = spm_rs.TAHUN_ID');
		$this->db->join('list_spm_rs', 'list_spm_rs.LSPMRS_ID = spm_rs.LSPMRS_ID');
	   
		
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');
		$this->db->order_by('spm_rs.LSPMRS_ID','ASC');//revisi
				
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve Survey RS
	public function retrieveSurveyRS($in_tahun, $in_rsNoreg,
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('survey_pelanggan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = survey_pelanggan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = survey_pelanggan.TAHUN_ID');
		$this->db->join('list_unit_survey', 'list_unit_survey.UNIT_SURVEY_ID = survey_pelanggan.UNIT_SURVEY_ID');
		$this->db->join('list_kategori_unit_survey', 'list_kategori_unit_survey.KATEGORI_UNIT_SURVEY_ID = list_unit_survey.KATEGORI_UNIT_SURVEY_ID');
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
	 
		if($tahun != null)
			$this->db->where('tahun.TAHUN_ID', $tahun); 
		if($rsNoreg != null)
			$this->db->where('rumah_sakit.RS_NOREG', $rsNoreg);  
		if($region != null)
			$this->db->where('rumah_sakit.RS_REGION_ID', $region);
		if($kelas != null)
			$this->db->where('rumah_sakit.RS_KELAS', $kelas);
		if($statusPenyelenggara != null)
			$this->db->where('rumah_sakit.RS_STATUS_PENYELENGGARA', $statusPenyelenggara);
		
	 
		if($tahun == null)
		$this->db->order_by('tahun.TAHUN_ID'); 
		else
		$this->db->order_by('rumah_sakit.RS_REGION_ID');
		$this->db->order_by('rumah_sakit.KODE_REGISTRASI','ASC');  
		$this->db->order_by('survey_pelanggan.UNIT_SURVEY_ID','ASC');//revisi
		 
		
		$query = $this->db->get();  
		
		return $query;
	}
	
	 
	 
	
	
	

}
