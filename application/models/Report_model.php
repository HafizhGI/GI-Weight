<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function get_all()
    {
        // Contoh query untuk menghitung jumlah penimbangan per bulan
        $this->db->select('MONTH(tanggal) AS bulan, COUNT(*) AS total');
        $this->db->from('penimbangan');
        $this->db->group_by('MONTH(tanggal)');
        $this->db->order_by('MONTH(tanggal)', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
}
