<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class m_sdm extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputKetenagaan($in_tahunId, $in_rsNoreg, $in_ketenagaanId, $in_jumlah, $in_tetap, $in_kontrak) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $ketenagaanId = $in_ketenagaanId;
        $jumlah = $in_jumlah;
        $tetap = $in_tetap;
        $kontrak = $in_kontrak;
        
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LK_ID' => $ketenagaanId,
            'KETENAGAAN_JUMLAH' => $jumlah,
            'KETENAGAAN_TETAP' => $tetap,
            'KETENAGAAN_KONTRAK' => $kontrak,
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LK_ID' => $ketenagaanId,
        );
        if($this->m_bab->cekData('ketenagaan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('ketenagaan', $data);
        }
        else {
            $status = $this->db->insert('ketenagaan', $data);
        }
        return $status;
    }

    function inputAnalisaKetenagaan($in_tahunId, $in_rsNoreg, $in_jml, $in_standar) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jml = $in_jml;
        $standar = $in_standar;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'AT_JUMLAH' => $jml,
            'AT_STANDAR' => $standar
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('analisa_ketenagaan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('analisa_ketenagaan', $data);
        }
        else {
            $status = $this->db->insert('analisa_ketenagaan', $data);
        }
        return $status;
    }

    function inputKebutuhanTenaga($in_tahunId, $in_rsNoreg, $in_tipeTenagaMedis, $in_rencana, $in_upaya) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tipeTenagaMedis = $in_tipeTenagaMedis;
        $rencana = $in_rencana;
        $upaya = $in_upaya;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TM_ID' => $tipeTenagaMedis,
            'KEB_RENCANA' => $rencana,
            'KEB_UPAYA' => $upaya
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TM_ID' => $tipeTenagaMedis,
        );
        if($this->m_bab->cekData('kebutuhan_tenaga', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kebutuhan_tenaga', $data);
        }
        else {
            $status = $this->db->insert('kebutuhan_tenaga', $data);
        }
        return $status;
    }

    function inputPelatihanSDM($in_tahunId, $in_rsNoreg, $in_tenagaMedisId, $in_uraian, $in_jumlah, $in_penyelenggara) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tenagaMedisId = $in_tenagaMedisId;
        $uraian = $in_uraian;
        $jumlah = $in_jumlah;
        $penyelenggara = $in_penyelenggara;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_PELATIHAN_ID' => $tenagaMedisId,
            'PELATIHAN_URAIAN' => $uraian,
            'PELATIHAN_JUMLAH' => $jumlah,
            'PELATIHAN_PENYELENGGARA' => $penyelenggara
        );

        $status = $this->db->insert('pelatihan_sdm', $data);

        return $status;
    }

	//Retrieve Ketenagaan
	public function retrieveKetenagaan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('ketenagaan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = ketenagaan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = ketenagaan.TAHUN_ID');
		$this->db->join('list_ketenagaan', 'list_ketenagaan.LK_ID = ketenagaan.LK_ID');
	 
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
		$this->db->order_by('ketenagaan.LK_ID','ASC'); 
				
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve Analisa Ketenagaan
	public function retrieveAnalisaKetenagaan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
		
		$this->db->select('*'); 
		$this->db->from('analisa_ketenagaan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = analisa_ketenagaan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = analisa_ketenagaan.TAHUN_ID');
		  
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
		
		$query = $this->db->get(); 
		
		return $query;
	}

	//Kebutuhan Tenaga select
	public function retrieveKebutuhanTenaga($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 

		$this->db->select('*'); 
		$this->db->from('kebutuhan_tenaga'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kebutuhan_tenaga.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kebutuhan_tenaga.TAHUN_ID');
		$this->db->join('list_jenis_tenaga_medis', 'list_jenis_tenaga_medis.LIST_TM_ID = kebutuhan_tenaga.LIST_TM_ID');
		
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
		$this->db->order_by('kebutuhan_tenaga.LIST_TM_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}

	//PelatihanSDM
	public function retrievePelatihanSDM($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelatihan_sdm'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelatihan_sdm.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelatihan_sdm.TAHUN_ID');
		//$this->db->join('list_jenis_tenaga_medis', 'list_jenis_tenaga_medis.LIST_TM_ID = pelatihan_sdm.LIST_TM_ID');
		//$this->db->join('list_unit', 'list_unit.UNIT_ID = pelatihan_sdm.UNIT_ID');
	 
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
		$this->db->order_by('pelatihan_sdm.LIST_TM_ID','ASC'); 
		$this->db->order_by('pelatihan_sdm.UNIT_ID','ASC');  
		
		$query = $this->db->get(); 
		
		return $query;
	}
        
        public function retrievePelatihanSDMPerUnit($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara,$in_unitSDM){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
                $unitSDM = $in_unitSDM;
	 
		$this->db->select('*'); 
		$this->db->from('pelatihan_sdm'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelatihan_sdm.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelatihan_sdm.TAHUN_ID');
		$this->db->join('list_pelatihan', 'list_pelatihan.PELATIHAN_ID = pelatihan_sdm.LIST_PELATIHAN_ID'); 
	 
		$this->db->join('list_region', 'list_region.id_list_region = rumah_sakit.RS_REGION_ID');
		$this->db->join('kelas_rs', 'kelas_rs.kelas_rs_id = rumah_sakit.RS_KELAS');
	 
                $this->db->where('pelatihan_sdm.LIST_PELATIHAN_ID', $in_unitSDM);//where list_tm_id = id igd 
                
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
		$this->db->order_by('pelatihan_sdm.PELATIHAN_ID','ASC');  
		
		$query = $this->db->get(); 
		
		return $query;
	}


	
}
