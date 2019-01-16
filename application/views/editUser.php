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
<body>

<div id="input">
    <div class="header">Edit Data User</div>    
    <form action="<?=base_url()?>User/EditAction" method="post"><center><table>
        <?php foreach ($isi->result() as $value) { ?>
            <input type="hidden" name="id" value="<?php echo $value->id ?>">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input class="form" type="text" name="username" placeholder="Username" class="form" value="<?php echo $value->username ?>" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input class="form" type="text" name="fullname" placeholder="Fullname" class="form" value="<?php echo $value->fullname ?>" required></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>:</td>
                <td><select class="form" name="level">
                    <option value="Admim">Admin</option>
                    <option value="User">User</option>
                </select></td>
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