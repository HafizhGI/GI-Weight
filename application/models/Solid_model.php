<?php
class Solid_model extends CI_Model
{
    public function get_sizes_by_orc($orc)
    {
        // Query ke database berdasarkan ORC
        $this->db->select('size');
        $this->db->from('solid_packing_list'); // Ganti dengan nama tabel yang benar
        $this->db->where('orc', $orc);
        $query = $this->db->get();
        return $query->result_array();
    }
}
