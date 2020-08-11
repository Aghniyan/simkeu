<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bos.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$id = $_GET['id'];
$thn = $_GET['thn'];
$rincian_rkam = tampil_rincian_rkam($id);
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
    <?php
      if (isset($_POST['ubah'])) {
        ubah_data_rincian_rkam();
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_rkam.php">';

      }
    ?>
    <section class="content">
      <div id="form_ubah" class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box">
            
            <div class="box-header with-border">
              <a href="view_rkam.php" class="btn btn-box-tool"><i class="fa fa-arrow-left"></i> kembali</a>
            </div>
            <div class="box-body">
              <form  action="" method="post">
                <div class="form-row text-center">
                  <div class="form-group col-md-12">
                    <h3 class="box-title">FORM UBAH DATA RINCIAN RKAM</h3>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-1">
                    <label for="kode">Tahun</label>
                    <input type="text" disabled class="form-control" id="tahun" name="tahun" placeholder="no tahun..." value="<?=$thn?>">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="kode">No Kode</label>
                    <input type="text" disabled class="form-control" id="kode" name="kode" placeholder="no kode..." value="<?=$rincian_rkam[0]['kode']?>">
                  </div>
                  <div class="form-group col-md-9">
                    <label for="uraian">uraian Komponen</label>
                    <input type="text" disabled class="form-control" id="uraian" name="uraian" placeholder="uraian komponen ..." value="<?=$rincian_rkam[0]['uraian']?>">
                  </div>
                </div>
                <div class="form-row">
                  <?php for ($no=0; $no <count($bulan) ; $no++) { 
                    $uraian=tampil_rincian_rkam($rincian_rkam[0]['kode']);?>
                    <div class="form-group col-md-1">
                    <label for="jumlah"><?=$bulan[$no]?></label>
                    <?php
                      
                    ?>
                    <input type="number" class="form-control" id="jumlah_<?=$bulan[$no]?>" name="jumlah[]" placeholder="0" value="<?php foreach ($uraian as $u) { echo $jumlah = ($u['bulan']==$bulan[$no]) ? $u['jumlah_dana'] : '' ;} ?>">
                  </div>
                  <?php } ?>
                  <div class="form-group col-md-12">
                    <label for="level"></label>
                    <input type="hidden" class="form-control" id="kode" name="kode" value="<?=$rincian_rkam[0]['kode']?>">
                    <input type="hidden" class="form-control" id="id_sub" name="id_sub" value="<?=$rincian_rkam[0]['id_subkomponen']?>">
                    <input type="hidden" class="form-control" id="tahun" name="tahun" value="<?=$thn?>">
                    <input class="form-control btn btn-primary" type="submit" value="Simpan" name="ubah">
                  </div>
                </div>	
              </form>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
<?php 
include_once('../../templates/footer.php');
?>