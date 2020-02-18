<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mstok extends CI_Model
{

    public function allstok()
    {

        $query = $this->db->query("select barang.nama_barang, stok.* from stok join barang on stok.idbarang = barang.id ");
        return $query->result();
    }


    public function cekStok($id)
    {
        $query = $this->db->query('select SUM(stok where tglstok' . $tgl . ')');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }
}
