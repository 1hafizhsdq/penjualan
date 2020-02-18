<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mstok extends CI_Model
{

    public function allstok()
    {

        $query = $this->db->query("select barang.nama_barang, stok.* from stok join barang on stok.idbarang = barang.id ");
        return $query->result();
    }

    public function cekStok($tgl,$id){
        $query = $this->db->query('select stok from
         stok where tglstok="'.$tgl.'" and idbarang='.$id.' and stok!=0');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }
    public function hitungstok($id){
        $query = $this->db->query('select sum(stok) as stok 
        from stok where idbarang='.$id.' and stok!=0');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }
}
