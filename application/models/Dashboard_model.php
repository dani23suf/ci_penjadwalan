<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

        public function getDashboard($id)
        {
                $minggu = "SELECT YEARWEEK(tanggal)  AS tanggal, COUNT(*) AS Jumlah_mingguan FROM tbl_anggotadatang 
INNER JOIN tbl_jadwal
ON tbl_anggotadatang.id_jadwal = tbl_jadwal.id_jadwal WHERE id_user = $id  GROUP BY YEARWEEK(tanggal) DESC LIMIT 1 ";
                return  $this->db->query($minggu)->result_array();
        }

        public function getDashboardmonthly($id)
        {
                $bulan = "SELECT MONTH(tanggal)  AS bulan, COUNT(*) AS Jumlah_bulanan FROM tbl_anggotadatang 
                INNER JOIN tbl_jadwal
                ON tbl_anggotadatang.id_jadwal = tbl_jadwal.id_jadwal WHERE id_user = $id  GROUP BY MONTH(tanggal) DESC LIMIT 1 ";
                return  $this->db->query($bulan)->result_array();
        }
        public function getDashboardyear($id)
        {

                $tahun = "SELECT YEAR(tanggal)  AS tahun, COUNT(*) AS Jumlah_tahunan FROM tbl_anggotadatang 
                INNER JOIN tbl_jadwal
                ON tbl_anggotadatang.id_jadwal = tbl_jadwal.id_jadwal WHERE id_user = $id  GROUP BY YEAR(tanggal)";
                return  $this->db->query($tahun)->result_array();
        }
}