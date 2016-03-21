<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_stat_penyelenggara extends CI_model {

    var $rs_stat_id;
    var $rs_stat_nama;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputStatPenyelenggara($status, $rs_stat_id, $rs_stat_nama) {
        $this->status = $status;
        $this->rs_stat_id = $rs_stat_id;
        $this->rs_stat_nama = $rs_stat_nama;

        $data = array(
            'rs_stat_id' => $this->rs_stat_id,
            'rs_stat_nama' => $this->rs_stat_nama
        );

        $this->status = $this->db->insert('rs_stat_penyelenggara', $data);

        return $this->status;
    }

    public function updateStatPenyelenggara($rs_stat_id, $rs_stat_nama) {
        $this->rs_stat_id = $rs_stat_id;
        $this->rs_stat_nama = $rs_stat_nama;

        $data = array(
            'rs_stat_id' => $this->rs_stat_id,
            'rs_stat_nama' => $this->rs_stat_nama
        );

        $where = array(
            'rs_stat_id' => $this->rs_stat_id,
        );
        $this->db->where($where);
        $status = $this->db->update('rs_stat_penyelenggara', $data);

        return $status;
    }

    public function deleteStatPenyelenggara($rs_stat_id) {
        $this->rs_stat_id = $rs_stat_id;

        $where = array(
            'rs_stat_id' => $this->rs_stat_id,
        );

        $this->status = $this->db->delete('rs_stat_penyelenggara', $where);
        return $this->status;
    }

    public function retrieveStatPenyelenggara() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('rs_stat_penyelenggara');
        $this->db->order_by('rs_stat_id');

        $query = $this->db->get();
        return $query;
    }

}