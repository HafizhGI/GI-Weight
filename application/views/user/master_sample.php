<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Master Sample</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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

        <div class="mt-4">
            <div class="card col-md-6 col-sm-12">
                <div class="card-header bg-warning text-black">
                    <strong>Create Data</strong>
                </div>
                <div class="card-body text-start mb-4">
                    <form action="<?= base_url('Master_sample/insert') ?>" method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="orc" placeholder="ORC" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="style" placeholder="STYLE" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="color" placeholder="COLOR" required>
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
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan Data</button>
                    </form>
                </div>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger mt-2"><?= $error ?></div>
            <?php elseif (!empty($sukses)): ?>
                <div class="alert alert-success mt-2"><?= $sukses ?></div>
            <?php endif; ?>

            <div class="card mt-4 w-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Master Sample</h5>
                    <input type="text" id="searchInput" class="form-control form-control-sm w-auto" placeholder="Cari data di tabel...">
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="MasterSampleTable" class="table table-bordered table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">ORC</th>
                                    <th class="text-center">STYLE</th>
                                    <th class="text-center">SIZE</th>
                                    <th class="text-center">COLOR</th>
                                    <th class="text-center">BOX CAPACITY</th>
                                    <th class="text-center">TOTAL BOX</th>
                                    <th class="text-center">BERAT STANDAR</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data)): ?>
                                    <?php foreach ($data as $i => $row): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $row->orc ?></td>
                                            <td><?= $row->style ?></td>
                                            <td><?= $row->size ?></td>
                                            <td><?= $row->color ?? '-' ?></td>
                                            <td><?= $row->box_capacity ?? '-' ?></td>
                                            <td><?= $row->total_box ?? '-' ?></td>
                                            <td><?= $row->berat_standar ?? '-' ?></td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-warning btn-sm btn-edit me-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal"
                                                    data-id="<?= $row->id_sample ?>"

                                                    data-berat_karton="<?= htmlspecialchars($row->berat_karton ?? '', ENT_QUOTES) ?>"
                                                    data-berat_pcs="<?= htmlspecialchars($row->berat_pcs ?? '', ENT_QUOTES) ?>"
                                                    data-box_capacity="<?= htmlspecialchars($row->box_capacity ?? '', ENT_QUOTES) ?>">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <a href="<?= site_url('Master_sample/delete') ?>?id_sample=<?= $row->id_sample ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin hapus?')">
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
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
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
                                    <input type="number" step="0.01" class="form-control" name="berat_karton" id="edit_berat_karton">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_berat_pcs" class="form-label">BERAT PCS</label>
                                    <input type="number" step="0.01" class="form-control" name="berat_pcs" id="edit_berat_pcs">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_box_capacity" class="form-label">BOX CAPACITY</label>
                                    <input type="number" class="form-control" name="box_capacity" id="edit_box_capacity">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_berat_standar" class="form-label">BERAT STANDAR</label>
                                    <input type="text" class="form-control" name="berat_standar" id="edit_berat_standar" readonly>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            function calculateBeratStandar() {
                const beratKarton = parseFloat($('#edit_berat_karton').val()) || 0;
                const beratPcs = parseFloat($('#edit_berat_pcs').val()) || 0;
                const boxCapacity = parseFloat($('#edit_box_capacity').val()) || 0;

                const beratStandar = (beratPcs * boxCapacity) + beratKarton;
                $('#edit_berat_standar').val(beratStandar.toFixed(2));
            }

            $(document).on('click', '.btn-edit', function() {
                $('#edit_id_sample').val($(this).data('id_sample'));
                $('#edit_berat_karton').val($(this).data('berat_karton'));
                const orc = $(this).closest('tr').find('td:eq(1)').text().trim();
                const style = $(this).closest('tr').find('td:eq(2)').text().trim();
                const size = $(this).closest('tr').find('td:eq(3)').text().trim();

                $.ajax({
                    url: '<?= base_url('Master_sample/get_box_capacity') ?>',
                    type: 'GET',
                    data: {
                        orc: orc,
                        style: style,
                        size: size
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#edit_box_capacity').val(res.box_capacity);
                        calculateBeratStandar(); // hitung ulang berat standar
                    }
                });

                $('#edit_berat_pcs').val($(this).data('berat_pcs'));
                $('#edit_box_capacity').val($(this).data('box_capacity'));
                calculateBeratStandar();
            });

            $('#edit_berat_karton, #edit_berat_pcs, #edit_box_capacity').on('input', calculateBeratStandar);

            $(document).ready(function() {
                const table = $('#MasterSampleTable').DataTable();

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw();
                });
            });

        });
    </script>
</body>

</html>