<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Add Tas</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
</head>
<body>
    
<form action="<?=base_url()?>Tas/EditAction" method="post"><center><table>
    <?php foreach ($isi->result() as $value) { ?>
        <input type="hidden" name="id" value="<?php echo $value->id ?>">
        <tr>
            <td>Merk</td>
            <td>:</td>
            <td><input type="text" name="merk" id="merk" value="<?php echo $value->merk ?>"></td>
        </tr>
        <tr>
            <td>Warna</td>
            <td>:</td>
            <td><input type="text" name="warna" id="warna" value="<?php echo $value->warna ?>"></td>
        </tr>
        <tr>
            <td>Ukuran</td>
            <td>:</td>
            <td><input type="text" name="ukuran" id="ukuran" value="<?php echo $value->ukuran ?>"></td>
        </tr>
        <tr>
            <td>Stock</td>
            <td>:</td>
            <td><input type="text" name="stock" id="stock" value="<?php echo $value->stock ?>"></td>
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
            <input type="submit" value="Edit"></td>
        </tr>
    <?php } ?>
</table></center></form>

</body>
</html>