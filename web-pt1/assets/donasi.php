<?php
    session_start();
    require "../action/config.php";

    $id = $_GET['id'];
    $queryPerpus = "SELECT `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`id_perpus`, `perpus_daftar`.`id_kategoriPerpus`, `kategori_kebutuhan`.`jenis_kategori` FROM `perpus_daftar` 
    JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.`id_kategori` = `perpus_daftar`.`id_kategoriPerpus` ";
    $result = mysqli_query($conn, $queryPerpus);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</head>

<style>
    <?php include "../css/donasi.css"?>
    <?php include "../css/donasi-responsive.css"?>
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
                    <li><a href="berandaDonatur.php">Beranda</a></li>
                    <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
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
                                <li><a class="dropdown-item" href="../action/logout.php"
                                        onclick="alert('Anda Yakin ?')">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="berandaDonatur.php">Beranda</a></li>
                <li><a href="berandaDonatur.php#tentang-kami">Tentang Kami</a></li>
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
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div id="donasi-container">
        <h1>Donasi Buku</h1>
        <form method="POST">
            <div class="form-group mt-3" >
                <div class="row">
                <?php while($data = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-6">
                        <label style="padding: 7px 0;">Perpustakaan</label>
                        <select class="form-select" name="id_perpus">
                            <option selected disabled>Pilih Perpustakaan</option>
                            <option  value="<?php echo $data['id_perpus'] ?>"><?php echo $data['nama_perpus'] ?></option>
                        </select>
                    </div>
                    <?php endwhile; ?>
                    <div class="col-md-6">
                        <label style="padding: 7px 0;">Jumlah Buku</label>
                        <input type="number" min="1" class="form-control jumlah-buku" name="jumlah_buku"
                            placeholder="Masukkan Jumlah Buku">
                    </div>
                </div>
                <div class="button-center">
                    <button class="btn btn-primary col-12" type="submit" name="cari">Cari</button>
                </div>
            </div>
            </form>
            <?php if(isset($_POST['cari'])): ?>
            <div class="tambah">
                <div class="mt-3" style="border-bottom: 1px solid #0f4c75;"></div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Kategori Buku</label>
                        </div>
                    <?php
                        $queryPerpus = "SELECT `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`id_perpus`, `perpus_daftar`.`id_kategoriPerpus`, `kategori_kebutuhan`.`jenis_kategori` FROM `perpus_daftar` 
                        JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.`id_kategori` = `perpus_daftar`.`id_kategoriPerpus` ";
                        $result = mysqli_query($conn, $queryPerpus);
                        $result = mysqli_fetch_assoc($result);

                        $dataKategori = $result['jenis_kategori'];
                        $dataKategori = explode(',',$dataKategori);
                        
                    ?>
                        <div class="col-md-9">
                            <select class="form-select">
                                <option selected disabled value="">Pilih Kategori Buku</option>
                                <?php foreach ($dataKategori as $kategori): ?>
                                <option  value="<?php $result['id_kategoriPerpus'] ?>"><?php echo $kategori; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Judul Buku</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama Penulis</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_penulis" placeholder="Masukkan Nama Penulis Buku">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama Penerbit</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_penerbit" placeholder="Masukkan Nama Penerbit Buku">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Tahun Terbit</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit Buku">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Foto Buku</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="file" name="foto_buku" id="formFile">
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-center">
                <button class="btn btn-primary col-12" onclick="document.location='infoPengiriman.php'"
                    type="button" name="submit">Kirim</button>
            </div>
        </form>
    <?php endif; ?>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pencinTA buKU)</p>
    </footer>
</body>

</html>