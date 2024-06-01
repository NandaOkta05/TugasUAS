<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_nomina";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
?>
