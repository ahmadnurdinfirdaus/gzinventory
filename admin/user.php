<?php 
	include 'header.php';
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="card mb-3">
				<div class="card-body">
					<h3>Data PJ Produk</h3>
					<p class="text-muted">Halaman Data PJ Produk</p>
					<hr>
					<!-- pesan -->
					<div class="row">
						<div class="col-md-12 mx-auto">
							<?php 
								if(isset($_GET['pesan'])){
									if($_GET['pesan'] == "sukses") {
										echo "<div class='alert alert-success text-center'><a href='user.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>User berhasil disimpan</div>";
									}
									else if($_GET['pesan'] == "hapus") {
										echo "<div class='alert alert-success text-center'><a href='user.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>User telah berhasil dihapus</div>";
									}
									else if($_GET['pesan'] == "edit") {
										echo "<div class='alert alert-success text-center'><a href='user.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>User telah berhasil dirubah</div>";
									}
								}
							?>
						</div>
					</div>
					<!-- end -->

					<ul class="col text-center mb-0">
						<button class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahuser"><i class="fas fa-plus-square"> Tambah User</i></button>
					</ul>

		<!-- Modal tambah -->
		<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Tambah User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="tambah_user_aksi.php?act=tambahuser" method="post" role="form">
						<div class="modal-body">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>User Name</label>
								<input type="text" name="username" required="required" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" required="required" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Level</label>
								<select class="form-control" name="level" required="required">
									<option value="" selected="selected">-</option>
									<option value="PJ Produk Jadi">PJ Produk Jadi</option>
									<option value="Manajer produksi">Manajer produksi</option>
									<option value="Administrator">Administrator</option>
								</select>
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
							<th>Nama</th>
							<th>Username</th>
							<th>Level</th>
							<th width="20%">Opsi</th>
						</tr>
						</thead>
						
						<tbody>
							<?php
							$no = 1; 
							$user = mysqli_query($koneksi,"SELECT * FROM user ORDER BY id ASC");
							while ($d = mysqli_fetch_array($user)) {
							?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['nama']; ?></td>
								<td><?php echo $d['username']; ?></td>
								<td><?php echo $d['level']; ?></td>
								<td id="opsi">
									<a href="user_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white btn-sm"><i class="fas fa-pen"></i></a>
									<a href="user_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm" onclick="javascript: return confirm('Anda yakin akan menghapus user <?php echo $d['nama']; ?>  ?')"><i class="fas fa-trash"></i></a>
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