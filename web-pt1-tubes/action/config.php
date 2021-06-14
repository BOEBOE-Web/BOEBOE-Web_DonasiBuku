<?php
      //$DB_HOST = "localhost";
      //$DB_USER = "id16953195_admin";
      //$DB_PASS = "pi+~M6vAMaK-FRU$";
      //$DB_Otaku = "id16953195_otakuboeboe";
      //$DB_PORT = "3306";
      $DB_HOST = "localhost";
      $DB_USER = "root";
      $DB_PASS = "";
      $DB_Otaku = "otakuboeboe";
      $DB_PORT = "3306";

      $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_Otaku, $DB_PORT);

      if (!$conn) {
            die ("Conncetion failed: ".mysqli_connect_error());
      }

?>