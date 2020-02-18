<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mretur extends CI_Model
{
    public function getmaxid()
    {
        $query = $this->db->query("select max(id) from retur");
        return $query->row_array();
    }

    public function allretur()
    {
        $query = $this->db->query("SELECT retur.* , supplier.Nama as supplier,
         pengadaan.kodepengadaan as kode from pengadaan, supplier join retur where
          pengadaan.id = retur.id_pengadaan AND pengadaan.idsup = supplier.id");

        return $query->result_array();
    }

    

    public function delete($idbarang)
    {

        $this->db->where('id_barang', $idbarang);
        $this->db->delete('detailretur');
    }
    public function saveretur()
    {
        $query =
            $this->db->insert(
                'retur',
                array(
                    'koderetur' => $this->input->post('koderetur'),
                    'id_pengadaan' => $this->input->post('id'),
                    'tanggal' => $this->input->post('tanggal', true),
                    'ket' => $this->input->post('ket'),
                    'ket_detail' => $this->input->post('ket_detail'),
                    'estimasi' => $this->input->post('estimasi'),
                    'total_retur' => $this->input->post('total_retur'),
                    'status' => $this->input->post('status')
                )
            );
    }
    //savedetail
    public function detailretur()
    {
        $tanggal = $this->input->post('tanggal');
        $idretur = $this->input->post('Id');
        $idbarang = $this->input->post('idbarang');
        $jumlah = $this->input->post('jumlah');
        $query =
            $this->db->insert(
                'detailretur',
                array(
                    'id_retur' => $idretur,
                    'id_barang' => $idbarang,
                    'jumlah' => $jumlah
                )
            );
        $stok = $this->db->query("select stok from stok where
         idbarang='$idbarang' order by stok desc limit 1")->row();
        $stokinduk = $stok->stok;
        $updatestok = $stokinduk - $jumlah;
        $stok = $this->db->insert('stok', array(
            'idbarang' => $idbarang,
            'tglstok' => $tanggal,
            'stok' => $updatestok,
            'status' => 1
        ));
    }

    public function showall()
    {
        //$returid = $this->input->post('Id');
        $query = $this->db->query("SELECT detailretur.jumlah , barang.nama_barang as nama_barang,
         detailretur.id_barang as id, detailretur.id_barang as 
         idbarang from detailretur , barang where detailretur.id_barang = barang.id ORDER BY id_retur DESC limit 1 ");
        return $query->result_array();
    }

    public function lastid()
    {
        $result = $this->db->query("select pengadaan.kodepengadaan as kode, 
        supplier.Nama as supplier, retur.tanggal as tanggal, retur.ket as ket,
        retur.ket_detail as ket_detail, retur.estimasi as estimasi, retur.total_retur as total_retur,
         retur.status as status ,retur.Id as id, retur.koderetur as koderetur
         from pengadaan join retur , supplier 
         WHERE
         pengadaan.id = retur.id_pengadaan 
         and pengadaan.idsup = supplier.id
          ORDER BY retur.Id desc limit 1");
        return $result->row_array();
    }

    public function barangid()
    {
        $query = $this->db
            ->query('select barang.nama_barang as namabarang
         from detailpengadaan join barang, pengadaan where detailpengadaan.idbarang
         = barang.id and detailpengadaan.idpengadaan = pengadaan.id order by pengadaan.id desc limit 1');
        return $query;
    }
    public function tampil_data()
    {
        $query = $this->db
            ->select('pengadaan.kodepengadaan as kode, pengadaan.id as id')
            ->from('pengadaan')
            ->get();
        return $query;
    }
    public function autokode($kode)
    {
        $query = $this->db->query("select supplier.Nama as supplier ,
         pengadaan.kodepengadaan as kode,
          pengadaan.id as id, supplier.id as id_supplier
         from pengadaan join supplier WHERE pengadaan.idsup
          = supplier.id and pengadaan.kodepengadaan = '$kode'");
        return $query;
    }
    public function autostok($namabarang)
    {
        //$namabarang = $this->input->post('namabarang');
        $query = $this->db
            ->query("SELECT stok.stok as stok, barang.nama_barang as namabarang, barang.id as idbarang FROM barang join 
            stok where barang.id = stok.idbarang and barang.nama_barang = '$namabarang' order by stok.id desc limit 1");

        return $query;
    }
    public function idpeng()
    {
        $query = $this->db
            ->select('pengadaan.*')
            ->from('pengadaan')
            ->get();

        return $query->result_array();
    }

    public function caribarang($kode)
    {
        $query = $this->db
            ->select('barang.nama_barang, stok.idbarang, stok.stok, barang.id as idbarang')
            ->from('barang')
            ->join('stok', 'barang.id = stok.idbarang')
            ->where("barang.nama_barang LIKE '$kode%'")
            ->limit(25)
            ->get();

        return $query->result_array();
    }
    public function confrimretur($id)
    {
        $this->db->set(array(
            'status' => 1
        ));
        $this->db->where('Id', $id);
        $this->db->update('retur');
        return true;
    }

    function ubah($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('pengadaan', $data);
        return TRUE;
    }

    public function getidwaktu()
    {
        $awal = $this->input->post('tglmulai');
        $akhir = $this->input->post('tglselesai');
        $data = $this->db->query("SELECT retur.koderetur as koderetur , retur.tanggal as tanggal,
         retur.estimasi as estimasi, retur.status as st , supplier.Nama as supplier, pengadaan.kodepengadaan 
        as kode from pengadaan, supplier join retur
         where pengadaan.id = retur.id_pengadaan AND pengadaan.idsup = supplier.id  
         and retur.tanggal between '$awal' and '$akhir'");
        return $data->result();
    }


    //ambil semua
    public function getdetail($id)
    {
        $query = $this->db
            ->query(" select detailretur.jumlah , barang.nama_barang as nama_barang,
             detailretur.id_barang as id, detailretur.id_retur as idretur from detailretur , barang where
              detailretur.id_barang = barang.id and detailretur.id_retur ='$id'");

        return $query->result();
    }

    public function getreturbyid($id)
    {
        $query = $this->db->query("select pengadaan.kodepengadaan as kode, supplier.Nama as supplier,
         retur.tanggal as tanggal, retur.ket as ket, retur.ket_detail as ket_detail,
          retur.estimasi as estimasi, retur.total_retur as total_retur,
           retur.koderetur as noretur, retur.status as status ,retur.Id as id from pengadaan join retur , supplier 
        WHERE pengadaan.id = retur.id_pengadaan and pengadaan.idsup = supplier.id and retur.Id = '$id'");
        return $query->result()[0];
    }
}
