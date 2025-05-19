<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>REPORT HASIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">REPORT HASIL</h1>

        <!-- Form Pencarian STYLE dan Tanggal -->
        <div class="card col-md-8 p-4">
            <form action="<?= base_url('report/index_report') ?>" method="POST">
                <div class="row mb-4">
                    <!-- Pilihan STYLE -->
                    <div class="col-md-6">
                        <label for="styleSelect" class="form-label">Pilih STYLE</label>
                        <select class="form-control" id="styleSelect" name="style" required>
                            <option value="">- Pilih STYLE -</option>
                            <?php foreach ($style_list as $style): ?>
                                <option value="<?= $style->style ?>" <?= set_select('style', $style->style) ?>>
                                    <?= $style->style ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Pilihan Tanggal -->
                    <div class="col-md-6">
                        <label for="tanggalInput" class="form-label">Pilih Tanggal</label>
                        <input type="date" class="form-control" id="tanggalInput" name="tanggal"
                            value="<?= set_value('tanggal') ?>">
                    </div>
                </div>

                <!-- Tombol Cari -->
                <div class="mb-3">
                    <button type="submit" name="cari" class="btn btn-primary">CARI</button>
                </div>
            </form>

            <!-- Alert -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-2"><?= $error ?></div>
            <?php elseif (!empty($sukses)): ?>
                <div class="alert alert-success mt-2"><?= $sukses ?></div>
            <?php endif; ?>
        </div>

        <!-- Menampilkan hasil jika ada -->
        <?php if (!empty($hasil)): ?>
            <div class="mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Style</th>
                            <th>Tanggal</th>
                            <th>Berat</th>
                            <!-- Kolom tambahan jika perlu -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($hasil as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->style ?></td>
                                <td><?= $row->tanggal_input ?></td>
                                <td><?= $row->berat ?></td>
                                <!-- Kolom tambahan jika perlu -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php elseif ($this->input->post()): ?>
            <div class="mt-3 alert alert-warning">Data tidak ditemukan.</div>
        <?php endif; ?>

    </div>

</body>

</html>