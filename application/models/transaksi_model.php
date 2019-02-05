<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class transaksi_model extends CI_Model {

public function get_transaksi()
{
    return $this->db->join('peminjam','peminjam.id_peminjam=transaksi.id_peminjam')->join('barang','barang.id_barang=transaksi.id_barang')->get('transaksi')->result();

}
    public function masuk_db()
    {
        $data_transaksi=array(
            'id_peminjam'=>$this->input->post('id_peminjam'),
            'tanggal_peminjam'=>$this->input->post('tanggal_peminjam'),
            'jumlah_barang'=>$this->input->post('jumlah_barang'),
            'id_barang'=>$this->input->post('id_barang')

        );
        $sql_masuk=$this->db->insert('transaksi', $data_transaksi);
        return $sql_masuk;
    }

    public function detail_transaksi($id_transaksi='')
    {
        return $this->db->where('id_transaksi',$id_transaksi)->get('transaksi')->row();
    }
    public function update_transaksi()
    {
        $dt_up_transaksi=array(
          'id_peminjam'=>$this->input->post('id_peminjam'),
          'tanggal_peminjam'=>$this->input->post('tanggal_peminjam'),
          'jumlah_barang'=>$this->input->post('jumlah_barang'),
          'id_barang'=>$this->input->post('id_barang'));

        return $this->db->where('id_transaksi',$this->input->post('id_transaksi'))->
        update('transaksi', $dt_up_transaksi);
    }
    public function hapus_transaksi($id_transaksi='')
    {
        $delete = $this->db->where('id_transaksi',$id_transaksi)->delete('transaksi');
        return $delete;
    }

    }
