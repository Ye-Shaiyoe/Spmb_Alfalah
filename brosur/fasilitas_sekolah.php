<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas Sekolah - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/eskul.css">
    <link rel="stylesheet" href="css/fasilitas.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="x-icon" href="logo_Sekolah.png">
</head>

<body>

    <!-- Header -->
    <header>
        <div class="logo">SMK Al Falah Bandung</div>
        <div class="menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="mainNav">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li class="dropdown">
                    <a href="#">Profil ▼</a>
                    <div class="dropdown-content">
                        <a href="sejarah.php">Sejarah</a>
                        <a href="visi.php">Visi Misi</a>
                        <a href="progam_kerja.php">Program Kerja</a>
                        <a href="organisasi.php">Struktur Organisasi</a>
                        <a href="video.php">Profil Video</a>
                        <a href="fasilitas_sekolah.php">Fasilitas Sekolah</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Kesiswaan ▼</a>
                    <div class="dropdown-content">
                        <a href="extrakurikuler.php">Ekstrakurikuler</a>
                        <a href="dok_kegiatan.php">Dok. Kegiatan</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Info ▼</a>
                    <div class="dropdown-content">
                        <a href="kontak.php">Kontak</a>
                        <a href="tabel.php">Tabel pendaftar</a>
                    </div>
                </li>
                <li><a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="section" id="fasilitas">
            <h1>Fasilitas Sekolah</h1>
            <h3>SMK Al Falah Bandung dilengkapi dengan berbagai fasilitas yang mendukung proses belajar mengajar dan
                pengembangan bakat siswa.</h3>

            <div class="fasilitas-grid">
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Laboratorium Komputer">
                    <h3>Laboratorium Komputer</h3>
                    <p>Ruang laboratorium komputer dilengkapi dengan perangkat keras dan perangkat lunak untuk
                        mendukung pembelajaran digital dan pemrograman.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Perpustakaan">
                    <h3>Perpustakaan</h3>
                    <p>Perpustakaan yang nyaman dan tenang, menyediakan berbagai buku pelajaran, referensi, dan akses
                        internet untuk menunjang penelitian dan pembelajaran.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Lapangan Olahraga">
                    <h3>Lapangan Olahraga</h3>
                    <p>Lapangan yang luas untuk berbagai kegiatan olahraga seperti sepak bola, bola basket, dan upacara
                        bendera.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Kantin Sekolah">
                    <h3>Kantin Sekolah</h3>
                    <p>Kantin menyediakan berbagai makanan dan minuman sehat dengan harga terjangkau untuk siswa dan
                        guru.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Masjid">
                    <h3>Masjid</h3>
                    <p>Masjid yang nyaman untuk ibadah dan kegiatan keagamaan, dilengkapi dengan fasilitas seperti
                        karpet, pengeras suara, dan ruang wudhu.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Ruang Kelas">
                    <h3>Ruang Kelas</h3>
                    <p>Ruang kelas yang nyaman, bersih, dan dilengkapi dengan papan tulis interaktif serta pencahayaan
                        yang baik.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Mesin">
                    <h3>Ruangan Mesin</h3>
                    <p> fasilitas utama untuk jurusan teknik, berfungsi sebagai bengkel atau laboratorium praktik.
                        Di sinilah siswa belajar keterampilan langsung yang dibutuhkan industri.</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="Listrik">
                    <h3>Ruangan Listrik</h3>
                    <p>siswa mempraktikkan cara memasang dan memelihara instalasi listrik untuk penerangan rumah,
                        sistem tenaga industri, dan kontrol motor listrik</p>
                </div>
                <div class="fasilitas-item">
                    <img src="img/Kurokawa akane.jpg" alt="otomotif">
                    <h3>Ruangan Otomotif</h3>
                    <p>siswa berlatih melakukan perawatan rutin, mendiagnosis kerusakan, dan memperbaiki mesin, sasis,
                        serta sistem kelistrikan pada mobil atau sepeda motor menggunakan peralatan standar bengkel</p>
                </div>
            </div>
        </div>

        <!-- Footer Copyright -->
        <footer>
            <div class="copyright">
                <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
            </div>
        </footer>

        <script src="js/eskul.js"></script>
</body>

</html>