<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mdistribusi extends CI_Model
{
    public function getdistribusi(){
        $query = $this->db
        ->select('d.*,u.name')
        ->from('distribusi d')
        ->join('user u', 'd.idcabang=u.id')
        ->order_by('d.kodedistribusi', 'DESC')
        ->limit(25)
        ->get();
        return $query->result();
    }

    public function getmaxid()
    {
        $query = $this->db->query("select max(id) from distribusi");
        return $query->row_array();
    }

    public function cektgl($id){
        $query = $this->db->query('SELECT s.stok,s.tglstok,b.harga_jual,b.satuan FROM stok s join barang b on b.id=s.idbarang where idbarang='.$id.' and stok!=0');
        // $query = $this->db->query('SELECT s.stok,DATE_FORMAT(s.tglstok, "%d-%m-%Y"),b.harga_jual,b.satuan FROM stok s join barang b on b.id=s.idbarang where idbarang='.$id.' and stok!=0');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }

    public function insertdetailfirst(){
        $idbar = $this->input->post('barang');
        $tgl = $this->input->post('tgl');
        $stokinduk = $this->db->query("select stok from stok where idbarang='$idbar' and tglstok ='$tgl'")->result_array();
        $jml = $this->input->post('jumlah');
        $hrgbl = $this->input->post('hrgjual');

        $krgstok = $stokinduk[0]['stok']-$jml;
        $subtotal = $jml*$hrgbl;

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
            'idcabang' => 0
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

        $delstokcab = $this->db->query('delete from stokcabang where idbarang="'.$id.'" and tglbarang="'.$tgl.'" and status = 0');

        $stokinduk = $this->db->query("select stok from stok where idbarang='$id' and tglstok ='$tgl'")->result_array();
        $tbhstok = $stokinduk[0]['stok']+$jml;
        $this->db->set('stok',$tbhstok);
        $this->db->where('idbarang',$id);
        $this->db->where('tglstok',$tgl);
        $this->db->update('stok');
    }

    public function counttotal(){
        $query = "SELECT sum(subtotal) FROM `detaildistribusi` WHERE iddist=0 and status=0";
        return $this->db->query($query)->result_array();
    }

    public function savedistribusi($data){
        $this->db->insert('distribusi',$data);
        $iddist = $this->db->insert_id();
        $this->db->query("update detaildistribusi set iddist=".$iddist.", status='1' where status=0");
        $idcab = $this->db->query("select idcabang from distribusi where id=".$iddist."")->row_array();
        $this->db->query("update stokcabang set idcabang='".$idcab['idcabang']."', status='1' where status=0");
    }

    public function getdistribusibyid($id){
        $query = $this->db
        ->select('d.*,u.name,u.alamat,u.telp')
        ->from('distribusi d')
        ->join('user u', 'd.idcabang=u.id')
        ->where('d.id', $id)
        ->get();
        return $query->result()[0];
    }

    public function getdetail($id){
        $query = $this->db
            ->select('dd.*, b.nama_barang, b.harga_jual')
            ->from('detaildistribusi dd')
            ->join('barang b', 'dd.idbarang=b.id')
            ->where('dd.iddist',$id)
            ->get();
        return $query->result();
    }
}