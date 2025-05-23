<?php
class Sample_model extends CI_Model
{
    public function get_by_id($id_sample)
    {
        return $this->db->get_where('master_sample', ['id_sample' => $id_sample])->row_array();
        // Ganti 'sample_table' dengan nama tabel kamu sebenarnya
    }
}
