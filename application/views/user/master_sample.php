<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Master Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .table-sm th,
        .table-sm td {
            padding: 0.25rem !important;
            font-size: 0.75rem !important;
        }

        .table-sm th {
            white-space: nowrap;
        }

        .table-wrapper {
            overflow-x: auto;
            max-width: 100%;
        }
    </style>


</head>

<body>

    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Master Sample</h1>

        <!-- Form Master Sample -->
        <div class="mt-4">
            <div class="card col-md-6 col-sm-12">
                <div class="card-header bg-warning text-black">
                    <strong>Create / Edit Data</strong>
                </div>
                <div class="card-body text-start mb-4">
                    <form action="<?= base_url('Master_sample/get_size_by_orc') ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="orc" id="orcInput" placeholder="ORC" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="style" id="styleInput" placeholder="STYLE" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="colour" id="colourInput" placeholder="COLOUR" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="size" id="sizeSelect">
                                <option value="">- PILIH SIZE -</option>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Data</button>
                    </form>
                </div>
            </div>

            <!-- Alert -->
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-2"><?= $error ?></div>
            <?php elseif (!empty($sukses)): ?>
                <div class="alert alert-success mt-2"><?= $sukses ?></div>
            <?php endif; ?>

            <!-- Bagian Tabel -->
            <div class="card mt-4 w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Master Sample</h5>
                    <input type="text" id="searchInput" class="form-control form-control-sm w-auto" placeholder="Cari data di tabel...">
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; width: 100%;">
                        <div class="table-wrapper">
                            <table class="table table-bordered table-striped mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th class="text-center">ORC</th>
                                        <th class="text-center">STYLE</th>
                                        <th class="text-center">SIZE</th>
                                        <th class="text-center">COLOUR</th>
                                        <th class="text-center">BOX CAPACITY</th>
                                        <th class="text-center">TOTAL CAPACITY</th>
                                        <th class="text-center">DIMENSI (P X L X T)</th>
                                        <th class="text-center">BERAT STANDAR</th>
                                        <th class="text-center">AKSI</th>
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
                                                <td><?= $row['colour'] ?? '-' ?></td>
                                                <td><?= $row['box_capacity'] ?? '-' ?></td>
                                                <td><?= $row['total_capacity'] ?? '-' ?></td>
                                                <td><?= ($row['panjang'] ?? '-') . ' x ' . ($row['lebar'] ?? '-') . ' x ' . ($row['tinggi'] ?? '-') ?></td>
                                                <td><?= $row['berat_standar'] ?? '-' ?></td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" class="btn btn-warning btn-sm btn-edit"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal"
                                                        data-id="<?= $row['id_sample'] ?>"
                                                        data-berat_karton="<?= $row['berat_karton'] ?? '' ?>"
                                                        data-berat_pcs="<?= $row['berat_pcs'] ?? '' ?>">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="<?= base_url('Master_sample/delete?id_sample=' . $row['id_sample']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada data</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            </table>
                            <!-- Tambahan Pagination & Info -->
                            <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top bg-light">
                                <div>Item 1 of <?= count($data) ?> entries</div>
                                <nav>
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- Modal Edit -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="editModalLabel">Edit Sample</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editForm" action="<?= base_url('Master_sample/update') ?>" method="post">
                                    <input type="hidden" name="id_sample" id="edit_id_sample">
                                    <div class="mb-3">
                                        <label for="edit_berat_karton" class="form-label">BERAT KARTON</label>
                                        <input type="text" class="form-control" name="berat_karton" id="edit_berat_karton" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_berat_pcs" class="form-label">BERAT PCS</label>
                                        <input type="text" class="form-control" name="berat_pcs" id="edit_berat_pcs" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_box_capacity" class="form-label">BOX CAPACITY</label>
                                        <input type="text" class="form-control" name="size" id="edit_box_capacity" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End of .container-fluid -->

            <!-- Script Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Script Modal Logic -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modalEl = document.getElementById('editModal');
                    const editModalInstance = new bootstrap.Modal(modalEl);
                    const editButtons = document.querySelectorAll('.btn-edit');

                    editButtons.forEach(btn => {
                        btn.addEventListener('click', function() {
                            document.getElementById('edit_id_sample').value = this.dataset.id;
                            document.getElementById('edit_berat_karton').value = this.dataset.berat_karton;
                            document.getElementById('edit_berat_pcs').value = this.dataset.berat_pcs;
                            document.getElementById('edit_box_capacity').value = this.dataset.box_capacity;
                            editModalInstance.show();
                        });
                    });
                });

                <
                !--Script Filter Tabel-- >
                <
                script >
                    // FILTER TABLE LOGIC
                    document.getElementById('searchInput').addEventListener('keyup', function() {
                        const searchTerm = this.value.toLowerCase();
                        const tableRows = document.querySelectorAll('table tbody tr');

                        tableRows.forEach(row => {
                            const rowText = row.innerText.toLowerCase();
                            row.style.display = rowText.includes(searchTerm) ? '' : 'none';
                        });
                    });
            </script>

            <!-- jQuery CDN -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Script Ajax Otomatis Isi SIZE Berdasarkan ORC -->
            <script>
                $(document).ready(function() {
                $('#orcInput, #styleInput, #colourInput').on('input', function() {
                    const orc = $('#orcInput').val().trim();
                    const style = $('#styleInput').val().trim();
                    const colour = $('#colourInput').val().trim();

                    if (orc !== '' && style !== '' && colour !== '') {
                        $.ajax({
                            url: "<?= base_url('Master_sample/get_size_by_orc') ?>",
                            method: "POST",
                            data: {
                                orc: orc,
                                style: style,
                                colour: colour
                            },
                            success: function(response) {
                                try {
                                    const data = typeof response === 'string' ? JSON.parse(response) : response;
                                    const sizeSelect = $('#sizeSelect');
                                    sizeSelect.empty();

                                    if (Array.isArray(data.size)) {
                                        sizeSelect.append('<option value="">- PILIH SIZE -</option>');
                                        data.size.forEach(function(item) {
                                            sizeSelect.append(`<option value="${item.size}">${item.size}</option>`);
                                        });
                                    } else {
                                        sizeSelect.append('<option value="">- SIZE TIDAK DITEMUKAN -</option>');
                                    }
                                } catch (e) {
                                    console.error("Parsing error:", e);
                                }
                            },
                            error: function() {
                                alert("Gagal mengambil data SIZE.");
                            }
                        });
                    }
                });

                if (orc !== '') {
                    $.ajax({
                        url: "<?= base_url('Master_sample/get_size_by_orc') ?>",
                        method: "POST",
                        data: {
                            orc: orc
                        },
                        success: function(response) {
                            try {
                                const data = typeof response === 'string' ? JSON.parse(response) : response;
                                const sizeSelect = $('#sizeSelect');
                                sizeSelect.empty();

                                // Parse string JSON array ke array JavaScript
                                let sizeArray = [];

                                if (typeof data.size === 'string') {
                                    sizeArray = JSON.parse(data.size); // <-- fix di sini
                                }

                                if (sizeArray.length > 0) {
                                    sizeSelect.append('<option value="">- PILIH SIZE -</option>');
                                    sizeArray.forEach(function(s) {
                                        sizeSelect.append(`<option value="${s}">${s}</option>`);
                                    });
                                } else {
                                    sizeSelect.append('<option value="">- SIZE TIDAK DITEMUKAN -</option>');
                                }

                            } catch (e) {
                                alert('Format data tidak valid dari server.');
                                console.error(e);
                            }
                        },
                        error: function() {
                            alert("Gagal mengambil data SIZE.");
                        }
                    });
                }
                });
                });
            </script>