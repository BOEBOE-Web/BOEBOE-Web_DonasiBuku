<?php 
    session_start();
    require '../../action/config.php';
    include '../../model/helper-public/functionPublic.php';
    include '../../model/helper-perpus-app/functionPerpus.php';
    
    // Cek Login
    if(!isset($_SESSION['id_akunPerpus'])) {
        header("Location: ../../index.php");
        exit();
    }

    //Seleksi data
    $email_perpus = $_SESSION['email_perpus'];
    $result = profilePerpustakaan($conn, $email_perpus);

    //Memanggil Header
    $style = array("../../public/css/dasborPerpus.css", "../../public/css/dasborPerpus-responsive.css");
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
                                <li><a class="dropdown-item" href="../../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
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
                            <li><a class="dropdown-item" href="../../action/logout.php" onclick="return confirm('Anda Yakin ?')">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="dasbor-content">
        <h1>Dasbor Perpus</h1>

        <div class="content">
            <div class="das" style="width: 30%;">
                <img style="min-widht: 165px; min-height: 248px;max-widht: 165px; max-height: 248px;" src="../../<?php echo $result['gambar_perpus']?>"
                    alt="gambar erpustakaan">
                <h5 style="margin: 15px 0; text-align: center;"><?php echo $result['nama_perpus']; ?></h5>
                <a href="ubahProfilePerpus.php?id=<?php echo $result['id_perpus']; ?>" class="btn btn-primary col-12">Ubah Profile</a>
            </div>

            <div class="display-one">
                <div>
                    <h5>Nama Pengelola:</h5>
                    <p> <?php echo $result['namaPengelola_perpus']; ?> </p>
                </div>
                <div>
                    <h5>Nomor Telepon:</h5>
                    <p><?php echo $result['noTelepon_perpus']; ?></p>
                </div>
                <div>
                    <h5>Provinsi:</h5>
                    <p><?php echo $result['provinsi']; ?></p>
                </div>
                <div>
                    <h5>Kab/Kota:</h5>
                    <p><?php echo $result['kabupaten_kota']; ?></p>
                </div>
                <div>
                    <h5>Jalan:</h5>
                    <p><?php echo $result['jalan']; ?></p>
                </div>
                <div>
                    <h5>Kode Pos:</h5>
                    <p><?php echo $result['kodePos']; ?></p>
                </div>
            </div>
            <div class="display-two">
                <div>
                    <h5>Email:</h5>
                    <p><?php echo $result['email_perpus']; ?></p>
                </div>
                <div>
                    <h5>Tahun Berdiri:</h5>
                    <p><?php echo $result['tahunBerdiri_perpus']; ?></p>
                </div>
                <div>
                    <h5>No. Izin Operasional:</h5>
                    <p><?php echo $result['noIzin_perpus']; ?></p>
                </div>
                <div>
                    <h5>Kategori Kebutuhan Buku:</h5>
                    <p><?php echo $result['jenis_kategori']; ?></p>
                </div>
                <div>
                    <h5>Tentang Perpustakaan:</h5>
                    <p><?php echo $result['tentang_perpus']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php footerHTML(); ?>
