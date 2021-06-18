<?php 
    session_start();
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-perpus-app/functionPerpus.php';
    
    //Memanggil Header
    $style = array("../../public/css/register.css", "../../public/css/masuk-responsive.css");
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
                    <li><a href="../../index.php">Beranda</a></li>
                    <li><a href="../../index.php#tentang-kami">Tentang Kami</a></li>
                    <li><a href="../../welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../../index.php">Beranda</a></li>
                <li><a href="../../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="../../welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
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
                    <!-- FORM Login -->
                    <form class="row g-3 needs-validation" method="POST" action="../../action/action-donatur/loginDonatur.php" novalidate>
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
                        <div>Belum punya akun donatur? <span class="klik"><a href="../donatur-app/registerDonatur.php">Daftar disini</a></span></div>
                    </form>
                    <!-- END FORM Login -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;"><h5 class="modal-title">Perpustakaan</h5></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main">
        <h1>Masuk Perpustakaan</h1>
        <!-- FORM MAIN LOGIN -->
        <form class="row g-3 needs-validation" action="../../action/action-perpus/loginPerpus.php"  method="POST" novalidate>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email_perpus" id="inputEmail4" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" name="password_perpus" id="inputPassword4" required>
                <div class="invalid-feedback">
                    Harus diisi
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="rememberme" type="checkbox">
                    <label class="form-check-label">
                        Remember Me
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary col-12">Masuk</button>
            </div>
        </form>
        <!-- END FORM -->
    </div>
    <?php 
        //Memanggil Footer
        $script = '<script src="../../js/script.js"></script>';
        footerHTML($script); 
    ?>