<?php
    session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
</head>

<style>
    <?php include "../css/register.css" ?>
    <?php include "../css/register-responsive.css" ?>
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
                    <li><a href="../welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="../welcome/daftarPerpustakaan.php">Perpustakaan</a></li>
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
                    <form class="row g-3 needs-validation" method="POST" action="../action/logDonatur.php" novalidate>
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
                        <div>Belum punya akun donatur? <span class="klik"><a href="registerDonatur.php">Daftar disini</a></span></div>
                    </form>
                    <!-- END FORM -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;"><h5 class="modal-title">Perpustakaan</h5></div>
                    <div>Masuk perpustakaan <span class="klik"><a href="masukPerpus.php">disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main">
        <h1>Daftar Sebagai Perpustakaan</h1>
        <!-- FORM -->
        <form class="row g-3 needs-validation" action="../action/regPerpus.php" method="POST" novalidate>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email_perpus" id="inputEmail4" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password_perpus" class="form-control" name="password_perpus" id="inputPassword4" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputConfirmPassword" class="form-label">Ulangi Password</label>
                <input type="password" class="form-control" id="inputConfirmPassword" required>
                <div style="margin-top: 4px; font-size: .875em;">
                    <span id="message"></span>
                </div>
                <div class="invalid-feedback">
                    Harus diisi kembali.
                </div>
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Pengelola</label>
                <input type="text" class="form-control" name="namaPengelola_perpus" id="inputNama" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Perpustakaan</label>
                <input type="text" class="form-control" name="namaPerpus" id="inputNama" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="datepicker" class="form-label">Tahun Berdiri</label>
                <input type="number" class="form-control" name="tahunBerdiri_perpus" id="datepicker" required>
                <div class="invalid-feedback">
                    Harus diisi/dipilih.
                </div>
            </div>
            <div class="col-md-6">
                <label for="formNoIzin" class="form-label">No. Izin Operasional</label>
                <input type="number" class="form-control" name="noIzin_perpus" id="formNoIzin" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" name="provinsi_perpus" id="provinsi" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="kabkota" class="form-label">Kabupaten/Kota</label>
                <input type="text" class="form-control" name="kab_kota_perpus" id="kabkota" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" name="kec_perpus" id="kecamatan" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-4">
                <label for="desa-kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control" name="desa_kelurahan_perpus" id="desa-kelurahan" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-2">
                <label for="form-rt" class="form-label">RT</label>
                <input type="number" class="form-control" name="rt_perpus" id="form-rt" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-2">
                <label for="form-rw" class="form-label">RW</label>
                <input type="number" class="form-control" name="rw_perpus" id="form-rw" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="form-jalan" class="form-label">Jalan</label>
                <textarea class="form-control" id="form-jalan" name="jalan_perpus" rows="2" required></textarea>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="form-kodepos" class="form-label">Kode Pos</label>
                <input type="number" class="form-control" name="kodePos_perpus" id="form-kodepos" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-md-6">
                <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" name="noTelepon_perpus" id="formNomorTelepon" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        <a style="color: #0f4c75 !important;">Setuju dengan syarat dan ketentuan<span style="color: #dc3545 !important;">*</span></a>
                    </label>
                    <div class="invalid-feedback">
                        Anda harus setuju, agar dapat meneruskan pembukaan donasi.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary col-12">Daftar</button>
            </div>
        </form>
        <!-- END FORM -->
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe - Web Donasi Buku Bekas</p>
        <p>Made by OTAKU</p>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>