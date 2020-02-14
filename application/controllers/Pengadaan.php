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
        // $data['pengadaan'] = $this->Mpengadaan->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formpengadaan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';
        $data['barang'] = $this->Mbarang->getbarang();
        $data['supplier'] = $this->Msupplier->getsupplier();

        //get kode transaksi
        $kode = 'PG' . date('ymd');
        $kode_terakhir = $this->Mpengadaan->getmaxid('Pengadaan', 'id', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $data['nopengadaan'] = $kode . $number;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/form.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data =
            [
                "kodepengadaan" => $this->input->post('no_pengadaan'),
                "tgl" => $this->input->post('tanggal', true),
                "total" => $this->input->post('total'),
                "fotonota" => $this->Mpengadaan->uploadImage()

            ];

        $sql = $this->db->insert('pengadaan', $data);
    }

    public function get_barang()
    {
        $nama_barang = $this->input->post('nama_barang');
        $data = $this->Mpengadaan->caribarang($nama_barang);
        echo json_encode($data);
    }

    public function get_auto($nama_barang)
    {
        if (empty($nama_barang)) {

            echo json_encode([]);
            exit;
        }
        $result = $this->Mpengadaan->caribarang($nama_barang);
        echo json_encode($result);
        exit;
    }
}//end 
