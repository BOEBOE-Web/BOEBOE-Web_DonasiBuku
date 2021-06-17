<?php  
    session_start();
    include 'model/helper-public/functionPublic.php';

    //Memanggil Header
    $style = array("public/css/style.css", "public/css/style-responsive.css");
    $pavicon = "public/image/icon-b.png";
    headerHTML($pavicon, $style); 
?>

<body>
    <header>
        <div class="header">
            <img src="public/image/logo-boeboe.png" alt="logo-boeboe">
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
                    <img src="public/image/logo-boeboe.png" alt="logo-boeboe">
                </div>
                <ul style="padding: 0px !important;">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#tentang-kami">Tentang Kami</a></li>
                    <li><a href="welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" name="masuk" data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#tentang-kami">Tentang Kami</a></li>
                <li><a href="welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
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
                    <!-- FORM LOGIN -->
                    <form class="row g-3 needs-validation" method="POST" action="action/action-donatur/loginDonatur.php" novalidate>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_donatur" id="inputEmail4" required>
                            <div class="invalid-feedback">
                                Email belum diisi.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password_donatur" id="inputPassword4" required>
                            <div class="invalid-feedback">
                                Password belum diisi
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="rememberme" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12">Masuk</button>
                        </div>
                        <div>Belum punya akun donatur? <span class="klik"><a href="view/donatur-app/registerDonatur.php">Daftar disini</a></span></div>
                    </form>
                    <!-- END FORM LOGIN -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;"><h5 class="modal-title">Perpustakaan</h5></div>
                    <div>Masuk perpustakaan <span class="klik"><a href="view/perpus-app/masukPerpus.php">disini</a></span></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="view/perpus-app/registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div id="home">
        <img src="public/image/boeboe.png" alt="boeboe">
        <p>"Perjalanan hidup yang indah adalah ketika mampu berbagi, bukan menikmati sendiri"</p>
        <a href="#" onclick="alert('Silahkan login, agar kamu dapat melakukan donasi 😊')" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">DONASI BUKU</a>
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
                <img class="mobs" src="public/image/Web-development-_Two-Color.png" alt="Web development">
            </div>
            <p>BoeBoe adalah sebuah web yang berperan penting sebagai sarana untuk mendonasikan berbagai macam buku yang
                sudah tidak terpakai untuk dialokasikan kepada perpustakaan yang lebih membutuhkan.</p>
            <p>BoeBoe menyediakan program donasi buku bekas berbasis web, serta akses mendapatkan buku dengan lebih
                mudah kepada mereka yang tinggal di daerah terpencil. Dalam web ini terdapat berbagai macam fitur
                seperti kategori buku yang dibutuhkan perpustakaan dan daftar perpustakaan yang menjalin kerjasama
                dengan BoeBoe.</p>
        </div>
        <div>
            <img class="deskipad" src="public/image/Web-development-_Two-Color.png" alt="Web development">
        </div>
    </div>
    
    <?php 
    //Memanggil Footer
    $script = '<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                <script src="public/js/script.js"></script>
                <script> AOS.init();</script>';
    footerHTML($script); 
    ?>