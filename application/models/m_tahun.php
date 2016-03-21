<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_tahun extends CI_model {

    var $status;
    var $id_tahunN;
    var $tahunN;

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputTahun($tahun) { 
        $status = false;
        $this->tahunN = $tahun;
        $data = array(
            'TAHUN_TAHUN' => $this->tahunN
        );
        $status = $this->db->insert('tahun', $data);
        return $status;
    }
	
    public function cekTahun($tahun) { 
        $this->db->select('*'); 
        $this->db->from('tahun'); 
        $where = array(
            'TAHUN_TAHUN' => $tahun
        );
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function updateTahun($id_tahun, $tahun) {
        $this->status = FALSE;
        $this->id_tahunN = $id_tahun;
        $this->tahunN = $tahun;

        $data = array( 
            'TAHUN_TAHUN' => $this->tahunN
        );
        $where = array(
            'TAHUN_ID' => $this->id_tahunN,
        );
        $this->db->where($where);
        $status = $this->db->update('tahun', $data);

        return $status;
    }

    public function deleteTahun($id_tahun) {
        $where = array(
            'id_tahun' => $this->id_tahunN,
        );
        $status = $this->db->delete('tahun', $where);
        return $status;
    }
    
    
    public function retrieveYearName($id) {
        $status = false;
        $where = array(
            'tahun_id' => $id,
        );
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('tahun');
        $this->db->order_by('tahun_tahun');
        $this->db->where($where);

        $query = $this->db->get();
        return $query;
    }

    public function retrieveYear() {
        $status = false;
        $where = array(
            'VISIBLE' => 1,
        );
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('tahun');
        $this->db->order_by('tahun_tahun');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function retrieveYearId($id) {
        $this->db->where('tahun.TAHUN_ID', $id);
        $result = $this->db->get('tahun');
        return $result;
    }
	
	 public function retrieveTahun() { 
        $result = $this->db->get('tahun');
        return $result;
    }

}
