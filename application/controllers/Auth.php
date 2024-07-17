<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth');
    }

    public function login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));

        $cek = $this->AuthModel->cek_login($nip, $password);

        if ($cek == false) {
            $this->session->set_flashdata('pesanError', 'Username atau Password salah!');
            redirect('auth');
        } else {
            if ($captcha_response == '') {
                $this->session->set_flashdata('pesanError', 'Mohon isi captcha terlebih dahulu!');
                redirect('auth');
            } else {
                $keySecret = '6LfPnWwpAAAAABS6LzbhewFeonqBby1qoTipvnr7';

                $check = array(
                    'secret' => $keySecret,
                    'response' => $this->input->post('g-recaptcha-response')
                );

                $startProcess = curl_init();

                curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

                curl_setopt($startProcess, CURLOPT_POST, true);

                curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

                curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

                $receiveData = curl_exec($startProcess);

                $finalResponse = json_decode($receiveData, true);

                if ($finalResponse['success']) {
                    $this->session->set_userdata('role_id', $cek->role_id);
                    $this->session->set_userdata('id_user', $cek->id_user);
                    $this->session->set_userdata('nama_user', $cek->nama_user);
                    $this->session->set_userdata('nip', $cek->nip);
                    $this->session->set_userdata('tgl_lahir', $cek->tgl_lahir);
                    $this->session->set_userdata('nama_jabatan', $cek->nama_jabatan);
                    $this->session->set_userdata('nama_divisi', $cek->nama_divisi);
                    $this->session->set_userdata('foto', $cek->foto);
                    switch ($cek->role_id) {
                        case 1:
                            redirect('ppic/dashboard');
                            break;
                        case 2:
                            redirect('plating/dashboard');
                            break;
                        default:
                            break;
                    }
                }
            }
        }
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesanSukses', 'Berhasil Keluar');
        redirect('auth');
    }
}

?>