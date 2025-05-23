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
        return $this->db->get('master_sample')->result_array(); // ini buat tampilin data
    }

    public function get_by_id($id_sample)
    {
        return $this->db->get_where('sample', ['id_sample' => $id_sample])->row_array();
    }


    public function update($id, $data)
    {
        $this->db->where('id_sample', $id);
        return $this->db->update('master_sample', $data);
    }

    public function get_size_by_osc($orc, $style, $colour)
    {
        return $this->db->select('size')
            ->from('solid_packing_list')
            ->where('orc', $orc)
            ->where('style', $style)
            ->where('color', $colour)
            ->group_by('size')
            ->get()
            ->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id_sample', $id);
        return $this->db->delete('master_sample');
    }
}
