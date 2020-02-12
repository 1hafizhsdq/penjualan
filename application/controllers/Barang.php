<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller{
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang'; //nama harus sama dengan sub menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function formbarang(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang'; //nama harus sama dengan sub menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/form.php', $data);
        $this->load->view('templates/footer', $data);
    }
}