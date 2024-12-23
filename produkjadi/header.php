<!DOCTYPE html>
<html>
<head>
	<title>Green Zone Inventory</title>
	<link rel="icon" type="image/png" href="../assets/images/icon.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/datepicker/dist/css/bootstrap-datepicker3.standalone.min.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../assets/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
	
	<?php
		include 'ceklogin.php';
		include '../koneksi.php';
	?>

	<nav class="navbar navbar-expand-lg navbar sticky-top navbar-light mb-4" style="background-color: #00cc99;">
		<div class="container">

			<a class="navbar-brand" href="#"><img src="../assets/images/logo.png" class="img-logo" width="80" height="40" alt="Logo green zone herbal"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      	<li class="nav-item">
			        	<a class="nav-link text-white" href="index.php">Beranda | <i class="fas fa-home"></i></a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link text-white" href="produk.php">Data Produk | <i class="fas fa-prescription-bottle-alt"></i></a>
			      	</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Laporan</a>
						<div class="dropdown-menu">
						<a class="dropdown-item" href="cetakproduk.php" target="blank">Cetak Data Produk</a>
						<a class="dropdown-item" href="laporanmasuk.php">Cetak Produk Masuk</a>
						<a class="dropdown-item" href="laporankeluar.php">Cetak Produk Keluar</a>
						</div>
					</li>
					<li class="nav-item">
			        	<a class="nav-link text-white" href="gantipassword.php">Rubah Password | <i class="fas fa-key"></i></a>
			      	</li>
			    </ul>
			    <a href="logout.php" class="btn btn-secondary my-2 my-sm-0">Keluar | <i class="fas fa-door-open"></i></a>
			</div>
		</div>
	</nav>
