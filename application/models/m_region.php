<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_region extends CI_model {

    var $status;
    var $id_region_rs;
    var $nm_region_rs;
    var $ket_region_rs;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputRegion($status, $id_reg, $nama_reg, $ket_reg) {
        $this->status = $status;
        $this->id_region_rs = $id_reg;
        $this->nm_region_rs = $nama_reg;
        $this->ket_region_rs = $ket_reg;

        $data = array(
            'id_list_region' => $this->id_region_rs,
            'nm_list_region' => $this->nm_region_rs,
            'ket_list_region' => $this->ket_region_rs
        );

        $this->status = $this->db->insert('list_region', $data);

        return $this->status;
    }

    public function updateRegion($id_reg, $nama_reg, $ket_reg) {
        $this->status = $status;
        $this->id_region_rs = $id_reg;
        $this->nm_region_rs = $nama_reg;
        $this->ket_region_rs = $ket_reg;

        $data = array(
            'id_list_region' => $this->id_region_rs,
            'nm_list_region' => $this->nm_region_rs,
            'ket_list_region' => $this->ket_region_rs
        );

        $where = array(
            'id_list_region' => $this->id_status_rs,
        );
        $this->db->where($where);
        $status = $this->db->update('list_region', $data);

        return $status;
    }

    public function deleteRegion($id_reg) {
        $this->id_region_rs = $id_reg;

        $where = array(
            'id_list_region' => $this->id_region_rs,
        );

        $this->status = $this->db->delete('list_region', $where);
        return $this->status;
    }

    public function retrieveRegion() {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('list_region');
        $this->db->order_by('id_list_region');

        $query = $this->db->get();
        return $query;
    }

}
