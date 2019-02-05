<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class peminjam_model extends CI_Model {

public function get_peminjam()
{
    $data_peminjam= $this->db->get('peminjam')->result();
    return $data_peminjam;
}
    public function masuk_db()
    {
        $data_peminjam=array(
            'nama_peminjam'=>$this->input->post('nama_peminjam'),
            'alamat'=>$this->input->post('alamat'),
            'telepon'=>$this->input->post('telepon'));

        $sql_masuk=$this->db->insert('peminjam', $data_peminjam);
        return $sql_masuk;
    }

    public function detail_peminjam($id_peminjam='')
    {
        return $this->db->where('id_peminjam',$id_peminjam)->get('peminjam')->row();
    }
    public function update_peminjam()
    {
        $dt_up_peminjam=array(
            'nama_peminjam'=>$this->input->post('nama_peminjam'),
            'alamat'=>$this->input->post('alamat'),
            'telepon'=>$this->input->post('telepon'));

        return $this->db->where('id_peminjam',$this->input->post('id_peminjam'))->
        update('peminjam', $dt_up_peminjam);
    }
    public function hapus_peminjam($id_peminjam='')
    {
        $delete = $this->db->where('id_peminjam',$id_peminjam)->delete('peminjam');
        return $delete;
    }

    }
