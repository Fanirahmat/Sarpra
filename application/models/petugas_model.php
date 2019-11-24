<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class petugas_model extends CI_Model {

  public function get_petugas()
  {
  return $this->db->join('Level', 'Level.id_level=Petugas.id_level')->get('Petugas')->result();
  }
  public function masuk_db()
  {
    $data_petugas=array(
      'username'=>$this->input->post('username'),
      'password'=> md5($this->input->post('password')),
      'nama_petugas'=>$this->input->post('nama_petugas'),
      'id_level'=>$this->input->post('id_level'),
    );
    $ql_masuk=$this->db->insert('Petugas', $data_petugas);
    return $ql_masuk;
  }
  public function detail_petugas($id_petugas='')
{
  return $this->db->where('id_petugas', $id_petugas)->get('Petugas')->row();
  }

   public function update_petugas()
  {
    $dt_up_petugas=array(
      'id_petugas'=>$this->input->post('id_petugas'),
      'username'=>$this->input->post('username'),
      'password'=>$this->input->post('password'),
      'nama_petugas'=>$this->input->post('nama_petugas'),
      'id_level'=>$this->input->post('id_level'),
      
    );
  return $this->db->where('id_petugas',$this->input->post('id_petugas'))->update('Petugas', $dt_up_petugas);
  }
  public function hapus_petugas($id_petugas)
  {
    $this->db->where('id_petugas', $id_petugas);
     return $this->db->delete('Petugas');
  }  
}

