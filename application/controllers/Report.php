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








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Master Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Master Sample</h1>

        <!-- Form Master Sample -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <strong>Create / Edit Data</strong>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Master_sample/insert') ?>" method="POST">
<div class="form-group">
    <label for="orc" class="form-label">ORC</label>
    <input type="text" class="form-control" id="orc" name="orc" value="<?= htmlspecialchars($orc ?? '') ?>">
</div>
<div class="form-group">
    <label for="style" class="form-label">STYLE</label>
    <input type="text" class="form-control" id="style" name="style" value="<?= htmlspecialchars($style ?? '') ?>">
</div>
<div class="form-group">
    <label for="size" class="form-label">SIZE</label>
    <select class="form-control" id="size" name="size">
        <option value="">- Pilih SIZE -</option>
        <?php
                            $sizes = ['75B', '80B', '75C', '80C', '80D', '85D', '90D'];
                            foreach ($sizes as $s) {
                                $selected = (isset($size) && $size == $s) ? 'selected' : '';
                                echo "<option value=\"$s\" $selected>$s</option>";
                            }
                            ?>
    </select>
</div>

<button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
</form>
</div>
</div>

<!-- Alert -->
<?php if (!empty($error)): ?>
<div class="alert alert-danger mt-2"><?= $error ?></div>
<?php elseif (!empty($sukses)): ?>
<div class="alert alert-success mt-2"><?= $sukses ?></div>
<?php endif; ?>