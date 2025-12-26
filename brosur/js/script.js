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
  // Muncul saat 10% dari elemen terlihat di viewport
  return (
    rect.top <= window.innerHeight * 0.9 &&
    rect.bottom >= 0
  );
}

// Fungsi untuk menambahkan kelas animasi saat elemen terlihat
function handleScroll() {
  document.querySelectorAll('.section, .unggul-item, .berita-item, .jurusan-item').forEach(item => {
    if (isElementInViewport(item)) {
      item.classList.add('fade-in-up');
    }
    // Tidak menghapus kelas jika ingin sekali muncul saja
    // Jika ingin muncul lagi saat di-scroll kembali, uncomment baris di bawah:
    // else {
    //   item.classList.remove('fade-in-up');
    // }
  });
}

// Tambahkan event listener scroll
window.addEventListener('scroll', handleScroll);

// Panggil handleScroll sekali saat halaman dimuat untuk menangani elemen yang terlihat
document.addEventListener('DOMContentLoaded', () => {
  setTimeout(handleScroll, 100); // Beri jeda kecil agar elemen selesai di-render
});

// Toggle Hamburger Menu
const menuToggle = document.getElementById("menuToggle");
const mainNav = document.getElementById("mainNav");

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