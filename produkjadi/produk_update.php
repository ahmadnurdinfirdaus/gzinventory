<?php 
	include '../koneksi.php';

	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	mysqli_query($koneksi,"UPDATE produk SET kd_produk='$kode',nm_produk='$nama' WHERE kd_produk='$kode'");
	header("location:produk.php?pesan=edit");
 ?>