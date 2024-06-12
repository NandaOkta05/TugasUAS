<?php
// Konfigurasi database
$host = 'localhost'; // Host database
$db = 'nomina'; // Nama database
$user = 'root'; // Username database
$pass = ''; // Password database

// Buat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil data pembayaran dari tabel pembayaran
$sql = "SELECT  total_bayar, tanggal, nama FROM pembayaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Pembayaran</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="./quixlab-master/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rekap Pembayaran</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total Bayar</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $counter = 1; // Variabel untuk nomor urutan
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $counter . "</td>"; // Menampilkan nomor urutan
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>Rp " . number_format($row['total_bayar'], 2, ',', '.') . "</td>";
                                        echo "<td>" . $row['tanggal'] . "</td>";
                                        echo "</tr>";
                                        $counter++; // Increment nomor urutan
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Tidak ada data pembayaran</td></tr>";
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

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="./quixlab-master/plugins/common/common.min.js"></script>
    <script src="./quixlab-master/js/custom.min.js"></script>
    <script src="./quixlab-master/js/settings.js"></script>
    <script src="./quixlab-master/js/gleek.js"></script>
    <script src="./quixlab-master/js/styleSwitcher.js"></script>
    <script src="./quixlab-master/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./quixlab-master/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

    <script src="./quixlab-master/js/dashboard/dashboard-1.js"></script>

    <?php
    include 'sidebar.php';
    ?>
</body>

</html>

<?php
$conn->close();
?>
