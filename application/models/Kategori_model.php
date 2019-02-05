<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Kategori_model extends CI_Model {

public function get_kategori()
{
   $data_kategori= $this->db->get('kategori')->result();
   return $data_kategori;
}
    public function masuk_db()
    {
        $data_kategori=array(
            'nama_kategori'=>$this->input->post('nama_kategori')
        );
        $sql_masuk=$this->db->insert('kategori', $data_kategori);
        return $sql_masuk;
    }
    public function detail_kategori($id_kategori='')
    {
        return $this->db->where('id_kategori',$id_kategori)->get('kategori')->row();
    }
    public function update_kategori()
    {
        $dt_up_kategori=array(
            'nama_kategori'=>$this->input->post('nama_kategori'));

        return $this->db->where('id_kategori',$this->input->post('id_kategori'))->
        update('kategori', $dt_up_kategori);
    }
    public function hapus_kategori($id_kategori='')
    {
        $delete = $this->db->where('id_kategori',$id_kategori)->delete('kategori');
        return $delete;
    }
}
