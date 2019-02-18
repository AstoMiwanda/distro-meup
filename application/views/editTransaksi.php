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

    <!-- Input -->
    <div class="content" style="min-height: unset; padding: 0 15px; margin-top: 32px;">
      <div class="row">
        <div class="col-md-6">
          <!-- form start -->
            <form class="form-horizontal" method="post" action="<?=base_url()?>Transaksi/EditTransaksiMaster">
              <div class="box-body" style="padding: 0 10px;">
                <div class="row" style="display: flex;align-items: flex-end;">

                  <input type="hidden" name="transaksimaster_id" value="<?php echo $transaksimaster_id ?>">
                  <div class="col-md-5">
                    <div class="form-group" style="margin-bottom: 0;">
                      <label for="inputEmail3" class="col-sm-12 control-label" style="text-align: left;">Total (Rp)</label>

                      <div class="col-sm-12">
                        <input type="number" name="total_transaksi" class="form-control" id="inputEmail3" value="<?php echo $total_transaksi ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group" style="margin-bottom: 0;">
                      <label for="inputPassword3" class="col-sm-12 control-label" style="text-align: left;">Bayar (Rp)</label>

                      <div class="col-sm-12">
                        <input type="number" name="bayar" class="form-control" id="inputPassword3" value="<?php echo $bayar ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" name="submit" value="submit" class="btn btn-info pull-right" style="width: 100%;">Edit</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
        </div>
      </div>
    </div>
    <!-- End of Input -->
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
                  <th>Kategori</th>
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
                    <td>
                      <?php $this->M_user->where_data($value->kategori);
                      $kategori = $this->M_user->get_data('tkategori');
                      foreach ($kategori->result() as $valueKategori) {
                        echo $valueKategori->kategori;
                      } ?>
                    </td>
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