<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mstok extends CI_Model{
    public function cekStok($id){
        return $this->db->get_where('stok', ['idbarang' => $id])->row_array();
    }
}