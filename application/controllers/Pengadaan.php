<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengadaan extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Mpengadaan');
        $this->load->model('Mbarang');
    }

    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';
        // $data['pengadaan'] = $this->Mpengadaan->getbarang();
      
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
  
    public function formpengadaan(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';
        // $data['barang'] = $this->Mbarang->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/form.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahbarang(){
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('namabar'),
            'harga' => $this->input->post('hargabar'),
            'jumlah' => $this->input->post('jumlah'),
        );
    }
}

