<?php

class Permintaan extends CI_Controller
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
        $data['permintaan'] = $this->db->query("SELECT permintaan.*, users.nama_user, users.nama_jabatan FROM permintaan INNER JOIN users ON users.id_user = permintaan.id_user WHERE permintaan.status = 0 OR permintaan.status = 1")->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/permintaan', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function detail($id_permintaan)
    {
        $data['permintaan'] = $this->PermintaanModel->ambil_id_permintaaan($id_permintaan);
        $data['detail'] = $this->PermintaanModel->ambil_id_detail($id_permintaan);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/detail_permintaan', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function konfirmasi()
    {
        $data = array(
            'status' => $this->input->post('status')
        );

        $where = array(
            'id_permintaan' => $this->input->post('id_permintaan')
        );

        $this->PermintaanModel->update('permintaan', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Permintaan berhasil diupdate!');
        redirect('ppic/permintaan');
    }
}

?>