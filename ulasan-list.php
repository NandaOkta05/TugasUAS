<?php
// Include the file containing the database connection and functions
include 'ulasan.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_Ulasan = $_GET['hapus'];
    if (hapusUlasan($id_Ulasan)) {
        echo "Ulasan berhasil dihapus.";
    } else {
        echo "Gagal menghapus ulasan.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $nama_Produk = $_POST['nama_Produk'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];

    if (tambahUlasan($nama_Produk, $rating, $ulasan)) {
        echo "Ulasan berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan ulasan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Ulasan</title>
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
                                <h4 class="card-title">List Data Ulasan</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Nama Produk</th>
                                            <th>Rating</th>
                                            <th>Ulasan</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $ulasan = ambilUlasan();
                                    foreach ($ulasan as $u) {
                                        echo "<tr>";
                                        echo "<td>" . $u['id_Ulasan'] . "</td>";
                                        echo "<td>" . $u['nama_barang'] . "</td>";
                                        echo "<td>" . $u['rating'] . "</td>";
                                        echo "<td>" . $u['ulasan'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='ulasan-edit.php?id=" . $u['id_Ulasan'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                        echo "<a href='ulasan-list.php?hapus=" . $u['id_Ulasan'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ulasan ini?\")'>Hapus</a>";
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
