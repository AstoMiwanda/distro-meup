<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
</head>
<body>

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pembelian.xls");
?>

<table border="1" style="width: 100%">
	<tr>
		<th>No</th>
		<th>User</th>
		<th>Kategori</th>
		<th>Kode</th>
		<th>Jumlah</th>
		<th>Total</th>
		<th>Tanggal</th>
	</tr>
	<?php 
	$no = 1;
	foreach ($pembelian->result() as $value) {?>
		<tr style="text-align: center;">
			<td><?php echo $no++; ?></td>
			<td>
				<?php $this->M_user->where_data($value->user_id);
				$user = $this->M_user->get_data('tuser');
				foreach ($user->result() as $valueUser) {
					echo $valueUser->username;
				} ?>
			</td>
			<td>
				<?php $this->M_user->where_data($value->kategori);
				$kategori = $this->M_user->get_data('tkategori');
				foreach ($kategori->result() as $valueKategori) {
					echo $valueKategori->kategori;
				} ?>
			</td>
			<td><?php echo $value->kode ?></td>
			<td><?php echo $value->jumlah ?></td>
			<td><?php echo $value->total ?></td>
			<td><?php echo $value->tanggal ?></td>
		</tr>
	<?php } ?>
</table>

</body>
</html>