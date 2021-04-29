<?php 

      require_once "db.php";
      
      // Alamat mitra
      $provinsi = $_POST['provinsi'];
      $kota_kabupaten = $_POST['kota_kabupaten'];
      $kecamatan = $_POST['kecamatan'];
      $desa_kelurahan = $_POST['desa_kelurahan'];
      $rt = $_POST['rt'];
      $rw = $_POST['rw'];
      $jalan = ['jalan'];
      $kodePos = $_POST['kodePos'];

      $queryAlamatMitra = "INSERT INTO `alamat_mitra` (`id_alamatMitraAktif`, `provinsi`, `kabupaten_kota`, `kecamatan`, `desa_kelurahan`, `rt`, `rw`, `jalan`, `kodePos`)
      VALUES (NULL, '$provinsi', '$kota_kabupaten', '$kecamatan', '$desa_kelurahan', '$rt', '$rw', '$jalan', '$kodePos')";

      mysqli_query($koneksi, $queryAlamatMitra);
      $id_alamatMitra = mysqli_insert_id($koneksi);
      
      // Akun Aktif
      $email_mitra = $_POST['email_mitra'];
      $password_mitra = $_POST['password_mitra'];

      $queryAkunMitra = "INSERT INTO `mitra_aktif` (`id_akunMitra`, `email_mitra`, `password_mitra`)  
      VALUES (NULL, '$email_mitra', '$password_mitra')";

// INSERT INTO `mitra_aktif` (`id_akunMitra`, `email_mitra`, `password_mitra`) 
// VALUES (NULL, 'rief@gmail.com', '1234')

// INSERT INTO `alamat_mitra` (`id_alamatMitraAktif`, `provinsi`, `kabupaten_kota`, `kecamatan`, `desa_kelurahan`, `rt`, `rw`, `jalan`, `kodePos`) 
// VALUES (NULL, 'fdsf', 'fsadfsa', 'fdsfsad', 'fsadfas', '11', '11', 'fsdfsadfsadfas', '33333');

// INSERT INTO `daftar_mitra` (`id_Mitra`, `id__loginMitra`, `email_mitra`, `password_mitra`, `namaLembaga_mitra`, `tahunBerdiri_mitra`, 
// `noIzin_mitra`, `id_alamatMitra`, `nomorHP_mitra`) 
// VALUES (NULL, '1', 'rief@gmail.com', '1234', 'apapun bisa', '2004', '111111', '1', '123123123');

      mysqli_query($koneksi, $queryAkunMitra);
      $id_loginMitra = mysqli_insert_id($koneksi);

      // Daftar mitra
      $email_mitra = $_POST['email_mitra'];
      $password_mitra = $_POST['password_mitra'];
      $namaLembaga_mitra = $_POST['namaLembaga_mitra'];
      $tahunBerdiri_mitra = $_POST['tahunBerdiri_mitra'];
      $noIzin_mitra = $_POST['noIzin_mitra'];
      $nomorHP_mitra =  $_POST['nomorHP_mitra'];

      $queryMitra = 
      "INSERT INTO daftar_mitra (`id_Mitra`, `id_loginMitra`, `email_mitra`, `password_mitra`, `namaLembaga_mitra`, `tahunBerdiri_mitra`, `noIzin_mitra`, `id_alamatMitra`, `nomorHP_mitra`) 
      VALUES (NULL, '$id_loginMitra', '$email_mitra', '$password_mitra', '$namaLembaga_mitra', '$tahunBerdiri_mitra', '$noIzin_mitra', '$id_alamatMitra', '$nomorHP_mitra')";

      if (mysqli_query($koneksi, $queryMitra)) {
            header("Location: ../index.php");
            exit;
      }

      echo "gagal";
?>