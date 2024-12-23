<?php 
	include 'header.php';
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-5 mx-auto">
			<div class="card">
				<div class="card-body">
					<h3>Edit Data User</h3>
					<p class="text-muted">Halaman Edit Data User</p>
					<hr>
					<form action="user_update.php" method="post">

						<?php 
							$id = $_GET['id'];
							$data = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$id'");
							while($d = mysqli_fetch_array($data)) {
						 ?>

						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" required="required" value="<?php echo $d['nama']; ?>">
							<input type="hidden" name="id" value="<?php echo $d['id'] ?>">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required" value="<?php echo $d['username']; ?>">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" id="password" class="form-control" required="required" value="<?php echo $d['password']; ?>">
						</div>
						<div class="form-group">
								<label>Level</label>
								<select class="form-control" name="level" required="required" value="<?php echo $d['level']; ?>">
									<option value="PJ Produk Jadi">PJ Produk Jadi</option>
									<option value="Manajer produksi">Manajer produksi</option>
									<option value="Administrator">Administrator</option>
								</select>
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

<script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('#password').attr('type', 'text');
			}else{
				$('#password').attr('type', 'password');
			}
		});
	});
</script>

<?php 
	include 'footer.php';
 ?>