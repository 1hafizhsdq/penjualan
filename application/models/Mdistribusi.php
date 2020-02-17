<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mdistribusi extends CI_Model
{
    public function getmaxid()
    {
        $query = $this->db->query("select max(id) from distribusi");
        return $query->row_array();
    }

    public function cektgl($id){
        $query = $this->db->query('SELECT stok,s.tglstok,b.harga_jual,b.satuan FROM stok s join barang b on b.id=s.idbarang where idbarang='.$id.'');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }

    public function insertdetailfirst(){
        $idbar = $this->input->post('barang');
        $tgl = $this->input->post('tgl');
        $stokinduk = $this->db->query("select stok from stok where idbarang='$idbar' and tglstok ='$tgl'")->result();
        $jml = $this->input->post('jumlah');
        $hrgbl = $this->input->post('hrgjual');

        $krgstok = $stokinduk[]-$jml;
        $subtotal = $jml*$hrgbl;
        print_r($krgstok);die;

        $data = array(
            'idbarang' => $this->input->post('barang'),
            'tglbarang' => $this->input->post('tgl'),
            'jumlah' => $this->input->post('jumlah'),
            'subtotal' => $subtotal,
            'iddist' => 0,
            'status' => 0
        );
        $this->db->insert('detaildistribusi',$data);

        $datastok = array(
            'idbarang' => $this->input->post('barang'),
            'stok' => $this->input->post('jumlah'),
            'tglbarang' => $this->input->post('tgl'),
            'idcabang' => 0,
            'tglbarang' => 0
        );
        $this->db->insert('stokcabang',$datastok);

        $this->db->set('stok',$krgstok);
        $this->db->where('idbarang',$idbar);
        $this->db->where('tglstok',$tgl);
        $this->db->update('stok');
    } 

    public function showcart(){
        $query = "select dd.*,b.nama_barang,b.harga_jual from detaildistribusi dd 
        join barang b on dd.idbarang=b.id where iddist=0 and status=0";
        return $this->db->query($query)->result();
    }

    public function delcart($id,$tgl,$jml){
        $this->db->where('idbarang',$id);
        $this->db->where('tglbarang',$tgl);
        $this->db->delete('detaildistribusi');
        $this->db->query('delete from stokcabang where idbarang="'.$id.'" and tglbarang="'.$tgl.'" and status = 0');
        $stokinduk = $this->db->query("select stok from stok where idbarang='$idbar' and tglstok ='$tgl'");
        $tbhstok = $stokinduk->num_rows()+$jml;
        $this->db->set('stok',$tbhstok);
        $this->db->where('idbarang',$idbar);
        $this->db->where('tglstok',$tgl);
        $this->db->update('stok');
    }
}