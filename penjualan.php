<?php
// Database connection
$host = 'localhost';
$db = 'nomina';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

function ambilPenjualan() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM penjualan");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function pelangganExists($id_pelanggan) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM pelanggan WHERE id_Pelanggan = ?");
    $stmt->execute([$id_pelanggan]);
    return $stmt->fetchColumn() > 0;
}

function tambahPenjualan($id_pelanggan, $nama_pelanggan, $tanggal_penjualan, $kode_penjualan) {
    global $pdo;
    if (!pelangganExists($id_pelanggan)) {
        echo "Error: id_pelanggan does not exist.";
        return false;
    }
    $stmt = $pdo->prepare("INSERT INTO penjualan (id_pelanggan, nama_pelanggan, tanggal_penjualan, kode_penjualan) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$id_pelanggan, $nama_pelanggan, $tanggal_penjualan, $kode_penjualan]);
}

function hapusPenjualan($id_penjualan) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM penjualan WHERE id_penjualan = ?");
    return $stmt->execute([$id_penjualan]);
}
?>
