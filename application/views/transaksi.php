 <?php if (isset($keranjang)) {
  $total_belanja = 0;
  foreach ($keranjang['keranjang']->result() as $value){
    $total_belanja+=$value->total;
  }
}
?>
<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

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
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                    <div class="col-sm-10">
                      <select name="kategori" class="form-control">
                        <option value="1" <?php if ($value->kategori_id == '1') {echo 'selected';} ?>>Baju</option>
                        <option value="2" <?php if ($value->kategori_id == '2') {echo 'selected';} ?>>Celana</option>
                        <option value="3" <?php if ($value->kategori_id == '3') {echo 'selected';} ?>>Sepatu</option>
                        <option value="4" <?php if ($value->kategori_id == '4') {echo 'selected';} ?>>Tas</option>
                      </select>
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

                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" value="" onchange="jmlChange(this.value)"  required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-3">
                      <input id="stock_barang" type="text" class="form-control" name="stock" value="<?php echo $value->stock ?>" disabled>
                      <input id="stock_hidden" type="hidden" name="stock_hidden" value="<?php echo $value->stock ?>">
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
                    <label for="inputPassword3" class="col-sm-2 control-label">Kategori</label>

                    <div class="col-sm-10">
                      <select id="kategori_barang" name="kategori_barang" class="form-control">
                        <option value="1">(1) Baju</option>
                        <option value="2">(2) Celana</option>
                        <option value="3">(3) Sepatu</option>
                        <option value="4">(4) Tas</option>
                      </select>
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

                    <div class="col-sm-5">
                      <input type="number" class="form-control" name="jumlah" id="jumlah" value="" onchange="jmlChange(this.value)"  required>
                    </div>
                    <label for="inputPassword3" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" class="form-control" name="stock" value="0" disabled>
                      <input id="stock_hidden" type="hidden" name="stock_hidden" value="0">
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
                    <input type="number" class="form-control" name="bayar" id="bayar" onchange="bayarOnchange(this.value)" required>
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

 <?php require_once 'template/footer.php' ?>
 <script type="text/javascript">
  $( ".treeview-tables" ).last().addClass( "active" );
  $( ".menu-transaksi" ).last().addClass( "active" );
</script>
<script>
  var base_url = "http://localhost/distro-meup/";

  function idChange(val) {
    window.location.href = 'http://localhost/distro-meup/Transaksi/index/' + val;
  }
  function jmlChange(val) {
    var hb = document.getElementById("harga_barang").value;
    var st = document.getElementById("subtotal");
    var sb = document.getElementById("stock_barang");
    var sh_v = document.getElementById("stock_hidden").value;
    var total = hb * val;
    var sb_n = sh_v - val;
    st.setAttribute('value', total);
    sb.setAttribute('value', sb_n);
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