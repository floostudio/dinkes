<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->admin_id = $this->session->userdata('admin_id');
        $this->admin_name = $this->session->userdata('admin_name');
        $this->load->model('m_user');
    }

    public function index() {
        if ($this->admin_id) {
            $data['users'] = $this->m_user->retrieveUsers();
            $this->load->view('users', $data);
        } else {
            redirect("upanel");
        }
    }

    public function addUsers() {
        $data = $this->input->post('data');
        $array = json_decode($data, true);
        $user = $array["user"];
        $email = $array["email"];
        $pass = $array["pass"];
        $status = $this->m_user->inputUser($user, $email, $pass);

        if ($status) {
            return true;
        } else
            return false;
    }

    public function updateUsers() {
        $data = $this->input->post('data');
        $array = json_decode($data, true);
        $user = $array["user"];
        $email = $array["email"];
        $pass = $array["pass"];
        $id = $array["id"];
        $status = $this->m_user->editUser($user, $email, $pass, $id);

        if ($status) {
            return true;
        } else
            return false;
    }

    public function deleteUsers() {
        $id = $this->input->post('data');

        $status = $this->m_user->deleteUser($id);

        if ($status) {
            return true;
        } else
            return false;
    }

}
