<?php
    session_start();
    require "../../action/config.php";
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-donatur-app/functionDonatur.php';

    // Cek Login
    if(!isset($_SESSION['email_donatur'])) {
        header('Location: ../../index.php');
    }

    $queryPerpus = "SELECT `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`id_perpus` 
    FROM `perpus_daftar` ";
    $resultData_perpus = mysqli_query($conn, $queryPerpus);
    
    //Memanggil Header
    $style = array("../../public/css/donasi.css", "../../public/css/donasi-responsive.css");
    $pavicon = "../../public/image/icon-b.png";
    headerHTML($pavicon, $style);  
?>
<body>
    <header>
        <div class="header">
            <img src="../../public/image/logo-boeboe.png" alt="logo-boeboe">
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
                    <img src="../../public/image/logo-boeboe.png" alt="logo-boeboe">
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
                                <li><a class="dropdown-item" href="../../action/logout.php"
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
                            <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
            <p style="padding-top: 20px; color: #dc3545">Pastikan data yang anda masukkan sudah benar, sebelum menekan tombol kirim*</p>
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
                    $kategori_kebutuhan = htmlspecialchars($_POST['kategori_kebutuhan']);
                    $judul_buku = htmlspecialchars($_POST['judul_buku']);
                    $jumlah_buku = htmlspecialchars($_POST['jumlah_buku']);
                    $nama_penulis = htmlspecialchars($_POST['nama_penulis']);
                    $nama_penerbit = htmlspecialchars($_POST['nama_penerbit']);
                    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
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
                    $id_donasiBuku = '';
                    if ($size > 1000000) {
                        // Tidak lakukan apapun
                    } else {
                        // Jalankan Insert Foto
                        if(in_array($extensi, $cek_ekstensi) == true) {
                            if($size < 1000000) {
                                $moveFile = 'public/image/upload-donasi/donasi-buku/'. $name;
                                move_uploaded_file($tmpFile, '../../'.$moveFile );
                                
                                $queryInsertDonasi = "INSERT INTO `donasi_buku`(`id_donasiBuku`, `id_loginDonatur`, `id_kategoriKebutuhan`, `nama_perpus`, `jumlah_buku`, `judul_buku`, `kategori_buku`, `nama_penulis`, `nama_penerbit`, `tahun_terbit`, `foto_buku`) 
                                                        VALUES (NULL,'$id_loginDonatur','$id_kategori','$nama_perpus','$jumlah_buku','$judul_buku','$kategori_kebutuhan','$nama_penulis','$nama_penerbit','$tahun_terbit','')";
                                mysqli_query($conn, $queryInsertDonasi);

                                var_dump($queryInsertDonasi);
                                var_dump(mysqli_query($conn, $queryInsertDonasi));

                                $id_donasi = mysqli_insert_id($conn);
                                $id_donasiBuku = $id_donasi;
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
                    if (mysqli_num_rows($hasilSelect) == 0) {
                        echo "kosong";
                        $index = 1;
                    } else {
                            echo "ada";
                            $hasilSelect = mysqli_fetch_assoc($hasilSelect);
                            $kodeSelect = $hasilSelect['index'];
                            $index = (int) substr($kodeSelect, 14, 4);
                            $index++;
                    }
                    $resultNumber =  'BOEBOE'.$date. sprintf("%04s", $index);
                    $index = $resultNumber;
                    
                    $queryDetail = "INSERT INTO `donasi_detail`(`id_detail`, `id_alamatPerpus`, `id_donasiBuku`, `nama_penerima`, `nama_pengirim`, `nama_perpustakaan`, `alamat_penerima`, `noTelepon_penerima`) VALUES ('$index','$id_alamatPerpus','$id_donasiBuku','$namaPenerima','$namaPengirim','$nama_perpus','$alamat','$noTelepon_perpus')";
                    mysqli_query($conn, $queryDetail);
                    
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
    <?php
        //Memanggil Footer
        $script = '<script src="../../public/js/script.js"></script>';
        footerHTML($script); 
    ?>