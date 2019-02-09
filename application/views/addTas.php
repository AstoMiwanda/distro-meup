<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Tambah Stock Barang</small>
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
                          <h3 class="box-title">Tas</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?=base_url()?>Tas/AddAction" method="post" class="form-horizontal">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">ID Barang</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_barang" placeholder="ID Barang" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Merk</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="merk" placeholder="Merk" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Warna</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="warna" placeholder="Warna" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Ukuran</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="ukuran" placeholder="Ukuran" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Stock</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="stock" placeholder="Stock" required>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button onclick="window.location.href='<?=base_url()?>Tas'" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Tambah</button>
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
  $( ".treeview-tables" ).last().addClass( "active" );
  $( ".menu-tas" ).last().addClass( "active" );
</script>