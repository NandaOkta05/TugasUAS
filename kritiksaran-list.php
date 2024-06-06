<?php
// Include the file containing the database connection and functions
include 'kritiksaran.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_KritikSaran = $_GET['hapus'];
    if (hapusKritikSaran($id_KritikSaran)) {
        echo "Kritik dan saran berhasil dihapus.";
    } else {
        echo "Gagal menghapus kritik dan saran.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $pelayanan = $_POST['pelayanan'];
    $tempat = $_POST['tempat'];
    $saran = $_POST['saran'];

    tambahKritikSaran($pelayanan, $tempat, $saran);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kritik dan Saran</title>
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
                                <h4 class="card-title">List Kritik dan Saran</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Pelayanan</th>
                                            <th>Tempat</th>
                                            <th>Saran</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $kritiksaran = ambilKritikSaran();
                                    foreach ($kritiksaran as $ks) {
                                        echo "<tr>";
                                        echo "<td>" . $ks['id_KritikSaran'] . "</td>";
                                        echo "<td>" . $ks['pelayanan'] . "</td>";
                                        echo "<td>" . $ks['tempat'] . "</td>";
                                        echo "<td>" . $ks['saran'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='kritiksaran-edit.php?id=" . $ks['id_KritikSaran'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                        echo "<a href='kritiksaran-list.php?hapus=" . $ks['id_KritikSaran'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kritik dan saran ini?\")'>Hapus</a>";
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
