<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai_model extends CI_Model {

  public function get_pegawai()
  {
      $data_pegawai= $this->db->get('pegawai')->result();
      return $data_pegawai;
  }
  public function masuk_db()
  {
    $data_pegawai=array(
      'nama_pegawai'=>$this->input->post('nama_pegawai'),
      'nip'=>$this->input->post('nip'),
      'alamat'=>$this->input->post('alamat'),
    );
    $ql_masuk=$this->db->insert('Pegawai', $data_pegawai);
    return $ql_masuk;
  }
  public function detail_pegawai($id_pegawai='')
{
  return $this->db->where('id_pegawai', $id_pegawai)->get('Pegawai')->row();
  }

   public function update_pegawai()
  {
    $dt_up_pegawai=array(
      'nama_pegawai'=>$this->input->post('nama_pegawai'),
      'nip'=>$this->input->post('nip'),
      'alamat'=>$this->input->post('alamat'),
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
    );
  return $this->db->where('id_pegawai',$this->input->post('id_pegawai'))->update('Pegawai', $dt_up_pegawai);
  }
  public function hapus_pegawai($id_pegawai)
  {
    $this->db->where('id_pegawai', $id_pegawai);
     return $this->db->delete('Pegawai');
  }  
}

