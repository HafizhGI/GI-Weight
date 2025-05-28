<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <h4 class="my-3">Transaksi Produk</h4>
        <div class="card p-3">
            <!-- Input Scan Barcode -->
            <div class="form-group">
                <label for="styleInput" class="font-weight-bold">Scan Barcode</label>
                <input type="text" class="form-control" id="styleInput" placeholder="Scan barcode" autofocus>
            </div>

            <!-- Tabel Produk -->
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
            </div>
        </div>
    </div>

    <!-- Modal Detail Produk -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="detailModalLabel">Detail Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="modalContent"></div>
                </div>
            </div>
        </div>
    </div>

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
                    }
                });
            });
        });
    </script>
</body>

</html>