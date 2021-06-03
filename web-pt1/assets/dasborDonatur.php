<?php
    session_start();
    if(!isset($_SESSION['id_loginDonatur'])) {
      header("Location: ../index.php");
      exit();
    }
    require "../action/config.php";
    $id = $_SESSION['id_loginDonatur']
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dasbor Donatur</title>
  <link rel="icon" href="../image/icon-b.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
  <?php include "../css/dasborDonatur.css" ?>
  <?php include "../css/dasborDonatur-responsive.css" ?>
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
          <li>
          <div class="dropdown">
                  <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                  <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                  <li><a class="dropdown-item" href="../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
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
              <li><a class="dropdown-item" href="../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>

  <?php
    $email_donatur = $_SESSION['email_donatur'];
    
    $query = "SELECT * FROM `donatur_daftar` JOIN `donatur_alamat` ON id_alamatDonatur = id_alamatDonaturAktif 
    WHERE email_donatur = '$email_donatur' ";
    
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);
  ?>

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
          <p><?php echo $result['tglLahir_donatur']; ?></p>
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
  <footer>
        <p>Copyright &#169 2021 BoeBoe - Web Donasi Buku Bekas</p>
        <p>Made by OTAKU</p>
  </footer>
</body>

</html>