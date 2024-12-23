<?php 
	include '../koneksi.php';

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$password = md5($password);
	mysqli_query($koneksi,"UPDATE user SET nama='$nama',username='$username',password='$password',level='$level' WHERE id='$id'");
	header("location:user.php?pesan=edit");
 ?>