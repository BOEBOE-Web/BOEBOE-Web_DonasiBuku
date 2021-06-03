<?php 
    session_start();
    require "../action/config.php";

    $query = "SELECT perpus_daftar.nama_perpus, 
    perpus_alamat.provinsi, perpus_alamat.kabupaten_kota, perpus_daftar.id_perpus 
    FROM `perpus_daftar` JOIN `perpus_alamat` ON perpus_alamat.id_alamatPerpusAktif = perpus_daftar.id_alamatPerpus";
    
    $result = mysqli_query($conn, $query);
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
    <?php include "../css/perpustakaan.css"?>
    <?php include "../css/listPerpustakaan-responsive.css"?>
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
                            <ul class="dropdown-menu"
                                aria-labelledby="navbarDarkDropdownMenuLink">
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
    <footer>
        <p>Copyright &#169 2021 BoeBoe - Web Donasi Buku Bekas</p>
        <p>Made by OTAKU</p>
    </footer>
</body>

</html>