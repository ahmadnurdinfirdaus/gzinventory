<?php
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password); 
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
 
if ($cek > 0) {
 
	$data = mysqli_fetch_assoc($login);
 
	if($data['level']=="PJ Produk Jadi"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "PJ Produk Jadi";
		header("location:produkjadi/index.php");

	}else if($data['level']=="Manajer Produksi"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Manajer Produksi";
		header("location:manajer/index.php");

	}else if($data['level']=="Administrator"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Administrator";
		header("location:admin/index.php");

	}else{
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=Gagal");	
}
?>