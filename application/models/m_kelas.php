<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_kelas extends CI_model {

    var $kelas_rs_id;
    var $kelas_rs_nama;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputKelas($status, $kelas_rs_id, $kelas_rs_nama) {
        $this->status = $status;
        $this->kelas_rs_id = $kelas_rs_id;
        $this->kelas_rs_nama = $kelas_rs_nama;

        $data = array(
            'kelas_rs_id' => $this->kelas_rs_id,
            'kelas_rs_nama' => $this->kelas_rs_nama
        );

        $this->status = $this->db->insert('kelas_rs', $data);

        return $this->status;
    }

    public function updateKelas($kelas_rs_id, $kelas_rs_nama) {
        $this->kelas_rs_id = $kelas_rs_id;
        $this->kelas_rs_nama = $kelas_rs_nama;

        $data = array(
            'kelas_rs_id' => $this->kelas_rs_id,
            'kelas_rs_nama' => $this->kelas_rs_nama
        );

        $where = array(
            'kelas_rs_id' => $this->kelas_rs_id,
        );
        $this->db->where($where);
        $status = $this->db->update('kelas_rs', $data);

        return $status;
    }

    public function deleteKelas($kelas_rs_id) {
        $this->kelas_rs_id = $kelas_rs_id;

        $where = array(
            'kelas_rs_id' => $this->kelas_rs_id,
        );

        $this->status = $this->db->delete('kelas_rs', $where);
        return $this->status;
    }

    public function retrieveKelas() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('kelas_rs');
        $this->db->order_by('kelas_rs_id');

        $query = $this->db->get();
        return $query;
    }

}