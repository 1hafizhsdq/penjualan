<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Retur';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('retur/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
}
