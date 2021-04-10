<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoeBoe - Web Donasi Buku Bekas</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/register-responsive.css">
    <link rel="icon" href="../image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="header">
            <a href="../index.html"><img src="../image/logo-boeboe.png" alt="logo-boeboe"></a>
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
                <ul>
                    <li><a href="../index.html">Beranda</a></li>
                    <li><a href="../index.html#tentang-kami">Tentang Kami</a></li>
                    <li><a href="donasi.html">Donasi</a></li>
                    <li><a href="#">Perpustakaan</a></li>
                    <li><a href="#" class="masuk">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.html">Beranda</a></li>
                <li><a href="../index.html#tentang-kami">Tentang Kami</a></li>
                <li><a href="donasi.html">Donasi</a></li>
                <li><a href="#">Perpustakaan</a></li>
                <li><a href="#" class="masuk" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Masuk</a></li>
            </ul>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"
                        style="font-family: 'Poppins', sans-serif; font-weight: bold;">Masuk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_donatur" id="inputEmail4" required>
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
                    </form>
                    <!-- END FORM -->
                </div>
                <div class="modal-footer">
                    <div>Belum punya akun? <span class="klik"><a href="register.html">Daftar disini</a></span></div>
                    <div>Mendaftar Sebagai perpustakaan? <span class="klik"><a href="registerPerpus.html">Klik
                                disini</a></span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- END Modal -->
    <div class="main">
        <h3 style="font-family: 'Poppins', sans-serif; font-weight: bold;">
            Daftar Sebagai Donatur
        </h3>

        <!-- FORM -->
        <form class="row g-3 needs-validation" novalidate action="../action/regDonatur.php" method="POST">
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email_donatur" id="inputEmail4" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>

            <div class="col-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password_donatur" onkeyup='check();' required>
                <div class="invalid-feedback">
                    Harus diisi
                </div>
            </div>

            <div class="col-12">
                <label for="inputConfirmPassword" class="form-label">Ulangi Password</label>
                <input type="password" class="form-control" id="inputConfirmPassword" name="confirm-password" onkeyup='check();' required>
                <div style="margin-top: 4px; font-size: .875em;">
                    <span id="message"></span>
                </div>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>


            <div class="col-12">
                <label for="forminputNama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_donatur" id="forminputNama" value="" required>
                <div class="invalid-feedback">
                    Harus diisi.
                </div>
            </div>


            <div class="col-md-6">
                <label for="formNomorHp" class="form-label">Nomor Hp</label>
                <input type="text" class="form-control" name="nomorHP_donatur" id="formNomorHp" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>

            <div class="col-md-6">
                <label for="formDate" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggalLahir_donatur" id="formDate" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>

            <div class="col-md-6">
                <label for="formProvinsi" class="form-label">Provinsi : </label>
                <input type="text" class="form-control" name="provinsi" id="formProvinsi" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="formKota_Kabupaten" class="form-label">Kota / Kabupaten :</label>
                <input type="text" class="form-control" name="kota_kabupaten" id="formKota_Kabupaten" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="formKecamatan" class="form-label">Kecamatan :  </label>
                <input type="text" class="form-control" name="kecamatan" id="formKecamatan" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="formKodePos" class="form-label">Kode Pos :</label>
                <input type="text" class="form-control" name="kodePos" id="formKodePos" required>
                <div class="invalid-feedback">
                    Harus dipilih.
                </div>
            </div>

            <div class="col-12">
                <label for="formInputInstansi" class="form-label">Instansi</label>
                <select class="form-select" name="instansi_donatur" id="formInputInstansi" required>
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
                        <a href="#" style="color: #0f4c75 !important;">Setuju dengan syarat dan ketentuan<span style="color: #dc3545 !important;">*</span></a>
                    </label>
                    <div class="invalid-feedback">
                        Anda harus setuju sebelum mengirimkan.
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
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>