<?php
// Include file koneksi database
include 'koneksi2.php';

// Query untuk mendapatkan jumlah barang
$queryBarang = "SELECT COUNT(*) AS total_barang FROM barang";
$result = mysqli_query($conn, $queryBarang);
$row = mysqli_fetch_assoc($result);
$total_barang = $row['total_barang'];

$queryPelanggan = "SELECT COUNT(*) AS total_pelanggan FROM pelanggan";
$result = mysqli_query($conn, $queryPelanggan);
$row = mysqli_fetch_assoc($result);
$total_pelanggan = $row['total_pelanggan'];

$queryKritikSaran = "SELECT COUNT(*) AS total_kritiksaran FROM kritiksaran";
$result = mysqli_query($conn, $queryKritikSaran);
$row = mysqli_fetch_assoc($result);
$total_kritiksaran = $row['total_kritiksaran'];

$queryUlasan = "SELECT COUNT(*) AS total_ulasan FROM ulasan";
$result = mysqli_query($conn, $queryUlasan);
$row = mysqli_fetch_assoc($result);
$total_ulasan = $row['total_ulasan'];

// Query to get all customers
$queryCustomers = "SELECT * FROM pelanggan";
$resultCustomers = mysqli_query($conn, $queryCustomers);

// Menutup koneksi
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>NOMINA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/jpg" sizes="16x16" href="">
    <!-- Pignose Calender -->
    <link href="./quixlab-master/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./quixlab-master/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./quixlab-master/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/css/style.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Container Fluid-->
                <div class="content-body">
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card gradient-1">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Jumlah Barang</h3>
                                        <div class="d-inline-block">
                                            <h2 class="text-white"><?php echo $total_barang; ?></h2>
                                        </div>
                                        <span class="float-right display-5 opacity-5"><i class="fa fa-cubes"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card gradient-2">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Jumlah Pelanggan</h3>
                                        <div class="d-inline-block">
                                            <h2 class="text-white"><?php echo $total_pelanggan; ?></h2>
                                        </div>
                                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card gradient-3">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Jumlah Kritik&Saran</h3>
                                        <div class="d-inline-block">
                                            <h2 class="text-white"><?php echo $total_kritiksaran; ?></h2>
                                        </div>
                                        <span class="float-right display-5 opacity-5"><i class="fa fa-comments"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card gradient-4">
                                    <div class="card-body">
                                        <h3 class="card-title text-white">Total Penjualan</h3>
                                        <div class="d-inline-block">
                                            <h2 class="text-white"><?php echo $total_pelanggan; ?></h2>
                                        </div>
                                        <span class="float-right display-5 opacity-5"><i class="icon-handbag menu-icon"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Data Table -->
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Data Pelanggan</h2>
                                        <div class="table-responsive">
                                            <table id="customerTable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID Pelanggan</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Telepon</th>
                                                        <th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($resultCustomers)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['id_Pelanggan'] . "</td>";
                                                        echo "<td>" . $row['nama'] . "</td>";
                                                        echo "<td>" . $row['email'] . "</td>";
                                                        echo "<td>" . $row['nohp'] . "</td>";
                                                        echo "<td>" . $row['alamat'] . "</td>";
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
                    <!-- #/ container -->
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <?php include 'footer.php'; ?>
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="./quixlab-master/plugins/common/common.min.js"></script>
    <script src="./quixlab-master/js/custom.min.js"></script>
    <script src="./quixlab-master/js/settings.js"></script>
    <script src="./quixlab-master/js/gleek.js"></script>
    <script src="./quixlab-master/js/styleSwitcher.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>

    <?php
    require 'sidebar.php';
    ?>
</body>
</html>
