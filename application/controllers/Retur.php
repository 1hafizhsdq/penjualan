<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mretur');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Retur';
        $data['retur'] = $this->Mretur->allretur();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retur/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Retur';
        $data['nopeng'] = $this->Mretur->idpeng();
        $data['tampil'] = $this->Mretur->tampil_data();
        // koderetur
        $kode = 'RT' . date('ymd');
        $kode_terakhir = $this->Mretur->getmaxid('Retur', 'id', $kode);
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
        $data['koderetur'] = $kode . $number;
        // koderetur

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retur/tambah-retur.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function save()
    {
        $this->Mretur->saveretur();
        redirect('Retur/insertbarang');
    }
    public function simpandetail()
    {
        $this->Mretur->detailretur();
        redirect('Retur/insertbarang');
    }

    public function insertbarang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Retur';
        $data['last'] = $this->Mretur->lastid();
        $data['barang'] = $this->Mretur->barangid();
        $data['detail'] = $this->Mretur->showall();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retur/detail-retur.php', $data);
        $this->load->view('templates/footer', $data);
    }
    //autocomplete
    public function cari()
    {
        $kode = $_GET['kode'];
        $cari = $this->Mretur->autokode($kode)->result();
        echo json_encode($cari);
    }
    // autocomplete
    public function detailcari()
    {
        $namabarang = $_GET['namabarang'];
        $cari = $this->Mretur->autostok($namabarang)->result();
        echo json_encode($cari);
    }
    public function deldetail($idbarang)
    {
        $this->input->post('idbarang');
        $this->Mretur->delete($idbarang);
        redirect('Retur/insertbarang');
    }
    public function get_auto($kode)
    {
        if (empty($kode)) {

            echo json_encode([]);
            exit;
        }
        $result = $this->Mretur->caribarang($kode);
        echo json_encode($result);
        exit;
    }

    public function confrim($id)
    {
        $this->Mretur->confrimretur($id);
        redirect('Retur/insertbarang');
    }

    function ubah()
    {
        $id = $this->input->post('id');
        $data = array(
            'kode'        => $this->input->post('kode')
        );
        $this->Mretur->ubah($data, $id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Retur/index');
    }
    //laporan
    public function laporan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Laporan Retur';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retur/laporan.php', $data);
        $this->load->view('templates/footer', $data);
    }
    //laporan
    // cetak laporan
    public function cetaklaporan()
    {
        $this->load->library('dompdf_gen');
        $awal = $this->input->post('tglmulai');
        $akhir = $this->input->post('tglselesai');
        $data['laporan'] = $this->Mretur->getidwaktu();

        $this->load->view('retur/cetakretur', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Retur" . $awal . " sampai " . $akhir . ".pdf", array("attachment" => 0));
    }
    // cetak laporan

    public function showdetail($id)
    {
        $data = $this->Mretur->getdetail($id);

        $response = [];
        $response['retur'] = $this->Mretur->getreturbyid($id);
        $response['detail_retur'] = $this->Mretur->getdetail($id);
        $this->load->view('retur/detailedit', $response);
    }
}
