<?php
// Include the file containing the database connection and functions
include 'penjualan.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_penjualan = $_GET['hapus'];
    if (hapusPenjualan($id_penjualan)) {
        echo "Penjualan berhasil dihapus.";
    } else {
        echo "Gagal menghapus penjualan.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $tanggal_penjualan = $_POST['tanggal_penjualan'];
    $kode_penjualan = $_POST['kode_penjualan'];

    if (tambahPenjualan($id_pelanggan, $nama_pelanggan, $tanggal_penjualan, $kode_penjualan)) {
        echo "Penjualan berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan penjualan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Penjualan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="./quixlab-master/plugins/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="content-body">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">List Data Penjualan</h4>
                                <a href="penjualan-add.php" class="btn btn-primary mb-3">Tambah</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Kode Penjualan</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $penjualan = ambilPenjualan();
                                    foreach ($penjualan as $p) {
                                        echo "<tr>";
                                        echo "<td>" . $p['id_penjualan'] . "</td>";
                                        echo "<td>" . $p['id_pelanggan'] . "</td>";
                                        echo "<td>" . $p['nama_pelanggan'] . "</td>";
                                        echo "<td>" . $p['tanggal_penjualan'] . "</td>";
                                        echo "<td>" . $p['kode_penjualan'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='penjualan-edit.php?id=" . $p['id_penjualan'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                        echo "<a href='penjualan-list.php?hapus=" . $p['id_penjualan'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus penjualan ini?\")'>Hapus</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
    </div>

 <!--**********************************
Content body end
***********************************-->
<!--**********************************
        Scripts
    ***********************************-->
    <script src="./quixlab-master/plugins/common/common.min.js"></script>
    <script src="./quixlab-master/js/custom.min.js"></script>
    <script src="./quixlab-master/js/settings.js"></script>
    <script src="./quixlab-master/js/gleek.js"></script>
    <script src="./quixlab-master/js/styleSwitcher.js"></script>

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="./quixlab-master/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="./quixlab-master/js/dashboard/dashboard-1.js"></script>
    <?php
    require 'sidebar.php';
    ?>
    
</body>
</html>
