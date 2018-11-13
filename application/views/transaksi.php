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
                    <a href="<?=base_url()?>Transaksi"><div class="active navbar-left-list">
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

					<a href="<?=base_url()?>Sepatu"><div class="navbar-left-list">
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
					<h4><?php echo "Transaksi"." Distro Me Up"; ?></h4>
					<div class="line"></div>
                </div>
                
                <div class="data-input-transaksi">
                    <form action="" method="post" class="input-transaksi">
                        <table>
                            <tr>
                                <td>Id Barang</td>
                                <td>:</td>
                                <td><input type="text" name="id_barang" id="id_barang" style="width: 50%;"></td>
                            </tr>

                            <tr>
                                <td>Nama Barang</td>
                                <td>:</td>
                                <td><input type="text" name="nama_barang" id="nama_barang"></td>
                            </tr>

                            <tr>
                                <td>Harga Satuan</td>
                                <td>:</td>
                                <td><input type="text" name="harga_barang" id="harga_barang" value="50000" class="input-readonly" readonly></td>
                            </tr>

                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td><input type="number" name="jumlah" id="jumlah"></td>
                            </tr>

                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td><input type="text" name="subtotal" id="subtotal" class="input-readonly" value="25000" readonly></td>
                            </tr>

                            <tr>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                <td><button type="submit" class="btn-submit" readonly>Tambah</button></td>
                            </tr>
                        </table>
                    </form>

                    <div class="total-transaksi">
                        <p>Total (Rp) :</p>
                        <input type="text" name="total_belanja" id="total_belanja" value="<?php echo "18000" ?>" class="input-readonly" readonly>

                        <p>Bayar (Rp) :</p>
                        <input type="text" name="total_belanja" id="total_belanja">

                        <p>Kembali (Rp) :</p>
                        <input type="text" name="total_belanja" id="total_belanja" value="<?php echo "2000" ?>" class="input-readonly" readonly>
                    </div>
                </div>

                <!-- End of Nabvar Content -->

				<div class="table-content">
					<div class="navbar-table-content">
						<h4>Data Baju</h4>
					</div>

					<table border="1">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Harga Total</th>
                            <th>Aksi</th>
                        </tr>

                        <?php for ($i=1; $i < 6; $i++) { ?>
                            <tr>
                            <td>1</td>
                            <td>Baju Distro</td>
                            <td>250000</td>
                            <td>2</td>
                            <td>500000</td>
                            <td><a href="<?=base_url()?>Transaksi/Delete"></a></td>
                        </tr>
                        <?php } ?>
                    </table>

					<div class="flex table-button">
						<button>Transaksi</button>
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