<?php
      $DB_HOST = "localhost";
      $DB_USER = "root";
      $DB_PASS = "";
      $DB_TOKO = "otakuboeboe";
      $DB_PORT = "3306";

      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_TOKO, $DB_PORT);

      if (!$conn) {
            die ("Conncetion failed: ".mysqli_connect_error());
      }

?>