<?php 
      session_start();
      require_once "config.php";
      
      //Cek data donatur
      $email_donatur = htmlspecialchars($_POST['email_donatur']);
      $queryEmail = "SElECT * FROM `donatur_daftar` WHERE email_donatur = '$email_donatur' ";
      $cekEmail = mysqli_num_rows(mysqli_query($conn, $queryEmail));
      
      if ($cekEmail > 0) {
            echo "<script>document.location.href='../index.php';alert('Email anda sudah ada');</script>";
      } else {
            //Insert alamat
            $alamat_donatur = htmlspecialchars($_POST['alamat_donatur']);
            $kodePos_donatur = htmlspecialchars($_POST['kodePos_donatur']);

            $queryAlamatDonatur = "INSERT INTO `donatur_alamat` (`id_alamatDonaturAktif`, `alamat`, `kodePos`) 
            VALUES (NULL, '$alamat_donatur', '$kodePos_donatur')";

            mysqli_query($conn, $queryAlamatDonatur);
            $id_alamatDonatur = mysqli_insert_id($conn);

            //Insert akun
            $email_donatur = htmlspecialchars($_POST['email_donatur']);
            $password_donatur = mysqli_real_escape_string($conn ,$_POST["password_donatur"]);

            // Hash Password
            $password_donatur = password_hash($password_donatur, PASSWORD_DEFAULT);
            
            $queryAkunDonatur = "INSERT INTO `donatur_aktif` (`id_akunDonaturAktif`, `email_donatur`, `password_donatur`) 
            VALUES (NULL, '$email_donatur', '$password_donatur')";

            mysqli_query($conn, $queryAkunDonatur);
            $id_loginDonatur = mysqli_insert_id($conn);

            // Daftar Donatur
            $nama_donatur = htmlspecialchars($_POST['nama_donatur']);
            $noTelepon_donatur =  htmlspecialchars($_POST['noTelepon_donatur']);
            $tglLahir_donatur = htmlspecialchars($_POST['tglLahir_donatur']);
            $instansi_donatur = htmlspecialchars($_POST['instansi_donatur']);

            $queryDonatur = 
            "INSERT INTO `donatur_daftar`(`id_donatur`, `id_loginDonatur`, `email_donatur`,  `nama_donatur`, `noTelepon_donatur`, `tglLahir_donatur`, `id_alamatDonatur`, `instansi_donatur`)
            VALUES (NULL, '$id_loginDonatur', '$email_donatur', '$nama_donatur', '$noTelepon_donatur', '$tglLahir_donatur', '$id_alamatDonatur', '$instansi_donatur' )";

            if (mysqli_query($conn, $queryDonatur)) {
                  echo "<script>document.location.href='../index.php';alert('Anda berhasil mendaftar, silahkan masuk!');</script>";
            } else {
                  echo mysqli_error($conn);
                  // var_dump($queryDonatur);
                  var_dump(mysqli_query($conn, $queryDonatur));
                  die;
                  echo "<script>document.location.href='../index.php';alert('Data anda gagal ditambahkan');</script>";
            }
      }


?>