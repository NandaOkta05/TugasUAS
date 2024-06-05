<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Barang</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/css/style.css" rel="stylesheet">
</head>
<body>
<div class="content-body">
    <div class="row"></div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Barang</h4>
                <p class="text-muted m-b-15 f-s-12"></p>
                <div class="basic-form">
                    <form action="barang-list.php" method="POST">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang:</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <button type="submit" name="tambah_barang" class="btn btn-primary">Simpan</button>
                        <a href="barang-list.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
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

<!-- Chartjs -->
<script src="./quixlab-master/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="./quixlab-master/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="./quixlab-master/plugins/d3v3/index.js"></script>
<script src="./quixlab-master/plugins/topojson/topojson.min.js"></script>
<script src="./quixlab-master/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="./quixlab-master/plugins/raphael/raphael.min.js"></script>
<script src="./quixlab-master/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="./quixlab-master/plugins/moment/moment.min.js"></script>
<script src="./quixlab-master/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="./quixlab-master/plugins/chartist/js/chartist.min.js"></script>
<script src="./quixlab-master/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
<script src="./quixlab-master/js/dashboard/dashboard-1.js"></script>
<?php
require 'sidebar.php';
?>
</body>
</html>