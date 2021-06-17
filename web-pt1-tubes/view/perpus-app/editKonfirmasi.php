<?php
    session_start();
    require "../../action/config.php";
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-perpus-app/functionPerpus.php';

    //Seleksi data
    $id = $_GET['id'];
    $id_login = $_SESSION['id_akunPerpus'];
    $result = editDonasiKonfirmasi($conn, $id);

    //Memanggil Header
    $style = array("../../public/css/konfirmasi.css", "../../public/css/editKonfirmasi-responsive.css");
    $pavicon = "../../public/image/icon-b.png";
    headerHTML($pavicon, $style); 
    $options = array('Donasi telah diterima', 'Donasi belum sampai', 'Buku yang didonasikan tidak sesuai');
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
                                <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
                            <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="konfirmasi-content">
        <h1>Edit Status Donasi</h1>
        <h5 style="text-align: center;">No Donasi : <?php echo $result['id_detail'];?></h5>
        <h5 class="mt-4">Foto Buku</h5>
        <img class="img-editKonfirmasi" src="../../<?php echo $result['foto_buku'];?>">
        <h5 class="mt-4">Detail Buku</h5>
        <p>Jumlah Buku      : <?php echo $result['jumlah_buku']; ?></p>
        <p>Judul Buku       : <?php echo $result['judul_buku']; ?></p>
        <p>Kategori Buku    : <?php echo $result['kategori_buku']; ?></p>
        <p>Nama Penulis     : <?php echo $result['nama_penulis']; ?></p>
        <p>Nama Penerbit    : <?php echo $result['nama_penerbit']; ?></p>
        <p>Tahun Terbit     : <?php echo $result['tahun_terbit']; ?></p>

        <form method="POST" enctype="multipart/form-data" validated>
        <div class="form-group mt-3">
            <div class="row">
                <div class="col-md-3">
                    <label>Status Donasi</label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" name="status_donasi">
                                <option selected disabled value=""><?php echo $result['status_donasi'];?></option>
                        <?php if ($result['status_donasi'] == 'Donasi telah diterima' || $result['status_donasi'] == 'Buku yang didonasikan tidak sesuai'):?>
                                <?php foreach($options as $o): ?>
                                    <option disabled><?= $o ?></option>
                        <?php endforeach; 
                            else: 
                                foreach($options as $o): ?>
                                    <option ><?= $o ?></option>
                        <?php endforeach;
                            endif;?>
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
        <p style="padding-top: 20px; color: #dc3545">Konfirmasi donasi hanya dapat dilakukan 1x saja*</p>
        <div class="form-group mt-5">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-primary col-12" href="konfirmasi.php">Batal</a>
                </div
                <?php if(isset($result['status_donasi']) == 'Donasi telah diterima' || ($result['status_donasi']) == 'Buku yang didonasikan tidak sesuai'): ?>>
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
	        $idKonfirmasi = $result['id_konfirmasi'];
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
                        $moveFile = 'public/image/upload-donasi/bukti-donasi/'. $name;
                        move_uploaded_file($tmpFile, '../../'.$moveFile );
                        $query = "UPDATE `donasi_konfirmasi` SET `bukti_donasi` = '$moveFile', `status_donasi` = '$status_donasi' 
                        WHERE id_konfirmasi = $idKonfirmasi ";
                        
                        if(mysqli_query($conn, $query)) {
                            echo "<script>alert('Bukti Donasi Telah Di Upload'); window.location.href = 'konfirmasi.php';</script>";
                        } else {
                            echo "<script>alert('Bukti Donasi Gagal Upload'); window.location.href = 'konfirmasi.php';</script>";
                        }
                    } else {
                        echo "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = 'konfirmasi.php';</script>";
                    } 
                }else {
                        echo "<script>alert('Ekstensi Tidak Mendukung'); window.location.href = 'konfirmasi.php';</script>";
                }
            }
        }
        footerHTML();
    ?>
