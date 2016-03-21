<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_u_bab2_2 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*Begin-Input*/
    public function inputDataRS($_inTahunID, $_inRsNoReg, $_inParameterID, $_inValue) {
        $status = false;

        $data = array(
            'RS_NOREG' => $_inRsNoReg,
            'TAHUN_ID' => $_inTahunID,
            'LS_DT_RS_ID' => $_inParameterID,
            'DT_RS_NILAI' => $_inValue
        );

        $where = array (
            'RS_NOREG' => $_inRsNoReg,
            'TAHUN_ID' => $_inTahunID,
            'LS_DT_RS_ID' => $_inParameterID,
        );
        if($this->m_bab->cekData('data_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('data_rs', $data);
        }
        else {
            $status = $this->db->insert('data_rs', $data);
        }
        return $status;
    }
    
    
    public function inputTempatTidur($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_peralatanJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $peralatanJumlah = $in_peralatanJumlah;

        $data = array(
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'JENIS_TT_ID' => $peralatanId,
            'KTT_JUMLAH' => $peralatanJumlah
        );

        $where = array (
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'JENIS_TT_ID' => $peralatanId,
        );
        if($this->m_bab->cekData('kapasitas_tempat_tidur', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('kapasitas_tempat_tidur', $data);
        }
        else {
            $status = $this->db->insert('kapasitas_tempat_tidur', $data);
        }
        return $status;
    }
    
    public function inputSebaranTempatTidur($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_peralatanJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $peralatanJumlah = $in_peralatanJumlah;

        $data = array(
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'JENIS_TT_ID' => $peralatanId,
            'KTT_JUMLAH' => $peralatanJumlah
        );

        $where = array (
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'JENIS_TT_ID' => $peralatanId,
        );
        if($this->m_bab->cekData('persebaran_tempat_tidur', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('persebaran_tempat_tidur', $data);
        }
        else {
            $status = $this->db->insert('persebaran_tempat_tidur', $data);
        }
        return $status;
    }
    
    public function inputAmbulans($in_tahunID, $in_rsNoreg, $in_AT, $in_AT_Baik, $in_AT_Rusak_Ringan, $in_AT_Rusak_Berat, $in_AGD, $in_AGD_Baik, $in_AGD_Rusak_Ringan, $in_AGD_Rusak_Berat, $in_jenazah) {
        $status = false;

        $tahunId = $in_tahunID;
        $rsNoreg = $in_rsNoreg;

        $data = array(
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'AMB_TRANS_JML' => $in_AT,
            'AMB_TRANS_BAIK' => $in_AT_Baik,
            'AMB_TRANS_RUSAK_RINGAN' => $in_AT_Rusak_Ringan,
            'AMB_TRANS_RUSAK_BERAT' => $in_AT_Rusak_Berat,
            'AMB_GD_JML' => $in_AGD,
            'AMB_GD_BAIK' => $in_AGD_Baik,
            'AMB_GD_RUSAK_RINGAN' => $in_AGD_Rusak_Ringan,
            'AMB_GD_RUSAK_BERAT' => $in_AGD_Rusak_Berat,
            'AMB_JENAZAH' => $in_jenazah,
        );

        $where = array (
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
        );
        if($this->m_bab->cekData('jumlah_ambulans_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('jumlah_ambulans_rs', $data);
        }
        else {
            $status = $this->db->insert('jumlah_ambulans_rs', $data);
        }
        return $status;
    }
    
    public function inputIGD($in_tahunId, $in_rsNoreg, $in_pasienLn2, $in_pasienPn2, $in_pasienTotalN2, $in_pasienLn1, $in_pasienPn1, $in_pasienTotalN1, $in_pasienLn, $in_pasienPn, $in_pasienTotalN) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $pasienLn2 = $in_pasienLn2;
        $pasienPn2 = $in_pasienPn2;
        $pasienTotalN2 = $in_pasienTotalN2;

        $pasienLn1 = $in_pasienLn1;
        $pasienPn1 = $in_pasienPn1;
        $pasienTotalN1 = $in_pasienTotalN1;

        $pasienLn = $in_pasienLn;
        $pasienPn = $in_pasienPn;
        $pasienTotalN = $in_pasienTotalN;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KIGD_PASIEN_L_N2' => $pasienLn2,
            'KIGD_PASIEN_P_N2' => $pasienPn2,
            'KIGD_PASIEN_TOTAL_N2' => $pasienTotalN2,
            'KIGD_PASIEN_L_N1' => $pasienLn1,
            'KIGD_PASIEN_P_N1' => $pasienPn1,
            'KIGD_PASIEN_TOTAL_N1' => $pasienTotalN1,
            'KIGD_PASIEN_L_N' => $pasienLn,
            'KIGD_PASIEN_P_N' => $pasienPn,
            'KIGD_PASIEN_TOTAL_N' => $pasienTotalN,
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('igd', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('igd', $data);
        }
        else {
            $status = $this->db->insert('igd', $data);
        }
        return $status;
    }

    public function inputIRJ($in_tahunId, $in_rsNoreg, $in_pasienKategoriId, $in_irjPasienLn2, $in_irjPasienPn2, $in_irjPasienTotalN2, $in_irjPasienLn1, $in_irjPasienPn1, $in_irjPasienTotalN1, $in_irjPasienLn, $in_irjPasienPn, $in_irjPasienTotalN) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pasienKategoriId = $in_pasienKategoriId;

        $irjPasienLn2 = $in_irjPasienLn2;
        $irjPasienPn2 = $in_irjPasienPn2;
        $irjPasienTotalN2 = $in_irjPasienTotalN2;

        $irjPasienLn1 = $in_irjPasienLn1;
        $irjPasienPn1 = $in_irjPasienPn1;
        $irjPasienTotalN1 = $in_irjPasienTotalN1;

        $irjPasienLn = $in_irjPasienLn;
        $irjPasienPn = $in_irjPasienPn;
        $irjPasienTotalN = $in_irjPasienTotalN;

        $data = array(
            'TAHUN_id' => $tahunId,
            'rs_noreg' => $rsNoreg,
            'pasien_kategori_id' => $pasienKategoriId,
            'irj_pasien_l_n2' => $irjPasienLn2,
            'irj_pasien_p_n2' => $irjPasienPn2,
            'irj_pasien_total_n2' => $irjPasienTotalN2,
            'irj_pasien_l_n1' => $irjPasienLn1,
            'irj_pasien_p_n1' => $irjPasienPn1,
            'irj_pasien_total_n1' => $irjPasienTotalN1,
            'irj_pasien_l_n' => $irjPasienLn,
            'irj_pasien_p_n' => $irjPasienPn,
            'irj_pasien_total_n' => $irjPasienTotalN
        );

        $where = array (
            'TAHUN_id' => $tahunId,
            'rs_noreg' => $rsNoreg,
            'pasien_kategori_id' => $pasienKategoriId,
        );
        if($this->m_bab->cekData('irj', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('irj', $data);
        }
        else {
            $status = $this->db->insert('irj', $data);
        }
        return $status;
    }

    public function inputIRI($in_tahunId, $in_rsNoreg, $in_pasienKategoriId, $in_iriJumlahN2, $in_iriJumlahN1, $in_iriJumlahN) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pasienKategoriId = $in_pasienKategoriId;

        $iriJumlahN2 = $in_iriJumlahN2;
        $iriJumlahN1 = $in_iriJumlahN1;
        $iriJumlahN = $in_iriJumlahN;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KATEGORI_PASIEN_ID' => $pasienKategoriId,
            'IRI_JUMLAH_N2' => $iriJumlahN2,
            'IRI_JUMLAH_N1' => $iriJumlahN1,
            'IRI_JUMLAH_N' => $iriJumlahN
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'KATEGORI_PASIEN_ID' => $pasienKategoriId,
        );
        if($this->m_bab->cekData('iri', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('iri', $data);
        }
        else {
            $status = $this->db->insert('iri', $data);
        }
        return $status;
    }

    public function inputTingkatEfisiensi($in_tahunId, $in_rsNoreg, $in_efisiensiId, $in_nilaiN2, $in_nilaiN1, $in_nilaiN, $in_rerata) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $efisiensiId = $in_efisiensiId;

        $nilaiN2 = $in_nilaiN2;
        $nilaiN1 = $in_nilaiN1;
        $nilaiN = $in_nilaiN;

        $rerata = $in_rerata;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'DEFF_ID' => $efisiensiId,
            'RS_NOREG' => $rsNoreg,
            'EFF_NILAI_N2' => $nilaiN2,
            'EFF_NILAI_N1' => $nilaiN1,
            'EFF_NILAI_N' => $nilaiN,
            'EFF_RERATA' => $rerata
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'DEFF_ID' => $efisiensiId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('tingkat_efisiensi_rs', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('tingkat_efisiensi_rs', $data);
        }
        else {
            $status = $this->db->insert('tingkat_efisiensi_rs', $data);
        }
        return $status;
    }
    /*End-Input*/
    
    /* Unused Function */
    
    public function inputPelayanan($in_tahunId, $in_rsNoreg, $in_pelayananId, $in_kondisi, $in_keterangan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $pelayananId = $in_pelayananId;
        $kondisi = $in_kondisi;
        $keterangan = $in_keterangan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LP_ID' => $pelayananId,
            'PELAYANAN_KETERSEDIAAN' => $kondisi,
            'PELAYANAN_KET' => $keterangan
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LP_ID' => $pelayananId,
        );
        if($this->m_bab->cekData('pelayanan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('pelayanan', $data);
        }
        else {
            $status = $this->db->insert('pelayanan', $data);
        }
        return $status;
    }

    public function inputPeralatanCanggih($in_tahunId, $in_rsNoreg, $in_peralatanId, $in_peralatanJumlah) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $peralatanId = $in_peralatanId;
        $peralatanJumlah = $in_peralatanJumlah;

        $data = array(
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'LPC_ID' => $peralatanId,
            'PC_JUMLAH' => $peralatanJumlah
        );

        $where = array (
            'RS_NOREG' => $rsNoreg,
            'TAHUN_ID' => $tahunId,
            'LPC_ID' => $peralatanId,
        );
        if($this->m_bab->cekData('peralatan_canggih', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('peralatan_canggih', $data);
        }
        else {
            $status = $this->db->insert('peralatan_canggih', $data);
        }
        return $status;
    }

}
