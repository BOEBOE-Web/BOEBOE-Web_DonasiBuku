<?php 
      session_start();
      require "../config.php";
      
      //Cek duplikasi data perpus
      $email_perpus = htmlspecialchars($_POST['email_perpus']);
      $queryCekUser = "SELECT `perpus_aktif`.`email_perpus` 
      FROM `perpus_aktif` WHERE `perpus_aktif`.`email_perpus` = '$email_perpus'";
      $cekUser = mysqli_num_rows(mysqli_query($conn, $queryCekUser));
      
      $namaPerpus = htmlspecialchars($_POST['namaPerpus']);
      $queryCeknamaPerpus = "SELECT `perpus_daftar`.`nama_perpus` 
      FROM `perpus_daftar` WHERE `perpus_daftar`.`nama_perpus` = '$namaPerpus' ";
      $ceknamaPerpus = mysqli_num_rows(mysqli_query($conn, $queryCeknamaPerpus));
      
      $namaPengelola_perpus = htmlspecialchars($_POST['namaPengelola_perpus']);
      $queryCeknamaPengelola_perpus = "SELECT `perpus_daftar`.`namaPengelola_perpus` 
      FROM `perpus_daftar` WHERE `perpus_daftar`.`namaPengelola_perpus` = '$namaPengelola_perpus' ";
      $ceknamaPengelola_perpus = mysqli_num_rows(mysqli_query($conn, $queryCeknamaPengelola_perpus));

      if ($cekUser > 0 OR $ceknamaPerpus AND $ceknamaPengelola_perpus > 0) {
            echo "<script>alert('Harap cek kembali data anda, karena ada data yang sudah ada');document.location.href='../../index.php';</script>";
      } else {
            //Insert alamat perpus
            $provinsi = htmlspecialchars($_POST['provinsi_perpus']);
            $kota_kabupaten = htmlspecialchars($_POST['kab_kota_perpus']);
            $kecamatan = htmlspecialchars($_POST['kec_perpus']);
            $desa_kelurahan = htmlspecialchars($_POST['desa_kelurahan_perpus']);
            $rt = htmlspecialchars($_POST['rt_perpus']);
            $rw = htmlspecialchars($_POST['rw_perpus']);
            $jalan = htmlspecialchars($_POST['jalan_perpus']);
            $kodePos = htmlspecialchars($_POST['kodePos_perpus']);

            $queryAlamat = "INSERT INTO `perpus_alamat`(`id_alamatPerpusAktif`, `provinsi`, `kabupaten_kota`, `kecamatan`, `desa_kelurahan`, `rt`, `rw`, `jalan`, `kodePos`) 
            VALUES (NULL,'$provinsi','$kota_kabupaten','$kecamatan','$desa_kelurahan','$rt','$rw','$jalan','$kodePos')";

            mysqli_query($conn, $queryAlamat);
            $id_alamatPerpus = mysqli_insert_id($conn);
            
            //Insert akun aktif
            $password_perpus = mysqli_real_escape_string($conn, $_POST['password_perpus']);
            
            // Hash Password
            $password_perpus = password_hash($password_perpus, PASSWORD_DEFAULT);

            $queryAkun = "INSERT INTO `perpus_aktif`(`id_akunPerpus`, `email_perpus`, `password_perpus`) 
            VALUES (NULL,'$email_perpus','$password_perpus')";
            mysqli_query($conn, $queryAkun);

            $id_akunPerpus = mysqli_insert_id($conn);
            
            //Insert Kategori
            $queryKategori = "INSERT INTO `kategori_kebutuhan`(`id_kategori`, `jenis_kategori`)
            VALUES (NULL, 'Silahkan Update')";
            mysqli_query($conn, $queryKategori);
            $id_kategori = mysqli_insert_id($conn);

            //Insert data perpus
            $tahunBerdiri_perpus = htmlspecialchars($_POST['tahunBerdiri_perpus']);
            $noIzin_perpus = htmlspecialchars($_POST['noIzin_perpus']);
            $noTelepon_perpus =  htmlspecialchars($_POST['noTelepon_perpus']);

            $queryPerpus = 
            "INSERT INTO `perpus_daftar`(`id_perpus`, `id_loginPerpus`, `namaPengelola_perpus`, `nama_perpus`, `tahunBerdiri_perpus`, `noIzin_perpus`, `id_alamatPerpus`, `id_kategoriPerpus`, `noTelepon_perpus`, `tentang_perpus`, `gambar_perpus`)
            VALUES (NULL, '$id_akunPerpus', '$namaPengelola_perpus', '$namaPerpus', '$tahunBerdiri_perpus', '$noIzin_perpus', '$id_alamatPerpus', '$id_kategori','$noTelepon_perpus', 'Silahkan Update', 'public/image/profile-perpus/gambar.png')";
            
            if (mysqli_query($conn, $queryPerpus)) {
                  echo "<script>document.location.href='../../view/perpus-app/masukPerpus.php';alert('Anda berhasil mendaftar, silahkan masuk! 😊');</script>";
            } else {
                  echo "<script>alert('Data Gagal Ditambahkan');document.location.href='../../index.php';</script>";
            }
      }
?>