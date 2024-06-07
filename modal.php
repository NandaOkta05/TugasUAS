<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Penjualan Barang</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Penjualan Barang</h4>
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
                    <div class="modal-body">
                        <form id="formPembayaran">
                            <div class="form-group">
                                <label for="totalBayar">Total Bayar</label>
                                <input type="text" class="form-control" id="totalBayar" readonly>
                            </div>
                            <!-- Tambahkan input tambahan untuk detail pembayaran (misalnya, nama, metode pembayaran, dll) -->
                        </form>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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

        // function submitPembayaran() {
        //     var formPembayaran = document.getElementById("formPembayaran");
        //     var totalBayar = document.getElementById("totalBayar").value;

        //     // Ambil data lain dari form jika ada
        //     var dataPembayaran = {
        //         totalBayar: totalBayar,
        //         // Tambahkan data lain dari form
        //     };

        //     console.log(dataPembayaran);

        //     // Kirim data ke server
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "prosesPembayaran.php", true);
        //     xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === XMLHttpRequest.DONE) {
        //             if (xhr.status === 200) {
        //                 // Tampilkan pesan sukses atau alihkan ke halaman lain
        //                 alert("Pembayaran berhasil!");
        //                 location.reload();
        //             } else {
        //                 console.log("Terjadi kesalahan saat memproses pembayaran.");
        //             }
        //         }
        //     };
        //     xhr.send(JSON.stringify(dataPembayaran));
        // }

        function submitPembayaran() {
    var formPembayaran = document.getElementById("formPembayaran");
    var totalBayar = document.getElementById("totalBayar").value;

    // Ambil data lain dari form jika ada
    var dataPembayaran = {
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

    <?php
    include 'sidebar.php';
    ?>
</body>

</html>
