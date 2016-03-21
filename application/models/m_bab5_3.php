<?php

/*

  Model untuk input Bab V Sheet 14.Maskin


 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_bab5_3 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputPelayananMaskin($in_tahunId, $in_rsNoreg, $in_unitId, $in_jumlahLn2, $in_jumlahPn2, $in_jumlahTotalN2, $in_jumlahLn1, $in_jumlahPn1, $in_jumlahTotalN1, $in_jumlahLn, $in_jumlahPn, $in_jumlahTotalN, $in_jumlahTotalL, $in_jumlahTotalP
    ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $unitId = $in_unitId;

        $jumlahLn2 = $in_jumlahLn2;
        $jumlahPn2 = $in_jumlahPn2;
        $jumlahTotalN2 = $in_jumlahTotalN2;

        $jumlahLn1 = $in_jumlahLn1;
        $jumlahPn1 = $in_jumlahPn1;
        $jumlahTotalN1 = $in_jumlahTotalN1;

        $jumlahLn = $in_jumlahLn;
        $jumlahPn = $in_jumlahPn;
        $jumlahTotalN = $in_jumlahTotalN;

        $jumlahTotalL = $in_jumlahTotalL;
        $jumlahTotalP = $in_jumlahTotalP;
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'UNITMASKIN_ID' => $unitId, //list_pelayanan_maskin
            'P_MASKIN_L_N2' => $jumlahLn2,
            'P_MASKIN_P_N2' => $jumlahPn2,
            'P_MASKIN_TOTAL_N2' => $jumlahTotalN2,
            'P_MASKIN_L_N1' => $jumlahLn1,
            'P_MASKIN_P_N1' => $jumlahPn1,
            'P_MASKIN_TOTAL_N1' => $jumlahTotalN1,
            'P_MASKIN_L_N' => $jumlahLn,
            'P_MASKIN_P_N' => $jumlahPn,
            'P_MASKIN_TOTAL_N' => $jumlahTotalN,
            'P_MASKIN_JUMLAH_L' => $jumlahTotalL,
            'P_MASKIN_JUMLAH_P' => $jumlahTotalP
        );
        
        $where = array (
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg,
                'UNITMASKIN_ID' => $unitId, //list_pelayanan_maskin
        );
        
        if($this->m_bab->cekData('pelayanan_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('pelayanan_maskin', $data);
        }
        else {
            $status = $this->db->insert('pelayanan_maskin', $data);
        }
        return $status;
    }

    //V.14.b Kelengkapan Survey Kepuasan dan Pengaduan/Keluhan Pelanggan (Maskin)							
    function inputSurveyMaskin($in_tahunId, $in_rsNoreg, $in_kelengkapanId, $in_kondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kelengkapanId = $in_kelengkapanId;
        $kondisi = $in_kondisi;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KP_MASKIN_ID' => $kelengkapanId, /* list_kelengkapan_survey_maskin */
            'KONDISI' => $kondisi
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KP_MASKIN_ID' => $kelengkapanId, /* list_kelengkapan_survey_maskin */
        );
        
        if($this->m_bab->cekData('kelengkapan_survey_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('kelengkapan_survey_maskin', $data);
        }
        else {
            $status = $this->db->insert('kelengkapan_survey_maskin', $data);
        }
        return $status;
    }

    // V.14.c Kelengkapan Pengelolaan Pengaduan/Keluhan Pelanggan (Maskin)						
    function inputKelolaMaskin($in_tahunId, $in_rsNoreg, $in_kelengkapanId, $in_kondisi) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kelengkapanId = $in_kelengkapanId;
        $kondisi = $in_kondisi;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KLP_ID' => $kelengkapanId, /* list_kelengkapan_kelola_maskin */
            'KELOLA_MASKIN_KONDISI' => $kondisi
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KLP_ID' => $kelengkapanId, /* list_kelengkapan_kelola_maskin */
        );
        
        if($this->m_bab->cekData('kelengkapan_kelola_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('kelengkapan_kelola_maskin', $data);
        }
        else {
            $status = $this->db->insert('kelengkapan_kelola_maskin', $data);
        }
        return $status;
    }

    //V.14.d Keluhan masyarakat miskin terhadap pelayanan petugas di RS							
    function inputKeluhanMaskinPetugas($in_tahunId, $in_rsNoreg, $in_petugasId, $in_jumlahUGD, $in_jumlahUGDp, $in_jumlahIRJA, $in_jumlahIRJAp, $in_jumlahIRNA, $in_jumlahIRNAp
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $petugasId = $in_petugasId;

        $jumlahUGD = $in_jumlahUGD;
        $jumlahUGDp = $in_jumlahUGDp;

        $jumlahIRJA = $in_jumlahIRJA;
        $jumlahIRJAp = $in_jumlahIRJAp;

        $jumlahIRNA = $in_jumlahIRNA;
        $jumlahIRNAp = $in_jumlahIRNAp;


        $data = array(
            'PMASKIN_ID' => $petugasId, //list_petugas_maskin
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SV_MASKIN_UGD' => $jumlahUGD,
            'SV_MASKIN_UGD_P' => $jumlahUGDp,
            'SV_MASKIN_IRJA' => $jumlahIRJA,
            'SV_MASKIN_IRJA_P' => $jumlahIRJAp,
            'SV_MASKIN_IRNA' => $jumlahIRNA,
            'SV_MASKIN_IRNA_P' => $jumlahIRNAp
        );
        
        $where = array (
                'PMASKIN_ID' => $petugasId, //list_petugas_maskin
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('keluhan_maskin_petugas', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('keluhan_maskin_petugas', $data);
        }
        else {
            $status = $this->db->insert('keluhan_maskin_petugas', $data);
        }
        return $status;
    }

    //V.14.e�Prosentase jenis keluhan masyarakat miskin yang terjadi di RS  : (dibanding jumlah pasien Maskin yang dilayani)									
    function inputPersentaseKeluhan($in_tahunId, $in_rsNoreg, $in_keluhanId, $in_ditangani, $in_jumlah, $in_persentase
    ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $keluhanId = $in_keluhanId;

        $ditangani = $in_ditangani;
        $jumlah = $in_jumlah;
        $persentase = $in_persentase;


        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_KELUHAN_ID' => $keluhanId, /* tabel list_keluhan_maskin */
            'KELUHAN_MASKIN_DITANGANI' => $ditangani,
            'KELUHAN_MASKIN_JUMLAH' => $jumlah,
            'KELUHAN_MASKIN_PERSENTASE' => $persentase
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_KELUHAN_ID' => $keluhanId, /* tabel list_keluhan_maskin */
        );
        
        if($this->m_bab->cekData('persentase_keluhan_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('persentase_keluhan_maskin', $data);
        }
        else {
            $status = $this->db->insert('persentase_keluhan_maskin', $data);
        }
        return $status;
    }

    //V.14.f. Mekanisme Pengaduan Masalah Maskin di RS
    function inputMekanismePengaduan($in_tahunId, $in_rsNoreg, $in_mekanismeId, $in_jumlahN2, $in_jumlahN1, $in_jumlahN, $in_jumlah, $in_tren) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $mekanismeId = $in_mekanismeId;

        $jumlahN2 = $in_jumlahN2;
        $jumlahN1 = $in_jumlahN1;
        $jumlahN = $in_jumlahN;
        $jumlah = $in_jumlah;
        $tren = $in_tren;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_MEKANISME_ID' => $mekanismeId, //list_mekanisme_pengaduan
            'MEKANISME_PENGADUAN_N2' => $jumlahN2,
            'MEKANISME_PENGADUAN_N1' => $jumlahN1,
            'MEKANISME_PENGADUAN_N' => $jumlahN,
            'MEKANISME_PENGADUAN_JML' => $jumlah,
            'MEKANISME_PENGADUAN_TREN' => $tren
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_MEKANISME_ID' => $mekanismeId, //list_mekanisme_pengaduan
        );
        
        if($this->m_bab->cekData('mekanisme_pengaduan_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('mekanisme_pengaduan_maskin', $data);
        }
        else {
            $status = $this->db->insert('mekanisme_pengaduan_maskin', $data);
        }
        return $status;
    }

    //V.14.g	Hasil Survey Keluhan Pasien Masyarakat Miskin di RS				
    function inputSurveyKeluhan($in_tahunId, $in_rsNoreg, $in_pelayananId, $in_skor, $in_kondisi, $in_responden, $in_keterangan
    ) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pelayananId = $in_pelayananId;
        
        $skor = $in_skor;
        $kondisi = $in_kondisi;
        $responden = $in_responden;
        $keterangan = $in_keterangan;

        $data = array(
            'P_MASKIN_ID' => $pelayananId, //list_pelayanan_maskin id 1, 6, 11
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'HASIL_SURVEY_SKOR' => $skor,
            'HASIL_SURVEY_KONDISI' => $kondisi,
            'HASIL_SURVEY_RESPONDEN' => $responden,
            'HASIL_SURVEY_KETERANGAN' => $keterangan
        );
        
        $where = array (
                'P_MASKIN_ID' => $pelayananId, //list_pelayanan_maskin id 1, 6, 11
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        
        if($this->m_bab->cekData('hasil_survey_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('hasil_survey_maskin', $data);
        }
        else {
            $status = $this->db->insert('hasil_survey_maskin', $data);
        }
        return $status;
    }

    //V.14.h Upaya Perbaikan Pelayanan Maskin di RS
    function inputPerbaikanMaskin($in_tahunId, $in_rsNoreg, $in_perbaikan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $perbaikan = $in_perbaikan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PERBAIKANMASKIN_URAIAN' => $perbaikan
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PERBAIKANMASKIN_URAIAN' => $perbaikan
        );
        
        if($this->m_bab->cekData('upaya_perbaikan_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('upaya_perbaikan_maskin', $data);
        }
        else {
            $status = $this->db->insert('upaya_perbaikan_maskin', $data);
        }
        return $status;
    }
    
    //V.14.i. Rekapitulasi 10 Penyakit Terbanyak Rawat Jalan Maskin di RS (3 tahun terakhir) 
    function inputPenyakitTerbanyakRJMaskin($in_tahunId, $in_rsNoreg, $in_listTahunId, $in_icdCode, $in_penyakitNama, $in_penyakitJumlah) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $listTahunId = $in_listTahunId;
        $icdCode = $in_icdCode;
        $penyakitNama = $in_penyakitNama;
        $penyakitJumlah = $in_penyakitJumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId, /* tabel list_tahun */
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
            'PENYAKIT_MASKIN_RJ_NAMA' => $penyakitNama,
            'PENYAKIT_MASKIN_RJ_JML' => $penyakitJumlah
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId, /* tabel list_tahun */
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
        );
        
        if($this->m_bab->cekData('penyakit_terbanyak_maskin_rj', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('penyakit_terbanyak_maskin_rj', $data);
        }
        else {
            $status = $this->db->insert('penyakit_terbanyak_maskin_rj', $data);
        }
        return $status;
    }
   
    //V.14.j. Rekapitulasi 10 Penyakit Terbanyak Rawat Inap Maskin di RS (3 tahun terakhir) 
    function inputPenyakitTerbanyakRIMaskin($in_tahunId, $in_rsNoreg, $in_listTahunId, $in_icdCode, $in_penyakitNama, $in_penyakitJumlah) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $listTahunId = $in_listTahunId;
        $icdCode = $in_icdCode;
        $penyakitNama = $in_penyakitNama;
        $penyakitJumlah = $in_penyakitJumlah;
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId, /* tabel list_tahun */
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
            'PENYAKIT_MASKIN_RI_NAMA' => $penyakitNama,
            'PENYAKIT_MASKIN_RI_JML' => $penyakitJumlah
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId, /* tabel list_tahun */
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
        );
        
        if($this->m_bab->cekData('penyakit_terbanyak_maskin_ri', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('penyakit_terbanyak_maskin_ri', $data);
        }
        else {
            $status = $this->db->insert('penyakit_terbanyak_maskin_ri', $data);
        }
        return $status;
    }
  
    //V.14.k. Rekapitulasi 10 Tindakan Terbanyak Pelayanan Maskin di RS (3 tahun terakhir) 
    function inputTindakanTerbanyakMaskin($in_tahunId, $in_rsNoreg, $in_listTahunId, $in_nama, $in_jumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $listTahunId = $in_listTahunId;
        $nama = $in_nama;
        $jumlah = $in_jumlah;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,  
            'TM_JENIS_TINDAKAN' => $nama,
            'TM_JUMLAH' => $jumlah
        );

        $where = array (
                'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_TAHUN_ID' => $listTahunId,  
            'TM_JENIS_TINDAKAN' => $nama,
        );
        
        if($this->m_bab->cekData('tindakan_terbanyak_maskin', $where))
        {
            $this->db->where($where);
            $status =$this->db->update('tindakan_terbanyak_maskin', $data);
        }
        else {
            $status = $this->db->insert('tindakan_terbanyak_maskin', $data);
        }
        return $status;
    }

	public function retrievePelayananMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('pelayanan_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = pelayanan_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = pelayanan_maskin.TAHUN_ID');
		$this->db->join('list_pelayanan_maskin', 'list_pelayanan_maskin.P_MASKIN_ID = pelayanan_maskin.UNITMASKIN_ID');
	 
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
		$this->db->order_by('pelayanan_maskin.UNITMASKIN_ID','ASC');//revisi
		 
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveSurveyMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kelengkapan_survey_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kelengkapan_survey_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kelengkapan_survey_maskin.TAHUN_ID');
		$this->db->join('list_kelengkapan_survey_maskin', 'list_kelengkapan_survey_maskin.KP_MASKIN_ID = kelengkapan_survey_maskin.KP_MASKIN_ID');
	 
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
		$this->db->order_by('kelengkapan_survey_maskin.KP_MASKIN_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKelolaMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('kelengkapan_kelola_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = kelengkapan_kelola_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = kelengkapan_kelola_maskin.TAHUN_ID');
		$this->db->join('list_kelengkapan_kelola_maskin', 'list_kelengkapan_kelola_maskin.KLP_ID = kelengkapan_kelola_maskin.KLP_ID');
	 
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
		$this->db->order_by('kelengkapan_kelola_maskin.KLP_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveKeluhanMaskinPetugas($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;  
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('keluhan_maskin_petugas'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = keluhan_maskin_petugas.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = keluhan_maskin_petugas.TAHUN_ID');
		$this->db->join('list_petugas_maskin', 'list_petugas_maskin.PMASKIN_ID = keluhan_maskin_petugas.PMASKIN_ID');
	 
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
		$this->db->order_by('keluhan_maskin_petugas.PMASKIN_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePersentaseKeluhan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('persentase_keluhan_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = persentase_keluhan_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = persentase_keluhan_maskin.TAHUN_ID');
		$this->db->join('list_keluhan_maskin', 'list_keluhan_maskin.LIST_KELUHAN_ID = persentase_keluhan_maskin.LIST_KELUHAN_ID');
	 
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
		$this->db->order_by('persentase_keluhan_maskin.LIST_KELUHAN_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveMekanismePengaduan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('mekanisme_pengaduan_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = mekanisme_pengaduan_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = mekanisme_pengaduan_maskin.TAHUN_ID');
		$this->db->join('list_mekanisme_pengaduan_maskin', 'list_mekanisme_pengaduan_maskin.LIST_MEKANISME_ID = mekanisme_pengaduan_maskin.LIST_MEKANISME_ID');
	 
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
		$this->db->order_by('mekanisme_pengaduan_maskin.LIST_MEKANISME_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveSurveyKeluhan($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('hasil_survey_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = hasil_survey_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = hasil_survey_maskin.TAHUN_ID');
		$this->db->join('list_pelayanan_maskin', 'list_pelayanan_maskin.P_MASKIN_ID = hasil_survey_maskin.P_MASKIN_ID');
	 
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
		$this->db->order_by('hasil_survey_maskin.P_MASKIN_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePerbaikanMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('upaya_perbaikan_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = upaya_perbaikan_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = upaya_perbaikan_maskin.TAHUN_ID'); 
	 
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
		$this->db->order_by('upaya_perbaikan_maskin.TAHUN_ID','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePenyakitTerbanyakRJMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg;
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;  
	 
		$this->db->select('*'); 
		$this->db->from('penyakit_terbanyak_maskin_rj'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = penyakit_terbanyak_maskin_rj.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = penyakit_terbanyak_maskin_rj.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = penyakit_terbanyak_maskin_rj.LIST_TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = penyakit_terbanyak_maskin_rj.ICD10_CODE');
		
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
		$this->db->order_by('penyakit_terbanyak_maskin_rj.LIST_TAHUN_ID','ASC');//revisi
		$this->db->order_by('penyakit_terbanyak_maskin_rj.PENYAKIT_MASKIN_RJ_JML','DESC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrievePenyakitTerbanyakRIMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara; 
	 
		$this->db->select('*'); 
		$this->db->from('penyakit_terbanyak_maskin_ri'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = penyakit_terbanyak_maskin_ri.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = penyakit_terbanyak_maskin_ri.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = penyakit_terbanyak_maskin_ri.LIST_TAHUN_ID');
		$this->db->join('icd10', 'icd10.ICD10_CODE = penyakit_terbanyak_maskin_ri.ICD10_CODE');
		
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
		$this->db->order_by('penyakit_terbanyak_maskin_ri.LIST_TAHUN_ID','ASC');//revisi
		$this->db->order_by('penyakit_terbanyak_maskin_ri.PENYAKIT_MASKIN_RI_JML','DESC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

	public function retrieveTindakanTerbanyakMaskin($in_tahun, $in_rsNoreg, 
	$in_region, $in_kelas, $in_statusPenyelenggara){
	 
		$tahun = $in_tahun;
		$rsNoreg = $in_rsNoreg; 
		$region = $in_region;
		$kelas = $in_kelas; 
		$statusPenyelenggara = $in_statusPenyelenggara;
		
		$this->db->select('*'); 
		$this->db->from('tindakan_terbanyak_maskin'); 
		$this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG = tindakan_terbanyak_maskin.RS_NOREG');
		$this->db->join('tahun', 'tahun.TAHUN_ID = tindakan_terbanyak_maskin.TAHUN_ID');
		$this->db->join('list_tahun', 'list_tahun.LIST_TAHUN_ID = tindakan_terbanyak_maskin.LIST_TAHUN_ID');
	 
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
		$this->db->order_by('tindakan_terbanyak_maskin.LIST_TAHUN_ID','ASC');//revisi
		$this->db->order_by('tindakan_terbanyak_maskin.TM_JUMLAH','ASC');//revisi
		
		$query = $this->db->get(); 
		
		return $query; 
	} 

}
