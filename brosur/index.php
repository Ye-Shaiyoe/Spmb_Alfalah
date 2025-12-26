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
    <title>SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/eskul.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="logo_Sekolah.png">
    
</head>
<style>

.btn-pembayaran-bawah {
  display: inline-block;
  padding: 14px 30px;
  background: linear-gradient(45deg, #ff9800, #f57c00); /* Warna oranye biar beda dikit */
  color: white;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px;
  border-radius: 50px;
  box-shadow: 0 6px 15px rgba(255, 152, 0, 0.4); /* Sesuaikan shadow warna */
  position: relative;
  overflow: hidden;
  z-index: 1;
  border: none;
  cursor: pointer;
  /* Hilangkan transisi jika tidak diinginkan */
}

.btn-pembayaran-bawah:hover {
  color: white; 
}
</style>

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

        <!-- Prakata Kepala Sekolah -->
        <div class="section" id="prakata">
            <div class="prakata">
                <div class="photo-container">
                    <img src="../Tugas PPDB/img/kepala sekolah.jpg" alt="Kepala Sekolah">
                </div>
                <div class="content">
                    <h1>PRAKATA KEPALA SEKOLAH</h1>
                    <h2>Tentang kepala sekolah</h2>
                    <p>Deskripsi tentang kepala sekolah</p>
                </div>
            </div>
        </div>

        <!-- Keunggulan Kami -->
        <div class="section" id="keunggulan">
            <h2>Keunggulan Kami</h2>
            <div class="unggul-grid">
                <div class="unggul-item">
                    <i>🎓</i>
                    <h3>Akreditasi "A"</h3>
                    <p>Sekolah kami memiliki Akreditasi "A", menjamin mutu pendidikan yang unggul.</p>
                </div>
                <div class="unggul-item">
                    <i>👥</i>
                    <h3>100% Siswa Lulus</h3>
                    <p>Setiap tahun, 100% siswa kami lulus dengan prestasi yang membanggakan.</p>
                </div>
                <div class="unggul-item">
                    <i>👨‍🎓</i>
                    <h3>800+ Siswa Aktif</h3>
                    <p>Kami memiliki lebih dari 800 siswa yang aktif belajar.</p>
                </div>
                <div class="unggul-item">
                    <i>🌟</i>
                    <h3>Prestasi Siswa</h3>
                    <p>Banyak prestasi tingkat nasional dan internasional.</p>
                </div>
            </div>
        </div>

        <!-- Berita Terkini -->
        <div class="section" id="berita">
            <h2>Berita Terkini</h2>
            <div class="berita-grid">
                <div class="berita-item">
                    <h3>PPDB 2026 Dibuka</h3>
                    <p>Calon siswa baru dapat mendaftar mulai tanggal sekian.</p>
                    <a href="#" class="btn-more">Selengkapnya →</a>
                </div>
                <div class="berita-item">
                    <h3>Siswa/Siswi yang lolos SNBP 2025</h3>
                    <p>Siswa Atau Siswi SMK Al-Falah Yang Sudah Lulus SNBP 2025.</p>
                    <a href="#" class="btn-more">Selengkapnya →</a>
                </div>
                <div class="berita-item">
                    <h3>Pilihan Tepat Untuk Masa Depan Yang Gemilang</h3>
                    <p>Ingin memiliki keterampilan yang siap pakai dan langsung terjun ke dunia kerja? SMK AL FALAH
                        adalah pilihan yang tepat!</p>
                    <a href="#" class="btn-more">Selengkapnya →</a>
                </div>
            </div>
        </div>
        <div class="section" id="jurusan">
            <h2>Jurusan Tersedia</h2>
            <div class="jurusan-grid">
                <div class="jurusan-item">
                    <img src="img/coding.jpg" alt="RPL/Rekayasa Perangkat Lunak" class="jurusan-img">
                    <h3>Rekayasa Perangkat Lunak</h3>
                    <p>Mempelajari pengembangan perangkat lunak dan sistem informasi.</p>
                </div>
                <div class="jurusan-item">
                    <img src="img/electro.jpg" alt="Listrik" class="jurusan-img">
                    <h3>TITL/listrik</h3>
                    <p>Berfokus pada perencanaan, pemasangan, perbaikan, dan pemeliharaan sistem instalasi tenaga
                        listrik.</p>
                </div>
                <div class="jurusan-item">
                    <img src="img/mesin.jpg" alt="Mesin" class="jurusan-img">
                    <h3>TIPM/Mesin</h3>
                    <p>Belajar tentang perawatan dan perbaikan mesin.</p>
                </div>
                <div class="jurusan-item">
                    <img src="img/kendaraan.jpg" alt="Otomotif" class="jurusan-img">
                    <h3>TKR/Otomotif</h3>
                    <p>Berfokus pada perbaikan, pemeliharaan, dan teknologi kendaraan ringan, terutama mobil</p>
                </div>
            </div>

            <!-- Tombol Tunggal di Bawah -->
            <!-- Tombol Tunggal di Bawah -->
            <div style="text-align: center; margin-top: 30px; display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <a href="../Tugas PPDB/from.php" class="btn-daftar-bawah">Daftar Sekarang →</a>
                <a href="../Tugas PPDB/pembayaran.php" class="btn-pembayaran-bawah">Pembayaran Disini →</a> <!-- Ganti href ke halaman pembayaran kamu -->
            </div>
            <!-- Brosur PPDB -->
            <div class="section" id="brosur">
                <h2>Brosur PPDB 2025/2026</h2>
                <div class="brosur-container">
                    <img src="../Tugas PPDB/img/brosuer.jpg" alt="Brosur PPDB SMK Al Falah Bandung" class="brosur-img">
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="section" id="media-sosial">
                <h2>Ikuti Kami di Media Sosial</h2>
                <div class="media-sosial-container">
                    <a href="https://www.instagram.com/smkalfalahbdg?utm_source=ig_web_button_share_sheet&igsh=MWxza3cxcms3a2txMg=="
                        target="_blank" title="Instagram">
                        <img src="https://img.icons8.com/color/96/000000/instagram-new--v1.png" alt="Instagram"
                            class="sosmed-icon">
                    </a>
                    <a href="https://www.tiktok.com/@smkalfalahbdg?is_from_webapp=1&sender_device=pc" target="_blank"
                        title="TikTok">
                        <img src="https://img.icons8.com/color/96/000000/tiktok--v1.png" alt="TikTok" class="sosmed-icon">
                    </a>
                    <a href="https://youtube.com/@smkalfalahbandung1365?si=xVDUxjk2i-U9Sm0j" target="_blank"
                        title="YouTube">
                        <img src="https://img.icons8.com/color/96/000000/youtube-play.png" alt="YouTube"
                            class="sosmed-icon">
                    </a>
                </div>
            </div>
            <!-- Footer -->
            <footer>
                <div class="footer-content">
                    <p>&copy; 2025/2026 SMK Al Falah Bandung. All rights reserved.</p>
                </div>
            </footer>

            <script src="js/script.js"></script>
</body>

</html>