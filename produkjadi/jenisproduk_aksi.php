<?php 
	include '../koneksi.php';

if($_GET['act']== 'tambahjenis'){
	$nama = $_POST['nama'];

	$tambah = mysqli_query($koneksi,"INSERT INTO jenisproduk VALUES('','$nama')");

	if($tambah){
		header("location:jenisproduk.php?pesan=sukses");
	}
	else{
		echo "ERROR, tidak berhasil". mysqli_error($koneksi);
	}
}

 ?>