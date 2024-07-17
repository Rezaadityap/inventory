<?php

class LaporanModel extends CI_Model
{
    public function laporanHarianPenerimaan($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->from('kimia');
        $this->db->where('stok.kd_kimia = kimia.kd_kimia');
        $this->db->where('DAY(stok.tgl_masuk)', $tanggal);
        $this->db->where('MONTH(stok.tgl_masuk)', $bulan);
        $this->db->where('YEAR(stok.tgl_masuk)', $tahun);
        $this->db->where('stok.status', 0);
        return $this->db->get()->result();
    }
    public function laporanBulananPenerimaan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->from('kimia');
        $this->db->where('stok.kd_kimia = kimia.kd_kimia');
        $this->db->where('MONTH(stok.tgl_masuk)', $bulan);
        $this->db->where('YEAR(stok.tgl_masuk)', $tahun);
        $this->db->where('stok.status', 0);
        return $this->db->get()->result();
    }
    public function laporanTahunanPenerimaan($tahun)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->from('kimia');
        $this->db->where('stok.kd_kimia = kimia.kd_kimia');
        $this->db->where('YEAR(stok.tgl_masuk)', $tahun);
        $this->db->where('stok.status', 0);
        return $this->db->get()->result();
    }
    public function get_lap_tahunan($limit, $start, $tahun)
    {
        $data = $this->laporanTahunanStok($tahun);
        return $this->db->get($data, $limit, $start)->result_array();
    }

    public function getAll($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('tanggal_minta', $keyword);
        }
        return $this->db->get('permintaan', $limit, $start)->result_array();
    }
    public function getUserData($user_id, $limit, $start)
    {
        $this->db->where('id_user', $user_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get('permintaan');
        return $query->result_array();
    }

    public function count_user_data($user_id)
    {
        $this->db->where('id_user', $user_id);
        return $this->db->count_all_results('permintaan');
    }

    public function laporanHarianPermintaan($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->from('detail_permintaan');
        $this->db->from('users');
        $this->db->from('kimia');
        $this->db->where('permintaan.id_permintaan = detail_permintaan.id_permintaan');
        $this->db->where('permintaan.id_user = users.id_user');
        $this->db->where('detail_permintaan.id_kimia = kimia.id_kimia');
        $this->db->where('permintaan.status = 2');
        $this->db->where('DAY(permintaan.tanggal_minta)', $tanggal);
        $this->db->where('MONTH(permintaan.tanggal_minta)', $bulan);
        $this->db->where('YEAR(permintaan.tanggal_minta)', $tahun);
        return $this->db->get()->result();
    }
    public function laporanBulananPermintaan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->from('detail_permintaan');
        $this->db->from('users');
        $this->db->from('kimia');
        $this->db->where('permintaan.id_permintaan = detail_permintaan.id_permintaan');
        $this->db->where('permintaan.status = 2');
        $this->db->where('permintaan.id_user = users.id_user');
        $this->db->where('detail_permintaan.id_kimia = kimia.id_kimia');
        $this->db->where('MONTH(permintaan.tanggal_minta)', $bulan);
        $this->db->where('YEAR(permintaan.tanggal_minta)', $tahun);
        return $this->db->get()->result();
    }
    public function laporanTahunanPermintaan($tahun)
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->from('detail_permintaan');
        $this->db->from('users');
        $this->db->from('kimia');
        $this->db->where('permintaan.id_permintaan = detail_permintaan.id_permintaan');
        $this->db->where('permintaan.status = 2');
        $this->db->where('permintaan.id_user = users.id_user');
        $this->db->where('detail_permintaan.id_kimia = kimia.id_kimia');
        $this->db->where('YEAR(permintaan.tanggal_minta)', $tahun);
        return $this->db->get()->result();
    }
    public function laporanHarianPengembalian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('detail_pengembalian');
        $this->db->from('supplier');
        $this->db->from('kimia');
        $this->db->where('pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian');
        $this->db->where('pengembalian.status = 1');
        $this->db->where('pengembalian.id_supplier = supplier.id_supplier');
        $this->db->where('detail_pengembalian.id_kimia = kimia.id_kimia');
        $this->db->where('DAY(pengembalian.tanggal_kembali)', $tanggal);
        $this->db->where('MONTH(pengembalian.tanggal_kembali)', $bulan);
        $this->db->where('YEAR(pengembalian.tanggal_kembali)', $tahun);
        return $this->db->get()->result();
    }
    public function laporanBulananPengembalian($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('detail_pengembalian');
        $this->db->from('supplier');
        $this->db->from('kimia');
        $this->db->where('pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian');
        $this->db->where('pengembalian.status = 1');
        $this->db->where('pengembalian.id_supplier = supplier.id_supplier');
        $this->db->where('detail_pengembalian.id_kimia = kimia.id_kimia');
        $this->db->where('MONTH(pengembalian.tanggal_kembali)', $bulan);
        $this->db->where('YEAR(pengembalian.tanggal_kembali)', $tahun);
        return $this->db->get()->result();
    }
    public function laporanTahunanPengembalian($tahun)
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('detail_pengembalian');
        $this->db->from('supplier');
        $this->db->from('kimia');
        $this->db->where('pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian');
        $this->db->where('pengembalian.status = 1');
        $this->db->where('pengembalian.id_supplier = supplier.id_supplier');
        $this->db->where('detail_pengembalian.id_kimia = kimia.id_kimia');
        $this->db->where('YEAR(pengembalian.tanggal_kembali)', $tahun);
        return $this->db->get()->result();
    }
    public function get_permintaan()
    {
        $user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->from('detail_permintaan');
        $this->db->from('kimia');
        $this->db->from('users');
        $this->db->where('permintaan.id_permintaan = detail_permintaan.id_permintaan');
        $this->db->where('detail_permintaan.id_kimia = kimia.id_kimia');
        $this->db->where('permintaan.status = 2');
        $this->db->where('permintaan.id_user = users.id_user');
        $this->db->where('users.id_user', $user);
        $this->db->where('tanggal_minta =', 'DATE(CURDATE())', FALSE);
        $this->db->order_by('tanggal_minta', 'ASC');

        return $this->db->get()->result();
    }
    public function cari_permintaan($bulan, $tahun)
    {
        $user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('permintaan');
        $this->db->from('users');
        $this->db->where('permintaan.status = 2');
        $this->db->where('MONTH(permintaan.tanggal_minta)', $bulan);
        $this->db->where('YEAR(permintaan.tanggal_minta)', $tahun);
        $this->db->where('permintaan.id_user = users.id_user');
        $this->db->where('users.id_user', $user);

        return $this->db->get()->result();
    }

    public function get_pengembalian()
    {
        $user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('detail_pengembalian');
        $this->db->from('kimia');
        $this->db->from('users');
        $this->db->where('pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian');
        $this->db->where('detail_pengembalian.id_kimia = kimia.id_kimia');
        $this->db->where('pengembalian.status = 2');
        $this->db->where('pengembalian.id_user = users.id_user');
        $this->db->where('users.id_user', $user);
        $this->db->where('tanggal_kembali =', 'DATE(CURDATE())', FALSE);
        $this->db->order_by('tanggal_kembali', 'ASC');

        return $this->db->get()->result();
    }
    public function cari_pengembalian($bulan, $tahun)
    {
        $user = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('users');
        $this->db->where('pengembalian.status = 2');
        $this->db->where('MONTH(pengembalian.tanggal_kembali)', $bulan);
        $this->db->where('YEAR(pengembalian.tanggal_kembali)', $tahun);
        $this->db->where('pengembalian.id_user = users.id_user');
        $this->db->where('users.id_user', $user);

        return $this->db->get()->result();
    }
}

?>