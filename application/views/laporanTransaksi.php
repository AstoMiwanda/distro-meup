<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Laporan Transaksi</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section id="tables-barang" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>User</th>
                  <th>Kode Nota</th>
                  <th>Total Transaksi</th>
                  <th>Bayar</th>
                  <th>Tanggal</th>
                  <?php if ($level_user == 'Admin') { ?>
                      <th>Edit</th>
                      <th>Hapus</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach ($data->result() as $value) { $i++; ?>
                	<tr>
                    <td><?php echo $i; ?></td>
                		<td>
                      <?php $this->M_user->where_data($value->user_id);
                      $user = $this->M_user->get_data('tuser');
                      foreach ($user->result() as $valueUser) {
                        echo $valueUser->username;
                      } ?>
                    </td>
                		<td><?php echo $value->kode_nota; ?></td>
                		<td><?php echo $value->total_transaksi; ?></td>
                		<td><?php echo $value->bayar; ?></td>
                		<td><?php echo $value->tanggal_transaksi; ?></td>
                    <?php if ($level_user == 'Admin') { ?>
                      <td><a href="<?=base_url()?>Transaksi/viewEditTransaksi/<?php echo $value->id; ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
                      <td><a href="<?=base_url()?>Transaksi/deleteLaporanPembelian/<?php echo $value->id; ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></td>
                    <?php } ?>
                	</tr>
                <?php } ?>
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

<?php require_once 'template/footer.php' ?>
<script type="text/javascript">
  $( ".treeview-dashboard" ).last().addClass( "active" );
  $( ".LaporanTransaksi" ).last().addClass( "active" );
</script>