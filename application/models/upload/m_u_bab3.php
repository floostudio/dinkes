<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class m_u_bab3 extends CI_Model {

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

    function inputPelatihanSDM($in_tahunId, $in_rsNoreg, $in_pelatihanId, $in_tenagaID, $in_uraian, $in_jumlah) {
 
        $data = array(
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LIST_PELATIHAN_ID' => $in_pelatihanId,
            'LS_PELATIHAN_TNG_ID' => $in_tenagaID,
            'LS_PELATIHAN_URAI_ID' => $in_uraian,
            'PELATIHAN_JUMLAH' => $in_jumlah
        );

        $status = $this->db->insert('pelatihan_sdm_2016', $data);

        return $status;
    }
	
}
