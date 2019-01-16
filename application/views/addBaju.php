<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Add Baju</title>
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
    <div class="header">Input Data Baju</div>
    <center>
        <table>
            <form action="<?=base_url()?>Baju/AddAction" method="post">
                <tr><td><input class="form" type="text" name="id_barang" placeholder="ID Barang" required></td></tr>
                <tr><td><input class="form" type="text" name="merk" placeholder="Merk" required></td></tr>
                <tr><td><input class="form" type="text" name="warna" placeholder="Warna" required></td></tr>
                <tr><td><input class="form" type="text" name="ukuran" placeholder="Ukuran" required></td></tr>
                <tr><td><input class="form" type="text" name="stock" placeholder="Stock" required></td></tr>
                <tr><td><input class="submit" type="submit" name="Daftar" value="Tambah"></td></tr>
            </form>
        </table>
    </center>
</div>

</body>
</html>