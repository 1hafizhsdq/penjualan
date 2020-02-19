<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mstok extends CI_Model
{
    // start datatables
    private $table = "stok";
    var $column_order = array(null, 'nama_barang', 'tglstok', 'stok', 'status'); //set column field database for datatable orderable
    var $column_search = array('nama_barang', 'tglstok', 'stok', 'status'); //set column field database for datatable searchable
    var $order = array('tglstok' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $query = $this->db
            ->select('barang.nama_barang as nama_barang, stok.*')
            ->from('stok')
            ->join('barang', 'stok.idbarang = barang.id', 'inner')
            // ->order_by('p.kodepengadaan', 'DESC')
            ->limit(25); // harus
        // ->get();
        // $this->db->query("select p.*, s.Nama from pengadaan p join supplier s on p.idsup=s.id order by p.kodepengadaan DESC");
        $i = 0;

        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // end datatables


    public function allstok()
    {

        $query = $this->db->query("select barang.nama_barang, stok.* from stok join barang on stok.idbarang = barang.id ");
        return $query->result();
    }

    // public function cekStok($tgl,$id){
    //     $query = $this->db->query('select stok from
    //      stok where tglstok="'.$tgl.'" and idbarang='.$id.' and stok!=0');
    //     // return $this->db->get_where('stok', ['idbarang' => $id])->result();
    //     return $query->result();
    // }

    // public function allstok($limit, $start, $nama_barang)
    // {
    //     // $query = $this->db->query("select barang.nama_barang, stok.* from stok join barang on stok.idbarang = barang.id ");
    //     $this->db->select('barang.nama_barang as nama_barang, stok.tglstok as tglstok, stok.status as status, stok.stok as stok');
    //     $this->db->from('stok');
    //     $this->db->join('barang', 'barang on stok.idbarang = barang.id', 'inner');
    //     // ->like('*', $nama_barang)
    //     if (!empty($nama_barang)) {
    //         $this->db->like('nama_barang', $nama_barang);
    //     }
    //     $this->db->order_by('nama_barang', 'asc');
    //     // $this->db->limit();
    //     $query = $this->db->get('', $limit, $start);
    //     if ($query->num_rows() > 0)
    //         return $query->result_array();
    //     else
    //         return null;
    // }

    // public function countAllstok()
    // {
    //     // return $this->db->query('select barang.nama_barang, stok.* from stok join barang on stok.idbarang = barang.id')->num_rows();
    //     $query = $this->db->select('barang.nama_barang as nama_barang, stok.*')
    //         ->from('stok')
    //         ->join('barang', 'barang on stok.idbarang = barang.id')
    //         ->get();
    //     return $query->num_rows();
    // }

    public function hitungstok($id)
    {
        $query = $this->db->query('select sum(stok) as stok 
        from stok where idbarang=' . $id . ' and stok!=0');
        // return $this->db->get_where('stok', ['idbarang' => $id])->result();
        return $query->result();
    }
}
