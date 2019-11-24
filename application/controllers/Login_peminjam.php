<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_peminjam extends CI_Controller {

	public function index()
	{
		$this->load->view('v_login_peminjam');
	}
	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required',array('required'=>'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array('required'=>'Password harus diisi'));
		if($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan',validation_errors());
			redirect(base_url('index.php/login_peminjam'));
		}else{
			$this->load->model('login_peminjam_model');
			$cek_login_peminjam=$this->login_peminjam_model->get_login_peminjam();
			if($cek_login_peminjam->num_rows()>0){
				$data_login_peminjam=$cek_login_peminjam->row();
				$array = array('id_pegawai'=> $data_login_peminjam->id_peminjam,
								'login' => true,
								'username'=>$data_login_peminjam->username,
								'password'=>$data_login_peminjam->password,
								
							);
				$this->session->set_userdata($array);
				redirect(base_url('index.php/Dashboard_pegawai'));
			}else{
				$this->session->set_flashdata('pesan','username dan password tidak cocok');
				redirect(base_url('index.php/login_peminjam'));
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
