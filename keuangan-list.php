<?php
// Include the file containing the database connection and functions
include 'keuangan.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_keuangan = $_GET['hapus'];
    if (hapusKeuangan($id_keuangan)) {
        echo "Data keuangan berhasil dihapus.";
    } else {
        echo "Gagal menghapus data keuangan.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    tambahKeuangan($tanggal, $keterangan, $jenis, $jumlah);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar Keuangan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/plugins/css/style.css" rel="stylesheet">
    <link href="./quixlab-master/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Data Keuangan</h4>
                            <!-- Add button for adding new financial records -->
                            <a href="keuangan-add.php" class="btn btn-primary mb-3">Tambah</a>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Jenis</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $keuangan = ambilKeuangan();
                                        foreach ($keuangan as $k) {
                                            echo "<tr>";
                                            echo "<td>" . $k['id_keuangan'] . "</td>";
                                            echo "<td>" . $k['tanggal'] . "</td>";
                                            echo "<td>" . $k['keterangan'] . "</td>";
                                            echo "<td>" . $k['jenis'] . "</td>";
                                            echo "<td>" . $k['jumlah'] . "</td>";
                                            echo "<td>";
                                            echo "<a href='keuangan-edit.php?id=" . $k['id_keuangan'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                            echo "<a href='keuangan-list.php?hapus=" . $k['id_keuangan'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data keuangan ini?\")'>Hapus</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./quixlab-master/plugins/common/common.min.js"></script>
    <script src="./quixlab-master/js/custom.min.js"></script>
    <script src="./quixlab-master/js/settings.js"></script>
    <script src="./quixlab-master/js/gleek.js"></script>
    <script src="./quixlab-master/js/styleSwitcher.js"></script>

    <script src="./quixlab-master/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <?php
    require 'sidebar.php';
    ?>
</body>
</html>