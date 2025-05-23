<!DOCTYPE html>
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
</head>

<body>
    <div class="container-fluid">
        <h4>Transaksi Produk</h4>
        <div class="card">
            <div class="row mb-3">
            </div>

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

            <div class="bottom-left-buttons d-flex">
                <button class="btn btn-warning btn-sm mr-2">⟲</button>
                <button class="btn btn-success btn-sm">Simpan</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="detailModalLabel">Detail Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
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
                </div>
            </div>
        </div>
    </div>

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
                    }
                });
            });
        });
    </script>
</body>

</html>