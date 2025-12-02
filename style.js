    // Get form elements
    const form = document.getElementById("loginForm");
    const msg = document.getElementById("msg");
    const toggle = document.getElementById("togglePass");
    const pass = document.getElementById("password");
    const ident = document.getElementById("identifier");
    
    // Toggle password visibility
    toggle.addEventListener("click", () => {
      const isShown = pass.type === "text";
      pass.type = isShown ? "password" : "text";
      toggle.textContent = isShown ? "Tampilkan" : "Sembunyikan";
      toggle.setAttribute('aria-label', isShown ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');
    });
    
    // Form submit handler
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      
      // Reset error message
      msg.style.display = "none";
      msg.textContent = "";
      msg.classList.remove('error', 'success');
      
      const identifier = ident.value.trim();
      const password = pass.value;
      
      // Client-side validation
      if (!identifier) {
        showMessage("Masukkan email atau username.", "error");
        ident.focus();
        return;
      }
      
      if (!password) {
        showMessage("Masukkan kata sandi.", "error");
        pass.focus();
        return;
      }
      
      if (password.length < 4) {
        showMessage("Password minimal 4 karakter.", "error");
        pass.focus();
        return;
      }
      
      // Button loading state
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalBtnText = submitBtn.textContent;
      submitBtn.disabled = true;
      submitBtn.textContent = "Memproses...";
      submitBtn.style.opacity = "0.7";
      
      try {
        // Prepare form data
        const formData = new FormData();
        formData.append('identifier', identifier);
        formData.append('password', password);
        
        // Send request to server
        const response = await fetch('proseslogin.php', {
          method: 'POST',
          body: formData
        });
        
        // Check if response is ok
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        // Parse JSON response
        const data = await response.json();
        
        if (data.success) {
          // Login successful
          showMessage(data.message, "success");
          
          // Redirect after short delay
          setTimeout(() => {
            window.location.href = data.redirect;
          }, 500);
          
        } else {
          // Login failed - show error message
          showMessage(data.message || 'Login gagal. Silakan coba lagi.', "error");
        }
        
      } catch (error) {
        console.error("Login error:", error);
        showMessage("Terjadi kesalahan koneksi. Silakan coba lagi.", "error");
        
      } finally {
        // Restore button state
        submitBtn.disabled = false;
        submitBtn.textContent = originalBtnText;
        submitBtn.style.opacity = "1";
      }
    });
    
    // Helper function to show messages
    function showMessage(text, type) {
      msg.textContent = text;
      msg.className = type;
      msg.style.display = "block";
      
      // Auto-hide success messages after 3 seconds
      if (type === "success") {
        setTimeout(() => {
          msg.style.display = "none";
        }, 3000);
      }
    }
    
    // Clear message on input
    ident.addEventListener('input', () => {
      if (msg.style.display === "block") {
        msg.style.display = "none";
      }
    });
    
    pass.addEventListener('input', () => {
      if (msg.style.display === "block") {
        msg.style.display = "none";
      }
    });