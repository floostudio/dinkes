<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class m_u_rl4 extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputRL4A($in_tahunId, $in_rsNoreg, $in_listRL4Penyakit, $in_value) {
        $data = array(
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit,
            '0-6_hr_L' => $in_value['E'], '0-6_hr_P' => $in_value['F'],
            '7-28_hr_L' => $in_value['G'], '7-28_hr_P' => $in_value['H'],
            '28hr<1th_L' => $in_value['I'], '28hr<1th_P' => $in_value['J'],
            '1-4th_L' => $in_value['K'], '1-4th_P' => $in_value['L'],
            '5-14th_L' => $in_value['M'], '5-14th_P' => $in_value['N'],
            '15-24th_L' => $in_value['O'], '15-24th_P' => $in_value['P'],
            '25-44th_L' => $in_value['Q'], '25-44th_P' => $in_value['R'],
            '45-64th_L' => $in_value['S'], '45-64th_P' => $in_value['T'],
            '>65th_L' => $in_value['U'], '>65th_P' => $in_value['V'],
            'Pasien_Keluar_LK' => $in_value['W'], 'Pasien_Keluar_PR' => $in_value['X'],
            'Pasien_Keluar_Hidup' => $in_value['Y'], 'Pasien_Keluar_Mati' => $in_value['Z'],
        );
        $where = array (
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit
        );
    
        if($this->m_bab->cekData('RL4A', $where)) {
            $this->db->where($where);
            $status = $this->db->update('RL4A', $data);
        }
        else {
            $status = $this->db->insert('RL4A', $data);
        }
        return $status;
    }
    function inputRL4B($in_tahunId, $in_rsNoreg, $in_listRL4Penyakit, $in_value) {
 
        $data = array(
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit,
            '0-6_hr_L' => $in_value['E'], '0-6_hr_P' => $in_value['F'],
            '7-28_hr_L' => $in_value['G'], '7-28_hr_P' => $in_value['H'],
            '28hr<1th_L' => $in_value['I'], '28hr<1th_P' => $in_value['J'],
            '1-4th_L' => $in_value['K'], '1-4th_P' => $in_value['L'],
            '5-14th_L' => $in_value['M'], '5-14th_P' => $in_value['N'],
            '15-24th_L' => $in_value['O'], '15-24th_P' => $in_value['P'],
            '25-44th_L' => $in_value['Q'], '25-44th_P' => $in_value['R'],
            '45-64th_L' => $in_value['S'], '45-64th_P' => $in_value['T'],
            '>65th_L' => $in_value['U'], '>65th_P' => $in_value['V'],
            'Pasien_Keluar_LK' => $in_value['W'], 'Pasien_Keluar_PR' => $in_value['X'],
            'Pasien_Keluar_Hidup' => $in_value['Y'], 'Pasien_Keluar_Mati' => $in_value['Z'],
        );
        $where = array (
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit
        );
        
        if($this->m_bab->cekData('RL4B', $where)) {
            $this->db->where($where);
            $status = $this->db->update('RL4B', $data);
        }
        else {
            $status = $this->db->insert('RL4B', $data);
        }
        
        return $status;
    }
	
}
