<?php

    function headerHTML(array $style){
        echo'
        <!DOCTYPE html>
        <html lang="id">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BoeBoe - Web Donasi Buku Bekas</title>
            <link rel="icon" href="../image/icon-b.png">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins&display=swap" rel="stylesheet">
            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />

            <link rel="stylesheet" href="'.$style[0].'">
            <link rel="stylesheet" href="'.$style[1].'">
        </head>';
    }

    function footerHTML($script = ""){
        echo'
                    <footer>
                            <p>Copyright &#169 2021 BoeBoe<br>Web Donasi Buku Bekas</p>
                            <p>Made by OTAKU<br>(Orang-orang pecinTA buKU)</p>
                    </footer>
                    '.$script.'
                    </body>
        </html>';
    }

    function daftarPerpustakaan($conn) {
        $query = "SELECT perpus_daftar.nama_perpus, 
        perpus_alamat.provinsi, perpus_alamat.kabupaten_kota, perpus_daftar.id_perpus 
        FROM `perpus_daftar` 
        JOIN `perpus_alamat` ON perpus_alamat.id_alamatPerpusAktif = perpus_daftar.id_alamatPerpus";
        $result = mysqli_query($conn, $query);

        return $result;
    }

    function detailPerpustakaan($conn, $id) {
        $query = "SELECT * FROM `perpus_daftar` 
        JOIN `perpus_alamat` ON `perpus_alamat`.id_alamatPerpusAktif = `perpus_daftar`.id_alamatPerpus
        JOIN `perpus_aktif` ON `perpus_aktif`.id_akunPerpus = `perpus_daftar`.id_loginPerpus
        JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.id_kategori = `perpus_daftar`.id_kategoriPerpus
        WHERE id_perpus = '$id' ";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    function konversiDate($date, $d = true) {
        
        $tahun = date('Y', strtotime($date));
        $bulan = date('F', strtotime($date));
        $hari = date('l', strtotime($date));
        $tanggal = date('d', strtotime($date));

        switch($bulan) {
            case 'January':
                $bulan = "Januari";
                break;
            case 'February':
                $bulan = "Februari";
                break;
            case 'March':
                $bulan = "Maret";
                break;
            case 'April':
                $bulan = "April";
                break;
            case 'May':
                $bulan = "Mei";
                break;
            case 'June':
                $bulan = "Juni";
                break;
            case 'July':
                $bulan = "Juli";
                break;
            case 'August':
                $bulan = "Agustus";
                break;
            case 'September':
                $bulan = "September";
                break;
            case 'October':
                $bulan =  "Oktober";
                break;
            case 'November':
                $bulan = "November";
                break;
            case 'Desember':
                $bulan = "Desember";
                break;
            }

        switch($hari) {
            case 'Monday':
                $hari = "Senin";
                break;
            case 'Tuesday':
                $hari ="Selasa";
                break;
            case 'Wednesday':
                $hari = "Rabu";
                break;
            case 'Thursday':
                $hari = "Kamis";
                break;
            case 'Friday':
                $hari = "Jum'at";
                break;
            case 'Saturday':
                $hari = "Sabtu";
                break;
            case 'Sunday':
                $hari = "Minggu";
                break;
            }
        
            if($d == true){
                $konversiDate = "$hari, $tanggal $bulan $tahun";
            } else {
                $konversiDate = "$tanggal $bulan $tahun";
            }
            
            return $konversiDate; 
    }
    // ==================== Donatur Function =======================
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
    // ==================== End Donatur Function =======================





    // ==================== Perpustakaan Function =======================
    function profilePerpustakaan($conn, $id){
        $query = 
        "SELECT * FROM `perpus_daftar` 
        JOIN `perpus_alamat` ON `perpus_alamat`.`id_alamatPerpusAktif` = `perpus_daftar`.id_alamatPerpus 
        JOIN `perpus_aktif` ON `perpus_aktif`.id_akunPerpus = `perpus_daftar`.id_loginPerpus
        JOIN `kategori_kebutuhan` ON `kategori_kebutuhan`.id_kategori = `perpus_daftar`.id_kategoriPerpus
        WHERE `perpus_daftar`.id_loginPerpus = $id ";
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
    // ==================== End Perpustakan Function =======================
?>