<?php

class M_pinjam extends CI_Model
{
    public function id_peminjaman()
    {
        $this->db->select('RIGHT(pinjam.id_pm,3) as kode', FALSE);
        $this->db->order_by('id_pm', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pinjam');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PM" . $kodemax;
        return $kodejadi;
    }
    public function jumlah_buku($id)
    {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id_buku', $id);
        return $this->db->get()->row_array();
    }
    public function getDataPeminjaman()
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.name = anggota.name', 'left');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku', 'left');
        $this->db->order_by("id_pm", "asc");
        return $this->db->get()->result();
    }
    public function getDataById_pm($id)
    {
        $this->db->select('*');
        $this->db->from('pinjam');
        $this->db->join('anggota', 'pinjam.name = anggota.name');
        $this->db->join('buku', 'pinjam.id_buku = buku.id_buku');
        $this->db->where('pinjam.id_pm', $id);
        return $this->db->get()->row_array();
    }
    public function deletePm($id)
    {
        $this->db->where('id_pm', $id);
        $this->db->delete('pinjam');
    }
}
