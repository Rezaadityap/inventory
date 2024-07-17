<?php

class Penerimaan extends CI_Controller
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
        $data['penerimaan'] = $this->PenerimaanModel->get_stok();
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/penerimaan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function lihat($id)
    {
        $data['penerimaan'] = $this->PenerimaanModel->get_id($id);
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/lihat_penerimaan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function konfirmasi()
    {
        $data = array(
            'status' => $this->input->post('status')
        );

        $where = array(
            'id_stok' => $this->input->post('id_stok')
        );

        $this->db->update('stok', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Stok berhasil diupdate!');
        redirect('ppic/penerimaan');
    }
    public function kembalikan()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('pesanSukses', 'Barang berhasil Masuk List');
        redirect('ppic/penerimaan/transaksi_pengembalian');
    }
    public function transaksi_pengembalian()
    {
        $data['supplier'] = $this->PenerimaanModel->get_supplier();
        $data['users'] = $this->PenerimaanModel->get_user();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/transaksi_pengembalian', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function proses()
    {
        $proses = $this->PengembalianModel->index();
        if ($proses) {
            $this->cart->destroy();
            $this->session->set_flashdata('pesanSukses', 'Pengembalian berhasil dikirim!');
            redirect('ppic/pengembalian');
        }
    }
}

?>