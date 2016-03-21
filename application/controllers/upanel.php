<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class upanel extends CI_Controller {
    function __construct(){
                parent::__construct();
                $this->load->library(array('session','form_validation'));
                $this->load->helper(array('form', 'url'));
				$this->admin_id = $this->session->userdata('admin_id');
				$this->load->model('m_admin');
	}
	
	public function index()
	{   
            $this->load->view('upanel');
	}
	
	public function getAccess()
	{
		if(!$this->admin_id)
		{
			$user = $this->input->post('login_username');
			$pass = $this->input->post('login_password');
			
			$data_member = $this->m_admin->check_login($user, $pass);
                        
			if($data_member)
			{
				$this->session->set_userdata('admin_id', $data_member->masteradmin_user);
				$this->session->set_userdata('admin_name', $data_member->masteradmin_name);
				redirect("users");
			}
			else
			{
				redirect("upanel");
			}
			
		}
                else {
                    redirect("users");
                }
	}
	
	public function signout(){
		if($this->admin_id)
		{
			$this->session->sess_destroy();
			redirect('upanel');
		}
		redirect(" ");
	}
}