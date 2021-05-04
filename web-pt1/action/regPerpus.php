<?php 

      require_once "config.php";
      
      // Alamat perpus
      $provinsi = htmlspecialchars($_POST['provinsi_perpus']);
      $kota_kabupaten = htmlspecialchars($_POST['kab_kota_perpus']);
      $kecamatan = htmlspecialchars($_POST['kec_perpus']);
      $desa_kelurahan = htmlspecialchars($_POST['desa_kelurahan_perpus']);
      $rt = htmlspecialchars($_POST['rt_perpus']);
      $rw = htmlspecialchars($_POST['rw_perpus']);
      $jalan = htmlspecialchars($_POST['jalan_perpus']);
      $kodePos = htmlspecialchars($_POST['kodePos_perpus']);

      $queryAlamat = "INSERT INTO `perpus_alamat`(`id_alamatPurpusAktif`, `provinsi`, `kabupaten_kota`, `kecamatan`, `desa_kelurahan`, `rt`, `rw`, `jalan`, `kodePos`) 
      VALUES (NULL,'$provinsi','$kota_kabupaten','$kecamatan','$desa_kelurahan','$rt','$rw','$jalan','$kodePos')";

      mysqli_query($conn, $queryAlamat);
      $id_alamatPerpus = mysqli_insert_id($conn);
      
      // Akun Aktif
      $email_perpus = htmlspecialchars($_POST['email_perpus']);
      $password_perpus = mysqli_real_escape_string($conn, $_POST['password_perpus']);
      
      // Hash Password
      $password_perpus = password_hash($password_perpus, PASSWORD_DEFAULT);

      $queryAkun = "INSERT INTO `perpus_aktif`(`id_akunPerpus`, `email_perpus`, `password_perpus`, `isActive`) 
      VALUES (NULL,'$email_perpus','$password_perpus','0')";

      mysqli_query($conn, $queryAkun);
      $id_akunPerpus = mysqli_insert_id($conn);

      // Daftar perpus
      $email_perpus = htmlspecialchars($_POST['email_perpus']);
      $password_perpus = mysqli_real_escape_string($conn, $_POST['password_perpus']);
      $namaPengelola_perpus = htmlspecialchars($_POST['namaPengelola_perpus']);
      $namaPerpus = htmlspecialchars($_POST['namaPerpus']);
      $tahunBerdiri_perpus = htmlspecialchars($_POST['tahunBerdiri_perpus']);
      $noIzin_perpus = htmlspecialchars($_POST['noIzin_perpus']);
      $noTelepon_perpus =  htmlspecialchars($_POST['noTelepon_perpus']);

      // Hash Password
      $password_perpus = password_hash($password_perpus, PASSWORD_DEFAULT);

      $queryPerpus = "INSERT INTO `perpus_daftar` (`id_Perpus`, `id_loginPerpus`, `email_perpus`, `password_perpus`, `namaPengelola_perpus`, `nama_perpus`, `tahunBerdiri_perpus`, `noIzin_perpus`, `id_alamatPerpus`, `noTelepon_perpus`) 
      VALUES (NULL,'$id_akunPerpus','$email_perpus','$password_perpus','$namaPengelola_perpus','$namaPerpus','$tahunBerdiri_perpus','$noIzin_perpus','$id_alamatPerpus','$noTelepon_perpus')";

      if (mysqli_query($conn, $queryPerpus)) {
            header("Location: ../index.php");
            exit;
      }
      
      var_dump($queryPerpus);
      echo "gagal";
?>