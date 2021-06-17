<?php
      session_start();

      require "../config.php";

	$email_donatur = htmlspecialchars($_POST["email_donatur"]);
	$password_donatur = htmlspecialchars($_POST["password_donatur"]);
	$query = "SELECT `donatur_aktif`.`id_akunDonaturAktif`, `donatur_aktif`.`email_donatur`, `donatur_aktif`.`password_donatur` 
	FROM `donatur_aktif` 
	WHERE `donatur_aktif`.`email_donatur` = '$email_donatur' ";
	$cekuser = mysqli_query($conn, $query);
	
	if (mysqli_num_rows($cekuser) === 1) {
		
		$hasil = mysqli_fetch_assoc($cekuser);

		if(password_verify($password_donatur, $hasil["password_donatur"])) {
			$_SESSION["login"] = true;
			$_SESSION["email_donatur"] = $hasil['email_donatur'];
			$_SESSION['id_loginDonatur'] = $hasil['id_akunDonaturAktif'];

			if (isset($_POST["rememberme"])) {
				setcookie("login", "tetap_ingat", time()+30);
			} else {
				// Cek jika, Cookie belum ada
			}
				
			echo "<script>alert('Anda Berhasil Login!'); window.location.href='../../view/donatur-app/dasborDonatur.php';</script>";
			} else {
				echo "<script>alert('Anda Gagal Login!'); document.location=('../../index.php')</script>";
			}
		} else {
			echo "<script>alert('Email atau Password Anda Salah!'); document.location=('../../index.php')</script>";
		}
?>