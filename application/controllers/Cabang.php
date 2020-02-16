<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcabang');
    }

    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Cabang';
        $data['cabang'] = $this->Mcabang->getcabang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cabang/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formcabang(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Cabang';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cabang/form.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function newcabang()
    {
        $this->form_validation->set_rules('namacab', 'Nama', 'required', ['required' => 'Nama tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email tidak boleh kosong']);
        $this->form_validation->set_rules('telp', 'telp', 'required', ['required' => 'Telepon tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->formcabang();
        } else {
            $data = array(
                'name' => $this->input->post('namacab'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('email'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            );
            $insert = $this->Mcabang->create($data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Cabang berhasil ditambahkan</div>');
            redirect('Cabang');
        }
    }

    public function editcabang($id)
    {
        $where = array('id' => $id);
        $data['datacab'] = $this->Mcabang->getcabangbyid($where, 'user');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Cabang';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cabang/formedit.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function updatecabang()
    {
        $this->form_validation->set_rules('namacab', 'Nama', 'required', ['required' => 'Nama tidak boleh kosong']);
        $this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email tidak boleh kosong']);
        $this->form_validation->set_rules('telp', 'telp', 'required', ['required' => 'Telepon tidak boleh kosong']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->index();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data harus lengkap, silahkan ulangi</div>');
        } else {
            $data = array(
                'name' => $this->input->post('namacab'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
                'id' => $this->input->post('id')
            );
            $insert = $this->Mcabang->update(array('id' => $this->input->post('id')), $data);
            echo json_encode(array("status" => TRUE));
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Cabang berhasil diedit</div>');
            redirect('Cabang');
        }
    }

    public function delcabang($id)
    {
        $this->Mcabang->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Cabang berhasil dihapus</div>');
        redirect('Cabang');
    }
}