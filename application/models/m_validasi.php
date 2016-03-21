<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * 
 * Author Iqbal Permana
 * 
 */

class m_validasi extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getReport($c_rsnoreg, $c_tahun) {
        $where = array(
            'history_upload.TAHUN_ID' => $c_tahun,
            'history_upload.RS_NOREG' => $c_rsnoreg,
        );
        
        $this->db->select('rs_nama, tahun_tahun, bab_name, sheet_no, error_detail');
        $this->db->from('history_upload');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG=history_upload.RS_NOREG', 'right');
        $this->db->join('tahun', 'tahun.tahun_id=history_upload.tahun_id');
        $this->db->join('bab', 'bab.bab_id=history_upload.bab_id');
        $this->db->order_by('bab.bab_id');
        $this->db->order_by('sheet_no');
        $this->db->where($where);

        $query = $this->db->get();
        return $query;
    }
    
    public function getHistoryUpload($c_tahun) {
        $status = false;
        $where = array(
            'history_upload.TAHUN_ID' => $c_tahun,
        );
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('history_upload');
        $this->db->where($where);
        $query = $this->db->get();
        return $query;
    }

    public function cekICD10($where) {
        $query = $this->db->get_where('icd10', array('ICD10_CODE' => $where));
        return $query;
    }
    
    public function cekUnitID($where) {
        $query = $this->db->get_where('list_unit', array('UNIT_ID' => $where));
        return $query;
    }
    
    public function inputUser($c_user, $c_email, $c_pass) {
        $status = false;
        $pass = md5($c_pass);
        $user = $c_user;
        $email = $c_email;

        $data = array(
            'user_name' => $user,
            'user_password' => $pass,
            'user_email' => $email,
        );

        $status = $this->db->insert('user', $data);

        return $status;
    }
                
    public function retrieveData($c_tahun) {
        $status = false;
        $where = array(
            'tahun.TAHUN_ID' => $c_tahun,
        );
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('validasi');
        $this->db->join('rumah_sakit', 'rumah_sakit.RS_NOREG=validasi.RS_NOREG', 'right');
        $this->db->join('tahun', 'tahun.tahun_id=tahun.tahun_id');
        $this->db->order_by('rumah_sakit.RS_NOREG');
        $this->db->where($where);

        $query = $this->db->get();
        return $query;
    }

    public function viewEditUser($id) {
        $status = false;
        $where = array('user_id' => $id);
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('user');
        $this->db->where($where);
        $this->db->order_by('user_id');

        $query = $this->db->get();

        return $query;
    }

    public function editUser($c_user, $c_email, $c_pass, $c_id) {
        $status = false;

        $user_name = $c_user;
        $user_id = $c_id;
        $pass = md5($c_pass);
        $email = $c_email;

        $data = array(
            'user_name' => $user_name,
            'user_email' => $email,
            'user_password' => $pass,
        );

        $where = array(
            'user_id' => $user_id,
        );

        $this->db->where($where);
        $status = $this->db->update('user', $data);

        return $status;
    }

    public function deleteUser($id) {
        $where = array(
            'user_id' => $id,
        );
        $status = $this->db->delete('user', $where);
        return $status;
    }

    public function check_login($user, $pass) {
        $pass_ = md5($pass);
        $query = $this->db->get_where('user', array('user_name' => $user, 'user_password' => $pass_), 1);

        if ($query->num_rows() > 0)
            return $query->row();
        else
            return FALSE;
    }

}


/* End of file m_validasi.php */
/* Location: ./application/models/m_validasi.php */
