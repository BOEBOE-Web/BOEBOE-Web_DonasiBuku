<?php 

      require_once "db.php";
      
      // Alamat Donatur
      $provinsi = $_POST['provinsi'];
      $kota_kabupaten = $_POST['kota_kabupaten'];
      $kecamatan = $_POST['kecamatan'];
      $kodePos = $_POST['kodePos'];

      $queryAlamatDonatur = "INSERT INTO `alamat_donatur` (`id_alamatDonaturAktif`, `provinsi`, `kota_kabupaten`, `kecamatan`, `kode pos`) 
      VALUES (NULL, '$provinsi', '$kota_kabupaten', '$kecamatan', '$kodePos')";

      mysqli_query($koneksi, $queryAlamatDonatur);
      $id_alamatDonatur = mysqli_insert_id($koneksi);

      // Akun Aktif
      $email_donatur = $_POST['email_donatur'];
      $password_donatur = $_POST['password_donatur'];

      $queryAkunDonatur = "INSERT INTO `donatur_aktif` (`id_akunDonaturAktif`, `email_donatur`, `password_donatur`) 
      VALUES (NULL, '$email_donatur', '$password_donatur')";

      mysqli_query($koneksi, $queryAkunDonatur);
      $id_loginDonatur = mysqli_insert_id($koneksi);

      // Daftar Donatur
      $email_donatur = $_POST['email_donatur'];
      $password_donatur = $_POST['password_donatur'];
      $nama_donatur = $_POST['nama_donatur'];
      $nomorHP_donatur =  $_POST['nomorHP_donatur'];
      $tanggalLahir_donatur = $_POST['tanggalLahir_donatur'];
      $instansi_donatur = $_POST['instansi_donatur'];

      $queryDonatur = 
      "INSERT INTO daftar_donatur (`id_donatur`, `id_loginDonatur`, `email_donatur`, `password_donatur`, `nama_donatur`,`nomorHP_donatur`, `tanggalLahir_donatur`, `id_alamatDonatur`, `instansi_donatur`)
      VALUES (NULL, '$id_loginDonatur', '$email_donatur', '$password_donatur', '$nama_donatur', '$nomorHP_donatur', '$tanggalLahir_donatur', '$id_alamatDonatur', '$instansi_donatur' )";

      if (mysqli_query($koneksi, $queryDonatur)) {
            header("Location: ../index.php");
            exit;
      }

      echo "gagal ditambahkan";
?>