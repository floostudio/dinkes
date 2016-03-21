<?php

//TABEL BAB VI SHEET 1 DAN 2

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of m_bab6
 *
 * @author Iqbal
 */
class m_u_bab6 extends CI_model {

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

    public function inputSurveyRs($in_unitId, $in_tahunId, $in_rsNoreg, $in_nilai_unsur, $in_nrr, $in_indeks_unit_kerja) {

        $status = false;

        $unitId = $in_unitId;
        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $nilaiUnsur = $in_nilai_unsur;
        $nrr = $in_nrr;
        $indeksUnitKerja = $in_indeks_unit_kerja;
        

        $data = array(
            'LIST_SKM_ID' => $unitId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SKM_NILAI_UNSUR' => $nilaiUnsur,
            'SKM_NRR' => $nrr,
            'SKM_NILAI_INDEKS' => $indeksUnitKerja
        );
        
        $where = array (
            'LIST_SKM_ID' => $unitId,
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('survey_kepuasan_masyarakat', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('survey_kepuasan_masyarakat', $data);
        }
        else {
            $status = $this->db->insert('survey_kepuasan_masyarakat', $data);
        }
        return $status;
    }
	
    //Kasus TB Rawat Jalan Berdasarkan Golongan Umur
    public function inputKasusTBrj($in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n) {
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
            'KASUS_TB_RJ_N2' => $n2,
            'KASUS_TB_RJ_N1' => $n1,
            'KASUS_TB_RJ_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
        );
        if ($this->m_bab->cekData('kasus_tb_rj', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_rj', $data);
        } else {
            $status = $this->db->insert('kasus_tb_rj', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Jalan Berdasarkan Jenis TB
    public function inputKasusTBrjJenis($in_tahunId, $in_rsNoreg, $in_jenis, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenis = $in_jenis;
        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
            'KASUS_TB_RJ_JENIS_N2' => $n2,
            'KASUS_TB_RJ_JENIS_N1' => $n1,
            'KASUS_TB_RJ_JENIS_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
        );
        if ($this->m_bab->cekData('kasus_tb_rj_jenis', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_rj_jenis', $data);
        } else {
            $status = $this->db->insert('kasus_tb_rj_jenis', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Inap Berdasarkan Golongan Umur
    public function inputKasusTBri($in_tahunId, $in_rsNoreg, $in_umur, $in_n2, $in_n1, $in_n) {
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
            'KASUS_TB_RI_N2' => $n2,
            'KASUS_TB_RI_N1' => $n1,
            'KASUS_TB_RI_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'GOLONGAN_UMUR_ID' => $umur,
        );
        if ($this->m_bab->cekData('kasus_tb_ri', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_ri', $data);
        } else {
            $status = $this->db->insert('kasus_tb_ri', $data);
        }
        return $status;
    }

    //Kasus TB Rawat Inap Berdasarkan Jenis TB
    public function inputKasusTBriJenis($in_tahunId, $in_rsNoreg, $in_jenis, $in_n2, $in_n1, $in_n) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $jenis = $in_jenis;
        $n2 = $in_n2;
        $n1 = $in_n1;
        $n = $in_n;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
            'KASUS_TB_RI_JENIS_N2' => $n2,
            'KASUS_TB_RI_JENIS_N1' => $n1,
            'KASUS_TB_RI_JENIS_N' => $n
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'JENIS_TB_ID' => $jenis,
        );
        if ($this->m_bab->cekData('kasus_tb_ri_jenis', $where)) {
            $this->db->where($where);
            $status = $this->db->update('kasus_tb_ri_jenis', $data);
        } else {
            $status = $this->db->insert('kasus_tb_ri_jenis', $data);
        }
        return $status;
    }

    public function inputLaptahTB($in_tahunId, $in_rsNoreg, $in_tipe, $in_anak04L, $in_anak04P, $in_anak514L, $in_anak514P, $in_dewasa1524L, $in_dewasa1524P, $in_dewasa2334L, $in_dewasa2334P, $in_dewasa3544L, $in_dewasa3544P, $in_dewasa4554L, $in_dewasa4554P, $in_dewasa5565L, $in_dewasa5565P, $in_dewasa65L, $in_dewasa65P, $in_totalL, $in_totalP, $in_total) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $tipe = $in_tipe;

        $anak04L = $in_anak04L;
        $anak04P = $in_anak04P;
        $anak514L = $in_anak514L;
        $anak514P = $in_anak514P;

        $dewasa1524L = $in_dewasa1524L;
        $dewasa1524P = $in_dewasa1524P;
        $dewasa2334L = $in_dewasa2334L;
        $dewasa2334P = $in_dewasa2334P;

        $dewasa3544L = $in_dewasa3544L;
        $dewasa3544P = $in_dewasa3544P;
        $dewasa4554L = $in_dewasa4554L;
        $dewasa4554P = $in_dewasa4554P;

        $dewasa5565L = $in_dewasa5565L;
        $dewasa5565P = $in_dewasa5565P;
        $dewasa65L = $in_dewasa65L;
        $dewasa65P = $in_dewasa65P;

        $totalL = $in_totalL;
        $totalP = $in_totalP;
        $total = $in_total;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_TB' => $tipe,
            'LAPTAH_TB_ANAK_0_4_L' => $anak04L,
            'LAPTAH_TB_ANAK_0_4_P' => $anak04P,
            'LAPTAH_TB_ANAK_5_14_L' => $anak514L,
            'LAPTAH_TB_ANAK_5_14_P' => $anak514P,
            'LAPTAH_TB_DEWASA_15_24_L' => $dewasa1524L,
            'LAPTAH_TB_DEWASA_15_24_P' => $dewasa1524P,
            'LAPTAH_TB_DEWASA_23_34_L' => $dewasa2334L,
            'LAPTAH_TB_DEWASA_23_34_P' => $dewasa2334P,
            'LAPTAH_TB_DEWASA_35_44_L' => $dewasa3544L,
            'LAPTAH_TB_DEWASA_35_44_P' => $dewasa3544P,
            'LAPTAH_TB_DEWASA_45_54_L' => $dewasa4554L,
            'LAPTAH_TB_DEWASA_45_54_P' => $dewasa4554P,
            'LAPTAH_TB_DEWASA_55_65_L' => $dewasa5565L,
            'LAPTAH_TB_DEWASA_55_65_P' => $dewasa5565P,
            'LAPTAH_TB_DEWASA_65_L' => $dewasa65L,
            'LAPTAH_TB_DEWASA_65_P' => $dewasa65P,
            'LAPTAH_TB_TOTAL_L' => $totalL,
            'LAPTAH_TB_TOTAL_P' => $totalP,
            'LAPTAH_TB_TOTAL' => $total
        );

        $where = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'TIPE_TB' => $tipe,
        );
        if ($this->m_bab->cekData('laptah_penemuan_tb', $where)) {
            $this->db->where($where);
            $status = $this->db->update('laptah_penemuan_tb', $data);
        } else {
            $status = $this->db->insert('laptah_penemuan_tb', $data);
        }
        return $status;
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

}
