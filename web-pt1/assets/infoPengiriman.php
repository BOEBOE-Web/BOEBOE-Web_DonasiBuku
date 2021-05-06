<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BoeBoe - Web Donasi Buku Bekas</title>
  <link rel="icon" href="../image/icon-b.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
  <?php include "../css/infoPengiriman.css" ?><?php include "../css/infoPengiriman-responsive.css" ?>
</style>

<script type="text/javascript">
    function print_page() {
        var ButtonControl = document.getElementById("btnprint");
        ButtonControl.style.visibility = "hidden";
        alert('Silahkan ditempelkan pada paket anda, Terimakasih.. !');
        window.print();
    }
  </script>

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
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="donasi.php">Donasi</a></li>
                    <li><a href="perpustakaan.php">Perpustakaan</a></li>
                    <li>
                    <div class="dropdown">
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                                <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                                <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#tentang-kami">Tentang Kami</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="perpustakaan.php">Perpustakaan</a></li>
                <li>
                <div class="dropdown">
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
  <div class="main">
    <h1>Informasi Pengiriman</h1>
    <h5>No Donasi. BOEBOE202104140001</h5>
    <div class="main-content">
      <p>Nama Perpustakaan</p>
      <h5>Perpustakaan Retro</h5>
      <p>Nama Penerima</p>
      <h5>Nona</h5>
      <p>No Telepon Penerima</p>
      <h5>081234567890</h5>
      <p>Alamat Penerima</p>
      <h5>Jln. Trans Sulawesi, RT 01, RW 01, Kelurahan Panau, Kecamatan Tawaeli, Kota Palu, Provinsi Sulawesi Tengah</h5>
      <button class="btn btn-primary col-3" id="btnprint" onclick="print_page()">Print Alamat</button>
    </div>
    <div style="border-bottom: 1px solid #bbe1fa; padding-top: 20px"></div>
    <p style="padding-top: 20px; color: #dc3545">Print / catat informasi pengiriman di atas untuk di tempel pada paket pengiriman</p>
  </div>
  <footer>
    <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
    <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
  </footer>
</body>

</html>