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
    <title>Visi & Misi - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/eskul.css">
    <link rel="stylesheet" href="css/visi.css">
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

    <div class="container">
        <div class="section" id="visi">
            <h1>Visi & Misi SMK Al Falah Bandung</h1>
            <div class="visi-box">
                <h2>Visi</h2>
                <p>Menjadi Sekolah Menengah Kejuruan yang unggul, berakhlak mulia, dan siap bersaing di era globalisasi
                    serta mampu menghasilkan lulusan yang kompeten, inovatif, dan berjiwa kewirausahaan.</p>
            </div>
        </div>

        <!-- Misi -->
        <div class="section" id="misi">
            <h2>Misi</h2>
            <ul class="misi-list">
                <li>Menyelenggarakan pendidikan berkualitas yang didukung oleh tenaga pendidik profesional.</li>
                <li>Membentuk peserta didik yang beriman, bertaqwa, dan berakhlak mulia.</li>
                <li>Mengembangkan potensi peserta didik dalam bidang akademik, keterampilan, dan soft skill secara optimal.</li>
                <li>Mengembangkan sarana dan prasarana pendidikan untuk meningkatkan kualitas pembelajaran.</li>
                <li>Membentuk jiwa kewirausahaan dan inovasi di kalangan peserta didik.</li>
                <li>Membudayakan kegiatan keagamaan dan lingkungan bersih, hijau dan sehat.</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/visi.js"></script>

</body>

</html>