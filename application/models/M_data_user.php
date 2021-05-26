<?php

class M_data_user extends CI_Model
{
    // Insert Data
    function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    // Delete Data
    function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    // Update Data
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // select data
    function _getData($table)
    {
        return $this->db->get($table);
    }
    // where data
    function where($table, $where)
    {
        return $this->db->get_where($table, $where);
        // translate: select * from table where blablabla
    }
}
