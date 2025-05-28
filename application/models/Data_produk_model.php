<?php
class Data_produk_model extends CI_Model
{
    public function simpanProduk($data)
    {
        // Jika $data adalah array asosiatif tunggal
        return $this->db->insert('report_hasil', $data);

        // Jika $data adalah array multidimensi (banyak data)
        // return $this->db->insert_batch('report_hasil', $data);
    }

    public function getAllProduk()
    {
        return $this->db->get('report_hasil')->result();
    }
}
