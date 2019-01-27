<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
</head>
<body>

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Transaksi Master.xls");
?>

<table border="1" style="width: 100%">
	<tr>
		<th>No</th>
		<th>User_ID</th>
		<th>Kode Nota</th>
		<th>Total Transaksi</th>
		<th>Bayar</th>
		<th>Tanggal Transaksi</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($detailTransaksi->result() as $value) {?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $value->user_id ?></td>
			<td><?php echo $value->kode_nota ?></td>
			<td><?php echo $value->total_transaksi ?></td>
			<td><?php echo $value->bayar ?></td>
			<td><?php echo $value->tanggal_transaksi ?></td>
		</tr>
	<?php } ?>
</table>

</body>
</html>