<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Report_model');
        $this->sess_id = $this->session->userdata('name');
    }

    public function index_report()
    {
        $data['title'] = 'Laporan Berdasarkan Kode';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $kode = $this->input->post('kode');

        if (!empty($kode)) {
            $this->db->where('kode', $kode);
            $data['hasil'] = $this->db->get('master_sample')->result(); // ganti dengan nama tabel asli
        } else {
            $data['hasil'] = [];
        }

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/report', $data); // asumsi file ini bernama report.php
        $this->load->view('template/new_template/footer_wpu');
    }
}
