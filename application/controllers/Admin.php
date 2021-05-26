<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_pengarang');
        $this->load->model('m_penerbit');
        $this->load->model('m_buku');
        $this->load->model('m_pinjam');
        $this->load->model('m_pengembalian');
        $this->load->model('m_anggota');
        $this->load->model('m_index');
    }
    public function index()
    {
        $data['title'] =  'App Perpus | Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota']     = $this->m_index->countAnggota();
        $data['buku']         = $this->m_index->countBuku();
        $data['pinjam']         = $this->m_index->countPinjam();
        $data['kembali']     = $this->m_index->countKembali();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('sb_templates/footer');
    }
    public function anggota()
    {
        $data['title'] =  'App Perpus | Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->db->get('anggota')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/anggota', $data);
        $this->load->view('sb_templates/footer');
    }
    public function tambah_anggota()
    {
        $data['title'] =  'App Perpus | Daftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_anggota']     = $this->m_anggota->id_anggota();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/tambah_anggota', $data);
        $this->load->view('sb_templates/footer');
    }
    public function edit_anggota($id)
    {
        $data['title'] =  'App Perpus | Daftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']         = $this->m_anggota->edit($id);
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/edit_anggota', $data);
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
            redirect('admin/anggota');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('admin/anggota');
        endif;
    }
    public function updateeee()
    {
        $id_anggota = $this->input->post('id_anggota');
        $data = array(
            'id_anggota'     => $this->input->post('id_anggota'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'jaskel' => $this->input->post('jaskel'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        );
        $query = $this->m_anggota->update($id_anggota, $data);
        if ($query = true) {
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Sudah Di Update</div>');
            redirect('admin/anggota');
        }
    }
    public function hapus($id)
    {
        $query = $this->m_anggota->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Hapus</div>');
            redirect('admin/anggota');
        }
    }
    public function pinjam()
    {
        $data['title'] =  'App Perpus | Data Pinjaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->m_pinjam->getDataPeminjaman();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/pinjam', $data);
        $this->load->view('sb_templates/footer');
    }
    public function tambah_pinjam()
    {
        $data['title'] =  'App Perpus | Pinjam';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_peminjaman'] = $this->m_pinjam->id_peminjaman();
        $data['pinjam']    = $this->db->get('anggota')->result();
        $data['buku']        = $this->db->get('buku')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/tambah_pinjam', $data);
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
            redirect('admin/pinjam');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('admin/pinjam');
        endif;
    }
    public function pengarang()
    {
        $data['title'] =  'App Perpus | Pengarang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get('pengarang')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/pengarang', $data);
        $this->load->view('sb_templates/footer');
    }
    public function tambah_pengarang()
    {
        $data['title'] =  'App Perpus | Pengarang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/tambah_pengarang', $data);
        $this->load->view('sb_templates/footer');
    }
    public function insert_prng()
    {

        $data['name_pengarang'] = $this->input->post('name_pengarang');

        $insert = $this->db->insert('pengarang', $data);
        if ($insert) :
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Tambahkan</div>');
            redirect('admin/pengarang');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('admin/pengarang');
        endif;
    }
    public function edit($id)
    {
        $data['title'] =  'App Perpus | Pengarang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']     = $this->m_pengarang->edit($id);
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/edit_pengarang', $data);
        $this->load->view('sb_templates/footer');
    }

    public function update()
    {
        $data['name_pengarang'] = $this->input->post('name_pengarang');
        $query = $this->m_pengarang->update($data);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Update</div>');
            redirect('admin/pengarang');
        }
    }

    public function hapuss($id)
    {
        $query = $this->m_pengarang->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Hapus</div>');
            redirect('admin/pengarang');
        }
    }
    public function penerbit()
    {
        $data['title'] =  'App Perpus | Penerbit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->db->get('penerbit')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/penerbit', $data);
        $this->load->view('sb_templates/footer');
    }
    public function tambah_penerbit()
    {
        $data['title'] =  'App Perpus | Penerbit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/tambah_penerbit', $data);
        $this->load->view('sb_templates/footer');
    }
    function insert_prbt()
    {
        $data['name_penerbit'] = $this->input->post('name_penerbit');

        $insert = $this->db->insert('penerbit', $data);
        if ($insert) :
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Tambahkan</div>');
            redirect('admin/penerbit');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('admin/penerbit');
        endif;
    }
    public function editt($id)
    {
        $data['title'] =  'App Perpus | Penerbit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']     = $this->m_penerbit->edit($id);
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/edit_penerbit', $data);
        $this->load->view('sb_templates/footer');
    }
    public function updatee()
    {

        $data['name_penerbit']     = $this->input->post('name_penerbit');
        $query = $this->m_penerbit->update($data);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Update</div>');
            redirect('admin/penerbit');
        }
    }
    public function hapusss($id)
    {
        $query = $this->m_penerbit->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Hapus</div>');
            redirect('admin/penerbit');
        }
    }
    public function buku()
    {
        $data['title'] =  'App Perpus | Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->m_buku->_getData();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/buku', $data);
        $this->load->view('sb_templates/footer');
    }
    public function tambah_buku()
    {
        $data['title'] =  'App Perpus | Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_buku']    = $this->m_buku->id_buku();
        $data['pengarang'] = $this->db->get('pengarang')->result();
        $data['penerbit'] = $this->db->get('penerbit')->result();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/tambah_buku', $data);
        $this->load->view('sb_templates/footer');
    }
    public function insert_buku()
    {
        $data = array(
            'id_buku'         => $this->input->post('id_buku'),
            'id_pengarang'     => $this->input->post('id_pengarang'),
            'id_penerbit'     => $this->input->post('id_penerbit'),
            'judul_buku'     => $this->input->post('judul_buku'),
            'tahun_terbit'     => $this->input->post('tahun_terbit'),
            'jumlah'         => $this->input->post('jumlah')
        );

        $insert = $this->db->insert('buku', $data);
        if ($insert) :
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Tambahkan</div>');
            redirect('admin/buku');
        else :
            $this->session->set_flashdata('alert', $insert);
            redirect('admin/buku');
        endif;
    }
    public function edittt($id)
    {
        $data['title'] =  'App Perpus | Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengarang']     = $this->db->get('pengarang')->result();
        $data['penerbit']     = $this->db->get('penerbit')->result();
        $data['data']        = $this->m_buku->edit($id);
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/edit_buku', $data);
        $this->load->view('sb_templates/footer');
    }
    public function updateee()
    {
        $id_buku = $this->input->post('id_buku');
        $data = array(
            'id_buku'         => $this->input->post('id_buku'),
            'id_pengarang'     => $this->input->post('id_pengarang'),
            'id_penerbit'     => $this->input->post('id_penerbit'),
            'judul_buku'     => $this->input->post('judul_buku'),
            'tahun_terbit'     => $this->input->post('tahun_terbit'),
            'jumlah'         => $this->input->post('jumlah')
        );
        $query = $this->m_buku->update($id_buku, $data);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Update</div>');
            redirect('admin/buku');
        }
    }
    public function hapussss($id)
    {
        $query = $this->m_buku->hapus($id);
        if ($query = true) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">Data Sudah Di Hapus</div>');
            redirect('admin/buku');
        }
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
                redirect('admin/pinjam');
            }
        }
    }
    public function pegembalian()
    {
        $data['title'] =  'App Perpus | Pengembalian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']    = $this->m_pengembalian->getAllData();
        $this->load->view('sb_templates/header', $data);
        $this->load->view('admin/pengembalian', $data);
        $this->load->view('sb_templates/footer');
    }
}
