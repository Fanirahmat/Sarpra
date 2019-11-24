<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

	public function index()
	{
		$data['konten']="v_pegawai";
        $this->load->model('pegawai_model');
        $data['data_pegawai']=$this->pegawai_model->get_pegawai();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_pegawai()
	{
        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'trim|required',
        array('required' => 'nama pegawai harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('pegawai_model', 'pgw');
			$masuk=$this->pgw->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Pegawai'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Pegawai'), 'refresh');
		}
	}
		public function get_detail_pegawai($id_pegawai='')
		{
			$this->load->model('pegawai_model');
			$data_detail=$this->pegawai_model->detail_pegawai($id_pegawai);
			echo json_encode($data_detail);
		}

		public function update_pegawai()
		{
			$this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'trim|required');
			$this->form_validation->set_rules('nip', 'Nip', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Pegawai'), 'refresh');
			} else{
				$this->load->model('pegawai_model');
				$proses_update=$this->pegawai_model->update_pegawai();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Pegawai'), 'refresh');
			} 
		}

		public function hapus_pegawai($id_pegawai)
	{
		$this->load->model('pegawai_model');
		$this->pegawai_model->hapus_pegawai($id_pegawai);
		redirect(base_url('index.php/Pegawai'), 'refresh');
	}
}
