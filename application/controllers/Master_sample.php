<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_sample extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Master_sample_model');
        $this->sess_id = $this->session->userdata('name');
    }

    public function index()
    {
        $data['title'] = 'Master Sample';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['orc'] = '';
        $data['style'] = '';
        $data['size'] = '';
        $data['error'] = $this->session->flashdata('error');
        $data['sukses'] = $this->session->flashdata('sukses');

        $data['data'] = $this->Master_sample_model->get_all(); // ambil semua data sample
        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/master_sample', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function insert()
    {
        $orc = $this->input->post('orc');
        $style = $this->input->post('style');
        $size = $this->input->post('size');

        $data = array(
            'orc' => $orc,
            'style' => $style,
            'size' => $size,
        );

        $this->Master_sample_model->insert($data);
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
        redirect('Master_sample/index');
    }

    public function edit()
    {
        $id = $this->input->get('id_sample');
        $data['title'] = 'Edit Sample';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $data['sample'] = $this->Master_sample_model->get_by_id($id);

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/edit_sample', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function update()
    {
        $id = $this->input->post('id_sample');
        $data = [
            'orc' => $this->input->post('orc'),
            'style' => $this->input->post('style'),
            'size' => $this->input->post('size'),
        ];

        $this->Master_sample_model->update($id, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diupdate');
        redirect('Master_sample');
    }

    public function delete()
    {
        $id = $this->input->get('id_sample');
        if ($id) {
            $this->Master_sample_model->delete($id);
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus');
        }
        redirect('Master_sample');
    }
}
