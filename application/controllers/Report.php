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
        $data['title'] = 'Report Hasil';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        // Ambil inputan style dan tanggal dari form
        $style = $this->input->post('style');
        $tanggal = $this->input->post('tanggal');

        // Untuk pengisian dropdown STYLE (dari database)
        $data['style_list'] = $this->db->distinct()->select('style')->get('report_hasil')->result();

        // Jika ada inputan, lakukan query
        if ($this->input->post()) {
            $this->db->where('style', $style);
            if (!empty($tanggal)) {
                $this->db->where('DATE(tanggal_input)', $tanggal); // Pastikan kolom tanggal_input ada
            }
            $data['hasil'] = $this->db->get('report_hasil')->result();
        } else {
            $data['hasil'] = []; // Kosong saat awal masuk halaman
        }

        // Load view
        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/report', $data);
        $this->load->view('template/new_template/footer_wpu');
    }
}

