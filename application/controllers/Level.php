<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function index()
	{
		$data['konten']="v_level";
        $this->load->model('level_model');
        $data['data_level']=$this->level_model->get_level();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_level()
	{
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'trim|required',
        array('required' => 'nama level harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('level_model', 'lvl');
			$masuk=$this->lvl->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Level'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Level'), 'refresh');
		}
	}
		public function get_detail_level($id_level='')
		{
			$this->load->model('level_model');
			$data_detail=$this->level_model->detail_level($id_level);
			echo json_encode($data_detail);
		}

		public function update_level()
		{
			$this->form_validation->set_rules('nama_level', 'Nama level', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Level'), 'refresh');
			} else{
				$this->load->model('level_model');
				$proses_update=$this->level_model->update_level();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Level'), 'refresh');
			} 
		}

		public function hapus_level($id_level)
	{
		$this->load->model('level_model');
		$this->level_model->hapus_level($id_level);
		redirect(base_url('index.php/Level'), 'refresh');
	}
}
