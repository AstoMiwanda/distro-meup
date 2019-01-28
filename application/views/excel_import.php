<!DOCTYPE html>
<html>
<head>
	<title>How to Import Excel Data into Mysql in Codeigniter</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">How to Import Excel Data into Mysql in Codeigniter</h3>
		<form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>Excel_import/import">
			<p><label>Select Excel File</label>
				<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
				<br />
				<input type="checkbox" name="empety" value="empety">Empety Table
				<input type="submit" name="import" value="Import" class="btn btn-info" />
			</form>
			<br />
			<div class="table-responsive" id="customer_data">

			</div>
		</div>
	</body>
	</html>
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

	<script>
		$(document).ready(function(){

			load_data();

			function load_data()
			{
				$.ajax({
					url:"<?php echo base_url(); ?>Excel_import/fetch",
					method:"POST",
					success:function(data){
						$('#customer_data').html(data);
					}
				})
			}
		});
	</script>
