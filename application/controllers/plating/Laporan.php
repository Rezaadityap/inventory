<?php
require FCPATH . 'vendor/autoload.php';
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesanError', ' Anda belum Login!');
            redirect('auth');
        }

        $this->load->library('pagination');

    }

    public function index()
    {
        $data['lap_permintaan'] = $this->LaporanModel->get_permintaan();
        $data['lap_pengembalian'] = $this->LaporanModel->get_pengembalian();

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/laporan', $data);
        $this->load->view('plating/templates/footer');
    }

    public function cariLaporanPermintaan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->cari_permintaan($bulan, $tahun);

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/laporan_permintaan', $data);
        $this->load->view('plating/templates/footer');
    }
    public function lihat($id_permintaan)
    {
        $data['permintaan'] = $this->PermintaanModel->ambil_id_permintaaan($id_permintaan);
        $data['detail'] = $this->PermintaanModel->ambil_id_detail($id_permintaan);

        $this->load->view('plating/templates/header');
        $this->load->view('plating/templates/sidebar');
        $this->load->view('plating/detail_lap_permintaan', $data);
        $this->load->view('plating/templates/footer');
    }
    public function pdfPermintaan($id_permintaan)
    {
        $data['permintaan'] = $this->PermintaanModel->ambil_id_permintaaan($id_permintaan);
        $data['detail'] = $this->PermintaanModel->ambil_id_detail($id_permintaan);

        $html = $this->load->view('plating/laporan_pdf_permintaan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}

?>