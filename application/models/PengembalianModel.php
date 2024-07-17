<?php

class PengembalianModel extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('pengembalian');
        $this->db->from('users');
        $this->db->where('pengembalian.id_user = users.id_user');
        $this->db->where('tanggal_kembali =', 'DATE(CURDATE())', FALSE);
        $this->db->order_by('tanggal_kembali', 'ASC');
        return $this->db->get()->result();
    }
    public function index()
    {
        $id_user = $this->input->post('id_user');
        $id_supplier = $this->input->post('id_supplier');
        $tanggal_kembali = $this->input->post('tanggal_kembali');

        $transaksi = array(
            'id_user' => $id_user,
            'id_supplier' => $id_supplier,
            'tanggal_kembali' => $tanggal_kembali,
            'status' => 0
        );
        $this->db->insert('pengembalian', $transaksi);

        $id_pengembalian = $this->db->insert_id();
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_pengembalian' => $id_pengembalian,
                'id_kimia' => $item['id'],
                'jumlah' => $item['qty']
            );
            $this->db->insert('detail_pengembalian', $data);
        }
        return TRUE;
    }

    public function ambil_id_pengembalian($id_pengembalian)
    {
        $result = $this->db->where('id_pengembalian', $id_pengembalian)->limit(1)->get('pengembalian');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_detail($id_pengembalian)
    {
        $result = $this->db->query("SELECT detail_pengembalian.*, pengembalian.tanggal_kembali, users.nama_user, kimia.nm_kimia, kimia.satuan, supplier.nm_supplier FROM detail_pengembalian INNER JOIN pengembalian ON pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian INNER JOIN users ON users.id_user = pengembalian.id_user INNER JOIN supplier ON supplier.id_supplier = pengembalian.id_supplier INNER JOIN kimia ON kimia.id_kimia = detail_pengembalian.id_kimia  WHERE detail_pengembalian.id_kimia = kimia.id_kimia AND pengembalian.id_user = users.id_user AND detail_pengembalian.id_pengembalian = $id_pengembalian");
        // $result = $this->db->where('id_permintaan', $id_permintaan)->get('detail_permintaan');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}

?>