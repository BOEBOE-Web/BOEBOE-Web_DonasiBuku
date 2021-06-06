<?php
    session_start();
    if(!isset($_SESSION['id_loginDonatur'])) {
        header("Location: ../index.php");
        exit();
    }
    require "../action/config.php";

    $queryPerpus = "SELECT `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`id_perpus` FROM `perpus_daftar` ";
    $resultData_perpus = mysqli_query($conn, $queryPerpus);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoeBoe - Web Donasi Buku Bekas</title>
    <link rel="icon" href="../image/icon-b.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
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
        <form method="POST" validated>
            <div class="form-group mt-3" >
                <div class="row">
                    <div class="col-md-12">
                        <label style="padding: 7px 0;">Perpustakaan</label>
                        <select class="form-select" name="id_perpus">
                            <option <?php if(!isset($_POST['id_perpus'])) echo "selected";?> disabled>Pilih Perpustakaan</option>
                            <?php while($data_perpus = mysqli_fetch_assoc($resultData_perpus)): ?>
                            <option <?php if(isset($_POST['id_perpus']) AND $_POST['id_perpus'] == $data_perpus['id_perpus']) echo "selected";?> value="<?php echo $data_perpus['id_perpus'] ?>"><?php echo $data_perpus['nama_perpus'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="button-center">
                    <button class="btn btn-primary col-12" type="submit" name="cari">Cari</button>
                </div>
            </div>
            </form>
            <?php if(isset($_POST['cari'])):
                    if(isset($_POST['id_perpus'])):
                        $id_perpus = $_POST['id_perpus'];
                        $queryKategori = "SELECT `kategori_kebutuhan`.`id_kategori`, `kategori_kebutuhan`.`jenis_kategori`, `perpus_daftar`.`id_perpus`, `perpus_daftar`.`nama_perpus`, `perpus_aktif`.`id_akunPerpus` 
                                            FROM `kategori_kebutuhan` 
                                            JOIN `perpus_daftar` ON `perpus_daftar`.`id_kategoriPerpus` = `kategori_kebutuhan`.`id_kategori` 
                                            JOIN `perpus_aktif` ON `perpus_aktif`.`id_akunPerpus` = `perpus_daftar`.`id_loginPerpus`  
                                            WHERE `perpus_daftar`.`id_perpus` = '$id_perpus' ";
                    $resultKategori = mysqli_query($conn, $queryKategori);
                    $resultKategori = mysqli_fetch_assoc($resultKategori);
                    
                    //Ambil Data SESSION
                    $_SESSION['id_kategori'] = $resultKategori['id_kategori'];
                    $_SESSION['id_perpus'] = $resultKategori['id_perpus'];
                    $_SESSION['id_akunPerpus'] = $resultKategori['id_akunPerpus'];
                    $_SESSION['nama_perpus'] = $resultKategori['nama_perpus'];

                    //Memisahkan koma pada data jenis_kategori
                    $dataKategori = $resultKategori['jenis_kategori'];
                    $dataKategori = explode(',',$dataKategori);
                    
                    if($resultKategori['jenis_kategori'] == NULL || $resultKategori['jenis_kategori'] == 'Silahkan Update'):
                        echo '<p class="mt-5" style="text-align:center; font-size:23px">Hai donatur, perpus ini sedang tidak membuka donasi buku saat ini</p>'; 
                    else :
            ?>
            <!-- Form Input User -->
            <form method="POST" enctype="multipart/form-data" validated>
            <div class="tambah">
                <div class="mt-3" style="border-bottom: 1px solid #0f4c75;"></div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Kategori Buku</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-select" name="kategori_kebutuhan">
                                <option selected disabled >Pilih Kategori Buku</option>
                                <?php foreach ($dataKategori as $kategori): ?>
                                <option  value="<?php echo $kategori; ?>"><?php echo $kategori; ?></option>
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
                            <input type="text" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" required>
                        </div>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Jumlah Buku</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="jumlah_buku" placeholder="Masukkan Jumlah Buku"required>
                        </div>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama Penulis</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_penulis" placeholder="Masukkan Nama Penulis Buku"required>
                        </div>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nama Penerbit</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_penerbit" placeholder="Masukkan Nama Penerbit Buku"required>
                        </div>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="datepicker">Tahun Terbit</label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit Buku" id="datepicker" required>
                        </div>
                        <div class="invalid-feedback">
                            Harus diisi.
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
                <button class="btn btn-primary col-12" type="submit" name="kirim">Kirim</button>
            </div>
        </form>
        <?php
        endif; 
            endif; 
                endif; 

                if(isset($_POST['kirim'])) {
                    // Insert Data Donasi
                    $kategori_kebutuhan = $_POST['kategori_kebutuhan'];
                    $judul_buku = $_POST['judul_buku'];
                    $jumlah_buku = $_POST['jumlah_buku'];
                    $nama_penulis = $_POST['nama_penulis'];
                    $nama_penerbit = $_POST['nama_penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $id_kategori = $_SESSION['id_kategori'];
                    $id_loginDonatur = $_SESSION['id_loginDonatur'];
                    $nama_perpus =  $_SESSION['nama_perpus'];

                    // Insert Foto Buku
                    $cek_ekstensi = array('jpg','png','jpeg');
                    $name = $_FILES['foto_buku']['name'];
                    $size = $_FILES['foto_buku']['size'];
                    $tmpCek = explode('.', $name);
                    $extensi = strtolower(end($tmpCek));
                    $tmpFile = $_FILES['foto_buku']['tmp_name'];

                    if ($size > 1000000) {
                        // Tidak lakukan apapun
                    } else {
                        // Jalankan Insert Foto
                        if(in_array($extensi, $cek_ekstensi) == true) {
                            if($size < 1000000) {
                                $moveFile = 'image/upload-donasi/bukti-donasi/'. $name;
                                move_uploaded_file($tmpFile, '../'.$moveFile );
                                
                                $queryInsertDonasi = "INSERT INTO `donasi_buku`(`id_donasiBuku`, `id_loginDonatur`, `id_kategoriKebutuhan`, `nama_perpus`, `jumlah_buku`, `judul_buku`, `kategori_buku`, `nama_penulis`, `nama_penerbit`, `tahun_terbit`, `foto_buku`) 
                                                        VALUES (NULL,'$id_loginDonatur','$id_kategori','$nama_perpus','$jumlah_buku','$judul_buku','$kategori_kebutuhan','$nama_penulis','$nama_penerbit','$tahun_terbit','')";
                                mysqli_query($conn, $queryInsertDonasi);

                                $id_donasi = mysqli_insert_id($conn);
                                $query = "UPDATE `donasi_buku` SET `foto_buku` = '$moveFile' WHERE id_donasiBuku = $id_donasi ";
                                if(mysqli_query($conn, $query)) {
                                    // Tidak lakukan apapun
                                } else {
                                    echo "<script>alert('Gambar Gagal Upload'); window.location.href = 'donasi.php';</script>";
                                }
                            } else {
                                echo "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = 'donasi.php';</script>";
                            } 
                        }else {
                                echo "<script>alert('Ekstensi Tidak Mendukung'); window.location.href = 'donasi.php';</script>";
                        }
                    }

                    // Query Perpus
                    $id_perpus = $_SESSION['id_perpus'];
                    $id_akunPerpus = $_SESSION['id_akunPerpus'];

                    $queryPerpus = "SELECT `perpus_daftar`.`id_loginPerpus`, `perpus_daftar`.`namaPengelola_perpus`, `perpus_daftar`.`id_alamatPerpus`, `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`noTelepon_perpus`, `perpus_alamat`.`jalan` 
                                    FROM `perpus_daftar` 
                                    JOIN `perpus_alamat` ON `perpus_daftar`.`id_alamatPerpus` = `perpus_alamat`.`id_alamatPerpusAktif` 
                                    WHERE id_perpus = $id_perpus ";
                    $resultQuery_perpus = mysqli_query($conn, $queryPerpus);
                    $resultQuery_perpus = mysqli_fetch_assoc($resultQuery_perpus);

                    $id_alamatPerpus = $resultQuery_perpus['id_alamatPerpus'];
                    $namaPenerima = $resultQuery_perpus['namaPengelola_perpus'];
                    $nama_perpus =  $resultQuery_perpus['nama_perpus'];
                    $noTelepon_perpus  = $resultQuery_perpus['noTelepon_perpus'];
                    $alamat = $resultQuery_perpus['jalan'];
                    
                    // Query Donatur
                    $queryDonatur = "SELECT `donatur_daftar`.`nama_donatur` FROM `donatur_daftar` WHERE id_loginDonatur = '$id_loginDonatur' ";
                    $resultQuery_donatur = mysqli_query($conn, $queryDonatur);
                    $resultQuery_donatur = mysqli_fetch_assoc($resultQuery_donatur);
                    
                    $namaPengirim = $resultQuery_donatur['nama_donatur'];
                    $date = time()+60*7*7;
                    $date = date('Ymd', $date);
                    $querySelectKonfirm = "SELECT MAX(id_detail) as 'index' FROM `donasi_detail`";
                    $hasilSelect = mysqli_query($conn, $querySelectKonfirm);

                    $index;
                    if (mysqli_num_rows($hasilSelect) == NULL) {
                        $index = 1;
                    } else {
                        $hasilSelect = mysqli_fetch_assoc($hasilSelect);
                        $kodeSelect = $hasilSelect['index'];
                        $index = (int) substr($kodeSelect, 14, 4);
                        $index++;
                    }
                    $resultNumber =  'BOEBOE'.$date. sprintf("%04s", $index);
                    $index = $resultNumber;
                    
                    // Query Insert Detail
                    $queryDetail = "INSERT INTO `donasi_detail`(`id_detail`, `id_alamatPerpus`, `id_loginDonatur`, `nama_penerima`, `nama_pengirim`, `nama_perpustakaan`, `alamat_penerima`, `noTelepon_penerima`) VALUES ('$index','$id_alamatPerpus','$id_loginDonatur','$namaPenerima','$namaPengirim','$nama_perpus','$alamat','$noTelepon_perpus')";
                    mysqli_query($conn, $queryDetail);
                        
                    // Query Insert Konfirm
                    $queryKonfirm = "INSERT INTO `donasi_konfirmasi`(`id_detail`, `id_konfirmasi`, `id_konfirmasiPerpus`, `bukti_donasi`, `status_donasi`) VALUES ('$index',NULL,'$id_akunPerpus','Upload Bukti Donasi','Donasi Sedang Dikirim')";
                    
                    if (mysqli_query($conn, $queryKonfirm)) {
                        echo "<script>alert('Silahkan print dan tempel'); window.location.href='infoPengiriman.php?id=$index'; </script>";
                    }

                    unset($_SESSION['id_kategori']);
                    unset($_SESSION['id_akunPerpus']);
                    unset($_SESSION['nama_perpus']);
                }
        ?>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>