<?php
      session_start();

      require "../config.php";    

      $email_perpus = htmlspecialchars($_POST["email_perpus"]);
      $password_perpus = htmlspecialchars($_POST["password_perpus"]);
      $query = "SELECT `perpus_aktif`.`id_akunPerpus`, `perpus_aktif`.`email_perpus`, `perpus_aktif`.`password_perpus` 
      FROM `perpus_aktif` 
      WHERE `perpus_aktif`.`email_perpus` = '$email_perpus' ";
      $cekuser = mysqli_query($conn, $query);
      
      if (mysqli_num_rows($cekuser) === 1) {
            
            $hasil = mysqli_fetch_assoc($cekuser);

            if(password_verify($password_perpus, $hasil["password_perpus"])) {
                  $_SESSION["login"] = true;
                  $_SESSION["email_perpus"] = $hasil['email_perpus'];
                  $_SESSION["id_akunPerpus"] = $hasil['id_akunPerpus'];
                        
                  if (isset($_POST["rememberme"])) {
                        setcookie("login", "tetap_ingat", time()+30);
                  } else {
                        // Cek jika, Cookie yang belum ada
                  }
                        echo "<script>alert('Anda Berhasil Login!'); window.location.href = '../../view/perpus-app/dasborPerpus.php';</script>";
			} else {
				echo "<script>alert('Anda Gagal Login!'); document.location=('../../index.php')</script>";
			}
            } else {
                  echo "<script>alert('Email atau Password Anda Salah!'); document.location=('../../index.php')</script>";
            }

?>