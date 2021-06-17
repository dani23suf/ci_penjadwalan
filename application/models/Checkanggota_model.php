<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkanggota_model extends CI_Model
{
    public function check($id)
    {
        $query = "SELECT COUNT(*) AS hasil FROM `tbl_anggotadatang` WHERE id_jadwal =  $id ";
        return  $this->db->query($query)->result_array();
    }
}