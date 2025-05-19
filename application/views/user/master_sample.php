<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Master Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="@import: bootstrap/scss/variables">

</head>

<body>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Master Sample</h1>

        <!-- Form Master Sample -->
        <div class="mb-4" style="max-width: 600px;">
            <div class="card">
                <div class="card-header bg-dark text-white text-start">
                    <strong>Create / Edit Data</strong>
                </div>
            </div>
            <div class="card-body text-start">
                <form action="<?= base_url('Master_sample/insert') ?>" method="POST">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="orc" placeholder="ORC" aria-label="ORC">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="style" placeholder="STYLE" aria-label="STYLE">
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="size">
                            <option value="">- PILIH SIZE -</option>
                            <option value="75B">75B</option>
                            <option value="80B">80B</option>
                            <option value="75C">75C</option>
                            <option value="80C">80C</option>
                            <option value="80D">80D</option>
                            <option value="85D">85D</option>
                            <option value="90D">90D</option>
                        </select>
                        <button type="submit" name="simpan" class="btn btn-primary mt-3">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger mt-2"><?= $error ?></div>
    <?php elseif (!empty($sukses)): ?>
        <div class="alert alert-success mt-2"><?= $sukses ?></div>
    <?php endif; ?>

    <!-- Table -->
    <div class="card">
        <div class="card-header bg-teal-800 text-black">
            <strong>Master Sample</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ORC</th>
                            <th>STYLE</th>
                            <th>SIZE</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $i => $row): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= $row['orc'] ?></td>
                                    <td><?= $row['style'] ?></td>
                                    <td><?= $row['size'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Master_sample/edit?id_sample=' . $row['id_sample']) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Master_sample/delete?id_sample=' . $row['id_sample']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                </p>
            </div>
        </div>

    </div>
</body>

</html>