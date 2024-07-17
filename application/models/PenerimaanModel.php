<?php

class PenerimaanModel extends CI_Model
{
    public function get_stok()
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->from('kimia');
        $this->db->where('stok.kd_kimia = kimia.kd_kimia');
        $this->db->where('tgl_masuk =', 'DATE(CURDATE())', FALSE);
        $this->db->order_by('tgl_masuk', 'ASC');
        return $this->db->get()->result();
    }
    public function get_id($id)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->from('kimia');
        $this->db->where('stok.kd_kimia = kimia.kd_kimia');
        $this->db->where('stok.id_stok', $id);
        return $this->db->get()->result();
    }
    public function get_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->get()->result();
    }

    public function get_user()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_user', $id);
        return $this->db->get()->result();
    }
}

?>