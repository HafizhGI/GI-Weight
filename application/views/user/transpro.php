<!DOCTYPE html>
<<<<<<< Updated upstream
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
=======
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Sales - Point of Sale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding: 20px;
            background: #f7f7f7;
        }

        .form-control {
            height: 38px;
        }

        .btn {
            height: 38px;
        }

        .card {
            padding: 15px;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
        }

        .bottom-left-buttons {
            margin-top: 15px;
        }

        .modal-body .row {
            margin-bottom: 10px;
        }
    </style>
>>>>>>> Stashed changes
</head>

<body>
    <div class="container-fluid">
<<<<<<< Updated upstream
        <h4 class="my-3">Transaksi Produk</h4>
        <div class="card p-3">
            <!-- Input Scan Barcode -->
            <div class="form-group">
                <label for="styleInput" class="font-weight-bold">Scan Barcode</label>
                <input type="text" class="form-control" id="styleInput" placeholder="Scan barcode" autofocus>
            </div>

            <!-- Tabel Produk -->
=======
        <h4>Transaksi Produk</h4>
        <div class="card">
            <div class="row mb-3">
            </div>

>>>>>>> Stashed changes
            <div class="table-responsive">
                <table id="produkTable" class="table table-bordered table-striped w-100">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Barcode</th>
                            <th>ORC</th>
                            <th>Style</th>
                            <th>Size</th>
                            <th>Colour</th>
                            <th>Berat</th>
                            <th>Dimensi (pxlxt)</th>
                            <th>Qty</th>
                            <th>Date</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>

<<<<<<< Updated upstream
            <!-- Informasi & Paginasi -->
            <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top bg-light">
                <div>Item <span id="currentItem">0</span> of <span id="totalProduk">0</span> entries</div>
                <nav>
                    <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-3 d-flex justify-content-end">
                <button class="btn btn-primary" id="btnSimpan">Simpan</button>
=======
            <div class="bottom-left-buttons d-flex">
                <button class="btn btn-warning btn-sm mr-2">⟲</button>
                <button class="btn btn-success btn-sm">Simpan</button>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
    <!-- Modal Detail Produk -->
=======
    <!-- Modal -->
>>>>>>> Stashed changes
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="detailModalLabel">Detail Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
<<<<<<< Updated upstream
                    <div class="container-fluid" id="modalContent"></div>
