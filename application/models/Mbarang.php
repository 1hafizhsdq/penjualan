<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mbarang extends CI_Model
{
    public function getbarang()
    {
        $data = $this->db->get('barang');
        return $data->result();
    }

    public function getbarangbyid($where, $table)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function create($data)
    {
        $this->db->insert('barang', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('barang');
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }
}
