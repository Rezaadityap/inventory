<?php

class PermintaanModel extends CI_Model
{
    public function index()
    {
        $id_user = $this->input->post('id_user');
        $tanggal_minta = $this->input->post('tanggal_minta');
        $mengetahui = $this->input->post('mengetahui');

        $transaksi = array(
            'id_user' => $id_user,
            'tanggal_minta' => $tanggal_minta,
            'mengetahui' => $mengetahui,
            'status' => 0
        );
        $this->db->insert('permintaan', $transaksi);

        $id_permintaan = $this->db->insert_id();
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_permintaan' => $id_permintaan,
                'id_kimia' => $item['id'],
                'jumlah' => $item['qty']
            );
            $this->db->insert('detail_permintaan', $data);
        }
        return TRUE;
    }

    public function ambil_id_permintaaan($id_permintaan)
    {
        $result = $this->db->where('id_permintaan', $id_permintaan)->limit(1)->get('permintaan');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_detail($id_permintaan)
    {
        $result = $this->db->query("SELECT detail_permintaan.*, permintaan.mengetahui, permintaan.tanggal_minta, users.nama_user, kimia.nm_kimia, kimia.satuan FROM detail_permintaan INNER JOIN permintaan ON permintaan.id_permintaan = detail_permintaan.id_permintaan INNER JOIN users ON users.id_user = permintaan.id_user INNER JOIN kimia ON kimia.id_kimia = detail_permintaan.id_kimia  WHERE detail_permintaan.id_kimia = kimia.id_kimia AND permintaan.id_user = users.id_user AND detail_permintaan.id_permintaan = $id_permintaan");
        // $result = $this->db->where('id_permintaan', $id_permintaan)->get('detail_permintaan');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
}

?>