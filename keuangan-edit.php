<?php
// Include the file containing the database connection and functions
include 'keuangan.php';

// Retrieve the financial record based on the ID passed in the URL
if (isset($_GET['id'])) {
    $id_keuangan = $_GET['id'];

    // Prepare and execute the query to fetch the keuangan data based on id
    $query = "SELECT * FROM keuangan WHERE id_keuangan = $id_keuangan";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful and fetch the data
    if ($result && mysqli_num_rows($result) > 0) {
        $keuangan = mysqli_fetch_assoc($result);
    } else {
        echo "Data keuangan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID keuangan tidak diberikan.";
    exit;
}

// Handle form submission for updating the financial record
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id_keuangan = $_POST['id_keuangan'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    ubahKeuangan($id_keuangan, $tanggal, $keterangan, $jenis, $jumlah);
    header("Location: keuangan-list.php");
    exit;
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Keuangan</title>
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
                    <h4 class="card-title">Edit Keuangan</h4>
                    <p class="text-muted m-b-15 f-s-12"></p>
                    <div class="basic-form">
                        <form action="keuangan-edit.php" method="POST">
                            <input type="hidden" name="id_keuangan" value="<?php echo $keuangan['id_keuangan']; ?>">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $keuangan['tanggal']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $keuangan['keterangan']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Pemasukan" <?php echo ($keuangan['jenis'] == 'Pemasukan') ? 'selected' : ''; ?>>Pemasukan</option>
                                    <option value="Pengeluaran" <?php echo ($keuangan['jenis'] == 'Pengeluaran') ? 'selected' : ''; ?>>Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $keuangan['jumlah']; ?>" required>
                            </div>
                            <button type="submit" name="ubah_keuangan" class="btn btn-primary">Update</button>
                            <a href="keuangan-list.php" class="btn btn-secondary">Kembali</a>
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

    <?php require 'sidebar.php'; ?>
</body>
</html>