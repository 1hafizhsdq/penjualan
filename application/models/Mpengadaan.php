<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mpengadaan extends CI_Model
{

     // start datatables
     private $table = "pengadaan";
     var $column_order = array(null, 'p.kodepengadaan', 's.Nama', 'p.tgl', 'p.total'); //set column field database for datatable orderable
     var $column_search = array('p.kodepengadaan', 's.Nama', 'p.tgl', 'p.total'); //set column field database for datatable searchable
     var $order = array('p.kodepengadaan' => 'desc'); // default order
  
     private function _get_datatables_query() {
        $query = $this->db
        ->select('p.*,s.Nama')
        ->from('pengadaan p')
        ->join('supplier s', 'p.idsup=s.id', 'inner')
        ->order_by('p.kodepengadaan', 'DESC')
        ->limit(25);
        // ->get();
        // $this->db->query("select p.*, s.Nama from pengadaan p join supplier s on p.idsup=s.id order by p.kodepengadaan DESC");
         $i = 0;

         foreach ($this->column_search as $item) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($item, $_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }
          
         if(isset($_POST['order'])) { // here order processing
             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         }  else if(isset($this->order)) {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
     function get_datatables() {
         $this->_get_datatables_query();
         if(@$_POST['length'] != -1)
         $this->db->limit(@$_POST['length'], @$_POST['start']);
         $query = $this->db->get();
         return $query->result();
     }
     function count_filtered() {
         $this->_get_datatables_query();
         $query = $this->db->get();
         return $query->num_rows();
     }
     function count_all() {
         $this->db->from($this->table);
         return $this->db->count_all_results();
     }
     // end datatables


    public function getpengadaan(){
        $query = $this->db
        ->select('p.*,s.Nama')
        ->from('pengadaan p')
        ->join('supplier s', 'p.idsup=s.id', 'inner')
        ->order_by('p.kodepengadaan', 'DESC')
        ->limit(25)
        ->get();

        return $query->result();
    }
    
    public function getpengadaanbydate(){
        $awal = $this->input->post('tglmulai');
        $akhir = $this->input->post('tglselesai');
        $data = $this->db->query("select pengadaan.*,supplier.Nama from pengadaan join supplier on pengadaan.idsup=supplier.id  where tgl between '$awal' and '$akhir'");
        return $data->result();
    }
    
    public function getdetail($id){
        $query = $this->db
            ->select('dp.*, b.nama_barang')
            ->from('detailpengadaan dp')
            ->join('barang b', 'dp.idbarang=b.id')
            ->where('dp.idpengadaan',$id)
            ->get();

        return $query->result();
    }

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
            'idbarang' => $this->input->post('barang'),
            'jumlah' => $this->input->post('jumlah'),
            'hargabeli' => $this->input->post('harga_beli'),
            'subtotal' => $subtotal,
            'idpengadaan' => 0,
            'status' => 0
        );
        $this->db->insert('detailpengadaan',$data);

        $datastok = array(
            'idbarang' => $this->input->post('barang'),
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

    public function savepengadaan($data){
        $this->db->insert('pengadaan',$data);
        $idpengadaan = $this->db->insert_id();
        $this->db->query("update detailpengadaan set idpengadaan=".$idpengadaan.", status='1' where status=0");
        $tgl = $this->db->query("select tgl from pengadaan where id=".$idpengadaan."")->row_array();
        $this->db->query("update stok set tglstok='".$tgl['tgl']."', status='1' where status=0");
    }

    public function getpengadaanbyid($id){
        $query = $this->db
        ->select('p.*,s.Nama,s.Alamat,s.Telp')
        ->from('pengadaan p')
        ->join('supplier s', 'p.idsup=s.id')
        ->where('p.id', $id)
        ->get();

        return $query->result()[0];
    }
}
