<?php
    session_start();
    require "../action/config.php";

    $id = $_GET['id'];
    $query = "SELECT * FROM `perpus_daftar` 
    JOIN `perpus_alamat` ON `perpus_alamat`.id_alamatPerpusAktif = `perpus_daftar`.id_alamatPerpus
    JOIN `perpus_aktif` ON `perpus_aktif`.id_akunPerpus = `perpus_daftar`.id_loginPerpus
    JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.id_kategori = `perpus_daftar`.id_kategoriPerpus
    WHERE id_perpus = '$id' ";

    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
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
</head>

<style>
    <?php include "../css/pilihPerpus.css" ?>
    <?php include "../css/pilihPerpus-responsive.css" ?>
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
                    <li><a href="berandaDonatur.php#">Beranda</a></li>
                    <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
                    <li><a href="donasi.php">Donasi</a></li>
                    <li><a href="perpustakaan.php">Perpustakaan</a></li>
                    <li>
                    <div class="dropdown">
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <li><a href="berandaDonatur.php#">Beranda</a></li>
                <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="perpustakaan.php">Perpustakaan</a></li>
                <li>
                <div class="dropdown">
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="main">
        <div class="main-content">
            <div class="row">
                <h1 class="col-10">Perpustakaan <?php echo $data['nama_perpus'];?></h1>
                <a href="donasi.php?id=<?php echo $data['id_perpus'];?>" class="btn btn-primary col-2" type="button" style="height: 38px">Donasi Sekarang</a>
            </div>
            <div class="content">
                <div style="width: 30%;">
                    <img src="../<?php echo $data['gambar_perpus'];?>" alt="Perpustakaan">
                </div>
                <div class="display-one">
                    <div>
                        <h5>Nama Pengelola:</h5>
                        <p><?php echo $data['namaPengelola_perpus'];?></p>
                    </div>
                    <div>
                        <h5>Nomor Telepon:</h5>
                        <p><?php echo $data['noTelepon_perpus'];?></p>
                    </div>
                    <div>
                        <h5>Provinsi:</h5>
                        <p><?php echo $data['provinsi'];?></p>
                    </div>
                    <div>
                        <h5>Kab/Kota:</h5>
                        <p><?php echo $data['kabupaten_kota'];?></p>
                    </div>
                    <div>
                        <h5>Alamat:</h5>
                        <p><?php echo $data['jalan'];?></p>
                    </div>
                    <div>
                        <h5>Kode Pos:</h5>
                        <p><?php echo $data['kodePos'];?></p>
                    </div>
                </div>
                <div class="display-two">
                    <div>
                        <h5>Email:</h5>
                        <p><?php echo $data['email_perpus'];?></p>
                    </div>
                    <div>
                        <h5>Tahun Berdiri:</h5>
                        <p><?php echo $data['tahunBerdiri_perpus'];?></p>
                    </div>
                    <div>
                        <h5>No. Izin Operasional:</h5>
                        <p><?php echo $data['noIzin_perpus'];?></p>
                    </div>
                    <div>
                        <h5>Daftar Kebutuhan Buku:</h5>
                        <p><?php echo $data['jenis_kategori'];?></p>
                    </div>
                    <div>
                        <h5>Tentang Perpustakaan:</h5>
                        <p><?php echo $data['tentang_perpus'];?></p>
                    </div>
                    <a href="donasi.php" class="btn btn-primary responsive" type="button" style="height: 38px">Donasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
    </footer>
</body>

</html>
