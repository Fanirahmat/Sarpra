<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_model extends CI_Model {

  public function get_jenis()
  {
      $data_jenis= $this->db->get('Jenis')->result();
      return $data_jenis;
  }
  public function masuk_db()
  {
    $data_jenis=array(
      'nama_jenis'=>$this->input->post('nama_jenis'),
      'kode_jenis'=>$this->input->post('kode_jenis'),
      'keterangan'=>$this->input->post('keterangan'),
    );
    $ql_masuk=$this->db->insert('Jenis', $data_jenis);
    return $ql_masuk;
  }
  public function detail_jenis($id_jenis='')
{
  return $this->db->where('id_jenis', $id_jenis)->get('Jenis')->row();
  }

   public function update_jenis()
  {
    $dt_up_jenis=array(
      'nama_jenis'=>$this->input->post('nama_jenis'),
      'kode_jenis'=>$this->input->post('kode_jenis'),
      'keterangan'=>$this->input->post('keterangan'),
    );
  return $this->db->where('id_jenis',$this->input->post('id_jenis'))->update('Jenis', $dt_up_jenis);
  }
  public function hapus_jenis($id_jenis)
  {
    $this->db->where('id_jenis', $id_jenis);
     return $this->db->delete('Jenis');
  }  
}

