<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bpmu.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$rencana_personalia = tampil_subkomponen_perencanaan_bpmu("1");
$rencana_nonpersonalia = tampil_subkomponen_perencanaan_bpmu("2");
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Data Rencana BPMU</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Data Rencana BPMU</li>
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
      // var_dump($rencana_personalia);
      ?>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Belanja Operasi Personalia</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="">
            <a href="form_tambah_bpmu.php?no=1" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="10%">Kode</th>
              <th>Uraian</th>
              <th>Keterangan</th>
              <th width="20%">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $no=1;
              foreach($rencana_personalia as $p){
            ?>
            <tr>
              <td><?=$p['kode']?></td>
              <td><?=$p['nama_komponen']?></td>
              <td><?=$p['keterangan']?></td>
              <td>
                <a href="form_ubah_bpmu.php?id=<?=$p['id']?>" id="btn_ubah"  class="btn btn-warning btn-sm">Ubah</a> 
                <a onclick="return confirm('apakah anda yakin menghapus komponen rencana bpmu?')" href="hapus_bpmu.php?id=<?=$p['id']?>" class="btn btn-danger btn-sm">Hapus</a>
            </tr>
            <?php 
            $no++; } 
            ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Belanja Operasi Non Personalia</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <div class="">
            <a href="form_tambah_bpmu.php?no=2" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>
          <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th width="10%">Kode</th>
              <th>Uraian</th>
              <th>Keterangan</th>
              <th width="20%">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
              $no=1;
              foreach($rencana_nonpersonalia as $p){
            ?>
            <tr>
              <td><?=$p['kode']?></td>
              <td><?=$p['nama_komponen']?></td>
              <td><?=$p['keterangan']?></td>
              <td>
                <a href="form_ubah_bpmu.php?id=<?=$p['id']?>" id="btn_ubah"  class="btn btn-warning btn-sm">Ubah</a> 
                <a onclick="return confirm('apakah anda yakin menghapus komponen penggunaan dana?')" href="hapus_bpmu.php?id=<?=$p['id']?>" class="btn btn-danger btn-sm">Hapus</a>
            </tr>
            <?php 
            $no++; } 
            ?>
            </tbody>
          </table>
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