<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bos.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Realisasi Penggunaan Dana BOS</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Realisasi BOS</li>
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
							<a href="form_tambah_realisasi.php" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>
						<!-- /.box-header -->
            <div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Komponen Penggunaan Dana</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
								<?php
									$jp_dana = tampil_jenis_penggunaan_dana();
									$no=1;
									foreach($jp_dana as $p){
								?>
                <tr>
									<td><?=$no?></td>
                  <td><?=$p['nama_penggunaan']?></td>
                  <td>
										<a href="form_ubah_realisasi.php?id=<?=$p['id']?>" id="btn_ubah"  class="btn btn-warning btn-sm">Ubah</a> 
                    <a onclick="return confirm('apakah anda yakin menghapus komponen penggunaan dana?')" href="hapus_realisasi.php?id=<?=$p['id']?>" class="btn btn-danger btn-sm">Hapus</a>
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
    $('#example1').DataTable();
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