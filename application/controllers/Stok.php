<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stok extends CI_Controller{
    public function getstok($getId){
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}