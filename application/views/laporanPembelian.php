<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Data Transaksi</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <div style="display: flex; align-items: center;">
      <a href="<?=base_url()?>Transaksi/ViewAddPembelian" type="button" class="btn btn-success">Tambah</a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
        Upload Excel
      </button>
      <a href="<?=base_url()?>Transaksi/ExportLaporanPembelian" type="button" class="btn btn-success">Download Data</a>
    </div>
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
                  <th>Kategori</th>
                  <th>Kode</th>
                  <th>Jumlah</th>
                  <th>Total</th>
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
                		<td>
                      <?php $this->M_user->where_data($value->kategori);
                      $kategori = $this->M_user->get_data('tkategori');
                      foreach ($kategori->result() as $valueKategori) {
                        echo $valueKategori->kategori;
                      } ?>
                    </td>
                		<td><?php echo $value->kode; ?></td>
                		<td><?php echo $value->jumlah; ?></td>
                    <td><?php echo $value->total; ?></td>
                		<td><?php echo $value->tanggal; ?></td>
                    <?php if ($level_user == 'Admin') { ?>
                      <td><a href="<?=base_url()?>Transaksi/viewEditLaporanPembelian/<?php echo $value->id; ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Excel</h4>
      </div>
      <form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo base_url(); ?>Transaksi/ImportExcelPembelian">
      <div class="modal-body">
          <p><label>Pilih File Excel</label>
            <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
            <br />
            <input type="checkbox" name="empty" value="empty" style="margin-right: 15px">Hapus semua data yang ada
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="import" value="Import" class="btn btn-primary">Import</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->

<?php require_once 'template/footer.php' ?>
<script type="text/javascript">
	$( ".treeview-dashboard" ).last().addClass( "active" );
	$( ".LaporanPembelian" ).last().addClass( "active" );
</script>