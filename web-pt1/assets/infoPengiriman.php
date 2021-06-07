<?php
  session_start();
  if(!isset($_SESSION['id_loginDonatur'])) {
    header("Location: ../index.php");
    exit();
  }
  include "../action/config.php";
?>
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
  <?php include "../css/infoPengiriman.css" ?>
  <?php include "../css/infoPengiriman-responsive.css" ?>

  @media print {
    footer {
      display: none;
    }
  }
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
                    <li><a href="berandaDonatur.php">Beranda</a></li>
                    <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
                    <li><a href="donasi.php">Donasi</a></li>
                    <li><a href="perpustakaan.php">Perpustakaan</a></li>
                    <li>
                    <div class="dropdown">
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                                <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
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
                        <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                                <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                                <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <?php
      $id = $_GET['id'];
      $query = "SELECT `donasi_detail`.`id_detail`, `donasi_detail`.`nama_penerima`, `donasi_detail`.`nama_perpustakaan`, `donasi_detail`.`noTelepon_penerima`, `donasi_detail`.`alamat_penerima`, `donasi_buku`.`id_loginDonatur`, `donasi_buku`.`jumlah_buku`, `donasi_buku`.`judul_buku`, `donasi_buku`.`nama_penulis`, `donasi_buku`.`nama_penerbit`, `donasi_buku`.`kategori_buku`, `donasi_buku`.`tahun_terbit`
      FROM `donasi_detail`
      JOIN `donasi_buku` ON `donasi_buku`.`id_loginDonatur` = `donasi_detail`.`id_loginDonatur`
      WHERE `donasi_detail`.`id_detail` = '$id' ";
      $result = mysqli_query($conn, $query);
      $result = mysqli_fetch_assoc($result);
    ?>
  <div class="main">
    <h1>Informasi Pengiriman</h1>
    <h5>No Donasi. <?php echo $result['id_detail']; ?></h5>
    <div class="main-content">
      <div class="main-group">
        <p>Nama Perpustakaan</p>
        <h5><?php echo $result['nama_perpustakaan']; ?></h5>
        <p>Nama Penerima</p>
        <h5><?php echo $result['nama_penerima']; ?></h5>
        <p>No Telepon Penerima</p>
        <h5><?php echo $result['noTelepon_penerima']; ?></h5>
        <p>Alamat Penerima</p>
        <h5><?php echo $result['alamat_penerima']; ?></h5>
        </div>
      <div class="main-group">
        <h5 class="detail-buku">Detail Buku</h5>
        <p>Jumlah Buku      : <?php echo $result['jumlah_buku']; ?></p>
        <p>Judul Buku       : <?php echo $result['judul_buku']; ?></p>
        <p>Kategori Buku    : <?php echo $result['kategori_buku']; ?></p>
        <p>Nama Penulis     : <?php echo $result['nama_penulis']; ?></p>
        <p>Nama Penerbit    : <?php echo $result['nama_penerbit']; ?></p>
        <p>Tahun Terbit     : <?php echo $result['tahun_terbit']; ?></p>
      </div>
    </div>
    <div class="button-center">
      <button class="btn btn-primary col-12" id="btnprint" onclick="print_page()">Print Alamat</button>
    </div>
    <div style="border-bottom: 1px solid #bbe1fa; padding-top: 20px"></div>
    <p style="padding-top: 20px; color: #dc3545">Print / catat informasi pengiriman di atas untuk di tempel pada paket pengiriman</p>
  </div>
  <footer>
    <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
    <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
  </footer>
</body>

</html>
