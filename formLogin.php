!DOCTYPE html>
<html>
<head>
	<title>Login Dulu Y</title>
</head>
<body>

<form method="POST" action="application/controllers/db.php">
	<table style="margin: auto; margin-top: 50px;">
		<tr>
			<td>Username</td>
			<td>Password</td>
		</tr>
		<tr>
			<td><input type="text" name="username"></td>
			<td><input type="password" name="password"></td>
			<td><button style="margin: auto;">Login</button></td>
		</tr>
	</table>
</form>

<form method="POST" action="gudang/db/connect.php">
	<table>
		<tr>
			<td><input type="text" name="table"></td>
			<td><button name="submit">Select</button></td>
		</tr>
	</table>
</form>

</body>
</html>