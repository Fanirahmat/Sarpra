<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventaris extends CI_Controller {

	public function index()
	{
		$data['konten']="v_inventaris";
        $this->load->model('inventaris_model');
		$data['data_inventaris']=$this->inventaris_model->get_inventaris();
		$this->load->model('jenis_model');
        $data['data_jenis']=$this->jenis_model->get_jenis();
        $this->load->model('ruang_model');
        $data['data_ruang']=$this->ruang_model->get_ruang();
        $this->load->model('petugas_model');
		$data['data_petugas']=$this->petugas_model->get_petugas();
		$this->load->view('index', $data, FALSE);
	}
	public function simpan_inventaris()
	{
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required',
        array('required' => 'Nama harus diisi'));
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required',
        array('required' => 'Kondisi harus diisi'));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required',
		array('required' => 'Keterangan harus diisi'));
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required',
        array('required' => 'Jumlah harus diisi'));
        $this->form_validation->set_rules('id_jenis', 'Id Jenis', 'trim|required',
        array('required' => 'Id Jenis harus diisi'));
        $this->form_validation->set_rules('tanggal_register', 'Tanggal Register', 'trim|required',
        array('required' => 'Tanggal Register harus diisi'));
        $this->form_validation->set_rules('id_ruang', 'Id Ruang', 'trim|required',
        array('required' => 'Id Ruang harus diisi'));
        $this->form_validation->set_rules('kode_inventaris', 'Kode Inventaris', 'trim|required',
        array('required' => 'Kode Inventaris harus diisi'));
        $this->form_validation->set_rules('id_petugas', 'Id Petugas', 'trim|required',
        array('required' => 'Id Petugas harus diisi'));
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('inventaris_model', 'inv');
			$masuk=$this->inv->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else{
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Inventaris'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Inventaris'), 'refresh');
		}
	}
		public function get_detail_inventaris($id_inventaris='')
		{
			$this->load->model('inventaris_model');
			$data_detail=$this->inventaris_model->detail_inventaris($id_inventaris);
			echo json_encode($data_detail);
		}

		public function update_inventaris()
		{
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
            $this->form_validation->set_rules('id_jenis', 'Id Jenis', 'trim|required');
            $this->form_validation->set_rules('tanggal_register', 'Tanggal Register', 'trim|required');
            $this->form_validation->set_rules('id_ruang', 'Id Ruang', 'trim|required');
            $this->form_validation->set_rules('kode_inventaris', 'Kode Inventaris', 'trim|required');
            $this->form_validation->set_rules('id_petugas', 'Id Petugas', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Inventaris'), 'refresh');
			} else{
				$this->load->model('inventaris_model');
				$proses_update=$this->inventaris_model->update_inventaris();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Inventaris'), 'refresh');
			} 
		}

		public function hapus_inventaris($id_inventaris)
	{
		$this->load->model('inventaris_model');
		$this->inventaris_model->hapus_inventaris($id_inventaris);
		redirect(base_url('index.php/Inventaris'), 'refresh');
	}
}
