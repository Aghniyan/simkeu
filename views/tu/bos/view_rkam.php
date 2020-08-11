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
$tahun = 2018;
$bulan = nama_bulan();
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
          <h3 class="box-title">Rekapitulasi RKAM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header text-center with-border">
                  <h3 class="box-title">Sumber Dana</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian Komponen</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($rkam_sumber as $d){
                    ?>
                    <tr>
                      <th width='10%'><?=$i?></th>
                      <th width='10%'></th>
                      <th><?=$d['nama_komponen']?></th>
                      <th></th>
                    </tr>
                    <?php 
                    $data = [
                      'id_komponen_perencanaan_bos'=>$d['id']
                    ];
                    $sub = tampil_rekap_rkam($data);
                    // var_dump($sub);
                    $j=1;
                    foreach($sub as $s){
                    ?>
                    <tr>
                      <td width='10%'></td>
                      <td width='10%'><?=$i.'.'.$j?></td>
                      <td><?=$s['nama_subkomponen']?></td>
                      <td><?='Rp '.number_format($s['total'])?></td>
                    </tr>
                    <?php $j++; } ?>
                    <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header text-center with-border">
                  <h3 class="box-title">Penggunaan Dana</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian Komponen</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    foreach($rkam_penggunaan as $d){
                    ?>
                    <tr>
                      <th width='10%'><?=$i?></th>
                      <th width='10%'></th>
                      <th><?=$d['nama_komponen']?></th>
                      <th></th>
                    </tr>
                    <?php 
                    
                    $data = [
                      'id_komponen_perencanaan_bos'=>$d['id']
                    ];
                    $sub = tampil_rekap_rkam($data);
                    $j=1;
                    foreach($sub as $s){
                      ?>
                    <tr>
                      <td width='10%'></td>
                      <td width='10%'><?=$i.'.'.$j?></td>
                      <td><?=$s['nama_subkomponen']?></td>
                      <td><?='Rp '.number_format($s['total'])?></td>
                    </tr>
                    <?php $j++; } ?>
                    <?php $i++; } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <?php 
        // var_dump(tampil_rincian_rkam());
      ?>
      <div class="box box-primary ">
        <div class="box-header with-border">
          <h3 class="box-title">Rincian RKAM</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <div >
            <a href="form_tambah_rincian_rkam.php" id="btn_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
          </div> -->
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
                  <th rowspan="2">Kode</th>
                  <th rowspan="2">Uraian</th>
                  <th rowspan="2">Jumlah</th>
                  <th colspan="6">Tahap 1</th>
                  <th colspan="6">Tahap 2</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                  <?php for ($no=0; $no <count($bulan) ; $no++) { ?>
                  <th><?=$bulan[$no]?></th>
                  <?php } ?>
                </tr>
              </thead>
                  <tbody>
                  <?php 
                  $detail = tampil_detail_komponen_perencanaan_bos($r['id'],null);
                  $j=1;
                  foreach($detail as $d){
                    $uraian=tampil_rincian_rkam($d['kode']);
                    
                  ?>

                  <tr>
                    <td><?=$d['kode']?></td>
                    <td><?=$d['uraian']?></td>
                    <th><?=number_format($d['total'],0,',','.')?></td>
                    <?php for ($no=0; $no <count($bulan) ; $no++) { 
                    ?>
                    <td>
                      <?php 
                        foreach ($uraian as $u) {
                          echo $retVal = ($u['bulan']==$bulan[$no]) ? number_format($u['jumlah_dana'],0,',','.') : '' ;
                        }
                      ?>
                    </td>
                    <?php } ?>
                    <td>
                      <a href="form_ubah_rincian_rkam.php?id=<?=$d['kode']?>&thn=<?=$tahun?>" id="btn_ubah" class="btn btn-warning btn-sm">ubah</a>
                      <a href="hapus_rincian_rkam.php?id=<?=$d['kode']?>&thn=<?=$tahun?>" id="btn_hapus" class="btn btn-danger btn-sm">hapus</a>
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