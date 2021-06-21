<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        check_login();
    }
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $this->load->model('Dashboard_model', 'dash');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $dataMinggu = $this->dash->getDashboard($id);
        $dataBulan = $this->dash->getDashboardmonthly($id);
        $dataTahun = $this->dash->getDashboardyear($id);
        if ($dataMinggu) {
            $dataMinggu = $dataMinggu['0']['Jumlah_mingguan'];
        } else {
            $dataMinggu = 0;
        }
        if ($dataBulan) {
            $dataBulan = $dataBulan['0']['Jumlah_bulanan'];
        } else {
            $dataBulan = 0;
        }
        if ($dataTahun) {
            $dataTahun = $dataTahun['0']['Jumlah_tahunan'];
        } else {
            $dataTahun = 0;
        }
        $data['minggu'] = $dataMinggu;
        $data['bulan'] = $dataBulan;
        $data['tahun'] = $dataTahun;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tugas/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function daftartugasmember()
    {
        $data['title'] = 'Daftar Tugas';
        $this->load->model('Tugas_model', 'tugas');
        $this->load->model('Datang_model', 'datang');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status'] = $this->db->get_where('tbl_status')->result_array();
        $data['jad'] = $this->tugas->getDataTugas();



        //data tugas
        $tugas = $this->tugas->getDataTugas();
        $array_tampil_tugas = array();
        $ind = 0;
        foreach ($tugas as $row) {
            $array_tampil_tugas[$ind]['id_jadwal'] = $row->id_jadwal;
            $array_tampil_tugas[$ind]['tanggal'] = $this->datang->tanggal(explode('-',  $row->tanggal));
            $array_tampil_tugas[$ind]['jam'] = $row->jam;
            $array_tampil_tugas[$ind]['tempat'] = $row->tempat;
            $array_tampil_tugas[$ind]['agenda'] = $row->agenda;
            $array_tampil_tugas[$ind]['status_name'] = $row->status_name;
            $array_tampil_tugas[$ind]['status_id'] = $row->status_id;
            $array_tampil_tugas[$ind]['foto_bukti'] = $row->foto_bukti;

            //ambil data anggotadatang sesuai dg id jadwal
            $array_tampil_tugas[$ind]['anggota'] =  $this->datang->getDatang($row->id_jadwal);
            $ind += 1;
        }

        $data['anggotadatang'] = $array_tampil_tugas;


        // $this->load->model('Datang_model', 'datang');
        // $data['dat'] = $this->datang->getDatang();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tugas/daftartugasmember', $data);
        $this->load->view('templates/footer');
    }

    public function anggotaJoin()
    {
        $this->load->model('Checkanggota_model', 'checkanggota');

        $idJadwal = $this->input->post('idJadwal');
        $iduser = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        $dcheck = $this->checkanggota->check($idJadwal);
        $check = $dcheck[0]['hasil'];
        if ($check >= 3 || $check == "NULL") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sudah Penuh!</div>');
            redirect('tugas/daftartugasmember');
        } else {

            $data = [

                'id_user' => $iduser,
                'id_jadwal' => $idJadwal,
                'jobdesk' => $role_id

            ];

            $this->db->insert('tbl_anggotadatang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Agenda has been successfully added!</div>');
            redirect('tugas/daftartugasmember');
        }
    }

    public function anggotabatalJoin()
    {

        $idJadwal = $this->input->post('idJadwal');
        $iduser = $this->session->userdata('user_id');


        $data = [

            'id_user' => $iduser,
            'id_jadwal' => $idJadwal


        ];

        $this->db->delete('tbl_anggotadatang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Join has canceled !</div>');
        redirect('tugas/daftartugasmember');
    }
    public function uploadBukti()
    {

        $idJadwal = $this->input->post('id_jadwal');

        var_dump($idJadwal);
        // cek jika ada gambara yang akan di upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/uploadBukti/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_bukti', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $status = 3;
        $this->db->set('status_id', $status);
        $this->db->where('id_jadwal', $idJadwal);
        $this->db->update('tbl_jadwal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto Berhasil di Upload !</div>');
        redirect('tugas/daftartugasmember');
    }
}