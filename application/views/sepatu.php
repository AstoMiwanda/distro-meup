<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Baju Distro</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
</head>
<body>

<div id="baju">

		<div class="flex-all">
			<!-- End of Menu Navbar Left -->
			<div class="menu">
				<div class="profile">
					<div class="img-profile" style="background-image: url('<?=base_url()?>assets/img/profile.jpg');"></div>

					<h1><?php echo "Asto Arianto Miwanda"; ?></h1>

					<h2><?php echo "Admin"; ?></h2>
					<div class="line"></div>
				</div>

				<div class="navbar-left">
					<a href="<?=base_url()?>Transaksi"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/baju.svg">
						<p>Transaksi</p>
					</div></a>

					<a href="<?=base_url()?>Baju"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/baju.svg">
						<p>Baju Distro</p>
					</div></a>

					<a href="<?=base_url()?>Celana"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/celana.svg">
						<p>Celana Distro</p>
					</div></a>

					<a href="<?=base_url()?>Sepatu"><div class="active navbar-left-list">
						<img src="<?=base_url()?>assets/img/sepatu.svg">
						<p>Sepatu Distro</p>
					</div></a>

					<a href="<?=base_url()?>Tas"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/tas.svg">
						<p>Tas Distro</p>
					</div></a>
				</div>
			</div>
			<!-- End of Menu Navbar Left -->

			<!-- Content Right -->
			<div class="content">
				<div class="navbar-top">
					<h3>Distro Me Up</h3>
				</div>

				<div class="content-title">
					<h4><?php echo "Baju"." Distro Me Up"; ?></h4>
					<div class="line"></div>
				</div>

				<!-- Nabvar Content -->
				<form method="get" action="" novalidate="novalidate" class="navbar-content">
					<div class="flex">
						<p>Ukuran</p>
						<select name="ukuran">
							<option value="s">S</option>
							<option value="m">M</option>
							<option value="xl">XL</option>
							<option value="xxl">XXL</option>
						</select>
					</div>

					<div class="flex">
						<p>Tampilkan</p>
						<select name="tampilkan">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
						</select>
					</div>

					<div class="flex search">
						<input type="text" name="cari" class="input-cari" placeholder="Search">
						<img src="<?=base_url()?>assets/img/search.svg">
					</div>
				</form>

				<a href="<?=base_url()?>Sepatu/ViewAdd"><button class="btn-submit">Tambah</button></a>
				<!-- End of Nabvar Content -->

				<div class="table-content">
					<div class="navbar-table-content">
						<h4>Data Baju</h4>
					</div>

					<table border="1">
						<tr>
							<th>No</th>
							<th>Merk Baju</th>
							<th>Warna</th>
							<th>Size</th>
							<th>Stock</th>
							<th colspan="2">Aksi</th>
						</tr>

						<?php foreach ($isi->result() as $value) { ?>
							<tr>
								<td><?php echo $value->id ?></td>
								<td><?php echo $value->merk ?></td>
								<td><?php echo $value->warna ?></td>
								<td><?php echo $value->ukuran ?></td>
								<td><?php echo $value->stock ?></td>
								<td><a href="<?=base_url()?>Sepatu/ViewEdit/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
								<td><a href="<?=base_url()?>Sepatu/Delete/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></a></td>
							</tr>
						<?php }?>
					</table>

					<div class="flex table-button">
						<button>Upload</button>
						<button>Download</button>
					</div>

					<div class="flex number-page">
						<img src="">
					</div>
				</div>
			</div>
			<!-- End of Content Right -->

		</div>
	
</div>

</body>
</html>