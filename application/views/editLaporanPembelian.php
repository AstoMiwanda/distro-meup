<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Edit Laporan Pembelian</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section>
        <div class="container">
            <div class="row" style="margin-top: 50px;display: flex;justify-content: center;">
                <div class="col-sm-12 col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Laporan Pembelian</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?=base_url()?>Transaksi/LaporanPembelianEditAction" method="post" class="form-horizontal">
                        <?php foreach ($isi['isi']->result() as $value) { ?>
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">UserID</label>

                              <div class="col-sm-10">
                                <select name="user_id" class="form-control">
                                  <?php foreach ($all_user->result() as $value_allUser): ?>
                                    <option value="<?php echo $value_allUser->id ?>" <?php if($this->session->userdata('id') == $value_allUser->id) {echo "selected";} ?>><?php echo '('.$value_allUser->id.') '.$value_allUser->username ?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                              <div class="col-sm-10">
                                <select name="kategori" class="form-control">
                                  <option value="1" <?php if ($value->kategori == '1') {echo 'selected';} ?>>Baju</option>
                                  <option value="2" <?php if ($value->kategori == '2') {echo 'selected';} ?>>Celana</option>
                                  <option value="3" <?php if ($value->kategori == '3') {echo 'selected';} ?>>Sepatu</option>
                                  <option value="4" <?php if ($value->kategori == '4') {echo 'selected';} ?>>Tas</option>
                                  <option value="5" <?php if ($value->kategori == '5') {echo 'selected';} ?>>Jaket</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Kode</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode" value="<?php echo $value->kode ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah" value="<?php echo $value->jumlah ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Total</label>

                              <div class="col-sm-10">
                                <input type="number" class="form-control" name="total" value="<?php echo $value->total ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                              <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $value->tanggal ?>" required>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="reset" onclick="window.location.href='<?=base_url()?>Transaksi/LaporanPembelian'" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </div>
                      <!-- /.box -->
                </div>
            </div>
        </div>
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
  $( ".LaporanPembelian" ).last().addClass( "active" );
</script>