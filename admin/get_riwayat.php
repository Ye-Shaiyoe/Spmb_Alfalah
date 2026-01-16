<?php
// get_riwayat.php
require_once '../config/koneksi3.php';

header('Content-Type: application/json');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'ID Pembayaran tidak ditemukan'
    ]);
    exit;
}

$id_pembayaran = intval($_GET['id']);

try {
    // Query untuk mendapatkan data pembayaran utama
    $query_pembayaran = "SELECT 
        pb.jumlah_pembayaran,
        pb.status_pembayaran,
        pb.total_cicilan,
        pb.id_pendaftaran
    FROM pembayaran pb
    WHERE pb.id_pembayaran = ?";
    
    $stmt = mysqli_prepare($conn, $query_pembayaran);
    mysqli_stmt_bind_param($stmt, "i", $id_pembayaran);
    mysqli_stmt_execute($stmt);
    $result_pembayaran = mysqli_stmt_get_result($stmt);
    $pembayaran = mysqli_fetch_assoc($result_pembayaran);
    
    if (!$pembayaran) {
        echo json_encode([
            'success' => false,
            'message' => 'Data pembayaran tidak ditemukan'
        ]);
        exit;
    }
    
    // Query untuk mendapatkan riwayat pembayaran
    $query_riwayat = "SELECT 
        rp.id_riwayat,
        rp.tanggal_bayar,
        rp.jumlah_bayar,
        rp.bukti_bayar,
        rp.catatan,
        DATE_FORMAT(rp.created_at, '%d/%m/%Y %H:%i') as created_at
    FROM riwayat_pembayaran rp
    WHERE rp.id_pembayaran = ?
    ORDER BY rp.tanggal_bayar ASC";
    
    $stmt_riwayat = mysqli_prepare($conn, $query_riwayat);
    mysqli_stmt_bind_param($stmt_riwayat, "i", $id_pembayaran);
    mysqli_stmt_execute($stmt_riwayat);
    $result_riwayat = mysqli_stmt_get_result($stmt_riwayat);
    
    $riwayat = [];
    while ($row = mysqli_fetch_assoc($result_riwayat)) {
        $riwayat[] = [
            'id_riwayat' => $row['id_riwayat'],
            'tanggal_bayar' => date('d/m/Y', strtotime($row['tanggal_bayar'])),
            'jumlah_bayar' => $row['jumlah_bayar'],
            'jumlah_bayar_format' => 'Rp ' . number_format($row['jumlah_bayar'], 0, ',', '.'),
            'bukti_bayar' => $row['bukti_bayar'] ?? 'img/no-image.png',
            'catatan' => $row['catatan'] ?? '-',
            'created_at' => $row['created_at']
        ];
    }
    
    // Response JSON
    echo json_encode([
        'success' => true,
        'riwayat' => $riwayat,
        'total_bayar' => $pembayaran['jumlah_pembayaran'],
        'total_bayar_format' => 'Rp ' . number_format($pembayaran['jumlah_pembayaran'], 0, ',', '.'),
        'total_cicilan' => $pembayaran['total_cicilan'] ?? count($riwayat),
        'status' => $pembayaran['status_pembayaran']
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    ]);
}

mysqli_close($conn);
?>