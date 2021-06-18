<?php
	if(!isset($_SESSION['email_donatur']) ||isset($_SESSION['email_donatur']) || !isset($_SESSION['id_akunPerpus']) || isset($_SESSION['id_akunPerpus'])){
		header("Location: ../../index.php");
		unset($_SESSION['email_donatur']);
		session_destroy($_SESSION['email_donatur']);
		exit();
	}
?>