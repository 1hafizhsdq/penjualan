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

    // menambhkan pengadaan (belum jadi)
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
    // menambhkan pengadaan (belum jadi)

    // untuk menambahkan keranjang
    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama_barang'),
            'harga_beli' => $this->input->post('harga_beli'),
            'jumlah' => $this->input->post('jumlah')
        );
        $this->cart->insert($data);
        echo $this->show_cart();
    }
    // untuk menambhakan keranjang
    // menampilkan data barang
    public function show_cart()
    {
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
            <tr>
            <td>' . $items['nama_barang'] . '</td>
            <td>' . $items['jumlah'] . '</td>
            <td>' . $items['harga_beli'] . '</td>
            
                    <td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                    </tr>
                    ';
        }
        return $output;
    }
    // menampilkan data barang

    function load_cart()
    { //load data cart
        echo $this->show_cart();
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'jumlah' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
    // mengambil nama_barang dan cocokan untuk autocomplete
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
    // mengambil nama_barang dan cocokan untuk autocomplete
}//end 
