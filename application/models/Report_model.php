<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('MONTH(tanggal) AS bulan, COUNT(*) AS total');
        $this->db->from('penimbangan');
        $this->db->group_by('MONTH(tanggal)');
        $this->db->order_by('MONTH(tanggal)', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_filtered_data($filter)
    {
        $this->db->from('report_hasil');

        if (!empty($filter['style'])) {
            $this->db->where('style', $filter['style']);
        }

        if (!empty($filter['tglMulai']) && !empty($filter['tglAkhir'])) {
            $this->db->where('tanggal >=', $filter['tglMulai']);
            $this->db->where('tanggal <=', $filter['tglAkhir']);
        }

        return $this->db->get()->result();
    }
}
