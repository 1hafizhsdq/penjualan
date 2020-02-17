<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mdistribusi extends CI_Model
{
    public function getmaxid()
    {
        $query = $this->db->query("select max(id) from distribusi");
        return $query->row_array();
    }
}