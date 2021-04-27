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
    <?php include "../css/ubahProfile.css" ?>
    <?php include "../css/ubahProfile-responsive.css" ?>
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
                    <li><a href="donasi.php">Donasi</a></li>
                    <li><a href="perpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="perpustakaan.php">Perpustakaan</a></li>
                <li>
                    <div class="dropdown">
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="#">Konfirmasi Donasi</a></li>
                            <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="change-profile">
        <h1>Ubah Profile</h1>
        <!-- FORM -->
        <form class="row g-3 needs-validation" novalidate>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label class="form-label">Daftar Kebutuhan Buku</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck0">
                    <label class="form-check-label" for="flexCheck0">
                        Pendidikan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck1">
                    <label class="form-check-label" for="flexCheck1">
                        Komputer & Teknologi
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                    <label class="form-check-label" for="flexCheck2">
                        Kamus
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                    <label class="form-check-label" for="flexCheck3">
                        Sejarah
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck4">
                    <label class="form-check-label" for="flexCheck4">
                        Anak-Anak
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck5">
                    <label class="form-check-label" for="flexCheck5">
                        Novel
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck6">
                    <label class="form-check-label" for="flexCheck6">
                        Kedokteran
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheck7">
                    <label class="form-check-label" for="flexCheck7">
                        UTBK
                    </label>
                </div>
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="aboutLibrary" class="form-label">Tentang Perpustakaan</label>
                <textarea class="form-control" id="aboutLibrary" rows="3"></textarea>
            </div>
            <div style="border-bottom: 1px solid #0F4C75;"></div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Pengelola</label>
                <input type="text" class="form-control" id="inputNama" value="">
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Perpustakaan</label>
                <input type="text" class="form-control" id="inputNama" value="">
            </div>
            <div class="col-md-6">
                <label for="datepicker" class="form-label">Tahun Berdiri</label>
                <input type="text" class="form-control" id="datepicker">
            </div>
            <div class="col-md-6">
                <label for="formNoIzin" class="form-label">No. Izin Operasional</label>
                <input type="text" class="form-control" id="formNoIzin">
            </div>
            <div class="col-md-6">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" id="provinsi">
            </div>
            <div class="col-md-6">
                <label for="kabkota" class="form-label">Kab/Kota</label>
                <input type="text" class="form-control" id="kabkota">
            </div>
            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan">
            </div>
            <div class="col-md-4">
                <label for="desa-kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control" id="desa-kelurahan">
            </div>
            <div class="col-md-2">
                <label for="form-rt" class="form-label">RT</label>
                <input type="text" class="form-control" id="form-rt">
            </div>
            <div class="col-md-2">
                <label for="form-rw" class="form-label">RW</label>
                <input type="text" class="form-control" id="form-rw">
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="form-jalan" class="form-label">Jalan</label>
                <textarea class="form-control" id="form-jalan" rows="2"></textarea>
            </div>
            <div class="col-md-6">
                <label for="form-kodepos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control" id="form-kodepos">
            </div>
            <div class="col-md-6">
                <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="formNomorTelepon">
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary col-12" href="dasborPerpus.php">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-secondary col-12" onclick="document.location='dasborPerpus.php'">Simpan Perubahan</button>
            </div>
        </form>
        <!-- END FORM -->
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>