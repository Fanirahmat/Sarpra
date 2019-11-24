<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventaris_model extends CI_Model {

  public function get_inventaris()
  {
  $data_inventaris=$this->db->join('Petugas','Petugas.id_petugas=Inventaris.id_petugas')
  ->join('Jenis','Jenis.id_jenis=Inventaris.id_jenis')->join('Ruang','Ruang.id_ruang=Inventaris.id_ruang')
  ->get('Inventaris')->result();
  return $data_inventaris;
  }
  public function masuk_db()
  {
    $data_inventaris=array(
      'nama'=>$this->input->post('nama'),
      'kondisi'=>$this->input->post('kondisi'),
      'keterangan'=>$this->input->post('keterangan'),
      'jumlah'=>$this->input->post('jumlah'),
      'id_jenis'=>$this->input->post('id_jenis'),
      'tanggal_register'=>$this->input->post('tanggal_register'),
      'id_ruang'=>$this->input->post('id_ruang'),
      'kode_inventaris'=>$this->input->post('kode_inventaris'),
      'id_petugas'=>$this->input->post('id_petugas'),
    );
    $ql_masuk=$this->db->insert('Inventaris', $data_inventaris);
    return $ql_masuk;
  }
  public function detail_inventaris($id_inventaris='')
{
  return $this->db->where('id_inventaris', $id_inventaris)->get('Inventaris')->row();
  }

   public function update_inventaris()
  {
    $dt_up_inventaris=array(
        'nama'=>$this->input->post('nama'),
        'kondisi'=>$this->input->post('kondisi'),
        'keterangan'=>$this->input->post('keterangan'),
        'jumlah'=>$this->input->post('jumlah'),
        'id_jenis'=>$this->input->post('id_jenis'),
        'tanggal_register'=>$this->input->post('tanggal_register'),
        'id_ruang'=>$this->input->post('id_ruang'),
        'kode_inventaris'=>$this->input->post('kode_inventaris'),
        'id_petugas'=>$this->input->post('id_petugas'),
      
    );
    return $this->db->where('id_inventaris',$this->input->post('id_inventaris'))->update('Inventaris', $dt_up_inventaris);
  }
  public function hapus_inventaris($id_inventaris)
  {
    $this->db->where('id_inventaris', $id_inventaris);
     return $this->db->delete('Inventaris');
  }  
}

