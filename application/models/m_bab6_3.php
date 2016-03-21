<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_bab6_3
 *
 * @author asus
 */
class m_bab6_3 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputKlinikVCT($in_tahunId, $in_rsNoreg, $in_umur, $in_vctJumlah, $in_vctNegatif, $in_vctPositif, $in_cstJumlah, $in_cstArv) {
        $status = false;

        $umur = $in_umur;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $vctJumlah = $in_vctJumlah;
        $vctNegatif = $in_vctNegatif;
        $vctPositif = $in_vctPositif;
        $cstJumlah = $in_cstJumlah;
        $cstArv = $in_cstArv;

        $data = array(
            'GOLONGAN_UMUR_ID' => $umur,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'VCT_JUMLAHTOTAL' => $vctJumlah,
            'VCT_NEGATIF' => $vctNegatif,
            'VCT_POSITIF' => $vctPositif,
            'CST_JUMLAHTOTAL' => $cstJumlah,
            'CST_ARV' => $cstArv
        );

        $where = array (
            'GOLONGAN_UMUR_ID' => $umur,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('vct_cst', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('vct_cst', $data);
        }
        else {
            $status = $this->db->insert('vct_cst', $data);
        }
        return $status;
    }

    //VI.3.b.2. Penderita HIV/AIDS rawat inap berdasarkan golongan umur
    public function inputHIV($in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $umur = $in_umur;

        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
            'HIV_JUMLAH2' => $n2,
            'HIV_JUMLAH1' => $n1,
            'HIV_JUMLAH' => $n
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
        );
        if($this->m_bab->cekData('hiv', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('hiv', $data);
        }
        else {
            $status = $this->db->insert('hiv', $data);
        }
        return $status;
    }

