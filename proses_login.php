<?php
session_start();

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

// Proses login jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query untuk memeriksa keberadaan pengguna dengan email dan password yang sesuai
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login berhasil, simpan informasi pengguna dalam sesi
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id_users"];
        $_SESSION["user_nama"] = $row["nama"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["user_level"] = $row["level"];
        $_SESSION["user_nohp"] = $row["nohp"];
        $_SESSION["user_address"] = $row["address"];
        $_SESSION["user_gender"] = $row["gender"];

        // Redirect berdasarkan level pengguna
        if ($row["level"] == "admin") {
            header("Location: dashboard.php");
        } else {
            header("Location: dashboard-pelanggan.php");
        }
        exit();
    } else {
        // Login gagal, redirect kembali ke halaman login dengan pesan error
        header("Location: login.php?error=1");
        exit();
    }
}

$conn->close();
?>
