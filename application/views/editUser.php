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
                          <h3 class="box-title">User</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?=base_url()?>User/EditAction" method="post" class="form-horizontal">
                        <?php foreach ($isi['isi']->result() as $value) { ?>
                            <input type="hidden" name="id" value="<?php echo $value->id ?>">
                            <div class="box-body">
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Username</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" value="<?php echo $value->username ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Fullname</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="fullname" value="<?php echo $value->fullname ?>" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Level</label>

                              <div class="col-sm-10">
                                <select class="form-control" name="level">
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button onclick="window.location.href='<?=base_url()?>User'" class="btn btn-default">Cancel</button>
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
  $( ".menu-user" ).last().addClass( "active" );
</script>