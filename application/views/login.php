<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Login</title>
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
	<div class="header">Login</div>
	<center>
		<table>
			<form method="post" action="http://localhost/distro-meup/Login/loginAction">
				<tr><td><input class="form" type="text" name="username" placeholder="Username" class="form"></td></tr>
				<tr><td><input class="form" type="password" name="password" placeholder="Password" class="form"></td></tr>
				<tr><td><input class="submit" type="submit" name="Daftar" value="Login"></td></tr>
			</form>
		</table>
	</center>
</div>

</body>
</html>