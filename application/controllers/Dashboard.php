<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->sess_id = $this->session->userdata('name');
    }
    public function index_dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function getChartData()
    {
        $query = $this->db->query("
        SELECT 
            WEEK(created_at) AS minggu,
            SUM(penimbangan) AS total_penimbangan,
            SUM(pemesanan) AS total_pemesanan
        FROM data_penimbangan
        GROUP BY minggu
    ");

        return $query->result_array();
    }
}
