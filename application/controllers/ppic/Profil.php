<?php

class Profil extends CI_Controller
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
        $id = $this->session->userdata('id_user');
        $data['pengguna'] = $this->db->query("SELECT * FROM users where id_user = '$id'")->result();
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/profil', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function ubahPassword()
    {
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/ubah_password_pengguna');
        $this->load->view('ppic/templates/footer');
    }

    public function ubahPasswordAksi()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => "Password tidak boleh kosong!"
        ]);

        $passbaru = $this->input->post('password1');
        $id = $this->session->userdata('id_user');


        if ($this->form_validation->run() == False) {
            $this->ubahPassword();
        } else {
            $data = array(
                'password' => md5($passbaru)
            );

            $where = array(
                'id_user' => $id
            );

            $this->UsersModel->update_data('users', $data, $where);
            $this->session->set_flashdata('pesanSukses', 'Berhasil ubah password');
            redirect('ppic/profil');
        }
    }
}

?>