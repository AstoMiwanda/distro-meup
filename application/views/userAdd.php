<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
</head>
<style type="text/css">
body{
	width: 100%;
	margin: 0;
	font-family: 'Segoe UI',serif, sans-serif;
}
#input{
	width: 40%;
	height: 1 vh;
	margin: auto;
	padding: 0;
	background-color: #f4f4f4;
	padding-bottom: 25px;
	border-radius: 3px;
}
#input .header{
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	width: 100%;
	background-color: #0984e3;
	color: #fff;
	text-align: center;
	font-size: 18pt;
	padding: 15px 0;
	margin-top: 50px;
}
.form{
	padding: 15px 10px;
	margin-top: 15px;
	border-radius: 3px;
	border: none;
	border: solid 1px #222;
	width: 280px;
}
#input .submit{
	padding: 10px 50px;
	margin-top: 25px;
	border: none;
	border-radius: 3px;
	background-color: #0984e3;
	color: #fff;
	font-weight: bold;
}
#input .submit:hover{
	opacity: .8;
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
				<tr><td><input class="form" type="text" name="level" placeholder="Level" class="form" required></td></tr>
				<tr><td><input class="submit" type="submit" name="Daftar"></td></tr>
			</form>
		</table>
	</center>
</div>

</body>
</html>