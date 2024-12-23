<?php
include 'header.php';
?>

<div class="container">

	<div class="row">
		<div class="col-md-5 mx-auto">
			
			<div class="card">
				<div class="card-body">

					<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan']=="sukses"){
							echo "<div class='alert alert-success text-center'><a href='gantipassword.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Password berhasil dirubah</div>";
						}
						else if($_GET['pesan'] == "gagal") {
							echo "<div class='alert alert-danger text-center'><a href='gantipassword.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Password gagal dirubah, silahkan ulangi</div>";
						}
						else if($_GET['pesan'] == "konfirmasi") {
							echo "<div class='alert alert-warning text-center'><a href='gantipassword.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Konfirmasi Password tidak cocok, silahkan ulangi</div>";
						}
						else if($_GET['pesan'] == "konlimitfirmasi") {
							echo "<div class='alert alert-warning text-center'><a href='gantipassword.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Password minimal 5 karekter, silahkan ulangi</div>";
						}
						else if($_GET['pesan'] == "tidakcocok") {
							echo "<div class='alert alert-warning text-center'><a href='gantipassword.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Password lama tidak cocok, silahkan ulangi</div>";
						}
					}
					
					?>

					<h3>Rubah Password</h3>
					<p class="text-muted">Halaman Rubah Password</p>

					<hr>
					<form method="post" action="gantipassword_aksi.php">
						<div class="form-group">
							<label>Masukan Password Lama</label>
							<input type="password" name="password_lama" id="passwordlama" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label>Masukan Password Baru</label>
							<input type="password" name="password_baru" id="passwordbaru" required="required" class="form-control">
						</div>
						<div class="form-group">
							<label>Konfirmasi Password Baru</label>
							<input type="password" name="konfirmasi_password" id="konfirmasi" required="required" class="form-control">
						</div>
						<div class="form-group">
							<input type="checkbox" class="form-checkbox"> Tampilkan Password
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-block">
						</div>
					</form>


				</div>
			</div>

		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#passwordlama').attr('type', 'text');
				$('#passwordbaru').attr('type', 'text');
				$('#konfirmasi').attr('type', 'text');
			}else{
				$('#passwordlama').attr('type', 'password');
				$('#passwordbaru').attr('type', 'password');
				$('#konfirmasi').attr('type', 'password');
			}
		});
	});
</script>

<?php
include 'footer.php';
?>