<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class m_list_jenis extends CI_model {

    var $status;
    var $id_jenis_rs;
    var $nama_jenis_rs;
    var $uraian_jns_rs;
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputJenis($status, $id_jenis, $nama_jenis, $uraian_jenis) {
        $this->status = $status;
        $this->id_jenis_rs = $id_jenis;
        $this->nama_jenis_rs = $nama_jenis;
        $this->uraian_jns_rs = $uraian_jenis;

        $data = array(
            'jenis_rs_id' => $this->id_jenis_rs,
            'jenis_rs_nama' => $this->nama_jenis_rs,
            'jensi_rs_uraian' => $this->uraian_jns_rs
        );

        $this->status = $this->db->insert('list_jenis_rs', $data);

        return $this->status;
    }

    public function updateJenis($id_jenis, $nama_jenis, $uraian_jenis) {
        $this->status = $status;
        $this->id_jenis_rs = $id_jenis;
        $this->nama_jenis_rs = $nama_jenis;
        $this->uraian_jns_rs = $uraian_jenis;

        $data = array(
            'jenis_rs_id' => $this->id_jenis_rs,
            'jenis_rs_nama' => $this->nama_jenis_rs,
            'jensi_rs_uraian' => $this->uraian_jns_rs
        );
        
        $where = array(
            'jenis_rs_id' => $this->id_jenis_rs,
        );
        $this->db->where($where);
        $this->status = $this->db->update('list_jenis_rs', $data);

        return $this->status;
    }

    public function deleteJenis($id_jenis) {
        $this->id_jenis_rs = $id_jenis;
        
        $where = array(
            'jenis_rs_id' => $this->id_jenis_rs,
        );
        
        $status = $this->db->delete('list_jenis_rs', $where);
        return $status;
    }

    public function retrieveListJenis() {        
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('list_jenis_rs');
        $this->db->order_by('jenis_rs_id');

        $query = $this->db->get();
        return $query;
    }

}