<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>PPDB — Lupa Password SMK Al-Falah Bandung</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Tugas PPDB/css/daftar.css" />
    <link rel="icon" type="x-icon" href="Tugas PPDB/img/Alfalah.png">
  </head>
  <body>
    <div class="bg-dekorasi">
      <span class="c1"></span>
      <span class="c2"></span>
      <span class="c3"></span>
    </div>

    <main class="container" role="main">
      <section class="panel-info">
        <div class="sekolah-title">SMK Al-Falah Bandung</div>

        <header>
          <img src="Tugas PPDB/img/Alfalah.png" alt="Logo" class="logo" />
          <div>
            <h1>Portal PPDB SMK 2026</h1>
            <div style="font-size: 13px">
              Reset Password Akun Anda
            </div>
          </div>
        </header>
        <div class="lead">
          Masukkan email atau username yang terdaftar, kemudian buat password baru untuk akun Anda. Pastikan password minimal 4 karakter.
        </div>
      </section>
      
      <section class="card">
        <h2 style="margin: 0 0 14px 0; color: var(--primary)">Lupa Password</h2>

        <form id="forgetForm" autocomplete="on" novalidate>
          <div>
            <label for="identifier">Email atau Username</label>
            <input
              id="identifier"
              name="identifier"
              type="text"
              placeholder="Masukkan email atau username"
              required
            />
          </div>

          <div>
            <label for="newPassword">Password Baru</label>
            <input
              id="newPassword"
              name="newPassword"
              type="password"
              placeholder="Minimal 4 karakter"
              required
            />
          </div>

          <div>
            <label for="confirmPassword">Konfirmasi Password Baru</label>
            <input
              id="confirmPassword"
              name="confirmPassword"
              type="password"
              placeholder="Ulangi password baru"
              required
            />
          </div>

          <button type="submit" class="btn">Reset Password</button>

          <div id="msg" class="error" role="alert"></div>

          <div class="footer-note">
            Ingat password Anda?
            <a href="index.php" class="muted-link">Login di sini</a>
          </div>
        </form>
      </section>
    </main>

    <script>
const form = document.getElementById("forgetForm");
const msg = document.getElementById("msg");
const identifier = document.getElementById("identifier");
const newPassword = document.getElementById("newPassword");
const confirmPassword = document.getElementById("confirmPassword");

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  msg.style.display = "none";
  msg.textContent = "";

  // Validasi input
  if (!identifier.value.trim()) {
    msg.textContent = "Email atau username wajib diisi.";
    msg.style.display = "block";
    identifier.focus();
    return;
  }

  if (!newPassword.value) {
    msg.textContent = "Password baru wajib diisi.";
    msg.style.display = "block";
    newPassword.focus();
    return;
  }

  if (newPassword.value.length < 4) {
    msg.textContent = "Password minimal 4 karakter.";
    msg.style.display = "block";
    newPassword.focus();
    return;
  }

  if (newPassword.value !== confirmPassword.value) {
    msg.textContent = "Konfirmasi password tidak sesuai.";
    msg.style.display = "block";
    confirmPassword.focus();
    return;
  }

  // Persiapkan data
  const formData = new URLSearchParams();
  formData.append('identifier', identifier.value.trim());
  formData.append('newPassword', newPassword.value);

  // Disable form selama proses
  const submitBtn = form.querySelector('button[type="submit"]');
  const originalBtnText = submitBtn.textContent;
  submitBtn.disabled = true;
  submitBtn.textContent = "Memproses...";

  try {
    // Kirim data ke server
    const response = await fetch('prosesforget.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: formData.toString()
    });

    const data = await response.json();

    if (data.success) {
      alert(data.message || "Password berhasil direset!");
      window.location.href = "index.php";
    } else {
      msg.textContent = data.message || "Gagal reset password. Silakan coba lagi.";
      msg.style.display = "block";
      submitBtn.disabled = false;
      submitBtn.textContent = originalBtnText;
    }
  } catch (error) {
    console.error('Error:', error);
    msg.textContent = "Terjadi kesalahan. Silakan coba lagi.";
    msg.style.display = "block";
    submitBtn.disabled = false;
    submitBtn.textContent = originalBtnText;
  }
});
    </script>
  </body>
</html>