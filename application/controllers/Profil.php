<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function deva()
    {
        $data['konten']="v_profil";
        $this->load->view('template',$data);
        
    }

}
?>