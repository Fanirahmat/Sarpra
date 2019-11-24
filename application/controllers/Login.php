<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if($this->session->userdata('login') == TRUE){
			redirect('dashboard');
		}
		else{
			$this->load->view('login');
		}
	}
	public function proses_login()
	{
		if ($this->session->userdata('login') == FALSE) 
		{
			$this->form_validation->set_rules('username', 'username', 'trim|required',array('required' => 'username harus diisi'));
			$this->form_validation->set_rules('password', 'password', 'trim|required',array('required' => 'Password harus diisi'));
			
			if($this->form_validation->run() == TRUE)
			{
				if ($this->login_model->cek_login() == TRUE)
				{
					redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login');
				}
			}
			else
			{
			redirect('index.php/dashboard');
			}
		}
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */