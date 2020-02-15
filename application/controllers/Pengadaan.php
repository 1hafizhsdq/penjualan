<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengadaan');
        $this->load->model('Mbarang');
        $this->load->model('Msupplier');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formpengadaan()
    {
        if(isset($_POST['submit'])){
            $this->Mpengadaan->insertdetailfirst();
            redirect('Pengadaan/formpengadaan');
        }else{
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Pengadaan';
            $data['detail']= $this->Mpengadaan->showcart();
            $data['barang'] = $this->Mbarang->getbarang();
            $data['supplier'] = $this->Msupplier->getsupplier();
            $data['total'] = $this->Mpengadaan->counttotal();
            // print_r($data['total']);die;
    
            //get kode transaksi
            $kode = 'PG' . date('ymd');
            $kode_terakhir = $this->Mpengadaan->getmaxid();
            $kode_tambah = substr($kode_terakhir['max(id)'], -1, 1);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
            $data['nopengadaan'] = $kode . $number;
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengadaan/form.php', $data);
            $this->load->view('templates/footer', $data);
        }

    }

    public function remove(){
        $id=  $this->uri->segment(3);
        $this->Mpengadaan->delcart($id);
        redirect('Pengadaan/formpengadaan');
    }
    
    public function get_auto($nama_barang){
        if (empty($nama_barang)) {

            echo json_encode([]);
            exit;
        }
        $result = $this->Mpengadaan->caribarang($nama_barang);
        echo json_encode($result);
        exit;
    }

    public function submit(){
            $data = array(
                'kodepengadaan' => $this->input->post('no_pengadaan'),
                'tgl' => $this->input->post('tanggal'),
                'total' => $this->input->post('total'),
                'fotonota' => $this->Mpengadaan->uploadImage()
            );
            $tambah = $this->Mpengadaan->savepengadaan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Pengadaan Berhasil</div>');
            redirect('Pengadaan');
    }

}//end 
