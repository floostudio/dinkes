<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_kelas_rs extends CI_model {

    var $status;
    var $id_kelas_rs;
    var $nama_kelas_rs;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputKelas($status, $id_kelas, $nama_kelas) {
        $this->status = $status;
        $this->id_kelas_rs = $id_kelas;
        $this->nama_kelas_rs = $nama_kelas;

        $data = array(
            'kelas_rs_id' => $this->id_kelas_rs,
            'kelas_rs' => $this->nama_kelas_rs
        );

        $this->status = $this->db->insert('kelas_rs', $data);

        return $this->status;
    }

    public function updateKelas($id_kelas, $nama_kelas) {
        $this->status = $status;
        $this->id_kelas_rs = $id_kelas;
        $this->nama_kelas_rs = $nama_kelas;

        $data = array(
            'kelas_rs_id' => $this->id_kelas_rs,
            'kelas_rs' => $this->nama_kelas_rs
        );

        $where = array(
            'kelas_rs_id' => $this->id_kelas_rs,
        );
        $this->db->where($where);
        $this->status = $this->db->update('kelas_rs', $data);

        return $this->status;
    }

    public function deleteKelas($id_kelas) {
        $this->id_kelas_rs = $id_kelas;

        $where = array(
            'kelas_rs_id' => $this->id_kelas_rs,
        );

        $status = $this->db->delete('kelas_rs', $where);
        return $status;
    }

    public function retrieveKelas() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('kelas_rs');
        $this->db->order_by('kelas_rs_id');

        $query = $this->db->get();
        return $query;
    }

}
