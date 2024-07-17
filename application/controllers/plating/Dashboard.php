<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesanError', ' Anda belum Login!');
            redirect('auth');
        }
    }
    public function index()
    {
        $this->load->view('plating/templates//header');
        $this->load->view('plating/templates//sidebar');
        $this->load->view('plating/dashboard');
        $this->load->view('plating/templates//footer');
    }
}

?>