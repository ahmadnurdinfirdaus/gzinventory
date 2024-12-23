<?php 
	include '../koneksi.php';

if($_GET['act']== 'tambahproduk'){
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];

	$tambah = mysqli_query($koneksi,"INSERT INTO produk VALUES('$kode','$nama','$jenis','')");

	if($tambah){
		header("location:produk.php?pesan=sukses");
	}
	else{
		echo "ERROR, tidak berhasil". mysqli_error($koneksi);
	}
}

 ?>