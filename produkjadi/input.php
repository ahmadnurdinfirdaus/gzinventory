<?php 
	include 'header.php';

if(isset($_POST['submit'])){
	$tgl = date("Y-m-d", strtotime($_POST['tgl']));
	$kd_produk = $_POST['kd_produk'];
	$nm_produk = $_POST['nm_produk'];
	$jenis = $_POST['jenis'];
	$jml = $_POST['jml'];

	$input = mysqli_query($koneksi,"INSERT INTO produkmasuk VALUES ('','$tgl','$kd_produk','$nm_produk','$jenis','$jml')");
	$input2 = mysqli_query($koneksi,"UPDATE produk SET stok_produk = stok_produk + ".$_POST['jml']." where kd_produk =  '".$_POST['kd_produk']."'");

	if($input){
		header("location:produk.php?pesan=input");
	}
	else{
		echo "ERROR, tidak berhasil". mysqli_error($koneksi);
	}
}

 ?>