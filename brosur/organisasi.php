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
    <title>Struktur Organisasi - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/struktur_organisai.css" />
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
            <h2>Struktur Organisasi</h2>
            <div class="struktur-gambar">
                <img src="../Tugas PPDB/img/struktur.jpg" alt="Struktur Organisasi SMK Al Falah Bandung"
                    class="struktur-img" />
            </div>
        </div>

        <div class="section">
            <h2>Rincian Struktur Organisasi</h2>
            <p>
                Struktur organisasi SMK Al Falah Bandung mencakup <strong>Kepala Sekolah, Bendahara, dan beberapa Wakil
                    Kepala Sekolah (Waka), yaitu Waka Kurikulum, Waka Humas dan SDM, Waka Kesiswaan, serta Waka Sarana
                    dan Prasarana</strong>. Struktur ini juga menyertakan Kepala Jurusan, dengan Kepala Jurusan
                Broadcasting disebutkan sebagai Abdurokhman, S.Kom.
            </p>
            <ul>
                <li><strong>Kepala Sekolah:</strong> Zamrony Amrillah, S.Pd.I</li>
                <li><strong>Bendahara:</strong> Eka Syamsul Arifin</li>
                <li><strong>Wakil Kepala Sekolah (Waka):</strong>
                    <ul>
                        <li><strong>Waka Kurikulum:</strong> Mardiningsih, S.P.i</li>
                        <li><strong>Waka Humas dan SDM:</strong> Abdurokhman, S.Kom</li>
                        <li><strong>Waka Kesiswaan:</strong> Sulastri, S.Pd</li>
                        <li><strong>Waka Sarana dan Prasarana (SarPras):</strong> Dzulkifli, Amd.Kom</li>
                    </ul>
                </li>
                <li><strong>Kepala Jurusan:</strong>
                    <ul>
                        <li><strong>Kepala Jurusan Broadcasting:</strong> Abdurokhman, S.Kom</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" onclick="scrollToTop()">↑</div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/struktur_organisasi.js"></script>
</body>

</html>