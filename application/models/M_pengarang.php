<?php

class M_pengarang extends CI_Model
{
    public function edit($id)
    {
        $this->db->where('id_pengarang', $id);
        return $this->db->get('pengarang')->row_array();
    }
    public function update($data)
    {
        $this->db->update('pengarang', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_pengarang', $id);
        $this->db->delete('pengarang');
    }
}
