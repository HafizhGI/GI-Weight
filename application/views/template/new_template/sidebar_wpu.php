<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="<?= base_url('Dashboard/index_dashboard'); ?>"
        style="gap: 10px;">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo1.png'); ?>" alt="Logo GI-WEIGHT" style="width: 60px; height: 60px;">
        </div>
        <div class="sidebar-brand-text" style="font-size: 20px; font-weight: bold;">GI-WEIGHT</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading">Menu</div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dashboard/index_dashboard'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Master Sample -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Master_sample/index'); ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Master Sample</span>
        </a>
    </li>

    <!-- Nav Item - Data Produk -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Transaksi_produk/index_transpro'); ?>">
            <i class="fas fa-fw fa-cube"></i>
            <span>Transpro</span>
        </a>
    </li>

    <!-- Nav Item - Report Hasil -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Report/index_report'); ?>">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Report Hasil</span>
        </a>
    </li>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Divider -->
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= isset($user['name']) ? $user['name'] : 'Guest'; ?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/'); ?>img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Document
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- End of Topbar -->