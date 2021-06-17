<?php 
    session_start();
    require "../../action/config.php";
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-perpus-app/functionPerpus.php';

    $result = daftarPerpustakaan($conn);

    //Memanggil Header
    $style = array("../../public/css/perpustakaan.css", "../../public/css/listPerpustakaan-responsive.css");
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
                            <a class="masuk dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu"
                                aria-labelledby="navbarDarkDropdownMenuLink">
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
    <div class="main-perpus">
        <h1>Perpustakaan</h1>
        <div class="perpus-content">
        <?php while($data = mysqli_fetch_assoc($result)):?>
            <a class="content" href="detailPerpus.php?id=<?php echo $data['id_perpus']; ?>">
                <h5><?php echo $data['nama_perpus']?></h5>
                <p><?php echo $data['provinsi']?></p>
                <p><?php echo $data['kabupaten_kota']?></p>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
    <?php footerHTML(); ?>