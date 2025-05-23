<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Data_produk_model'); // Model harus sesuai
        $this->sess_id = $this->session->userdata('name');
    }

    public function index_transpro()
    {
        $data['title'] = 'Data Produk';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['produk'] = $this->Data_produk_model->getAllProduk(); // panggil model dengan huruf besar

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/transpro', $data);
        $this->load->view('template/new_template/footer_wpu');
    }
}
