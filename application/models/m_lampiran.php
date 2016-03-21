<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_lampiran extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputPembayaranHemodialisis($in_tahunId, $in_rsNoreg, $in_listTahunId, 
            $in_umumRujukan, $in_umumNonRujukan, $in_askesRujukan, $in_askesNonRujukan,
            $in_lainRujukan, $in_lainNonRujukan, $in_jamkesmasRujukan, $in_jamkesmasNonRujukan, 
            $in_jamkesmasdaRujukan, $in_jamkesmasdaNonRujukan, $in_jamsostekRujukan, $in_jamsostekNonRujukan,
            $in_spmRujukan, $in_spmNonRujukan, $in_lainlainRujukan, $in_lainlainNonRujukan, $in_totalRujukan, 
            $in_totalNonRujukan
    ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $listTahunId = $in_listTahunId;

        $umumRujukan = $in_umumRujukan;
        $umumNonRujukan = $in_umumNonRujukan;

        $askesRujukan = $in_askesRujukan;
        $askesNonRujukan = $in_askesNonRujukan;

        $lainRujukan = $in_lainRujukan;
        $lainNonRujukan = $in_lainNonRujukan;

        $jamkesmasRujukan = $in_jamkesmasRujukan;
        $jamkesmasNonRujukan = $in_jamkesmasNonRujukan;

        $jamkesmasdaRujukan = $in_jamkesmasdaRujukan;
        $jamkesmasdaNonRujukan = $in_jamkesmasdaNonRujukan;

        $jamsostekRujukan = $in_jamsostekRujukan;
        $jamsostekNonRujukan = $in_jamsostekNonRujukan;

        $spmRujukan = $in_spmRujukan;
        $spmNonRujukan = $in_spmNonRujukan;

        $lainlainRujukan = $in_lainlainRujukan;
        $lainlainNonRujukan = $in_lainlainNonRujukan;

        $totalRujukan = $in_totalRujukan;
        $totalNonRujukan = $in_totalNonRujukan;


        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,
            'HEMODIALIS_BYR_UMUM_RUJUK' => $umumRujukan,
            'HEMODIALIS_BYR_UMUM_NONRUJUK' => $umumNonRujukan,
            'HEMODIALIS_BYR_ASKES_RUJUK' => $askesRujukan,
            'HEMODIALIS_BYR_ASKES_NONRUJUK' => $askesNonRujukan,
            'HEMODIALIS_BYR_LAIN_RUJUK' => $lainRujukan,
            'HEMODIALIS_BYR_LAIN_NONRUJUK' => $lainNonRujukan,
            'HEMODIALIS_BYR_JAMKESMAS_RUJUK' => $jamkesmasRujukan,
            'HEMODIALIS_BYR_JAMKESMAS_NONRUJUK' => $jamkesmasNonRujukan,
            'HEMODIALIS_BYR_JAMKESMASDA_RUJUK' => $jamkesmasdaRujukan,
            'HEMODIALIS_BYR_JAMKESMASDA_NONRUJUK' => $jamkesmasdaNonRujukan,
            'HEMODIALIS_BYR_JAMSOSTEK_RUJUK' => $jamsostekRujukan,
            'HEMODIALIS_BYR_JAMSOSTEK_NONRUJUK' => $jamsostekNonRujukan,
            'HEMODIALIS_BYR_SPM_RUJUK' => $spmRujukan,
            'HEMODIALIS_BYR_SPM_NONRUJUK' => $spmNonRujukan,
            'HEMODIALIS_BYR_LAINLAIN_RUJUK' => $lainlainRujukan,
            'HEMODIALIS_BYR_LAINLAIN_NONRUJUK' => $lainlainNonRujukan,
            'HEMODIALIS_BYR_TOTAL_RUJUK' => $totalRujukan,
            'HEMODIALIS_BYR_TOTAL_NONRUJUK' => $totalNonRujukan
        );

        $where = array (
             'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,
        );
        if($this->m_bab->cekData('pembayaran_hemodialisis', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pembayaran_hemodialisis', $data);
        }
        else {
            $status = $this->db->insert('pembayaran_hemodialisis', $data);
        }
        return $status;
    }

    function inputKunjunganHemodialisis($in_tahunId, $in_rsNoreg, $in_listTahunId, $in_lamaL, $in_lamaP, $in_lamaTotal, $in_baruL, $in_baruP, $in_baruTotal
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $listTahunId = $in_listTahunId;

        $lamaL = $in_lamaL;
        $lamaP = $in_lamaP;
        $lamaTotal = $in_lamaTotal;

        $baruL = $in_baruL;
        $baruP = $in_baruP;
        $baruTotal = $in_baruTotal;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,
            'PH_LAMA_L' => $lamaL,
            'PH_LAMA_P' => $lamaP,
            'PH_LAMA_TOTAL' => $lamaTotal,
            'PH_BARU_L' => $baruL,
            'PH_BARU_P' => $baruP,
            'PH_BARU_TOTAL' => $baruTotal
        );

        $where = array (
             'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,
        );
        if($this->m_bab->cekData('pasien_hemodialisis', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pasien_hemodialisis', $data);
        }
        else {
            $status = $this->db->insert('pasien_hemodialisis', $data);
        }
        return $status;
    }

    function inputSarprasHemodialisis($in_tahunId, $in_rsNoreg, $in_sarprasId, $in_kondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $sarprasId = $in_sarprasId;
        $kondisi = $in_kondisi;

        $data = array(
            'LIST_HEMO_SARPRAS_ID' => $sarprasId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'HEMO_SARPRAS_KONDISI' => $kondisi
        );

        $where = array (
             'LIST_HEMO_SARPRAS_ID' => $sarprasId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('sarpras_hemodialisis', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sarpras_hemodialisis', $data);
        }
        else {
            $status = $this->db->insert('sarpras_hemodialisis', $data);
        }
        return $status;
    }

    function inputPeralatanHemodialisis($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $jumlah = $in_jumlah;

        $data = array(
            'LPH_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PHEMO_JUMLAH' => $jumlah
        );

        $where = array (
             'LPH_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('peralatan_hemodialisis', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('peralatan_hemodialisis', $data);
        }
        else {
            $status = $this->db->insert('peralatan_hemodialisis', $data);
        }
        return $status;
    }

    function inputPeralatanHemodialisis2($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_kondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $kondisi = $in_kondisi;

        $data = array(
            'LPH_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PHEMO2_KONDISI' => $kondisi
        );

        $where = array (
            'LPH_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('peralatan_hemodialisis2', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('peralatan_hemodialisis2', $data);
        }
        else {
            $status = $this->db->insert('peralatan_hemodialisis2', $data);
        }
        return $status;
    }

    function inputTenagaMedikHemodialisis($in_tahunId, $in_rsNoreg, $in_tenagaMedikId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tenagaMedikId = $in_tenagaMedikId;
        $jumlah = $in_jumlah;

        $data = array(
            'LIST_HEMO_TENAGA_MEDIK_ID' => $tenagaMedikId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'HEMO_TENAGA_MEDIK_JUMLAH' => $jumlah
        );

        $where = array (
            'LIST_HEMO_TENAGA_MEDIK_ID' => $tenagaMedikId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('tenaga_medik_hemodialisis', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('tenaga_medik_hemodialisis', $data);
        }
        else {
            $status = $this->db->insert('tenaga_medik_hemodialisis', $data);
        }
        return $status;
    }

    function inputPeralatanRadiologi($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $jumlah = $in_jumlah;

        $data = array(
            'PERALATAN_RAD_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PERALATAN_RADIOLOGI_RS_JUMLAH' => $jumlah
        );

        $where = array (
            'PERALATAN_RAD_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('peralatan_radiologi_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('peralatan_radiologi_rs', $data);
        }
        else {
            $status = $this->db->insert('peralatan_radiologi_rs', $data);
        }
        return $status;
    }
	
	//////////////////////////////////////////////////////////////////
	
	public function retrievePembayaranHemodialisis($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('pembayaran_hemodialisis'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pembayaran_hemodialisis.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pembayaran_hemodialisis.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = pembayaran_hemodialisis.LIST_TAHUN_ID');
	 
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
		$this->db->order_by('pembayaran_hemodialisis.LIST_TAHUN_ID','ASC');  
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrieveKunjunganHemodialisis($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('pasien_hemodialisis'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pasien_hemodialisis.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pasien_hemodialisis.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = pasien_hemodialisis.LIST_TAHUN_ID');
	 
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
		$this->db->order_by('pasien_hemodialisis.LIST_TAHUN_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrieveSarprasHemodialisis($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 	 
		$this->db->select('*'); 
		$this->db->from('sarpras_hemodialisis'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sarpras_hemodialisis.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sarpras_hemodialisis.TAHUN_ID');
		$this->db->join('list_hemo_sarpras', 'list_hemo_sarpras.hemo_sarpras_id = sarpras_hemodialisis.LIST_HEMO_SARPRAS_ID');
	 
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
		$this->db->order_by('sarpras_hemodialisis.LIST_HEMO_SARPRAS_ID','ASC');   
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrievePeralatanHemodialisis($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('peralatan_hemodialisis'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = peralatan_hemodialisis.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = peralatan_hemodialisis.TAHUN_ID');
		$this->db->join('list_peralatan_hemodialisis', 'list_peralatan_hemodialisis.LPH_ID = peralatan_hemodialisis.LPH_ID');
	 
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
		$this->db->order_by('peralatan_hemodialisis.LPH_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrievePeralatanHemodialisis2($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('peralatan_hemodialisis2'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = peralatan_hemodialisis2.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = peralatan_hemodialisis2.TAHUN_ID');
		$this->db->join('list_peralatan_hemodialisis', 'list_peralatan_hemodialisis.LPH_ID = peralatan_hemodialisis2.LPH_ID');
	 
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
		$this->db->order_by('peralatan_hemodialisis2.LPH_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrieveTenagaMedikHemodialisis($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('tenaga_medik_hemodialisis'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = tenaga_medik_hemodialisis.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = tenaga_medik_hemodialisis.TAHUN_ID');
		$this->db->join('list_hemo_tenaga_medik', 'list_hemo_tenaga_medik.LIST_HEMO_TENAGA_MEDIK_ID = tenaga_medik_hemodialisis.LIST_HEMO_TENAGA_MEDIK_ID');
	 
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
		$this->db->order_by('tenaga_medik_hemodialisis.LIST_HEMO_TENAGA_MEDIK_ID','ASC'); 
				
		$query = $this->db->get(); 
		
		return $query; 
	} 
	
	public function retrievePeralatanRadiologi($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('peralatan_radiologi_rs'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = peralatan_radiologi_rs.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = peralatan_radiologi_rs.TAHUN_ID');
		$this->db->join('list_peralatan_radiologi', 'list_peralatan_radiologi.PERALATAN_RAD_ID = peralatan_radiologi_rs.PERALATAN_RAD_ID');
	 
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
		$this->db->order_by('peralatan_radiologi_rs.PERALATAN_RAD_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query; 
	} 
}
