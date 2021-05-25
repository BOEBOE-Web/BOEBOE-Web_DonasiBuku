<?php
class Donasi {
      private $conn;
      private $idLogin;

      public function __construct() {
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'otakuboeboe';
            $this->conn = mysqli_connect($host, $user, $pass, $db);

            if (isset($_SESSION['id_loginDonatur'])) {
                  $this->idLogin = $_SESSION['id_loginDonatur'];
            } else if (isset($_SESSION['id_akunPerpus'])) {
                  $this->idLogin = $_SESSION['id_akunPerpus'];
            }
      }

      public function getAllDonasi() {
            $query = "SELECT * FROM `donasi_buku` WHERE id_donatur = $this->idLogin";

            return $this->conn->query($query);
      }

      public function getDonaturDaftar() {
            $query = "SELECT * FROM donatur_daftar WHERE id_loginDonatur = $this->idLogin";
            return $this->conn->query($query)->fetch_assoc();
      }
}