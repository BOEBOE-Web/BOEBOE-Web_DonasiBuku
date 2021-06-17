<?php 
          require '../../action/config.php';

          function loginDonaturAPI($email_donatur, $password_donatur) {
                    global $conn;
                    $cekuser = mysqli_query($conn, "SELECT `donatur_aktif`.`id_akunDonaturAktif`, `donatur_aktif`.`email_donatur`, `donatur_aktif`.`password_donatur` 
                    FROM `donatur_aktif` WHERE `donatur_aktif`.`email_donatur` = '$email_donatur' ");
                    
                    if (mysqli_num_rows($cekuser) === 1) {
                              $hasil = mysqli_fetch_assoc($cekuser);
                              if(password_verify($password_donatur, $hasil["password_donatur"])) {
                                        return $hasil;
                              } else {
                                        return false;
                              }
                    } else {
                              return false;
                    }
          }

          function profileDonaturAPI($email_donatur) {
                    global $conn;
                    $query = "SELECT `donatur_daftar`.`id_donatur`, `donatur_daftar`.`email_donatur`, `donatur_daftar`.`nama_donatur`, `donatur_daftar`.`noTelepon_donatur`, `donatur_daftar`.`tglLahir_donatur`, `donatur_daftar`.`instansi_donatur`, `donatur_daftar`.`id_alamatDonatur`, `donatur_alamat`.`id_alamatDonaturAktif`, `donatur_alamat`.`alamat`, `donatur_alamat`.`kodePos`
                    FROM `donatur_daftar`
                    JOIN `donatur_alamat` ON `donatur_alamat`.`id_alamatDonaturAktif` = `donatur_daftar`.`id_alamatDonatur`
                    WHERE email_donatur = '$email_donatur' ";
                    $result = mysqli_query($conn, $query);
                    $result = mysqli_fetch_assoc($result);

                    return $result;
          }

          function riwayatDonasiAPI($email_donatur) {
               global $conn;
               $query = "SELECT `donasi_konfirmasi`.`id_detail`,  `donasi_buku`.`nama_perpus`,  `donasi_buku`.`jumlah_buku`,  `donasi_buku`.`kategori_buku`,  `donasi_buku`.`nama_penulis`,  `donasi_buku`.`nama_penerbit`,  `donasi_buku`.`tahun_terbit`, `donasi_detail`.`nama_penerima`, `donasi_detail`.`nama_pengirim`, `donatur_daftar`.`email_donatur`, `donasi_detail`.`noTelepon_penerima`,   `donasi_buku`.`foto_buku`, `donasi_konfirmasi`.`status_donasi`, `donasi_konfirmasi`.`bukti_donasi`
               FROM `donasi_konfirmasi`
               JOIN `donasi_detail` ON `donasi_detail`.`id_detail` = `donasi_konfirmasi`.`id_detail`
               JOIN `donasi_buku` ON `donasi_buku`.`id_donasiBuku` = `donasi_detail`.`id_donasiBuku`
               JOIN `donatur_daftar` ON `donatur_daftar`.`id_loginDonatur` = `donasi_buku`.`id_loginDonatur`
               WHERE `donatur_daftar`.`email_donatur` = '$email_donatur'";
               $result = mysqli_query($conn, $query);

               return $result;
          }

          function daftarPerpustakaanAPI() {
               global $conn;
               $query = "SELECT `perpus_daftar`.`nama_perpus`, `perpus_daftar`.`namaPengelola_perpus`, `perpus_aktif`.`email_perpus`, `perpus_daftar`.`noIzin_perpus`, `perpus_daftar`.`tahunBerdiri_perpus`, `perpus_daftar`.`noTelepon_perpus`,  `perpus_alamat`.`provinsi`, `perpus_alamat`.`kabupaten_kota`, `perpus_alamat`.`kecamatan`, `perpus_alamat`.`desa_kelurahan`, `perpus_alamat`.`rt`, `perpus_alamat`.`rw`, `perpus_alamat`.`jalan`, `perpus_alamat`.`kodePos`,  `kategori_kebutuhan`.`jenis_kategori`, `perpus_daftar`.`tentang_perpus`, `perpus_daftar`.`gambar_perpus`
               FROM `perpus_daftar` 
               JOIN `perpus_alamat` ON `perpus_alamat`.id_alamatPerpusAktif = `perpus_daftar`.id_alamatPerpus
               JOIN `perpus_aktif` ON `perpus_aktif`.id_akunPerpus = `perpus_daftar`.id_loginPerpus
               JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.id_kategori = `perpus_daftar`.id_kategoriPerpus";
               $result = mysqli_query($conn, $query);
     
               return $result;
          }
     
?>