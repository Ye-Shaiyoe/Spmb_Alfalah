<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: log/mail/login.php");
    exit();
}

// Koneksi database
require_once 'koneksi.php';

// Query untuk mendapatkan data yang sudah lunas dengan informasi lengkap
$query_lunas = "SELECT 
    p.id_pendaftaran,
    p.nama, 
    p.nisn, 
    p.jenis_kelamin, 
    p.tempat_lahir,
    p.tanggal_lahir,
    TIMESTAMPDIFF(YEAR, p.tanggal_lahir, CURDATE()) as umur,
    p.alamat,
    p.telepon,
    p.asal_sekolah,
    p.tgl_daftar,
    pb.Tanggal_pembayaran,
    pb.jumlah_pembayaran,
    pb.status_pembayaran,
    pb.total_cicilan,
    j.jurusan1,
    j.jurusan2
FROM pendaftaran p
INNER JOIN pembayaran pb ON p.id_pendaftaran = pb.id_pendaftaran
LEFT JOIN jurusan j ON p.id_pendaftaran = j.id_pendaftaran
WHERE pb.status_pembayaran = 'Lunas'
ORDER BY pb.Tanggal_pembayaran DESC";

$result_lunas = mysqli_query($conn, $query_lunas);

// Hitung total yang sudah lunas
$query_count = "SELECT COUNT(*) as total FROM pembayaran WHERE status_pembayaran = 'Lunas'";
$result_count = mysqli_query($conn, $query_count);
$total_lunas = mysqli_fetch_assoc($result_count)['total'];

// Hitung total pemasukan dari yang lunas
$query_total_pemasukan = "SELECT SUM(jumlah_pembayaran) as total FROM pembayaran WHERE status_pembayaran = 'Lunas'";
$result_pemasukan = mysqli_query($conn, $query_total_pemasukan);
$total_pemasukan = mysqli_fetch_assoc($result_pemasukan)['total'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Lunas - SPMB Alfalah</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="x-icon" href="img/Alfalah.png">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/lunas.css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">SPMB Alfalah</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#" onclick="confirmLogout(event)">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="log/mail/login.php">Login</a>
                                        <a class="nav-link" href="log/mail/register.php">Register</a>
                                        <a class="nav-link" href="log/mail/password.php">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="log/layout/card/Git/error/401.php">401 Page</a>
                                        <a class="nav-link" href="log/layout/card/Git/error/404.php">404 Page</a>
                                        <a class="nav-link" href="log/layout/card/Git/error/500.php">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                        <a class="nav-link" href="python/AI/Backup/kontribusi.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-brush"></i></div>
                            Who Have Contributed
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                </div>
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><i class="fas fa-check-circle text-success"></i> Data Pembayaran Lunas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Lunas</li>
                    </ol>

                    <!-- Summary Cards -->
                    <div class="row mb-4">
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-success text-white mb-4 summary-card">
                                <div class="card-body">
                                    <i class="fas fa-users me-2"></i>Total Siswa Lunas
                                    <h2 class="mb-0 mt-2"><?php echo $total_lunas; ?> Siswa</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card bg-primary text-white mb-4 summary-card">
                                <div class="card-body">
                                    <i class="fas fa-money-bill-wave me-2"></i>Total Pemasukan
                                    <h2 class="mb-0 mt-2">Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Daftar Siswa yang Sudah Lunas
                            <button class="btn btn-print btn-sm float-end" onclick="window.print()">
                                <i class="fas fa-print"></i> Cetak Laporan
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatablesLunas" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NISN</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan Pilihan</th>
                                            <th>Tgl Daftar</th>
                                            <th>Tgl Lunas</th>
                                            <th>Total Bayar</th>
                                            <th>Cicilan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result_lunas)): 
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                                <td><?php echo htmlspecialchars($row['nisn']); ?></td>
                                                <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                                                <td><?php echo htmlspecialchars($row['asal_sekolah']); ?></td>
                                                <td>
                                                    <?php 
                                                    echo htmlspecialchars($row['jurusan1']);
                                                    if ($row['jurusan2']) {
                                                        echo ' / ' . htmlspecialchars($row['jurusan2']);
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($row['tgl_daftar'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($row['Tanggal_pembayaran'])); ?></td>
                                                <td>Rp <?php echo number_format($row['jumlah_pembayaran'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['total_cicilan'] > 1) {
                                                        echo $row['total_cicilan'] . ' kali';
                                                    } else {
                                                        echo 'Langsung';
                                                    }
                                                    ?>
                                                </td>
                                                <td><span class="status-badge"><?php echo htmlspecialchars($row['status_pembayaran']); ?></span></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>NISN</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Sekolah</th>
                                            <th>Jurusan Pilihan</th>
                                            <th>Tgl Daftar</th>
                                            <th>Tgl Lunas</th>
                                            <th>Total Bayar</th>
                                            <th>Cicilan</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; by Muhammad Yusuf 2025/2026</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        <i class="fas fa-sign-out-alt me-2"></i>Konfirmasi Logout
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Apakah Anda yakin ingin keluar dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Batal
                    </button>
                    <a href="logout.php" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt me-1"></i>Ya, Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/lunas.js"></script>
</body>

</html>