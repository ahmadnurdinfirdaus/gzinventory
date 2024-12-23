<!DOCTYPE html>
<html>
<head>
	<title>GZ Inventory</title>
	<link rel="icon" type="image/png" href="assets/images/icon.png">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mine.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>

	<br>
	<div class="container-fluid">
		<h2 class="text-center mt-5">Sistem Informasi Inventory</h2>
		<h2 class="text-center">Green Zone Herbal</h2>

		<div class="row">
			<div class="col-md-4 mx-auto mt-3">
				<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan'] == "Gagal") {
							echo "<div class='alert alert-danger text-center'><a href='index.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Maaf username atau password anda salah</div>";
						}
						else if($_GET['pesan'] == "Logout") {
							echo "<div class='alert alert-success text-center'><a href='index.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Anda telah Logout</div>";
						}
						else if($_GET['pesan'] == "belumlogin") {
							echo "<div class='alert alert-warning text-center'><a href='index.php' class='close' data-dismiss='batal' aria-label='close'>&times;</a>Anda harus Login terlebih dahulu</div>";
						}
					}
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card mt-2">
					<div class="card-body">
						<h4 class="text-center">Form Masuk</h4>
						<hr>
						<form method="post" action="aksilogin.php" class="login-form">
						<div class="input-container">
							<i class="fa fa-user"></i>&nbsp;
							<input type="text" class="input" name="username" placeholder="Username" autocomplete="off" required="required"/>
						</div>
						<div class="input-container">
							<i class="fa fa-lock"></i>&nbsp;
							<input type="password"  id="login-password" class="input" name="password" placeholder="Password" required="required"/>
							<i id="show-password" class="fa fa-eye"></i>
						</div>
						<input type="submit" name="login" value="Masuk" class="button"/>
					</form>
					</div>
				</div>
			</div>
		</div>

	</div>

<script>
$('#show-password').click(function() {
if ($(this).hasClass('fa-eye')) {
	$('#login-password').attr('type', 'text');
	$(this).removeClass('fa-eye');
	$(this).addClass('fa-eye-slash');
} else {
	$('#login-password').attr('type', 'password');
	$(this).removeClass('fa-eye-slash');
	$(this).addClass('fa-eye');
}
})
</script>

</body>
</html>