<?php
	if(!isset($_SESSION['id_akunPerpus']) || isset($_SESSION['id_akunPerpus'])){
		header("Location: ../../index.php");
          unset($_SESSION['id_akunPerpus']);
		session_destroy($_SESSION['id_akunPerpus']);
		exit();
	}
?>