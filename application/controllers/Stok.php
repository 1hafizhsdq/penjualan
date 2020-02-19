<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mstok');
        $this->load->library('pagination');
        $this->load->helper(array('url'));
    }

    function get_ajax()
    {
        $list = $this->Mstok->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->nama_barang;
            $row[] = $item->tglstok;
            $row[] = $item->stok;
            $row[] = $item->status;
            // add html for action

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Mstok->count_all(),
            "recordsFiltered" => $this->Mstok->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Stok';
        $data['stok'] = $this->Mstok->allstok();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('stok/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    // public function getstok($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $query = $this->admin->cekStok($id);
    //     output_json($query);
    // }
}
