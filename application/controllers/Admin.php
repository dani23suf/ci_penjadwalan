<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        check_login();
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->model('Dashboard_admin_model', 'dashboard');
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $dataTerlaksana = $this->dashboard->getDashboardTerlaksana();
        $dataDijadwalkan = $this->dashboard->getDashboarDijadwalkan();
        $datadibatalkan = $this->dashboard->getDashboarddibatalkan();
        $SemuaAgenda = $this->dashboard->getDashboardSemua();
        $PalingSering = $this->dashboard->OrangSering();
        $PalingTidakSering = $this->dashboard->OrangTidakSering();
        if ($dataTerlaksana) {
            $dataTerlaksana = $dataTerlaksana['0']['terlaksana'];
        } else {
            $dataTerlaksana = 0;
        }
        if ($dataDijadwalkan) {
            $dataDijadwalkan = $dataDijadwalkan['0']['dijadwalkan'];
        } else {
            $dataDijadwalkan = 0;
        }
        if ($datadibatalkan) {
            $datadibatalkan = $datadibatalkan['0']['dibatalkan'];
        } else {
            $datadibatalkan = 0;
        }
        if ($SemuaAgenda) {
            $SemuaAgenda = $SemuaAgenda['0']['semua'];
        } else {
            $SemuaAgenda = 0;
        }
        if ($PalingSering) {
            $PalingSering = $PalingSering['0']['name'];
        } else {
            $PalingSering = 0;
        }
        if ($PalingTidakSering) {
            $PalingTidakSering = $PalingTidakSering;
        } else {
            $PalingTidakSering = 0;
        }
        $data['terlaksana'] = $dataTerlaksana;
        $data['dijadwalkan'] = $dataDijadwalkan;
        $data['dibatalkan'] = $datadibatalkan;
        $data['semua'] = $SemuaAgenda;
        $data['sering'] = $PalingSering;
        $data['tidaksering'] = $PalingTidakSering;



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function getDay()
    {
        $this->load->model('Dashboard_admin_model', 'dashboard');
        $date1 = date('Y-m-d');
        $ind_date = 6;
        $HariIni = "";
        $tampunghari = array();
        $indextampung = 0;
        for ($i = $ind_date; $i > -1; $i--) {
            if ($i != 0) {
                $HariIni = date('Y-m-d', strtotime($date1 . "-$i days"));
            } else {
                $HariIni = date('Y-m-d');
            }
            $dataHarianKebelakang = $this->dashboard->DataBarchart($HariIni);
            $tampunghari[$indextampung] = $dataHarianKebelakang;
            $indextampung++;
        }
        var_dump($tampunghari);
        // return $this->output
        //     ->set_content_type('application/json')
        //     ->set_status_header(200)
        //     ->set_output(json_encode($tampunghari));
    }




    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function addRole()
    {
        $roleName = $this->input->post('rolename');

        $data = [

            'role' => $roleName
        ];

        $this->db->insert('user_role', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Role has been successfully added!</div>');
        redirect('admin/role');
    }

    public function editRole()
    {
        $role = $this->input->post('roleid');
        $id  = $this->input->post('id');

        $data = [


            'role' => $role

        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your role has been updated!</div>');
        redirect('admin/role');
    }
    public function hapusRole($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Role has been deleted!</div>');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        // jika result tidak ada isinya atau kurang dari 1
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed </div>');
    }


    public function daftartugas()
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
            $array_tampil_tugas[$ind]['tanggal'] =  $this->datang->tanggal(explode('-', $row->tanggal));
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
        $this->load->view('admin/daftartugas', $data);
        $this->load->view('templates/footer');
    }



    public function editStatus()
    {
        $status = $this->input->post('tugas_id');
        $id  = $this->input->post('id');

        if ($status == 2) {
            $this->db->set('status_id', $status);
            $this->db->where('id_jadwal', $id);
            $this->db->update('tbl_jadwal');
            $this->db->where('id_jadwal', $id);
            $this->db->delete('tbl_anggotadatang');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Status has been change!</div>');
            redirect('admin/daftartugas');
        }

        $this->db->set('status_id', $status);
        $this->db->where('id_jadwal', $id);
        $this->db->update('tbl_jadwal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your status has been updated!</div>');
        redirect('admin/daftartugas');
    }
    public function editJadwal()
    {
        $status = $this->input->post('status');
        $id  = $this->input->post('id');
        $tempat  = $this->input->post('tempat');
        $agenda  = $this->input->post('agenda');
        $tanggal  = $this->input->post('tanggal');
        $jam  = $this->input->post('jam');
        $data = [

            'tanggal' => $tanggal,
            'jam' => $jam,
            'tempat' => $tempat,
            'agenda' => $agenda,
            'status_agenda' => $status,
            'foto_bukti' => null
        ];

        $this->db->set($data);
        $this->db->where('id_jadwal', $id);
        $this->db->update('tbl_jadwal');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Jadwal has been updated!</div>');
        redirect('admin/daftartugas');
    }
    public function addJadwal()
    {

        $status = $this->input->post('status');

        $tempat  = $this->input->post('tempat');
        $agenda  = $this->input->post('agenda');
        $tanggal  = $this->input->post('tanggal');
        $jam  = $this->input->post('jam');

        $data = [

            'tanggal' => $tanggal,
            'jam' => $jam,
            'tempat' => $tempat,
            'agenda' => $agenda,
            'status_id' => $status,
            'foto_bukti' => null
        ];

        $this->db->insert('tbl_jadwal', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Agenda has been successfully added!</div>');
        redirect('admin/daftartugas');
    }

    public function hapusAgenda($id)
    {

        $this->db->where('id_jadwal', $id);
        $this->db->delete('tbl_jadwal');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Jadwal has been deleted!</div>');
        redirect('admin/daftartugas');
    }


    public function tambahanggota()
    {
        $data['title'] = 'Tambah Anggota';
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahanggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('tbl_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your account has been created. Please Login!</div>');
            redirect('admin/tambahanggota');
        }
    }
}