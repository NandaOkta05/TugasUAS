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

function ambilKritikSaran() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM kritiksaran");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function tambahKritikSaran($pelayanan, $tempat, $saran) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO kritiksaran (pelayanan, tempat, saran) VALUES (?, ?, ?)");
    return $stmt->execute([$pelayanan, $tempat, $saran]);
}

function hapusKritikSaran($id_KritikSaran) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM kritiksaran WHERE id_KritikSaran = ?");
    return $stmt->execute([$id_KritikSaran]);
}
?>
