<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdistribusi');
        $this->load->model('Mbarang');
        $this->load->model('Mstok');
        $this->load->model('Mcabang');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Distribusi';
        $data['barang'] = $this->Mbarang->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distribusi/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formdist()
    {
        if(isset($_POST['submit'])){
            $this->Mdistribusi->insertdetailfirst();
            redirect('Distribusi/formdist');
        }else{
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Distribusi';
            $data['detail']= $this->Mdistribusi->showcart();
            $data['barang'] = $this->Mbarang->getbarang();
            $data['cabang'] = $this->Mcabang->getcabang();
    
            // get kode transaksi
            $kode = 'DS' . date('ymd');
            $kode_terakhir = $this->Mdistribusi->getmaxid();
            $kode_tambah = substr($kode_terakhir['max(id)'], -1, 1);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
            $data['nodistribusi'] = $kode . $number;
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distribusi/form.php', $data);
            $this->load->view('templates/footer', $data);
        }

    }

    public function remove(){
        $id =  $this->uri->segment(3);
        $tgl =  $this->uri->segment(4);
        $jml =  $this->uri->segment(5);
        $this->Mdistribusi->delcart($id,$tgl,$jml);
        redirect('Distribusi/formdist');
    }

    public function gettgl(){
        $id=$this->input->post('id');
        $data=$this->Mdistribusi->cektgl($id);
        echo json_encode($data);
    }
    
    public function getstok(){
        // $id=$this->input->post('id');
        $id=$this->input->post('tgl');
        $data=$this->Mstok->cekStok($tgl);
        echo json_encode($data);
    }
}