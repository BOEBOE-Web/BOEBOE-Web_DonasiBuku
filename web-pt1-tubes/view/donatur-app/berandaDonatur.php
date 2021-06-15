<?php  
    session_start();
    
    // Cek Sesi Login
    // if(!isset($_SESSION['id_loginDonatur'])) {
    //   header("Location: ../../index.php");
    //   exit();
    // }

    //Memanggil Header
    include '../../helper/function.php';
    $style = array("../../public/css/beranda.css", "../../public/css/style-responsive.css");
    headerHTML($style); 
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
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu"
                            aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                            <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div id="home">
        <img src="../../public/image/boeboe.png" alt="boeboe">
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
                <img class="mobs" src="../../public/image/Web-development-_Two-Color.png" alt="Web development">
            </div>
            <p>BoeBoe adalah sebuah web yang berperan penting sebagai sarana untuk mendonasikan berbagai macam buku yang
                sudah tidak terpakai untuk dialokasikan kepada perpustakaan yang lebih membutuhkan.</p>
            <p>BoeBoe menyediakan program donasi buku bekas berbasis web, serta akses mendapatkan buku dengan lebih
                mudah kepada mereka yang tinggal di daerah terpencil. Dalam web ini terdapat berbagai macam fitur
                seperti kategori buku yang dibutuhkan perpustakaan dan daftar perpustakaan yang menjalin kerjasama
                dengan BoeBoe.</p>
        </div>
        <div>
            <img class="deskipad" src="../../public/image/Web-development-_Two-Color.png" alt="Web development">
        </div>
    </div>
    <?php 
    //Memanggil Footer
    $script = '<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <script src="public/js/script.js"></script>
                <script> AOS.init();</script>';
    footerHTML($script); 
    ?>
