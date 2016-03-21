<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_bab5_1 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /* BEGIN SHEET 1 - IGD */
    
    function inputTrendKunjunganIGD($in_tjk_thn_id, $in_tjk_rs_noreg, $in_tjk_list_tahun_id, $in_tjk_umum, $in_tjk_bpjs, $in_tjk_jamkesmasda, $in_tjk_spm, $in_tjk_lain, $in_tjk_total) {

        $status = false;

        $tjk_thn_id = $in_tjk_thn_id;
        $tjk_rs_noreg = $in_tjk_rs_noreg;
        $tjk_list_tahun = $in_tjk_list_tahun_id;
        $tjk_umum = $in_tjk_umum;
        $tjk_bpjs = $in_tjk_bpjs;
        $tjk_jamkesmasda = $in_tjk_jamkesmasda;
        $tjk_spm = $in_tjk_spm;
        $tjk_lain = $in_tjk_lain;
        $tjk_total = $in_tjk_total;

        $data = array(
            'TAHUN_ID' => $tjk_thn_id, 
            'RS_NOREG' => $tjk_rs_noreg,
            'LIST_TAHUN_ID' => $tjk_list_tahun, //list tahun
            'TJK_UMUM' => $tjk_umum,
            'TJK_BPJS' => $tjk_bpjs,
            'TJK_JAMKESMASDA' => $tjk_jamkesmasda,
            'TJK_SPM' => $tjk_spm,
            'TJK_LAIN' => $tjk_lain,
            'TJK_TOTAL' => $tjk_total
        );
        
        $where = array (
             'TAHUN_ID' => $tjk_thn_id, 
            'RS_NOREG' => $tjk_rs_noreg,
            'LIST_TAHUN_ID' => $tjk_list_tahun, //list tahun
        );
        
        if($this->m_bab->cekData('kunjungan_igd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kunjungan_igd', $data);
        }
        else {
            $status = $this->db->insert('kunjungan_igd', $data);
        }
        return $status;
    }

    function inputJumlTenagaIGD($in_tahun_id, $in_rs_noreg, $in_igdlist_id, $in_igd_jumlah, $in_igd_jumlah_terlatih, $in_igd_masa_berlaku, $in_igd_ket) {
        $status = false;

        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $igdlis_id = $in_igdlist_id;
        $igd_jumlah = $in_igd_jumlah;
        $igd_jumlah_terlatih = $in_igd_jumlah_terlatih;
        $igd_masa_berlaku = $in_igd_masa_berlaku;
        $igd_keterangan = $in_igd_ket;
        $data = array(
            'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'IGDLIST_ID' => $igdlis_id, //list_tenaga_igd
            'IGD_JUMLAH' => $igd_jumlah,
            'IGD_JUMLAH_TERLATIH' => $igd_jumlah_terlatih,
            'IGD_MASABERLAKU' => $igd_masa_berlaku,
            'IGD_KETERANGAN' => $igd_keterangan
        );

        $where = array (
             'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'IGDLIST_ID' => $igdlis_id, //list_tenaga_igd
        );
        
        if($this->m_bab->cekData('jumlah_tenaga_igd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_tenaga_igd', $data);
        }
        else {
            $status = $this->db->insert('jumlah_tenaga_igd', $data);
        }
        return $status;
    }
    
    function inputSisKomGD($in_tahun_id, $in_rs_noreg, $in_skigdlist_id, $in_skigd_jumlah, $in_skigd_no, $in_skigd_callemr) {
        $status = false;

        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $skigdlist_id = $in_skigdlist_id;
        $skigd_jumlah = $in_skigd_jumlah;
        $skigd_no = $in_skigd_no;
        $skigd_callemr = $in_skigd_callemr;

        $data = array(
            'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'SKIGDLIST_ID' => $skigdlist_id, 
            'SKIGD_JUMLAH' => $skigd_jumlah,
            'SKIGD_NO' => $skigd_no,
            'SKIGD_JUMLAHCALLEMR' => $skigd_callemr,
        );

        $where = array (
             'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'SKIGDLIST_ID' => $skigdlist_id, //list_tenaga_igd
        );
        
        if($this->m_bab->cekData('siskom_kegawatdaruratan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('siskom_kegawatdaruratan', $data);
        }
        else {
            $status = $this->db->insert('siskom_kegawatdaruratan', $data);
        }
        return $status;
    }
    
    function inputSepuluhBesarPenyIGD($in_tahun_id, $in_rs_noreg, $in_icd10_code, $in_peny_igd_nama, $in_peny_igd_jumlah, $in_peny_igd_perse) {
        $status = false;
        
        $icd10_code = $in_icd10_code;
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $peny_igd_nama = $in_peny_igd_nama;
        $peny_igd_jumlah = $in_peny_igd_jumlah;
        $peny_igd_persen = $in_peny_igd_perse;

        $data = array(
            'ICD10_CODE' => $icd10_code,
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
            'PENY_IGD_NAMA' => $peny_igd_nama,
            'PENY_IGD_JMLH' => $peny_igd_jumlah,
            'PENY_IGD_PERSEN' => $peny_igd_persen
        );
        
        $where = array (
             'ICD10_CODE' => $icd10_code,
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
        );
        
        if($this->m_bab->cekData('sepuluh_besar_penyakit_igd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sepuluh_besar_penyakit_igd', $data);
        }
        else {
            $status = $this->db->insert('sepuluh_besar_penyakit_igd', $data);
        }
        return $status;
    }
    
    /* END OF SHEET 1 - IGD */
    
    /* BEGIN SHEET 2 - RUJUKAN */ 
    
    function inputKegiatanRujukanIGD($in_tahun_id, $in_rs_noreg, $in_list_rujukan_id, $in_rujukan_igd_jml_rujukan, $in_rujukan_igd_jml_non_rujukan, $in_rujukan_igd_dirawat, $in_rujukan_igd_dirujuk, $in_rujukan_igd_pulang, $in_rujukan_igd_total_kematian, $in_rujukan_igd_sebelum, $in_rujukan_igd_setelah) {
        $status = FALSE;

        $list_rujukan_id = $in_list_rujukan_id;
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $rujukan_igd_jml_rujukan = $in_rujukan_igd_jml_rujukan;
        $rujukan_igd_jml_non_rujukan = $in_rujukan_igd_jml_non_rujukan;
        $rujukan_igd_dirawat = $in_rujukan_igd_dirawat;
        $rujukan_igd_dirujuk = $in_rujukan_igd_dirujuk;
        $rujukan_igd_pulang = $in_rujukan_igd_pulang;
        $rujukan_igd_total_kematian = $in_rujukan_igd_total_kematian;
        $rujukan_igd_sebelum = $in_rujukan_igd_sebelum;
        $rujukan_igd_setelah = $in_rujukan_igd_setelah;

        $data = array(
            'LISTRUJUKAN_ID' => $list_rujukan_id, //list_rujukan_igd
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
            'RUJUKAN_IGD_JML_RUJUKAN' => $rujukan_igd_jml_rujukan,
            'RUJUKAN_IGD_JML_NON_RUJUKAN' => $rujukan_igd_jml_non_rujukan,
            'RUJUKAN_IGD_DIRAWAT' => $rujukan_igd_dirawat,
            'RUJUKAN_IGD_DIRUJUK' => $rujukan_igd_dirujuk,
            'RUJUKAN_IGD_PULANG' => $rujukan_igd_pulang,
            'RUJUKAN_IGD_TOTAL_KEMATIAN' => $rujukan_igd_total_kematian,
            'RUJUKAN_IGD_SEBELUM' => $rujukan_igd_sebelum,
            'RUJUKAN_IGD_SETELAH' => $rujukan_igd_setelah
        );
        
        $where = array (
             'LISTRUJUKAN_ID' => $list_rujukan_id, //list_rujukan_igd
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
        );
        
        if($this->m_bab->cekData('kegiatan_rujukan_igd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_rujukan_igd', $data);
        }
        else {
            $status = $this->db->insert('kegiatan_rujukan_igd', $data);
        }
        return $status;
    }

    function inputKegiatanRujukan($in_tahun_id, $in_rs_noreg, $in_sr_id, $in_rjk_dari_puskesmas, $in_rjk_dari_fasilitas_lain, $in_rjk_dari_rslain, $in_rjk_kembali_puskesmas, $in_rjk_kembali_fasilitas_lain, $in_rjk_kembali_rs_asal, $in_rjk_pasien_rujukan, $in_rjk_pasien_datang_sendiri, $in_rjk_diterima_kembali) {
        $status = FALSE;

        $sr_id = $in_sr_id;
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        
        $rjk_dari_puskesmas = $in_rjk_dari_puskesmas;
        $rjk_dari_fasilitas_lain = $in_rjk_dari_fasilitas_lain;
        $rjk_dari_rs_lain = $in_rjk_dari_rslain;
        $rjk_kembali_puskesmas = $in_rjk_kembali_puskesmas;
        $rjk_kembali_fasilitas_lain = $in_rjk_kembali_fasilitas_lain;
        $rjk_kembali_rs_asal = $in_rjk_kembali_rs_asal;
        $rjk_pasien_rujukan = $in_rjk_pasien_rujukan;
        $rjk_pasien_datang_sendiri = $in_rjk_pasien_datang_sendiri;
        $rjk_diterima_kembali = $in_rjk_diterima_kembali;

        $data = array(
            'SR_ID' => $sr_id, //list_spesialisasi_rujukan
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
            
            'RJK_DARI_PUSKESMAS' => $rjk_dari_puskesmas,
            'RJK_DARI_FASILITAS_LAIN' => $rjk_dari_fasilitas_lain,
            'RJK_DARI_RSLAIN' => $rjk_dari_rs_lain,
            'RJK_KEMBALI_PUSKESMAS' => $rjk_kembali_puskesmas,
            'RJK_KEMBALI_FASILITAS_LAIN' => $rjk_kembali_fasilitas_lain,
            'RJK_KEMBALI_RS_ASAL' => $rjk_kembali_rs_asal,
            'RJK_PASIEN_RUJUKAN' => $rjk_pasien_rujukan,
            'RJK_PASIEN_DTG_SENDIRI' => $rjk_pasien_datang_sendiri,
            'RJK_DITERIMA_KEMBALI' => $rjk_diterima_kembali
        );
        
        $where = array (
             'SR_ID' => $sr_id, //list_spesialisasi_rujukan
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
        );
        
        if($this->m_bab->cekData('kegiatan_rujukan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_rujukan', $data);
        }
        else {
            $status = $this->db->insert('kegiatan_rujukan', $data);
        }
        return $status;
    }
    
    function  inputSepuluhBesarKasusRujukan($in_tahun_id, $in_rs_noreg, $in_srjkn_kasus, 
            $in_srjkn_puskesmas, $in_srjkn_fasil_lain, $in_srjkn_rs_lain, $in_srjkn_kembali_pusat, 
            $in_srjkn_kembali_faslain, $in_srjkn_kembali_rs){
        $status = false;
        
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $srjkn_kasus = $in_srjkn_kasus;
        $srjkn_puskesmas = $in_srjkn_puskesmas;
        $srjkn_fasil_lain = $in_srjkn_fasil_lain;
        $srjkn_rs_lain = $in_srjkn_rs_lain;
        $srjkn_kembali_pusat = $in_srjkn_kembali_pusat;
        $srjkn_kembali_faslain = $in_srjkn_fasil_lain;
        $srjkn_kembali_rs = $in_srjkn_kembali_rs;
        
        $data = array(
            'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'SRJKN_KASUS' => $srjkn_kasus,
            'SRJKN_PUSKESMAS' => $srjkn_puskesmas,
            'SRJKN_FASIL_LAIN' => $srjkn_fasil_lain,
            'SRJKN_RS_LAIN' => $srjkn_rs_lain,
            'SRJKN_KEMBALI_PUSK' => $srjkn_kembali_pusat,
            'SRJKN_KEMBALI_FASLAIN' => $srjkn_kembali_faslain,
            'SRJKN_KEMBALI_RS' => $srjkn_kembali_rs,
        );

        $where = array (
              'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'SRJKN_KASUS' => $srjkn_kasus,
        );
        
        if($this->m_bab->cekData('sepuluh_besar_rujukan_drbawah', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sepuluh_besar_rujukan_drbawah', $data);
        }
        else {
            $status = $this->db->insert('sepuluh_besar_rujukan_drbawah', $data);
        }
        return $status;
    }
    
    
    function  inputSepuluhBesarKasusRujukanKeAtas($in_tahun_id, $in_rs_noreg,
            $in_srjkn_kasus, $in_srjkn_rujukan, $in_srjkn_datang_sendiri, $in_srjkn_diterima_kembali){
        
        $status = false;
        
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $srjkn_kasus = $in_srjkn_kasus;
        $srjkn_rujukan = $in_srjkn_rujukan;
        $srjkn_datangsendiri = $in_srjkn_datang_sendiri;
        $srjkn_diterimakembali = $in_srjkn_diterima_kembali;
        
        $data = array(
            'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'SRJKN_KASUS' => $srjkn_kasus,
            'SRJKN_RUJUKAN' => $srjkn_rujukan,
            'SRJKN_DATANGSENDIRI' => $srjkn_datangsendiri,
            'SRJKN_DITERIMA_KEMBALI' => $srjkn_diterimakembali
        );

        $where = array (
                'TAHUN_ID' => $tahun_id, 
                'RS_NOREG' => $rs_noreg,
                'SRJKN_KASUS' => $srjkn_kasus,
        );
        
        if($this->m_bab->cekData('sepuluh_besar_rujukan_keatas', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sepuluh_besar_rujukan_keatas', $data);
        }
        else {
            $status = $this->db->insert('sepuluh_besar_rujukan_keatas', $data);
        }
        return $status;
    }
    
    /* END OF SHEET 2 - RUJUKAN */
    
    /* BEGIN SHEET 3 - RAWAT JALAN */
    
    function inputKunjunganRawatJalan($in_tahun_id, $in_rs_noreg, $in_poli_id, $in_krj_lama_l, $in_krj_lama_p, $in_krj_lama_total, $in_krj_baru_l, $in_krj_baru_p, $in_krj_baru_total){
        $status = false;
        
        $poli_id = $in_poli_id;
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $krj_lama_l = $in_krj_lama_l;
        $krj_lama_p = $in_krj_lama_p;
        $krj_lama_total = $in_krj_lama_total;
        $krj_baru_l = $in_krj_baru_l;
        $krj_baru_p = $in_krj_baru_p;
        $krj_baru_total = $in_krj_baru_total;
        
        $data = array (
            'POLI_ID' => $poli_id, //list_poli_rawat_jalan
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
            'KRJ_LAMA_L' => $krj_lama_l,
            'KRJ_LAMA_P' => $krj_lama_p,
            'KRJ_LAMA_TOTAL' => $krj_lama_total,
            'KRJ_BARU_L' => $krj_baru_l,
            'KRJ_BARU_P' => $krj_baru_p,
            'KRJ_BARU_TOTAL' => $krj_baru_total
        );

        $where = array (
              'POLI_ID' => $poli_id, //list_poli_rawat_jalan
            'TAHUN_ID' => $tahun_id,
            'RS_NOREG' => $rs_noreg,
        );
        
        if($this->m_bab->cekData('kunjungan_rawat_jalan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kunjungan_rawat_jalan', $data);
        }
        else {
            $status = $this->db->insert('kunjungan_rawat_jalan', $data);
        }
        return $status;
    }
    
    function inputSepuluhBesarPenyakitRawatJln($in_tahun_id, $in_rs_noreg, $in_icd10_code, $in_peny_rj_nama, $in_peny_rj_jumlah, $in_peny_rj_persentase){
        $status = false;
        
        $tahun_id = $in_tahun_id;
        $rs_noreg = $in_rs_noreg;
        $icd10_code = $in_icd10_code;
        $peny_rj_nama = $in_peny_rj_nama;
        $peny_rj_jumlah = $in_peny_rj_jumlah;
        $peny_rj_persentase = $in_peny_rj_persentase;
        
        $data = array(
            'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'ICD10_CODE' => $icd10_code,
            'PENY_RJ_NAMA' => $peny_rj_nama,
            'PENY_RJ_JUMLAH' => $peny_rj_jumlah,
            'PENY_RJ_PERSENTASE' => $peny_rj_persentase
        );

        $where = array (
             'TAHUN_ID' => $tahun_id, 
            'RS_NOREG' => $rs_noreg,
            'ICD10_CODE' => $icd10_code,
        );
        
        if($this->m_bab->cekData('sepuluh_besar_penyakit_rawat_jalan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sepuluh_besar_penyakit_rawat_jalan', $data);
        }
        else {
            $status = $this->db->insert('sepuluh_besar_penyakit_rawat_jalan', $data);
        }
        return $status;
    }
    
    /* END OF SHEET 3 - RAWAT JALAN */
    
    /* BEGIN SHEET 4 - RAWAT INAP */
    
    //Kegiatan Rawat Inap
    function inputKegiatanRawatInap($in_tahunId, $in_rsNoreg, $in_pelayananId,
        $in_total, $in_pasienHidupL, $in_pasienHidupP,
		$in_pasienMatiK48L, $in_pasienMatiK48P, $in_pasienMatiL48L, $in_pasienMatiL48P,
		$in_lamaDirawat, $in_hariDirawat, $in_vvip, $in_vip,
		$in_kls1, $in_kls2, $in_kls3
		) {
		
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pelayananId = $in_pelayananId; //list_pelayanan_rawat_inap

        $total = $in_total;
        $pasienHidupL = $in_pasienHidupL;
        $pasienHidupP = $in_pasienHidupP;
		
        $pasienMatiK48L = $in_pasienMatiK48L;
        $pasienMatiK48P = $in_pasienMatiK48P;
        $pasienMatiL48L = $in_pasienMatiL48L;
        $pasienMatiL48P = $in_pasienMatiL48P;
		
        $lamaDirawat = $in_lamaDirawat;
        $hariDirawat = $in_hariDirawat;

        $vvip = $in_vvip;
        $vip = $in_vip;

        $kls1 = $in_kls1;
        $kls2 = $in_kls2;
        $kls3 = $in_kls3; 

        $data = array( 
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PEL_RI_ID' => $pelayananId, //list_pelayanan_rawat_inap
            'KRI_TOTAL' => $total,
            'KRI_PASIENHIDUP_L' => $pasienHidupL,
            'KRI_PASIENHIDUP_P' => $pasienHidupP,
            'KRI_PASIENMATI_K48_L' => $pasienMatiK48L,
            'KRI_PASIENMATI_K48_P' => $pasienMatiK48P,
            'KRI_PASIENMATI_L48_L' => $pasienMatiL48L,
            'KRI_PASIENMATI_L48_P' => $pasienMatiL48P,
            'KRI_LAMARAWAT' => $lamaDirawat,
            'KRI_HARIRAWAT' => $hariDirawat,
            'KRI_VVIP' => $vvip,
            'KRI_VIP' => $vip,
            'KRI_KLSI' => $kls1,
            'KRI_KLSII' => $kls2,
            'KRI_KLSIII' => $kls3
        );

        $where = array (
             'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'PEL_RI_ID' => $pelayananId, //list_pelayanan_rawat_inap
        );
        
        if($this->m_bab->cekData('kegiatan_rawat_inap', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kegiatan_rawat_inap', $data);
        }
        else {
            $status = $this->db->insert('kegiatan_rawat_inap', $data);
        }
        return $status;
    }
	
    
    //10 Besar Penyakit Kegiatan Rawat Inap
    function inputPenyakitTerbanyakRI($in_tahunId, $in_rsNoreg, $in_icdCode, 
		$in_penyakitNama, $in_penyakitJumlah, $in_persentase ) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg; 
        $icdCode = $in_icdCode;
        $penyakitNama = $in_penyakitNama;
        $penyakitJumlah = $in_penyakitJumlah;
		$persentase = $in_persentase;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
            'PENY_RI_NAMA' => $penyakitNama,
            'PENY_RI_JMLH' => $penyakitJumlah,
            'PENY_RI_PERSENTASE' => $persentase
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'ICD10_CODE' => $icdCode, /* tabel icd10 */
        );
        
        if($this->m_bab->cekData('sepuluh_besar_penyakit_rawat_inap', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sepuluh_besar_penyakit_rawat_inap', $data);
        }
        else {
            $status = $this->db->insert('sepuluh_besar_penyakit_rawat_inap', $data);
        }
        return $status;
    }
	
    //Diagnosis Kematian Rawat Inap
    function inputKematianRI($in_tahunId, $in_rsNoreg, $in_icdCode, 
		$in_penyakitNama, $in_penyakitJumlah, $in_jumlahKematian , $in_persentase ) 
                {

            $status = false;

            $tahunId = $in_tahunId;
            $rsNoreg = $in_rsNoreg; 
            $icdCode = $in_icdCode;
            $penyakitNama = $in_penyakitNama;
            $penyakitJumlah = $in_penyakitJumlah;
                    $jumlahKematian = $in_jumlahKematian;
                    $persentase = $in_persentase;

            $data = array(
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg, 
                'ICD10_CODE' => $icdCode, /* tabel icd10 */
                'DK_JENIS_PENYAKIT' => $penyakitNama,
                'DK_JML_KASUS' => $penyakitJumlah,
                'DK_JML_KEMATIAN' => $jumlahKematian,
                'DK_PERSEN' => $persentase
            );

            $where = array (
                'TAHUN_ID' => $tahunId,
                'RS_NOREG' => $rsNoreg, 
                'ICD10_CODE' => $icdCode, /* tabel icd10 */
            );

            if($this->m_bab->cekData('diagnosis_kematian_rawat_inap', $where))
            {
                $this->db->where($where);
                $status = $this->db->update('diagnosis_kematian_rawat_inap', $data);
            }
            else {
                $status = $this->db->insert('diagnosis_kematian_rawat_inap', $data);
            }
            return $status;
        }
    
    /* END OF SHEET 4 - RAWAT INAP */
        
    /* BEGIN SHEET 5 - BEDAH / OPERASI */
        
    //Jumlah Operasi - Pelayanan Bedah
    function inputJumlahOperasi($in_tahunId, $in_rsNoreg, $in_operasiId, 
		$in_khususN2, $in_besarN2, $in_sedangN2 , $in_kecilN2, $in_totalN2,
		$in_khususN1, $in_besarN1, $in_sedangN1 , $in_kecilN1, $in_totalN1,
		$in_khususN, $in_besarN, $in_sedangN , $in_kecilN, $in_totalN
		) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg; 
        $operasiId = $in_operasiId;
		
        $khususN2 = $in_khususN2;
        $besarN2 = $in_besarN2;
		$sedangN2 = $in_sedangN2;
		$kecilN2 = $in_kecilN2;
		$totalN2 = $in_totalN2; 
		
		$khususN1 = $in_khususN1;
        $besarN1 = $in_besarN1;
		$sedangN1 = $in_sedangN1;
		$kecilN1 = $in_kecilN1;
		$totalN1 = $in_totalN1; 
		
		$khususN = $in_khususN;
        $besarN = $in_besarN;
		$sedangN = $in_sedangN;
		$kecilN = $in_kecilN;
		$totalN = $in_totalN; 
		

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'JENIS_OPERASI_ID' => $operasiId, /* list_jenis_operasi */
			
            'OPERASI_KHUSUS_N2' => $khususN2,
            'OPERASI_BESAR_N2' => $besarN2,
            'OPERASI_SEDANG_N2' => $sedangN2,
            'OPERASI_KECIL_N2' => $kecilN2,
            'OPERASI_TOTAL_N2' => $totalN2,

            'OPERASI_KHUSUS_N1' => $khususN1,
            'OPERASI_BESAR_N1' => $besarN1,
            'OPERASI_SEDANG_N1' => $sedangN1,
            'OPERASI_KECIL_N1' => $kecilN1,
            'OPERASI_TOTAL_N1' => $totalN1,

            'OPERASI_KHUSUS_N' => $khususN,
            'OPERASI_BESAR_N' => $besarN,
            'OPERASI_SEDANG_N' => $sedangN,
            'OPERASI_KECIL_N' => $kecilN,
            'OPERASI_TOTAL_N' => $totalN
			
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'JENIS_OPERASI_ID' => $operasiId, /* list_jenis_operasi */
        );
        
        if($this->m_bab->cekData('jumlah_operasi_bedah', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_operasi_bedah', $data);
        }
        else {
            $status = $this->db->insert('jumlah_operasi_bedah', $data);
        }
        return $status;
    }
	
    /* END OF SHEET 5 BEDAH / OPERASI */
    
    /* BEGIN SHEET 6 - PERSALINAN & PERINATOLOGI*/
    
    //Hasil Pelayanan Persalinan tabel list list_pelayanan_persalinan
    function inputPelayananPersalinan($in_tahunId, $in_rsNoreg, $in_pelayananId, 
		$in_rujukanTotalT1, $in_rujukanMeninggalT1, 
		$in_sendiriTotalT1, $in_sendiriMeninggalT1, $in_dirujukT1		
		) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg; 
        $pelayananId = $in_pelayananId;
		
        $rujukanTotalT1 = $in_rujukanTotalT1;
        $rujukanMeninggalT1 = $in_rujukanMeninggalT1;
		$sendiriTotalT1 = $in_sendiriTotalT1;
		$sendiriMeninggalT1 = $in_sendiriMeninggalT1;
		$dirujukT1 = $in_dirujukT1; 
		
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'PP_ID' => $pelayananId, /* list_pelayanan_persalinan */
			
            'PERSALINAN_RUJUKAN_TOTAL' => $rujukanTotalT1,
            'PERSALINAN_RUJUKAN_MENINGGAL' => $rujukanMeninggalT1,
			'PERSALINAN_NONRUJUKAN_TOTAL' => $sendiriTotalT1,
			'PERSALINAN_NONRUJUKAN_MENINGGAL' => $sendiriMeninggalT1,
			'PERSALINAN_DIRUJUK' => $dirujukT1
        );
        
        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'PP_ID' => $pelayananId, /* list_pelayanan_persalinan */
        );
        
        if($this->m_bab->cekData('hasil_pelayanan_persalinan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('hasil_pelayanan_persalinan', $data);
        }
        else {
            $status = $this->db->insert('hasil_pelayanan_persalinan', $data);
        }
        return $status;
    }
	
    //Hasil Pelayanan Perinatologi dan Neonatologi //list_pelayanan_perinatologi
    function inputPelayananPerinatologi($in_tahunId, $in_rsNoreg, $in_pelayananId, 
		$in_rujukanTotalT1, $in_rujukanMeninggalT1, 
		$in_sendiriTotalT1, $in_sendiriMeninggalT1, $in_dirujukT1		
		) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg; 
        $pelayananId = $in_pelayananId;
		
        $rujukanTotalT1 = $in_rujukanTotalT1;
        $rujukanMeninggalT1 = $in_rujukanMeninggalT1;
		$sendiriTotalT1 = $in_sendiriTotalT1;
		$sendiriMeninggalT1 = $in_sendiriMeninggalT1;
		$dirujukT1 = $in_dirujukT1; 
		
        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'PPR_ID' => $pelayananId, /* list_pelayanan_perinatologi */
			
            'PERINATOLOGI_RUJUKAN_TOTAL' => $rujukanTotalT1,
            'PERINATOLOGI_RUJUKAN_MENINGGAL' => $rujukanMeninggalT1,
			'PERINATOLOGI_NONRUJUKAN_TOTAL' => $sendiriTotalT1,
			'PERINATOLOGI_NONRUJUKAN_MENINGGAL' => $sendiriMeninggalT1,
			'PERINATOLOGI_DIRUJUK' => $dirujukT1
        );


        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg, 
            'PPR_ID' => $pelayananId, /* list_pelayanan_perinatologi */
        );
        
        if($this->m_bab->cekData('hasil_pelayanan_perinatologi', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('hasil_pelayanan_perinatologi', $data);
        }
        else {
            $status = $this->db->insert('hasil_pelayanan_perinatologi', $data);
        }
        return $status;
    }
    
    /* END OF SHEET 6 - PERSALINAN & PERINATOLOGI*/
}
