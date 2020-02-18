<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pengadaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('Mpengadaan');
        $this->load->model('Mbarang');
        $this->load->model('Msupplier');
        $this->load->model('Mstok');
    }


    function get_ajax() {
        $list = $this->Mpengadaan->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->kodepengadaan;
            $row[] = $item->Nama;
            $row[] = mediumdate_indo($item->tgl);
            $row[] = "Rp. ".number_format($item->total,2);
            // add html for action
            $row[] = "<a class='btn btn-primary showdetail' href='' data-toggle='modal' data-url='".base_url('Pengadaan/showdetail/'. $item->id )."' data-target='.bd-example-modal-lg'>Detail</a>";
            // '<a class="btn btn-primary showdetail" href="" data-toggle="modal" data-url="base_url("Pengadaan/showdetail/'. $item->id .'")" data-target=".bd-example-modal-lg">Detail</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->Mpengadaan->count_all(),
                    "recordsFiltered" => $this->Mpengadaan->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';
        $data['pengadaan'] = $this->Mpengadaan->getpengadaan();
        // $data['detail'] = $this->showdetail();

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
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', ['required' => 'Tanggal tidak boleh kosong']);
        $this->form_validation->set_rules('sup', 'Supplier', 'required', ['required' => 'Supplier tidak boleh kosong']);
        // $this->form_validation->set_rules('nota', 'Nota', 'required', ['required' => 'Nota tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->formpengadaan();
        } else {
            $data = array(
                'kodepengadaan' => $this->input->post('no_pengadaan'),
                'tgl' => $this->input->post('tanggal'),
                'idsup' => $this->input->post('sup'),
                'total' => $this->input->post('total'),
                'fotonota' => $this->input->post('no_pengadaan')
            );
            $tambah = $this->Mpengadaan->savepengadaan($data);

            $uploadfiles = $_FILES['nota']['name'];
            
            if($uploadfiles){
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = '3072';
                $config['file_name']            = $this->input->post('no_pengadaan');
                $config['upload_path']          = './nota/pengadaan/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('nota')){
                    $new = $this->upload->data('file_name');
                    $this->db->where('kodepengadaan', $this->input->post('no_pengadaan'));
                    $this->db->set('fotonota', $new);
                    $this->db->update('pengadaan');
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Pengadaan Berhasil</div>');
                    redirect('Pengadaan');
                } else{
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function showdetail($id){
        $data = $this->Mpengadaan->getdetail($id);

        $response = [];
        $response['pengadaan'] = $this->Mpengadaan->getpengadaanbyid($id);
        $response['detail_pengadaan'] = $this->Mpengadaan->getdetail($id);

        // echo json_encode($response);
        $this->load->view('pengadaan/detail',$response);
    }

    public function laporan(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Pengadaan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengadaan/laporan.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cetaklaporan(){
        $this->load->library('dompdf_gen');
        $awal = $this->input->post('tglmulai');
        $akhir = $this->input->post('tglselesai');
        $data['laporan'] = $this->Mpengadaan->getpengadaanbydate();

        $this->load->view('pengadaan/cetakpengadaan',$data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Pengadaan".$awal." sampai ".$akhir.".pdf", array("attachment" =>0));
    }

    public function getstok(){
        $id=$this->input->post('id');
        $data=$this->Mstok->hitungstok($id);
        echo json_encode($data);
    }

    
}//end 
