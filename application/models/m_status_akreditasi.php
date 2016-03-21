<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_status_akreditasi extends CI_model {

    var $status;
    var $id_akreditasi_rs;
    var $status_akreditasi;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputAkreditasi($status, $id_akr, $status_rs) {
        $this->status = $status;
        $this->id_akreditasi_rs = $id_akr;
        $this->status_akreditasi = $status_rs;

        $data = array(
            'akreditasi_id' => $this->id_akreditasi_rs,
            'akreditasi_rs_status' => $this->status_rs
        );

        $this->status = $this->db->insert('status_penyelenggara', $data);

        return $this->status;
    }

    public function updateAkreditasi($id_status, $status_rs) {
        $this->status = $status;
        $this->id_akreditasi_rs = $id_akr;
        $this->status_akreditasi = $status_rs;

        $data = array(
            'akreditasi_id' => $this->id_akreditasi_rs,
            'akreditasi_rs_status' => $this->status_rs
        );

        $where = array(
            'akreditasi_id' => $this->id_akreditasi_rs,
        );
        $this->db->where($where);
        $status = $this->db->update('status_akreditasi_rs', $data);

        return $status;
    }

    public function deleteAkreditasi($id_status) {
        $this->id_status_rs = $id_status;

        $where = array(
            'akreditasi_id' => $this->id_akreditasi_rs,
        );

        $this->status = $this->db->delete('status_akreditasi_rs', $where);
        return $this->status;
    }

    public function retrieveAkreditasi() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('status_akreditasi_rs');
        $this->db->order_by('akreditasi_id');

        $query = $this->db->get();
        return $query;
    }

}
