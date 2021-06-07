<?php
    session_start();
    if(!isset($_SESSION['id_akunPerpus'])) {
        header("Location: ../index.php");
        exit();
    }
    require "../action/config.php";

    $id = $_GET['id'];
    $id_login = $_SESSION['id_akunPerpus'];
    $query = "SELECT `donasi_konfirmasi`.`id_detail`, `donasi_konfirmasi`.`id_konfirmasi`, `donasi_konfirmasi`.`bukti_donasi`, `donasi_konfirmasi`.`status_donasi`, `donasi_detail`.`id_detail`, `donasi_detail`.`id_loginDonatur`, `donasi_buku`.`id_loginDonatur`, `donasi_buku`.`jumlah_buku`, `donasi_buku`.`judul_buku`, `donasi_buku`.`nama_penulis`, `donasi_buku`.`nama_penerbit`, `donasi_buku`.`kategori_buku`, `donasi_buku`.`tahun_terbit`, `donasi_buku`.`foto_buku` 
    FROM `donasi_konfirmasi` 
    JOIN `donasi_detail` ON `donasi_detail`.`id_detail` = `donasi_konfirmasi`.`id_detail` 
    JOIN `donasi_buku` ON `donasi_buku`.`id_loginDonatur` = `donasi_detail`.`id_loginDonatur` 
    WHERE `donasi_konfirmasi`.`id_detail` = '$id' ";
    $result = mysqli_query($conn, $query);
    $hasil = mysqli_fetch_assoc($result)
?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
</head>

<style>
    <?php include "../css/konfirmasi.css"?>
    <?php include "../css/editKonfirmasi-responsive.css"?>
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
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
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
                        <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu"
                            aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="dasborPerpus.php">Dasbor</a></li>
                            <li><a class="dropdown-item" href="konfirmasi.php">Konfirmasi Donasi</a></li>
                            <li><a class="dropdown-item" href="../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="konfirmasi-content">
        <h1>Edit Status Donasi</h1>
        <h5 style="text-align: center;">No Donasi : <?php echo $hasil['id_detail'];?></h5>
        <h5 class="mt-4">Foto Buku</h5>
        <img style="min-widht: 165px; min-height: 248px;max-widht: 165px; max-height: 248px;" src="http://<?= $_SERVER['SERVER_NAME'].'/BOEBOE-Web.github.io/web-pt1/'.$hasil['foto_buku']?>">
        <h5 class="mt-4">Detail Buku</h5>
        <p>Jumlah Buku      : <?php echo $hasil['jumlah_buku']; ?></p>
        <p>Judul Buku       : <?php echo $hasil['judul_buku']; ?></p>
        <p>Kategori Buku    : <?php echo $hasil['kategori_buku']; ?></p>
        <p>Nama Penulis     : <?php echo $hasil['nama_penulis']; ?></p>
        <p>Nama Penerbit    : <?php echo $hasil['nama_penerbit']; ?></p>
        <p>Tahun Terbit     : <?php echo $hasil['tahun_terbit']; ?></p>

        <form method="POST" enctype="multipart/form-data" validated>
        <div class="form-group mt-3">
            <div class="row">
                <div class="col-md-3">
                    <label>Status Donasi</label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" name="status_donasi">
                        <option selected disabled value=""><?php echo $hasil['status_donasi'];?></option>
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
                    <input class="form-control" type="file" id="formFile" name="bukti_donasi">
                </div>
            </div>
        </div>
        <div class="form-group mt-5">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary col-12" href="konfirmasi.php">Batal</a>
                </div
                <?php if(!isset($_FILES['bukti_donasi']) < 0 || ($hasil['bukti_donasi']) == 'Upload Bukti Donasi'): ?>>
                <div class="col-md-6">
                    <button  type="submit" class="btn btn-secondary col-12" name="simpan">Simpan Perubahan</button>
                <?php endif; ?>
                </div>
            </div>
        </div>
        </form>
    </div>
    <?php
        if(isset($_POST['simpan'])) {
	    $idKonfirmasi = $hasil['id_konfirmasi'];
            $status_donasi = $_POST['status_donasi'];

            // For Upload gambar profile
            $cek_ekstensi = array('jpg','png','jpeg');
            $name = $_FILES['bukti_donasi']['name'];
            $size = $_FILES['bukti_donasi']['size'];
            $tmpCek = explode('.', $name);
            $extensi = strtolower(end($tmpCek));
            $tmpFile = $_FILES['bukti_donasi']['tmp_name'];
            
            if ($size > 1000000) {
                // Nothing
            } else {
                // Jalankan Update
                if(in_array($extensi, $cek_ekstensi) == true) {
                    if($size < 1000000) {
                        $moveFile = 'image/upload-donasi/bukti-donasi/'. $name;
                        move_uploaded_file($tmpFile, '../'.$moveFile );
                        $query = "UPDATE `donasi_konfirmasi` SET `bukti_donasi` = '$moveFile', `status_donasi` = '$status_donasi' 
                        WHERE id_konfirmasi = $idKonfirmasi ";
                        
                        if(mysqli_query($conn, $query)) {
                            echo "<script>alert('Gambar Berhasil Upload'); window.location.href = 'konfirmasi.php';</script>";
                        } else {
                            echo "<script>alert('Gambar Gagal Upload'); window.location.href = 'konfirmasi.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = 'konfirmasi.php';</script>";
                    } 
                }else {
                        echo "<script>alert('Ekstensi Tidak Mendukung'); window.location.href = 'konfirmasi.php';</script>";
                }
            }
        }
    ?>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
    </footer>
</body>

</html>
