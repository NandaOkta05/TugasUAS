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

// Proses registrasi jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$address = $_POST['address'];
$gender = $_POST['gender'];

    // Query untuk memeriksa apakah email sudah terdaftar
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $check_email_result = $conn->query($check_email_query);

    if ($check_email_result->num_rows > 0) {
        // Email sudah terdaftar, redirect kembali ke halaman registrasi dengan pesan error
        header("Location: register.php?error=Email sudah terdaftar");
        exit();
    } else {
        // Email belum terdaftar, lakukan proses registrasi
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menambahkan pengguna baru ke database
        $register_query = "INSERT INTO users (nama, email, password, level, nohp, address, gender) VALUES ('$nama','$email', '$hashed_password', 'customer','$nohp','$address', '$gender')";
        if ($conn->query($register_query) === TRUE) {
            // Registrasi berhasil, simpan informasi pengguna dalam sesi
            $user_id = $conn->insert_id;
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_nama"] = $nama;
            $_SESSION["user_email"] = $email;
            $_SESSION["user_level"] = "customer";
            $_SESSION["user_nohp"] = "$nohp";
            $_SESSION["user_address"] = $address;
            $_SESSION["user_gender"] = $gender;

            // Redirect ke halaman dashboard pelanggan
            header("Location: dashboard-pelanggan.php");
            exit();
        } else {
            // Jika terjadi kesalahan saat menambahkan data
            echo "Error: " . $register_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
