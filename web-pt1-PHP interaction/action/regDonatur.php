<?php 

      require_once "db.php";
      
      // Alamat Donatur
      $provinsi = $_POST['provinsi'];
      $kota_kabupaten = $_POST['kota_kabupaten'];
      $kecamatan = $_POST['kecamatan'];
      $kodePos = $_POST['kodePos'];

      $queryAlamat = "INSERT INTO `alamat_donatur` (`id_alamat`, `provinsi`, `kota_kabupaten`, `kecamatan`, `kode pos`) 
      VALUES (NULL, '$provinsi', '$kota_kabupaten', '$kecamatan', '$kodePos')";

      mysqli_query($koneksi, $queryAlamat);
      $idAlamat_donatur = mysqli_insert_id($koneksi);

      // Akun Aktif
      $email_donatur = $_POST['email_donatur'];
      $password_donatur = $_POST['password_donatur'];

      $queryAkun = "INSERT INTO `donatur_aktif` (`id_akun`, `email_donatur`, `password_donatur`) 
      VALUES (NULL, '$email_donatur', '$password_donatur')";
      
      mysqli_query($koneksi, $queryAkun);
      $id_login = mysqli_insert_id($koneksi);

      // Daftar Donatur
      $email_donatur = $_POST['email_donatur'];
      $password_donatur = $_POST['password_donatur'];
      $nama_donatur = $_POST['nama_donatur'];
      $nomorHP_donatur =  $_POST['nomorHP_donatur'];
      $tanggalLahir_donatur = $_POST['tanggalLahir_donatur'];
      $instansi_donatur = $_POST['instansi_donatur'];

      $queryDonatur = 
      "INSERT INTO daftar_donatur (`id_donatur`, `id_login`, `email_donatur`, `password_donatur`, `nama_donatur`,`nomorHP_donatur`, `tanggalLahir_donatur`, `idAlamat_donatur`, `instansi_donatur`)
      VALUES (NULL, '$id_login', '$email_donatur', '$password_donatur', '$nama_donatur', '$nomorHP_donatur', '$tanggalLahir_donatur', '$idAlamat_donatur', '$instansi_donatur' )";

      if (mysqli_query($koneksi, $queryDonatur)) {
            header("Location: ../index.php");
            exit;
      }

      echo "gagal ditambahkan";
?>