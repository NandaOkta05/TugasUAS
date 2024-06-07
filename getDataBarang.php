<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nomina";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data barang dari tabel
$sql = "SELECT kode_barang, nama_barang, harga FROM barang";
$result = $conn->query($sql);

// Buat array untuk menyimpan data barang
$dataBarang = array();

if ($result->num_rows > 0) {
    // Ambil setiap baris data barang dan tambahkan ke array
    while ($row = $result->fetch_assoc()) {
        $dataBarang[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Kirim data barang dalam format JSON
header('Content-Type: application/json');

echo json_encode($dataBarang);
?>