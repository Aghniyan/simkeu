<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bos.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$rkam_sumber = tampil_komponen_perencanaan_bos("Sumber Dana");
$rkam_penggunaan = tampil_komponen_perencanaan_bos("Penggunaan");
$rincian_rkam = tampil_subkomponen_perencanaan_bos(6);
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data RKAM BOS</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data RKAM BOS</li>
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
      <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Komponen RKAM Sumber Dana</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php $i=1; foreach ($rkam_sumber as $r){
          ?>
          <div class="box  ">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$i.'. '.$r['nama_komponen']?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tbody>
                  <?php 
                  $sub = tampil_subkomponen_perencanaan_bos($r['id']);
                  $j=1;
                  foreach($sub as $s){
                  ?>
                  <tr>
                    <td width='10%'><?=$i.'.'.$j?></td>
                    <td><?=$s['nama_subkomponen']?></td>
                  </tr>
                  <?php $j++; } ?>
                </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <?php $i++; } ?>
        </div>
        <!-- /.box-body -->
      </div>
      
      <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Komponen RKAM Penggunaan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php $i=1; foreach ($rkam_penggunaan as $r){
          ?>
          <div class="box box-default ">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$i.'. '.$r['nama_komponen']?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                  <tbody>
                  <?php 
                  $sub = tampil_subkomponen_perencanaan_bos($r['id']);
                  $j=1;
                  foreach($sub as $s){
                  ?>
                  <tr>
                    <td width='10%'><?=$i.'.'.$j?></td>
                    <td><?=$s['nama_subkomponen']?></td>
                  </tr>
                  <?php $j++; } ?>
                </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <?php $i++; } ?>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Rincian Komponen RKAM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div >
            <a href="form_tambah_rkam.php" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>
        <?php $i=1; foreach ($rincian_rkam as $r){
          ?>
          <div class="box box-default collapsed-box ">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$i.'. '.$r['nama_subkomponen']?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool " data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              
              <table id="rkam-<?=$i?>" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Uraian Komponen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
                  <tbody>
                  <?php 
                  $detail = tampil_detail_komponen_perencanaan_bos($r['id'],null);
                  $j=1;
                  foreach($detail as $d){
                  ?>
                  <tr>
                    <td width='10%'><?=$d['kode']?></td>
                    <td><?=$d['uraian']?></td>
                    <td width='20%'>
                      <a href="form_ubah_rkam.php?id=<?=$d['id']?>" id="btn_ubah" class="btn btn-warning btn-sm">ubah</a>
                      <a href="hapus_rkam.php?id=<?=$d['id']?>" id="btn_hapus" class="btn btn-danger btn-sm">hapus</a>
                    </td>
                  </tr>
                  <?php $j++; } ?>
                </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <?php $i++; } ?>
        </div>
        <!-- /.box-body -->
      </div>
    </section>
  </div>
<?php 
include_once('../../templates/footer.php');
?>
<script>
  $(function () {
    $('#example1').DataTable();
    <?php $i=1; foreach ($rincian_rkam as $r){ ?>
      $('#rkam-<?= $i;?>').DataTable();
    <?php $i++;} ?>
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