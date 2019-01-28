<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
</head>
<body>

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Celana.xls");
?>

<table border="1" style="width: 100%">
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Merk</th>
		<th>Warna</th>
		<th>Ukuran</th>
		<th>Stock</th>
		<th>Harga</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($data->result() as $value) {?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $value->kode ?></td>
			<td><?php echo $value->merk ?></td>
			<td><?php echo $value->warna ?></td>
			<td><?php echo $value->ukuran ?></td>
			<td><?php echo $value->stock ?></td>
			<td><?php echo $value->harga ?></td>
		</tr>
	<?php } ?>
</table>

</body>
</html>