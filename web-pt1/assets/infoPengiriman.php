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
          <li><a href="../index.php">Beranda</a></li>
          <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
          <li><a href="donasi.php">Donasi</a></li>
          <li><a href="perpustakaan.php">Perpustakaan</a></li>
          <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
        </ul>
      </nav>
    </nav>
    <div class="navi">
      <ul>
        <li><a href="../index.php">Beranda</a></li>
        <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
        <li><a href="donasi.php">Donasi</a></li>
        <li><a href="perpustakaan.php">Perpustakaan</a></li>
        <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
      </ul>
    </div>
  </header>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masuk Donatur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- FORM -->
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-12">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail4" required>
              <div class="invalid-feedback">
                Email belum diisi.
              </div>
            </div>
            <div class="col-12">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword4" required>
              <div class="invalid-feedback">
                Password belum diisi
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary col-12">Masuk</button>
            </div>
            <div>Belum punya akun donatur? <span class="klik"><a href="register.php">Daftar disini</a></span></div>
          </form>
          <!-- END FORM -->
        </div>
        <div class="modal-footer">
          <div style="width: 100%;">
            <h5 class="modal-title">Perpustakaan</h5>
          </div>
          <div>Masuk perpustakaan <span class="klik"><a href="masukPerpus.php">disini</a></span></div>
          <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="registerPerpus.php">Klik disini</a></span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Modal -->
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