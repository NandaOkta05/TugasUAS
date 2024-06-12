<?php
session_start();

// Koneksi ke database (disesuaikan dengan konfigurasi Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pembayaran dari request POST
$dataPembayaran = json_decode(file_get_contents("php://input"));

// Data yang perlu disimpan ke tabel riwayat_pemesanan
$namaPembeli = $_SESSION["user_nama"];  // Ambil nama pengguna dari sesi
$totalBayar = $dataPembayaran->totalBayar;

// Query untuk menyimpan data ke tabel riwayat_pemesanan
$sql = "INSERT INTO riwayat_pemesanan (nama_pembeli, total_bayar) VALUES ('$namaPembeli', $totalBayar)";

if ($conn->query($sql) === TRUE) {
    // Jika penyimpanan berhasil, kirim respons OK (status 200)
    http_response_code(200);
    echo json_encode(array("message" => "Pembayaran berhasil!"));
} else {
    // Jika terjadi kesalahan, kirim respons error (status 500) dan pesan error
    http_response_code(500);
    echo json_encode(array("message" => "Gagal melakukan pembayaran: " . $conn->error));
}

$conn->close();
?>
