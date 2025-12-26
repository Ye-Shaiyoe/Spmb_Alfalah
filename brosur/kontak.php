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
    <title>Kontak - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/kontak.css">
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

        <!-- Informasi Kontak Sekolah -->
        <div class="section" id="kontak-sekolah">
            <h2>Kontak Sekolah</h2>
            <div class="kontak-info">
                <div class="info-item">
                    <i>📍</i>
                    <div>
                        <h3>Alamat</h3>
                        <p>Jl. Cisitu Baru No.52, RT.07/RW.11, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135</p>
                    </div>
                </div>
                <div class="info-item">
                    <i>📞</i>
                    <div>
                        <h3>Telepon</h3>
                        <p>(022) 1234567</p>
                    </div>
                </div>
                <div class="info-item">
                    <i>✉️</i>
                    <div>
                        <h3>Email</h3>
                        <p>smklalfalah@gmail.com</p>
                    </div>
                </div>
                <div class="info-item">
                    <img src="../Tugas PPDB/img/wa.jpg" alt="WhatsApp" class="wa-icon">
                    <div>
                        <h3>WhatsApp</h3>
                        <p><a href="https://wa.me/6281234567890" target="_blank">+62 812-3456-7890</a></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kontak Guru -->
        <div class="section" id="kontak-guru">
            <h2>Kontak Guru</h2>
            <div class="guru-grid">
                <div class="guru-item">
                    <h3>Zamrony Amrillah, S.Pd.I</h3>
                    <p><strong>Jabatan:</strong> Kepala Sekolah</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281123456789" target="_blank">+62
                            811-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
                <div class="guru-item">
                    <h3>Mardiningsih, S.P.i</h3>
                    <p><strong>Jabatan:</strong> Wakil Kepala Sekolah Kurikulum</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281223456789" target="_blank">+62
                            812-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
                <div class="guru-item">
                    <h3>Abdurokhman, S.Kom</h3>
                    <p><strong>Jabatan:</strong> Wakil Kepala Sekolah Humas dan SDM / Kepala Jurusan Broadcasting</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281323456789" target="_blank">+62
                            813-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
                <div class="guru-item">
                    <h3>Sulastri, S.Pd</h3>
                    <p><strong>Jabatan:</strong> Wakil Kepala Sekolah Kesiswaan</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281423456789" target="_blank">+62
                            814-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
                <div class="guru-item">
                    <h3>Dzulkifli, Amd.Kom</h3>
                    <p><strong>Jabatan:</strong> Wakil Kepala Sekolah Sarana dan Prasarana</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281523456789" target="_blank">+62
                            815-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
                <div class="guru-item">
                    <h3>Eka Syamsul Arifin</h3>
                    <p><strong>Jabatan:</strong> Bendahara</p>
                    <p><strong>WhatsApp:</strong> <a href="https://wa.me/6281623456789" target="_blank">+62
                            816-2345-6789</a></p>
                    <p><strong>Email:</strong> email@gmail.com</p>
                </div>
            </div>
        </div>

        <!-- Lokasi Sekolah -->
        <div class="section" id="lokasi-sekolah">
            <h2>Lokasi Sekolah</h2>
            <p style="text-align: center; margin-bottom: 20px; color: #555;">
                Jl. Cisitu Baru No.52, RT.07/RW.11, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135
            </p>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0627891234567!2d107.61234567890123!3d-6.8756789012345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f5c7b8d9e0%3A0x1a2b3c4d5e6f7a8b!2sJl.%20Cisitu%20Baru%20No.52%2C%20Dago%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040135!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0; border-radius: 12px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div style="text-align: center; margin-top: 15px;">
                <a href="https://maps.google.com/?q=Jl.+Cisitu+Baru+No.52+Dago+Coblong+Bandung+40135" 
                   target="_blank" 
                   style="display: inline-block; padding: 12px 24px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 8px; font-weight: bold; transition: background-color 0.3s;">
                    Buka di Google Maps
                </a>
            </div>
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