<?php 
	include 'header.php';
 ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3>Beranda</h3>
				<p class="text-muted">Halaman Beranda Administrator</p>
				<hr>
				<h4><i>Selamat datang <b><?php echo $_SESSION['username']; ?></b></i>.</h4>
			</div>
		</div>
	</div>

<?php 
	include 'footer.php';
 ?>