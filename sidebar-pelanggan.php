<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOMINA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/jpg" sizes="16x16" href="./img/man.png">
    <!-- Pignose Calendar -->
    <link href="./quixlab-master/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./quixlab-master/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./quixlab-master/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="./quixlab-master/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener untuk setiap tautan yang memiliki kelas "has-arrow"
            $('.has-arrow').click(function(event) {
                // Hentikan tindakan bawaan dari tautan
                event.preventDefault();

                // Ubah atribut aria-expanded dari submenu yang terkait
                $(this).attr('aria-expanded', function (index, attr) {
                    return attr === 'true' ? 'false' : 'true';
                });

                // Tampilkan atau sembunyikan submenu yang terkait
                $(this).next('ul').toggle();
                
                // Ubah ikon panah menjadi naik atau turun sesuai dengan status submenu
                $(this).find('i').toggleClass('icon-chevron-down icon-chevron-up');
            });
        });
    </script>
</head>
<body>
<div class="nav-header">
    <div class="brand-logo">
        <a href="index.html">
            <b class="logo-abbr"><img src="./quixlab-master/images/logo.png" alt=""> </b>
            <span class="logo-compact"><img src="./quixlab-master/images/logo-compact.png" alt=""></span>
            <span class="brand-title">
                <img src="" alt="">
            </span>
        </a>
    </div>
</div>
<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="dashboard-pelanggan.php">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Menu</li>
            <li>
                <a href="./riwayat-pemesanan-pelanggan.php">
                    <i class="icon-wallet menu-icon"></i><span class="nav-text">Riwayat Pemesanan</span>
                </a>  
            </li>
            <li>
                <a class="has-arrow" href="#">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Profil</span>
                </a>
                <ul>
                    <li><a href="./profil.php">Profil</a></li>
                    <li><a href="./poin.php">Poin Reward</a></li>
                    <li><a href="./penawaran.php">Penawaran</a></li>
                </ul>
            </li>
            <li>
                <a href="./logout.php">
                    <i class="icon-logout"></i><span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
