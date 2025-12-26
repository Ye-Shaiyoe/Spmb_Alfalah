// Smooth scroll to top
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

// Fungsi untuk mengecek apakah elemen terlihat di viewport
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  // Muncul saat sekitar 20% dari elemen terlihat di viewport
  return (
    rect.top <= window.innerHeight * 0.85 &&
    rect.bottom >= 0
  );
}

// Fungsi untuk menambahkan kelas animasi saat elemen terlihat
function handleScroll() {
  // Ganti selector ini dengan semua elemen yang ingin Anda animasikan
  // Misalnya, section, item-item di grid, timeline-item, dsb.
  document.querySelectorAll('.section, .unggul-item, .berita-item, .jurusan-item, .timeline-item').forEach(item => {
    if (isElementInViewport(item)) {
      // Cek apakah kelas fade-in-up sudah ada untuk mencegah penambahan berulang
      if (!item.classList.contains('fade-in-up')) {
          item.classList.add('fade-in-up');
      }
    }
  });
}

// Tambahkan event listener scroll
window.addEventListener('scroll', handleScroll);

// Panggil handleScroll sekali saat halaman dimuat untuk menangani elemen yang terlihat
document.addEventListener('DOMContentLoaded', () => {
  // Beri jeda kecil agar elemen selesai di-render
  setTimeout(handleScroll, 100);

  // --- Fungsi Toggle Menu ---
  const menuToggle = document.getElementById("menuToggle");
  const mainNav = document.getElementById("mainNav");

  if (menuToggle && mainNav) { // Cek apakah elemen ada sebelum menambahkan event listener
    menuToggle.addEventListener("click", () => {
      menuToggle.classList.toggle("active");
      mainNav.classList.toggle("active");
    });

    // Tutup menu saat klik di luar
    document.addEventListener("click", (e) => {
      if (!menuToggle.contains(e.target) && !mainNav.contains(e.target)) {
        menuToggle.classList.remove("active");
        mainNav.classList.remove("active");
      }
    });

    // Toggle dropdown di mobile
    document.querySelectorAll(".dropdown > a").forEach((link) => {
      link.addEventListener("click", (e) => {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          const parent = link.parentElement;
          parent.classList.toggle("active");
        }
      });
    });
  } else {
      console.warn("Elemen menuToggle atau mainNav tidak ditemukan. Fungsi toggle menu tidak akan aktif.");
  }
});

// Fungsi untuk menggulir ke atas
// (Fungsi scrollToTop sudah didefinisikan di atas)