=======
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Barcode:</div>
                            <div class="col-sm-8" id="modalBarcode"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">ORC:</div>
                            <div class="col-sm-8" id="modalORC"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Style:</div>
                            <div class="col-sm-8" id="modalStyle"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Size:</div>
                            <div class="col-sm-8" id="modalSize"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Colour:</div>
                            <div class="col-sm-8" id="modalColour"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Berat:</div>
                            <div class="col-sm-8" id="modalBerat"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Dimensi:</div>
                            <div class="col-sm-8" id="modalDimensi"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Qty:</div>
                            <div class="col-sm-8" id="modalQty"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 font-weight-bold">Date:</div>
                            <div class="col-sm-8" id="modalDate"></div>
                        </div>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
    <!-- Script -->
    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Database produk simulasi
            const productDatabase = {
                "cu_WAC-25D006B-0001": {
                    ORC: 'ORC001',
                    Style: 'Casual',
                    Size: 'L',
                    Colour: 'Red',
                    Qty: 1
                },
                "cu_WAC-25D006B-0002": {
                    ORC: 'ORC002',
                    Style: 'Sport',
                    Size: 'M',
                    Colour: 'Blue',
                    Qty: 2
                }
                // Tambahkan produk lainnya sesuai kebutuhan
            };

            const $styleInput = $('#styleInput');
            const $produkTable = $('#produkTable tbody');

            // Fungsi untuk memperbarui tabel
            function updateTable() {
                $produkTable.empty();
                let count = 1;
                const today = new Date().toLocaleDateString('id-ID');

                for (const [barcode, produk] of Object.entries(productDatabase)) {
                    $produkTable.append(`
                        <tr>
                            <td>${count++}</td>
=======
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let counter = 1;
            const productDatabase = {
                "1234567890123": {
                    ORC: "ORC-001",
                    Style: "Basic Tee",
                    Size: "M",
                    Colour: "Black",
                    Qty: 1
                },
                "9876543210987": {
                    ORC: "ORC-002",
                    Style: "Polo",
                    Size: "L",
                    Colour: "Blue",
                    Qty: 2
                },
                "4567891234567": {
                    ORC: "ORC-003",
                    Style: "Hoodie",
                    Size: "XL",
                    Colour: "Gray",
                    Qty: 3
                },
                "3216549873210": {
                    ORC: "ORC-004",
                    Style: "Denim Jacket",
                    Size: "L",
                    Colour: "Dark Blue",
                    Qty: 1
                },
                "7418529637418": {
                    ORC: "ORC-005",
                    Style: "Sweater",
                    Size: "S",
                    Colour: "Green",
                    Qty: 2
                },
                "1593572584563": {
                    ORC: "ORC-006",
                    Style: "Cargo Pants",
                    Size: "M",
                    Colour: "Khaki",
                    Qty: 2
                }
            };

            // Tampilkan semua data produk langsung di tabel saat load halaman
            Object.entries(productDatabase).forEach(([barcode, produk]) => {
                const today = new Date().toISOString().split('T')[0];
                $('#produkTable tbody').append(`
                <tr>
                    <td>${counter++}</td>
                    <td>${barcode}</td>
                    <td>${produk.ORC}</td>
                    <td>${produk.Style}</td>
                    <td>${produk.Size}</td>
                    <td>${produk.Colour}</td>
                    <td>Menunggu...</td>
                    <td>Menunggu...</td>
                    <td>${produk.Qty}</td>
                    <td>${today}</td>
                    <td><button class="btn btn-sm btn-info btn-lihat">Lihat</button></td>
                </tr>
            `);
            });

            // Jika ingin input barcode manual, tetap jalan juga
            $('#barcodeInput').on('input', function() {
                const barcode = $(this).val().trim();
                const produk = productDatabase[barcode];

                if (produk && !$(`#produkTable tbody tr td:contains(${barcode})`).length) {
                    const today = new Date().toISOString().split('T')[0];
                    $('#produkTable tbody').append(`
                        <tr>
                            <td>${counter++}</td>
>>>>>>> Stashed changes
                            <td>${barcode}</td>
                            <td>${produk.ORC}</td>
                            <td>${produk.Style}</td>
                            <td>${produk.Size}</td>
                            <td>${produk.Colour}</td>
<<<<<<< Updated upstream
                            <td>1.25 kg</td>
                            <td>20x15x10 cm</td>
=======
                            <td>Menunggu...</td>
                            <td>Menunggu...</td>
>>>>>>> Stashed changes
                            <td>${produk.Qty}</td>
                            <td>${today}</td>
                            <td><button class="btn btn-sm btn-info btn-lihat">Lihat</button></td>
                        </tr>
                    `);
<<<<<<< Updated upstream
                }

                $('#totalProduk').text($produkTable.find('tr').length);
                $('#currentItem').text($produkTable.find('tr').length);
            }

            updateTable();

            // Fokus otomatis pada input barcode
            $styleInput.on('blur', function() {
                setTimeout(() => $styleInput.focus(), 0);
            });
            $(document).on('keydown', () => {
                if (!$styleInput.is(':focus')) $styleInput.focus();
            });

            // Handle input barcode
            let scanTimeout;
            $styleInput.on('input', function() {
                clearTimeout(scanTimeout);
                scanTimeout = setTimeout(function() {
                    const barcode = $styleInput.val().trim();
                    if (!barcode) return;

                    if (productDatabase[barcode]) {
                        const exists = $produkTable.find(`tr td:nth-child(2):contains(${barcode})`)
                            .length > 0;
                        if (exists) {
                            alert('Produk dengan barcode ini sudah ditambahkan.');
                        } else {
                            const produk = productDatabase[barcode];
                            const today = new Date().toLocaleDateString('id-ID');
                            $produkTable.append(`
                                <tr>
                                    <td>${$produkTable.find('tr').length + 1}</td>
                                    <td>${barcode}</td>
                                    <td>${produk.ORC}</td>
                                    <td>${produk.Style}</td>
                                    <td>${produk.Size}</td>
                                    <td>${produk.Colour}</td>
                                    <td>1.25 kg</td>
                                    <td>20x15x10 cm</td>
                                    <td>${produk.Qty}</td>
                                    <td>${today}</td>
                                    <td><button class="btn btn-sm btn-info btn-lihat">Lihat</button></td>
                                </tr>
                            `);
                            $('#totalProduk, #currentItem').text($produkTable.find('tr').length);
                        }
                    } else {
                        alert('Barcode tidak ditemukan dalam database.');
                    }

                    $styleInput.val('').focus();
                }, 300);
            });

            // Tampilkan detail produk dalam modal
            $(document).on('click', '.btn-lihat', function() {
                const $row = $(this).closest('tr');
                const data = {
                    Barcode: $row.find('td:eq(1)').text(),
                    ORC: $row.find('td:eq(2)').text(),
                    Style: $row.find('td:eq(3)').text(),
                    Size: $row.find('td:eq(4)').text(),
                    Colour: $row.find('td:eq(5)').text(),
                    Berat: $row.find('td:eq(6)').text(),
                    Dimensi: $row.find('td:eq(7)').text(),
                    Qty: $row.find('td:eq(8)').text(),
                    Date: $row.find('td:eq(9)').text()
                };

                const html = Object.entries(data).map(([key, val]) =>
                    `<div class="row mb-2"><div class="col-sm-4 font-weight-bold">${key}:</div><div class="col-sm-8">${val}</div></div>`
                ).join('');

                $('#modalContent').html(html);
                $('#detailModal').modal('show');
            });

            // Tombol Simpan
            $('#btnSimpan').on('click', function() {
                const dataProduk = [];
                $produkTable.find('tr').each(function() {
                    const $tds = $(this).find('td');
                    dataProduk.push({
                        barcode: $tds.eq(1).text(),
                        orc: $tds.eq(2).text(),
                        style: $tds.eq(3).text(),
                        size: $tds.eq(4).text(),
                        colour: $tds.eq(5).text(),
                        berat: $tds.eq(6).text(),
                        dimensi: $tds.eq(7).text(),
                        qty: $tds.eq(8).text(),
                        date: $tds.eq(9).text()
                    });
                });

                // Kirim data ke server via AJAX
                $.ajax({
                    url: '<?php echo base_url("Transaksi_produk/simpan_produk"); ?>',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(dataProduk),
                    success: function(response) {
                        alert('Data berhasil disimpan ke database!');
                        console.log(response);
                    },
                    error: function(err) {
                        alert('Gagal menyimpan data.');
                        console.error(err);
=======
                    $(this).val('');
                }
            });

            // Tombol lihat detail produk
            $(document).on('click', '.btn-lihat', function() {
                const row = $(this).closest('tr');
                $('#modalBarcode').text(row.find('td:eq(1)').text());
                $('#modalORC').text(row.find('td:eq(2)').text());
                $('#modalStyle').text(row.find('td:eq(3)').text());
                $('#modalSize').text(row.find('td:eq(4)').text());
                $('#modalColour').text(row.find('td:eq(5)').text());
                $('#modalBerat').text(row.find('td:eq(6)').text());
                $('#modalDimensi').text(row.find('td:eq(7)').text());
                $('#modalQty').text(row.find('td:eq(8)').text());
                $('#modalDate').text(row.find('td:eq(9)').text());
                $('#detailModal').modal('show');
            });

            // Tombol timbang produk
            $('#btnTimbang').on('click', function() {
                const barcode = prompt('Masukkan barcode yang ditimbang:');
                if (!barcode) return;

                const beratBaru = '1.38 kg';
                const dimensiBaru = '21x16x11 cm';

                $('#produkTable tbody tr').each(function() {
                    const row = $(this);
                    if (row.find('td:eq(1)').text() === barcode) {
                        row.find('td:eq(6)').text(beratBaru);
                        row.find('td:eq(7)').text(dimensiBaru);
>>>>>>> Stashed changes
                    }
                });
            });
        });
    </script>
</body>

</html>