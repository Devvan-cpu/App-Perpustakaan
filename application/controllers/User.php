<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_pinjam');
        $this->load->model('m_pengembalian');
        $this->load->model('m_anggota');
    }
    public function index()
    {
        $data['title'] =  'App Perpus | Petugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('sb_templates/footer');
    }
    public function daftar()
    {
        $data['title'] =  'App Perpus | Daftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_anggota']     = $this->m_anggota->id_anggota();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('user/daftar', $data);
        $this->load->view('sb_templates/footer');
    }
    function insert_data()
    {
        $data = array(
            'id_anggota'     => $this->input->post('id_anggota'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'jaskel' => $this->input->post('jaskel'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $insert = $this->db->insert('anggota', $data);
        if ($insert) :
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Sudah Terdaftar</div>');
            redirect('user/daftar');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('user/daftar');
        endif;
    }
    public function Pinjam()
    {
        $data['title'] =  'App Perpus | Pinjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_peminjaman'] = $this->m_pinjam->id_peminjaman();
        $data['pinjam']    = $this->db->get('anggota')->result();
        $data['buku']        = $this->db->get('buku')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('user/pinjam', $data);
        $this->load->view('sb_templates/footer');
    }
    public function v_pinjam()
    {
        $data['title'] =  'App Perpus | Data Pinjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->m_pinjam->getDataPeminjaman();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('user/v_pinjam', $data);
        $this->load->view('sb_templates/footer');
    }
    public function jumlah_buku()
    {
        $id = $this->input->post('id');
        $data = $this->m_pinjam->jumlah_buku($id);
        echo json_encode($data);
    }
    function insert_pinjam()
    {
        $data = array(
            'id_pm' => $this->input->post('id_pm'),
            'name' => $this->input->post('name'),
            'id_buku' => $this->input->post('id_buku'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali'),
        );

        $insert = $this->db->insert('pinjam', $data);
        if ($insert) :
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Buku Sudah Dipinjam</div>');
            redirect('user/pinjam');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('user/pinjam');
        endif;
    }
    public function kembalikan($id)
    {
        $data = $this->m_pinjam->getDataById_pm($id);
        $data = array(
            'id_anggota'         => $data['id_anggota'],
            'id_buku'             => $data['id_buku'],
            'tgl_pinjam'         => $data['tgl_pinjam'],
            'tgl_kembali'         => $data['tgl_kembali'],
            'tgl_kembalikan'     => date('Y-m-d')
        );

        $query = $this->db->insert('pengembalian', $data);
        if ($query = true) {
            $delete = $this->m_pinjam->deletePm($id);
            if ($delete = true) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Buku Sudah Di Kembalikan</div>');
                redirect('user/v_pinjam');
            }
        }
    }
    public function pegembalian()
    {
        $data['title'] =  'App Perpus | Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->m_pengembalian->getAllData();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('user/pengembalian', $data);
        $this->load->view('sb_templates/footer');
    }
}
