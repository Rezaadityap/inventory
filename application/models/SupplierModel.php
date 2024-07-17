<?php

class SupplierModel extends CI_Model
{
    public function get_supplier($limit, $start)
    {
        return $this->db->get('supplier', $limit, $start)->result_array();
    }
    public function count($table)
    {
        return $this->db->get($table)->num_rows();
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function get_id_supplier($id)
    {
        $this->db->select("*");
        $this->db->from("supplier");
        $this->db->where("id_supplier", $id);
        return $this->db->get();
    }
    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>