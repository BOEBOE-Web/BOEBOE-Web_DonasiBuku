<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status Donasi</title>
    <link rel="icon" href="../image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
    <?php include "../css/konfirmasi.css" ?><?php include "../css/konfirmasi-responsive.css" ?>
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
                            <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                            <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="konfirmasi-content">
        <h1>Edit Status Donasi</h1>
        <h5 style="text-align: center;">No Donasi : BOEBOE202104140001</h5>
        <form>
            <div class="form-group mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label>Status Donasi</label>
                    </div>
                    <div class="col-md-9">
                        <select class="form-select">
                            <option selected disabled value="">Ubah Status Donasi</option>
                            <option>Donasi telah diterima</option>
                            <option>Donasi belum sampai</option>
                            <option>Buku yang didonasikan tidak sesuai</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <label>Bukti Foto</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
            </div>

            <div class="form-group mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-primary col-12" href="konfirmasi.php">Batal</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-secondary col-12">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
</body>

</html>