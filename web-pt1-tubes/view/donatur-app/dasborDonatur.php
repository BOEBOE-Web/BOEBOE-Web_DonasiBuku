<?php
    session_start();
    require '../../action/config.php';
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-donatur-app/functionDonatur.php';
    
    // Seleksi Data Yang Dibutuhkan
    $email_donatur = $_SESSION['email_donatur'];
    $result = profileDonatur($conn, $email_donatur);

    //Memanggil Header
    $style = array("../../public/css/dasborDonatur.css", "../../public/css/dasborDonatur-responsive.css");
    $pavicon = "../../public/image/icon-b.png";
    headerHTML($pavicon, $style);  
?>
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
                  <li><a class="dropdown-item" href="../../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
                  </ul>
              </div>
          </li>
        </ul>
      </nav>
    </nav>
    <div class="navi">
      <ul>
        <li><a href="berandaDonatur.php">Beranda</a></li>
        <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
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
              <li><a class="dropdown-item" href="../../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <div class="dasbor-content">
    <h1>Dasbor Donatur</h1>
    <div class="content">
      <div class="display-one">
        <div>
          <h5>Nama</h5>
          <p> <?php echo $result['nama_donatur']; ?> </p>
        </div>
        <div>
          <h5>Instansi</h5>
          <p> <?php echo $result['instansi_donatur']; ?> </p>
        </div>
        <div>
          <h5>Alamat</h5>
          <p><?php echo $result['alamat']; ?></p>
        </div>
        <div>
          <a href="ubahProfileDonatur.php?id=<?php echo $result['id_donatur']; ?>" class="btn btn-primary col-4">Ubah Profile</a>
        </div>
      </div>
      <div class="display-two">
        <div>
          <h5>Tanggal Lahir</h5>
          <p><?php echo konversiDate($result['tglLahir_donatur'], $d = false);  ?></p>
        </div>
        <div>
          <h5>No. Telepon</h5>
          <p><?php echo $result['noTelepon_donatur']; ?></p>
        </div>
        <div>
          <h5>Email</h5>
          <p><?php echo $result['email_donatur']; ?></p>
        </div>
        <div>
          <h5>Kode POS</h5>
          <p><?php echo $result['kodePos']; ?></p>
        </div>
        <div>
          <a href="ubahProfileDonatur.php?id=<?php echo $result['id_donatur']; ?>" class="btn btn-responsive col-4">Ubah Profile</a>
        </div>
      </div>
    </div>
  </div>
  <?php footerHTML(); ?>