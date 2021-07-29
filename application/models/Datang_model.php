<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datang_model extends CI_Model
{

    public function getDatang($id)
    {
        $query = "SELECT `tbl_anggotadatang`.*,`user_role`.`role`,`tbl_user`.`name`,`tbl_user`.`id`,`tbl_user`.`email`
        FROM `tbl_anggotadatang` 
        JOIN `user_role` 
       ON  `tbl_anggotadatang` . `jobdesk` = `user_role`.`id` 
       JOIN `tbl_user` 
       ON  `tbl_anggotadatang` . `id_user` = `tbl_user`.`id`  WHERE id_jadwal = $id";
        return  $this->db->query($query)->result();
    }

    public function rekap()
    {
        $query1 = "SELECT `tbl_anggotadatang`.*,`tbl_jadwal`.`tanggal`,`tbl_user`.`name`,`tbl_user`.`id`,`tbl_jadwal`.`tempat`
        ,`tbl_jadwal`.`agenda`,`tbl_instansi`.`nama_instansi`
                FROM `tbl_anggotadatang` 
                JOIN `user_role` 
               ON  `tbl_anggotadatang` . `jobdesk` = `user_role`.`id` 
               JOIN `tbl_user` 
               ON  `tbl_anggotadatang` . `id_user` = `tbl_user`.`id`
               JOIN `tbl_jadwal` 
               ON  `tbl_anggotadatang` . `id_jadwal` = `tbl_jadwal`.`id_jadwal` 
                  JOIN `tbl_instansi` 
               ON  `tbl_jadwal` . `id_instansi` = `tbl_instansi`.`id`";
        return $this->db->query($query1)->result();
    }

    public function tanggal($tanggal)
    {
        //pisahkan tanggal
        $tahun = $tanggal[0];
        $bulan = $tanggal[1];
        $hari = $tanggal[2];
        switch ($bulan) {
            case "01":
                $bulan = "Januari";
                break;
            case "02":
                $bulan = "Februari";
                break;
            case "03":
                $bulan = "Maret";
                break;
            case "04":
                $bulan = "April";
                break;
            case "05":
                $bulan = "Mei";
                break;
            case "06":
                $bulan = "Juni";
                break;
            case "07":
                $bulan = "Juli";
                break;
            case "08":
                $bulan = "Agustus";
                break;
            case "09":
                $bulan = "September";
                break;
            case "10":
                $bulan = "Oktober";
                break;
            case "11":
                $bulan = "November";
                break;
            case "12":
                $bulan = "Desember";
                break;
        };
        $tang = $hari . " " . $bulan . " " . $tahun;
        return $tang;
    }
}