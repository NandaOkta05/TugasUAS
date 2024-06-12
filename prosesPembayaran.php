<?php
header('Content-Type: application/json');

// Ambil data POST
$data = json_decode(file_get_contents('php://input'), true);

// Log data yang diterima
file_put_contents('log.txt', print_r($data, true), FILE_APPEND);

// Pastikan semua data yang diperlukan tersedia
if (!isset($data['totalBayar'])) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
    exit();
}

// Data pembayaran
$totalBayar = $data['totalBayar'];
// Ambil data tambahan dari $data jika ada

// Konfigurasi database
$host = 'localhost'; // Host database
$db = 'nomina'; // Nama database
$user = 'root'; // Username database
$pass = ''; // Password database

// Buat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal.']);
    exit();
}

// Siapkan pernyataan SQL untuk menyimpan data pembayaran
$stmt = $conn->prepare("INSERT INTO pembayaran (total_bayar, tanggal) VALUES (?, NOW())");

if ($stmt) {
    // Log nilai total bayar yang akan di-binding
    file_put_contents('log.txt', "Total Bayar: $totalBayar\n", FILE_APPEND);

    $stmt->bind_param('d', $totalBayar);

    // Eksekusi pernyataan
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Pembayaran berhasil.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data pembayaran.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Gagal menyiapkan pernyataan SQL.']);
}


$conn->close();
?>
