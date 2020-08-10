<?php 
require_once('../cek_level.php');
require_once('../../../url_helper.php');
require_once('../../../proccess/crud/function_bos.php');
include_once('../../templates/head.php');
include_once('../../templates/navbar.php');
include_once('../../templates/sidebar.php');
$id = $_GET['id'];
$program_madrasah = tampil_subkomponen_perencanaan_bos(6);
$rincian_rkam = tampil_detail_komponen_perencanaan_bos(null,$id);

if (isset($_POST['ubah'])) {
  ubah_data_rkam();
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view_rkam.php">';

}
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
      <div id="form_tambah" class="row">
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
                  <div class="form-group col-md-3">
                    <label for="id_subkomponen">Program Madrasah</label>
                    <select class="form-control" id="id_subkomponen" name="id_subkomponen">
                      <?php
                        $i=1;
                        foreach($program_madrasah as $p){
                      ?>
                      <option <?=($p['id']==$rincian_rkam[0]['id_subkomponen_perencanaan_bos']) ? "selected" : "" ;?> value="<?=$p['id']?>"><?=$i.'. '.$p['nama_subkomponen']?></option>
                        <?php $i++; } ?>
                    </select>
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="kode">No Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode" placeholder="no kode..." value="<?=$rincian_rkam[0]['kode']?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="uraian">uraian Komponen</label>
                    <input type="text" class="form-control" id="uraian" name="uraian" placeholder="uraian komponen ..." value="<?=$rincian_rkam[0]['uraian']?>">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="level"></label>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="id.." value="<?=$rincian_rkam[0]['id']?>">
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