<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Perpustakaan</title>
    <link rel="icon" href="../image/icon-b.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<style>
    <?php include "../css/dasborPerpus.css" ?><?php include "../css/dasborPerpus-responsive.css" ?>
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
                <li><a href="berandaPerpus.php#">Beranda</a></li>
                <li><a href="berandaPerpus.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="listPerpustakaan.php">Perpustakaan</a></li>
                    <li>
                    <div class="dropdown">
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                                <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                                <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="berandaPerpus.php#">Beranda</a></li>
                <li><a href="berandaPerpus.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="listPerpustakaan.php">Perpustakaan</a></li>
                <li>
                <div class="dropdown">
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="dasbor-content">
        <h1>Dasbor</h1>
        <div class="content">
            <div class="das" style="width: 30%;">
                <img src="../image/retro-library.jpg" alt="Perpustakaan">
                <h5 style="margin: 15px 0; text-align: center;">Perpustakaan Retro</h5>
                <a href="ubahProfilePerpus.php" class="btn btn-primary col-12">Ubah Profile</a>
            </div>
            <div class="display-one">
                <div>
                    <h5>Nama Pengelola:</h5>
                    <p>Nona</p>
                </div>
                <div>
                    <h5>Nomor Telepon:</h5>
                    <p>081234567890</p>
                </div>
                <div>
                    <h5>Provinsi:</h5>
                    <p>Sulawesi Tengah</p>
                </div>
                <div>
                    <h5>Kab/Kota:</h5>
                    <p>Kota Palu</p>
                </div>
                <div>
                    <h5>Alamat:</h5>
                    <p>Kecamatan Tawaeli, Kelurahan Panau, RT 01, RW 01, Jln. Trans Sulawesi</p>
                </div>
                <div>
                    <h5>Kode Pos:</h5>
                    <p>987</p>
                </div>
            </div>
            <div class="display-two">
                <div>
                    <h5>Email:</h5>
                    <p>email@contoh.com</p>
                </div>
                <div>
                    <h5>Tahun Berdiri:</h5>
                    <p>2013</p>
                </div>
                <div>
                    <h5>No. Izin Operasional:</h5>
                    <p>123</p>
                </div>
                <div>
                    <h5>Daftar Kebutuhan Buku:</h5>
                    <p>Pendidikan, Komputer & Teknologi, Kamus, Sejarah, Anak-anak.</p>
                </div>
                <div>
                    <h5>Tentang Perpustakaan:</h5>
                    <p>...</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
</body>

</html>
