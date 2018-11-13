<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Add Celana</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
</head>
<body>
    
<form action="<?=base_url()?>Celana/AddAction" method="post"><center><table>
    <tr>
        <td>Merk</td>
        <td>:</td>
        <td><input type="text" name="merk" id="merk" placeholder="Merk"></td>
    </tr>
    <tr>
        <td>Warna</td>
        <td>:</td>
        <td><input type="text" name="warna" id="warna" placeholder="Warna"></td>
    </tr>
    <tr>
        <td>Ukuran</td>
        <td>:</td>
        <td><input type="text" name="ukuran" id="ukuran"  placeholder="Ukuran"></td>
    </tr>
    <tr>
        <td>Stock</td>
        <td>:</td>
        <td><input type="text" name="stock" id="stock"  placeholder="Stock"></td>
    </tr>
    <tr>
        <td>&nbsp</td>
        <td>&nbsp</td>
        <td>&nbsp</td>
    </tr>
    <tr>
        <td>&nbsp</td>
        <td>&nbsp</td>
        <td><input type="reset" value="Reset">
        <input type="submit" value="Tambah"></td>
    </tr>
</table></center></form>

</body>
</html>