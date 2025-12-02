<?php
// Set headers
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Function untuk response JSON
function sendResponse($success, $message, $redirect = null) {
    $response = ['success' => $success, 'message' => $message];
    if ($redirect) {
        $response['redirect'] = $redirect;
    }
    echo json_encode($response);
    exit;
}

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method');
}

try {
    require_once 'koneksi.php';
    session_start();
    
    // Ambil dan sanitasi input
    $identifier = trim($_POST['identifier'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Validasi input kosong
    if (empty($identifier)) {
        sendResponse(false, 'Email/username wajib diisi!');
    }
    
    if (empty($password)) {
        sendResponse(false, 'Password wajib diisi!');
    }
    
    // Validasi panjang minimum password
    if (strlen($password) < 4) {
        sendResponse(false, 'Password minimal 4 karakter!');
    }
    
    // Check admin login
    $adminUsername = 'lf.3!]hSu+^LS@u!Bj4!~^atcjDNIY';
    $adminPassword = 'lf.3!]hSu+^LS@u!Bj4!~^atcjDNIY';
    
    if ($identifier === $adminUsername) {
        if ($password === $adminPassword) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $adminUsername;
            $_SESSION['role'] = 'admin';
            sendResponse(true, 'Login admin berhasil', 'admin/log/mail/login.php');
        } else {
            sendResponse(false, 'Password admin salah!');
        }
    }
    
    // Query user dari database
    $stmt = $pdo->prepare("SELECT id, username, gmail, password FROM users WHERE username = ? OR gmail = ? LIMIT 1");
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check user existence
    if (!$user) {
        sendResponse(false, 'Akun tidak ditemukan! Silakan periksa username/email Anda.');
    }
    
    // Verifikasi password - cek apakah sudah hash atau masih plain text
    if (substr($user['password'], 0, 4) === '$2y$') {
        // Password sudah di-hash, gunakan password_verify
        if (!password_verify($password, $user['password'])) {
            sendResponse(false, 'Password yang Anda masukkan salah!');
        }
    } else {
        // Password masih plain text (data lama)
        if ($user['password'] !== $password) {
            sendResponse(false, 'Password yang Anda masukkan salah!');
        }
        
        // AUTO-UPDATE: Hash password lama saat login berhasil
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $updateStmt->execute([$hashed, $user['id']]);
        
        error_log("Password auto-hashed for user: {$user['username']}");
    }
    
    // Login berhasil - set session
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['gmail'] = $user['gmail'];
    $_SESSION['role'] = 'user';
    
    sendResponse(true, 'Login berhasil', 'brosur/index.php');
    
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    sendResponse(false, 'Terjadi kesalahan database.');
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    sendResponse(false, 'Terjadi kesalahan sistem.');
}
?>