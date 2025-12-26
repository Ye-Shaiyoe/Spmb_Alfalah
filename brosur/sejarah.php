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
    <title>Sejarah - SMK Al Falah Bandung</title>
    <link rel="stylesheet" href="css/eskul.css">
    <link rel="stylesheet" href="css/sejarah.css">
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
        <div class="section" id="sejarah-singkat">
            <h1>Sejarah SMK Al Falah Bandung</h1>
            <div class="sejarah-content">
                <div class="sejarah-img-container">
                    <img src="../Tugas PPDB/img/sejarah.jpg" alt="Sejarah SMK Al Falah Bandung" class="sejarah-img">
                </div>
                <div class="sejarah-text">
                    <h2>Sejarah SMK Al Falah Bandung</h2>
                    <p>Yayasan Islam Al Falah dibangun secara bertahap sejak tahun 1950 oleh pendirinya, yaitu almarhum
                        Bapak K.H. Saefudin Ahmad atau yang lebih dikenal dengan panggilan Ustadz Idi.</p>
                    <p>Beliau adalah seorang pendidik yang juga aktif di pergerakkan sejak zaman penjajahan Belanda,
                        Jepang, bahkan sampai zaman kemerdekaan.</p>
                    <p>Beliau beberapa kali keluar masuk penjara karena perjuangannya yang konsisten untuk menegakkan
                        Syariat Islam. Keyakinan akan pentingnya pembangunan sumber daya insani ummat sesuai dengan
                        teladan dari Rasulullah SAW pada tahap awal dakwahnya, bangunan yang pertama kali didirikan
                        adalah ruang belajar (madrasah) dengan mengkhususkan pada pendidikan agama, kemudian setelah
                        cukup banyak orang yang mau melakukan sholat berjamaah baru dibangun masjid.</p>
                    <p>Menurut pendapatnya akan sia-sia dibangun masjid jika belum ada orang yang mau sholat berjamaah
                        dan meramaikan masjid tersebut. Pada tahun 1958, Madrasah Diniyyah Al Falah dirubah statusnya
                        menjadi Madrasah Ibtidaiyah Al Falah, dan Bapak Ustadz H. Saefudin Ahmad menjadi guru agama yang
                        diperbantukan dari Departemen Agama dan sekaligus merangkap sebagai Kepala Sekolah. Pada 13
                        Januari 1961, atas usulan beberapa teman beliau, Pesantren Al Falah dibuat Badan Hukum berupa
                        yayasan yang diberi nama Yayasan Pesantren Islam Al Falah, dengan Ketua Bapak K.H. Ahmad
                        Sobandi, dan Bapak Ustadz Idi menjadi Wakil Ketuanya.</p>
                    <p>Sekolah lanjutan mulai dirintis pada tahun 1964, yaitu dengan didirikan Sekolah Pendidikan Guru
                        Agama (PGA 4 tahun), tetapi kemudian PGA ini dirubah menjadi Sanawiyah pada tahun 1974 sesuai
                        dengan ketentuan Departemen Agama, dimana pada waktu itu Sekolah PGA Swasta jumlahnya dibatasi
                        dengan alasan sudah kelebihan tenaga pengajar agama Islam untuk Sekolah Dasar. Karena
                        pertimbangan teknis dimana lulusan Madrasah Sanawiyyah saat itu tidak dapat melanjutkan ke SMA,
                        serta beberapa pertimbangan teknis dan administratif yang kurang kondusif, maka pada tahun 1976
                        Madrasah Tsanawiyyah (MTs) Al Falah ini dirubah menjadi Sekolah Menengah Pertama (SMP) Al Falah
                        dengan menerapkan Kurikulum Departemen Pendidikan dan Kebudayaan.</p>
                    <p>Pada tahun 1976 ini Madrasah Ibtidaiyyah dirubah status menjadi Sekolah Dasar (SD) Al Falah,
                        dengan demikian sejak tahun ini sekolah-sekolah Al Falah Kurikulumnya berorientasi pada
                        Departemen Pendidikan dan Kebudayaan, sedangkan pola pengajaran salafiyyah tetap dijalankan
                        secara baik dan konsisten. Dalam upaya memenuhi harapan para jamaah dan alumni yang telah mukim
                        dan terjun dan mengabdi di masyarakat dengan mendirikan madrasah atau pesantren sendiri, serta
                        untuk meningkatkan peran pesantren Al Falah dalam era industrialisasi yang sedang berkembang
                        maka pada tahun 1984 didirikan Sekolah Menengah Kejuruan (SMK) Al Falah, dengan tiga jurusan
                        yaitu Jurusan Teknik Listrik, Jurusan Teknik Mekanik Industri, Jurusan Teknik Kendaraan Ringan
                        Otomotif dan jurusan Rekayasa Perangkat Lunak.</p>
                </div>
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

        <script src="js/sejarah.js"></script>

</body>

</html>