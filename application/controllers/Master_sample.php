<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_sample extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db_solid = $this->load->database('solid_packing_list', TRUE);
        $this->load->model('Master_sample_model');
        $this->load->model('Sample_model');
        $this->load->model('Solid_model');
        $this->sess_id = $this->session->userdata('name');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Sample',
            'user' => $this->db->get_where('user', ['name' => $this->sess_id])->row_array(),
            'orc' => '',
            'style' => '',
            'size' => '',
            'error' => $this->session->flashdata('error'),
            'sukses' => $this->session->flashdata('sukses'),
            'data' => $this->Master_sample_model->get_all()
        ];

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/master_sample', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function get_all()
    {
        return $this->db->get('master_sample')->result_array();
    }

    public function insert()
    {
        $orc = $this->input->post('orc', true);
        $style = $this->input->post('style', true);
        $size = $this->input->post('size', true);

        if (!$orc || !$style || !$size) {
            $this->session->set_flashdata('error', 'Input tidak lengkap.');
            redirect('Master_sample');
        }

        $detail = $this->Master_sample_model->get_detail_by_key($orc, $style, $size);

        if (!$detail) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan di solid_packing_list.');
            redirect('Master_sample');
        }

        $data = [
            'orc' => $orc,
            'style' => $style,
            'size' => $size,
            'color' => $detail['color'] ?? null,
            'box_capacity' => $detail['box_capacity'] ?? null,
            'total_box' => $detail['total_box'] ?? null
        ];

        $this->Master_sample_model->insert($data);
        $this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
        redirect('Master_sample');
    }

    public function get_box_capacity()
    {
        $orc = $this->input->get('orc');
        $style = $this->input->get('style');
        $size = $this->input->get('size');

        $result = $this->db->get_where('solid_packing_list', [
            'orc' => $orc,
            'style' => $style,
            'size' => $size,
        ])->row();

        echo json_encode(['box_capacity' => $result->box_capacity ?? 0]);
    }

    public function get_sizes()
    {
        $orc = $this->input->post('orc', true);
        $style = $this->input->post('style', true);
        $color = $this->input->post('color', true);

        $result = $this->Master_sample_model->get_size_by_osc($orc, $style, $color);
        echo json_encode(['size' => $result]);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Sample',
            'user' => $this->db->get_where('user', ['name' => $this->sess_id])->row_array(),
            'row' => $this->Master_sample_model->get_by_id($id)
        ];

        $this->load->view('template/new_template/header_wpu');
        $this->load->view('template/new_template/sidebar_wpu', $data);
        $this->load->view('user/edit_sample', $data);
        $this->load->view('template/new_template/footer_wpu');
    }

    public function update()
    {
        $id_sample = $this->input->post('id_sample');

        $berat_karton = $this->input->post('berat_karton');
        $berat_pcs = $this->input->post('berat_pcs');
        $box_capacity = $this->input->post('box_capacity');
        $berat_standar = $this->input->post('berat_standar');

        if (!$id_sample) {
            $this->session->set_flashdata('error', 'ID Sample tidak ditemukan.');
            redirect('Master_sample');
        }

        $data = [
            'berat_karton' => $berat_karton,
            'berat_pcs' => $berat_pcs,
            'box_capacity' => $box_capacity,
            'berat_standar' => $berat_standar
        ];

        $update = $this->db->where('id_sample', $id_sample)->update('master_sample', $data);

        if ($update) {
            $this->session->set_flashdata('sukses', 'Data berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Gagal update data.');
        }

        redirect('Master_sample');
    }

    public function delete()
    {
        $id = $this->input->get('id_sample');

        if ($id) {
            $this->db->where('id_sample', $id)->delete('master_sample');
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'ID tidak ditemukan.');
        }

        redirect('Master_sample');
    }
}
