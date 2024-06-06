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

function ambilPelanggan() {
    global $pdo;
    $stmt = $pdo->query("SELECT id_Pelanggan, nama FROM pelanggan");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$pelanggan = ambilPelanggan();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Penjualan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/plugins/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Penjualan</h4>
                            <form action="penjualan-list.php" method="post">
                                <div class="form-group">
                                    <label for="id_pelanggan">ID Pelanggan:</label>
                                    <select class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                                        <?php foreach ($pelanggan as $p): ?>
                                            <option value="<?= $p['id_Pelanggan'] ?>"><?= $p['id_Pelanggan'] . ' - ' . $p['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama Pelanggan:</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_penjualan">Tanggal Penjualan:</label>
                                    <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" required>
                                </div>
                                <div class="form-group">
                                    <label for="kode_penjualan">Kode Penjualan:</label>
                                    <input type="text" class="form-control" id="kode_penjualan" name="kode_penjualan" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>

    <!--**********************************
    Scripts
    ***********************************-->
    <script src="./quixlab-master/plugins/common/common.min.js"></script>
    <script src="./quixlab-master/js/custom.min.js"></script>
    <script src="./quixlab-master/js/settings.js"></script>
    <script src="./quixlab-master/js/gleek.js"></script>
    <script src="./quixlab-master/js/styleSwitcher.js"></script>

    <?php
    require 'sidebar.php';
    ?>
</body>

</html>
