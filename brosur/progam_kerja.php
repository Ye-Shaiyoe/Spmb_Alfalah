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
    <title>Program Kerja - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/progam_kerja.css">
    <link rel="icon" type="image/x-icon" href="logo_Sekolah.png">
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

        <!-- Program Kerja -->
        <div class="section" id="program-kerja">
            <h1>Program Kerja SMK Al Falah Bandung</h1>
            <h2>Tahun Ajaran 2025/2026</h2>
            <div class="program-grid">
                <div class="program-item">
                    <h3>Peningkatan Kualitas Pembelajaran</h3>
                    <p>Mengembangkan kurikulum berbasis kompetensi dan mengintegrasikan teknologi dalam proses belajar
                        mengajar.</p>
                </div>
                <div class="program-item">
                    <h3>Penguatan Karakter dan Akhlak Mulia</h3>
                    <p>Melaksanakan kegiatan pembiasaan dan pelatihan untuk membentuk siswa yang beriman, bertaqwa, dan
                        berakhlak mulia.</p>
                </div>
                <div class="program-item">
                    <h3>Peningkatan Kompetensi Siswa</h3>
                    <p>Menyelenggarakan pelatihan dan sertifikasi kompetensi berbasis industri serta lomba keterampilan.
                    </p>
                </div>
                <div class="program-item">
                    <h3>Perluasan Mitra Dunia Usaha/Industri</h3>
                    <p>Meningkatkan kerja sama dengan Dunia Usaha dan Dunia Industri untuk program magang, penempatan
                        kerja, dan pengembangan
                        kurikulum.</p>
                </div>
                <div class="program-item">
                    <h3>Peningkatan Sarana dan Prasarana</h3>
                    <p>Melengkapi fasilitas Lab Praktek, perpustakaan, dan ruang kelas untuk mendukung proses
                        pembelajaran.</p>
                </div>
                <div class="program-item">
                    <h3>Peningkatan Kualitas Guru dan Staff</h3>
                    <p>Memberikan pelatihan dan pendidikan lanjutan untuk meningkatkan kompetensi tenaga pendidik dan
                        kependidikan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/progam_kerja.js"></script>

</body>

</html>