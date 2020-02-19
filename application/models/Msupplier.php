<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Msupplier extends CI_Model
{

    // start datatables
    private $table = "supplier";
    var $column_order = array(null, 'Nama', 'Alamat', 'Telp', 'email'); //set column field database for datatable orderable
    var $column_search = array('Nama', 'Alamat', 'Telp' . 'email'); //set column field database for datatable searchable
    var $order = array('Nama' => 'desc'); // default order

    private function _get_datatables_query()
    {
        $query = $this->db
            ->select('*')
            ->from('supplier')
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


    public function getsupplier()
    {
        $data = $this->db->get('supplier');
        return $data->result_array();
    }


    public function getsupbyid($where, $table)
    {
        $data = $this->db->get_where($table, $where);
        return $data->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('supplier');
    }

    public function create($data)
    {
        $this->db->insert('supplier', $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('supplier');
        return $this->db->affected_rows();
    }
}
