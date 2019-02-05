<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

    public function index()
    {
        $data['konten']="v_transaksi";
        $this->load->model('transaksi_model');
        $data['data_transaksi']=$this->transaksi_model->get_transaksi();
        $this->load->model("barang_model");
        $data['data_barang']=$this->barang_model->get_barang();
        $this->load->model("peminjam_model");
        $data['data_peminjam']=$this->peminjam_model->get_peminjam();
        $this->load->view('template',$data, FALSE);
    }
    public function simpan_transaksi()
    {
        $this->form_validation->set_rules('id_peminjam', 'Id Peminjam', 'trim|required',
        array('required' => 'Id Peminjam harus diisi'));
        $this->form_validation->set_rules('tanggal_peminjam', 'Tanggal Peminjam', 'trim|required',
        array('required' => 'Tanggal Peminjam harus diisi'));
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required',
        array('required' => 'jumlah barang harus diisi'));
        $this->form_validation->set_rules('id_barang', 'Id Barang', 'trim|required',
        array('required' => 'id barang harus diisi'));


        if ($this->form_validation->run() == TRUE) {
            $this->load->model('transaksi_model','brg');
            $masuk=$this->brg->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan', 'sukses ditambahkan');
            } else {
                $this->session->set_flashdata('pesan', 'gagal menambahkan');
            }
            redirect(base_url('index.php/transaksi'),'refresh');
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/transaksi'),'refresh');

        }
    }
    public function get_detail_transaksi($id_transaksi='')
    {
        $this->load->model('transaksi_model');
        $data_detail=$this->transaksi_model->detail_transaksi($id_transaksi);
        echo json_encode($data_detail);
    }
    public function update_transaksi()
    {
        $this->form_validation->set_rules('id_peminjam', 'id peminjam', 'trim|required');
        $this->form_validation->set_rules('tanggal_peminjam', 'tanggal peminjam', 'trim|required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/transaksi'),'refresh');
        } else {
            $this->load->model('transaksi_model');
            $proses_update=$this->transaksi_model->update_transaksi();
            if ($proses_update) {
                $this->session->set_flashdata('pesan', 'sukses update');
            } else {
                $this->session->set_flashdata('pesan', 'gagal update');
            }
            redirect(base_url('index.php/transaksi'),'refresh');
            }
        }
        public function hapus_transaksi($id_transaksi)
        {
            $this->load->model('transaksi_model');
            $prosesDelete=$this->transaksi_model->hapus_transaksi($id_transaksi);
            if ($prosesDelete == TRUE) {
                $this->session->set_flashdata('pesan', 'Sukses Hapus Data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal Hapus Data');
            }
            redirect(base_url('index.php/transaksi'),'refresh');
        }
    }

?>
