// Smooth scroll to top
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

// Cek elemen terlihat di viewport
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return rect.top <= window.innerHeight * 0.85 && rect.bottom >= 0;
}

// Tambahkan kelas animasi standar (fade-in-up) saat terlihat
function handleScroll() {
  document
    .querySelectorAll(".section, .program-item")
    .forEach((item) => {
      if (isElementInViewport(item) && !item.classList.contains("fade-in-up")) {
        item.classList.add("fade-in-up");
      }
    });
}

// Event scroll
window.addEventListener("scroll", handleScroll);

// Init saat DOM siap
document.addEventListener("DOMContentLoaded", () => {
  // Panggil pertama kali untuk elemen yang sudah terlihat
  setTimeout(handleScroll, 100);

  // --- Toggle Menu ---
  const menuToggle = document.getElementById("menuToggle");
  const mainNav = document.getElementById("mainNav");

  if (menuToggle && mainNav) {
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
    console.warn(
      "Elemen menuToggle atau mainNav tidak ditemukan. Fungsi toggle menu tidak akan aktif."
    );
  }
});
