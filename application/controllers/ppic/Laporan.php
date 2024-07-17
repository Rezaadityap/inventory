<?php
// require FCPATH . 'vendor/autoload.php';
// require_once __DIR__ . '/vendor/autoload.php';
require FCPATH . 'vendor/autoload.php';


class Laporan extends CI_Controller
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
        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan');
        $this->load->view('ppic/templates/footer');
    }

    public function laporanPenerimaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPenerimaan($tanggal, $bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_penerimaan_harian', $data);
        $this->load->view('ppic/templates/footer');
    }

    public function excelLapPenerimaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanHarianPenerimaan($tanggal, $bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);

        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);

        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Tanggal Masuk');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->tgl_masuk);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->jumlah);

            $kolom++;
        }

        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Penerimaan Harian.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }

    public function printLapPenerimaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPenerimaan($tanggal, $bulan, $tahun);
        $this->load->view('ppic/print_penerimaan_harian', $data);
    }
    public function pdfPenerimaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPenerimaan($tanggal, $bulan, $tahun);
        $html = $this->load->view('ppic/pdf_penerimaan_harian', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function laporanPenerimaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPenerimaan($bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_Penerimaan_bulanan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPenerimaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data = $this->LaporanModel->laporanBulananPenerimaan($bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);

        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);

        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Tanggal Masuk');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->tgl_masuk);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Penerimaan Bulanan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function printLapPenerimaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPenerimaan($bulan, $tahun);
        $this->load->view('ppic/print_penerimaan_bulanan', $data);
        // redirect('ppic/print_Penerimaan_bulanan', $data);
    }
    public function pdfPenerimaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPenerimaan($bulan, $tahun);
        $html = $this->load->view('ppic/pdf_penerimaan_bulanan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function laporanPenerimaanTahunan()
    {

        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPenerimaan($tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_penerimaan_tahunan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPenerimaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data = $this->LaporanModel->laporanTahunanPenerimaan($tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);

        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Tanggal Masuk');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:D4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->tgl_masuk);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Penerimaan Tahunan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }

    public function printLapPenerimaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPenerimaan($tahun);
        $this->load->view('ppic/print_penerimaan_tahunan', $data);
    }
    public function pdfPenerimaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPenerimaan($tahun);
        $html = $this->load->view('ppic/pdf_penerimaan_tahunan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function laporanPermintaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPermintaan($tanggal, $bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_permintaan_harian', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPermintaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanHarianPermintaan($tanggal, $bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Meminta');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Minta');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nama_user);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_minta);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Permintaan Harian.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function printLapPermintaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPermintaan($tanggal, $bulan, $tahun);
        $this->load->view('ppic/print_permintaan_harian', $data);
    }
    public function pdfPermintaanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPermintaan($tanggal, $bulan, $tahun);
        $html = $this->load->view('ppic/pdf_permintaan_harian', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function laporanPermintaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPermintaan($bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_permintaan_bulanan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPermintaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanBulananPermintaan($bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Meminta');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Minta');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nama_user);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_minta);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Permintaan Bulanan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function printLapPermintaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPermintaan($bulan, $tahun);
        $this->load->view('ppic/print_permintaan_bulanan', $data);
    }
    public function pdfPermintaanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPermintaan($bulan, $tahun);
        $html = $this->load->view('ppic/pdf_permintaan_bulanan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function laporanPermintaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPermintaan($tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_permintaan_tahunan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPermintaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanTahunanPermintaan($tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Meminta');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Minta');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nama_user);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_minta);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Permintaan Tahunan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function printLapPermintaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPermintaan($tahun);
        $this->load->view('ppic/print_permintaan_tahunan', $data);
    }
    public function pdfPermintaanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPermintaan($tahun);
        $html = $this->load->view('ppic/pdf_permintaan_tahunan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function laporanPengembalianHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPengembalian($tanggal, $bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_pengembalian_harian', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPengembalianHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanHarianPengembalian($tanggal, $bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Supplier');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Kembali');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nm_supplier);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_kembali);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pengembalian Harian.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function pdfPengembalianHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPengembalian($tanggal, $bulan, $tahun);
        $html = $this->load->view('ppic/pdf_pengembalian_harian', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function printLapPengembalianHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanHarianPengembalian($tanggal, $bulan, $tahun);
        $this->load->view('ppic/print_pengembalian_harian', $data);
    }
    public function laporanPengembalianBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPengembalian($bulan, $tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_pengembalian_bulanan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPengembalianBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanBulananPengembalian($bulan, $tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Supplier');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Kembali');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nm_supplier);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_kembali);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pengembalian Bulanan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function pdfPengembalianBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPengembalian($bulan, $tahun);
        $html = $this->load->view('ppic/pdf_pengembalian_bulanan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function printLapPengembalianBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanBulananPengembalian($bulan, $tahun);
        $this->load->view('ppic/print_pengembalian_bulanan', $data);
    }
    public function laporanPengembalianTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPengembalian($tahun);

        $this->load->view('ppic/templates/header');
        $this->load->view('ppic/templates/sidebar');
        $this->load->view('ppic/laporan_pengembalian_tahunan', $data);
        $this->load->view('ppic/templates/footer');
    }
    public function excelLapPengembalianTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
        );

        $data = $this->LaporanModel->laporanTahunanPengembalian($tahun);

        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $templatePath = 'C:/xampp/htdocs/inventory/application/views/template2.xlsx';
        $objePHPExecel = PHPExcel_IOFactory::load($templatePath);
        $objePHPExecel->getActiveSheet()->SetCellValue('A4', 'Kode Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('B4', 'Nama Kimia');
        $objePHPExecel->getActiveSheet()->SetCellValue('C4', 'Satuan');
        $objePHPExecel->getActiveSheet()->SetCellValue('D4', 'Supplier');
        $objePHPExecel->getActiveSheet()->SetCellValue('E4', 'Tanggal Kembali');
        $objePHPExecel->getActiveSheet()->SetCellValue('F4', 'Jumlah');

        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getFont()->setBold(true);
        $objePHPExecel->getActiveSheet()->getStyle('A4:F4')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objePHPExecel->getActiveSheet()->getStyle('A:F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $kolom = 5;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->kd_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nm_kimia);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->satuan);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->nm_supplier);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->tanggal_kembali);
            $objePHPExecel->getActiveSheet()->SetCellValue('F' . $kolom, $val->jumlah);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pengembalian Tahunan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function printLapPengembalianTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPengembalian($tahun);
        $this->load->view('ppic/print_pengembalian_tahunan', $data);
    }
    public function pdfPengembalianTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun
        );

        $data['laporan'] = $this->LaporanModel->laporanTahunanPengembalian($tahun);
        $html = $this->load->view('ppic/pdf_pengembalian_tahunan', $data, true);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}

?>