<?php

class Permintaan extends CI_Controller
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
        // Pagination
        $this->load->library('pagination');

        // Ambil data keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        // Config
        $this->db->like('nm_kimia', $data['keyword']);
        $this->db->from('kimia');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 4;
        $config['base_url'] = 'http://localhost/inventory/plating/permintaan/index';
        $config['num_links'] = 3;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['firstlast'] = 'first';
        $config['firstlast_open'] = '<li class="page-item">';
        $config['firstlast_close'] = '</li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['kimia'] = $this->KimiaModel->getAll($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('plating/templates//header');
        $this->load->view('plating/templates//sidebar');
        $this->load->view('plating/permintaan', $data);
        $this->load->view('plating/templates//footer');
    }
    public function belanja($id)
    {
        $data['kimia'] = $this->KimiaModel->get_id_kimia($id)->result();

        $this->load->view('plating/templates//header');
        $this->load->view('plating/templates//sidebar');
        $this->load->view('plating/belanja', $data);
        $this->load->view('plating/templates//footer');
    }
    public function add()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('pesanSukses', 'Item berhasil dimasukkan ke keranjang!');
        redirect('plating/permintaan/keranjang');
    }
    public function keranjang()
    {
        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/keranjang');
        $this->load->view('plating/templates/footer');
    }

    public function hapusKeranjang($rowid)
    {
        $this->cart->remove($rowid);
        $this->session->set_flashdata('pesanSukses', 'Item berhasil dihapus!');
        redirect('plating/permintaan/keranjang');
    }

    public function transaksiPermintaan()
    {
        $data['leader'] = $this->db->query("SELECT * FROM users WHERE nama_jabatan = 'leader'")->result();

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/transaksi_permintaan', $data);
        $this->load->view('plating/templates/footer');
    }

    public function proses()
    {
        $proses = $this->PermintaanModel->index();
        if ($proses) {
            $this->cart->destroy();
            $this->session->set_flashdata('pesanSukses', 'Permintaan berhasil dikirim!');
            redirect('plating/permintaan/lihat');
        }
    }

    public function lihat()
    {
        $id = $this->session->userdata('id_user');
        // $data['permintaan'] = $this->db->query("SELECT * FROM permintaan, users WHERE permintaan.id_user = users.id_user AND users.id_user = '$id'")->result();
        $data['permintaan'] = $this->db->query("SELECT permintaan.*, users.id_user FROM permintaan INNER JOIN users ON users.id_user = permintaan.id_user WHERE users.id_user = '$id' AND (permintaan.status Like 0 OR permintaan.status Like 1)")->result();

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/data_permintaan', $data);
        $this->load->view('plating/templates/footer');
    }


    public function dataDetail($id_permintaan)
    {
        $data['permintaan'] = $this->PermintaanModel->ambil_id_permintaaan($id_permintaan);
        $data['detail'] = $this->PermintaanModel->ambil_id_detail($id_permintaan);

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/detail_permintaan', $data);
        $this->load->view('plating/templates/footer');
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
        redirect('plating/permintaan');
    }
}

?>