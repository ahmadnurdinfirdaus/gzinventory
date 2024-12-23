<?php 
	include 'header.php';
 ?>

	<div class="container">
		<div class="card">
			<div class="card-body">
				<h3>Beranda</h3>
				<p class="text-muted">Halaman Beranda PJ ProdukJadi</p>
				<hr>
				<h4><i>Selamat datang <b><?php echo $_SESSION['username']; ?></b></i>.</h4><br>

				<!-- pesan -->
				<div class="row">
					<div class="col-md-12 mx-auto">
						<?php 
							$periksa=mysqli_query($koneksi, "SELECT * FROM produk WHERE stok_produk <=200");
							while($q=mysqli_fetch_array($periksa)){	
								if($q['stok_produk']<=200){			
									echo "<div class='alert alert-warning text-center'> Stok  <a style='color:red'>". $q['nm_produk']."</a> yang tersisa sudah kurang dari 200, silahkan konfirmasi kepada Supervisor Produksi !!</div>";	
								}
							}
						?>
					</div>
				</div>
				<!-- end -->

			</div>	
		</div>
	</div>


<?php 
	include 'footer.php';
 ?>