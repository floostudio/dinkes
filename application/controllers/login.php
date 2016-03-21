<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    function __construct(){
                parent::__construct();
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('form', 'url'));
				$this->user_id = $this->session->userdata('user_id');
				$this->load->model('m_user');
	}
	
	public function index()
	{   
            $this->load->view('login');
	}
	
	public function getAccess()
	{
		if(!$this->user_id)
		{
			$user = $this->input->post('login_username');
			$pass = $this->input->post('login_password');
			
			$data_member = $this->m_user->check_login($user, $pass);
			if($data_member)
			{
				$this->session->set_userdata('user_id', $data_member->user_id);
				$this->session->set_userdata('user_name', $data_member->user_name);
				redirect("home");
				
			}
			else
			{
				redirect("home");
			}
		}
                else {
                    redirect("home");
                }
	}
	
	public function signout(){
		if($this->user_id)
		{
			$this->session->sess_destroy();
			redirect('home');
		}
		redirect(" ");
	}
}