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
    <title>Profil Video - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/videeo.css">
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
    <!-- Konten Utama -->
    <div class="container">
        <h1>Profil Video</h1>
        <p>Berikut adalah video profil singkat mengenai SMK Al Falah Bandung.</p>

        <!-- VIDEO MP4 -->
        <div class="video-container">
            <video controls>
                <source src="video/yt smk.mp4" type="video/mp4">
                Browser Anda tidak mendukung pemutaran video.
            </video>
        </div>

        <!-- Deskripsi -->
        <div class="video-description">
            <h2>Tentang SMK Al Falah Bandung</h2>
            <p>Jelajahi dunia pendidikan vokasi di SMK Al Falah Bandung. Temukan fasilitas modern, program keahlian yang
                relevan dengan industri, dan lingkungan belajar yang mendukung siswa untuk siap kerja dan berprestasi.
            </p>
        </div>
    </div>
    <footer class="footer">
        <p>© 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>