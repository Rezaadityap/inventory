<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesanError', ' Anda belum Login!');
            redirect('auth');
        }
    }
    public function index()
    {
        $pengguna = $this->db->query('select * from users');
        $kimia = $this->db->query('select * from kimia');
        $permintaan = $this->db->query('select * from permintaan');
        $penerimaan = $this->db->query('select * from stok where status = 0');

        $data['pengguna'] = $pengguna->num_rows();
        $data['kimia'] = $kimia->num_rows();
        $data['permintaan'] = $permintaan->num_rows();
        $data['penerimaan'] = $penerimaan->num_rows();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar', $data);
        $this->load->view('ppic/dashboard', $data);
        $this->load->view('ppic/templates/footer');
    }
}

?>