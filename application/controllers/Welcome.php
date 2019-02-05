<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function dashboard($nama,$gender)
	{
		$data['nama_lengkap']=$nama;
		$data['jenkel']=$gender;
		$this->load->view('beranda',$data);
	}
	public function profil(){
		$this->load->view('profil');

}
public function galery(){
	$this->load->view('galery');

}

public function v_hobi(){
	$this->load->view('v_hobi');

}
public function v_help()
{
	$this->load->view('v_help');

}
public function template()
{
	$this->load->view('template');

}
}
