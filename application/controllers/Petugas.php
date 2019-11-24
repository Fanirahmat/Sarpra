<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas extends CI_Controller {

	public function index()
	{
		$data['konten']="v_petugas";
        $this->load->model('petugas_model');
		$data['data_petugas']=$this->petugas_model->get_petugas();
		$this->load->model('level_model');
		$data['data_level']=$this->level_model->get_level();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_petugas()
	{
        $this->form_validation->set_rules('username', 'Username', 'trim|required',
        array('required' => 'Username harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required',
        array('required' => 'Password harus diisi'));
        $this->form_validation->set_rules('nama_petugas', 'Nama petugas', 'trim|required',
		array('required' => 'nama petugas harus diisi'));
		$this->form_validation->set_rules('id_level', 'Id Level', 'trim|required',
        array('required' => 'Id Level harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('petugas_model', 'lvl');
			$masuk=$this->lvl->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Petugas'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Petugas'), 'refresh');
		}
	}
		public function get_detail_petugas($id_petugas='')
		{
			$this->load->model('petugas_model');
			$data_detail=$this->petugas_model->detail_petugas($id_petugas);
			echo json_encode($data_detail);
		}

		public function update_petugas()
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('nama_petugas', 'Nama petugas', 'trim|required');
            $this->form_validation->set_rules('id_level', 'Id Level', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Petugas'), 'refresh');
			} else{
				$this->load->model('petugas_model');
				$proses_update=$this->petugas_model->update_petugas();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Petugas'), 'refresh');
			} 
		}

		public function hapus_petugas($id_petugas)
	{
		$this->load->model('petugas_model');
		$this->petugas_model->hapus_petugas($id_petugas);
		redirect(base_url('index.php/Petugas'), 'refresh');
	}
}
