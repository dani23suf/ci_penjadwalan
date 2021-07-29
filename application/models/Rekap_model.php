<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{



    public function getRekapDataBulan()
    {
        $bulan = "SELECT (tanggal) as tanggal ,tbl_user.name,YEAR(tanggal)  AS tahun,MONTH(tanggal)  AS bulan, COUNT(*) AS Jumlah_bulanan FROM tbl_anggotadatang 
        INNER JOIN tbl_jadwal
        ON tbl_anggotadatang.id_jadwal = tbl_jadwal.id_jadwal 
        INNER JOIN tbl_user
        ON tbl_anggotadatang.id_user = tbl_user.id
        GROUP BY tbl_user.name,MONTH(tanggal),YEAR(tanggal)  ";
        return  $this->db->query($bulan)->result_array();
    }

    public function getRekap($bulan)
    {
        $bari = "SELECT ('2020-06-22') as tanggal ,tbl_user.name,MONTH(tanggal)  AS bulan, COUNT(*) AS Jumlah_bulanan FROM tbl_anggotadatang 
        INNER JOIN tbl_jadwal
        ON tbl_anggotadatang.id_jadwal = tbl_jadwal.id_jadwal 
        INNER JOIN tbl_user
        ON tbl_anggotadatang.id_user = tbl_user.id
        WHERE CONCAT(YEAR(tanggal),MONTH(tanggal)) = CONCAT(YEAR('2020-06-22'),MONTH('2020-06-22'))";
        return $this->db->query($bari)->result_array();
    }

    public function tanggal($tanggal)
    {
        //pisahkan tanggal

        $bulan = $tanggal;

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
        $tang = $bulan;
        return $tang;
    }
}