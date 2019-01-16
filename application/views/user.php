<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Celana Distro</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
</head>
<body>

<div id="baju">

		<div class="flex-all">
			<!-- End of Menu Navbar Left -->
			<div class="menu">
				<div class="menu-top">
					<?php if (isset($user)) {
						foreach ($user->result() as $value) { ?>
							<div class="profile">
								<!-- <div class="img-profile" style="background-image: url('<?=base_url()?>assets/img/profile.jpg');"></div> -->

								<h1><?php echo $value->fullname; ?></h1>

								<h2><?php echo $value->level; ?></h2>
								<div class="line"></div>
							</div>
						<?php }
					}else{ ?>
						<div class="profile">
							<div class="img-profile" style="background-image: url('<?=base_url()?>assets/img/profile.jpg');"></div>

							<h1><?php echo "Asto Arianto Miwanda(CreateBy)"; ?></h1>

							<h2><?php echo "default"; ?></h2>
							<div class="line"></div>
						</div>
					<?php } ?>

					<div class="navbar-left">
						<a href="<?=base_url()?>Transaksi"><div class="navbar-left-list">
							<img src="<?=base_url()?>assets/img/baju.svg">
							<p>Transaksi</p>
						</div></a>

						<a href="<?=base_url()?>Baju"><div class="navbar-left-list">
							<img src="<?=base_url()?>assets/img/baju.svg">
							<p>Baju</p>
						</div></a>

						<a href="<?=base_url()?>Celana"><div class="navbar-left-list">
							<img src="<?=base_url()?>assets/img/celana.svg">
							<p>Celana</p>
						</div></a>

						<a href="<?=base_url()?>Sepatu"><div class="navbar-left-list">
							<img src="<?=base_url()?>assets/img/sepatu.svg">
							<p>Sepatu</p>
						</div></a>

						<a href="<?=base_url()?>Tas"><div class="navbar-left-list">
							<img src="<?=base_url()?>assets/img/tas.svg">
							<p>Tas</p>
						</div></a>

						<?php foreach ($user->result() as $value) {
							if ($value->level == 'Admin') { ?>
								<a href="<?=base_url()?>User"><div class="active navbar-left-list">
									<img src="<?=base_url()?>assets/img/tas.svg">
									<p>User</p>
								</div></a>
							<?php }} ?>
						</div>
					</div>

					<div class="logout">
						<div class="logout-box" onclick="logout()">
							<a href="http://localhost/distro-meup/Login/logout">Logout</a>
						</div>
					</div>
				</div>
				<!-- End of Menu Navbar Left -->

			<!-- Content Right -->
			<div class="content">
				<div class="navbar-top">
					<h3>Distro Me Up</h3>
				</div>

				<div class="container">
					<div class="content-title">
						<h4><?php echo "Celana"." Distro Me Up"; ?></h4>
						<div class="line"></div>
					</div>

					<!-- Nabvar Content -->
					<!-- <form method="get" action="" novalidate="novalidate" class="navbar-content">
						<div class="flex flex-hcenter">
							<p>Ukuran</p>
							<select name="ukuran">
								<option value="s">S</option>
								<option value="m">M</option>
								<option value="xl">XL</option>
								<option value="xxl">XXL</option>
							</select>
						</div>

						<div class="flex flex-hcenter">
							<p>Tampilkan</p>
							<select name="tampilkan">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
							</select>
						</div>

						<div class="flex flex-hcenter search">
							<input type="text" name="cari" class="input-cari" placeholder="Search">
							<img src="<?=base_url()?>assets/img/search.svg">
						</div>
					</form> -->

					<a href="<?=base_url()?>User/ViewAdd"><button class="btn-submit">Tambah</button></a>
					<!-- End of Nabvar Content -->

					<div class="table-content">
						<div class="navbar-table-content">
							<h4>Data Celana</h4>
						</div>

						<table border="1">
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama Lengkap</th>
								<th>Level</th>
								<th colspan="2">Aksi</th>
							</tr>

							<?php $i=0; foreach ($isi['isi']->result() as $value)
							{ $i++;?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->username;?></td>
									<td><?php echo $value->fullname;?></td>
									<td><?php echo $value->level;?></td>
									<td><a href="<?=base_url()?>User/ViewEdit/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
									<td><a href="<?=base_url()?>User/Delete/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></td>
								</tr>
							<?php }?>
						</table>

						<!-- <div class="flex table-button">
							<button>Upload</button>
							<button>Download</button>
						</div> -->

						<div class="flex number-page">
							<img src="">
						</div>
					</div>
				</div>
			</div>
			<!-- End of Content Right -->

		</div>
	
