<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

  Model bab IV

 */

class m_u_bab4 extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputSGR($in_tahunId, $in_rsNoreg, $in_sgrTahun, 
            $in_sgrTahunIni, $in_sgrTahunLalu, $in_sgrPerbandingan, $in_sgr) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $sgrTahun = $in_sgrTahun;
        $sgrTahunIni = $in_sgrTahunIni;
        $sgrTahunLalu = $in_sgrTahunLalu;
        $sgrPerbandingan = $in_sgrPerbandingan;
        $sgr = $in_sgr;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SGR_TAHUN' => $sgrTahun,
            'SGR_PENDAPATAN_TAHUN_INI' => $sgrTahunIni,
            'SGR_PENDAPATAN_TAHUN_LALU' => $sgrTahunLalu,
            'SGR_PERBANDINGAN' => $sgrPerbandingan,
            'SGR_SGR' => $sgr
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SGR_TAHUN' => $sgrTahun,
        );
        if($this->m_bab->cekData('sales_growth_rate', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sales_growth_rate', $data);
        }
        else {
            $status = $this->db->insert('sales_growth_rate', $data);
        }
        return $status;
    }

    function inputCostRecovery($in_tahunId, $in_rsNoreg, $in_crId, 
            $in_crN2, $in_crN1, $in_crN
    ) 
     {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $crId = $in_crId;
        $crN2 = $in_crN2;
        $crN1 = $in_crN1;
        $crN = $in_crN;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_CR_ID' => $crId,
            'CR_JUMLAH_N2' => $crN2,
            'CR_JUMLAH_N1' => $crN1,
            'CR_JUMLAH_N' => $crN
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_CR_ID' => $crId,
        );
        if($this->m_bab->cekData('cost_recovery', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('cost_recovery', $data);
        }
        else {
            $status = $this->db->insert('cost_recovery', $data);
        }
        return $status;
    }

    function inputRasioKeuangan($in_tahunId, $in_rsNoreg, $in_rkId, 
            $in_rkN2, $in_rkN1, $in_rkN) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $rkId = $in_rkId;
        $rkN2 = $in_rkN2;
        $rkN1 = $in_rkN1;
        $rkN = $in_rkN;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_RK_ID' => $rkId,
            'RK_N2' => $rkN2,
            'RK_N1' => $rkN1,
            'RK_N' => $rkN
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_RK_ID' => $rkId,
        );
        if($this->m_bab->cekData('rasio_keuangan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('rasio_keuangan', $data);
        }
        else {
            $status = $this->db->insert('rasio_keuangan', $data);
        }
        return $status;
    }

    function inputAnalisaRasioKeuangan($in_tahunId, $in_rsNoreg, $in_rkId, 
            $in_trend, $in_kesimpulan) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $rkId = $in_rkId;
        $trend = $in_trend;
        $kesimpulan = $in_kesimpulan;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_ANALISA_RK_ID' => $rkId,
            'ARK_TREND' => $trend,
            'ARK_KESIMPULAN' => $kesimpulan
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'LIST_ANALISA_RK_ID' => $rkId,
        );
        if($this->m_bab->cekData('analisa_rasio_keuangan', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('analisa_rasio_keuangan', $data);
        }
        else {
            $status = $this->db->insert('analisa_rasio_keuangan', $data);
        }
        return $status;
    }
    
    function inputSBAnggaran($in_tahunId, $in_rsNoreg, $in_apbd1alok, $in_apbd1guna, $in_apbd1real, $in_apbd2alok, $in_apbd2guna, $in_apbd2real, $in_apbnalok, $in_apbnguna, $in_apbnreal, $in_dakalok, $in_dakguna, $in_dakreal, $in_dbhchtalok, $in_dbhchtguna, $in_dbhchtreal, $in_lainalok, $in_lainguna, $in_lainreal) {
        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;

        $apbd1alok = $in_apbd1alok;
        $apbd1guna = $in_apbd1guna;
        $apbd1real = $in_apbd1real;

        $apbd2alok = $in_apbd2alok;
        $apbd2guna = $in_apbd2guna;
        $apbd2real = $in_apbd2real;

        $apbnalok = $in_apbnalok;
        $apbnguna = $in_apbnguna;
        $apbnreal = $in_apbnreal;

        $dakalok = $in_dakalok;
        $dakguna = $in_dakguna;
        $dakreal = $in_dakreal;

        $dbhchtalok = $in_dbhchtalok;
        $dbhchtguna = $in_dbhchtguna;
        $dbhchtreal = $in_dbhchtreal;

        $lainalok = $in_lainalok;
        $lainguna = $in_lainguna;
        $lainreal = $in_lainreal;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SB_APBD1_ALOKASI' => $apbd1alok,
            'SB_APBD1_PENGGUNAAN' => $apbd1guna,
            'SB_APBD1_REALISASI' => $apbd1real,
            'SB_APBD2_ALOKASI' => $apbd2alok,
            'SB_APBD2_PENGGUNAAN' => $apbd2guna,
            'SB_APBD2_REALISASI' => $apbd2real,
            'SB_APBN_ALOKASI' => $apbnalok,
            'SB_APBN_PENGGUNAAN' => $apbnguna,
            'SB_APBN_REALISASI' => $apbnreal,
            
            'SB_DAK_ALOKASI' => $dakalok,
            'SB_DAK_PENGGUNAAN' => $dakguna,
            'SB_DAK_REALISASI' => $dakreal,
            'SB_DBHCHT_ALOKASI' => $dbhchtalok,
            'SB_DBHCHT_PENGGUNAAN' => $dbhchtguna,
            'SB_DBHCHT_REALISASI' => $dbhchtreal,
            'SB_LAIN_ALOKASI' => $lainalok,
            'SB_LAIN_PENGGUNAAN' => $lainguna,
            'SB_LAIN_REALISASI' => $lainreal,
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
        );
        if($this->m_bab->cekData('sb_anggaran', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('sb_anggaran', $data);
        }
        else {
            $status = $this->db->insert('sb_anggaran', $data);
        }
        return $status;
    }
    
}
