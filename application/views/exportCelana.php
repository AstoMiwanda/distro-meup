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
		<th>Kategori</th>
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
			<td>
			<?php
				$this->db->where('id', $value->kategori_id);
				foreach ($this->db->get('tkategori')->result() as $value_kategori) {
					echo "($value->kategori_id) $value_kategori->kategori";
				}
			?>
			</td>
		</tr>
	<?php } ?>
</table>

</body>
</html>