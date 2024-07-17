<?php

class KimiaModel extends CI_Model
{
    public function get_kimia()
    {
        return $this->db->get('kimia')->result_array();
    }
    public function getAll($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nm_kimia', $keyword);
        }
        return $this->db->get('kimia', $limit, $start)->result_array();
    }
    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function count()
    {
        return $this->db->get('kimia')->num_rows();
    }
    public function get_id_kimia($id)
    {
        $this->db->select("*");
        $this->db->from("kimia");
        $this->db->join("supplier", "supplier.id_supplier = kimia.id_supplier");
        $this->db->where("id_kimia", $id);
        return $this->db->get();
    }
    public function search()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->select('*');
        $this->db->from('kimia');
        $this->db->like('nm_kimia', $keyword);
        return $this->db->get()->result();
    }

}

?>