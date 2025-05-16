<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DASHBOARD</h1>

    <div class="row">
        <!-- Kiri: Bar Chart -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height: 400px;">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                    Styling <code>/js</code> file.
                </div>
            </div>
        </div>

        <!-- Kanan: Cards dalam bentuk vertikal -->
        <div class="col-md-4">
            <div class="mb-4">
                <div class="card bg-primary text-white shadow" style="height: 120px; font-size: 1.2rem;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        Primary
                        <div class="text-white-50 small" style="font-size: 0.9rem;">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="card bg-success text-white shadow" style="height: 120px; font-size: 1.2rem;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        Success
                        <div class="text-white-50 small" style="font-size: 0.9rem;">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="card bg-info text-white shadow" style="height: 120px; font-size: 1.2rem;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        Info
                        <div class="text-white-50 small" style="font-size: 0.9rem;">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="card bg-warning text-white shadow" style="height: 120px; font-size: 1.2rem;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        Warning
                        <div class="text-white-50 small" style="font-size: 0.9rem;">#f6c23e</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            const ctx1 = document.getElementById('myBarChart').getContext('2d');
            const myBarChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Produk A', 'Produk B', 'Produk C', 'Produk D', 'Produk E', 'Produk F'],
                    datasets: [{
                        label: 'Berat (kg)',
                        data: [12, 19, 3, 5, 2],
                        backgroundColor: '#4e73df',
                        borderColor: '#4e73df',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>