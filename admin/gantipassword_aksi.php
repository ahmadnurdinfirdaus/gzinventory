<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include 'header.php';

    if($_POST['submit']){
        $password_lama			= $_POST['password_lama'];
        $password_baru			= $_POST['password_baru'];
        $konfirmasi_password	= $_POST['konfirmasi_password'];

        $password_lama	= md5($password_lama);
        $cek 			= $koneksi->query("SELECT password FROM user WHERE password='$password_lama'");
        
        if($cek->num_rows){
            if(strlen($password_baru) >= 5){
                if($password_baru == $konfirmasi_password){
                    $password_baru 	= md5($password_baru);
                    $username 		= $_SESSION['username']; //ini dari session saat login
                    
                    $update 		= $koneksi->query("UPDATE user SET password='$password_baru' WHERE username='$username'");
                    if($update){
                        header("location:gantipassword.php?pesan=sukses");
                    }else{
                        header("location:gantipassword.php?pesan=gagal");
                    }					
                }else{
                    header("location:gantipassword.php?pesan=konfirmasi");
                }
            }else{
                header("location:gantipassword.php?pesan=limit");
            }
        }else{
            header("location:gantipassword.php?pesan=tidakcocok");
        }
    }
    ?>