<?php
      session_start();

      require "config.php";    

      $email_perpus = $_POST["email_perpus"];
      $password_perpus = $_POST["password_perpus"];

      $cekuser = mysqli_query($conn, "SELECT * FROM perpus_aktif WHERE email_perpus = '$email_perpus' ");
      
      if (mysqli_num_rows($cekuser) === 1) {
            
            $hasil = mysqli_fetch_assoc($cekuser);

            if(password_verify($password_perpus, $hasil["password_perpus"])) {
                  $_SESSION["login"] = true;
                  $_SESSION["id_akunPerpus"] = $hasil['id_akunPerpus'];
                        
                  if (isset($_POST["rememberme"])) {
                        setcookie("login", "tetap_ingat", time()+30);
                  } else {
                        echo "Cookie belum ada";
                  }
                  echo "<script>alert('Anda Berhasil Login!')</script>";
			header('Location: ../assets/dasborPerpus.php');
			} else {
				echo "<script>alert('Anda Gagal Login!'); document.location=('../index.php')</script>";
			}
            } else {
                  echo "<script>alert('Email atau Password Anda Salah!'); document.location=('../index.php')</script>";
            }

?>