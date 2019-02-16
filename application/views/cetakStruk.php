<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Distro-Struk</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css">
</head>

<body>
	<section style="padding:16px 0px;">
		<div class="container">
			<div class="row">
				<div class="col">
					<h4 class="text-center">Distro MeUp<br></h4>
					<p class="text-center" style="margin:0px;">Jl.Raya.Glempang<br></p>
					<p class="text-center">Telp : 085747930125</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div style="height:1px;background-color:#222222;"></div>
					<div style="height:2px;background-color:#222222;margin-top:2px;"></div>
				</div>
			</div>
			
			<div class="row" style="margin-top:16px;">
				<div class="col-3">
					<h6 class="d-flex justify-content-between">Kode<span>:</span></h6>
				</div>
				<div class="col">
					<p style="margin:0px;"><?php echo $tunai[0]->kode_nota; ?></p>
				</div>
				<div class="col">
					<p class="text-right" style="margin:0px;"><?php echo $tunai[0]->tanggal_transaksi; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<h6 class="d-flex justify-content-between">Kasir<span>:</span></h6>
				</div>
				<?php foreach ($data_user->result() as $value_user) {?>
					<div class="col">
						<p style="margin:0px;"><?php echo $value_user->level; ?></p>
					</div>
				<?php } ?>
				<div class="col">
					<p class="text-right" style="margin:0px;"><?php echo date('H:i:s'); ?></p>
				</div>
			</div>
			<div class="row" style="margin:8px -15px;">
				<div class="col">
					<div style="height:1px;background-color:#aaaaaa;"></div>
				</div>
			</div>

			<?php foreach ($data_struk->result() as $value) {?>
				<div class="row" style="margin-bottom:8px;">
					<div class="col-7">
						<p style="margin:0px;"><?php echo $value->jumlah."pcs ".$value->merk." x ".$value->harga ?></p>
					</div>
					<div class="col">
						<h6 class="d-flex justify-content-between" style="margin:0px;">= Rp<span><?php echo $value->total ?></span></h6>
					</div>
				</div>
			<?php } ?>

			<div class="row" style="margin:8px -15px;">
				<div class="col-5 offset-7">
					<div style="background-color:#222222;height:1px;"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom:8px;">
				<div class="col-5">
					<p style="margin:0px;">Total</p>
				</div>
				<div class="col-7">
					<h6 class="text-right" style="margin:0px;">Rp<span style="margin-left:8px;"><?php echo $total_belanja; ?></span></h6>
				</div>
			</div>
			<div class="row" style="margin-bottom:8px;">
				<div class="col-5">
					<p style="margin:0px;">Tunai</p>
				</div>
				<div class="col-7">
					<h6 class="text-right" style="margin:0px;">Rp<span style="margin-left:8px;"><?php echo $tunai[0]->bayar; ?></span></h6>
				</div>
			</div>
			<div class="row" style="margin:8px -15px;">
				<div class="col">
					<div style="height:1px;background-color:#aaaaaa;"></div>
				</div>
			</div>
			<div class="row" style="margin-bottom:8px;">
				<div class="col-5">
					<p style="margin:0px;">Kembali</p>
				</div>
				<div class="col-7">
					<h6 class="text-right" style="margin:0px;">Rp<span style="margin-left:8px;"><?php echo $tunai[0]->bayar - $tunai[0]->total_transaksi; ?></span></h6>
				</div>
			</div>
			<div class="row" style="margin-top:16px;">
				<div class="col offset-1">
					<p class="text-center" style="margin:0px;">Terima kasih telah membeli produk kami.</p>
					<p class="text-center" style="margin:0px;font-style:italic;">*Produk yang telah dibeli tidak bisa dikembalikan lagi.</p>
				</div>
			</div>
		</div>
	</section>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script>
		window.print();
	</script>
</body>
</html>