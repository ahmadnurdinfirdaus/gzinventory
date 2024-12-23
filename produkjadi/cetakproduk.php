<!DOCTYPE html>
<html>
<head>
	<title>Cetak Produk Jadi</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/datepicker/dist/css/bootstrap-datepicker3.standalone.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/tailselect/css/default/tail.select-light.min.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../assets/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="../assets/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</head>
<body>

	<?php
		include '../koneksi.php';
	?>

	<center>
		<h2>Data Produk Jadi</h2>
		<h3>CV. Green Zone Herbal</h3>
	</center><br>

	<table class="table table-bordered table-hover table-striped table-sm">
		<thead>
			<tr>
				<th width="1%">No</th>
				<th>Kode Produk</th>
				<th>Nama Produk</th>
				<th>Jenis Produk</th>
				<th>Stok Produk</th>
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
				<td><?php echo $d['stok_produk']; ?></td>
			</tr>

			<?php 
				}
				?>
		</tbody>
	</table>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script>
	window.print();
</script>

</body>
</html>