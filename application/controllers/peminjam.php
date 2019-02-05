<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class peminjam extends CI_Controller {

    public function index()
    {
        $data['konten']="v_peminjam";
        $this->load->model('peminjam_model');
        $data['data_peminjam']=$this->peminjam_model->get_peminjam();
        $this->load->view('template',$data, FALSE);
    }
    public function simpan_peminjam()
    {
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required',
        array('required' => 'nama pembeli harus diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
        array('required' => 'alamat harus diisi'));
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required',
        array('required' => 'no telepon harus diisi'));

        if ($this->form_validation->run() == TRUE) {
            $this->load->model('peminjam_model','brg');
            $masuk=$this->brg->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan', 'sukses ditambahkan');
            } else {
                $this->session->set_flashdata('pesan', 'gagal menambahkan');
            }
            redirect(base_url('index.php/peminjam'),'refresh');
        } else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/peminjam'),'refresh');

        }
    }
    public function get_detail_peminjam($id_peminjam='')
    {
        $this->load->model('peminjam_model');
        $data_detail=$this->peminjam_model->detail_peminjam($id_peminjam);
        echo json_encode($data_detail);
    }
    public function update_peminjam()
    {
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/peminjam'),'refresh');
        } else {
            $this->load->model('peminjam_model');
            $proses_update=$this->peminjam_model->update_peminjam();
            if ($proses_update) {
                $this->session->set_flashdata('pesan', 'sukses update');
            } else {
                $this->session->set_flashdata('pesan', 'gagal update');
            }
            redirect(base_url('index.php/peminjam'),'refresh');
            }
        }
        public function hapus_peminjam($id_peminjam)
        {
            $this->load->model('peminjam_model');
            $prosesDelete=$this->peminjam_model->hapus_peminjam($id_peminjam);
            if ($prosesDelete == TRUE) {
                $this->session->set_flashdata('pesan', 'Sukses Hapus Data');
            } else {
                $this->session->set_flashdata('pesan', 'Gagal Hapus Data');
            }
            redirect(base_url('index.php/peminjam'),'refresh');
        }
    }

?>
