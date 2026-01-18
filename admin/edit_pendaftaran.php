<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: log/mail/login.php");
    exit();
}

$host = "localhost";
$user = "root"; 
$password = ""; 
$database = "spmb_alfalah"; 
$koneksi = new mysqli($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Ambil ID dari URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error_message'] = "ID Pendaftaran tidak valid.";
    header("Location: tables.php");
    exit();
}
$id_pendaftaran = (int)$_GET['id'];

// Query untuk mengambil data lengkap
$sql = "SELECT
            p.*,
            j.jurusan1, j.jurusan2,
            w.nama_wali, w.pekerjaan_wali, w.tempat_lahir_wali, w.tanggal_lahir_wali, w.ktp_wali, w.no_tlp_wali,
            b.Tanggal_pembayaran, b.jumlah_pembayaran, b.status_pembayaran
        FROM pendaftaran p
        LEFT JOIN jurusan j ON p.id_pendaftaran = j.id_pendaftaran
        LEFT JOIN wali w ON p.id_pendaftaran = w.id_pendaftaran
        LEFT JOIN pembayaran b ON p.id_pendaftaran = b.id_pendaftaran
        WHERE p.id_pendaftaran = ?";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id_pendaftaran);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error_message'] = "Data pendaftaran dengan ID $id_pendaftaran tidak ditemukan.";
    header("Location: tables.php");
    exit();
}

