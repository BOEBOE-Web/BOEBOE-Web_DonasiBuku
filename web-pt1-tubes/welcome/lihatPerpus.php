<?php  
    session_start();
    require "../action/config.php";
    include '../helper/function.php';

    //Seleksi data yang dibutuhkan
    $id = $_GET['id'];
    $data = detailPerpustakaan($conn, $id);

    //Memanggil Header
    $style = array("../public/css/pilihPerpus.css", "../public/css/pilihPerpus-responsive.css");
    headerHTML($style); 
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
                    <li><a href="daftarPerpustakaan.php">Perpustakaan</a></li>
                    <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
                </ul>
            </nav>
        </nav>
        <div class="navi">
            <ul>
                <li><a href="../index.php">Beranda</a></li>
                <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
                <li><a href="daftarPerpustakaan.php">Perpustakaan</a></li>
                <li><a href="#" class="masuk" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</a></li>
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
                            <input type="password" class="form-control" name="password_donatur" id="inputPassword4" required>
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
                        <div>Belum punya akun donatur? <span class="klik"><a href="../view/donatur-app/registerDonatur.php">Daftar disini</a></span></div>
                    </form>
                    <!-- END FORM LOGIN -->
                </div>
                <div class="modal-footer">
                    <div style="width: 100%;">
                        <h5 class="modal-title">Perpustakaan</h5>
                    </div>
                    <div>Masuk perpustakaan <span class="klik"><a href="../view/perpus-app/masukPerpus.php">disini</a></span></div>
                    <div>Mendaftar Sebagai Perpustakaan? <span class="klik"><a href="../view/perpus-app/registerPerpus.php">Klik disini</a></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->
    <div class="main">
        <div class="main-content">
            <div class="row">
                <h1 class="col-10">Perpustasakaan <?php echo $data['nama_perpus'];?></h1>
            </div>
            <div class="content">
                <div style="width: 30%;">
                    <img src="../<?php echo $data['gambar_perpus'];?>" alt="Perpustakaan">
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
                        <h5>Kategori Kebutuhan Buku:</h5>
                        <p><?php echo $data['jenis_kategori'];?></p>
                    </div>
                    <div>
                        <h5>Tentang Perpustakaan:</h5>
                        <p><?php echo $data['tentang_perpus'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php footerHTML(); ?>