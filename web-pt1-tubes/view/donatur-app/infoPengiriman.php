<?php
  session_start();
  include "../../action/config.php";
  include '../../model/helper-public/functionPublic.php';
  include '../../model/helper-donatur-app/functionDonatur.php';

  //Seleksi data
  $id = $_GET['id'];
  $result = informasiPengiriman($conn, $id);

  //Memanggil Header
  $style = array("../../public/css/infoPengiriman.css", "../../public/css/infoPengiriman-responsive.css");
  $pavicon = "../../public/image/icon-b.png";
  headerHTML($pavicon, $style);  
?>

<style>
  @media print {
    header {
      display: none;
    }
    body {
      margin: -160px 10px;
    }
    body .main-grup {
      margin-top: 20px;
    }
    footer {
      display: none;
    }
    @page {
      size: A4;
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
              <img src="../../public/image/logo-boeboe.png" alt="logo-boeboe">
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
                      <img src="../../public/image/logo-boeboe.png" alt="logo-boeboe">
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
                                  <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
                                  <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
                          </ul>
                      </div>
                  </li>
              </ul>
          </div>
      </header>
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
      <p style="padding-top: 20px; color: #dc3545">Print atau catat informasi pengiriman di atas untuk di tempel pada paket pengiriman*</p>
    </div>
    <?php footerHTML(); ?>