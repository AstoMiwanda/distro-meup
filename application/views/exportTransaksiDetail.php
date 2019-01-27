<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
</head>
<body>

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Transaksi Detail.xls");
?>

<table border="1" style="width: 100%">
	<tr>
		<th>No</th>
		<th>User_ID</th>
		<th>Kode Nota</th>
		<th>Merk</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Total</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($detailTransaksi->result() as $value) {?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $value->user_id ?></td>
			<td><?php echo $value->kode ?></td>
			<td><?php echo $value->merk ?></td>
			<td><?php echo $value->harga ?></td>
			<td><?php echo $value->jumlah ?></td>
			<td><?php echo $value->total ?></td>
		</tr>
	<?php } ?>
</table>

</body>
</html>