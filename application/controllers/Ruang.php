<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruang extends CI_Controller {

	public function index()
	{
		$data['konten']="v_ruang";
        $this->load->model('ruang_model');
        $data['data_ruang']=$this->ruang_model->get_ruang();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_ruang()
	{
        $this->form_validation->set_rules('nama_ruang', 'Nama ruang', 'trim|required',
        array('required' => 'nama ruang harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('ruang_model', 'lvl');
			$masuk=$this->lvl->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Ruang'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Ruang'), 'refresh');
		}
	}
		public function get_detail_ruang($id_ruang='')
		{
			$this->load->model('ruang_model');
			$data_detail=$this->ruang_model->detail_ruang($id_ruang);
			echo json_encode($data_detail);
		}

		public function update_ruang()
		{
			$this->form_validation->set_rules('nama_ruang', 'Nama ruang', 'trim|required');
			$this->form_validation->set_rules('kode_ruang', 'Kode ruang', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Ruang'), 'refresh');
			} else{
				$this->load->model('ruang_model');
				$proses_update=$this->ruang_model->update_ruang();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Ruang'), 'refresh');
			} 
		}

		public function hapus_ruang($id_ruang)
	{
		$this->load->model('ruang_model');
		$this->ruang_model->hapus_ruang($id_ruang);
		redirect(base_url('index.php/Ruang'), 'refresh');
	}
}
