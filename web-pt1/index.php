<?php  
    require "action/config.php";
    session_start();

    if (isset($_SESSION['masuk'])) {
        header("Location: alert/salah.php");
        exit;
    }

    $query = "SELECT * FROM otakuboeboe";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoeBoe - Web Donasi Buku Bekas</title>
    <link rel="icon" href="image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
    <?php include "css/style.css" ?>
    <?php include "css/style-responsive.css" ?>
</style>

<body>
    <header>
        <div class="header">
            <img src="image/logo-boeboe.png" alt="logo-boeboe">
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
                    <img src="image/logo-boeboe.png" alt="logo-boeboe">
                </div>
                <ul style="padding: 0px !important;">
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="assets/donasi.php">Donasi</a></li>
                    <li><a href="assets/perpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" name="masuk" data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#tentang-kami">Tentang Kami</a></li>
                <li><a href="assets/donasi.php">Donasi</a></li>
                <li><a href="assets/perpustakaan.php">Perpustakaan</a></li>
                <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
            </ul>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk Donatur
                    </h5>
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
                        <div>Belum punya akun donatur? <span class="klik"><a href="assets/register.php">Daftar disini</a></span></div>
                    </form>
                    <!-- END FORM -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;"><h5 class="modal-title">Perpustakaan</h5></div>
                    <div>Masuk perpustakaan <span class="klik"><a href="assets/masukPerpus.php">disini</a></span></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="assets/registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div id="home">
        <img src="image/boeboe.png" alt="boeboe">
        <p>"Perjalanan hidup yang indah adalah ketika mampu berbagi, bukan menikmati sendiri"</p>
        <a href="assets/donasi.php">DONASI BUKU</a>
    </div>
    <div id="main-container">
        <div class="main-flex display1">
            <h1 data-aos="fade-right" data-aos-delay="200">What You Do ?</h1>
            <ul>
                <li>
                    <p>Mengisi form donasi</p>
                </li>
                <li>
                    <p>Menyediakan buku kemudian dikemas</p>
                </li>
                <li>
                    <p>Mengirim buku ke alamat tujuan</p>
                </li>
            </ul>
        </div>
        <div class="main-flex display2">
            <h1 data-aos="fade-right" data-aos-delay="400">What We Do ?</h1>
            <ul>
                <li>
                    <p>BoeBoe menyediakan website untuk mendonasikan buku</p>
                </li>
                <li>
                    <p>BoeBoe menjalin kerjasama dengan perpustakaan yang membutuhkan buku</p>
                </li>
            </ul>
        </div>
    </div>
    <div id="tentang-kami">
        <div class="teks-tentang">
            <h1 data-aos="fade-right" data-aos-delay="200">Tentang Kami</h1>
            <div>
                <img class="mobs" src="image/Web-development-_Two-Color.png" alt="Web development">
            </div>
            <p>BoeBoe adalah sebuah web yang berperan penting sebagai sarana untuk mendonasikan berbagai macam buku yang
                sudah tidak terpakai untuk dialokasikan kepada perpustakaan yang lebih membutuhkan.</p>
            <p>BoeBoe menyediakan program donasi buku bekas berbasis web, serta akses mendapatkan buku dengan lebih
                mudah kepada mereka yang tinggal di daerah terpencil. Dalam web ini terdapat berbagai macam fitur
                seperti kategori buku yang dibutuhkan perpustakaan dan daftar perpustakaan yang menjalin kerjasama
                dengan BoeBoe.</p>
        </div>
        <div>
            <img class="deskipad" src="image/Web-development-_Two-Color.png" alt="Web development">
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
