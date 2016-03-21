<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_status_penyelenggara extends CI_model {

    var $status;
    var $id_status_rs;
    var $status_rs;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputPenyelenggara($status, $id_status, $status_rs) {
        $this->status = $status;
        $this->id_status_rs = $id_status;
        $this->status_rs = $status_rs;

        $data = array(
            'status_rs_id' => $this->id_status_rs,
            'status_rs' => $this->status_rs
        );

        $this->status = $this->db->insert('status_penyelenggara_rs', $data);

        return $this->status;
    }

    public function updateKelasPenyelenggara($id_status, $status_rs) {
        $this->id_status_rs = $id_status;
        $this->status_rs = $status_rs;

        $data = array(
            'status_rs_id' => $this->id_status_rs,
            'status_rs' => $this->status_rs
        );

        $where = array(
            'status_rs_id' => $this->id_status_rs,
        );
        $this->db->where($where);
        $status = $this->db->update('status_penyelenggara_rs', $data);

        return $status;
    }

    public function deletePenyelenggara($id_status) {
        $this->id_status_rs = $id_status;

        $where = array(
            'status_rs_id' => $this->id_status_rs,
        );

        $this->status = $this->db->delete('status_penyelenggara_rs', $where);
        return $this->status;
    }

    public function retrievePenyelenggara() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('status_penyelenggara_rs');
        $this->db->order_by('status_rs_id');

        $query = $this->db->get();
        return $query;
    }

}
