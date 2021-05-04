<?php 

      require_once "config.php";
      
      // Alamat Donatur Dari Form
      $alamat_donatur = htmlspecialchars($_POST['alamat_donatur']);
      $kodePos_donatur = htmlspecialchars($_POST['kodePos_donatur']);

      // Query Insert
      $queryAlamatDonatur = "INSERT INTO `donatur_alamat` (`id_alamatDonaturAktif`, `alamat`, `kodePos`) 
      VALUES (NULL, '$alamat_donatur', '$kodePos_donatur')";

      mysqli_query($conn, $queryAlamatDonatur);
      $id_alamatDonatur = mysqli_insert_id($conn);

      // Akun Aktif
      $email_donatur = htmlspecialchars($_POST['email_donatur']);
      $password_donatur = mysqli_real_escape_string($conn ,$_POST["password_donatur"]);

      // Hash Password
      $password_donatur = password_hash($password_donatur, PASSWORD_DEFAULT);
      
      $queryAkunDonatur = "INSERT INTO `donatur_aktif` (`id_akunDonaturAktif`, `email_donatur`, `password_donatur`, `isActive`) 
      VALUES (NULL, '$email_donatur', '$password_donatur', '0')";

      mysqli_query($conn, $queryAkunDonatur);
      $id_loginDonatur = mysqli_insert_id($conn);

      // Daftar Donatur
      $email_donatur = htmlspecialchars($_POST['email_donatur']);
      $password_donatur = mysqli_real_escape_string($conn ,$_POST["password_donatur"]);
      $nama_donatur = htmlspecialchars($_POST['nama_donatur']);
      $noTelepon_donatur =  htmlspecialchars($_POST['noTelepon_donatur']);
      $tglLahir_donatur = htmlspecialchars($_POST['tglLahir_donatur']);
      $instansi_donatur = htmlspecialchars($_POST['instansi_donatur']);

      // Hash Password
      $password_donatur = password_hash($password_donatur, PASSWORD_DEFAULT);

      $queryDonatur = 
      "INSERT INTO `donatur_daftar`(`id_donatur`, `id_loginDonatur`, `email_donatur`, `password_donatur`, `nama_donatur`, `noTelepon_donatur`, `tglLahir_donatur`, `id_alamatDonatur`, `instansi_donatur`)
      VALUES (NULL, '$id_loginDonatur', '$email_donatur', '$password_donatur', '$nama_donatur', '$noTelepon_donatur', '$tglLahir_donatur', '$id_alamatDonatur', '$instansi_donatur' )";

      if (mysqli_query($conn, $queryDonatur)) {
            header("Location: ../index.php");
            exit;
      }

      echo "gagal ditambahkan";
      var_dump($queryDonatur);
?>