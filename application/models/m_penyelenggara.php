<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_penyelenggara extends CI_model {

    var $rs_penyelenggara_id;
    var $rs_penyelenggara_nama;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputPenyelenggara($status, $rs_penyelenggara_id, $rs_penyelenggara_nama) {
        $this->status = $status;
        $this->rs_penyelenggara_id = $rs_penyelenggara_id;
        $this->rs_penyelenggara_nama = $rs_penyelenggara_nama;

        $data = array(
            'rs_penyelenggara_id' => $this->rs_penyelenggara_id,
            'rs_penyelenggara_nama' => $this->rs_penyelenggara_nama
        );

        $this->status = $this->db->insert('rs_penyelenggara', $data);

        return $this->status;
    }

    public function updatePenyelenggara($rs_penyelenggara_id, $rs_penyelenggara_nama) {
        $this->rs_penyelenggara_id = $rs_penyelenggara_id;
        $this->rs_penyelenggara_nama = $rs_penyelenggara_nama;

        $data = array(
            'rs_penyelenggara_id' => $this->rs_penyelenggara_id,
            'rs_penyelenggara_nama' => $this->rs_penyelenggara_nama
        );

        $where = array(
            'rs_penyelenggara_id' => $this->rs_penyelenggara_id,
        );
        $this->db->where($where);
        $status = $this->db->update('rs_penyelenggara', $data);

        return $status;
    }

    public function deletePenyelenggara($rs_penyelenggara_id) {
        $this->rs_penyelenggara_id = $rs_penyelenggara_id;

        $where = array(
            'rs_penyelenggara_id' => $this->rs_penyelenggara_id,
        );

        $this->status = $this->db->delete('rs_penyelenggara', $where);
        return $this->status;
    }

    public function retrievePenyelenggara() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('rs_penyelenggara');
        $this->db->order_by('rs_penyelenggara_id');

        $query = $this->db->get();
        return $query;
    }

}