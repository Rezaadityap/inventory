<?php

class Pengembalian extends CI_Controller
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
        $data['pengembalian'] = $this->PengembalianModel->get_data();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/pengembalian', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function detail($id_pengembalian)
    {
        $data['pengembalian'] = $this->PengembalianModel->ambil_id_pengembalian($id_pengembalian);
        $data['detail'] = $this->PengembalianModel->ambil_id_detail($id_pengembalian);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/detail_pengembalian', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function konfirmasi()
    {
        $data = array(
            'status' => $this->input->post('status')
        );

        $where = array(
            'id_pengembalian' => $this->input->post('id_pengembalian')
        );

        $this->db->update('pengembalian', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Pengembalian berhasil diupdate!');
        redirect('ppic/pengembalian');
    }
}

?>