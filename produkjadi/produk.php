<?php 
	include 'header.php';
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card mb-3">
				<div class="card-body">
					<h3>Data Produk Jadi</h3>
					<p class="text-muted">Halaman Semua Data Produk Jadi</p>
					<hr>
					
		<!-- pesan -->
		<div class="row">
			<div class="col-md-12 mx-auto">
				<?php
					if(isset($_GET['pesan'])){
						if($_GET['pesan'] == "sukses") {
							echo "<div class='alert alert-success text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Data berhasil disimpan</div>";
						}
						else if($_GET['pesan'] == "hapus") {
							echo "<div class='alert alert-success text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Produk telah berhasil dihapus</div>";
						}
						else if($_GET['pesan'] == "edit") {
							echo "<div class='alert alert-success text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Produk telah berhasil dirubah</div>";
						}
						else if($_GET['pesan'] == "input") {
							echo "<div class='alert alert-success text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Stok produk telah berhasil bertambah</div>";
						}
						else if($_GET['pesan'] == "output") {
							echo "<div class='alert alert-success text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Stok produk telah berhasil berkurang</div>";
						}
						else if($_GET['pesan'] == "stokkurang") {
							echo "<div class='alert alert-warning text-center'><a href='produk.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Stok produk kurang!! pengeluaran stok produk dibatalkan, silahkan cek ketersediaan stok</div>";
						}
					}
				?>
			</div>
		</div>
		<!-- end -->

		<ul class="col text-center mb-0">
			<button class="btn btn-outline-success btn-sm mb-3" data-toggle="modal" data-target="#tambahproduk"><i class="fas fa-plus-square"> Tambah Produk</i></button>&nbsp;

			<button class="btn btn-outline-success btn-sm mb-3" data-toggle="modal" data-target="#inputproduk"><i class="fas fa-plus"> Masuk Produk</i></button>

			<button class="btn btn-outline-success btn-sm mb-3" data-toggle="modal" data-target="#outputproduk"><i class="fas fa-minus"> Keluar Produk</i></button>&nbsp;

			<a class="btn btn-outline-info btn-sm mb-3" href="jenisproduk.php"><b>Data Jenis Produk</b></a>
		</ul>

<!-- Modal tambah -->
<?php
	$query = "SELECT max(kd_produk) as maxKode FROM produk";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeproduk = $data['maxKode'];
	$noUrut = (int) substr($kodeproduk, 3, 3);
	$noUrut++;
	$char = "GZ";
	$kodeproduk = $char . sprintf("%03s", $noUrut);
?>
<div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Tambah Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="produk_tambah_aksi.php?act=tambahproduk" method="post" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label>Kode Produk</label>
						<input type="text" name="kode" value="<?php echo $kodeproduk ?>" readonly="readonly" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="nama" required="required" class="form-control" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Jenis Produk</label>
						<select class="form-control" name="jenis" required="required">
							<option value="" selected="selected">-</option>
							<?php
							$query = mysqli_query($koneksi, "select * from jenisproduk order by idjenis esc");  
							$result = mysqli_query($koneksi, "select * from jenisproduk");
							while ($d = mysqli_fetch_array($result)) {  
							echo '<option name="jenis" value="'.$d['jenis'] . '">' . $d['jenis'] . '</option>'; 
							}
							?>
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

<!-- Modal input -->
<div class="modal fade" id="inputproduk" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Masuk Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="input.php" method="post" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label>Tanggal</label>
						<input type="text" name="tgl"  required="required" class="form-control" value="<?php echo date('Y-m-d');?>" readonly="readonly" >
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<select class="form-control" id="kd_produk" name="kd_produk" onchange='changeValue(this.value)' required="">
							<option value="" selected="selected">-</option>
							<?php
							$query = mysqli_query($koneksi, "select * from produk order by kd_produk esc");  
							$result = mysqli_query($koneksi, "select * from produk");  
							$a          = "var nm_produk = new Array();\n;";  
							$b          = "var jenis = new Array();\n;";  
							while ($d = mysqli_fetch_array($result)) {  
							echo '<option name="kd_produk" value="'.$d['kd_produk'] . '">' . $d['nm_produk'] . '</option>';   
							$a .= "nm_produk['" . $d['kd_produk'] . "'] = {nm_produk:'" . addslashes($d['nm_produk'])."'};\n";  
							$b .= "jenis['" . $d['kd_produk'] . "'] = {jenis:'" . addslashes($d['jenis'])."'};\n";  
							}
							?>
							</select>
					</div>
					<div class="form-group">
						<input type="hidden" id="nm_produk" name="nm_produk" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis Produk</label>
						<input type="text" id="jenis" name="jenis" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="text" name="jml" required="required" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off">
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

<!-- Modal output -->
<div class="modal fade" id="outputproduk" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Keluar Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="output.php" method="post" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label>Tanggal</label>
						<input type="text" name="tgl" required="required" class="form-control" value="<?php echo date('Y-m-d');?>" readonly="readonly" >
					</div>
					<div class="form-group">
						<label>Nama Produk</label>
						<select class="form-control" id="kd_produk" name="kd_produk" onchange='changeValue(this.value)' required="">
							<option value="" selected="selected">-</option>
							<?php
							$query = mysqli_query($koneksi, "select * from produk order by kd_produk esc");  
							$result = mysqli_query($koneksi, "select * from produk");  
							$c          = "var nm_produk2 = new Array();\n;";  
							$e          = "var jenis2 = new Array();\n;";  
							while ($d = mysqli_fetch_array($result)) {  
							echo '<option name="kd_produk" value="'.$d['kd_produk'] . '">' . $d['nm_produk'] . '</option>';   
							$c .= "nm_produk2['" . $d['kd_produk'] . "'] = {nm_produk2:'" . addslashes($d['nm_produk'])."'};\n";  
							$e .= "jenis2['" . $d['kd_produk'] . "'] = {jenis2:'" . addslashes($d['jenis'])."'};\n";  
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="hidden" id="nm_produk2" name="nm_produk" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Jenis Produk</label>
						<input type="text" id="jenis2" name="jenis" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="text" name="jml" required="required" class="form-control" onkeypress="return hanyaAngka(event)" autocomplete="off">
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

					<table id="me" class="table table-bordered table-hover table-striped table-sm">
						<thead>
						<tr>
							<th width="1%">No</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Jenis Produk</th>
							<th>Stok Produk</th>
							<th width="20%">Opsi</th>
						</tr>
						</thead>
						
						<tbody>
							<?php
							$no = 1; 
							$produk = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY kd_produk ASC");
							while ($d = mysqli_fetch_array($produk)) {
							?>

							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['kd_produk']; ?></td>
								<td><?php echo $d['nm_produk']; ?></td>
								<td><?php echo $d['jenis']; ?></td>
								<td id="stok"><?php echo $d['stok_produk']; ?></td>
								<td id="opsi">
									<a href="produk_edit.php?kode=<?php echo $d['kd_produk']; ?>" class="btn btn-warning text-white btn-sm"><i class="fas fa-pen"></i></a>
									<a href="produk_hapus.php?kd=<?php echo $d['kd_produk']; ?>" class="btn btn-danger btn-sm" onclick="javascript: return confirm('Anda yakin akan menghapus produk <?php echo $d['nm_produk']; ?>  ?')"><i class="fas fa-trash"></i></a>
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