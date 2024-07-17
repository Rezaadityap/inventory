<?php

class Kimia extends CI_Controller
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
        $config['base_url'] = 'http://localhost/inventory/ppic/kimia/index';
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

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/kimia', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function tambah()
    {
        $data['supplier'] = $this->db->get('supplier')->result();
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/tambah_kimia', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function tambahAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {

            $data = array(
                'kd_kimia' => $this->input->post('kd_kimia'),
                'nm_kimia' => $this->input->post('nm_kimia'),
                'satuan' => $this->input->post('satuan'),
                'stok' => $this->input->post('stok'),
                'id_supplier' => $this->input->post('id_supplier')
            );

            $this->KimiaModel->insert_data('kimia', $data);
            $this->session->set_flashdata('pesanSukses', 'Kimia berhasil ditambahkan');
            redirect('ppic/kimia');
        }
    }

    public function edit($id)
    {
        $data['kimia'] = $this->KimiaModel->get_id_kimia($id)->result();
        $data['supplier'] = $this->db->get('supplier')->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/edit_kimia', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function editAksi()
    {
        $data = array(
            'kd_kimia' => $this->input->post('kd_kimia'),
            'nm_kimia' => $this->input->post('nm_kimia'),
            'satuan' => $this->input->post('satuan'),
            'id_supplier' => $this->input->post('id_supplier')
        );

        $where = array(
            'id_kimia' => $this->input->post('id_kimia')
        );

        $this->KimiaModel->update_data('kimia', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Kimia berhasil diedit');
        redirect('ppic/kimia');
    }

    public function hapus($id)
    {
        $this->db->where('id_kimia', $id);
        $this->db->delete('kimia');
        $this->session->set_flashdata('pesanSukses', 'Kimia berhasil dihapus');
        redirect('ppic/kimia');
    }

    public function tambahStok()
    {
        $data['kimia'] = $this->db->get('kimia')->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/tambah_stok', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function tambahStokAksi()
    {
        $this->form_validation->set_rules('kd_kimia', 'Kode Kimia', 'required', [
            'required' => 'Kode Kimia tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required', [
            'required' => 'Tanggal Masuk tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->tambahStok();
        } else {
            $data = array(
                'kd_kimia' => $this->input->post('kd_kimia'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'jumlah' => $this->input->post('jumlah'),
                'status' => 1
            );

            $this->db->insert('stok', $data);
            $this->session->set_flashdata('pesanSukses', 'Stok berhasil ditambah');
            redirect('ppic/penerimaan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kd_kimia', 'kd_kimia', 'required|is_unique[kimia.kd_kimia]', [
            'required' => 'Kode Kimia tidak boleh kosong',
            'is_unique' => 'Kode sudah ada'
        ]);
        $this->form_validation->set_rules('nm_kimia', 'nm_kimia', 'required', [
            'required' => 'Nama Kimia tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('satuan', 'satuan', 'required', [
            'required' => 'Satuan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('id_supplier', 'id_supplier', 'required', [
            'required' => 'Supplier tidak boleh kosong'
        ]);
    }
}

?>