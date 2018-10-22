<!DOCTYPE html>
<html>
<head>
	<title>Update Data User</title>
</head>
<style type="text/css">
	body{
		width: 100%;
		margin: 0;
		font-family: 'Segoe UI',serif,sans-serif;
	}
	#header{
		width: 60%;
		background-color: #f4f4f4;
		border-radius: 5px;
		margin: 50px auto;
		padding-bottom: 25px;
	}
	#header .title{
		width: 100%;
		background-color: #0984e3;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		padding: 20px 0;
		font-size: 18pt;
		color: #fff;
		text-align: center;
	}
	#header .form{
		padding: 15px 10px;
		width: 255px;
		margin: auto;
		border: none;
		border-radius: 3px;
		margin-top: 15px;
		border: solid 1px #222;
	}
	#header .submit{
		border: none;
		padding: 10px 45px;
		color: #fff;
		font-weight: bold;
		margin-top: 25px;
		background-color: #0984e3;
		border-radius: 5px;
	}
</style>
<body>

<div id="header">
	<div class="title">Updata Data User</div>
	<center>
	<table>
		<?php foreach ($isi->result() as $value): ?>
		<form method="post" action="../updateAction/<?php echo $value->id ?>">
				<tr><td><input class="form" type="hidden" name="id" value="<?php echo $value->id; ?>"></td></tr>
				<tr><td><input required class="form" type="text" name="username" value="<?php echo $value->username; ?>"></td></tr>
				<tr><td><input required class="form" type="password" name="password" value="<?php echo $value->password; ?>"></td></tr>
				<tr><td><input required class="form" type="text" name="fullname" value="<?php echo $value->fullname; ?>"></td></tr>
				<tr><td><input required class="form" type="text" name="level" value="<?php echo $value->level; ?>"></td></tr>
				<tr><td><input class="submit" type="submit" name="Update"></td></tr>
			<?php endforeach ?>
		</form>
	</table>
	</center>
</div>

</body>
</html>