 <?php if (isset($keranjang)) {
    $total_belanja = 0;
    foreach ($keranjang['keranjang']->result() as $value){
        $total_belanja+=$value->total;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>DM | Keranjang</title>
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
            <li class="active"><a href="<?=base_url()?>Transaksi"><i class="fa fa-circle-o"></i> Transaksi</a></li>
            <li><a href="<?=base_url()?>Baju"><i class="fa fa-circle-o"></i> Baju</a></li>
            <li><a href="<?=base_url()?>Celana"><i class="fa fa-circle-o"></i> Celana</a></li>
            <li><a href="<?=base_url()?>Sepatu"><i class="fa fa-circle-o"></i> Sepatu</a></li>
            <li><a href="<?=base_url()?>Tas"><i class="fa fa-circle-o"></i> Tas</a></li>
            <?php foreach ($user->result() as $value) {
                if ($value->level == 'Admin') { ?>
                    <li><a href="<?=base_url()?>User"><i class="fa fa-circle-o"></i> User</a></li>
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
        <small>Keranjanga Transaksi</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <div class="row" style="padding: 25px 15px 0 15px;">
        <div class="col-md-6">
            <!-- Horizontal Form -->
        <?php if (isset($input)) {
        foreach ($input['input']->result() as $value){ ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?=base_url('Transaksi/AddKeranjang')?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID_Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_barang" id="id_barang" value="<?php echo $value->kode ?>" style="width: 50%;" onchange="idChange(this.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $value->merk ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Harga Satuan</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control input-readonly" name="harga_barang" id="harga_barang" value="<?php echo $value->harga ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="" onchange="jmlChange(this.value)"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sub Total</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="subtotal" id="subtotal" class="input-readonly" value="" readonly>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        <?php }}elseif(!isset($input)){ ?>
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ID_Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_barang" id="id_barang" value="" style="width: 50%;" onchange="idChange(this.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Barang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Harga Satuan</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control input-readonly" name="harga_barang" id="harga_barang" value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="" onchange="jmlChange(this.value)"  required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Sub Total</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="subtotal" id="subtotal" class="input-readonly" value="" readonly>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Tambah Keranjang</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <?php } ?>
        </div>

        <div class="col-md-6">
            <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?=base_url()?>Transaksi/AddTransaksi" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Total (Rp)</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="total_belanja" id="total_belanja" value="<?php echo $total_belanja ?>" class="input-readonly" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Bayar (Rp)</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="bayar" id="bayar" onchange="bayarOnchange(this.value)" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kembali (Rp)</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kembalian" id="kembalian" value="0" class="input-readonly" readonly>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">Transaksi</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
    <section id="tables-barang" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Keranjang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Harga Total</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($keranjang)) { $i = 0;
                    foreach ($keranjang['keranjang']->result() as $value) { $i++ ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value->merk ?></td>
                            <td><?php echo $value->harga ?></td>
                            <td><?php echo $value->jumlah ?></td>
                            <td><?php echo $value->total ?></td>
                            <td><form method="POST" action="<?=base_url()?>Transaksi/EditView">
                                <input type="hidden" name="kode" value="<?php echo $value->kode ?>">
                                <input type="submit" value="" style="background-image: url('<?=base_url()?>assets/img/edit.svg'); border: none; width: 24px; height: 24px; background-color: rgba(0,0,0,0); cursor: pointer;" class="btn-edit-transaksi">
                            </form></td>
                            <td><a href="<?=base_url()?>Transaksi/Delete/<?php echo $value->kode ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></td>
                        </tr>
                <?php }} ?>
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
<script>
var base_url = "http://localhost/distro-meup/";

function idChange(val) {
    window.location.href = 'http://localhost/distro-meup/Transaksi/index/' + val;
}
function jmlChange(val) {
    var hb = document.getElementById("harga_barang").value;
    var st = document.getElementById("subtotal");
    var total = hb * val;
    st.setAttribute('value', total);    
}
function bayarOnchange(val) {
    var tb = document.getElementById("total_belanja").value;
    var kembali = document.getElementById("kembalian");
    kembalian.setAttribute('value', val - tb);
}
function addTransaksi() {
    window.location.href = 'http://localhost/distro-meup/Transaksi/AddTransaksi';
}
</script>
</body>
</html>