$data = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Edit Data Siswa - SPMB Alfalah</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" type="x-icon" href="img/Alfalah.png">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php">SPMB Alfalah</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
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
                        <h1 class="mt-4">Edit Data Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="tables.php">Tables</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
                        </ol>

                        <?php
                        if (isset($_SESSION['error_message'])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $_SESSION['error_message'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                            unset($_SESSION['error_message']);
                        }
                        ?>

                        <form action="update_pendaftaran.php" method="POST">
                            <input type="hidden" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran']; ?>">

                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-user me-1"></i>Data Siswa</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                                            <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="<?php echo htmlspecialchars($data['tgl_daftar']); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($data['tempat_lahir']); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo htmlspecialchars($data['tanggal_lahir']); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
                                                <option value="Laki-laki" <?php echo ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="2"><?php echo htmlspecialchars($data['alamat']); ?></textarea>
                                        </div>
                                        <div class="col-md-2"><label for="rt" class="form-label">RT</label><input type="text" class="form-control" id="rt" name="rt" value="<?php echo htmlspecialchars($data['rt']); ?>"></div>
                                        <div class="col-md-2"><label for="rw" class="form-label">RW</label><input type="text" class="form-control" id="rw" name="rw" value="<?php echo htmlspecialchars($data['rw']); ?>"></div>
                                        <div class="col-md-4"><label for="kelurahan" class="form-label">Kelurahan</label><input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo htmlspecialchars($data['kelurahan']); ?>"></div>
                                        <div class="col-md-4"><label for="kecamatan" class="form-label">Kecamatan</label><input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo htmlspecialchars($data['kecamatan']); ?>"></div>
                                        <div class="col-md-3"><label for="kode_pos" class="form-label">Kode Pos</label><input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo htmlspecialchars($data['kode_pos']); ?>"></div>
                                        <div class="col-md-3"><label for="telepon" class="form-label">Telepon Siswa</label><input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>"></div>
                                        <div class="col-md-3"><label for="anak_ke" class="form-label">Anak Ke-</label><input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?php echo htmlspecialchars($data['anak_ke']); ?>"></div>
                                        <div class="col-md-3"><label for="nisn" class="form-label">NISN</label><input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo htmlspecialchars($data['nisn']); ?>"></div>
                                        <div class="col-md-6"><label for="asal_sekolah" class="form-label">Asal Sekolah</label><input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?php echo htmlspecialchars($data['asal_sekolah']); ?>"></div>
                                        <div class="col-md-6"><label for="hobby" class="form-label">Hobby</label><input type="text" class="form-control" id="hobby" name="hobby" value="<?php echo htmlspecialchars($data['hobby']); ?>"></div>
                                        <div class="col-md-6"><label for="citacita" class="form-label">Cita-cita</label><input type="text" class="form-control" id="citacita" name="citacita" value="<?php echo htmlspecialchars($data['citacita']); ?>"></div>
                                        <div class="col-md-6">
                                            <label for="ukuran_baju" class="form-label">Ukuran Baju</label>
                                            <select id="ukuran_baju" name="ukuran_baju" class="form-select">
                                                <option value="S" <?php echo ($data['ukuran_baju'] == 'S') ? 'selected' : ''; ?>>S</option>
                                                <option value="M" <?php echo ($data['ukuran_baju'] == 'M') ? 'selected' : ''; ?>>M</option>
                                                <option value="L" <?php echo ($data['ukuran_baju'] == 'L') ? 'selected' : ''; ?>>L</option>
                                                <option value="XL" <?php echo ($data['ukuran_baju'] == 'XL') ? 'selected' : ''; ?>>XL</option>
                                                <option value="XXL" <?php echo ($data['ukuran_baju'] == 'XXL') ? 'selected' : ''; ?>>XXL</option>
                                                <option value="XXXL" <?php echo ($data['ukuran_baju'] == 'XXXL') ? 'selected' : ''; ?>>XXXL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-users me-1"></i>Data Orang Tua</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12"><label for="no_kk" class="form-label">No. KK</label><input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo htmlspecialchars($data['no_kk']); ?>"></div>
                                        
                                        <div class="col-md-4"><label for="nama_ayah" class="form-label">Nama Ayah</label><input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo htmlspecialchars($data['nama_ayah']); ?>"></div>
                                        <div class="col-md-4"><label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label><input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo htmlspecialchars($data['pekerjaan_ayah']); ?>"></div>
                                        <div class="col-md-4"><label for="telepon_ayah" class="form-label">Telepon Ayah</label><input type="text" class="form-control" id="telepon_ayah" name="telepon_ayah" value="<?php echo htmlspecialchars($data['telepon_ayah']); ?>"></div>
                                        <div class="col-md-4"><label for="tempat_lahir_ayah" class="form-label">Tempat Lahir Ayah</label><input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" value="<?php echo htmlspecialchars($data['tempat_lahir_ayah']); ?>"></div>
                                        <div class="col-md-4"><label for="tanggal_lahir_ayah" class="form-label">Tgl. Lahir Ayah</label><input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="<?php echo htmlspecialchars($data['tanggal_lahir_ayah']); ?>"></div>
                                        <div class="col-md-4"><label for="ktp_ayah" class="form-label">KTP Ayah</label><input type="text" class="form-control" id="ktp_ayah" name="ktp_ayah" value="<?php echo htmlspecialchars($data['ktp_ayah']); ?>"></div>
                                        
                                        <div class="col-md-4"><label for="nama_ibu" class="form-label">Nama Ibu</label><input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo htmlspecialchars($data['nama_ibu']); ?>"></div>
                                        <div class="col-md-4"><label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label><input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo htmlspecialchars($data['pekerjaan_ibu']); ?>"></div>
                                        <div class="col-md-4"><label for="telepon_ibu" class="form-label">Telepon Ibu</label><input type="text" class="form-control" id="telepon_ibu" name="telepon_ibu" value="<?php echo htmlspecialchars($data['telepon_ibu']); ?>"></div>
                                        <div class="col-md-4"><label for="tempat_lahir_ibu" class="form-label">Tempat Lahir Ibu</label><input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" value="<?php echo htmlspecialchars($data['tempat_lahir_ibu']); ?>"></div>
                                        <div class="col-md-4"><label for="tanggal_lahir_ibu" class="form-label">Tgl. Lahir Ibu</label><input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" value="<?php echo htmlspecialchars($data['tanggal_lahir_ibu']); ?>"></div>
                                        <div class="col-md-4"><label for="ktp_ibu" class="form-label">KTP Ibu</label><input type="text" class="form-control" id="ktp_ibu" name="ktp_ibu" value="<?php echo htmlspecialchars($data['ktp_ibu']); ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-user-shield me-1"></i>Data Wali (Opsional)</div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-4"><label for="nama_wali" class="form-label">Nama Wali</label><input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?php echo htmlspecialchars($data['nama_wali'] ?? ''); ?>"></div>
                                        <div class="col-md-4"><label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label><input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali" value="<?php echo htmlspecialchars($data['pekerjaan_wali'] ?? ''); ?>"></div>
                                        <div class="col-md-4"><label for="no_tlp_wali" class="form-label">Telepon Wali</label><input type="text" class="form-control" id="no_tlp_wali" name="no_tlp_wali" value="<?php echo htmlspecialchars($data['no_tlp_wali'] ?? ''); ?>"></div>
                                        <div class="col-md-4"><label for="tempat_lahir_wali" class="form-label">Tempat Lahir Wali</label><input type="text" class="form-control" id="tempat_lahir_wali" name="tempat_lahir_wali" value="<?php echo htmlspecialchars($data['tempat_lahir_wali'] ?? ''); ?>"></div>
                                        <div class="col-md-4"><label for="tanggal_lahir_wali" class="form-label">Tgl. Lahir Wali</label><input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" value="<?php echo htmlspecialchars($data['tanggal_lahir_wali'] ?? ''); ?>"></div>
                                        <div class="col-md-4"><label for="ktp_wali" class="form-label">KTP Wali</label><input type="text" class="form-control" id="ktp_wali" name="ktp_wali" value="<?php echo htmlspecialchars($data['ktp_wali'] ?? ''); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header"><i class="fas fa-book me-1"></i>Pilihan Jurusan</div>
                                        <div class="card-body">
                                            <label for="jurusan1" class="form-label">Jurusan 1</label>
                                            <input type="text" class="form-control mb-3" id="jurusan1" name="jurusan1" value="<?php echo htmlspecialchars($data['jurusan1'] ?? ''); ?>">
                                            
                                            <label for="jurusan2" class="form-label">Jurusan 2</label>
                                            <input type="text" class="form-control" id="jurusan2" name="jurusan2" value="<?php echo htmlspecialchars($data['jurusan2'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-header"><i class="fas fa-dollar-sign me-1"></i>Data Pembayaran</div>
                                        <div class="card-body">
                                            <label for="Tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                                            <input type="date" class="form-control mb-3" id="Tanggal_pembayaran" name="Tanggal_pembayaran" value="<?php echo htmlspecialchars($data['Tanggal_pembayaran'] ?? ''); ?>">
                                            
                                            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                                            <input type="number" class="form-control mb-3" id="jumlah_pembayaran" name="jumlah_pembayaran" value="<?php echo htmlspecialchars($data['jumlah_pembayaran'] ?? '0'); ?>">

                                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                            <select id="status_pembayaran" name="status_pembayaran" class="form-select">
                                                <option value="Belum Lunas" <?php echo (isset($data['status_pembayaran']) && $data['status_pembayaran'] == 'Belum Lunas') ? 'selected' : ''; ?>>Belum Lunas</option>
                                                <option value="Lunas" <?php echo (isset($data['status_pembayaran']) && $data['status_pembayaran'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                                                <option value="Belum Bayar" <?php echo (isset($data['status_pembayaran']) && $data['status_pembayaran'] == 'Belum Bayar') ? 'selected' : ''; ?>>Belum Bayar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-end mb-4">
                                <a href="tables.php" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>

                        </form>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Admin Website 2025/2026</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php
$koneksi->close();
?>