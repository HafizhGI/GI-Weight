<?php
class Master_sample_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('master_sample', $data);
        return $this->db->insert_id();
    }

    public function get_all()
    {
        $this->db->order_by('id_sample', 'ASC'); // penting agar urutan konsisten
        return $this->db->get('master_sample')->result();
    }


    public function get_by_id($id_sample)
    {
        return $this->db->get_where('master_sample', ['id_sample' => $id_sample])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_sample', $id);
        return $this->db->update('master_sample', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_sample', $id);
        return $this->db->delete('master_sample');
    }

    // Ambil size berdasarkan orc/style/color dari database SOLID
    public function get_size_by_osc($orc, $style, $colour)
    {
        // Ambil data dari DB solid_packing_list.tabel solid_packing_list
        $db_solid = $this->load->database('solid_packing_list', TRUE);

        return $db_solid->select('size')
            ->from('solid_packing_list')
            ->where('orc', $orc)
            ->where('style', $style)
            ->where('color', $colour)
            ->group_by('size')
            ->get()
            ->result_array();
    }

    public function get_detail_by_key($orc, $style, $size)
    {
        $db_solid = $this->load->database('solid_packing_list', TRUE);

        return $db_solid->select('color, box_capacity, total_box')
            ->from('solid_packing_list')
            ->where('orc', $orc)
            ->where('style', $style)
            ->where('size', $size)
            ->limit(1)
            ->get()
            ->row_array();
    }
}
