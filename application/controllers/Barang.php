<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mbarang');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang';
        $data['barang'] = $this->Mbarang->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formbarang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang';
        $data['barang'] = $this->Mbarang->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/form.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function newbarang()
    {
        $this->form_validation->set_rules('namabar', 'Nama', 'required', ['required' => 'Nama Barang tidak boleh kosong']);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', ['required' => 'Satuan tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->formbarang();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data harus lengkap, silahkan ulangi</div>');
        } else {
            $data = array(
                'nama_barang' => $this->input->post('namabar'),
                'satuan' => $this->input->post('satuan'),
                'harga_jual' => $this->input->post('hrgjual'),
                'harga_beli' => $this->input->post('hrgbeli')
            );
            $insert = $this->Mbarang->create($data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Barang berhasil ditambahkan</div>');
            redirect('Barang');
        }
    }

    public function editbarang($id)
    {
        $where = array('id' => $id);
        $data['databar'] = $this->Mbarang->getbarangbyid($where, 'barang');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Barang';
        $data['barang'] = $this->Mbarang->getbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('barang/formedit.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatebarang()
    {
        $this->form_validation->set_rules('namabar', 'Nama', 'required', ['required' => 'Nama Barang tidak boleh kosong']);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', ['required' => 'Satuan tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->index();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data harus lengkap, silahkan ulangi</div>');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'nama_barang' => $this->input->post('namabar'),
                'satuan' => $this->input->post('satuan'),
                'harga_jual' => $this->input->post('hrgjual'),
                'harga_beli' => $this->input->post('hrgbeli')
            );
            $insert = $this->Mbarang->update(array('id' => $this->input->post('id')), $data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Barang berhasil diedit</div>');
            redirect('Barang');
        }
    }

    public function delbarang($id)
    {
        $this->Mbarang->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Barang berhasil dihapus</div>');
        redirect('Barang');
    }
}
