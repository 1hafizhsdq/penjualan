<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Msupplier extends CI_Model
{
    public function getsupplier()
    {
        $data = $this->db->get('supplier');
        return $data->result_array();
    }


    public function getsupbyid($where, $table)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('supplier');
    }

    public function create($data)
    {
        $this->db->insert('supplier', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('supplier');
        return $this->db->affected_rows();
    }
}
