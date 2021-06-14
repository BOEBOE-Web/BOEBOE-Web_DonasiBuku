<?php 
    // session_start();
    // if(!isset($_SESSION['id_akunPerpus'])) {
    //     header("Location: ../index.php");
    //     exit();
    // }
    // require "../action/config.php";

    // $id = $_GET['id'];
    // $id_login = $_SESSION['id_akunPerpus'];
    // $querySelect = "SELECT `perpus_daftar`.`gambar_perpus`, `perpus_daftar`.`tentang_perpus`, `perpus_daftar`.`noTelepon_perpus`, `perpus_daftar`.`id_kategoriPerpus`, `perpus_daftar`.`id_alamatPerpus`, `perpus_daftar`.`noIzin_perpus`, `perpus_daftar`.`tahunBerdiri_perpus`, `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`namaPengelola_perpus`, `perpus_daftar`.`id_loginPerpus`, `perpus_alamat`.`kodePos`, `perpus_alamat`.`jalan`, `perpus_alamat`.`rw`, `perpus_alamat`.`rt`, `perpus_alamat`.`desa_kelurahan`, `perpus_alamat`.`kecamatan`, `perpus_alamat`.`kabupaten_kota`, `perpus_alamat`.`provinsi`, `perpus_alamat`.`id_alamatPerpusAktif`, `kategori_kebutuhan`.`jenis_kategori`, `kategori_kebutuhan`.`id_kategori` FROM `perpus_daftar` 
    // JOIN `perpus_alamat` ON `perpus_daftar`.id_alamatPerpus= `perpus_alamat`.`id_alamatPerpusAktif` 
    // JOIN `kategori_kebutuhan` ON `perpus_daftar`.`id_kategoriPerpus` = `kategori_kebutuhan`.id_kategori 
    // WHERE `perpus_daftar`.`id_loginPerpus` = '$id_login' ";
    
    // $result = mysqli_query($conn, $querySelect);
    // $result = mysqli_fetch_assoc($result);
    
    // // For Input Data Kategori
    // $arrKategori = ["Pendidikan", "Anak-anak", "Komputer & Teknologi", "Novel", "Kamus", "Kedokteran", "Sejarah", "UTBK"];
    // $dataKategori = $result['jenis_kategori'];
    // $dataKategori = explode(',',$dataKategori);
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
    <?php include "../css/ubahProfile.css" ?>
    <?php include "../css/ubahProfilePerpus-responsive.css" ?>
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
    <div class="change-profile">
        <h1>Ubah Profile</h1>
        <!-- FORM -->
        <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            <div class="col-12">
                <label for="formFile" class="form-label">Foto Perpustakaan</label>
                <input class="form-control" type="file" name="gambar_perpus" id="formFile">
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label class="form-label">Daftar Kebutuhan Buku</label><br>
                <?php foreach($arrKategori as $kategori): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jenis_kategori[]" value="<?php echo $kategori; ?>" <?php if(in_array($kategori, $dataKategori)) echo 'checked';?> >
                    <label class="form-check-label" for="flexCheck0">
                        <?php echo $kategori; ?>
                    </label>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="aboutLibrary" class="form-label">Tentang Perpustakaan</label>
                <textarea class="form-control" id="aboutLibrary" name="tentang_perpus" rows="3"><?php echo $result['tentang_perpus']; ?></textarea>
            </div>
            <div style="border-bottom: 1px solid #0F4C75;"></div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Pengelola</label>
                <input type="text" class="form-control" name="namaPengelola_perpus" id="inputNama" value="<?php echo $result['namaPengelola_perpus']; ?>"required>
            </div>
            <div class="col-12">
                <label for="inputNama" class="form-label">Nama Perpustakaan</label>
                <input type="text" class="form-control" name="nama_perpus" id="inputNama" value="<?php echo $result['nama_perpus']; ?>">
            </div>
            <div class="col-md-6">
                <label for="datepicker" class="form-label">Tahun Berdiri</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4"
                class="form-control" name="tahunBerdiri_perpus" id="datepicker" value="<?php echo $result['tahunBerdiri_perpus']; ?>"required>
            </div>
            <div class="col-md-6">
                <label for="formNoIzin" class="form-label">No. Izin Operasional</label>
                <input type="number" class="form-control" name="noIzin_perpus" id="formNoIzin" value="<?php echo $result['noIzin_perpus']; ?>"required>
            </div>
            <div class="col-md-6">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" class="form-control" name="provinsi" id="provinsi" value="<?php echo $result['provinsi']; ?>"required>
            </div>
            <div class="col-md-6">
                <label for="kabkota" class="form-label">Kab/Kota</label>
                <input type="text" class="form-control" name="kabupaten_kota" id="kabkota" value="<?php echo $result['kabupaten_kota']; ?>"required>
            </div>
            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $result['kecamatan']; ?>"required>
            </div>
            <div class="col-md-4">
                <label for="desa-kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control" name="desa_kelurahan" id="desa-kelurahan" value="<?php echo $result['desa_kelurahan']; ?>"required>
            </div>
            <div class="col-md-2">
                <label for="form-rt" class="form-label">RT</label>
                <input type="number" class="form-control" name="rt" id="form-rt" value="<?php echo $result['rt']; ?>"required>
            </div>
            <div class="col-md-2">
                <label for="form-rw" class="form-label">RW</label>
                <input type="number" class="form-control" name="rw" id="form-rw" value="<?php echo $result['rw']; ?>"required>
            </div>
            <div class="mb-3" style="margin-bottom: 0px!important;">
                <label for="form-jalan" class="form-label">Jalan</label>
                <textarea class="form-control" id="form-jalan"name="jalan" rows="2"><?php echo $result['jalan']; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="form-kodepos" class="form-label">Kode Pos</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5"
                class="form-control" name="kodePos" id="form-kodepos" value="<?php echo $result['kodePos']; ?>"required>
            </div>
            <div class="col-md-6">
                <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15"
                class="form-control" name="noTelepon_perpus" id="formNomorTelepon" value="<?php echo $result['noTelepon_perpus']; ?>"required>
            </div>
            <div class="col-md-6">
                <a class="btn btn-secondary col-12" onclick="confirm('Ingin kembali tanpa perubahan ?')" href="dasborPerpus.php">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" name="simpan" class="btn btn-primary col-12" onclick="confirm('Yakin dengan perubahan ?')">Simpan Perubahan</button>
            </div>
        </form>
        <!-- END FORM -->
        <?php
            if(isset($_POST['simpan'])) {
                $id_perpus = $id;
                $id_kategoriPerpus = $result['id_kategoriPerpus'];
                
                // For Upload gambar profile
                $cek_ekstensi = array('jpg','png','jpeg');
                $name = $_FILES['gambar_perpus']['name'];
                $size = $_FILES['gambar_perpus']['size'];
                $tmpCek = explode('.', $name);
                $extensi = strtolower(end($tmpCek));
                $tmpFile = $_FILES['gambar_perpus']['tmp_name'];
                
                if ($size == 0) {
                    // Do Nothing
                } else {
                    // Jalankan Update
                    if(in_array($extensi, $cek_ekstensi) == true) {
                        if($size < 1000000) {
                            $moveFile = 'image/profile-perpus/upload-user/'. $name;
                            move_uploaded_file($tmpFile, '../'.$moveFile );
                            $query = "UPDATE `perpus_daftar` SET `gambar_perpus` = '$moveFile' WHERE id_loginPerpus = $id_login ";
                            
                            if(mysqli_query($conn, $query)) {
                                echo "<script>alert('Gambar Berhasil Upload'); window.location.href = 'dasborPerpus.php';</script>";
                            } else {
                                echo "<script>alert('Gambar Gagal Upload'); window.location.href = 'ubahProfilePerpus.php?id=';</script>";
                            }
                        } else {
                            echo "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = 'ubahProfilePerpus.php?id=';</script>";
                        } 
                    }else {
                            echo "<script>alert('Ekstensi Tidak Mendukung'); window.location.href = 'ubahProfilePerpus.php?id=';</script>";
                    }
                }

                // For Update `kategori_kebutuhan`
                $for_query = '';
                foreach($_POST["jenis_kategori"] as $jenis_kategori){
                    $for_query .= $jenis_kategori . ',';
                }
                $for_query = substr($for_query, 0, -1);
                $query = "UPDATE `kategori_kebutuhan` SET `jenis_kategori` = '$for_query' 
                WHERE `kategori_kebutuhan`.id_kategori = '$id_kategoriPerpus' ";
                mysqli_query($conn, $query);

                // For Update `perpus_daftar` & `perpus_alamat`
                $id_alamatPerpus = $result['id_alamatPerpus'];
                $nama_perpus = $_POST['nama_perpus'];
                $namaPengelola_perpus = $_POST['namaPengelola_perpus'];
                $tentang_perpus = $_POST['tentang_perpus'];
                $tahunBerdiri_perpus = $_POST['tahunBerdiri_perpus'];
                $noIzin_perpus = $_POST['noIzin_perpus'];
                $provinsi = $_POST['provinsi'];
                $kabupaten_kota = $_POST['kabupaten_kota'];
                $kecamatan = $_POST['kecamatan'];
                $desa_kelurahan = $_POST['desa_kelurahan'];
                $rt = $_POST['rt'];
                $rw = $_POST['rw'];
                $jalan = $_POST['jalan'];
                $kodePos = $_POST['kodePos'];
                $noTelepon = $_POST['noTelepon_perpus'];

                $queryUpdatePerpusDaftar = "UPDATE `perpus_daftar`
                SET `nama_perpus` = '$nama_perpus', `tentang_perpus` = '$tentang_perpus', `namaPengelola_perpus` = '$namaPengelola_perpus', `noTelepon_perpus` = '$noTelepon',  `tahunBerdiri_perpus` = '$tahunBerdiri_perpus', `noIzin_perpus` = '$noIzin_perpus'
                WHERE `id_perpus` = '$id_perpus' ";
                mysqli_query($conn, $queryUpdatePerpusDaftar);
                
                $queryUpdatePerpusAlamat = "UPDATE `perpus_alamat`
                SET `provinsi` = '$provinsi', `kabupaten_kota` = '$kabupaten_kota', `kecamatan` = '$kecamatan', `desa_kelurahan` = '$desa_kelurahan', rt = '$rt', `rw` ='$rw', `jalan` = '$jalan', `kodePos` = '$kodePos'  
                WHERE `id_alamatPerpusAktif` = '$id_alamatPerpus' ";
                // var_dump($queryUpdatePerpusAlamat);
                // die;
                if (mysqli_query($conn, $queryUpdatePerpusAlamat)) {
                    echo "<script>alert('Data Berhasil Diubah'); window.location.href = 'dasborPerpus.php';</script>";
                }

            }
        ?>
    </div>
    <footer>
        <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
        <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
    </footer>
    <script src=" ../js/script.js"></script>
</body>

</html>