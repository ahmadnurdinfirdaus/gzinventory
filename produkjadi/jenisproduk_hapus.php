<?php 
	include '../koneksi.php';

	$id = $_GET['id'];
	mysqli_query($koneksi,"DELETE FROM jenisproduk WHERE idjenis='$id'");
	header("location:jenisproduk.php?pesan=hapus");
 ?>