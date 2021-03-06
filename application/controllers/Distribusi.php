<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('Mdistribusi');
        $this->load->model('Mbarang');
        $this->load->model('Mstok');
        $this->load->model('Mcabang');
    }

    function get_ajax() {
        $list = $this->Mdistribusi->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->kodedistribusi;
            $row[] = $item->name;
            $row[] = mediumdate_indo($item->tgldistribusi);
            $row[] = "Rp. ".number_format($item->total,2);
            // add html for action
            $row[] = "<a class='btn btn-primary showdetail' href='' data-toggle='modal' data-url='".base_url('Distribusi/showdetail/'. $item->id )."' data-target='.bd-example-modal-lg'>Detail</a>
            <a class='btn btn-warning showdetail' href='".base_url('Distribusi/cetaknota/'.$item->id)."'>Nota</a>";
            // '<a class="btn btn-primary showdetail" href="" data-toggle="modal" data-url="base_url("Pengadaan/showdetail/'. $item->id .'")" data-target=".bd-example-modal-lg">Detail</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->Mdistribusi->count_all(),
                    "recordsFiltered" => $this->Mdistribusi->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Distribusi';
        $data['distribusi'] = $this->Mdistribusi->getdistribusi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distribusi/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function formdist()
    {
        if(isset($_POST['submit'])){
            $this->Mdistribusi->insertdetailfirst();
            redirect('Distribusi/formdist');
        }else{
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Distribusi';
            $data['detail']= $this->Mdistribusi->showcart();
            $data['barang'] = $this->Mbarang->getbarang();
            $data['cabang'] = $this->Mcabang->getcabang();
            $data['total'] = $this->Mdistribusi->counttotal();
    
            // get kode transaksi
            $kode = 'DS' . date('ymd');
            $kode_terakhir = $this->Mdistribusi->getmaxid();
            $kode_tambah = substr($kode_terakhir['max(id)'], -1, 1);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 2, '0', STR_PAD_LEFT);
            $data['nodistribusi'] = $kode . $number;
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distribusi/form.php', $data);
            $this->load->view('templates/footer', $data);
        }

    }

    public function remove(){
        $id =  $this->uri->segment(3);
        $tgl =  $this->uri->segment(4);
        $jml =  $this->uri->segment(5);
        $this->Mdistribusi->delcart($id,$tgl,$jml);
        redirect('Distribusi/formdist');
    }

    public function gettgl(){
        $id=$this->input->post('id');
        $data=$this->Mdistribusi->cektgl($id);
        echo json_encode($data);
    }
    
    public function getstok(){
        $id=$this->input->post('id');
        $tgl=$this->input->post('tgl');
        $data=$this->Mstok->cekStok($tgl,$id);
        echo json_encode($data);
    }

    public function submit(){
        $this->form_validation->set_rules('tgldist', 'Tanggal', 'required', ['required' => 'Tanggal tidak boleh kosong']);
        $this->form_validation->set_rules('cab', 'Cabang', 'required', ['required' => 'Cabang tidak boleh kosong']);
        // $this->form_validation->set_rules('nota', 'Nota', 'required', ['required' => 'Nota tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->formdist();
        } else {
            $data = array(
                'kodedistribusi' => $this->input->post('nodist'),
                'tgldistribusi' => $this->input->post('tgldist'),
                'idcabang' => $this->input->post('cab'),
                'total' => $this->input->post('total')
            );
            $tambah = $this->Mdistribusi->savedistribusi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Berhasil Distribusi</div>');
            redirect('Distribusi');
        }
    }

    public function showdetail($id){
        $data = $this->Mdistribusi->getdetail($id);

        $response = [];
        $response['distribusi'] = $this->Mdistribusi->getdistribusibyid($id);
        $response['detail_distribusi'] = $this->Mdistribusi->getdetail($id);

        // echo json_encode($response);
        $this->load->view('distribusi/detail',$response);
    }

    public function laporan(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Distribusi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distribusi/laporan.php', $data);
        $this->load->view('templates/footer', $data);
    }

    public function cetaklaporan(){
        $this->load->library('dompdf_gen');
        $awal = $this->input->post('tglmulai');
        $akhir = $this->input->post('tglselesai');
        // print_r($akhir);die;
        $data['laporan'] = $this->Mdistribusi->getdistribusibydate();

        $this->load->view('distribusi/cetakdistribusi',$data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Distribusi".$awal." sampai ".$akhir.".pdf", array("attachment" =>0));
    }
    
    public function cetaknota($id)
    {
        $this->load->library('dompdf_gen');
        $data['dist'] = $this->Mdistribusi->getdistribusibyid($id);
        $data['det'] = $this->Mdistribusi->getdetail($id);
        $data['total'] = $this->Mdistribusi->counttotalbyid($id);
        // print_r($data['total']);die;
        $this->load->view('distribusi/cetaknota', $data);
        $paper_size = 'A5';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Nota Retur" . $id . ".pdf", array("attachment" => 0));
    }
}