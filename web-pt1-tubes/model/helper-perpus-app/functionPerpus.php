<?php 
     function profilePerpustakaan($conn, $email_perpus){
          $email_perpus = $_SESSION['email_perpus'];
          $query = 
          "SELECT `perpus_daftar`.`id_perpus`,`perpus_daftar`.`id_loginPerpus`, `perpus_daftar`.`id_alamatPerpus`, `perpus_daftar`.`namaPengelola_perpus`, `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`tahunBerdiri_perpus`, `perpus_daftar`.`noIzin_perpus`, `perpus_daftar`.`noTelepon_perpus`, `perpus_daftar`.`tentang_perpus`, `perpus_daftar`.`gambar_perpus`, `perpus_alamat`.`id_alamatPerpusAktif`, `perpus_alamat`.`provinsi`, `perpus_alamat`.`kabupaten_kota`, `perpus_alamat`.`kecamatan`, `perpus_alamat`.`desa_kelurahan`, `perpus_alamat`.`rt`, `perpus_alamat`.`rw`, `perpus_alamat`.`jalan`, `perpus_alamat`.`kodePos`, `perpus_aktif`.`id_akunPerpus`, `perpus_aktif`.`email_perpus`, `kategori_kebutuhan`.`id_kategori`, `kategori_kebutuhan`.`jenis_kategori`
          FROM `perpus_daftar`
          JOIN `perpus_aktif` ON `perpus_aktif`.`id_akunPerpus` = `perpus_daftar`.`id_loginPerpus`
          JOIN `perpus_alamat` ON `perpus_alamat`.`id_alamatPerpusAktif` = `perpus_daftar`.`id_alamatPerpus`
          JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.`id_kategori` = `perpus_daftar`.`id_kategoriPerpus`
          WHERE `perpus_aktif`.`email_perpus` = '$email_perpus'";
          $result = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($result);
          
          return $result;
     }

     function ubahProfilePerpustakaan($conn, $id_login) {
          $querySelect = "SELECT `perpus_daftar`.`gambar_perpus`, `perpus_daftar`.`tentang_perpus`, `perpus_daftar`.`noTelepon_perpus`, `perpus_daftar`.`id_kategoriPerpus`, `perpus_daftar`.`id_alamatPerpus`, `perpus_daftar`.`noIzin_perpus`, `perpus_daftar`.`tahunBerdiri_perpus`, `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`namaPengelola_perpus`, `perpus_daftar`.`id_loginPerpus`, `perpus_alamat`.`kodePos`, `perpus_alamat`.`jalan`, `perpus_alamat`.`rw`, `perpus_alamat`.`rt`, `perpus_alamat`.`desa_kelurahan`, `perpus_alamat`.`kecamatan`, `perpus_alamat`.`kabupaten_kota`, `perpus_alamat`.`provinsi`, `perpus_alamat`.`id_alamatPerpusAktif`, `kategori_kebutuhan`.`jenis_kategori`, `kategori_kebutuhan`.`id_kategori` 
          FROM `perpus_daftar` 
          JOIN `perpus_alamat` ON `perpus_daftar`.id_alamatPerpus= `perpus_alamat`.`id_alamatPerpusAktif` 
          JOIN `kategori_kebutuhan` ON `perpus_daftar`.`id_kategoriPerpus` = `kategori_kebutuhan`.id_kategori 
          WHERE `perpus_daftar`.`id_loginPerpus` = '$id_login' ";
          $result = mysqli_query($conn, $querySelect);
          $result = mysqli_fetch_assoc($result);

          return $result;
     }

     function editDonasiKonfirmasi($conn, $id) {
          $query = "SELECT `donasi_konfirmasi`.`id_detail`, `donasi_konfirmasi`.`id_konfirmasi`, `donasi_konfirmasi`.`bukti_donasi`, `donasi_konfirmasi`.`status_donasi`, `donasi_detail`.`id_detail`, `donasi_detail`.`id_donasiBuku`, `donasi_buku`.`id_donasiBuku`, `donasi_buku`.`jumlah_buku`, `donasi_buku`.`judul_buku`, `donasi_buku`.`nama_penulis`, `donasi_buku`.`nama_penerbit`, `donasi_buku`.`kategori_buku`, `donasi_buku`.`tahun_terbit`, `donasi_buku`.`foto_buku` 
          FROM `donasi_konfirmasi` 
          JOIN `donasi_detail` ON `donasi_detail`.`id_detail` = `donasi_konfirmasi`.`id_detail` 
          JOIN `donasi_buku` ON `donasi_buku`.`id_donasiBuku` = `donasi_detail`.`id_donasiBuku` 
          WHERE `donasi_konfirmasi`.`id_detail` = '$id' ";
          $result = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($result);
          
          return $result;
     }

     function konfirmasiDonasi($conn, $id) {
          $query = "SELECT  `donasi_konfirmasi`.`id_detail`, `donasi_konfirmasi`.`status_donasi` 
          FROM `donasi_konfirmasi`
          JOIN `perpus_aktif` ON `perpus_aktif`.`id_akunPerpus` = `donasi_konfirmasi`.`id_konfirmasiPerpus`
          WHERE `perpus_aktif`.`id_akunPerpus` = $id ";
          $result = mysqli_query($conn, $query);

          return $result;
     }
?>