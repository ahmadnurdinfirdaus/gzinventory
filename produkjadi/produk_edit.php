<?php 
	include 'header.php';
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-5 mx-auto">
			<div class="card">
				<div class="card-body">
					<h3>Edit Data Produk</h3>
					<p class="text-muted">Halaman Edit Data Produk</p>
					<hr>
					<a class="btn btn-success btn-sm float-right" href="produk.php">Kembali</a>
					<br>
					<form action="produk_update.php" method="post">

						<?php 
							$kode = $_GET['kode'];
							$data = mysqli_query($koneksi,"SELECT * FROM produk WHERE kd_produk='$kode'");
							while($d = mysqli_fetch_array($data)) {
						 ?>

						<div class="form-group">
							<label>Kode Produk</label>
							<input type="text" name="kode" class="form-control" required="required" value="<?php echo $d['kd_produk']; ?>" readonly="readonly">
						</div>
						<div class="form-group">
							<label>Nama Produk</label>
							<input type="text" name="nama" class="form-control" required="required" value="<?php echo $d['nm_produk']; ?>">
						</div>
						<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-block ">

						<?php 
							}
						 ?>
						 
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
	include 'footer.php';
 ?>