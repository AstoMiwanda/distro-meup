<?php require_once 'template/top_navbar.php' ?>
<?php require_once 'template/left_navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distro MeUp
        <small>Data Barang</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <a href="<?=base_url()?>User/ViewAdd" type="button" class="btn btn-block btn-success">Tambah</a>
    <section id="tables-barang" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table Stock Baju</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            	<tr>
            		<th>No</th>
            		<th>Username</th>
            		<th>Nama Lengkap</th>
            		<th>Level</th>
                <?php foreach ($user->result() as $value_user) {
                    if ($value_user->level == 'Admin') { ?>
                      <th>Edit</th>
                      <th>Hapus</th>
                  <?php }} ?>
            	</tr>
                </thead>
                <tbody>
            	<?php $i=0; foreach ($isi['isi']->result() as $value)
            	{ $i++; ?>
            		<tr>
            			<td><?php echo $i;?></td>
            			<td><?php echo $value->username;?></td>
            			<td><?php echo $value->fullname;?></td>
            			<td><?php echo $value->level;?></td>
            			<?php foreach ($user->result() as $value_user) {
                    if ($value_user->level == 'Admin') { ?>
                      <td><a href="<?=base_url()?>User/ViewEdit/<?php echo $value->id; ?>"><img src="<?=base_url()?>assets/img/edit.svg"></a></td>
                      <td><a href="<?=base_url()?>User/Delete/<?php echo $value->id; ?>"><img src="<?=base_url()?>assets/img/delete.svg"></a></td>
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