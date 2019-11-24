<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjaman_model extends CI_Model {

  public function get_peminjaman()
    {
    return $this->db
    ->join('Inventaris','Inventaris.id_inventaris=Peminjaman.id_inventaris')
    ->join('Pegawai', 'Pegawai.id_pegawai=Peminjaman.id_pegawai')->get('Peminjaman')->result();
    }
  public function masuk_db()
  {
    $data_peminjaman=array(
        'id_inventaris'=>$this->input->post('id_inventaris'),
        'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
        'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
        'status_peminjaman'=>$this->input->post('status_peminjaman'),
        'id_pegawai'=>$this->input->post('id_pegawai'),
        'jumlah_pinjam'=>$this->input->post('jumlah')
    );
    
    $getinventaris = $this->db->get_where('inventaris', array('id_inventaris' => $this->input->post('id_inventaris')));
    $data_inventaris = array(
      'jumlah' => (int)$getinventaris->result()[0]->jumlah - (int)$this->input->post('jumlah')
    );

    $this->db->where('id_inventaris', $this->input->post('id_inventaris'))->update('inventaris', $data_inventaris);
    $ql_masuk = $this->db->insert('peminjaman', $data_peminjaman);
    return $ql_masuk;
  }
  public function detail_peminjaman($id_peminjaman='')
{
  return $this->db->where('id_peminjaman', $id_peminjaman)->get('Peminjaman')->row();
  }

   public function update_peminjaman()
  {
    $dt_up_peminjaman=array(
        'nama'=>$this->input->post('nama'),
        'tanggal_pinjam'=>$this->input->post('tanggal_pinjam'),
        'tanggal_kembali'=>$this->input->post('tanggal_kembali'),
        'status_peminjaman'=>$this->input->post('status_peminjaman'),
        'id_pegawai'=>$this->input->post('id_pegawai'),
        'jumlah'=>$this->input->post('jumlah')
    );
  return $this->db->where('id_peminjaman',$this->input->post('id_peminjaman'))->update('Peminjaman', $dt_up_peminjaman);
  }
  public function hapus_peminjaman($id_peminjaman)
  {
    $this->db->where('id_peminjaman', $id_peminjaman);
     return $this->db->delete('Peminjaman');
  }  

  public function kembali($id_peminjaman)
  {
    $idpeminjaman = $this->db->get_where('peminjaman', array('id_peminjaman' => $id_peminjaman));
    $getinventaris = $this->db->get_where('inventaris', array('id_inventaris' => $idpeminjaman->result()[0]->id_inventaris));
  
    $data_inventaris = array(
      'jumlah' => (int)$getinventaris->result()[0]->jumlah + (int)$idpeminjaman->result()[0]->jumlah_pinjam
    );

    $this->db->where('id_peminjaman', $id_peminjaman)->update('peminjaman', array('jumlah_pinjam' => 0));
    return $this->db->where('id_inventaris', $idpeminjaman->result()[0]->id_inventaris)->update('inventaris', $data_inventaris);
  }
}

