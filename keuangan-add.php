<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tambah Keuangan</title>
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
                    <h4 class="card-title">Form Keuangan</h4>
                    <p class="text-muted m-b-15 f-s-12"></p>
                    <div class="basic-form">
                        <form action="keuangan-list.php" method="POST">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis:</label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah:</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
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
