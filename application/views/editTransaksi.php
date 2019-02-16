<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Edit Laporan Transaksi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
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
                  <?php foreach ($user->result() as $value) {
                    if ($value->level == 'Admin') { ?>
                      <th>Edit</th>
                      <th>Hapus</th>
                  <?php }} ?>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach ($data_transaksi->result() as $value) { $i++ ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value->merk ?></td>
                    <td><?php echo $value->harga ?></td>
                    <td><?php echo $value->jumlah ?></td>
                    <td><?php echo $value->total ?></td>
                    <?php foreach ($user->result() as $value_user) {
                      if ($value_user->level == 'Admin') { ?>
                        <td><a href="<?=base_url()?>Transaksi/viewEditDetailTransaksi/<?php echo $value->id; ?>"><img style="width:22px;height:22px;" src="<?=base_url()?>assets/img/edit.svg"></a></td>
                        <td><a href="<?=base_url()?>Transaksi/viewDeleteDetailTransaksi/<?php echo $value->id; ?>"><img style="width:22px;height:22px;" src="<?=base_url()?>assets/img/delete.svg"></a></td>
                    <?php }} ?>
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
  <!-- /.content-wrapper -->

<?php require_once 'template/footer.php' ?>
<script type="text/javascript">
  $( ".treeview-dashboard" ).last().addClass( "active" );
  $( ".DetailTransaksi" ).last().addClass( "active" );
</script>