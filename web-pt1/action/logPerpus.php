<?php
      session_start();
      
      $email_perpus = $_POST['email_perpus'];
      $password_perpus = $_POST['password_perpus'];

      $query = mysqli_query($conn, "SELECT * FROM perpus_aktif 
      WHERE email_perpus = $email_perpus AND password_perpus = $password_perpus");

      if(mysqli_num_rows($query) == 1) {
            $_SESSION['login'] = true;
            header("Location : ../index.php");
            exit;
      } else {
            header ("Location : ../alert/salah.htm");
            exit;
      }

?>