<?php
  session_start();
  require '../../action/config.php';
  include '../../model/helper-public/functionPublic.php';
  include '../../model/helper-donatur-app/functionDonatur.php';
  
    // Cek Login
    if(!isset($_SESSION['email_donatur'])) {
      header('Location: ../../index.php');
    }

  //Seleksi Data Yang Dibutuhkan
  $id = $_GET['id'];
  $id = $_SESSION['id_loginDonatur'];
  $result = ubahProfileDonatur($conn, $id);

  //Menaggil Header
  $style = array("../../public/css/ubahProfile.css", "../../public/css/ubahProfile-responsive.css");
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
              <a class="masuk dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Profile
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dasborDonatur.php">Dasbor</a></li>
                <li><a class="dropdown-item" href="riwayatDonasi.php">Riwayat Donasi</a></li>
                <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
    </nav>
    <div class="navi">
      <ul>
        <li><a href="../index.php">Beranda</a></li>
        <li><a href="../index.php#tentang-kami">Tentang Kami</a></li>
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
              <li><a class="dropdown-item" href="../index.php">Log Out</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <div class="change-profile">
    <h1>Ubah Profile</h1>
    <!-- FORM -->
    <form class="row g-3 needs-validation" method="POST" novalidate>
      <div class="col-12">
        <label for="inputNama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama_donatur" id="inputNama" value="<?php echo $result['nama_donatur']; ?>" required>
      </div>
      <div class="col-md-6">
        <label for="formNomorTelepon" class="form-label">Nomor Telepon</label>
        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" class="form-control" name="noTelepon_donatur" id="formNomorTelepon"  value="<?php echo $result['noTelepon_donatur']; ?>"required>
      </div>
      <div class="col-md-6">
        <label for="formDate" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tglLahir_donatur" id="formDate"  value="<?php echo $result['tglLahir_donatur']; ?>"required>
      </div>
      <div class="mb-3" style="margin-bottom: 0px!important;">
        <label for="formAlamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="formAlamat" name="alamat_donatur" rows="3"><?php echo $result['alamat'];?></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputInstansi" class="form-label">Instansi</label>
        <select class="form-select" name="instansi_donatur" id="inputInstansi">
          <option selected value="<?php echo $result['instansi_donatur']; ?>"><?php echo $result['instansi_donatur']; ?></option>
          <option value="Perusahaan">Perusahaan</option>
          <option value="Lembaga">Lembaga</option>
          <option value="Perorangan">Perorangan</option>
          <option value="Komunitas">Komunitas</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="formKodePos" class="form-label">Kode Pos</label>
        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" class="form-control" name="kodePos" id="formKodePos" value="<?php echo $result['kodePos']; ?>"required>
      </div>
      <div class="col-md-6">
        <a class="btn btn-secondary col-12" href="dasborDonatur.php">Batal</a>
      </div>
      <div class="col-md-6">
        <button type="submit" name="simpan" class="btn btn-primary col-12" ">Simpan Perubahan</button>
      </div>
    </form>
    <!-- END FORM -->
    <?php
          if(isset($_POST['simpan'])) {
            //Mengambil input data dari form
            $id_donatur = $id;
            $id_alamatDonatur = $result['id_alamatDonatur'];
            $nama_donatur = htmlspecialchars($_POST['nama_donatur']);
            $nomorTelepon = htmlspecialchars($_POST['noTelepon_donatur']);
            $tglLahir = htmlspecialchars($_POST['tglLahir_donatur']);
            $alamat = htmlspecialchars($_POST['alamat_donatur']);
            $instansi = htmlspecialchars($_POST['instansi_donatur']);
            $kodePos = htmlspecialchars($_POST['kodePos']);
            
            $queryUpdate = "UPDATE `donatur_daftar`, `donatur_alamat`
            SET nama_donatur = '$nama_donatur', noTelepon_donatur = '$nomorTelepon',  tglLahir_donatur = '$tglLahir', alamat = '$alamat', instansi_donatur = '$instansi', kodePos = '$kodePos' 
            WHERE id_donatur = '$id_donatur' AND id_alamatDonatur = '$id_alamatDonatur' ";

            if (mysqli_query($conn, $queryUpdate)){
              echo "<script>alert('Data Berhasil Diubah'); 
                    window.location.href = 'dasborDonatur.php';	
                    </script>";
            }
          }
      ?>
  </div>
  <?php 
        //Memanggil Footer
        $script = '<script src="../../js/script.js"></script>';
        footerHTML($script); 
  ?>
