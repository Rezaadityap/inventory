<?php

class Pengguna extends CI_Controller
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
        $config['base_url'] = 'http://localhost/inventory/ppic/pengguna/index';
        $config['total_rows'] = $this->UsersModel->count('users');
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
        $data['pengguna'] = $this->UsersModel->get_pengguna($config['per_page'], $data['start']);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/pengguna', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function tambah()
    {
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/tambah_pengguna');
        $this->load->view('ppic/templates/footer');
    }

    public function tambahAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $foto = $_FILES['foto']['name'];
            if ($foto) {
                $config['upload_path'] = './assets/images/foto/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Foto gagal diupload!";
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_user' => $this->input->post('nama_user'),
                'nip' => $this->input->post('nip'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'nama_jabatan' => $this->input->post('nama_jabatan'),
                'nama_divisi' => $this->input->post('nama_divisi'),
                'password' => md5($this->input->post('password')),
                'foto' => $foto,
                'role_id' => $this->input->post('role_id')
            );

            $this->UsersModel->insert_data($data, 'users');
            $this->session->set_flashdata('pesanSukses', 'Pengguna berhasil ditambah');
            redirect('ppic/pengguna');
        }
    }

    public function edit($id)
    {
        $data['pengguna'] = $this->UsersModel->get_id_pengguna($id)->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/edit_pengguna', $data);
        $this->load->view('ppic/templates/footer');

    }

    public function editAksi()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'nip' => $this->input->post('nip'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'nama_jabatan' => $this->input->post('nama_jabatan'),
            'nama_divisi' => $this->input->post('nama_divisi')
        );

        $where = array(
            'id_user' => $this->input->post('id_user')
        );

        $this->UsersModel->update_data('users', $data, $where);
        $this->session->set_flashdata('pesanSukses', 'Pengguna berhasil di update');
        redirect('ppic/pengguna');
    }

    public function detail($id)
    {
        $data['pengguna'] = $this->db->query("SELECT * FROM users WHERE id_user = '$id'")->result();

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/detail_pengguna', $data);
        $this->load->view('ppic/templates/footer');

    }

    public function hapus($id)
    {
        $where = array('id_user' => $id);
        $this->UsersModel->delete_data($where, 'users');
        $this->session->set_flashdata('pesanSukses', 'Pengguna berhasil dihapus');
        redirect('ppic/pengguna');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_user', 'nama user', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('nip', 'nip', 'required|trim|is_unique[users.nip]', [
            'required' => 'NIP tidak boleh kosong!',
            'is_unique' => 'Nip sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'required', [
            'required' => 'Tanggal Lahir tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required', [
            'required' => 'Nama Jabatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama_divisi', 'Nama Divisi', 'required', [
            'required' => 'Nama Divisi tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]', [
            'required' => "Password tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('role_id', 'role_id', 'required', [
            'required' => 'Hak akses tidak boleh kosong'
        ]);
    }
}

?>