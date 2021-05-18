<?php
  session_start();
  require "../action/config.php";

  $id = $_GET['id'];
  $query = "SELECT * FROM `donatur_daftar` JOIN `donatur_alamat` ON id_donatur = '$id' ";
  $result = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($result);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />
</head>

<style>
  <?php include "../css/ubahProfile.css"?>
  <?php include "../css/ubahProfile-responsive.css"?>
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
          <li><a href="../index.php">Beranda</a></li>
          <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
          <li><a href="donasi.php">Donasi</a></li>
          <li><a href="perpustakaan.php">Perpustakaan</a></li>
          <li>
            <div class="dropdown">
              <a class="masuk dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Profile
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                <li><a class="dropdown-item" href="notifikasi.php">Notifikasi</a></li>
                <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
              </ul>
            </div>
          </li>
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
            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Profile
            </a>
            <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu"
              aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
              <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
              <li><a class="dropdown-item" href="notifikasi.php">Notifikasi</a></li>
              <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <div class="change-profile">
    <h1>Ubah Profile</h1>
    <!-- FORM -->
    <form class="row g-3 needs-validation" method="POST" novalidate>
      <div class="col-12">
        <label for="inputNama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama_donatur" id="inputNama" value="<?php echo $result['nama_donatur']; ?>">
      </div>
      <div class="col-md-6">
        <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
        <input type="number" class="form-control" name="noTelepon_donatur" id="formNomorTelepon"  value="<?php echo $result['noTelepon_donatur']; ?>">
      </div>
      <div class="col-md-6">
        <label for="formDate" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tglLahir_donatur" id="formDate"  value="<?php echo $result['tglLahir_donatur']; ?>">
      </div>
      <div class="mb-3" style="margin-bottom: 0px!important;">
        <label for="formAlamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="formAlamat" name="alamat_donatur" rows="3"><?php echo $result['alamat'];?></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputInstansi" class="form-label">Instansi</label>
        <select class="form-select" name="instansi_donatur" id="inputInstansi">
          <option selected value="<?php echo $result['instansi_donatur']; ?>"><?php echo $result['instansi_donatur']; ?></option>
          <option value="Perusahaan">Perusahaan</option>
          <option value="Lembaga">Lembaga</option>
          <option value="Perorangan">Perorangan</option>
          <option value="Komunitas">Komunitas</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="formKodePos" class="form-label">Kode Pos</label>
        <input type="number" class="form-control" name="kodePos" id="formKodePos" value="<?php echo $result['kodePos']; ?>">
      </div>
      <div class="col-md-6">
        <a class="btn btn-secondary col-12" href="dasborDonatur.php">Batal</a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="simpan" class="btn btn-primary col-12" ">Simpan Perubahan</button>
      </div>
    </form>
    <!-- END FORM -->
    
    <?php
          if(isset($_POST['simpan'])) {

            $id_donatur = $id;
            $id_alamatDonatur = $result['id_alamatDonatur'];
            $nama_donatur = $_POST['nama_donatur'];
            $nomorTelepon = $_POST['noTelepon_donatur'];
            $tglLahir = $_POST['tglLahir_donatur'];
            $alamat = $_POST['alamat_donatur'];
            $instansi = $_POST['instansi_donatur'];
            $kodePos = $_POST['kodePos'];
            
            $queryUpdate = "UPDATE `donatur_daftar`, `donatur_alamat`
            SET nama_donatur = '$nama_donatur', noTelepon_donatur = '$nomorTelepon',  tglLahir_donatur = '$tglLahir', alamat = '$alamat', instansi_donatur = '$instansi', kodePos = '$kodePos' 
            WHERE id_donatur = '$id_donatur' AND id_alamatDonatur = '$id_alamatDonatur' ";

            mysqli_query($conn, $queryUpdate);

            echo "<script>alert('Data Berhasil Diubah'); window.location.href = 'dasborDonatur.php';	</script>";
          }
      ?>

  </div>

  <footer>
    <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
    <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
  </footer>
  <script src=" ../js/script.js"> </script> </body> </html>