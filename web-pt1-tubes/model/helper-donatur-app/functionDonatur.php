<?php 
     function profileDonatur($conn, $email_donatur) {
          $email_donatur = $_SESSION['email_donatur'];
          $query = "SELECT `donatur_daftar`.`id_donatur`, `donatur_daftar`.`email_donatur`, `donatur_daftar`.`nama_donatur`, `donatur_daftar`.`noTelepon_donatur`, `donatur_daftar`.`tglLahir_donatur`, `donatur_daftar`.`instansi_donatur`, `donatur_daftar`.`id_alamatDonatur`, `donatur_alamat`.`id_alamatDonaturAktif`, `donatur_alamat`.`alamat`, `donatur_alamat`.`kodePos`
          FROM `donatur_daftar`
          JOIN `donatur_alamat` ON `donatur_alamat`.`id_alamatDonaturAktif` = `donatur_daftar`.`id_alamatDonatur`
          WHERE email_donatur = '$email_donatur' ";
          $result = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($result);
          
          return $result;
     }

     function ubahProfileDonatur($conn, $id) {
          $query = "SELECT `donatur_daftar`.`id_alamatDonatur` , `donatur_daftar`.`id_donatur`, `donatur_daftar`.`nama_donatur`, `donatur_daftar`.`noTelepon_donatur`, `donatur_daftar`.`tglLahir_donatur`, `donatur_daftar`.`instansi_donatur`, `donatur_alamat`.`id_alamatDonaturAktif`, `donatur_alamat`.`alamat`, `donatur_alamat`.`kodePos`
          FROM `donatur_daftar` 
          JOIN `donatur_alamat` ON `donatur_alamat`.`id_alamatDonaturAktif` = `donatur_daftar`.`id_alamatDonatur` 
          WHERE id_donatur = '$id' ";
          $result = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($result);

          return $result;
     }

     function riwayatDonasi($conn, $id) {
          $query = "SELECT `donasi_konfirmasi`.`id_detail`, `donasi_konfirmasi`.`id_konfirmasi`,  `donasi_konfirmasi`.`bukti_donasi`, `donasi_konfirmasi`.`status_donasi`, `donasi_detail`.`id_detail`, `donasi_detail`.`id_donasiBuku`, `donatur_daftar`.`id_loginDonatur`
          FROM `donasi_konfirmasi`
          JOIN `donasi_detail` ON `donasi_detail`.`id_detail` = `donasi_konfirmasi`.`id_detail`
          JOIN `donasi_buku` ON `donasi_buku`.`id_donasiBuku` = `donasi_detail`.`id_donasiBuku`
          JOIN `donatur_daftar` ON `donatur_daftar`.`id_loginDonatur` = `donasi_buku`.`id_loginDonatur`
          WHERE `donatur_daftar`.`id_loginDonatur` = '$id'";
          $result = mysqli_query($conn, $query);

          return $result;
     }

     function informasiPengiriman($conn, $id) {
          $query = "SELECT `donasi_detail`.`id_detail`, `donasi_detail`.`nama_penerima`, `donasi_detail`.`nama_perpustakaan`, `donasi_detail`.`noTelepon_penerima`, `donasi_detail`.`alamat_penerima`, `donasi_buku`.`id_loginDonatur`, `donasi_buku`.`jumlah_buku`, `donasi_buku`.`judul_buku`, `donasi_buku`.`nama_penulis`, `donasi_buku`.`nama_penerbit`, `donasi_buku`.`kategori_buku`, `donasi_buku`.`tahun_terbit`
          FROM `donasi_detail`
          JOIN `donasi_buku` ON `donasi_buku`.`id_donasiBuku` = `donasi_detail`.`id_donasiBuku`
          WHERE `donasi_detail`.`id_detail` = '$id' ";
          $result = mysqli_query($conn, $query);
          $result = mysqli_fetch_assoc($result);

          return $result;
     }
?>