<?php
// Include the file containing the database connection and functions
include 'pelanggan.php';

// Handle delete request
if (isset($_GET['hapus'])) {
    $id_pelanggan = $_GET['hapus'];
    if (hapusPelanggan($id_pelanggan)) {
        echo "Data keuangan berhasil dihapus.";
    } else {
        echo "Gagal menghapus data keuangan.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    tambahPelanggan($nama, $email, $nohp, $alamat, $jenis_kelamin);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Pelanggan</title>
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
                                <h4 class="card-title">List Data Pelanggan</h4>
                            <a href="pelanggan-add2.php" class="btn btn-primary mb-3">Tambah</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $pelanggan = ambilPelanggan();
                                            $counter = 1; // Variabel untuk nomor urut

                                            foreach ($pelanggan as $p) {
                                                echo "<tr>";
                                                echo "<td>" . $counter . "</td>"; // Menampilkan nomor urut
                                                echo "<td>" . $p['nama'] . "</td>";
                                                echo "<td>" . $p['email'] . "</td>";
                                                echo "<td>" . $p['nohp'] . "</td>";
                                                echo "<td>" . $p['alamat'] . "</td>";
                                                echo "<td>" . $p['jenis_kelamin'] . "</td>";
                                                echo "<td>";
                                                echo "<a href='pelanggan-edit2.php?id=" . $p['id_Pelanggan'] . "' class='btn btn-sm btn-warning'>Edit</a> ";
                                                echo "<a href='pelanggan-list3.php?hapus=" . $p['id_Pelanggan'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pelanggan ini?\")'>Hapus</a>";
                                                echo "</td>";
                                                echo "</tr>";
                                                $counter++; // Increment nomor urut
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