<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_user.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Pengguna</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Pengguna</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <?php
      if (isset($_SESSION['pesan'])) {?>
        <div class="alert alert-<?=$_SESSION['warna']?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa <?=$_SESSION['ikon']?>"></i> Alert!</h4>
          <?=$_SESSION['pesan']?>
        </div>
      <?php  
      unset($_SESSION['pesan']);
      }
      ?>
      
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            <div class="box-header">
							<a href="form_tambah_user.php" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
						<!-- /.box-header -->
            <div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
								<?php
									$pengguna = tampil_data_pengguna();
									$no=1;
									foreach($pengguna as $p){
								?>
                <tr>
									<td><?=$no?></td>
                  <td><?=$p['nama_lengkap']?></td>
                  <td><?=$p['username']?></td>
                  <td ><?=$p['level']?></td>
                  <td><?= $status = ($p['status']==1) ? 'aktif' : 'non-aktif' ; ?></td>
                  <td>
										<a href="form_ubah_user.php?id=<?=$p['id']?>" id="btn_ubah"  class="btn btn-warning btn-sm">Ubah</a> 
                    <a onclick="return confirm('apakah anda yakinn ingin mengubaha status?')" href="hapus_user.php?id=<?=$p['id']?>&st=<?=$p['status']?>" class="btn <?= ($p['status']==1) ? 'btn-danger' : 'btn-success' ;?> btn-sm"><?= $set_status = ($p['status']==1) ? 'Non-Aktifkan' : 'Aktifkan' ;?>
                </tr>
								<?php 
								$no++; } 
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
<?php 
include_once('../../templates/footer.php');
?>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 5000);
</script>