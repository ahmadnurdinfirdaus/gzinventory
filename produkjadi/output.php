<?php 
	include 'header.php';

if(isset($_POST['submit'])){
	$tgl = date("Y-m-d", strtotime($_POST['tgl']));
	$kd_produk = $_POST['kd_produk'];
	$nm_produk = $_POST['nm_produk'];
	$jenis = $_POST['jenis'];
	$jml = $_POST['jml'];

	$produk=mysqli_query($koneksi,"SELECT * FROM produk where kd_produk='".$_POST['kd_produk']."'");
	$d=mysqli_fetch_array($produk);

	if($_POST['jml'] < $d['stok_produk'])
	{
		$output = mysqli_query($koneksi,"INSERT INTO produkkeluar VALUES ('','$tgl','$kd_produk','$nm_produk','$jenis','$jml')");
		if($produk)
		{
			$output2 = mysqli_query($koneksi,"UPDATE produk SET stok_produk = stok_produk - ".$_POST['jml']." where kd_produk =  '".$_POST['kd_produk']."'");
			if($output2){
				header("location:produk.php?pesan=output");
			}
			else{
				echo "ERROR, tidak berhasil". mysqli_error($koneksi);
			}
		}
	}else{
		header("location:produk.php?pesan=stokkurang");
	}

	/*
	$output = mysqli_query($koneksi,"INSERT INTO produkkeluar VALUES ('','$tgl','$kd_produk','$nm_produk','$jenis','$jml')");
	$output2 = mysqli_query($koneksi,"UPDATE produk SET stok_produk = stok_produk - ".$_POST['jml']." where kd_produk =  '".$_POST['kd_produk']."'");
	if($output){
		header("location:produk.php?pesan=output");
	}
	else{
		echo "ERROR, tidak berhasil". mysqli_error($koneksi);
	}
	*/

}
?>