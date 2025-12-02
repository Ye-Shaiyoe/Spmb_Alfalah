<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    require_once 'koneksi.php';

    // Ambil data dari POST
    $identifier = trim($_POST['identifier'] ?? '');
    $newPassword = $_POST['newPassword'] ?? '';

    // Validasi input kosong
    if (empty($identifier)) {
        echo json_encode(['success' => false, 'message' => 'Email atau username wajib diisi.']);
        exit;
    }

    if (empty($newPassword)) {
        echo json_encode(['success' => false, 'message' => 'Password baru wajib diisi.']);
        exit;
    }

    // Validasi panjang password
    if (strlen($newPassword) < 4) {
        echo json_encode(['success' => false, 'message' => 'Password minimal 4 karakter.']);
        exit;
    }

    // Cari user berdasarkan email atau username
    $stmt = $pdo->prepare("SELECT id, username, gmail FROM users WHERE username = ? OR gmail = ? LIMIT 1");
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika user tidak ditemukan
    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'Akun tidak ditemukan! Periksa email/username Anda.']);
        exit;
    }

    // Hash password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password di database
    $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    
    if ($updateStmt->execute([$hashedPassword, $user['id']])) {
        error_log("Password reset successful for user: {$user['username']}");
        echo json_encode([
            'success' => true,
            'message' => 'Password berhasil direset! Silakan login dengan password baru Anda.'
        ]);
    } else {
        throw new Exception("Failed to update password in database");
    }

} catch (PDOException $e) {
    error_log("Database error in forget password: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan database. Silakan coba lagi.'
    ]);
} catch (Exception $e) {
    error_log("Forget password error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
    ]);
}
?>