<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

    public function getDataTugas()
    {
        $query = "SELECT  `tbl_jadwal`.*,`tbl_status`.`status_name`
                FROM `tbl_jadwal` 
                JOIN `tbl_status`  ON  `tbl_jadwal` . `status_id` = `tbl_status`.`id_status` ";
        return  $this->db->query($query)->result();
    }
}