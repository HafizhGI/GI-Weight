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
        $filter = $this->input->get();
        $data['hasil'] = $this->Report_model->get_filtered_data($filter);

        // Ambil daftar style untuk dropdown
        $data['style_list'] = $this->db->distinct()->select('style')->get('report_hasil')->result();

        // Load view
        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/report', $data);
        $this->load->view('template/new_template/footer_wpu');
    }
}
