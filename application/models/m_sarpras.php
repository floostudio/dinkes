<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_sarpras
 *
 * @author asus
 */
class m_sarpras extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputSarpras($in_tahunId, $in_rsNoreg, $in_sarprasId, $in_kondisi, $in_keterangan) {

        $status = false;

        $sarprasId = $in_sarprasId;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kondisi = $in_kondisi;
        $keterangan = $in_keterangan;

        $data = array(
            'LIST_SARPRAS_ID' => $sarprasId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SARPRAS_KONDISI' => $kondisi,
            'SARPRAS_KET' => $keterangan
        );

        $where = array (
            'LIST_SARPRAS_ID' => $sarprasId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('sarana_prasarana', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sarana_prasarana', $data);
        }
        else {
            $status = $this->db->insert('sarana_prasarana', $data);
        }
        return $status;
    }

    public function inputPeralatan($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_kondisiStandar, $in_kondisiTakStandar, $in_kondisiTakAda, $in_keterangan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $kondisiStandar = $in_kondisiStandar;
        $kondisiTakStandar = $in_kondisiTakStandar;
        $kondisiTakAda = $in_kondisiTakAda;
        $keterangan = $in_keterangan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_PERALATAN_ID' => $peralatanId,
            'PERALATAN_STANDAR' => $kondisiStandar,
            'PERALATAN_TAK_STANDAR' => $kondisiTakStandar,
            'PERALATAN_TAK_ADA' => $kondisiTakAda,
            'PERALATAN_KETERANGAN' => $keterangan
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_PERALATAN_ID' => $peralatanId,
        );
        if($this->m_bab->cekData('kondisi_peralatan_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kondisi_peralatan_rs', $data);
        }
        else {
            $status = $this->db->insert('kondisi_peralatan_rs', $data);
        }
        return $status;
    }

    public function inputKelengkapanPeralatan($in_tahunId, $in_rsNoreg, 
            $in_peralatanPerUnit, $in_peralatanStandar,
            $in_peralatanKalibrasi, $in_peralatanKalibrasiStandar,
            $in_peralatanKondisiBaik, $in_peralatanTotal,
            $in_luasRuangan, $in_luasRuanganStandar) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        
        $peralatanPerUnit = $in_peralatanPerUnit;
        $peralatanStandar = $in_peralatanStandar;
        $peralatanKalibrasi = $in_peralatanKalibrasi;
        $peralatanKalibrasiStandar = $in_peralatanKalibrasiStandar;

        $peralatanKondisiBaik = $in_peralatanKondisiBaik;
        $peralatanTotal = $in_peralatanTotal;
        
        $luasRuangan = $in_luasRuangan;
        $luasRuanganStandar = $in_luasRuanganStandar;

        
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JUMLAH_PERALATAN_PER_UNIT' => $peralatanPerUnit,
            'JUMLAH_PERALATAN_STANDAR' => $peralatanStandar,
            'JUMLAH_PERALATAN_KALIBRASI' => $peralatanKalibrasi,
            'JUMLAH_PERALATAN_KALIBRASI_STANDAR' => $peralatanKalibrasiStandar,
            'JUMLAH_PERALATAN_KONDISI_BAIK' => $peralatanKondisiBaik,
            'JUMLAH_PERALATAN_TOTAL' => $peralatanTotal,
            'JUMLAH_LUAS_RUANGAN' => $luasRuangan,
            'JUMLAH_LUAS_RUANGAN_STANDAR' => $luasRuanganStandar 
        );

        $where = array (
             'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('kelengkapan_peralatan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kelengkapan_peralatan', $data);
        }
        else {
            $status = $this->db->insert('kelengkapan_peralatan', $data);
        }
        return $status;
    }

    
	//Retrieve Sarpras
	public function retrieveSarpras($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('sarana_prasarana'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = sarana_prasarana.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = sarana_prasarana.TAHUN_ID');
		$this->db->join('list_sarpras', 'list_sarpras.LIST_SARPRAS_ID = sarana_prasarana.LIST_SARPRAS_ID');
	 
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
		$this->db->order_by('sarana_prasarana.LIST_SARPRAS_ID','ASC');  
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
    //Retrieve peralatan
	public function retrievePeralatan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kondisi_peralatan_rs'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kondisi_peralatan_rs.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kondisi_peralatan_rs.TAHUN_ID');
		$this->db->join('list_peralatan_pelayanan', 'list_peralatan_pelayanan.LIST_PERALATAN_ID = kondisi_peralatan_rs.LIST_PERALATAN_ID');
		
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
		$this->db->order_by('kondisi_peralatan_rs.LIST_PERALATAN_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}

	//Retrieve kelengkapan peralatan
	public function retrieveKelengkapanPeralatan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kelengkapan_peralatan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kelengkapan_peralatan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kelengkapan_peralatan.TAHUN_ID');
		
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

}
