<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "nomina";

$koneksi = mysqli_connect($host, $user, $password, $database);

// Fungsi untuk menambahkan data keuangan
function tambahKeuangan($tanggal, $keterangan, $jenis, $jumlah) {
    global $koneksi;
    $tanggal = mysqli_real_escape_string($koneksi, $tanggal);
    $keterangan = mysqli_real_escape_string($koneksi, $keterangan);
    $jenis = mysqli_real_escape_string($koneksi, $jenis);
    $jumlah = mysqli_real_escape_string($koneksi, $jumlah);
    $query = "INSERT INTO keuangan (tanggal, keterangan, jenis, jumlah) VALUES ('$tanggal', '$keterangan', '$jenis', '$jumlah')";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk mengambil data keuangan
function ambilKeuangan() {
    global $koneksi;
    $query = "SELECT id_keuangan, tanggal, keterangan, jenis, jumlah FROM keuangan";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fungsi untuk mengubah data keuangan
function ubahKeuangan($id_keuangan, $tanggal, $keterangan, $jenis, $jumlah) {
    global $koneksi;
    $id_keuangan = mysqli_real_escape_string($koneksi, $id_keuangan);
    $tanggal = mysqli_real_escape_string($koneksi, $tanggal);
    $keterangan = mysqli_real_escape_string($koneksi, $keterangan);
    $jenis = mysqli_real_escape_string($koneksi, $jenis);
    $jumlah = mysqli_real_escape_string($koneksi, $jumlah);
    $query = "UPDATE keuangan SET tanggal='$tanggal', keterangan='$keterangan', jenis='$jenis', jumlah='$jumlah' WHERE id_keuangan=$id_keuangan";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus data keuangan
function hapusKeuangan($id_keuangan) {
    global $koneksi;
    $id_keuangan = mysqli_real_escape_string($koneksi, $id_keuangan);
    $query = "DELETE FROM keuangan WHERE id_keuangan=$id_keuangan";
    mysqli_query($koneksi, $query);
}

// Proses tambah data keuangan
if (isset($_POST['tambah_keuangan'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    tambahKeuangan($tanggal, $keterangan, $jenis, $jumlah);
    header("Location: keuangan-list.php");
    exit();
}

// Proses ubah data keuangan
if (isset($_POST['ubah_keuangan'])) {
    $id_keuangan = $_POST['id_keuangan'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    ubahKeuangan($id_keuangan, $tanggal, $keterangan, $jenis, $jumlah);
    header("Location: keuangan-list.php");
    exit();
}

// Proses hapus data keuangan
if (isset($_GET['hapus_keuangan'])) {
    $id_keuangan = $_GET['hapus_keuangan'];
    hapusKeuangan($id_keuangan);
    header("Location: keuangan-list.php");
    exit();
}
?>