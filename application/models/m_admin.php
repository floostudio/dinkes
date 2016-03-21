<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class m_admin extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inputUser($c_user, $c_email, $c_pass) {
        
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
                
    public function retrieveUsers() {
        $status = false;
        $where = array(
            'user_id' => 1,
        );
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('user');
        $this->db->order_by('user_id');
        //$this->db->where('user_id >', 1);

        $query = $this->db->get();
        return $query;
    }

    public function viewEditUser($id) {
        
        $where = array('user_id' => $id);
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('user');
        $this->db->where($where);
        $this->db->order_by('user_id');

        $query = $this->db->get();

        return $query;
    }

    public function editUser($c_user, $c_email, $c_pass, $c_id) {
        

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
        $query = $this->db->get_where('masteradmin', array('masteradmin_user' => $user, 'masteradmin_pass' => $pass_), 1);

        if ($query->num_rows() > 0)
            return $query->row();
        else
            return FALSE;
    }

}
