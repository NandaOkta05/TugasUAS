<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "nomina";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Fungsi untuk menambahkan data barang
function tambahBarang($nama_barang, $kode_barang, $harga, $stok) {
    global $koneksi;
    $nama_barang = mysqli_real_escape_string($koneksi, $nama_barang);
    $kode_barang = mysqli_real_escape_string($koneksi, $kode_barang);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $stok = mysqli_real_escape_string($koneksi, $stok);
    $query = "INSERT INTO barang (nama_barang, kode_barang, harga, stok) VALUES ('$nama_barang', '$kode_barang', '$harga', '$stok')";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk mengambil data barang
function ambilBarang() {
    global $koneksi;
    $query = "SELECT id_barang, nama_barang, kode_barang, harga, stok FROM barang";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fungsi untuk mengubah data barang
function ubahBarang($id_barang, $nama_barang, $kode_barang, $harga, $stok) {
    global $koneksi;
    $id_barang = mysqli_real_escape_string($koneksi, $id_barang);
    $nama_barang = mysqli_real_escape_string($koneksi, $nama_barang);
    $kode_barang = mysqli_real_escape_string($koneksi, $kode_barang);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $stok = mysqli_real_escape_string($koneksi, $stok);
    $query = "UPDATE barang SET nama_barang='$nama_barang', kode_barang='$kode_barang', harga='$harga', stok='$stok' WHERE id_barang=$id_barang";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus data barang
function hapusBarang($id_barang) {
    global $koneksi;
    $id_barang = mysqli_real_escape_string($koneksi, $id_barang);
    $query = "DELETE FROM barang WHERE id_barang=$id_barang";
    mysqli_query($koneksi, $query);
}

// Proses tambah data barang
if (isset($_POST['tambah_barang'])) {
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    tambahBarang($nama_barang, $kode_barang, $harga, $stok);
    header("Location: barang-list.php");
    exit();
}

// Proses ubah data barang
if (isset($_POST['ubah_barang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    ubahBarang($id_barang, $nama_barang, $kode_barang, $harga, $stok);
    header("Location: barang-list.php");
    exit();
}

// Proses hapus data barang
if (isset($_GET['hapus_barang'])) {
    $id_barang = $_GET['hapus_barang'];
    hapusBarang($id_barang);
    header("Location: barang-list.php");
    exit();
}
?>