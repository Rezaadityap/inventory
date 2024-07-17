<?php

class Supplier extends CI_Controller
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
        $config['base_url'] = 'http://localhost/inventory/ppic/supplier/index';
        $config['total_rows'] = $this->SupplierModel->count('supplier');
        $config['per_page'] = 4;
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
        $data['supplier'] = $this->SupplierModel->get_supplier($config['per_page'], $data['start']);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/supplier', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function tambah()
    {
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/tambah_supplier');
        $this->load->view('ppic/templates/footer');
    }
    public function tambahAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'kd_supplier' => $this->input->post('kd_supplier'),
                'nm_supplier' => $this->input->post('nm_supplier'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp')
            );

            $this->SupplierModel->insert_data($data, 'supplier');
            $this->session->set_flashdata('pesanSukses', 'Supplier berhasil ditambah');
            redirect('ppic/supplier');
        }
    }

    public function edit($id)
    {
        $data['supplier'] = $this->SupplierModel->get_id_supplier($id)->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/edit_supplier', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function editAksi()
    {
        $data = array(
            'kd_supplier' => $this->input->post('kd_supplier'),
            'nm_supplier' => $this->input->post('nm_supplier'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp')
        );

        $where = array(
            'id_supplier' => $this->input->post('id_supplier')
        );

        $this->SupplierModel->update_data('supplier', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Supplier berhasil di update');
        redirect('ppic/supplier');
    }
    public function hapus($id)
    {
        $where = array('id_supplier' => $id);
        $this->SupplierModel->delete_data($where, 'supplier');
        $this->session->set_flashdata('pesanSukses', 'Supplier berhasil dihapus');
        redirect('ppic/supplier');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kd_supplier', 'kd_supplier', 'required|is_unique[supplier.kd_supplier]', [
            'required' => 'Kode Supplier tidak boleh kosong',
            'is_unique' => 'Kode Supplier sudah ada'
        ]);
        $this->form_validation->set_rules('nm_supplier', 'nm_supplier', 'required|trim', [
            'required' => 'Nama Supplier tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required', [
            'required' => 'Nomor Telepon tidak boleh kosong'
        ]);
    }
}

?>