// Toggle scroll-to-top button and reveal sections using IntersectionObserver for smoothness
const scrollButton = document.querySelector(".scroll-top");
window.addEventListener("scroll", () => {
  if (!scrollButton) return;
  if (window.scrollY > 300) scrollButton.classList.add("show");
  else scrollButton.classList.remove("show");
});

// Use IntersectionObserver for section reveal (more performant and smoother)
const sections = document.querySelectorAll(".section");
if ("IntersectionObserver" in window) {
  const obs = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );
  sections.forEach((s) => obs.observe(s));
} else {
  // Fallback: reveal immediately
  sections.forEach((s) => s.classList.add("visible"));
}

// Reveal cards individually for a smoother per-card animation (desktop only)
const cards = document.querySelectorAll(".card");
if (
  window.innerWidth > 768 &&
  "IntersectionObserver" in window &&
  cards.length
) {
  const cardObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          cardObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );
  cards.forEach((c) => cardObserver.observe(c));
} else {
  // On mobile or unsupported browsers, ensure cards are immediately visible
  cards.forEach((c) => {
    c.classList.add("visible");
    c.style.opacity = "1";
    c.style.transform = "none";
  });
}

// Smooth scroll to top
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
// Toggle Hamburger Menu
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
}

// Toggle dropdown di mobile (keeps original behavior but lighter)
document.querySelectorAll(".dropdown > a").forEach((link) => {
  link.addEventListener("click", (e) => {
    if (window.innerWidth <= 768) {
      e.preventDefault();
      const parent = link.parentElement;
      parent.classList.toggle("active");
    }
  });
});

// Footer year (set current year)
try {
  const fy = document.getElementById("footer-year");
  if (fy) fy.textContent = new Date().getFullYear();
} catch (e) {
  // noop
}
