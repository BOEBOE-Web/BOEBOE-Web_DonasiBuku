<?php  
    session_start();
    if(!isset($_SESSION['id_loginDonatur'])) {
        header("Location: ../index.php");
        exit();
      }
    require "../action/config.php";

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
    <link rel="icon" href="../image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</head>

<style>
    <?php include "../css/beranda.css"?>
    <?php include "../css/style-responsive.css"?>
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
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
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
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu"
                            aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div id="home">
        <img src="../image/boeboe.png" alt="boeboe">
        <p>"Perjalanan hidup yang indah adalah ketika mampu berbagi, bukan menikmati sendiri"</p>
        <a href="donasi.php">DONASI BUKU</a>
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
                <img class="mobs" src="../image/Web-development-_Two-Color.png" alt="Web development">
            </div>
            <p>BoeBoe adalah sebuah web yang berperan penting sebagai sarana untuk mendonasikan berbagai macam buku yang
                sudah tidak terpakai untuk dialokasikan kepada perpustakaan yang lebih membutuhkan.</p>
            <p>BoeBoe menyediakan program donasi buku bekas berbasis web, serta akses mendapatkan buku dengan lebih
                mudah kepada mereka yang tinggal di daerah terpencil. Dalam web ini terdapat berbagai macam fitur
                seperti kategori buku yang dibutuhkan perpustakaan dan daftar perpustakaan yang menjalin kerjasama
                dengan BoeBoe.</p>
        </div>
        <div>
            <img class="deskipad" src="../image/Web-development-_Two-Color.png" alt="Web development">
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
