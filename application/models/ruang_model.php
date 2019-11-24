<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruang_model extends CI_Model {

  public function get_ruang()
  {
      $data_ruang= $this->db->get('Ruang')->result();
      return $data_ruang;
  }
  public function masuk_db()
  {
    $data_ruang=array(
      'nama_ruang'=>$this->input->post('nama_ruang'),
      'kode_ruang'=>$this->input->post('kode_ruang'),
      'keterangan'=>$this->input->post('keterangan'),
    );
    $ql_masuk=$this->db->insert('Ruang', $data_ruang);
    return $ql_masuk;
  }
  public function detail_ruang($id_ruang='')
{
  return $this->db->where('id_ruang', $id_ruang)->get('Ruang')->row();
  }

   public function update_ruang()
  {
    $dt_up_ruang=array(
      'nama_ruang'=>$this->input->post('nama_ruang'),
      'kode_ruang'=>$this->input->post('kode_ruang'),
      'keterangan'=>$this->input->post('keterangan'),
    );
  return $this->db->where('id_ruang',$this->input->post('id_ruang'))->update('Ruang', $dt_up_ruang);
  }
  public function hapus_ruang($id_ruang)
  {
    $this->db->where('id_ruang', $id_ruang);
     return $this->db->delete('Ruang');
  }  
}

