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
    <title>Ekstrakurikuler - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/eskul.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="x-icon" href="logo_Sekolah.png">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
        <div class="section" id="extrakurikuler">
            <h1>Ekstrakurikuler</h1>
            <div class="program-grid">
                <div class="program-item">
                    <div class="eskul-info">Bola Besar</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler Bola Besar">
                    <div class="eskul-desc">
                        <h3>Bola Besar</h3>
                        <p>Ekstrakurikuler yang fokus pada olahraga sepak bola, bola basket, dan bola voli.</p>
                    </div>
                </div>
                <div class="program-item">
                    <div class="eskul-info">Badminton</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler Badminton">
                    <div class="eskul-desc">
                        <h3>Badminton</h3>
                        <p>Melatih keterampilan dan mental juara dalam permainan bulu tangkis.</p>
                    </div>
                </div>
                <div class="program-item">
                    <div class="eskul-info">Kesenian</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler Kesenian">
                    <div class="eskul-desc">
                        <h3>Kesenian</h3>
                        <p>Mengembangkan bakat siswa dalam seni lukis, tari, dan teater.</p>
                    </div>
                </div>
                <div class="program-item">
                    <div class="eskul-info">Paskibra</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler Paskibra">
                    <div class="eskul-desc">
                        <h3>Paskibra</h3>
                        <p>Menumbuhkan rasa cinta tanah air dan kedisiplinan melalui latihan baris-berbaris.</p>
                    </div>
                </div>
                <div class="program-item">
                    <div class="eskul-info">BTAQ</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler BTAQ">
                    <div class="eskul-desc">
                        <h3>BTAQ</h3>
                        <p>Ekstrakurikuler untuk meningkatkan kualitas bacaan Al-Qur'an dan hafalan.</p>
                    </div>
                </div>
                <div class="program-item">
                    <div class="eskul-info">Taekwondo</div>
                    <img src="../Tugas PPDB/img/Akane.jpeg" alt="Ekstrakurikuler Taekwondo">
                    <div class="eskul-desc">
                        <h3>Taekwondo</h3>
                        <p>Menjaga kebugaran dan melatih bela diri dengan teknik kaki yang kuat.</p>
                    </div>
                </div>
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