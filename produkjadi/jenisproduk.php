<?php 
	include 'header.php';
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card mb-3">
				<div class="card-body">
					<h3>Data Jenis Produk Jadi</h3>
					<p class="text-muted">Halaman Semua Data Jenis Produk Jadi</p>
					<hr>
					
		<!-- pesan -->
		<div class="row">
			<div class="col-md-12 mx-auto">
				<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan'] == "sukses") {
							echo "<div class='alert alert-success text-center'><a href='jenisproduk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Data berhasil disimpan</div>";
						}
						else if($_GET['pesan'] == "hapus") {
							echo "<div class='alert alert-success text-center'><a href='jenisproduk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Jenis Produk telah berhasil dihapus</div>";
						}
						else if($_GET['pesan'] == "edit") {
							echo "<div class='alert alert-success text-center'><a href='jenisproduk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Jenis Produk telah berhasil dirubah</div>";
						}
					}
				?>
			</div>
		</div>
		<!-- end -->

		<ul class="col text-center mb-0">
			<button class="btn btn-outline-success btn-sm mb-3" data-toggle="modal" data-target="#tambahjenis"><i class="fas fa-plus-square"> Tambah Jenis Produk</i></button>&nbsp;
			<a class="btn btn-success btn-sm float-right" href="produk.php">Kembali</a>
		</ul>

		<!-- Modal tambah -->
		<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Tambah Jenis Produk</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="jenisproduk_aksi.php?act=tambahjenis" method="post" role="form">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Jenis Produk</label>
								<input type="text" name="nama" required="required" class="form-control" autocomplete="off">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- end -->

					<table class="table table-bordered table-hover table-striped table-sm">
						<thead>
						<tr>
							<th width="1%">No</th>
							<th>Nama Jenis Produk</th>
							<th width="20%">Opsi</th>
						</tr>
						</thead>
						
						<tbody>
							<?php
							$no = 1; 
							$jenisproduk = mysqli_query($koneksi,"SELECT * FROM jenisproduk ORDER BY idjenis ASC");
							while ($d = mysqli_fetch_array($jenisproduk)) {
							?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['jenis']; ?></td>
								<td id="opsi">
									<a href="jenisproduk_hapus.php?id=<?php echo $d['idjenis']; ?>" class="btn btn-danger btn-sm" onclick="javascript: return confirm('Anda yakin akan menghapus jenis produk <?php echo $d['jenis']; ?>  ?')"><i class="fas fa-trash"></i></a>
								</td>
							</tr>

							<?php 
								}
								?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
<br>

<?php 
	include 'footer.php';
 ?>