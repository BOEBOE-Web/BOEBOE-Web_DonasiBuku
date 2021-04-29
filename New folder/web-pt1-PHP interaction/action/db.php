<?php
      $DB_HOST = "localhost";
      $DB_USER = "root";
      $DB_PASS = "";
      $DB_TOKO = "pt1_boeboe";
      $DB_PORT = "3306";

      $koneksi = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_TOKO, $DB_PORT);

      if (mysqli_errno($koneksi)) {
            echo "Eror database ". mysqli_error($koneksi);
            die();
      }

?>