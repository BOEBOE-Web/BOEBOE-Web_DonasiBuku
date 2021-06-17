<?php
    session_start();
    include "../../action/config.php";
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-perpus-app/functionPerpus.php';

    //Seleksi data
    $id = $_SESSION['id_akunPerpus'];
    $result = konfirmasiDonasi($conn, $id);

    //Memanggil Header
    $style = array("../../public/css/konfirmasi.css", "../../public/css/konfirmasi-responsive.css");
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
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul style="display:unset; flex-wrap: unset;" class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
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
            <h1>Konfirmasi Donasi</h1>
            <?php while($data = mysqli_fetch_assoc($result)):?>
            <div class="grup">
                <h5>No Donasi : <?php echo $data['id_detail']; ?></h5>
                <p>Status : <?php echo $data['status_donasi']; ?></p>
                <p><i><?php echo konversidate(substr($data['id_detail'], 6, -4)); ?></i></p>
                <div>
                    <a href="editKonfirmasi.php?id=<?php echo $data['id_detail'];?>" class="btn btn-secondary col-md-4">Edit Status Donasi</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php footerHTML(); ?>
