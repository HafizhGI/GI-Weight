<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Report Hasil</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }

        .badge {
            font-size: 0.9rem;
        }

        .action-btns button {
            margin-right: 5px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">REPORT HASIL</h4>
        </div>

        <!-- Filter Form -->
        <div class="card bg-primary mb-4">
            <div class="card-body">
                <form class="row g-3 align-items-end" id="filterForm" method="get" action="">
                    <div class="col-md-3">
                        <label for="style" class="form-label">Style</label>
                        <select class="form-select" id="style" name="style">
                            <option value="">-- Pilih Style --</option>
                            <?php foreach ($style_list as $style): ?>
                                <option value="<?= htmlspecialchars($style->style); ?>"
                                    <?= ($this->input->get('style') == $style->style) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($style->style); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tglMulai" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="tglMulai" name="tglMulai"
                            value="<?= htmlspecialchars($this->input->get('tglMulai')); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="tglAkhir" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="tglAkhir" name="tglAkhir"
                            value="<?= htmlspecialchars($this->input->get('tglAkhir')); ?>">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-dark w-100">Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="card my-4 py-3">
            <div class="table-responsive">
                <table id="produkTable" class="table table-bordered table-striped mx-auto" style="width: 95%;">
                    <thead class="bg-primary text-white text-center"></thead>
                    <tr>
                        <th>No</th>
                        <th>ORC</th>
                        <th>Style</th>
                        <th>Colour</th>
                        <th>Berat</th>
                        <th>Dimensi</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1</td>
                            <td>ORC001</td>
                            <td>Style A</td>
                            <td>Red</td>
                            <td>1.5 kg</td>
                            <td>30x20x10 cm</td>
                            <td>100</td>
                            <td>2025-05-28</td>
                            <td class="action-btns">
                                <button class="btn btn-sm btn-primary lihat-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-barcode="1234567890" data-orc="ORC001"
                                    data-style="Style A" data-colour="Red" data-berat="1.5 kg"
                                    data-dimensi="30x20x10 cm" data-qty="100" data-date="2025-05-28">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>ORC002</td>
                            <td>Style B</td>
                            <td>Blue</td>
                            <td>2.0 kg</td>
                            <td>25x15x12 cm</td>
                            <td>150</td>
                            <td>2025-05-27</td>
                            <td class="action-btns">
                                <button class="btn btn-sm btn-primary lihat-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-barcode="0987654321" data-orc="ORC002"
                                    data-style="Style B" data-colour="Blue" data-berat="2.0 kg"
                                    data-dimensi="25x15x12 cm" data-qty="150" data-date="2025-05-27">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>ORC003</td>
                            <td>Style C</td>
                            <td>Green</td>
                            <td>1.8 kg</td>
                            <td>28x18x14 cm</td>
                            <td>200</td>
                            <td>2025-05-26</td>
                            <td class="action-btns">
                                <button class="btn btn-sm btn-primary lihat-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-barcode="1122334455" data-orc="ORC003"
                                    data-style="Style C" data-colour="Green" data-berat="1.8 kg"
                                    data-dimensi="28x18x14 cm" data-qty="200" data-date="2025-05-26">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal Detail -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body" id="modal-content-to-print">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>CTN/NO:</strong> <span id="modal-barcode"></span>
                                </li>
                                <li class="list-group-item"><strong>Line:</strong> <span id="modal-orc"></span></li>
                                <li class="list-group-item"><strong>Size:</strong> <span id="modal-style"></span></li>
                                <li class="list-group-item"><strong>P/CTN:</strong> <span id="modal-colour"></span></li>
                                <li class="list-group-item"><strong>CTN:</strong> <span id="modal-berat"></span></li>
                                <li class="list-group-item"><strong>PCS:</strong> <span id="modal-dimensi"></span></li>
                                <li class="list-group-item"><strong>TTL DZ:</strong> <span id="modal-qty"></span></li>
                                <li class="list-group-item"><strong>N.W.:</strong> <span id="modal-ship-date"></span>
                                </li>
                                <li class="list-group-item"><strong>G.W.:</strong> <span id="modal-dimensi"></span></li>
                                <li class="list-group-item"><strong>REMAKS:</strong> <span id="modal-qty"></span></li>
                                <li class="list-group-item"><strong>Ship:</strong> <span id="modal-ship-date"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <div class="me-auto">
                                <button type="button" class="btn btn-success btn-sm" id="exportExcelBtn">Export
                                    Excel</button>
                                <button type="button" class="btn btn-danger btn-sm" id="exportPdfBtn">Export
                                    PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

            <script>
                $(document).ready(function() {
                    var table = $('#laporanTable').DataTable({
                        dom: '<"row mb-3"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
                            'rt' +
                            '<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                        paging: true,
                        info: true,
                        pageLength: 2, // Ubah sesuai jumlah data per halaman yang diinginkan
                        buttons: [{
                                extend: 'excelHtml5',
                                className: 'btn btn-success btn-sm',
                                text: 'Export Excel',
                                title: 'Report Hasil'
                            },
                            {
                                extend: 'pdfHtml5',
                                className: 'btn btn-danger btn-sm',
                                text: 'Export PDF',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                title: 'Report Hasil'
                            }
                        ]
                    });

                    $('#exportExcelBtn').on('click', function() {
                        table.button('.buttons-excel').trigger();
                    });

                    $('#exportPdfBtn').on('click', function() {
                        table.button('.buttons-pdf').trigger();
                    });

                    $('#printDetailBtn').on('click', function() {
                        var printContents = document.getElementById('modal-content-to-print').innerHTML;
                        var printWindow = window.open('', '', 'height=600,width=800');
                        printWindow.document.write('<html><head><title>Print Detail</title>');
                        printWindow.document.write(
                            '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />'
                        );
                        printWindow.document.write('</head><body>');
                        printWindow.document.write(printContents);
                        printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.focus();
                        printWindow.onload = function() {
                            printWindow.print();
                            printWindow.close();
                        };
                    });

                    $('.lihat-btn').on('click', function() {
                        $('#modal-barcode').text($(this).data('barcode'));
                        $('#modal-orc').text($(this).data('orc'));
                        $('#modal-style').text($(this).data('style'));
                        $('#modal-colour').text($(this).data('colour'));
                        $('#modal-berat').text($(this).data('berat'));
                        $('#modal-dimensi').text($(this).data('dimensi'));
                        $('#modal-qty').text($(this).data('qty'));
                        $('#modal-ship-date').text($(this).data('date'));
                    });
                });
            </script>
</body>

</html>
