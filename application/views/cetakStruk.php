<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>
 
	</center>
	<table border="1" style="width: 100%">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Harga Total</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($data_struk->result() as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $value->merk ?></td>
				<td><?php echo $value->harga ?></td>
				<td><?php echo $value->jumlah ?></td>
				<td><?php echo $value->total ?></td>
			</tr>
		<?php } ?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>