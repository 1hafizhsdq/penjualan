<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpengadaan extends CI_Model
{
    public function getmaxid()
    {
        $query = $this->db->query("select max(id) from pengadaan");
        return $query->row_array();
    }

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

    public function insertdetailfirst(){
        $jml = $this->input->post('jumlah');
        $hrgbl = $this->input->post('harga_beli');
        $subtotal = $jml*$hrgbl;
        $data = array(
            'idbarang' => $this->input->post('id'),
            'jumlah' => $this->input->post('jumlah'),
            'hargabeli' => $this->input->post('harga_beli'),
            'subtotal' => $subtotal,
            'idpengadaan' => 0,
            'status' => 0
        );
        $this->db->insert('detailpengadaan',$data);

        $datastok = array(
            'idbarang' => $this->input->post('id'),
            'stok' => $this->input->post('jumlah'),
            'tglstok' => 0
        );
        $this->db->insert('stok',$datastok);
    } 

    public function showcart(){
        $query = "select dp.*,b.nama_barang from detailpengadaan dp 
                  join barang b on dp.idbarang=b.id
                  where idpengadaan=0 and status=0";
        return $this->db->query($query)->result();
    }
   
    public function delcart($id){
        $this->db->where('idbarang',$id);
        $this->db->delete('detailpengadaan');
        $this->db->query('delete from stok where idbarang="'.$id.'" and status = 0');
    }

    public function counttotal(){
        $query = "SELECT sum(subtotal) FROM `detailpengadaan` WHERE idpengadaan=0 and status=0";
        return $this->db->query($query)->result_array();
    }

    public function uploadImage(){
        $config['upload_path']          = './nota/pengadaan/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['file_name']            = 'default';
        // $config['file_name']            = $nama;
        $config['overwrite']            = true;
        $config['max_size']             = 3072;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotonota')) {
            return $this->upload->data('file_name');
        }
        return "default.jpg";
    }

    public function savepengadaan($data){
        $this->db->insert('pengadaan',$data);
        $idpengadaan = $this->db->insert_id();
        $this->db->query("update detailpengadaan set idpengadaan=".$idpengadaan.", status='1' where status=0");
        $tgl = $this->db->query("select tgl from pengadaan where id=".$idpengadaan."")->row_array();
        $this->db->query("update stok set tglstok='".$tgl['tgl']."', status='1' where status=0");
    }
}
