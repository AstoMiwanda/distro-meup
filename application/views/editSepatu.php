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
    
<div id="input">
    <div class="header">Edit Data Sepatu</div>    
    <form action="<?=base_url()?>Sepatu/EditAction" method="post"><center><table>
        <?php foreach ($isi->result() as $value) { ?>
            <input type="hidden" name="id" value="<?php echo $value->id ?>">
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td><input class="form" type="text" name="merk" class="form" value="<?php echo $value->merk ?>" required></td>
            </tr>
            <tr>
                <td>Warna</td>
                <td>:</td>
                <td><input class="form" type="text" name="warna" class="form" value="<?php echo $value->warna ?>" required></td>
            </tr>
            <tr>
                <td>Ukuran</td>
                <td>:</td>
                <td><input class="form" type="text" name="ukuran" class="form" value="<?php echo $value->ukuran ?>" required></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input class="form" type="text" name="stock" class="form" value="<?php echo $value->stock ?>" required></td>
            </tr>
        <?php } ?>
    </table>
    <div class="box-btn">
        <input class="submit-edit" type="submit" name="Daftar" value="Edit">
        <input class="submit-edit" type="reset" name="Daftar" value="Reset">
    </div></center></form>
</div>

</body>
</html>