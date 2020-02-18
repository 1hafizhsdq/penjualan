<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Msupplier');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Supplier'; //nama harus sama dengan sub menu
        $data['supplier'] = $this->Msupplier->getsupplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formsup()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Supplier'; //nama harus sama dengan sub menu
        $data['supplier'] = $this->Msupplier->getsupplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/form.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function newsup()
    {
        $this->form_validation->set_rules('namasup', 'Nama', 'required', ['required' => 'Nama Supplier tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat tidak boleh kosong']);
        $this->form_validation->set_rules('telp', 'Telepon', 'required', ['required' => 'Telepon tidak boleh kosong']);

        if ($this->form_validation->run() == false) {
            $this->formsup();
        } else {
            $data = array(
                'Nama' => $this->input->post('namasup'),
                'Alamat' => $this->input->post('alamat'),
                'Telp' => $this->input->post('telp'),
                'email' => $this->input->post('email')
            );
            $insert = $this->Msupplier->create($data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Supplier berhasil ditambahkan</div>');
            redirect('Supplier');
        }
    }

    public function editsup($id)
    {
        $where = array('id' => $id);
        $data['datasup'] = $this->Msupplier->getsupbyid($where, 'supplier');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Supplier';
        $data['supplier'] = $this->Msupplier->getsupplier();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('supplier/formedit.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatesup()
    {
        $this->form_validation->set_rules('namasup', 'Nama', 'required', ['required' => 'Nama Supplier tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat tidak boleh kosong']);
        $this->form_validation->set_rules('telp', 'Telepon', 'required', ['required' => 'Telepon tidak boleh kosong']);

        if ($this->form_validation->run() == false) {
            $this->index();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data harus lengkap, silahkan ulangi</div>');
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'Nama' => $this->input->post('namasup'),
                'Alamat' => $this->input->post('alamat'),
                'Telp' => $this->input->post('telp'),
                'email' => $this->input->post('email')
            );
            $insert = $this->Msupplier->update(array('id' => $this->input->post('id')), $data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Supplier berhasil diedit</div>');
            redirect('Supplier');
        }
    }

    public function delsup($id)
    {
        $this->Msupplier->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Supplier berhasil dihapus</div>');
        redirect('Supplier');
    }
}
