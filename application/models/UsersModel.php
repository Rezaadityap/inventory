<?php

class UsersModel extends CI_Model
{
    public function get_pengguna($limit, $start)
    {
        return $this->db->get('users', $limit, $start)->result_array();
    }
    public function get_data($table)
    {
        $this->db->get($table);
    }
    public function count($table)
    {
        return $this->db->get($table)->num_rows();
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function get_id_pengguna($id)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("id_user", $id);
        return $this->db->get();
    }
    public function ambil_id($id)
    {
        $hasil = $this->db->where('id_user', $id)->get('users');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }
}

?>