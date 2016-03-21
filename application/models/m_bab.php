<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class m_bab extends CI_model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function cekData($tableName, $filter)
    {
      
        $this->db->where($filter);
        $res = $this->db->get($tableName);
        return $res->num_rows();
    }
    
    
    function getBab()
    {
        $result = $this->db->get('bab');
        if($result->num_rows() > 0)
        {
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function cekHistoryUpload($bab, $rs_noreg, $tahun_id)
    {
        $where = array (
            'bab_id' =>   $bab,
            'RS_NOREG' =>   $rs_noreg,
            'TAHUN_ID' =>   $tahun_id,
        );
        $this->db->where($where);
        $query = $this->db->get('history_upload');
        return $query;
    }
    
    public function inputHistoryUpload($bab, $rs_noreg, $tahun_id, $sheet, $error)
    {
        $data = array(
            'bab_id' =>   $bab,
            'RS_NOREG' =>   $rs_noreg,
            'TAHUN_ID' =>   $tahun_id,
            'SHEET_NO' =>   $sheet,
            'ERROR_DETAIL' =>   $error,
        );
        
        $where = array (
            'bab_id' =>   $bab,
            'RS_NOREG' =>   $rs_noreg,
            'SHEET_NO' =>   $sheet,
            'TAHUN_ID' =>   $tahun_id,
        );
      
        if($this->cekData('history_upload', $where))
        {
            $this->db->where($where);
            $status = $this->db->update('history_upload', $data);
        }
        else {
            $status = $this->db->insert('history_upload', $data);
        }
    }
    
    function deleteTableSPM($_tahun, $_noreg, $_kategori)
    {
        $where = array(
            'tahun_id' => $_tahun,
            'rs_noreg' => $_noreg,
            'spm_kategori_id' => $_kategori,
        );
        
        $status = $this->db->delete('spm', $where);
        return $status;
    }
    
    function deleteTable($_tahun, $_noreg, $_table)
    {
        $where = array(
            'tahun_id' => $_tahun,
            'rs_noreg' => $_noreg,
        );
        
        $status = $this->db->delete($_table, $where);
        return $status;
    }
    
    
    function getTable($bab_id)
    {
        $this->db->join('bab','bab.bab_id=bab_list.bab_id');
        $this->db->where('bab.bab_id', $bab_id);
        $result = $this->db->get('bab_list');
        if($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else {
            return array();
        }
    }
    
    function getCollumn($bab_id)
    {
        $this->db->join('bab','bab.bab_id=kolom_list.ID_BAB');
        $this->db->where('bab.bab_id', $bab_id);
        $result = $this->db->get('kolom_list');
        if($result->num_rows() > 0)
        {
            return $result->result_array();
        }
        else {
            return array();
        }
    }
   
    
}
