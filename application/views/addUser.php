<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
</head>
<style type="text/css">
body{
	width: 100%;
	margin: 0;
	font-family: 'Segoe UI',serif, sans-serif;
}
</style>
<body>

<div id="input">
	<div class="header">Input Data User</div>
	<center>
		<table>
			<form method="post" action="addAction">
				<tr><td><input class="form" type="text" name="username" placeholder="Username" class="form" required></td></tr>
				<tr><td><input class="form" type="password" name="password" placeholder="Password" class="form" required></td></tr>
				<tr><td><input class="form" type="text" name="fullname" placeholder="Fullname" class="form" required></td></tr>
				<tr><td><select class="form" name="level">
					<option value="Admim">Admin</option>
					<option value="User">User</option>
				</select></td></tr>
				<tr><td><input class="submit" type="submit" name="Daftar" value="Tambah"></td></tr>
			</form>
		</table>
	</center>
</div>

</body>
</html>