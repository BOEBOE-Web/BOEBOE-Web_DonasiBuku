<?php
    session_start();
    require "../../action/config.php";
    include '../../helper/function.php';

    $id = $_GET['id'];
    $data = detailPerpustakaan($conn, $id);

    //Memanggil Header
    $style = array("../../public/css/pilihPerpus.css", "../../public/css/pilihPerpus-responsive.css");
    headerHTML($style); 
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
                                <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
                                <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
                    <a href="donasi.php" class="btn btn-primary col-2" type="button" style="height: 38px">Donasi Sekarang</a>
                </div>
                <div class="content">
                    <div style="width: 30%;">
                        <img src="../../<?php echo $data['gambar_perpus'];?>" alt="Perpustakaan">
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
        <?php footerHTML(); ?>