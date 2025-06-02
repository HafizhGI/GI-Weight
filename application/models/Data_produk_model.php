<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_produk_model extends CI_Model
{
    public function getAllProduk()
    {
        return $this->db->get('trans_barang')->result_array(); // ganti 'produk' sesuai nama tabel kamu
    }
}