    public function inputDBD($in_tahunId, $in_rsNoreg, $in_diagnosisId, $in_dewasaL, $in_dewasaP, $in_anakL, $in_anakP, $in_total) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $diagnosisId = $in_diagnosisId;
        $dewasaL = $in_dewasaL;
        $dewasaP = $in_dewasaP;
        $anakL = $in_anakL;
        $anakP = $in_anakP;
        $total = $in_total;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'DBD_DIAGNOSIS_ID' => $diagnosisId,
            'DBD_DEWASA_L' => $dewasaL,
            'DBD_DEWASA_P' => $dewasaP,
            'DBD_ANAK_L' => $anakL,
            'DBD_ANAK_P' => $anakP,
            'DBD_TOTAL' => $total
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'DBD_DIAGNOSIS_ID' => $diagnosisId,
        );
        if($this->m_bab->cekData('dbd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('dbd', $data);
        }
        else {
            $status = $this->db->insert('dbd', $data);
        }
        return $status;
    }

    public function inputDBDBaruPulang($in_tahunId, $in_rsNoreg, $in_diagnosis, $in_mrsDewasa, 
            $in_mrsAnak, $in_dewasaMDB24, $in_dewasaMDA24, 
            $in_dewasaSembuh, $in_anakMDB24, $in_anakMDA24, 
            $in_anakSembuh, $in_total) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $diagnosis = $in_diagnosis;

        $mrsDewasa = $in_mrsDewasa;
        $mrsAnak = $in_mrsAnak;
        $dewasaMDB24 = $in_dewasaMDB24;
        $dewasaMDA24 = $in_dewasaMDA24;
        $dewasaSembuh = $in_dewasaSembuh;
        $anakMDB24 = $in_anakMDB24;
        $anakMDA24 = $in_anakMDA24;
        $anakSembuh = $in_anakSembuh;
        $total = $in_total;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'DBD_DIAGNOSIS_ID' => $diagnosis,
            'DBD_II_MRS_DEWASA' => $mrsDewasa,
            'DBD_II_MRS_ANAK' => $mrsAnak,
            'DBD_II_DEWASA_MDB24' => $dewasaMDB24,
            'DBD_II_DEWASA_MDA24' => $dewasaMDA24,
            'DBD_II_DEWASA_SEMBUH' => $dewasaSembuh,
            'DBD_II_ANAK_MDB24' => $anakMDB24,
            'DBD_II_ANAK_MDA24' => $anakMDA24,
            'DBD_II_ANAK_SEBUH' => $anakSembuh,
            'DBD_II_TOTAL' => $total
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'DBD_DIAGNOSIS_ID' => $diagnosis,
        );
        if($this->m_bab->cekData('dbd_baru_dan_pulang', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('dbd_baru_dan_pulang', $data);
        }
        else {
            $status = $this->db->insert('dbd_baru_dan_pulang', $data);
        }
        return $status;
    }

    public function inputKematianIbu($in_tahunId, $in_rsNoreg, $in_hamilRujukan, $in_hamilDtgSendiri, $in_bersalinRujukan, $in_bersalinDtgSendiri, $in_nifasRSlain, $in_nifasRS, $in_total) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $hamilRujukan = $in_hamilRujukan;
        $hamilDtgSendiri = $in_hamilDtgSendiri;
        $bersalinRujukan = $in_bersalinRujukan;
        $bersalinDtgSendiri = $in_bersalinDtgSendiri;
        $nifasRSlain = $in_nifasRSlain;
        $nifasRS = $in_nifasRS;
        $total = $in_total;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JKI_IBUHAMIL_RUJUKAN' => $hamilRujukan,
            'JKI_IBUHAMIL_DTGSENDIRI' => $hamilDtgSendiri,
            'JKI_IBUBERSALIN_RUJUKAN' => $bersalinRujukan,
            'JKI_IBUBERHASIL_DTGSENDIRI' => $bersalinDtgSendiri,
            'JKI_IBUNIFAS_RSLAIN' => $nifasRSlain,
            'JKI_IBUNIFAS_RS' => $nifasRS,
            'JKI_TOTAL' => $total,
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('jumlah_kematian_ibu', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_kematian_ibu', $data);
        }
        else {
            $status = $this->db->insert('jumlah_kematian_ibu', $data);
        }
        return $status;
    }

    public function inputSebabKematianIbu($in_tahunId, $in_rsNoreg, $in_skId, $in_jumlah) {
        $status = false;

        $skId = $in_skId;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $jumlah = $in_jumlah;

        $data = array(
            'SKI_ID' => $skId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JKIF_FAKTOR' => $jumlah
        );

        $where = array (
            'SKI_ID' => $skId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('jumlah_kematian_ibu_per_faktor', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_kematian_ibu_per_faktor', $data);
        }
        else {
            $status = $this->db->insert('jumlah_kematian_ibu_per_faktor', $data);
        }
        return $status;
    }

    public function inputKematianIbuPersalinan($in_tahunId, $in_rsNoreg, $in_tribulan, $in_total, $in_pendarahan, $in_eklampsia, $in_sepsis) {
        $status = false;

        $tribulan = $in_tribulan;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $total = $in_total;
        $pendarahan = $in_pendarahan;
        $eklampsia = $in_eklampsia;
        $sepsis = $in_sepsis;

        $data = array(
            'TRIBULAN_ID' => $tribulan,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KIP_TOTAL' => $total,
            'KIP_PENDARAHAN' => $pendarahan,
            'KIP_EKLAMPSIA' => $eklampsia,
            'KIP_SEPSIS' => $sepsis
        );

        $where = array (
            'TRIBULAN_ID' => $tribulan,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('kematian_ibu_karena_persalinan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kematian_ibu_karena_persalinan', $data);
        }
        else {
            $status = $this->db->insert('kematian_ibu_karena_persalinan', $data);
        }
        return $status;
    }

	
	//Retrieve VCT
	public function retrieveKlinikVCT($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
	 
		$this->db->select('*'); 
		$this->db->from('vct_cst'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = vct_cst.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = vct_cst.TAHUN_ID');
		$this->db->join('list_golongan_umur', 'list_golongan_umur.GOLONGAN_UMUR_ID = vct_cst.GOLONGAN_UMUR_ID');
	 	 
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
		$this->db->order_by('vct_cst.GOLONGAN_UMUR_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve HIV
	public function retrieveHIV($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('hiv'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = hiv.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = hiv.TAHUN_ID');
		$this->db->join('list_golongan_umur', 'list_golongan_umur.GOLONGAN_UMUR_ID = hiv.GOLONGAN_UMUR_ID');
	 	 
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
		$this->db->order_by('hiv.GOLONGAN_UMUR_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve DBD
	public function retrieveDBD($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('dbd'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = dbd.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = dbd.TAHUN_ID');
		$this->db->join('dbd_diagnosis', 'dbd_diagnosis.DBD_DIAGNOSIS_ID = dbd.DBD_DIAGNOSIS_ID');
	 
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
		$this->db->order_by('dbd.DBD_DIAGNOSIS_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}

	//Retrieve DBD Baru dan Pulang
	public function retrieveDBDBaruPulang($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('dbd_baru_dan_pulang'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = dbd_baru_dan_pulang.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = dbd_baru_dan_pulang.TAHUN_ID');
	 	$this->db->join('dbd_diagnosis', 'dbd_diagnosis.DBD_DIAGNOSIS_ID = dbd_baru_dan_pulang.DBD_DIAGNOSIS_ID');
	 
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
		$this->db->order_by('dbd_baru_dan_pulang.DBD_DIAGNOSIS_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve Kematian Ibu
	public function retrieveKematianIbu($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('jumlah_kematian_ibu'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = jumlah_kematian_ibu.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = jumlah_kematian_ibu.TAHUN_ID');
	 
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

	//Retrieve Kematian Ibu per faktor
	public function retrieveSebabKematianIbu($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('jumlah_kematian_ibu_per_faktor'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = jumlah_kematian_ibu_per_faktor.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = jumlah_kematian_ibu_per_faktor.TAHUN_ID');
		$this->db->join('list_sebab_kematian_ibu', 'list_sebab_kematian_ibu.SKI_ID = jumlah_kematian_ibu_per_faktor.SKI_ID');
	 
	 
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
		$this->db->order_by('jumlah_kematian_ibu_per_faktor.SKI_ID','ASC'); 
		
		$query = $this->db->get(); 
		
		return $query;
	}
	
	//Retrieve Kematian Ibu karena persalinan
	public function retrieveSebabKematianIbuPersalinan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){ 
		 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	  
		$this->db->select('*'); 
		$this->db->from('kematian_ibu_karena_persalinan'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kematian_ibu_karena_persalinan.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kematian_ibu_karena_persalinan.TAHUN_ID');
		
		$this->db->join('list_tribulan', 'list_tribulan.TRIBULAN_ID = kematian_ibu_karena_persalinan.TRIBULAN_ID');
	 
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
		$this->db->order_by('kematian_ibu_karena_persalinan.TRIBULAN_ID','ASC'); 
		
		
		$query = $this->db->get(); 
		
		return $query;
	}

}
