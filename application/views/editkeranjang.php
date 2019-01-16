 <?php 
    foreach ($input->result() as $value) {
        echo $value->kode;
    }
    print_r($input->result());
?>
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
						<p>Baju</p>
					</div></a>

					<a href="<?=base_url()?>Celana"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/celana.svg">
						<p>Celana</p>
					</div></a>

					<a href="<?=base_url()?>Sepatu"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/sepatu.svg">
						<p>Sepatu</p>
					</div></a>

					<a href="<?=base_url()?>Tas"><div class="navbar-left-list">
						<img src="<?=base_url()?>assets/img/tas.svg">
						<p>Tas</p>
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
                    <form action="<?=base_url('Transaksi/Edit')?>" method="post" class="input-transaksi">

                    <?php if (isset($input)) {
                    foreach ($input->result() as $value){ ?>
                        <table id="isi">
                            <tr>
                                <td>Id Barang</td>
                                <td>:</td>
                                <td><input type="text" name="id_barang" id="id_barang" value="<?php echo $value->kode ?>" style="width: 50%;" onchange="idChange(this.value)" class="input-readonly" readonly></td>
                            </tr>

                            <tr>
                                <td>Nama Barang</td>
                                <td>:</td>
                                <td><input type="text" name="nama_barang" id="nama_barang" value="<?php echo $value->merk ?>" required></td>
                            </tr>

                            <tr>
                                <td>Harga Satuan</td>
                                <td>:</td>
                                <td><input type="number" name="harga_barang" id="harga_barang" value="<?php echo $value->harga ?>" class="input-readonly" readonly></td>
                            </tr>

                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td><input type="number" name="jumlah" id="jumlah" value="<?php echo $value->jumlah ?>" onchange="jmlChange(this.value)"  required></td>
                            </tr>

                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td><input type="number" name="subtotal" id="subtotal" class="input-readonly" value="<?php echo $value->total ?>" readonly></td>
                            </tr>

                            <tr>
                                <td>&nbsp</td>
                                <td>&nbsp</td>
                                <td><button type="submit" class="btn-submit" readonly>Tambah</button></td>
                            </tr>
                        </table>
                    <?php }}?>
                    </form>

                </div>
                <!-- End of Nabvar Content -->

			</div>
			<!-- End of Content Right -->

		</div>
	
</div>

</body>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

}
</script>

<script>
var base_url = "http://localhost/distro-meup/";

function idChange(val) {
    window.location.href = 'http://localhost/distro-meup/Transaksi/index/' + val;
}
function jmlChange(val) {
    var hb = document.getElementById("harga_barang").value;
    var st = document.getElementById("subtotal");
    var total = hb * val;
    st.setAttribute('value', total);    
}
function bayarOnchange(val) {
    var tb = document.getElementById("total_belanja").value;
    var kembali = document.getElementById("kembalian");
    kembalian.setAttribute('value', val - tb);
}
</script>
</html>