<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpengadaan extends CI_Model
{
    public function getmaxid($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    // caribarang untuk autoload/autocomplete/autofill
    public function caribarang($nama_barang)
    {
        $query = $this->db
            ->select('barang.nama_barang, stok.idbarang, stok.stok, barang.id')
            ->from('barang')
            ->join('stok', 'barang.id = stok.idbarang')
            ->where("barang.nama_barang LIKE '$nama_barang%'")
            ->limit(25)
            ->get();

        return $query->result_array();
    }
    // caribarang untuk autoload/autocomplete/autofill

    // upload image nota
    public function uploadImage()
    {
        //$namaFile = "blog".time();
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->get('image');
        $config['overwrite']            = true;
        $config['max_size']             = 300000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotonota')) {
            return $this->upload->data('file_name');
        }
        return "default.jpg";
    }
    // upload image nota

    // public function selectnama($nama_barang)
    // {
    //     $query = $this->db
    //         ->select('barang.id')
    //         ->from('barang')
    //         ->where("barang.nama_barang LIKE '$nama_barang%'")
    //         ->limit(1)
    //         ->get();

    //     return $query->row_array();
    // }
}
