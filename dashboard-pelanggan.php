<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'topbar-pelanggan.php'; ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <h3>Selamat Datang di Nomina Kak <?php echo isset($_SESSION["user_nama"]) ? htmlspecialchars($_SESSION["user_nama"]) : 'Username'; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Pesanan</h4>
                        <div class="bootstrap-modal">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPenjualan">Pilih Barang</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalPenjualan">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pilih Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped" id="tabelBarang">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode Barang</th>
                                                                    <th>Nama Barang</th>
                                                                    <th>Harga</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Data barang akan dimuat melalui JavaScript -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Keranjang Belanja</h4>
                        <table class="table table-striped" id="tabelKeranjang">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Barang yang dipilih akan ditambahkan melalui JavaScript -->
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" id="btnBayar">Bayar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modalBayarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBayarLabel">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-group">
                        <div class="form-group">
                            <label for="namaPembeli">Nama Pembeli</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="totalBayar">Total Bayar</label>
                            <input type="text" class="form-control" id="totalBayar" readonly>
                        </div>
                        <!-- Tambahkan input tambahan untuk detail pembayaran lainnya (jika diperlukan) -->
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="submitPembayaran()">Bayar</button>
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

    <script>
        // Fungsi untuk memuat data barang dari server
        function loadDataBarang() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var dataBarang = JSON.parse(xhr.responseText);
                        displayDataBarang(dataBarang);
                    } else {
                        console.log("Terjadi kesalahan saat memuat data barang.");
                    }
                }
            };
            xhr.open("GET", "getDataBarang.php", true);
            xhr.send();
        }

        // Fungsi untuk menampilkan data barang pada tabel
        function displayDataBarang(dataBarang) {
            var tabelBarang = document.getElementById("tabelBarang");
            var tbody = tabelBarang.getElementsByTagName("tbody")[0];

            // Hapus semua baris dalam tabel
            tbody.innerHTML = "";

            // Tambahkan baris untuk setiap barang
            dataBarang.forEach(function(barang) {
                var row = document.createElement("tr");
                var kodeCell = document.createElement("td");
                var namaCell = document.createElement("td");
                var hargaCell = document.createElement("td");
                var jumlahCell = document.createElement("td");
                var aksiCell = document.createElement("td");
                var inputJumlah = document.createElement("input");
                var btnPilih = document.createElement("button");

                kodeCell.textContent = barang.kode_barang;
                namaCell.textContent = barang.nama_barang;
                hargaCell.textContent = "Rp " + barang.harga.toLocaleString();

                // Input jumlah barang
                inputJumlah.type = "number";
                inputJumlah.min = "1";
                inputJumlah.value = "1";
                inputJumlah.classList.add("form-control", "form-control-sm");

                btnPilih.textContent = "Pilih";
                btnPilih.classList.add("btn", "btn-primary", "btn-sm");

                // Gunakan closure untuk memastikan barang yang benar dipilih
                btnPilih.onclick = (function(barang, inputJumlah) {
                    return function() {
                        pilihBarang(barang, inputJumlah.value);
                    };
                })(barang, inputJumlah);

                jumlahCell.appendChild(inputJumlah);
                aksiCell.appendChild(btnPilih);
                row.appendChild(kodeCell);
                row.appendChild(namaCell);
                row.appendChild(hargaCell);
                row.appendChild(jumlahCell);
                row.appendChild(aksiCell);
                tbody.appendChild(row);
            });
        }

        // Fungsi untuk menambahkan barang ke keranjang belanja dengan jumlah yang ditentukan
        function pilihBarang(barang, jumlah) {
            var tabelKeranjang = document.getElementById("tabelKeranjang");
            var tbody = tabelKeranjang.getElementsByTagName("tbody")[0];

            var row = document.createElement("tr");
            var kodeCell = document.createElement("td");
            var namaCell = document.createElement("td");
            var hargaCell = document.createElement("td");
            var jumlahCell = document.createElement("td");
            var subtotalCell = document.createElement("td");
            var aksiCell = document.createElement("td");
            var btnHapus = document.createElement("button");

            kodeCell.textContent = barang.kode_barang;
            namaCell.textContent = barang.nama_barang;
            hargaCell.textContent = "Rp " + barang.harga.toLocaleString();
            jumlahCell.textContent = jumlah; // Jumlah yang dipilih
            var subtotal = barang.harga * jumlah;
            subtotalCell.textContent = "Rp " + subtotal.toLocaleString();
            btnHapus.textContent = "Hapus";
            btnHapus.classList.add("btn", "btn-danger", "btn-sm");
            btnHapus.onclick = function() {
                tbody.removeChild(row);
            };

            aksiCell.appendChild(btnHapus);
            row.appendChild(kodeCell);
            row.appendChild(namaCell);
            row.appendChild(hargaCell);
            row.appendChild(jumlahCell);
            row.appendChild(subtotalCell);
            row.appendChild(aksiCell);
            tbody.appendChild(row);
        }

        document.getElementById("btnBayar").onclick = function() {
            handleBayar();
        };

        function handleBayar() {
            var tabelKeranjang = document.getElementById("tabelKeranjang");
            var tbody = tabelKeranjang.getElementsByTagName("tbody")[0];
            var rows = tbody.getElementsByTagName("tr");

            var items = [];

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var item = {
                    kode_barang: cells[0].textContent,
                    nama_barang: cells[1].textContent,
                    harga: parseFloat(cells[2].textContent.replace("Rp ", "").replace(/\./g, "")),
                    jumlah: parseInt(cells[3].textContent),
                    subtotal: parseFloat(cells[4].textContent.replace("Rp ", "").replace(/\./g, ""))
                };
                items.push(item);
            }

            // Lakukan tindakan selanjutnya (misalnya, tampilkan form pembayaran atau kirim data ke server)
            console.log(items);
            tampilkanFormPembayaran(items);
        }

        function tampilkanFormPembayaran(items) {
            var totalBayar = items.reduce(function(total, item) {
                return total + item.subtotal;
            }, 0);

            document.getElementById("totalBayar").value = "Rp " + totalBayar.toLocaleString();
            $('#modalBayar').modal('show');
        }

        function submitPembayaran() {
    var formPembayaran = document.getElementById("formPembayaran");
    var totalBayar = document.getElementById("totalBayar").value;
    var namaPembeli = document.getElementById("nama").value;

    var dataPembayaran = {
        namaPembeli: namaPembeli,
        totalBayar: parseFloat(totalBayar.replace("Rp ", "").replace(/\./g, "").replace(",", "."))
        // Tambahkan data lain dari form
    };

    console.log("Data yang dikirim:", dataPembayaran);

    // Kirim data ke server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "prosesPembayaran.php", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Tampilkan pesan sukses atau alihkan ke halaman lain
                alert("Pembayaran berhasil!");
                location.reload();
            } else {
                console.log("Terjadi kesalahan saat memproses pembayaran.");
            }
        }
    };
    xhr.send(JSON.stringify(dataPembayaran));
}


        // Muat data barang saat halaman dimuat
        window.onload = function() {
            loadDataBarang();
        };
    </script>
        </div>
        </div>
        <!-- #/ container -->
    </div>
    <?php
    require 'sidebar-pelanggan.php';
    ?>
</body>

</html>

