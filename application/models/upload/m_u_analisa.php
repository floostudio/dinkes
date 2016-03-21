<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *

  Model khusus untuk input analisa

 */

class m_u_analisa extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputAnalisa($in_tahunId, $in_rsNoreg, $in_kategoriId, $in_uraian) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kategoriId = $in_kategoriId;
        $uraian = $in_uraian;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'ANALISA_KATEGORI_ID' => $kategoriId, //list_analisa
            'ANALISA_URAIAN' => $uraian
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'ANALISA_KATEGORI_ID' => $kategoriId, //list_analisa
        );
        
        if($this->m_bab->cekData('analisa', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('analisa', $data);
        }
        else {
            $status = $this->db->insert('analisa', $data);
        }
        return $status;
    }

    //tabel SPM (semua Bab, Kebanyakan ada di Bab V, misal tabel V.1.e. Pencapaian Standar Pelayanan Minimal Instalasi Gawat Darurat )
    public function inputSPM($in_tahunId, $in_rsNoreg, $in_kategoriId, $in_indikatorId, $in_standar, $in_numerator, $in_denumerator, $in_pencapaian) {

        $status = false;

        $tahunId = $in_tahunId;
        $rsNoreg = $in_rsNoreg;
        $kategoriId = $in_kategoriId;
        $indikatorId = $in_indikatorId;

        $standar = $in_standar;
        $numerator = $in_numerator;
        $denumerator = $in_denumerator;
        $pencapaian = $in_pencapaian;

        $data = array(
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SPM_KATEGORI_ID' => $kategoriId, //list_kategori_indikator_spm
            'SPM_INDIKATOR_ID' => $indikatorId, //list_indikator_spm
            'SPM_STANDAR' => $standar,
            'SPM_NUMERATOR' => $numerator,
            'SPM_DENUMERATOR' => $denumerator,
            'SPM_PENCAPAIAN' => $pencapaian
        );

        $where = array (
            'TAHUN_ID' => $tahunId,
            'RS_NOREG' => $rsNoreg,
            'SPM_KATEGORI_ID' => $kategoriId, //list_kategori_indikator_spm
            'SPM_INDIKATOR_ID' => $indikatorId, //list_indikator_spm
        );
        if($this->m_bab->cekData('spm', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('spm', $data);
        }
        else {
            $status = $this->db->insert('spm', $data);
        }
        return $status;
    }

    
}