</div>

</body>

<<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.min.js"></script>

<script type="text/javascript">
	function logout() {
		window.location.href = 'http://localhost/distro-meup/Login/logout';
	}
</script>

</html>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>Stock Barang</title>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url()?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header id="main-header" class="main-header">
    <!-- Logo -->
    <a href="<?=base_url()?>assets/AdminLTE/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>D</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Distro </b>MeUp</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="assets/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <?php if (isset($user)) {
					foreach ($user->result() as $value) { ?>
						<span class="hidden-xs"><?php echo $value->fullname; ?></span>
					<?php }
				}else{ ?>
					<span class="hidden-xs">Created by SMK Telkom</span>
				<?php } ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                <?php if (isset($user)) {
					foreach ($user->result() as $value) { ?>
						<p><?php echo $value->fullname; ?>
							<small><?php echo $value->level; ?></small>
						</p>
					<?php }
				}else{ ?>
					<p>Created by SMK Telkom
					<small>Kelompok 1</small>
				</p>
				<?php } ?>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=base_url()?>Login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div> -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>Transaksi/DetailTransaksi"><i class="fa fa-circle-o"></i> Detail Transaksi</a></li>
            <li><a href="<?=base_url()?>Transaksi/LaporanTransaksi"><i class="fa fa-circle-o"></i> Laporan Transaksi</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>assets/AdminLTE/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>Transaksi"><i class="fa fa-circle-o"></i> Transaksi</a></li>
            <li><a href="<?=base_url()?>Baju"><i class="fa fa-circle-o"></i> Baju</a></li>
            <li><a href="<?=base_url()?>Celana"><i class="fa fa-circle-o"></i> Celana</a></li>
            <li><a href="<?=base_url()?>Sepatu"><i class="fa fa-circle-o"></i> Sepatu</a></li>
            <li><a href="<?=base_url()?>Tas"><i class="fa fa-circle-o"></i> Tas</a></li>
            <?php foreach ($user->result() as $value) {
            	if ($value->level == 'Admin') { ?>
            		<li class="active"><a href="<?=base_url()?>User"><i class="fa fa-circle-o"></i> User</a></li>
        	<?php }} ?>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Data Barang</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <a href="<?=base_url()?>User/ViewAdd" type="button" class="btn btn-block btn-success">Tambah</a>
    <section id="tables-barang" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Stock Baju</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            	<tr>
            		<th>No</th>
            		<th>Username</th>
            		<th>Nama Lengkap</th>
            		<th>Level</th>
            		<th colspan="2">Aksi</th>
            	</tr>
                </thead>
                <tbody>
            	<?php $i=0; foreach ($isi['isi']->result() as $value)
            	{ $i++;?>
            		<tr>
            			<td><?php echo $i;?></td>
            			<td><?php echo $value->username;?></td>
            			<td><?php echo $value->fullname;?></td>
            			<td><?php echo $value->level;?></td>
            			<td><a href="<?=base_url()?>User/ViewEdit/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
            			<td><a href="<?=base_url()?>User/Delete/<?php echo $value->id ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></td>
            		</tr>
            	<?php }?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>