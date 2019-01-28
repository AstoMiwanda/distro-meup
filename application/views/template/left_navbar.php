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
            <li><a href="<?=base_url()?>Chart"><i class="fa fa-circle-o"></i> ChartJS</a></li>
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
            <li class="active"><a href="<?=base_url()?>Baju"><i class="fa fa-circle-o"></i> Baju</a></li>
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