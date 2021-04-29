<?php
      session_start();
      
      $email_donatur = $_POST['email_donatur'];
      $password_donatur = $_POST['password_donatur'];

      $query = mysqli_query($koneksi, "SELECT * FROM donatur_aktif 
      WHERE email_donatur = $email_donatur AND password_donatur = $password_donatur");

      if(mysqli_num_rows($query) == 1) {
            $_SESSION['login'] = true;
            header("Location : ../index.php");
            exit;
      } else {
            header ("Location : ../salah.html");
            exit;
      }

?>