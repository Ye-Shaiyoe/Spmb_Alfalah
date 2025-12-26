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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dokumentasi Kegiatan - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/kegiatan.css">
    <link rel="icon" type="image/x-icon" href="logo_Sekolah.png" />
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
        <div class="section visible">
            <h2>Dokumentasi Kegiatan</h2>
            <p style="text-align: center; margin-bottom: 25px; color: #555;">
                Kumpulan foto dan informasi kegiatan siswa/siswi SMK Al Falah Bandung.
            </p>

            <div class="dokumentasi-grid">
                <!-- Contoh Kegiatan 1 -->
                <div class="kegiatan-card">
                    <img src="img/Kurokawa akane.jpg" alt="Upacara Bendera" class="kegiatan-img" />
                    <div class="kegiatan-content">
                        <h3>Upacara Peringatan HUT RI</h3>
                        <p>Siswa mengikuti upacara bendera dalam rangka memperingati Hari Kemerdekaan Republik Indonesia
                            ke-79.</p>
                        <div class="btn-container">
                            <a href="#" class="btn-uiverse">Lihat Foto</a>
                        </div>
                    </div>
                </div>

                <!-- Contoh Kegiatan 2 -->
                <div class="kegiatan-card">
                    <img src="img/Kurokawa akane.jpg" alt="Lomba Bola" class="kegiatan-img" />
                    <div class="kegiatan-content">
                        <h3>Lomba Bola Antar Kelas</h3>
                        <p>Antusiasme tinggi dari siswa dalam kompetisi olahraga Bola tahunan sekolah.</p>
                        <div class="btn-container">
                            <a href="#" class="btn-uiverse">Lihat Foto</a>
                        </div>
                    </div>
                </div>

                <!-- Contoh Kegiatan 3 -->
                <div class="kegiatan-card">
                    <img src="img/Kurokawa akane.jpg" alt="Bazar Amal" class="kegiatan-img" />
                    <div class="kegiatan-content">
                        <h3>Lomba PASKIBRA Se-Bandung Raya</h3>
                        <p>Esktrakurikuler PASKIBRA SMK Al Falah Bandung mengikuti perlombaan PASKIBRA Se-Bandung Raya dan mendapatkan Juara 1 RUKIBRA.</p>
                        <div class="btn-container">
                            <a href="#" class="btn-uiverse">Lihat Foto</a>
                        </div>
                    </div>
                </div>

                <!-- Tambahkan lebih banyak sesuai kebutuhan -->
            </div>
        </div>
    </div>

    <!-- Footer Copyright -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
        </div>
    </footer>


    <script src="js/script.js"></script>
</body>

</html>