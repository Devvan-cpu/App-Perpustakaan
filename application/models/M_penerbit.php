<?php

class M_penerbit extends CI_Model
{
    public function edit($id)
    {
        $this->db->where('id_penerbit', $id);
        return $this->db->get('penerbit')->row_array();
    }
    public function update($data)
    {
        $this->db->update('penerbit', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_penerbit', $id);
        $this->db->delete('penerbit');
    }
}
