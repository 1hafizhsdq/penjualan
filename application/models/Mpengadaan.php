<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpengadaan extends CI_Model
{
    public function getmaxid($table, $field, $kode = null){
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
}