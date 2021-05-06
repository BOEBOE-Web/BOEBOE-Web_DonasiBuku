<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Donasi</title>
    <link rel="icon" href="../image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
    <?php include "../css/riwayat.css" ?><?php include "../css/riwayat-responsive.css" ?>
</style>

<body>
    <header>
        <div class="header">
            <img src="../image/logo-boeboe.png" alt="logo-boeboe">
        </div>
        <nav class="burgermenu">
            <input id="burger" type="checkbox" />
            <label for="burger">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <nav>
                <div class="header">
                    <img src="../image/logo-boeboe.png" alt="logo-boeboe">
                </div>
                <ul style="padding: 0px !important;">
                    <li><a href="berandaDonatur.php">Beranda</a></li>
                    <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
                    <li><a href="donasi.php">Donasi</a></li>
                    <li><a href="perpustakaan.php">Perpustakaan</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="perpustakaan.php">Perpustakaan</a></li>
                <li>
                    <div class="dropdown">
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="riwayat-content">
        <h1>Riwayat Donasi</h1>
        <div class="grup">
            <h5>No Donasi : BOEBOE202104140001</h5>
            <p>Status : Donasi Telah Diterima</p>
            <p class="hover"><a href="infoPengiriman.php">Detail Informasi Pengiriman</a></p>
            <p><i>14 April 2021</i></p>
        </div>
        <div class="grup">
            <h5>No Donasi : BOEBOE202105040001</h5>
            <p>Status : Donasi Belum Lengkap</p>
            <p class="hover"><a href="#">Detail Informasi Pengiriman</a></p>
            <p><i>24 April 2021</i></p>
        </div>
        <div class="grup">
            <h5>No Donasi : BOEBOE202105040001</h5>
            <p>Status : Donasi Belum Lengkap</p>
            <p class="hover"><a href="#">Detail Informasi Pengiriman</a></p>
            <p><i>04 Mei 2021</i></p>
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
</body>

</html>