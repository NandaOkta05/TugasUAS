<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "nomina";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Fungsi untuk menambahkan data pelanggan
function tambahPelanggan($nama, $email, $nohp, $alamat, $jenis_kelamin) {
    global $koneksi;
    $query = "INSERT INTO pelanggan (nama, email, nohp, alamat, jenis_kelamin) VALUES ('$nama', '$email', '$nohp', '$alamat', '$jenis_kelamin')";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk mengambil data pelanggan
function ambilPelanggan() {
    global $koneksi;
    $query = "SELECT id_Pelanggan, nama, email, nohp, alamat, jenis_kelamin FROM pelanggan";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fungsi untuk mengubah data pelanggan
function ubahPelanggan($id_Pelanggan, $nama, $email, $nohp, $alamat, $jenis_kelamin) {
    global $koneksi;
    $query = "UPDATE pelanggan SET nama='$nama', email='$email', nohp='$nohp', alamat='$alamat', jenis_kelamin='$jenis_kelamin' WHERE id_Pelanggan=$id_Pelanggan";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus data pelanggan
function hapusPelanggan($id_Pelanggan) {
    global $koneksi;
    $query = "DELETE FROM pelanggan WHERE id_Pelanggan=$id_Pelanggan";
    mysqli_query($koneksi, $query);
}

// Proses tambah data pelanggan
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    tambahPelanggan($nama, $email, $nohp, $alamat, $jenis_kelamin);
    header("Location: pelanggan-list3.php");
    exit();
}

// Proses ubah data pelanggan
if (isset($_POST['ubah'])) {
    $id_Pelanggan = $_POST['id_Pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    ubahPelanggan($id_Pelanggan, $nama, $email, $nohp, $alamat, $jenis_kelamin);
    header("Location: pelanggan-list3.php");
    exit();
}

// Proses hapus data pelanggan
if (isset($_GET['hapus'])) {
    $id_Pelanggan = $_GET['hapus'];
    hapusPelanggan($id_Pelanggan);
    header("Location: pelanggan-list3.php");
    exit();
}
?>