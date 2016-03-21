<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class m_u_rl4 extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function inputRL4A($in_tahunId, $in_rsNoreg, $in_listRL4Penyakit, $in_listRL4Parameter, $in_value) {
 
        $data = array(
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit,
            'LS_RL4_PARAM_ID' => $in_listRL4Parameter,
            'VALUE' => $in_value
        );

        $status = $this->db->insert('RL4A', $data);

        return $status;
    }
    function inputRL4B($in_tahunId, $in_rsNoreg, $in_listRL4Penyakit, $in_listRL4Parameter, $in_value) {
 
        $data = array(
            'TAHUN_ID' => $in_tahunId,
            'RS_NOREG' => $in_rsNoreg,
            'LS_RL4_ID' => $in_listRL4Penyakit,
            'LS_RL4_PARAM_ID' => $in_listRL4Parameter,
            'VALUE' => $in_value
        );

        $status = $this->db->insert('RL4B', $data);

        return $status;
    }
	
}
