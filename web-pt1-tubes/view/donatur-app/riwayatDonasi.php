<?php
    session_start();
    require "../../action/config.php";
    include '../../helper/function.php';

    $id = $_SESSION['id_loginDonatur'];
    $result = riwayatDonasi($conn, $id);

    //Memanggil Header
    $style = array("../../public/css/riwayat.css", "../../public/css/riwayat-responsive.css");
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
                                <li><a class="dropdown-item" href="../../action/logout.php">Log Out</a></li>
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
    <?php

    ?>
    <div class="riwayat-content">
        <h1>Riwayat Donasi</h1>
        <?php while($data = mysqli_fetch_assoc($result)): ?>
        <div class="grup">
            <h5>No. Donasi : <?php echo $data['id_detail']; ?></h5>
            <p>Status : <?php echo $data['status_donasi']; ?></p>
            <?php if($data['bukti_donasi'] != 'Upload Bukti Donasi'): ?>
            <p><br/>Bukti Donasi : </p>
            <img class="img-riwayatDonasi" src="../../<?php echo $data['bukti_donasi']?>">
            <?php endif; ?>
            <p class="hover"><a href="infoPengiriman.php?id=<?php echo  $data['id_detail']; ?>">Detail Informasi Pengiriman</a></p>
        </div>
        <?php endwhile; ?>
    </div>
    <?php footerHTML(); ?>