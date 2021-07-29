<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas_model extends CI_Model
{

    public function getDataTugas()
    {
        $query = "SELECT  `tbl_jadwal`.*,`tbl_status`.`status_name`,`tbl_instansi`.`nama_instansi`
                FROM `tbl_jadwal` 
                JOIN `tbl_status`  ON  `tbl_jadwal` . `status_id` = `tbl_status`.`id_status` 
                JOIN `tbl_instansi`  ON  `tbl_jadwal` . `id_instansi` = `tbl_instansi`.`id`
                ORDER BY tbl_jadwal.tanggal DESC  ";
        return  $this->db->query($query)->result();
    }
}