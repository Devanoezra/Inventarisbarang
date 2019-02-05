<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class nota_model extends CI_Model {

public function get_nota()
{
    $data_pembeli= $this->db->get('nota')->result();
    return $data_nota;
}
    public function masuk_db()
    {
        $data_pembeli=array(
            'grandtotal'=>$this->input->post('grandtotal'),
            'tgl'=>$this->input->post('tgl'),

        );
        $sql_masuk=$this->db->insert('nota', $data_nota);
        return $sql_masuk;
    }

    public function detail_nota($id_nota='')
    {
        return $this->db->where('id_nota',$id_nota)->get('nota')->row();
    }
    public function update_nota()
    {
        $dt_up_pembeli=array(
            'nama_pembeli'=>$this->input->post('nama_pembeli'),
            'alamat'=>$this->input->post('alamat'),
            'no_telp'=>$this->input->post('no_telp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'));
        return $this->db->where('id_pembeli',$this->input->post('id_pembeli'))->
        update('pembeli', $dt_up_pembeli);
    }
    public function hapus_pembeli($id_pembeli='')
    {
        $delete = $this->db->where('id_pembeli',$id_pembeli)->delete('pembeli');
        return $delete;
    }

    }
