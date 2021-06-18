<?php 
	session_start();
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-donatur-app/functionDonatur.php';
    
    $style = array("../../public/css/register.css", "../../public/css/register-responsive.css");
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
                    <!-- FORM LOGIN -->
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
                    </form>
                    <!-- END FORM LOGIN -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;"><h5 class="modal-title">Perpustakaan</h5></div>
                    <div>Masuk perpustakaan <span class="klik"><a href="../perpus-app/masukPerpus.php">disini</a></span></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="../perpus-app/registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main">
        <h1>Daftar Sebagai Donatur</h1>
        <!-- FORM Register -->
        <form class="row g-3 needs-validation" action="../../action/action-donatur/registerDonatur.php" method="POST" novalidate>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email_donatur" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password_donatur" required>
                <div class="invalid-feedback">
                    Harus diisi
                </div>
            </div>
            <div class="col-12">
                <label for="inputConfirmPassword" class="form-label">Ulangi Password</label>
                <input type="password" class="form-control" id="inputConfirmPassword" name="cpassword_donatur" required>
                <div style="margin-top: 4px; font-size: .875em;">
                    <span id="message"></span>
                </div>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="inputNama" name="nama_donatur" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15"
                class="form-control" id="formNomorTelepon" name="noTelepon_donatur" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="formDate" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="formDate" name="tglLahir_donatur" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="formAlamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="formAlamat" rows="3" name="alamat_donatur" required></textarea>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="formKodePos" class="form-label">Kode Pos</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" 
                class="form-control" id="formKodePos" name="kodePos_donatur" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-6">
                <label for="inputInstansi" class="form-label">Instansi</label>
                <select class="form-select" id="inputInstansi" name="instansi_donatur" required>
                    <option selected disabled value="">Pilih Instansi</option>
                    <option>Perusahaan</option>
                    <option>Lembaga</option>
                    <option>Perorangan</option>
                    <option>Komunitas</option>
                </select>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        <a style="color: #0f4c75 !important;">Setuju dengan syarat dan ketentuan<span style="color: #dc3545 !important;">*</span></a>
                    </label>
                    <div class="invalid-feedback">
                        Anda harus setuju sebelum dapat melakukan pengiriman.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary col-12" name="daftar">Daftar</button>
            </div>
        </form>
        <!-- END FORM Register -->
    </div>
    <?php 
        $script = '<script src="../../js/script.js"></script>';
        footerHTML($script); 
    ?>