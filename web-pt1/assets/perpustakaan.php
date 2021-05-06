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
</head>

<style>
    <?php include "../css/perpustakaan.css"?>
    <?php include "../css/perpustakaan-responsive.css"?>
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
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                                <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                                <li><a class="dropdown-item" href="../action/logout.php"
                                        onclick="alert('Anda Yakin ?')">Log Out</a></li>
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
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu"
                            aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                            <li><a class="dropdown-item" href="notifikasi.php">Notifikasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
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
                        <div>Belum punya akun donatur? <span class="klik"><a href="register.php">Daftar
                                    disini</a></span></div>
                    </form>
                    <!-- END FORM -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;">
                        <h5 class="modal-title">Perpustakaan</h5>
                    </div>
                    <div>Masuk perpustakaan <span class="klik"><a href="masukPerpus.php">disini</a></span></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="registerPerpus.php">Klik
                                disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main-perpus">
        <h1>Perpustakaan</h1>
        <div class="perpus-content">
            <a class="content" href="pilihPerpus.php">
                <h5>Perpustakaan Retro</h5>
                <p>Sulawesi Tengah</p>
                <p>Kota Palu</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
            <a class="content" href="#">
                <h5>Nama Perpustakaan</h5>
                <p>Provinsi</p>
                <p>Kota/Kab</p>
            </a>
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
</body>

</html>