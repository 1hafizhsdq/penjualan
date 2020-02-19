<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcabang extends CI_Model
{
    public function create($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getcabang()
    {
        $data = $this->db->get_Where('user', array('role_id' => '2'));
        return $data->result();
    }



    public function getcabangbyid($where, $table)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function update($where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
