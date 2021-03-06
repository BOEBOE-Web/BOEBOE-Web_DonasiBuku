<?php  
    // session_start();
    require "../action/config.php";
    include '../model/helper-public/functionPublic.php';

    //Seleksi data yang dibutuhkan
    $result = daftarPerpustakaan($conn);

    //Memanggil Header
    $style = array("../public/css/perpustakaan.css", "../public/css/perpustakaan-responsive.css");
    $pavicon = "../public/image/icon-b.png";
    headerHTML($pavicon, $style); 
?>

<body>
    <header>
        <div class="header">
            <img src="../public/image/logo-boeboe.png" alt="logo-boeboe">
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
                    <img src="../public/image/logo-boeboe.png" alt="logo-boeboe">
                </div>
                <ul style="padding: 0px !important;">
                    <li><a href="../index.php">Beranda</a></li>
                    <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                    <li><a href="#">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="#">Perpustakaan</a></li>
                <li><a href="#" class="masuk" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Masuk</a></li>
            </ul>
        </div>
    </header>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masuk Donatur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- FORM LOGIN -->
                    <form class="row g-3 needs-validation" method="POST" action="../action/action-donatur/loginDonatur.php" novalidate>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_donatur" id="inputEmail4" required>
                            <div class="invalid-feedback">
                                Email belum diisi.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password_donatur" id="inputPassword4"
                                required>
                            <div class="invalid-feedback">
                                Password belum diisi
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary col-12">Masuk</button>
                        </div>
                        <div>Belum punya akun donatur? <span class="klik"><a href="../view/donatur-app/registerDonatur.php">Daftar
                                    disini</a></span></div>
                    </form>
                    <!-- END FORM LOGIN -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;">
                        <h5 class="modal-title">Perpustakaan</h5>
                    </div>
                    <div>Masuk perpustakaan <span class="klik"><a href="../view/perpus-app/masukPerpus.php">disini</a></span>
                    </div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="../view/perpus-app/registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main-perpus">
        <h1>Perpustakaan</h1>
        <div class="perpus-content">
        <?php while($data = mysqli_fetch_assoc($result)):?> 
            <a class="content" href="lihatPerpus.php?id=<?php echo $data['id_perpus'];?>">
                <h5><?php echo $data['nama_perpus']?></h5>
                <p><?php echo $data['provinsi']?></p>
                <p><?php echo $data['kabupaten_kota']?></p>
            </a>
        <?php endwhile; ?>
        </div>
    </div>
    <?php footerHTML(); ?>