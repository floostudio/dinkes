<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_bab6_4
 *
 * @author asus
 */
class m_bab6_4 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputMDGS41($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsKondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsKondisi = $in_mdgsKondisi;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS4_ID' => $mdgsId,
            'MDGS41_KONDISI' => $mdgsKondisi
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS4_ID' => $mdgsId,
        );
        if($this->m_bab->cekData('mdgs4_1', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs4_1', $data);
        }
        else {
            $status = $this->db->insert('mdgs4_1', $data);
        }
        return $status;
    }

    public function inputMDGS42($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsJumlah = $in_mdgsJumlah;

        $data = array(
            'MDGS4_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS42_JUMLAH' => $mdgsJumlah
        );

        $where = array (
            'MDGS4_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('mdgs4_2', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs4_2', $data);
        }
        else {
            $status = $this->db->insert('mdgs4_2', $data);
        }
        return $status;
    }

    public function inputMDGS51($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsKondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsKondisi = $in_mdgsKondisi;

        $data = array(
            'MDGS5_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS51_KONDISI' => $mdgsKondisi
        );

        $where = array (
            'MDGS5_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('mdgs5_1', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs5_1', $data);
        }
        else {
            $status = $this->db->insert('mdgs5_1', $data);
        }
        return $status;
    }

    public function inputMDGS52($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsJumlah = $in_mdgsJumlah;

        $data = array(
            'MDGS5_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS52_JUMLAH' => $mdgsJumlah
        );

        $where = array (
            'MDGS5_ID' => $mdgsId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('mdgs5_2', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs5_2', $data);
        }
        else {
            $status = $this->db->insert('mdgs5_2', $data);
        }
        return $status;
    }

    public function inputMDGS53($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsKondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsKondisi = $in_mdgsKondisi;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS5_ID' => $mdgsId,
            'MDGS53_KONDISI' => $mdgsKondisi
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS5_ID' => $mdgsId,
        );
        if($this->m_bab->cekData('mdgs5_3', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs5_3', $data);
        }
        else {
            $status = $this->db->insert('mdgs5_3', $data);
        }
        return $status;
    }

    public function inputMDGS61($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsKondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsKondisi = $in_mdgsKondisi;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS6_ID' => $mdgsId,
            'MDGS61_KONDISI' => $mdgsKondisi
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS6_ID' => $mdgsId,
        );
        if($this->m_bab->cekData('mdgs6_1', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs6_1', $data);
        }
        else {
            $status = $this->db->insert('mdgs6_1', $data);
        }
        return $status;
    }

    public function inputMDGS62($in_tahunId, $in_rsNoreg, $in_mdgsId, $in_mdgsJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mdgsId = $in_mdgsId;
        $mdgsJumlah = $in_mdgsJumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS6_ID' => $mdgsId,
            'MDGS62_JUMLAH' => $mdgsJumlah
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MDGS6_ID' => $mdgsId,
        );
        if($this->m_bab->cekData('mdgs6_2', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs6_2', $data);
        }
        else {
            $status = $this->db->insert('mdgs6_2', $data);
        }
        return $status;
    }

    public function inputNeonatalEsensial($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $jumlah = $in_jumlah;

        $data = array(
            'NEONATAL_ESENSIAL_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PN_JUMLAH' => $jumlah
        );

        $where = array (
            'NEONATAL_ESENSIAL_ID' => $peralatanId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('mdgs4_peralatan_neonatal_esensial', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs4_peralatan_neonatal_esensial', $data);
        }
        else {
            $status = $this->db->insert('mdgs4_peralatan_neonatal_esensial', $data);
        }
        return $status;
    }

    public function inputMaternalEsensial($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $jumlah = $in_jumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MATERNAL_ESSENSIAL_ID' => $peralatanId,
            'PM_JUMLAH' => $jumlah
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'MATERNAL_ESSENSIAL_ID' => $peralatanId,
        );
        if($this->m_bab->cekData('mdgs5_peralatan_maternal_essensial', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('mdgs5_peralatan_maternal_essensial', $data);
        }
        else {
            $status = $this->db->insert('mdgs5_peralatan_maternal_essensial', $data);
        }
        return $status;
    }

	 
	public function retrieveMDGS41($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	  
		$this->db->select('*'); 
		$this->db->from('mdgs4_1'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs4_1.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs4_1.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs4_1.MDGS4_ID');
	 
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
		$this->db->order_by('mdgs4_1.MDGS4_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS42($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('mdgs4_2'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs4_2.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs4_2.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs4_2.MDGS4_ID');
	 
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
		$this->db->order_by('mdgs4_2.MDGS4_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS51($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 	 
		$this->db->select('*'); 
		$this->db->from('mdgs5_1'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs5_1.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs5_1.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs5_1.MDGS5_ID');
	 
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
		$this->db->order_by('mdgs5_1.MDGS5_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS52($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 	 
		$this->db->select('*'); 
		$this->db->from('mdgs5_2'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs5_2.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs5_2.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs5_2.MDGS5_ID');
	 
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
		$this->db->order_by('mdgs5_2.MDGS5_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS53($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('mdgs5_3'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs5_3.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs5_3.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs5_3.MDGS5_ID');
	 
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
		$this->db->order_by('mdgs5_3.MDGS5_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS61($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('mdgs6_1'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs6_1.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs6_1.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs6_1.MDGS6_ID');
	 
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
		$this->db->order_by('mdgs6_1.MDGS6_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMDGS62($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 	 
		$this->db->select('*'); 
		$this->db->from('mdgs6_2'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs6_2.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs6_2.TAHUN_ID');
		$this->db->join('list_mdgs', 'list_mdgs.MDGS_ID = mdgs6_2.MDGS6_ID');
	 
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
		$this->db->order_by('mdgs6_2.MDGS6_ID','ASC');
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveNeonatalEsensial($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 	 
		$this->db->select('*'); 
		$this->db->from('mdgs4_peralatan_neonatal_esensial'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs4_peralatan_neonatal_esensial.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs4_peralatan_neonatal_esensial.TAHUN_ID');
		$this->db->join('list_peralatan_neonatal_esensial', 'list_peralatan_neonatal_esensial.NEONATAL_ESENSIAL_ID = mdgs4_peralatan_neonatal_esensial.NEONATAL_ESENSIAL_ID');
	 
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
		$this->db->order_by('mdgs4_peralatan_neonatal_esensial.NEONATAL_ESENSIAL_ID','ASC');
		  
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	public function retrieveMaternalEsensial($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('mdgs5_peralatan_maternal_essensial'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mdgs5_peralatan_maternal_essensial.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mdgs5_peralatan_maternal_essensial.TAHUN_ID');
		$this->db->join('list_peralatan_maternal_essensial', 'list_peralatan_maternal_essensial.MATERNAL_ESSENSIAL_UD = mdgs5_peralatan_maternal_essensial.MATERNAL_ESSENSIAL_ID');
	 
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
		$this->db->order_by('mdgs5_peralatan_maternal_essensial.MATERNAL_ESSENSIAL_ID','ASC');
		 
		
		$query = $this->db->get(); 
		
		return $query;
	}
}
