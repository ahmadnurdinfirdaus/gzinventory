<?php
 include 'header.php';
?>

<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h3>Produk Masuk</h3>
					<p class="text-muted">Laporan Data produk Masuk</p>
					<hr>
					<form action="laporanmasuk_aksi.php" method="post" target="_blank">
						<div class="form-group">
							<label>Dari Tanggal</label>
							<input type="text" name="tgl_a" required="required" class="form-control datepicker" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Sampai Tanggal</label>
							<input type="text" name="tgl_b" required="required" class="form-control datepicker" autocomplete="off">
						</div>
						<input type="submit" name="submit" value="Cetak" class="btn btn-primary btn-block ">
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<?php
	include 'footer.php';
?>