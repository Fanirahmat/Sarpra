<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function index()
	{
		$data['konten']="v_peminjaman";

		$this->load->model('peminjaman_model');
		
		$data['data_peminjaman']=$this->peminjaman_model->get_peminjaman();

		$this->load->model('pegawai_model');

		$data['data_pegawai']=$this->pegawai_model->get_pegawai();

		$this->load->model('inventaris_model');

		$data['data_inventaris']=$this->inventaris_model->get_inventaris();

		$this->load->view('index', $data);
	}
	public function simpan_peminjaman()
	{
		// if($jumlah_pinjam>=$jumlah){
		// 	echo"<script> alert('Maaf Stok Tidak Memadai');window.location.href='../Peminjaman.php'</script>";
		// }else{
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required',
		array('required' => 'tanggal pinjam harus diisi'));
		$this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required',
		array('required' => 'tanggal kembali harus diisi'));
		$this->form_validation->set_rules('status_peminjaman', 'Status Peminjaman', 'trim|required',
		array('required' => 'status peminjaman harus diisi'));
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('peminjaman_model', 'pmnjmn');
			$masuk = $this->pmnjmn->masuk_db();
			if($masuk == true) {
				$this->session->set_flashdata('pesan', 'sukses masuk');
			} else {
				$this->session->set_flashdata('pesan', 'gagal masuk');
			}
			redirect(base_url('index.php/Peminjaman'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/Peminjaman'), 'refresh');
		}
	// }
	}
		public function get_detail_peminjaman($id_peminjaman='')
		{
			$this->load->model('peminjaman_model');
			$data_detail=$this->peminjaman_model->detail_peminjaman($id_peminjaman);
			echo json_encode($data_detail);
		}

		public function update_peminjaman()
		{
			$this->form_validation->set_rules('nama', 'Nama Barang', 'trim|required');
			$this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');
			$this->form_validation->set_rules('tanggal_kembali', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('status_peminjaman', 'Status Peminjaman', 'trim|required');
			$this->form_validation->set_rules('id_pegawai', 'Id Peminjaman', 'trim|required');
			if ($this->form_validation->run() == FALSE ){
				$this->session->set_flashdata('pesan', validation_errors());
				redirect(base_url('index.php/Peminjaman'), 'refresh');
			} else{
				$this->load->model('peminjaman_model');
				$proses_update=$this->peminjaman_model->update_peminjaman();
				if ($proses_update) {
					$this->session->set_flashdata('pesan', 'sukses update');
				}
				else {
					$this->session->set_flashdata('pesan', 'gagal update');
				}
				redirect(base_url('index.php/Peminjaman'), 'refresh');
				
			} 
		}

	public function hapus_peminjaman($id_peminjaman)
	{
		$this->load->model('peminjaman_model');
		$this->peminjaman_model->hapus_peminjaman($id_peminjaman);
		redirect(base_url('index.php/Peminjaman'), 'refresh');
	}

	
	public function kembali($id_peminjaman)
	{
		$this->load->model('Peminjaman_model');
		$this->Peminjaman_model->kembali($id_peminjaman);
		redirect('peminjaman','refresh');
	}
}
