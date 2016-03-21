<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_jenis extends CI_model {

    var $rs_jenis_id;
    var $rs_jenis_nama;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputJenis($status, $rs_jenis_id, $rs_jenis_nama) {
        $this->status = $status;
        $this->rs_jenis_id = $rs_jenis_id;
        $this->rs_jenis_nama = $rs_jenis_nama;

        $data = array(
            'rs_jenis_id' => $this->rs_jenis_id,
            'rs_jenis_nama' => $this->rs_jenis_nama
        );

        $this->status = $this->db->insert('rs_jenis', $data);

        return $this->status;
    }

    public function updateJenis($rs_jenis_id, $rs_jenis_nama) {
        $this->rs_jenis_id = $rs_jenis_id;
        $this->rs_jenis_nama = $rs_jenis_nama;

        $data = array(
            'rs_jenis_id' => $this->rs_jenis_id,
            'rs_jenis_nama' => $this->rs_jenis_nama
        );

        $where = array(
            'rs_jenis_id' => $this->rs_jenis_id,
        );
        $this->db->where($where);
        $status = $this->db->update('rs_jenis', $data);

        return $status;
    }

    public function deleteJenis($rs_jenis_id) {
        $this->rs_jenis_id = $rs_jenis_id;

        $where = array(
            'rs_jenis_id' => $this->rs_jenis_id,
        );

        $this->status = $this->db->delete('rs_jenis', $where);
        return $this->status;
    }

    public function retrieveJenis() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('rs_jenis');
        $this->db->order_by('rs_jenis_id');

        $query = $this->db->get();
        return $query;
    }

}