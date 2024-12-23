<?php 
	include '../koneksi.php';

	$kd = $_GET['kd'];
	mysqli_query($koneksi,"DELETE FROM produk WHERE kd_produk='$kd'");
	header("location:produk.php?pesan=hapus");
 ?>