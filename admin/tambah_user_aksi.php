<?php 
	include '../koneksi.php';

if($_GET['act']== 'tambahuser'){
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$password = md5($password);
	$tambah = mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$username','$password','$level')");

	if($tambah){
		header("location:user.php?pesan=sukses");
	}
	else{
		echo "ERROR, tidak berhasil". mysqli_error($koneksi);
	}
}

 ?>