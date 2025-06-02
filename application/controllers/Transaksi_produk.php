<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Data_produk_model');
        $this->load->library('session');
        $this->sess_id = $this->session->userdata('name');
    }

    public function index_transpro()
    {
        $data['title'] = 'Data Produk';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['produk'] = $this->Data_produk_model->getAllProduk();

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/transpro', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function simpan_produk()
    {
        // Ambil data JSON dari input
        $json = $this->input->post('produk');
        $data = json_decode($json, true);

        // Validasi data
        if (!is_array($data)) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak valid']);
            return;
        }

        // Panggil metode simpanProduk dari model
        $result = $this->Data_produk_model->simpanProduk($data);

        // Kembalikan hasil dalam format JSON
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data']);
        }
    }
}
