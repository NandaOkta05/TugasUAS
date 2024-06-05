<?php
// Include the database connection file
include 'pelanggan.php';

// Check if the id parameter is set in the URL
if (isset($_GET['id'])) {
    $id_Pelanggan = $_GET['id'];

    // Prepare and execute the query to fetch the pelanggan data based on id
    $query = "SELECT * FROM pelanggan WHERE id_Pelanggan=$id_Pelanggan";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful and fetch the data
    if ($result && mysqli_num_rows($result) > 0) {
        $pelanggan = mysqli_fetch_assoc($result);
    } else {
        echo "Data pelanggan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID pelanggan tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Pelanggan</title>
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
                    <h4 class="card-title">Form Edit Pelanggan</h4>
                    <p class="text-muted m-b-15 f-s-12"></p>
                    <div class="basic-form">
                        <form action="pelanggan-list3.php" method="POST">
                            <input type="hidden" name="id_Pelanggan" value="<?php echo $pelanggan['id_Pelanggan']; ?>">

                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $pelanggan['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $pelanggan['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nohp">No. HP:</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $pelanggan['nohp']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" required><?php echo $pelanggan['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" <?php if ($pelanggan['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($pelanggan['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                                </select>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                            <a href="pelanggan-list3.php" class="btn btn-secondary">Kembali</a>
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

    <?php require 'sidebar.php'; ?>
</body>
</html>
