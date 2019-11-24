<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pegawai extends CI_Controller {
	
	public function index()
	{
		$data['konten']="home";
		$this->load->view('index_pegawai',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */