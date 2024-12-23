<?php 
	session_start();
	if ($_SESSION['level'] == "") {
		header("location:../index.php?pesan=belumlogin");
	}
 ?>