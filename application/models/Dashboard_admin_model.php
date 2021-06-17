<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_admin_model extends CI_Model
{

    public function getDashboardTerlaksana()
    {
        $terlaksana = "SELECT COUNT(*) AS terlaksana FROM tbl_jadwal WHERE status_id = 3";
        return  $this->db->query($terlaksana)->result_array();
    }

    public function getDashboarDijadwalkan()
    {
        $dijadwalkan = "SELECT COUNT(*) AS dijadwalkan FROM tbl_jadwal WHERE status_id = 1";
        return  $this->db->query($dijadwalkan)->result_array();
    }
    public function getDashboarddibatalkan()
    {
        $dibatalkan = "SELECT COUNT(*) AS dibatalkan FROM tbl_jadwal WHERE status_id = 2";
        return  $this->db->query($dibatalkan)->result_array();
    }
    public function getDashboardSemua()
    {
        $jadwalSemua =  "SELECT COUNT(*) AS semua FROM tbl_jadwal ";
        return  $this->db->query($jadwalSemua)->result_array();
    }
    public function OrangSering()
    {
        $sering =  "SELECT id_user,name
        , count(*) as orang_palingsering
     from tbl_anggotadatang JOIN tbl_user ON tbl_anggotadatang.id_user = tbl_user.id
   group by id_user
   having count(*) =
        ( select max(orang_palingsering) as sering_banget
            from (
                 select id_user
                      , count(*) as orang_palingsering
                   from tbl_anggotadatang
                 group
                     by id_user
                 ) as sering
        )";
        return  $this->db->query($sering)->result_array();
    }
    public function OrangTidakSering()
    {
        $TidakSering =  "SELECT id_user,name
        , count(*) as orang_palingsering
     from tbl_anggotadatang JOIN tbl_user ON tbl_anggotadatang.id_user = tbl_user.id
   group by id_user
   having count(*) =
        ( select min(orang_palingsering) as sering_banget
            from (
                 select id_user
                      , count(*) as orang_palingsering
                   from tbl_anggotadatang
                 group
                     by id_user
                 ) as sering
        )";
        return  $this->db->query($TidakSering)->result_array();
    }
}