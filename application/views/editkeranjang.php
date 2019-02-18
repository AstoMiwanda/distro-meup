<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Edit Transaksi Barang</small>
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
                          <h3 class="box-title">Transaksi</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?=base_url()?>Transaksi/EditAction" method="post" class="form-horizontal">
                        <?php foreach ($data->result() as $value) { ?>
                            <input type="hidden" class="form-control" name="kode" value="<?php echo $value->kode ?>">
                            <input id="subtotal" type="hidden" class="form-control" name="subtotal" value="<?php echo $value->total ?>">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">ID Barang</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode" value="<?php echo $value->kode ?>" disabled required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Merk</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $value->merk ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>

                              <div class="col-sm-10">
                                <input id="harga_barang" type="number" class="form-control" name="harga_barang" value="<?php echo $value->harga ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>

                              <div class="col-sm-10">
                                <input id="jumlah" type="number" class="form-control" name="jumlah" value="<?php echo $value->jumlah ?>" onchange="jmlChange(this.value)" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Total</label>

                              <div class="col-sm-10">
                                <input id="subtotal-1" type="text" class="form-control" name="subtotal" value="<?php echo $value->total ?>" disabled>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="button" onclick="window.location.href='<?=base_url()?>Transaksi'" class="btn btn-default">Cancel</button>
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
  $( ".treeview-tables" ).last().addClass( "active" );
  $( ".menu-transaksi" ).last().addClass( "active" );
  var base_url = "http://localhost/distro-meup/";

function idChange(val) {
    window.location.href = 'http://localhost/distro-meup/Transaksi/index/' + val;
}
function jmlChange(val) {
    var hb = document.getElementById("harga_barang").value;
    var st = document.getElementById("subtotal");
    var st_1 = document.getElementById("subtotal-1");
    var total = hb * val;
    st.setAttribute('value', total);    
    st_1.setAttribute('value', total);
}
function bayarOnchange(val) {
    var tb = document.getElementById("total_belanja").value;
    var kembali = document.getElementById("kembalian");
    kembalian.setAttribute('value', val - tb);
}
</script>